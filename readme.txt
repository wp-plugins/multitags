=== MultiTags ===
Contributors: svogel
Donate link: http://www.piratenspielzeug.com
Tags: multitags, multiple tags, seo, meta keywords, meta description
Requires at least: 2.8
Tested up to: 3.01
Stable tag: 0.2

Display correct tags when calling a tag-page with more than one tag.

== Description ==

Ever noticed that on tag-pages multiple tags are possible? E.g. if you want to show all
posts having "tag1" AND "tag2", just go to
http://yourwordpressblog/tag/tag1+tag2

But only "tag1" is correctly displayed (see screenshots). 
With this plugin you can use more than one tag correctly. This is especially interesting if
you want to optimize some key phrases (like "tag1 tag2") for searchengines.

Moreover this plugin can add the description of the tags to your tag-pages, simply put
`&lt;?php echo multi_tags_get_description('&lt;p&gt;', '&lt;/p&gt;'); ?&gt;`
into your theme-file "tag.php".
To display the correct tags, just replace the call to `single_tag_title( '', false )` with
`echo get_multi_tags_get_title('and', 'or')`

The inclusion of your tags into "meta keywords" resp. the inclusion of the tag-descriptions 
in "meta description" is done by the plugin. 
Simply check the corresponding checkboxes in the MultiTags-setting-page.

For more examples and background information have a look at: 

http://www.vogel-nest.de/wp_multitags_plugin

== Installation ==

Just the usual procedure

1. Download und unpack the plugin 
1. Upload the directory "multitags" to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. adapt the settings on the settings-page "MultiTags"
1. to display the correct headers on the tags-pages put `multi_tags_get_title('and', 'or')` into your tag.php in your theme-folder

== Frequently Asked Questions ==

No questions so far. If you have any, don't hesitate to ask me - or comment on http://www.vogel-nest.de/wp_multitags_plugin


== Screenshots ==

1. The usual display without MultiTags-plugin without_multitags.png
1. Better title, heading on multiple tags with the MultiTags-plugin with_multitags.png
1. Settings provided, choose if you want to add keywords/description in head-meta-tag of your tag-pages settings.png

== Thanks ==

To Frank Bueltge http://bueltge.de for motivation and checking the first draft.

== Changelog ==

= 0.2 =

* corrected fatal-error on activation
* several clean-ups 
* corrected versioning - sorry, my first plugin :-/

= 0.1 =
initial version