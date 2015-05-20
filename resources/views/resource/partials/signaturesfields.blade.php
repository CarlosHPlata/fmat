

	<div class="input-field col s12">
	    <select name="signature" id="signature">
	    	@if ( !isset($resource) || !isset($signature_def) )
	    		<option value="" disabled selected>Escoje una asignatura</option>
	    	@endif

	    	@foreach ($signatures as $signature)
	    		@if ( isset($resource) )
					@if ( $resource->signature->id === $signature->id )
						<option value="{{ $signature->id }}" selected>{{ $signature->name }}</option>
					@else
						<option value="{{ $signature->id }}">{{ $signature->name }}</option>
					@endif
	    		@elseif ( isset($signature_def) && $signature_def != '' )
					@if ( $signature_def->id === $signature->id )
						<option value="{{ $signature->id }}" selected>{{ $signature->name }}</option>
					@else
						<option value="{{ $signature->id }}">{{ $signature->name }}</option>
					@endif
	    		@else 
					<option value="{{ $signature->id }}">{{ $signature->name }}</option>
	    		@endif
	      	@endforeach
	    </select>
	    <label>Asignatura a la que pertenece al recurso</label>
	</div>