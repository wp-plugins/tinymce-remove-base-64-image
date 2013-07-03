=== TinyMCE remove-base-64-image ===
Contributors: LingoJon
Donate link: http://www.pixeltiger.co.uk/plugins-public.html#donate
Tags: base64, image, TinyMCE, firefox
Requires at least: 3.5.1
Tested up to: 3.5.2
Stable tag: /trunk/
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

"TinyMCE remove-base-64-image" immediately removes images dropped into the TinyMCE editor with Firefox and alerts the user with the reason.

== Description ==

Firefox allows a user to drag and drop an image from their desktop into the TinyMCE editor (Visual), where it is immediately converted to base64 code, which is undesirable as the image file size is much larger than the equivalent added by the standard WordPress method because...  

* base64 images are larger than binary images
* WordPress would normally have 'crunched'  the image to give various different sizes, including a thumbnail, all smaller than the original

To prevent this, "TinyMCE remove-base-64-image" contains a small piece of javascript that checks the TinyMCE editor every 1.5 seconds and immediately removes any base64 image found, also displaying an alert message: 

'Sorry, dragging images into the editor is blocked as it will cause your webpages to load slowly, please use the "Add Media" button!'.

If you manage multiple WordPress sites this plugin will save you time checking if your clients are unwittingly crippling their page downloads.

A [PixelTiger](http://www.pixeltiger.co.uk/program.html) plugin.

== Installation ==

1. Upload the folder `tinymce-remove-base64-image` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Why does this plugin sometimes take more than 1.5 seconds to give an alert =

"TinyMCE remove-base-64-image" can only remove an image and alert the user after browser conversion of the image to base64 code has completed, and this takes longer for large images.

= Why doesn't this plugin work with my theme? =

Make sure you have the following hook in your theme's header.php file just before `</head>`:

`<?php wp_head(); ?>`

= Does this plugin have any javascript dependencies? =

Only TinyMCE, the default WordPress editor.

== Screenshots ==

1. This shows the javascript alert message produced by dropping an image into the TinyMCE editor.  If you want to change it edit line 13 of /removeBase64/editor_plugin.js

== Changelog ==

= 1.0.2 =
Corrected folder name in path.

= 1.0.1 =
Fixed broken path to editor_plugin.js caused by WP_PLUGIN_URL no longer working in WordPress 3.5.2. Now uses plugins_url(). Also simplified javascript to use setInterval without unnecessary closure.

= 1.0.0 =
First version released.

== Upgrade Notice ==
No upgrades available yet.

== Developer Notes ==

I am aware that using setInterval to detect a freshly dropped image is not ideal from a theoretical standpoint as most of the time it's unnecessary and it could impact TinyMCE performance, albeit by a tiny amount.  If you check the TinyMCE forums you will find another suggested method: [Disable drag/drop facility](http://www.TinyMCE.com/forum/viewtopic.php?id=5090) (last post by Arvind, 2012-07-09) which involves modifying tiny_mce.js to detect the DOMNodeInserted event then deleting the new image node.  While this seems sound, if you try to locate the '_addEvents function section' mentioned you'll find it's not in tiny_mce.js version 3.5.8-wp. I also searched the TinyMCE documentation for a way to bind this event in a plugin, but no joy there either.

So if you're a javascript genius feel free to make this plugin redundant with a DOM checking one.  Until that time arrives I hope people find this useful.