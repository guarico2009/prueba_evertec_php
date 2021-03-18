@extends('adminlte::page')

@section('title', 'Resúmen del pedido')

@section('content_header')
<h1>Resúmen del pedido</h1>
@stop

@section('content')
<div class="card card-solid">
  <div class="card-header">
    <h3 class="card-title">Resúmen</h3>
  </div>
  <form method="post" action="/resumen" role="form">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>David Barrera</strong><br>
                Dirección: Tulcán 1906 y Ayacucho<br>
                Teléfono: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <br>
              <b>Orden#:</b> 4F3S8J<br>
              <b>Fecha de pago:</b> 2/22/2014<br>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Cantidad</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>GTX-Mid-Hiking</td>
                <td>LOWA Men’s Renegade GTX Mid Hiking Boots Review</td>
                <td>$80.00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-9">
          <p class="lead">Método de pago:</p>
          <img src="vendor/adminlte/dist/img/visa.png" alt="Visa">
          <img src="vendor/adminlte/dist/img/mastercard.png" alt="Mastercard">
          <img src="vendor/adminlte/dist/img/american-express.png" alt="American Express">
        </div>
        <div class="col-3">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>Total:</th>
                  <td>$265.24</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 pr-5">
          <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
            Confirmar pago
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@stop
