=== MultiTags ===
Contributors: svogel
Donate link: http://www.piratenspielzeug.com
Tags: multiple tags, seo, meta keywords, meta description
Requires at least: 2.8
Tested up to: 3.01
Stable tag: trunk

Display correct tags when calling a tag-page with more than one tag.

== Description ==

Ever noticed that on tag-pages multiple tags are possible? E.g. if you want to show all
posts having "tag1" AND "tag2", just go to
http://yourwordpressblog/tag/tag1+tag2

But only "tag1" is correctly displayed. 
With this plugin you can use more than one tag correctly. This is especially interesting if
you want to optimize some key phrases (like "tag1 tag2") for searchengines.

Moreover this plugin can add the description of the tags to your tag-pages, simply put
`<?php multi_tags_get_description('<p>', '</p>'); ?>`
into your theme-file "tag.php".
To display the correct tags, just replace the call to `single_tag_title( '', false )` with
`multi_tags_get_title('and', 'or')`

The inclusion of your tags into "meta keywords" resp. the inclusion of the tag-descriptions 
in "meta description" is done by the plugin. 
Simply check the corresponding checkboxes in the MultiTags-setting-page.

For more examples and background have a look at: http://www.vogel-nest.de/wp_multitags_plugin

== Installation ==

Just the usual procedure
1. Download und unpack the plugin 
1. Upload the directory "multitags" to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. adapt the settings on the settings-page "MultiTags"

== Frequently Asked Questions ==

= None so far =


== Screenshots ==

None

== Thanks ==

To Frank Bueltge (http://bueltge.de) for motivation and checking the first draft.

== Changelog ==

= 0.1 =
initial version