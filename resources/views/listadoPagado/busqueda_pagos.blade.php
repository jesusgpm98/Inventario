@extends('layout')

@section('title')

  @section('content')
    <br>
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <h4 class="text-center">Busqueda</h4>
          </div>
        </div>
        <div class="card-body">
          <form class="" action="{{ route('productos.listar') }}" method="post">

            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6 offset-md-1">
                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="desde">Desde: </label>
                  </div>

                  <div class="col-md-9">
                    <div class="input-group date">
                      <input class="form-control" name="desde" id="desde" type="date" value="{{ old('desde') }}" />
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                      </div>
                    </div>
                  </div>
                </div>

                <br/>

                <div class="row form-group">
                  <div class="col-md-2">
                    <label for="hasta">Hasta: </label>
                  </div>
                  <div class="col-md-9">
                    <div class="input-group mb-3">
                      <input class="form-control" name="hasta" id="hasta" type="date" value="{{ old('hasta') }}" />
                      <div class="input-group-append">
                        <span class="input-group-text" id="hasta"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-danger btn-block">Buscar</button>
              </div>
            </div>
          </form>
          @if($errors->any())
            <div class="col-md-12">
              <div class="alert alert-danger">
                <h7 class="text-center">{{ $errors->first() }}</h7>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

  @endsection

  <script>
//  $(document).ready(function(){
//
//
//   var date_input=$('input[type="text"]'); //our date input has the name "date"
//   var options={
//   format: "d/m/Y",
//   language: "es",
//   orientation: "bottom left",
//   autoclose: true,
//   todayHighlight: true
// };
// date_input.datepicker(options);
// });

// $(function () {
//     $('#datetimepicker1').datetimepicker();
// });

</script>
