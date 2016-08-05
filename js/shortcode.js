(function() {
    tinymce.PluginManager.add('vl_button', function( editor, url ) {
	
		function vlContent(shortcode, more = '') {
		
			if(more) { more = ' ' + more; }
		
			if(editor.selection.getContent() != ''){
				
				editor.selection.setContent('[' + shortcode + more + ']' + editor.selection.getContent() + '[/' + shortcode + ']');
			} else if(editor.selection.getContent() == '') {
				editor.selection.setContent('[' + shortcode + more + ']');
			}
		
		}
	
        editor.addButton( 'vl_button', {
            type: 'menubutton',
            text: 'CSS Tabs',
			icon: 'icon vl_dashicons vl_dashicons-tabs',	
            menu: [
				{
                    text: 'Add Tab',
						menu: [	
						{
							text: 'First Tab',
							onclick: function() {
								vlContent('tab','name="TabTitle" check="1"');
							}
						},						
						{
							text: 'Tab',
							onclick: function() {
								vlContent('tab','name="TabTitle"');
							}
						},
					]
				},			
				{
                    text: 'Wrap Tabs',
					menu: [		
						{
							text: 'Wrap Tabs with standard width and standard animation',
							onclick: function() {
								vlContent('tabbing');
							}
						},		
						{
							text: 'Wrap Tabs with manual width and animation',
							onclick: function() {
								vlContent('tabbing','width="" ani=""');
							}
						},		
						{
							text: 'Wrap Tabs with standard width and manual animation',
							onclick: function() {
								vlContent('tabbing','ani=""');
							}
						},
					]
				},
           ],
        });	
		
    });
})();