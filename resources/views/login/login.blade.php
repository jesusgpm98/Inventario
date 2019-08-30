@extends('layout')

@php
$title = 'Login';
@endphp

@section('title')

  @section('content')
    <br>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <h2 class="text-center">Login</h2>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('user.login') }}" method="POST">
              {{ csrf_field() }}
              {{-- <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Ingrese email" value="{{ old('email') }}">
              {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div> --}}

            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Ingrese username" value="{{ old('username') }}">
              {{-- {!! $errors->first('email', '<span class="help-block">:message</span>') !!} --}}
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Ingrese password">
              {{-- {!! $errors->first('password', '<span class="alert alert-danger">:message</span>') !!} --}}
            </div>

            <button type="submit" name="" class="btn btn-primary btn-block">Sign in</button>
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
          <div class="col-md-11 offset-md-3">
            <a href="{{ route('user.create') }}">Create an Account!</a>
          </div>


        </div>
      </div>
    </div>
  </div>
@endsection
