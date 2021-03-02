(function($) {
  	"use strict";

  	var init = function() {
    	$('#sortable').html5sortable({
        	forcePlaceholderSize:true,
        	placeholderClass:'list-group-item',
      	}).on('sortupdate', function(e) {});

		//With handle
		$('#sortable-handle').html5sortable({
			forcePlaceholderSize:true,
			placeholderClass:'list-group-item',
			handle:'.js-handle'
		});

		//Sortable list
		$('#sortable-list').html5sortable({
			forcePlaceholderSize:true,
			placeholderClass:'list-item'
		});

    	//Sortable table
    	$('#sortable-table').html5sortable();
  	}

  	//For ajax to init again
  	$.fn.html5sortable.init = init;

}) (jQuery);
