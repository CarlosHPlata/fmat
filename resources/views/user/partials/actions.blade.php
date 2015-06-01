<div style="font-size: 13pt;">
	<a href="{{ route('user.show', $user) }}"><i class="mdi-action-visibility"></i></a>
	<a href="{{ route('user.edit', $user) }}"><i class="mdi-editor-mode-edit"></i></a>
	<a href="#" onClick="modal('{{ route('report', $user) }}')"><i class="mdi-content-flag"></i></a>
</div>
