(function ($, MODULE_CONFIG, MODULE_OPTION_CONFIG) {
  	"use strict";
  
	$.fn.plugin = function() {
        return this.each(function() {
        	var self = $(this);
        	var opts = self.attr('data-option') || self.attr('data-plugin-option');
        	var attr = self.attr('data-plugin');

        	//Prepare the options
			var options = opts && eval('['+opts+']');
			
			if (options && $.isPlainObject(options[0])) {
				options[0] = $.extend({}, MODULE_OPTION_CONFIG[attr], options[0]);
			}

			//Check if the plugin loaded and has option in the attribute
			if (self[attr] && opts) {
				//Init plugin with the potion on it's attribute
				self[attr].apply(self, options);
			} else {
				//Load the plugin
				lazyload.load(MODULE_CONFIG[attr]).then(function() {
					//Init plugin with the potion on it's attribute
					opts && self[attr].apply(self, options);
					
					//Call the plugin init()
					self[attr] && self[attr].init && self[attr].init();
					
					//Call other init()
					window[attr] && window[attr].init && window[attr].init();
				});
			}
        });
	}

}) (jQuery, MODULE_CONFIG, MODULE_OPTION_CONFIG);




