<!-- Status Messages -->
@if (Session::has('status'))
	<div class="alert success hideit">
		<p>{{ Session::get('status') }}</p>
		<span class="close"></span>
	</div>
@elseif (Session::has('status-error'))
	<div class="alert error hideit">
		<p>{{ Session::get('status-error') }}</p>
		<span class="close"></span>
	</div>
@endif<!-- End Status Messages -->