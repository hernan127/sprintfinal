@extends('layouts.app')
@section('content')

<!--/ Intro Single star /-->
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 offset-4 titulo-login-pao text-center">
          <h2>{{ $product->name }}</h2>
      </div>
    </div>
</div>
<!--/ Intro Single End /-->

<!--/ News Grid Star /-->
<div class="row">
    <div class="col-lg-6 offset-3">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif

          <form class="" action="" method="POST" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          @csrf
          <div class="row">
            <div class="col-12">
              <label for="name" class="etiquetas">{{ __('NOMBRE') }}</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label for="description" class="etiquetas">{{ __('DESCRIPCIÓN') }}</label>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label for="price" class="etiquetas">{{ __('PRECIO') }}</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <label for="stock" class="etiquetas">{{ __('STOCK') }}</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
            </div>
          </div>

            <!-- <div class="row">
              <div class="col-12">
                <label for="imageLoc" class="etiquetas">{{ __('IMAGEN') }}</label>
                <input class="form-control" type="file" name="imageLoc" value="{{ $product->imageLoc }}">
              </div>
            </div> -->

            <br>

            <div class="form-group row mb-0">
              <div class="col-12">
                <input type="submit" class="btn btn-danger" value="Confirmar Cambios">
              </div>
            </div>

          </form>
    </div>

  </div>
</section>
<!--/ News Grid End /-->


@endsection
