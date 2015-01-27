<?php
/*
Plugin Name: MultiTags
Plugin URI: http://www.vogel-nest.de/wp_multitags_plugin
Description: SEO-Improvement for tag-pages for keywords and description
Version: 0.6
Author: Stefan Vogel
Author URI: http://www.vogel-nest.de

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/


class MultiTags {
    // cache the tags
    protected $aoTags; 
    protected $adminFile = 'multitags/multitags.php';

    // name for our options in the DB
    protected $dbOption = 'multitags_options';
    
    function MultiTags() {
        global $wp_version;
        $this->aoTags = null;

        $exit_msg = 'MultiTags requires WordPress 2.8 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
        if (version_compare($wp_version, "2.8", "<")) {
            exit($exit_msg);
        }

        if (is_admin()) {
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action('admin_init', array($this, 'admin_init'));
        }
    }

    protected function get_tags() {
        if ($this->aoTags) return $this->aoTags;
        if (is_tag()) {
            $tagSlug = get_query_var('tag');
            $tagSlug = str_replace(" ","+",$tagSlug);
            if (strpos($tagSlug,",")===false) {
                $this->aoTags = explode("+", $tagSlug);
            } else {
                //bei , wird aus + bzw. Leerz. auch ODER
                $this->aoTags = explode(",", str_replace("+",",",$tagSlug));
            }
            return $this->aoTags;
        }
        return NULL;
    }
    
    // handle plugin options
    public function get_options($key = NULL, $value = NULL) {
        // default values
        $options = array (
            'b_show_title' => "on",
            'b_show_meta' => "on",
            'b_gratitude' => "",
        );
        // get saved options
        $saved = get_option($this->dbOption);
        if ($key && !$value) {
            // ok, just getting a specific value
            return $saved[$key];
        }
        // assign them, for this if, we have the dummy assignement
        if (!empty($saved)) {
            foreach ($saved as $key => $option)
                $options[$key] = $option;
            foreach ($options as $key => $option) {
                if (!array_key_exists($key, $saved)) 
                    unset($options[$key]);            
            }
        }

        if ($value) {
            $options[$key] = $value;
        }
        // update the options if necessary
        if ($saved != $options)
            update_option($this->dbOption, $options);
        return $options;
    }
    
    public function install() {
        // set default options
        $this->get_options();
    }
    
    public function admin_init() {
        register_setting($this->dbOption, $this->dbOption);
    }
    
    public function admin_menu() {
        add_options_page('MultiTags', 'MultiTags', 1, $this->adminFile, array($this, 'handle_options'));
    }
        
    // admin-page with list of events, guestlists, ...
    public function handle_options() {
        $options = $this->get_options();
        if ($options) {
            foreach ($options as $key => $value) {
                ${$key} = ($value == "on" ? ' checked="checked"':'');
            }        
        }
        include('multitags_options.php');
    }

    // set meta-keywords and meta-description    
    public function head() {
        $options = $this->get_options();
        $aoTags = $this->get_tags();
        if ($aoTags && $options['b_show_meta']) {
            $lTags = $lTagDescs = array();
            foreach ($aoTags as $t) {
                $tag = get_term_by("slug", $t, "post_tag", OBJECT);
                if ($tag) {
                    if ($tag->name) {
                        $lTags[] = mb_convert_case($tag->name, MB_CASE_TITLE);                
                    }
                    if ($tag->description) {
                        $lTagDescs[] = $tag->description;
                    }
                }
            }
            if (count($lTags)) echo '<meta name="keywords" content="'.implode(', ', $lTags).'" />'."\n";
            if (count($lTagDescs))echo '<meta name="description" content="'.implode(', ', $lTagDescs).'" />'."\n";    
        }    
    }
    
    // set page-head-title
    public function title($title) {
        $options = $this->get_options();
        $aoTags = $this->get_tags();
        if ($aoTags && $options['b_show_title']) {
            $lTags = array();
            foreach ($aoTags as $t) {
                $tag = get_term_by("slug", $t, "post_tag", OBJECT);
                if ($tag && $tag->name) {
                    $lTags[] = mb_convert_case($tag->name, MB_CASE_TITLE);                
                }
            }
            if (count($lTags)) return implode(' ', $lTags);
        }
        return $title;
    }
    
    public function footer() {
        $options = $this->get_options();
        if (is_tag() 
            && count($this->get_tags()) >= 2
            && $options['b_gratitude']) {
            echo '<span id="multitagsthanks">Generated with aid of <a href="http://www.vogel-nest.de/wp_multitags_plugin" title="Wordpress MultiTags">MultiTags</a></span>';
        }
    }
    
    public function get_tag_title($andOp = 'and', $orOp = 'or') {
        if (is_tag()) {
            $tag_slug = get_query_var('tag');
            $tag_slug = str_replace(" ","+",$tag_slug);
            if (strpos($tag_slug,",")===false) {
                $tags = explode ("+", $tag_slug);
                $tagOp = $andOp;
            } else {
                //bei , wird aus + bzw. Leerz. auch ODER
                $tags = explode (",", str_replace("+",",",$tag_slug));
                $tagOp = $orOp;
            }        
            $lTags = array();
            foreach ($tags as $t) {
                $tag = get_term_by ("slug",$t,"post_tag",OBJECT);
                $lTags[] = mb_convert_case($tag->name, MB_CASE_TITLE);
            }
            if (count($lTags)) {
                return implode($tagOp, $lTags);
            }
        }
        return '';
    }
    
    public function get_tag_description( $beforeDesc = '', $afterDesc = '' ) {
        $aoTags = $this->get_tags();
        if ($aoTags) {
            $lTagDescs = array();
            foreach ( $aoTags as $t ) {
                $tag = get_term_by( "slug",$t,"post_tag",OBJECT );
                $lTagDescs[] = $tag->description;
            }
            if ( count( $lTagDescs ) ) {
                return $beforeDesc.implode( $afterDesc.$beforeDesc, $lTagDescs ).$afterDesc;
            }
        }
        return '';
    }

    public function settings_link( $links, $file ) {
 	    if ( $file == $this->adminFile ) {
		    $settings_link = '<a href="' . admin_url( 'options-general.php?page='.$this->adminFile ).'">'.__('Settings').'</a>';
		    array_unshift( $links, $settings_link ); // before other links
	    }
	    return $links;
    }
    
    
    protected function getCurrentUrl() {
        $pageUrl = 'http'.($_SERVER['HTTPS'] == 'on' ? 's': '').'://'.$_SERVER['SERVER_NAME'];
        $pageUrl .= ($_SERVER['SERVER_PORT'] != '80' ? ':'.$_SERVER['SERVER_PORT'] : '').$_SERVER['REQUEST_URI'];
        return $pageUrl;
    }
    
    public function rss( $term_id, $feed = '' ) {
        // get_tag_feed_link($tag_id, $feed)  in link-template.php
        // calls: return get_term_feed_link($tag_id, 'post_tag', $feed);
        // $term = get_queried_object();
        // print "<!-- ".print_r($term, true)." --!>";
        if (is_tag()) {
            $tag_slug = get_query_var('tag');
            $tag_slug = str_replace(" ","+",$tag_slug);
            if (strpos($tag_slug,",")===false) {
                $tags = explode ("+", $tag_slug);
                $tagOp = $andOp;
            } else {
                //bei , wird aus + bzw. Leerz. auch ODER
                $tags = explode (",", str_replace("+",",",$tag_slug));
                $tagOp = $orOp;
            }        
            $aoTags = $this->get_tags();
            if ( !count( $aoTags ) ) {
                return false;
            }
            
            if ( count( $aoTags) == 1 ) {
                // fallback to usual wp-behaviour
                return get_tag_feed_link( $term_id, $feed );
            } else {
                if ( empty( $feed ) )
                    $feed = get_default_feed();

                $permalink_structure = get_option( 'permalink_structure' );

                if ( '' == $permalink_structure ) {
                        $link = home_url("?feed=$feed&amp;tag=$tag_slug");
                } else {
                    $term = get_term( $term_id, 'post_tag'  );
                    $link = $this->getCurrentUrl();
                    if ( $feed == get_default_feed() ) {                    
                        $feed_link = 'feed';
                    } else {
                        $feed_link = "feed/$feed";                    
                    }
                    $link = trailingslashit( $link ) . user_trailingslashit( $feed_link, 'feed' );
                }
                return $link;
            }
        }
    }

}

// create new instance of the class
$oMultiTags = new MultiTags();

// register the function we want to run when the plugin is activated:
if (isset($oMultiTags)) {
    // register activation function 
    register_activation_hook(__FILE__, array($oMultiTags, 'install'));
    add_action('wp_head', array($oMultiTags, 'head'));
    add_action('wp_footer', array($oMultiTags, 'footer'));
    add_filter('wp_title', array($oMultiTags, 'title'), 10);
    add_filter('plugin_action_links', array($oMultiTags, 'settings_link'), 9, 2);
    // add_filter('feed_link',array(&$oMultiTags,'rss'), 10, 2); 
}

/**
* Use this in your theme tag.php-template
* Examples (for http://www.piratenspielzeug.com/tag/playmobil+piraten):
* 
* <h2 class="dada"><?php multi_tags_get_title('und', 'or') ?></h2>
* 
* will result in:
* '<h2 class="dada">Playmobil und Piraten</h2>'
* 
* you might also wish to list them as
* <ul><li><?php multi_tags_get_title('</li><li>', '</li><li>') ?></li></ul>
* 
* will produce:
* '<ul><li>Playmobil</li><li>Piraten</li></ul>'
* 
* @param mixed $before the html shown before the title (you might like to use '<h2>')
* @param mixed $after html shown after the title (e.g. '</h2>')
* @param mixed $andOp what should be used to combine tags (+ operator)
* @param mixed $orOp what should be used to combine tags (, operator)
*/
function multi_tags_get_title( $andOp = 'and', $orOp = 'or' ) {
    global $oMultiTags;
    return $oMultiTags->get_tag_title( ' '.$andOp.' ', ' '.$orOp.' ' );
}

function multi_tags_get_description( $beforeDesc = '', $afterDesc = '' ) {
    global $oMultiTags;
    return $oMultiTags->get_tag_description( $beforeDesc, $afterDesc );
}

// similar to get_tag_feed_link - only correct with multiple tags
function multi_tags_get_tag_feed_link( $term_id, $feed = '' ) {
    global $oMultiTags;
    return $oMultiTags->rss( $term_id, $feed );
}

