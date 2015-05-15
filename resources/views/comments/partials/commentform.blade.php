@if (!Auth::guest())
	<div class="row">
		<div class="widget-area no-padding blank">
			<div class="status-upload">
				{!! Form::open(array('url' => 'foo/bar')) !!}
					<div class="textarea-box">
						<textarea id="textarea1" name="comment" length="255" placeholder="Publica un comentario"></textarea>
					</div>
					<ul style="  padding-top: 10px;">
						<input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" name="anonymous" />
						<label for="filled-in-box">Anonimo</label>
					</ul>
					<button class="btn waves-effect waves-light" type="submit" name="action">Comentar
						<i class="mdi-content-send right"></i>
					</button>
				{!! Form::close() !!}
			</div><!-- Status Upload  -->
		</div><!-- Widget Area -->
	</div>
	<hr>
@endif