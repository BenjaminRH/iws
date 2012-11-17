@if (Session::has('status'))
	<div class="alert-box success">
		{{ Session::get('status') }}
		<a href="" class="close">&times;</a>
	</div>
@elseif (Session::has('status-error'))
	<div class="alert-box alert">
		{{ Session::get('status-error') }}
		<a href="" class="close">&times;</a>
	</div>
@endif