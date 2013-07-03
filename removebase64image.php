<?php
/*
Plugin Name: TinyMCE remove-base-64-image
Plugin URI: http://www.pixeltiger.co.uk/plugins-public.html
Description: A plugin for removing base64 images dropped into the tinymce editor in Firefox
Version: 1.0.2
Date: 2013-07-03
Author: Jon Collier
Author URI: http://www.pixeltiger.co.uk/
License: GPL3

2013 © Jon Collier

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 3, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, read it at http://www.gnu.org/licenses/gpl.html
*/
function removebase64image_init() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_removebase64image_plugin");
	}
}

function add_removebase64image_plugin($plugin_array) {
	$plugin_array['removebase64image'] = plugins_url().'/tinymce-remove-base-64-image/removeBase64/editor_plugin.js';
	return $plugin_array;
}

add_action('init', 'removebase64image_init');