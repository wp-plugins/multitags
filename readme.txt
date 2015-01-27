=== MultiTags ===
Contributors: svogel
Donate link: http://www.piratenspielzeug.com
Tags: multitags, multiple tags, seo, meta keywords, meta description
Requires at least: 2.8
Tested up to: 4.1
Stable tag: 0.6

Display correct tags when calling a tag-page with more than one tag.

== Description ==

Ever noticed that on tag-pages multiple tags are possible? E.g. if you want to show all
posts having "tag1" AND "tag2", just go to
http://yourwordpressblog/tag/tag1+tag2

But only "tag1" is correctly displayed (see screenshots). 
With this plugin you can use more than one tag correctly. This is especially interesting if
you want to optimize some key phrases (like "tag1 tag2") for searchengines.

Moreover this plugin can add the description of the tags to your tag-pages, simply put

`<?php echo multi_tags_get_description('<p>', '</p>'); ?>`

into your theme-file "tag.php".
To display the correct tags, just replace the call to 

`single_tag_title( '', false )` 

with

`if (function_exists('multi_tags_get_title'))
    echo multi_tags_get_title('and', 'or')
else
    single_tag_title( '', false )`

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

= How to provide the correct feed-url on multi-tag-pages? =

You have to handcraft a little bit and change the core. However I don't recommend it, because after upgrading you 
have to insert your change again. So be careful.
Go to wp-includes/general-template.php and find the lines (around lineno 2294):

`$title = sprintf( $args['tagtitle'], get_bloginfo('name'), $args['separator'], $term->name );
$href = get_tag_feed_link( $term->term_id );`

replace it with:

`if ( function_exists('multi_tags_get_title') )
    $title = sprintf( $args['tagtitle'], get_bloginfo('name'), $args['separator'], multi_tags_get_title() );
else
    $title = sprintf( $args['tagtitle'], get_bloginfo('name'), $args['separator'], $term->name );
if ( function_exists('multi_tags_get_tag_feed_link') )
    $href = multi_tags_get_tag_feed_link( $term->term_id );
else
    $href = get_tag_feed_link( $term->term_id );`


== Screenshots ==

1. The usual display without MultiTags-plugin without_multitags.png
2. Better title, heading on multiple tags with the MultiTags-plugin with_multitags.png
3. Settings provided, choose if you want to add keywords/description in head-meta-tag of your tag-pages settings.png
4. Wordpress now provides the correct multiple-tag-feed

== Thanks ==

To Frank Bueltge http://bueltge.de for motivation and checking the first draft.

== Changelog ==

= 0.6 =

Adapted to wordpress >= 4
Corrected feed-url-code in readme.txt

= 0.5 =

* fixed dump slipped in letter, that lead to syntax-error
* I'm really sorry.

= 0.4 =

* fixed typo in readme.txt
* now testet with 3.2.1
* MultiTags ist broken in WP 3.1.1 due to a bug in WP http://core.trac.wordpress.org/ticket/17054

= 0.3 =

* added function multi_tags_get_tag_feed_link to support correct feeds

= 0.2 =

* corrected fatal-error on activation
* several clean-ups 
* corrected versioning - sorry, my first plugin :-/

= 0.1 =

initial version
