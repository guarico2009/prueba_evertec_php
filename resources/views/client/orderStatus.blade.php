@extends('adminlte::page')

@section('title', 'Estado de la orden')

@section('content_header')
<h1>Estado de la orden</h1>
@stop

@section('content')
<div class="card card-solid">
  <div class="card-header">
    <h3 class="card-title">Orden</h3>
  </div>
  <form method="post" action="/orden/pago/repetir/{{ $id }}" id="form" role="form">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input type="hidden" class="form-control" name="id" value="{{ $id }}">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>{{ $customer_name }}</strong><br>
                Teléfono: {{ $customer_mobile }}<br>
                Email: {{ $customer_email }}
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <br>
              <b>Orden#: </b> {{ $order_id }}<br>
              <b>Fecha de pago: </b>{{ date('d/m/Y H:i:s', strtotime($created_at)) }}<br>
            </div>
            <div class="col-sm-4 invoice-col">
              <br>
              <div id="status"><b>Estado: {{ $status }}</b></div><br>
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
        <div class="col-3 offset-md-9">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th>Total:</th>
                  <td>${{ number_format($total_order, 2) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 pr-5">
          @if ($status == 'REJECTED')
            <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
              Reintentar pago
            </button>
          @endif
          @if ($status == 'PENDING')
            <a id="btnPending" href="{{ $processUrl }}" class="btn btn-success float-right" role="button">
              <i class="far fa-credit-card"></i>
              Reintentar pago
            </a>
          @endif
        </div>
      </div>
    </div>
  </form>
</div>
@stop
@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="../../../js/funciones.js"></script>
<script>
  $(document).ready( function () {
    //Consulta del estado de la orden cada 30 segundos
    let estado = "{{ $status }}";
    if(estado == 'PENDING'){
       consultaEstado();
    }
  });
</script>
@stop
