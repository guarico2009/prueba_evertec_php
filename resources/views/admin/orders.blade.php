@extends('adminlte::page')

@section('title', 'Consultar ordenes')

@section('content_header')
<h1>Consultar ordenes</h1>
@stop

@section('content')
<div class="card card-solid">
  <div class="card-header">
    <h3 class="card-title">Nueva orden</h3>
  </div>
  <div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Cliente</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>David Barrera</td>
            <td>guarico2009@gmail.com</td>
            <td>0997734590</td>
            <td>Pendiente</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @stop
