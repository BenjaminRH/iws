@layout('layouts.main')

@section('main')
<style>body{background-color:#98cb00;}form{width:300px;margin:60px auto 30px;padding:10px;position:relative;color:white;text-shadow:0 2px 1px rgba(0,0,0,0.3)}form h1{font-size:22px;padding-bottom:20px}form input[type=text],form input[type=password]{width:100%;padding:8px 4px 8px 10px;margin-bottom:15px;border:1px solid #4e3043;border:1px solid rgba(78,48,67,0.8);background:rgba(0,0,0,0.15);border-radius:2px;box-shadow:0 1px 0 rgba(255,255,255,0.2),inset 0 1px 1px rgba(0,0,0,0.1);-webkit-transition:all .3s ease-out;-moz-transition:all .3s ease-out;-ms-transition:all .3s ease-out;-o-transition:all .3s ease-out;transition:all .3s ease-out;color:#fff;font-size:13px}form input::-webkit-input-placeholder{color:rgba(37,21,26,0.5);text-shadow:0 1px 0 rgba(255,255,255,0.15)}form input:-moz-placeholder{color:rgba(37,21,26,0.5);text-shadow:0 1px 0 rgba(255,255,255,0.15)}form input:-ms-input-placeholder{color:rgba(37,21,26,0.5);text-shadow:0 1px 0 rgba(255,255,255,0.15)}form input[type=text]:hover,form input[type=password]:hover{border-color:#333}form input[type=text]:focus,form input[type=password]:focus,form input[type=submit]:focus{box-shadow:0 1px 0 rgba(255,255,255,0.2),inset 0 1px 1px rgba(0,0,0,0.1),0 0 0 3px rgba(255,255,255,0.15);outline:0}.no-boxshadow form input[type=text]:focus,.no-boxshadow form input[type=password]:focus{outline:1px solid white}form input[type=submit]{width:100%;padding:8px 5px;background:#634056;background:-moz-linear-gradient(rgba(99,64,86,0.5),rgba(76,49,65,0.7));background:-ms-linear-gradient(rgba(99,64,86,0.5),rgba(76,49,65,0.7));background:-o-linear-gradient(rgba(99,64,86,0.5),rgba(76,49,65,0.7));background:-webkit-gradient(linear,0 0,0 100%,from(rgba(99,64,86,0.5)),to(rgba(76,49,65,0.7)));background:-webkit-linear-gradient(rgba(99,64,86,0.5),rgba(76,49,65,0.7));background:linear-gradient(rgba(99,64,86,0.5),rgba(76,49,65,0.7));border-radius:5px;border:1px solid #4e3043;box-shadow:inset 0 1px rgba(255,255,255,0.4),0 2px 1px rgba(0,0,0,0.1);cursor:pointer;-webkit-transition:all .3s ease-out;-moz-transition:all .3s ease-out;-ms-transition:all .3s ease-out;-o-transition:all .3s ease-out;transition:all .3s ease-out;color:white;text-shadow:0 1px 0 rgba(0,0,0,0.3);font-size:16px;font-weight:bold;padding:0 0 5px 2px;cursor:pointer}form label:hover ~ input{border-color:#333}.no-placeholder form label{display:block}a{color:#555;text-decoration:none}.container{width:100%;position:relative}.container>header{margin:10px;padding:20px 10px 10px 10px;position:relative;display:block;text-shadow:1px 1px 1px rgba(0,0,0,0.2);text-align:center}.container>header h1{font-size:30px;line-height:38px;margin:0;position:relative;font-weight:300;color:#666;text-shadow:0 1px 1px rgba(255,255,255,0.6)}.container>header h2{font-size:14px;font-weight:300;margin:0;padding:15px 0 5px 0;color:#666;font-style:italic;text-shadow:0 1px 1px rgba(255,255,255,0.6)}.container>header h1,.container>header h2{color:#fff;text-shadow:0 1px 1px rgba(0,0,0,0.7)}</style>
<div class="container">
	{{ Form::open() }}
	<h1>Login</h1>
	
	{{ Form::token() }}

	{{-- Email field --}}
	{{ Form::label('email', 'Email', array('class' => ($errors->has('email') ? 'error' : '') )) }}
	{{ Form::text('email', Input::old('email'), array('class' => ($errors->has('email') ? ' error' : '') )) }}
	@if($errors->has('email'))
	<small class="error">{{ $errors->first('email') }}</small>
	@endif

	{{-- Password field --}}
	{{ Form::label('password', 'Password', array('class' => ($errors->has('name') ? 'error' : '') )) }}
	{{ Form::password('password', array('class' => ($errors->has('password') ? ' error' : '') )) }}
	@if($errors->has('password'))
	<small class="error">{{ $errors->first('password') }}</small>
	@endif

	{{ Form::submit('Login') }}
	{{ Form::close() }}
	@endsection
</div>
@endsection