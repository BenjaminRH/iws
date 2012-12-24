@if(count($errors->messages))
	<div id="note">
		<div class="notification_error">
			@foreach($errors->all(':message<br>') as $error)
			{{ $error }}
			@endforeach
		</div>
	</div>
@endif