@layout('templates.main')

@section('main-content')
<div class="container">
	@if (Session::has('status'))
	{{ Alert::success('<strong>Success!</strong> '.Session::get('status')) }}
	@elseif (Session::has('status-error'))
	{{ Alert::error('<strong>Error!</strong> '.Session::get('status-error')) }}
	@endif

	<div class="hero-unit">
		<h1>{{ __('main.title') }}</h1>
		<p style="margin-top: 20px; margin-bottom: 20px">During this ongoing project, students, teachers, and graduates of <a href="http://www.reut-jerusalem.org.il/">The Reut School</a> document tombstones in Jewish cemeteries in Poland. You can search the database for specific tombstones.</p>
		<p style="text-align: center"><a class="btn btn-primary btn-large">Support Gidonim</a></p>
	</div>
</div>
@endsection