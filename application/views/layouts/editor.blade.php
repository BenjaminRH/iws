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
		fixed: true,
		wym: true,
		cleanup: true
	});

	// Chosen
	$('.chzn-select').chosen({
		allow_single_deselect: false, // Requires the first option to be blank
		no_results_text: "No results match"
	});
});
</script>

{{-- Slug and Title --}}
<script>
String.prototype.toTitleCase = function () {
    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

$('#title-fix').click(function() {
	// Set the title to title case
	var title = $('#title').val();

	$('#title').val(title.toTitleCase());

	return false;
});

$('#slug-fix').click(function() {
	// Set the slug
	// title -> to lower case ->
	// replace all spaces with dashes ->
	// remove all non alphanumeric characters that are not dashes

	var title = $('#title').val();

	$('#slug').val(
		title.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-]/g, '')
	);

	return false;
});
</script>