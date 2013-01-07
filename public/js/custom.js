$(document).ready(function () {
	// Navigational Menu ddsmoothmenu
	ddsmoothmenu.init({
		mainmenuid: "menu", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'navigation', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	});

	// add js class to html tag
	$('html').addClass('js');

	// Responsive Navigation Menu by SelectNav
	selectnav('nav', {
		label: '- Navigation Menu - ',
		nested: true,
		indent: '-'
	});

	// UItoTop plugin 	
	$().UItoTop({
		easingType: 'easeOutQuart'
	});

	// Flex Slider
	$('.flexslider').flexslider({
		animation: 'fade',
		animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
		slideshow: true, //Boolean: Animate slider automatically
		slideshowSpeed: 4500, //Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 700, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
		pauseOnHover: true,
		pauseOnAction: false,
		controlNav: true,
		directionNav: false,
		controlsContainer: '.flex-container'
	});

	$('.flexslider2').flexslider({
		animation: 'slide',
		animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
		slideshow: false, //Boolean: Animate slider automatically
		slideshowSpeed: 4500, //Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 700, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
		pauseOnHover: true,
		pauseOnAction: false,
		controlNav: false,
		directionNav: true,
		controlsContainer: '.flex-container'
	});

	$('.flexslider3').flexslider({
		animation: 'slide',
		animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
		slideshow: false, //Boolean: Animate slider automatically
		slideshowSpeed: 4500, //Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 700, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
		pauseOnHover: true,
		pauseOnAction: false,
		controlNav: false,
		directionNav: true,
		controlsContainer: '.flex-container'
	});

	// Sliding Text and Icon Menu Style
	$('#sti-menu').iconmenu();

	// Accordion
	$("#accordion").accordion({
		autoHeight: false,
		icons: {
			"header": "plus",
			"headerSelected": "minus"
		}
	});

	// Progress Bar
	$(".meter > span").each(function () {
		$(this)
			.data("origWidth", $(this).width())
			.width(0)
			.animate({
			width: $(this).data("origWidth")
		}, 1200);
	});

	// Alert Boxes
	// Closing notifications 
	// this is the class that we will target
	$(".hideit").click(function () {
		//fades the notification out	
		$(this).fadeOut(600);
	});

	// Tabs
	$("#horizontal-tabs").tytabs({
		tabinit: "1",
		fadespeed: "fast"
	});
	$("#horizontal-tabs.a").tytabs({
		tabinit: "1",
		prefixtabs: "taba",
		prefixcontent: "contenta",
		fadespeed: "fast"
	});
	$("#horizontal-tabs.b").tytabs({
		tabinit: "1",
		prefixtabs: "tabb",
		prefixcontent: "contentb",
		fadespeed: "fast"
	});
	$("#horizontal-tabs.c").tytabs({
		tabinit: "1",
		prefixtabs: "tabc",
		prefixcontent: "contentc",
		fadespeed: "fast"
	});

	$("#vertical-tabs").tytabs({
		prefixtabs: "tabz",
		prefixcontent: "contentz"
	});
	$("#vertical-tabs.a").tytabs({
		prefixtabs: "taba",
		prefixcontent: "contenta"
	});
	$("#vertical-tabs.b").tytabs({
		prefixtabs: "tabb",
		prefixcontent: "contentb"
	});
	$("#vertical-tabs.c").tytabs({
		prefixtabs: "tabc",
		prefixcontent: "contentc"
	});

	// Toggle
	$('#toggle-view li').click(function () {

		var text = $(this).children('div.panel');

		if (text.is(':hidden')) {
			text.slideDown('200');
			$(this).children('span').html('-');
		} else {
			text.slideUp('200');
			$(this).children('span').html('+');
		}
	});

	// jQuery Prettyphoto Lightbox
	$("area[rel^='prettyPhoto']").prettyPhoto();
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'fast',
		theme: 'pp_default',
		slideshow: 4000,
		opacity: 0.50,
		deeplinking: false,
		overlay_gallery: false,
		autoplay_slideshow: false
	});

	// Isotope Filtering
	var $container = $('#contain');

	// initialize Isotope
	$container.isotope({
		// options...
		resizable: false, // disable normal resizing
		// set columnWidth to a percentage of container width
		masonry: {
			columnWidth: $container.width() / 12
		}
	});

	// update columnWidth on window resize
	$(window).smartresize(function () {
		$container.isotope({
			// update columnWidth to a percentage of container width
			masonry: {
				columnWidth: $container.width() / 12
			}
		});
	});

	$container.isotope({
		itemSelector: '.item',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: true
		}
	});

	var $optionSets = $('#options .option-set');
	$optionLinks = $optionSets.find('a');

	$optionLinks.click(function () {
		var $this = $(this);
		// don't proceed if already selected
		if ($this.hasClass('selected')) {
			return false;
		}

		var $optionSet = $this.parents('.option-set');
		$optionSet.find('.selected').removeClass('selected');
		$this.addClass('selected');

		// make option object dynamically, i.e. { filter: '.my-filter-class' }
		var options = {};
		key = $optionSet.attr('data-option-key');
		value = $this.attr('data-option-value');

		// parse 'false' as false boolean
		value = value === 'false' ? false : value;
		options[key] = value;

		if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
			// changes in layout modes need extra logic
			changeLayoutMode($this, options)
		} else {
			// otherwise, apply new options
			$container.isotope(options);
		}

		return false;
	});

	// Elastic Slider
	$('#ei-slider').eislideshow({
		animation: 'center',
		autoplay: true,
		slideshow_interval: 3000,
		thumbMaxWidth: 188,
		titlesFactor: 0
	});

	// Twitter feed
	jQuery(".tweet").tweet({
		join_text: false,
		username: "indiewebseries", // Change username here
		avatar_size: false, // you can active avatar
		count: 3, // number of tweets
		seconds_ago_text: "about %d seconds ago",
		a_minutes_ago_text: "about a minute ago",
		minutes_ago_text: "about %d minutes ago",
		a_hours_ago_text: "about an hour ago",
		hours_ago_text: "about %d hours ago",
		a_day_ago_text: "about one day ago",
		days_ago_text: "about %d days ago",
		view_text: "view on twitter"
	});

	// Search
	$("#site-search").select2({
		placeholder: "Search posts",
		minimumInputLength: 3,
		ajax: {
			url: "http://indiewebseries.com/search",
			dataType: 'json',
			quietMillis: 500,
			data: function (term, page) {
				return {
					q: term,
					page_limit: 10,
					page: page // page number
				};
			},
			results: function (data, page) {
				var more = (page * 10) < data.length; // whether or not there are more results available);

				// return the value of more to tell if more results can be loaded
				return {results: data, more: more};
			}
		},
		formatResult: function(post) {
			// return html markup for individual result item
			markup = '<img src="'+post.image+'" style="width:40%;float:left;margin-right:5px">';
			markup += '<p>'+post.title+'</p>';
			markup += '<div class="clearfix"></div>';
			return markup;
		},
		formatSelection: function(post) {
			// This shows up in the select box
			return post.title;
		},
		dropdownCssClass: "bigdrop" // apply css that makes the dropdown taller
	}).on('change', function(e) {
		try {
			var slug = e.val.slug;
			window.location.href = "http://indiewebseries.com/posts/"+slug;
		} catch(error) {
			console.log('Selected search result is invalid: ');
		}
	});
});