@extends('adminlte::page')

@section('title', 'Consultar ordenes')

@section('content_header')
<h1>Consultar ordenes</h1>
@stop

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@stop

@section('content')
<div class="card card-solid">
  <div class="card-header">
    <h3 class="card-title">Listado de ordenes</h3>
  </div>
  <div class="card-body">
    <div class="dataTables_wrapper dt-bootstrap4">
      <table id="tblOrdenes" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Descripción</th>
            <th>Total</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Items as $item)
          <tr>
            <td><a href="/orden/pago/response/{{ $item->id }}">{{ $item->order_id }}</a></td>
            <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->customer_email }}</td>
            <td>{{ $item->customer_mobile }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>${{ number_format($item->total_order, 2) }}</td>
            <td>{{ $item->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @stop
  @section('js')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#tblOrdenes').DataTable({
        "order": [[ 1, "desc" ]]
    });
  });
  </script>
  @stop
