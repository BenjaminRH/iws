@layout('layouts.main')

@section('content')
<script>
	(function() {
		var cx = '003984429820991102643:5apkjo7gqta';
		var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
				'//www.google.com/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
	})();
</script>

<gcse:searchresults-only></gcse:searchresults-only>
@endsection