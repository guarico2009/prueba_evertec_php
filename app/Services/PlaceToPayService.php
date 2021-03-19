<?php
namespace App\Services;

class PlaceToPayService
{
  protected $placetopay;

  public function __construct(){
		$this->placetopay = app()->make('PlacetoPay');
	}

  public function createRequest($order){
    $reference = $order->id;
    $request = [
        'payment' => [
            'reference' => $order->id,
            'description' => $order->descripcion,
            'amount' => [
                'currency' => 'USD',
                'total' =>  $order->total_order,
            ],
        ],
        'expiration' => date('c', strtotime('+1 days')),
        'returnUrl' => 'http://localhost:8000/orden/pago/response/'.$order->id,
        'ipAddress' => '127.0.0.1',
        'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
    ];

		return $this->placetopay->request($request);
	}

  public function requestInformation($order){
    return $this->placetopay->query($order->requestId);
  }
}
