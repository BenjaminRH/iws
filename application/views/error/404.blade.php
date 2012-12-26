@layout('layouts.main')

@section('meta_page_title')
<title>404 - Page not found</title>
@endsection

@section('page_title')
<div class="sixteen columns">
	<h1 class="page-title">404 - Page not found<span class="line"></span></h1>
</div>
@endsection

@section('content')
{{ HTML::image('http://i1246.photobucket.com/albums/gg609/alyoshakaramazov1/Dr-Horrible_zps7840f0c6.jpg', '404') }}
@endsection