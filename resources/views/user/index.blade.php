@extends('app')

@section ('css')
	<link href="{{ asset('/css/datatables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section ('content')
	
	<div class="table-responsive white">
        <table class="table table-striped m-b-none" id="datatables">
            <thead>
            <tr>
            	<th width="25%">nombre de usuario</th>
            	<th width="25%">nombre</th>             
                <th width="11%">puntos</th>
                <th width="11%">actividad</th>             
                <th width="11%">reportes</th>
                <th width="17%">acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div style="display:none;">
    	<input type="hidden" id="url" value="{{ route('data.users') }}">
        <input type="hidden" id="urlreport" value="">
    </div>

      <!-- Modal Structure -->
      <input type="hidden" id="url" value="">
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Reporte</h4>
          <p>
              Los reportes advierten a un usuario de un mal comportamiento, muchos reportes acumulados pueden terminar en un baneo del sistema
          </p>
          {!! Form::open(['route' => ['report', 1], 'method' => 'POST', 'id' => 'form-report']) !!}
            <div class="input-field">
                {!! Form::textarea('reason' ,null,  array('class' => 'materialize-textarea', 'length' => '255', 'id' => 'razon')) !!}
                {!! Form::label('reason', 'Razon del reporte') !!}
                <button class="btn waves-effect waves-light" id="submit">Enviar reporte</button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>

@endsection

@section('scripts')
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/datatables.bootstrap.js') }}"></script>
	<script src="{{ asset('js/user/index.js') }}"></script>
@endsection