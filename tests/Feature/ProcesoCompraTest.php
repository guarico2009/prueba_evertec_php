<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcesoCompraTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shop_page()
    {
      $response = $this->get('/');
      $response->assertStatus(200);
    }

    public function test_order_page()
    {
      $response = $this->get('/orden');
      $response->assertStatus(200);
    }

    public function test_order_do_buy()
    {
      $this->withoutExceptionHandling();
      $response = $this->post('orden', [
        'nombre' => 'David Barrera',
        'email' => 'guarico2009@gmail.com',
        'telefono' => '0997734590'
      ]);

      $this->assertEquals(200, $response->getStatusCode());
    }
}
