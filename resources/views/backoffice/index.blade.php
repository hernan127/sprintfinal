@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 offset-4 titulo-login-pao">
            <h2 class="text-center">CREADOR DE PRODUCTOS</h2>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6 offset-3">
        <div class="card-body">
          <h5 class="card-title">Sección Para Administradores</h5>
          <br>
          <p class="card-text">En esta sección los administradores podrán almacenar nuevos productos en las tablas correspondientes.</p>
          <a class="btn btn-link" href="/products/create">
              {{ __('Ingresar') }}
          </a>
        </div>
      </div>
    </div>
@endsection
