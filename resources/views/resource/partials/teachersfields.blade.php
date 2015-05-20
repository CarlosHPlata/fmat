
<div class="input-field col s12">
	<select name="teacher" id="teacher">
		@if ( !isset($resource) || !isset($teacher_def) )
			<option value="" disabled selected>Escoje un maestro</option>
		@endif

		@foreach ($teachers as $teacher)
			@if ( isset($resource) )
				@if ( $resource->teacher->id === $teacher->id )
					<option value="{{ $teacher->id }}" selected>{{ $teacher->full_name }}</option>
				@else
					<option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
				@endif
			@elseif (isset($teacher_def) && $teacher_def != '')
				@if ( $teacher_def->id === $resource->teacher->id )
					<option value="{{ $teacher->id }}" selected>{{ $teacher->full_name }}</option>
				@else
					<option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
				@endif
			@else
				<option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
			@endif
		@endforeach
	</select>
	<label>Maestro al que pertenece el recurso</label>
</div>