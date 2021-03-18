<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\PlaceToPayService;
use App\Order;
use Validator;
use View;

class OrderController extends Controller
{
  protected $placetopay;

  public function __construct(Request $request, PlaceToPayService $placetopay){
    $this->placetopay = $placetopay;
  }

  //Envia los datos al resúmen de la orden
  public function comprar(Request $request){
    $rules = [
      'nombre' => 'required',
      'email' => 'required',
      'telefono' => 'required'
    ];

    $customMessages = [
      'nombre.required' => 'El campo nombre es requerido.',
      'email.required' => 'El campo email es requerido.',
      'telefono.required' => 'El campo telefono es requerido.'
    ];

    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {
      return redirect('orden')->withErrors($validator)->withInput();
    } else {
      $order_id = Str::random(10);

      $order = new Order;
      $order->order_id = $order_id;
      $order->customer_name = $request->nombre;
      $order->customer_email = $request->email;
      $order->customer_mobile = $request->telefono;
      $order->descripcion = 'Orden #: '.$order_id;
      $order->total_order = $request->total;
      $order->status = 'CREATED';
      $order->save();

      return View::make('client.summary', $order);
    }
  }

  //Realizar el pago con placetopay
  public function pago(Request $request){
    $order = Order::find($request->id);
    $response = $this->placetopay->createRequest($order);

    if ($response->isSuccessful()) {
        return redirect()->away($response->processUrl());
    } else {
        // There was some error so check the message
        \Log::info($response->status()->message());
    }
  }
}
