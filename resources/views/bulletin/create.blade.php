@extends ('app')

@section ('content')
	
	<div class="row card" style="padding-top:40px; overflow: visible;">
		<div class="col-md-12">
			@include ('errors')
			{!! Form::open(['route' => 'bulletin.store', 'method' => 'post']) !!}
					
					@include ('bulletin.partials.bulletinfields')

					<div class="row">
						<div class="col-md-5-pull-right">
							<button class="btn waves-effect waves-light pull-right" type="submit" name="action">
								Guardar
								<i class="mdi-content-send right"></i>
							</button>
							<a href="{{ URL::previous() }}" class="waves-effect waves-light btn pull-right" style="margin-right: 20px;">Cancelar</a>
						</div>
					</div>

			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('.datepicker').pickadate({
		  selectMonths: true, // Creates a dropdown to control month
		  selectYears: 15 // Creates a dropdown of 15 years to control year
		});
	</script>
@endsection