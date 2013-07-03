/*
 * editor_plugin.js
 * This plugin removes any base64 image which has been dropped into the tinymce visual editor which could otherwise seriously impact page load time
 */
(function() {
	tinymce.create('tinymce.plugins.removebase64imagePlugin', {
		init : function(ed, url) {	
			function stripBase64images(){
				var _html = ed.getContent({format : 'raw'});
				if (_html.match(/<img[^>]+src="data:image.*?;base64[^>]*?>/g)){
					_html = _html.replace(/<img[^>]+src="data:image.*?;base64[^>]*?>/g, '');			
					ed.setContent(_html, {format : 'raw'});
					alert('Sorry, dragging images into the editor is blocked as it will cause your webpages to load slowly, please use the "Add Media" button!');
				}
			}
			setInterval(stripBase64images,1500);
		},		
		getInfo : function() {
			return {
				longname : 'removebase64image Plugin',
				author : 'Jon Collier',
				authorurl : 'http://www.pixeltiger.co.uk/program.html',
				infourl : 'http://www.pixeltiger.co.uk/program.html',
				version : "1.0"
			};
		}
	});
	// Register plugin
	tinymce.PluginManager.add('removebase64image', tinymce.plugins.removebase64imagePlugin);
})();