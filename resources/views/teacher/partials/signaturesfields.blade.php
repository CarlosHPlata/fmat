<div id="selectcontrolm">
    <select name="signatures[]" class="browser-default selectivity-input"  data-placeholder="Escribe el nombre de la materia" id="multiple-select-box" multiple>
    	@foreach ($signatures as $signature)
    		@if( isset($teacher) )
	    		@if ( count( $signature->teachers()->where('teacher_id','=',$teacher->id)->get() ) > 0)
					<option value="{{ $signature->id }}" selected>{{$signature->name}}</option>
	    		@else
					<option value="{{ $signature->id }}">{{$signature->name}}</option>
	    		@endif
	    	@else
				<option value="{{ $signature->id }}">{{$signature->name}}</option>
	    	@endif
    	@endforeach
    </select>
</div>