<style>
fieldset.mt {
  -moz-border-radius:11px 11px 11px 11px;
  background:none repeat scroll 0 0 #FDFDFD;
  border:1px solid #000000;
  margin:1em 0;
  padding:0 1em 1em;
}
fieldset.mt legend {
  color:#000000;
  font-weight:bold;
  padding:0 5px;
}
fieldset.grat {
  background: none repeat scroll 0 0 #FF7733;
}
textarea.mt {
  background-color:#BBBBBB;
  border-color:#888888;
}
</style>
<div class="wrap" style="width:100%;margin:0px;">
<h2>MultiTags options</h2>
<div>
    <form method="post" action="options.php">
        <?php settings_fields($this->dbOption); ?>
        <input type="hidden" name="multitags_options[dummy]" value="1" />
        <table class="widefat">
<tbody>
            <tr>
                <td><input type="checkbox" name="multitags_options[b_show_title]"<?php echo $b_show_title ?> /></td>
                <td class="row-title">Show modified tags in title</td>
                <td>Set multiple tags (as in http://www.piratenspielzeug.com/tag/playmobil+piraten) correctly in the head-title-tag<br />
                e.g. <code>&lt;head&gt;&lt;title&gt;Playmobil Piraten&lt;/title&gt;&lt;/head&gt;</code>)<br />
                <i>Does not work in combination with the "All In One SEO Pack"-plugin.</i></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="multitags_options[b_show_meta]"<?php echo $b_show_meta ?> /></td>
                <td class="row-title">Show modified tags in meta-tags (keywords/description)</td>
                <td>Set multiple tags correctly in the meta tags "keywords" and "description", e.g.<br />
                <code>&lt;meta name="keywords" content="Playmobil, Piraten" /&gt;<br />&lt;meta name="description" content="<i>your tag-descriptions</i>" /&gt;</code></td>
            </tr>
            <tr>
                <td><input type="checkbox" id="b_gratitude" name="multitags_options[b_gratitude]"<?php echo $b_gratitude ?> /></td>
                <td class="row-title">Show your gratitude</td>
                <td>This will put the text "<a href='http://www.vogel-nest.de/wp_multitags_plugin' title='Wordpress MultiTags'>MultiTags</a> powered by <a href='http://www.piratenspielzeug.com' title='Piraten Spielzeug'>Piraten Spielzeug</a>" in the footer of your blogs.<br />
                The gratitude-text is written <i>only</i> in the footer of the tag-pages containing multiple tags, only where the plugin really does it's work :-)).<br />
                I really appreciate your help to support my work. Thank you!<br />
                (You can style the "gratitude"-text as you like with CSS (it is put inside <code>&lt;span id="multitagsthanks"&gt;...&lt;/span&gt;</code>)</td>
            </tr>
</tbody>
        </table>
<div style="margin:25px;padding:10px;">
<div>
<fieldset class="mt">
<legend>Documentation</legend>
<p>Thanks a lot for using <strong>MultiTags</strong>!</p>
<p>If you find any errors or problems don't hesitate to <a href="http://www.vogel-nest.de/multitags" rel="external" target="_blank">comment</a> or <a href="mailto:stefan@vogel-nest.de">contact me</a>. You can also send me suggestions or improvements - whatever (besides SPAM) ;-)</p>
<p>You can find a <a href="http://www.vogel-nest.de/wp_multitags_plugin" rel="external" target="_blank">complete description/documentation with some examples on my plugin-page</a>.</p>
</fieldset>
</div>

<div id="multitags_gratitude">
<fieldset class="mt grat">
<legend>Support</legend>
<p><i>You choose not to put a gratitude-link into your tag-pages footer. I respect that.</i></p>
<p>But wait a moment, perhaps you like to do some of the following stuff to show me your respect.<br />
It only takes seconds (or only one click) for you and you will greatly honour my work and motivate me for supporting this plugin.</p>
<p>
You could do me a great favour if you simply:
<ul style="list-style:square;padding-left:30px;">
<li>Write a <a href="http://wordpress.org/extend/plugins/multitags/" rel="external" target="_blank">review or rate the plugin on Wordpress</a> (&laquo; <i>click</i>)</li>
<li><a href="http://twitter.com/home?status=%40piratspielzeug+Thanks+for+WP+MultiTags+http%3a%2f%2fbit.ly%2fwp_multitags+powered+by+http%3a%2f%2fwww.piratenspielzeug.com" rel="external" target="_blank">twitter a thanks message</a> (&laquo; <i>click</i>)</li>
<li>bookmark my plugin-page on your favourite bookmark-site: 
<script type="text/javascript">var szu=encodeURIComponent('http://www.vogel-nest.de/wp_multitags_plugin'); var szt=encodeURIComponent('MultiTags plugin for Wordpress').replace(/\'/g,'`'); var szjsh=(window.location.protocol == 'https:'?'https://ssl.seitzeichen.de/':'http://w4.seitzeichen.de/'); document.write(unescape("%3Cscript src='" + szjsh + "w/02/79/widget_0279afe1d5a12c73081232374101c6eb.js' type='text/javascript'%3E%3C/script%3E"));</script>
</li>
<li>Spread the word - <a href="<?php echo admin_url('post-new.php') ?>">write a blogpost</a>! (&laquo; <i>click</i> and start) <strong>That would really be great</strong>! Especially if you recommend this plugin. ;-)</li>
<li>Put <a href="<?php echo admin_url('link-add.php?name=Kleine%20Dinge&linkurl=http%3a%2f%2fwww.vogel-nest.de') ?>">http://www.vogel-nest.de</a> or <a href="<?php echo admin_url('link-add.php?name=Piraten%20Spielzeug&linkurl=http%3a%2f%2fwww.piratenspielzeug.com') ?>">http://www.piratenspielzeug.com</a> in your Blogroll (&laquo; simply click those links to add!)</li>
<li>Manually place a link where you dare (use this code):<br /><textarea class="mt" rows="3" cols="70"><a href="http://www.vogel-nest.de/wp_multitags_plugin">Multitags WordPress Plugin</a> powered by <a href="http://www.piratenspielzeug.com">Piraten Spielzeug</a></textarea>
<li>If you don't like it, you can always reply to <a href="mailto:stefan@vogel-nest.de">stefan@vogel-nest.de</a> (that would also be appreciated!) - you can even mail me <strong>if</strong> you like it :-)</li>
</ul>

<strong>Thanks a lot for your support and motivation!</strong>
</fieldset>
</div>
<script type="text/javascript">
function multitagssh(s) {
if (s) {jQuery("#multitags_gratitude").hide("fast");
jQuery("#multitags_thanks").show("fast");}
else {jQuery("#multitags_gratitude").show("fast");
jQuery("#multitags_thanks").show("fast");}}
 jQuery("#b_gratitude").click(function(){multitagssh(jQuery("#b_gratitude").is(":checked"))});
 multitagssh(jQuery("#b_gratitude").is(":checked"));
</script>

</div>

        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>
</div>