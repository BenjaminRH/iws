{{-- Redactor --}}
{{ HTML::style('css/redactor.css') }}
{{ HTML::script('js/redactor.min.js') }}

{{-- Chosen --}}
{{ HTML::style('css/chosen.css') }}
{{ HTML::script('js/chosen.jquery.min.js') }}

{{-- Initialize --}}
<script>
$(document).ready(function() {
	// Redactor
	$('.editor').redactor({
		buttons: [
			'html',
			'|',
			'bold', 'italic', 'underline', 'deleted',
			'|',
			'unorderedlist', 'orderedlist', 'outdent', 'indent',
			'|',
			'image', 'video', 'link'
		],
		fixed: true
	});

	// Chosen
	$('.chzn-select').chosen({
		allow_single_deselect: false, // Requires the first option to be blank
		no_results_text: "No results match"
	});
});
</script>