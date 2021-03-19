@extends('adminlte::page')

@section('title', 'Orden de pedido')

@section('content_header')
<h1>Orden de pedido</h1>
@stop

@section('content')
<div class="card card-solid">
  <div class="card-header">
    <h3 class="card-title">Nueva orden</h3>
  </div>
  <form method="post" action="/orden" role="form">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row">
        <div class="col-12 col-sm-6 pr-5">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre completo">
          </div>
          <div class="form-group">
            <label for="email">Dirección de correo electrónico</label>
            <input type="text" class="form-control" name="email" placeholder="Ingrese su dirección de email">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" placeholder="Ingrese su teléfono">
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
          <hr>
          <div class="row">
            <div class="col-12 col-sm-3 mt-1">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                  Naranja
                  <br>
                  <i class="fas fa-circle fa-2x text-orange mt-1"></i>
                </label>
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                  <span class="text-xl">M</span>
                  <br>
                  Mediano
                </label>
              </div>
            </div>
            <div class="col-12 col-sm-9 product-image-thumbs mt-0">
              <div class="product-image-thumb active"><img src="vendor/adminlte/dist/img/prod-1.jpg" alt="Product Image"></div>
              <div class="product-image-thumb"><img src="vendor/adminlte/dist/img/prod-2.jpg" alt="Product Image"></div>
              <div class="product-image-thumb"><img src="vendor/adminlte/dist/img/prod-3.jpg" alt="Product Image"></div>
              <div class="product-image-thumb"><img src="vendor/adminlte/dist/img/prod-4.jpg" alt="Product Image"></div>
              <div class="product-image-thumb"><img src="vendor/adminlte/dist/img/prod-5.jpg" alt="Product Image"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12">
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  <input type="hidden" class="form-control" name="total" value="80.00">
                  $80.00
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Comprar</button>
    </div>
  </form>
</div>
@stop
