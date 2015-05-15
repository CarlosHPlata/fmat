<div class="card white">
  	<div class="card-content row">
  		<div class="comment-header">
  			<div class="col-md-6">
  				{{ $comment->anonymous? '@'.$comment->user->user_name : 'anonimo'}}
  			</div>
  			<div class="col-md-6">
  				<span class="pull-right"><i class="mdi-device-access-time"></i>
  					<abbr class="timeago" title="{{ date("c", strtotime($comment->created_at)) }}">{{$comment->created_at}}</abbr>
  				</span>
  			</div>
  		</div>
    	<div class="col-md-12">
    		<p> {{ $comment->comment }} </p>
    	</div>
  	</div>
  	@if (!Auth::guest())
  	@if (Auth::user()->id == $comment->user->id || Auth::user()->isLevel('admin'))
		<div class="card-action">
			<div class="actions">
				<a href="#" class="pull-right"><i class="mdi-content-create"></i></a>
				<a href='#' class="pull-right"><i class="mdi-action-delete"></i></a>
			</div>
		</div>
  	@endif
  	@endif
</div>