<div id="{{ $comment->id }}-comment" >
  <div class="card white" >
      <div class="card-content row">
        <div class="comment-header">
          <div class="col-md-6" id="user">
            {{ $comment->anonymous? '@'.$comment->user->user_name : 'anonimo'}}
          </div>
          <div class="col-md-6">
            <span class="pull-right"><i class="mdi-device-access-time"></i>
              <abbr class="timeago" id="date" title="{{ date("c", strtotime($comment->created_at)) }}">{{$comment->created_at}}</abbr>
            </span>
          </div>
        </div>
        <div class="col-md-12">
          <p id="content"> {!! nl2br($comment->comment) !!} </p>
        </div>
      </div>
      @if (!Auth::guest())
      @if (Auth::user()->id == $comment->user->id || Auth::user()->isLevel('admin'))
      <div class="card-action">
        <div class="actions">
          <a href="#" onclick="showupdate({{ $comment->id }}, event);" class="pull-right"><i class="mdi-content-create"></i></a>
          <a href='#' onclick="destroy({{ $comment->id }}, event);" class="pull-right"><i class="mdi-action-delete"></i></a>
        </div>
      </div>
      @endif
      @endif
  </div>
</div> 

@if (!Auth::guest())
@if (Auth::user()->id == $comment->user->id || Auth::user()->isLevel('admin'))
<div id="{{ $comment->id }}-update" style="display:none;">
  <div id="update-form" >
    <div class="row">
      <div class="widget-area no-padding blank">
        <div class="status-upload">
          {!! Form::model($comment, array('url' => route('comment.update', $comment), 'method' => 'PUT', 'class' => 'form-update')) !!}
            <input type="hidden" name="user" value="{{$comment->user->id}}">
            <div class="textarea-box">
              {!! Form::textarea('comment', null, ['id' => 'comment', 'length' => '255', 'placeholder' => 'comentario']) !!}
            </div>
            <ul style="  padding-top: 10px;">
              {!! Form::checkbox('anonymous', 'true', true, ['class' => 'filled-in']); !!}
              {!! Form::label('anonymous') !!}
            </ul>
            <button class="btn waves-effect waves-light" type="submit" name="action">Comentar
              <i class="mdi-content-send right"></i>
            </button>
            <button class="btn waves-effect waves-light" onclick="hideupdate({{ $comment->id }}, event);" style="margin-right:10px;">Cancelar</button>
          {!! Form::close() !!}
        </div><!-- Status Upload  -->
      </div><!-- Widget Area -->
    </div>
  </div>
</div>

{!! Form::open(array('url' => route('comment.destroy', $comment), 'method' => 'DELETE', 'id' => $comment->id.'-delete')) !!}
{!! Form::close() !!}

@endif
@endif