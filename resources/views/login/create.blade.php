@extends('layout')

@php
$title = 'Create Account';
@endphp

@section('title')

@section('content')
  <br>
  <div class="row">
    <div class="col-md-5 offset-md-4">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <h2 class="text-center">Create Account</h2>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('user.createUser') }}" method="POST">

            {{ csrf_field() }}
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre" value="{{ old('nombre') }}">
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Ingrese username" value="{{ old('username') }}">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese password">
              <small id="passwordHelpInline" class="text-muted">
                Must be greater than 6 characters.
              </small>
            </div>

            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="Confirm Password">
            </div>

            <button type="submit" name="" class="btn btn-primary btn-block">Create</button>
          </form>

          <br>
          @if($errors->any())
            <div class="col-md-12">
              <div class="alert alert-danger">
                <h7 class="text-center">{{ $errors->first() }}</h7>
              </div>
            </div>
          @endif

          <hr>
            <a href="{{ route('login_view') }}">I already have an account!</a>

        </div>
      </div>
    </div>
  </div>
@endsection
