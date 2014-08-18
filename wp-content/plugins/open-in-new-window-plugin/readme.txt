=== Open in New Window Plugin ===
Tags: outbound, links, open, new window
Donate link: http://www.blogseye.com/buy-the-book/
Requires at least: 3.0
Tested up to: 3.5
Contributors: Keith Graham
Stable tag: 2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Opens external links in a new window, keeping your blog page in the browser so you don't lose surfers to another site.

== Description ==
The Open in New Window Plugin Plugin uses JavaScript to target external links to a new browser window, leaving your blog page open. 
Since it uses javascript, it targets more links than using a plugin that filter pages and rewrite the link. The plugin will find many links generated in scripts or pasted into posts and comments.
Due to the limitations of  javascript it will not be able target links in iframes such as Adsense and some other affiliate links.

== Installation ==
1. Download the plugin.
2. Upload the plugin to your wp-content/plugins directory.
3. Activate the plugin.

== Changelog ==

= 2.3 =
* Added security check.
* broke up the program to reduce load overhead
* added the first settings option to this plugin. Some files types, when found in local site, can be forced to open in a new window. These include: .pdf, .mp3, .jpg, .gif, .tiff, .png, .doc, .rtf, .docx, .xls, .wmv, .mov, .avi, .zip, .rar, .7z and .arc. Check off the option box in the settings. On by default.

= 2.2 =
Fixed bug in javascript that allowed some types to open in new window.

= 2.1 =
Added support to load certain file types in a new window. Disabled in wp-admin screens to prevent reported issues with the admin toolbar.

= 2.0 =
Now loading the script as a js file in order to cache the hits and speed page loads.

= 1.9 =
Stopped updating the title parameter for images.

= 1.8 =
Added javascript in a few more places, just in case. Tested on WP 3.1

= 1.7 =
HTTPS and FTP now open in new windows.

= 1.6 =
Prevented links that already have a target from being rewritten. 

= 1.5 =
Fixed an issue with Wordpress 3.0 alpha test. 
Added a title attribute to links when when none exists. It uses the innerHTML to the link to display a title when you hover over the link.
Added a pingback link so you can add your blog link to my plugin users page. It's a free inbound link for you, probably of little value.

= 1.4 =
Added a setup screen for feedback that the plugin is installed correctly

= 1.3 =
Fixed an issue with IE6. The current code works under IE6

= 1.2 =
* Added support for links with url of javascript: so as not to open in new window. 

= 1.1 =
* Added onload event so as not to miss a few other links that might be also loaded in onload. = 1.2 =
* Added support for links with url of javascript: so as not to open in new window. 

= 1.0 =
* initial release 

== Upgrade Notice ==

= 2.3 =
Added features and improved security

= 2.2 =
Bug fix in javascript

= 2.1 =
Added support to load certain file types in a new window.

= 2.0 =
Uses a static js file that can be cached to speed up loads.

= 1.8 =
Added javascript in a few more places.

= 1.6 =
Prevented links that already have a target from being rewritten. 

= 1.5 =
Fixed an issue with Wordpress 3.0 alpha test. 

= 1.3 =
Fixed an issue with IE6. The current code works under IE6

= 1.2 =
Links with "javascript:" as url tried to open in a new window and did not operate correctly. This detects this and acts appropriately.

= 1.1 =
If you had issues where some links did not open in a new window, this might help. It delays modifying the links until after the page has loaded. If 1.0 is working for you then don't bother as no bugs were fixed.


== Support ==
This plugin is free and I expect nothing in return. If you wisht to support my programming, buy my book: 
<a href="http://www.blogseye.com/buy-the-book/">Error Message Eyes: A Programmer's Guide to the Digital Soul</a>
Other plugins:
<a href="http://wordpress.org/extend/plugins/permalink-finder/">Permalink Finder Plugin</a>
<a href="http://wordpress.org/extend/plugins/open-in-new-window-plugin/">Open in New Window Plugin</a>
<a href="http://wordpress.org/extend/plugins/kindle-this/">Kindle This - publish blog to user's Kindle</a>
<a href="http://wordpress.org/extend/plugins/stop-spammer-registrations-plugin/">Stop Spammer Registrations Plugin</a>
<a href="http://wordpress.org/extend/plugins/no-right-click-images-plugin/">No Right Click Images Plugin</a>
<a href="http://wordpress.org/extend/plugins/collapse-page-and-category-plugin/">Collapse Page and Category Plugin</a>
<a href="http://wordpress.org/extend/plugins/custom-post-type-list-widget/">Custom Post Type List Widget</a>

