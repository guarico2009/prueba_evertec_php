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

      try{
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
      }catch (\Illuminate\Database\QueryException $ex) {
        return redirect('orden')->withErrors(['message'=> "Error de aplicación"])->withInput();
      }
    }
  }

  //Realizar el pago con placetopay
  public function pago(Request $request){
    $order = Order::find($request->id);
    $response = $this->placetopay->createRequest($order);

    if ($response->isSuccessful()) {
      $order->requestId = $response->requestId();
      $order->processUrl = $response->processUrl();
      $order->save();

      return redirect()->away($response->processUrl());
    } else {
      return redirect('orden/pago')->withErrors(['message'=> $response->status()->message()])->withInput();
      \Log::info($response->status()->message());
    }
  }

  //Consultar el estado de la orden
  public function estadoPago(Request $request){
    $order = Order::find($request->id);
    $response = $this->placetopay->requestInformation($order);

    if ($response->isSuccessful()) {
        // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

        if ($response->status()->isApproved()) {
          $order->status = 'PAYED';
          $order->save();

          return View::make('client.orderStatus', $order);
        }else{
          $order->status = $response->status()->status();
          $order->save();

          return View::make('client.orderStatus', $order);
        }
    } else {
        return View::make('client.orderStatus', $order)->withErrors(['message'=> $response->status()->message()])->withInput();
    }
  }

  //Repetir el pago con placetopay
  public function repetirPago(Request $request){
    $order = Order::find($request->id);
    $response = $this->placetopay->createRequest($order);

    if ($response->isSuccessful()) {
      $order->requestId = $response->requestId();
      $order->processUrl = $response->processUrl();
      $order->save();

      return redirect()->away($response->processUrl());
    } else {
      return View::make('client.orderStatus', $order)->withErrors(['message'=> $response->status()->message()])->withInput();
      \Log::info($response->status()->message());
    }
  }

  //Consultar el estado de la orden pendiente
  public function consultarEstado(Request $request){
    $order = Order::find($request->id);
    $response = $this->placetopay->requestInformation($order);

    if ($response->isSuccessful()) {
      if ($response->status()->isApproved()) {
        $order->status = 'PAYED';
        $order->save();

        return response()->json([
          'status' => $order->status
        ], 200);
      }else{
        return response()->json([
          'status' => $response->status()->status()
        ], 200);
      }
    }
  }

  //Consulta de todas las ordenes de la Tienda
  public function consultarOrdenes(Request $request)
  {
    $orders = Order::orderByDesc('created_at')->get();

    return View::make('admin.orders', [
      'Items' => $orders
    ]);
  }
}
