<div id="selectcontrolm">
    <select name="teachers[]" class="browser-default selectivity-input"  data-placeholder="Escribe el nombre del maestro" id="multiple-select-box" multiple>
    	@foreach ($teachers as $teacher)
    		@if( isset($signature) )
	    		@if ( count( $teacher->signatures()->where('signature_id','=',$signature->id)->get() ) > 0)
					<option value="{{ $teacher->id }}" selected>{{$teacher->full_name}}</option>
	    		@else
					<option value="{{ $teacher->id }}">{{$teacher->full_name}}</option>
	    		@endif
	    	@else
				<option value="{{ $teacher->id }}">{{$teacher->full_name}}</option>
	    	@endif
    	@endforeach
    </select>
</div>