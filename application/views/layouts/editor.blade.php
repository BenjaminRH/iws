{{ HTML::style('css/redactor.css') }}
{{ HTML::script('js/redactor.min.js') }}

<script>
$(document).ready(function() {
	$('.editor').redactor({
		buttons: [
			'html',
			'|',
			'bold', 'italic', 'underline', 'deleted',
			'|',
			'unorderedlist', 'orderedlist', 'outdent', 'indent',
			'|',
			'image', 'video', 'link'
		]
	});
});
</script>