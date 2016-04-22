//////////////////////////////////////////////////////////////////
// Add KatonPress Button
//////////////////////////////////////////////////////////////////

(function() {
    tinymce.PluginManager.add('kb_button', function( editor, url ) {
        editor.addButton( 'kb_button', {
            title: 'KB Shortcodes',
			type: 'menubutton',
            icon: 'icon fa fa-gear',
            menu: [
			
				{
                    text: 'Column',
                    value: '',
            
			
               onclick: function() {
				editor.windowManager.open( {
				title: 'Choose column',
				body: [{
					type: 'listbox', 
					name: 'width', 
					label: 'Column Width', 
					'values': [
						{text: '1/1', value: '1/1'},
						{text: '1/2', value: '1/2'},
						{text: '1/3', value: '1/3'},
						{text: '1/4', value: '1/4'},
						{text: '1/6', value: '1/6'},
						{text: '2/3', value: '2/3'},
						{text: '3/4', value: '3/4'}
					]
				},
				{
					type: 'textbox',
					name: 'padding',
					label: 'Padding'
				},
				{
					type: 'textbox',
					name: 'custom_class',
					label: 'Custom Class'
				},
				],
				onsubmit: function( e ) {
					editor.insertContent( '[column width="' + e.data.width + '" padding="' + e.data.padding + '" class="' + e.data.custom_class + '"] Your Content Here [/column]');
				}
			});
		} 
			
			
                },
				
				
				{
                    text: 'Divider',
                    value: '[divider type="space"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				
				
				{
                    text: 'Title',
                    value: '[title]Your Title Here[/title]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				
								
                {
                    text: 'Button',
                    value: '',
            
			onclick: function() {
			editor.windowManager.open( {
				title: 'Insert Button',
				body: [{
					type: 'textbox',
					name: 'title',
					label: 'Button title'
				},
				{
					type: 'textbox',
					name: 'url',
					label: 'Button Link'
				},
				{
					type: 'listbox', 
					name: 'target', 
					label: 'Target', 
					'values': [
						{text: 'Open in new window', value: '_blank'},
						{text: 'Open in same window', value: '_self'},
					]
				},
				{
					type: 'listbox', 
					name: 'color', 
					label: 'Color', 
					'values': [
						{text: 'Theme Color', value: 'theme_color'},
						{text: 'White', value: 'white'},
					]
				},
				{
					type: 'textbox',
					name: 'borderx',
					label: 'Button Border X Position',
					value: '100',
				}],
				onsubmit: function( e ) {
					editor.insertContent( '[button title="' + e.data.title + '" link="' + e.data.url + '" target="' + e.data.target + '" color="' + e.data.color + '" border_x="' + e.data.borderx + '"]');
				}
			});
		}
			

                },
				
				{
                    text: 'Portfolio',
                    value: '',
                
				onclick: function() {
				editor.windowManager.open( {
				title: 'Porfolio Option',
				body: [{
					type: 'listbox', 
					name: 'style', 
					label: 'Portfolio Style', 
					'values': [
						{text: 'Grid', value: 'grid'},
						{text: 'Carousel', value: 'carousel'},
					]
				},
				{
					type: 'textbox',
					name: 'items',
					label: 'Items'
				},

				],
				onsubmit: function( e ) {
					editor.insertContent( '[portfolio items="' + e.data.items + '" style="' + e.data.style + '" ]');
				}
			});
		} 
                },
						
				{
                    text: 'Team',
                    value: '',
                
				onclick: function() {
				editor.windowManager.open( {
				title: 'Team Option',
				body: [{
					type: 'listbox', 
					name: 'style', 
					label: 'Team Style', 
					'values': [
						{text: 'Horizontal', value: 'horizontal'},
						{text: 'Vertical', value: 'vertical'},
					]
				},
				{
					type: 'textbox',
					name: 'items',
					label: 'Items'
				},

				],
				onsubmit: function( e ) {
					editor.insertContent( '[team items="' + e.data.items + '" style="' + e.data.style + '" ]');
				}
			});
		} 
                },
				
				{
                    text: 'Testimonial',
                    value: '[testimonial items="8"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				
				{
                    text: 'Recent Posts',
                    value: '[recent_posts]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				
											
               {
                    text: 'Icon Box',
                    value: '',
            
			onclick: function() {
			editor.windowManager.open( {
				title: 'Insert Icon Box',
				body: [{
					type: 'textbox',
					name: 'title',
					label: 'Box title'
				},
				{
					type: 'textbox',
					name: 'content',
					label: 'Box Content'
				},
				{
					type: 'textbox',
					name: 'icon',
					label: 'Icon Name'
				},
				{
					type: 'listbox', 
					name: 'position', 
					label: 'Icon Position', 
					'values': [
						{text: 'Left', value: 'left'},
						{text: 'Right', value: 'right'},
					]
				}],
				onsubmit: function( e ) {
					editor.insertContent( '[iconbox title="' + e.data.title + '" content="' + e.data.content + '" icon="' + e.data.icon + '" position="' + e.data.position + '"]');
				}
			});
		}
			

                },
				
				{
                    text: 'Contact Icon Box',
                    value: '',
            
			onclick: function() {
			editor.windowManager.open( {
				title: 'Insert Contact Icon Box',
				body: [{
					type: 'textbox',
					name: 'content',
					label: 'Box Content'
				},
				{
					type: 'textbox',
					name: 'icon',
					label: 'Icon Name'
				},
				],
				onsubmit: function( e ) {
					editor.insertContent( '[contact_box icon="' + e.data.icon + '" content="' + e.data.content + '" ]');
				}
			});
		}
			

                },
				
				
				{
                    text: 'Contact Form',
                    value: '[contact_form]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				
				{
                    text: 'Piechart',
                    value: '[piechart title="Your Title" percent="50"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
				

           ]
        });
    });
})();
