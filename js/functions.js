jQuery('document').ready(function($){


	//---------------------------------------------------------------------
	// FITVIDS
	//---------------------------------------------------------------------
	$("#main-content").fitVids();
	
	
	//---------------------------------------------------------------------
	// RESPONSIVE MENU
	//---------------------------------------------------------------------
	$('nav li:has(> ul)').hover(function(){
		$(this).addClass('active');
	}, function(){
		$(this).removeClass('active');
	});
	
	$('<span id="main-menu-select-container"><select /></span>').appendTo('#main-nav');
	
	$('<option />', {
	    'selected': 'selected',
	    'value'   : '',
	    'text'    : 'Menu'
	}).appendTo('#main-nav select');
	
	$('#main-nav a').each(function() {
	    var el = $(this);
	    if(el.parents('ul:not(#menu-main-menu)').length) {
	        $('<option />', {
	            'value': el.attr('href'),
	            'text':  '- ' + el.text()
	        }).appendTo('nav select');
	    } else {
	        $('<option />', {
	            'value': el.attr('href'),
	            'text': el.text()
	        }).appendTo('nav select');
	    }
	});
	
	$("#main-nav select").change(function() {
	  window.location = $(this).find("option:selected").val();
	});
		
		
		
	
	//---------------------------------------------------------------------
	// HEADER SEARCH
	//---------------------------------------------------------------------
	$('#open-search').click(function(e){
		
		if( $(this).hasClass('open') ) {
			$('#header-search').stop(true, true).slideUp(300);
			$(this).removeClass('open');
		} else {
			$('#header-search').stop(true, true).slideDown(300);
			$(this).addClass('open');
		}
		
		e.preventDefault();
	});
	
		

	

});