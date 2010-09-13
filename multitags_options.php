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
                e.g. <code>&lt;head&gt;&lt;title&gt;Playmobil Piraten&lt;/title&gt;&lt;/head&gt;</code>)</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="multitags_options[b_show_meta]"<?php echo $b_show_meta ?> /></td>
                <td class="row-title">Show modified tags in meta-tags (keywords/description)</td>
                <td>Set multiple tags correctly in the meta tags "keywords" and "description", e.g.<br />
                <code>&lt;meta name="keywords" content="Playmobil, Piraten" /&gt;<br />
                &lt;meta name="description" content="<i>your tag-descriptions</i>" /&gt;</code></td>
            </tr>
            <tr>
                <td><input type="checkbox" id="b_gratitude" name="multitags_options[b_gratitude]"<?php echo $b_gratitude ?> /></td>
                <td class="row-title">Show your gratitude</td>
                <td>This will put the text "<a href='http://www.vogel-nest.de/wp_multitags_plugin' title='Wordpress MultiTags'>MultiTags</a> powered by <a href='http://www.piratenspielzeug.com' title='Piraten Spielzeug'>Piraten Spielzeug</a>" in the footer of your blog.<br />
                The gratitude-text is written only in the footer of the tag-pages containing multiple tags, only where the plugin does it's work :-)).<br />
                Be nice and honour this work. Thank you!<br />
                If you like to style the "gratitude"-text (it is put inside <code>&lt;span id="multitagsthanks"&gt;...&lt;/span&gt;</code>)</td>
            </tr>
</tbody>
        </table>
<div style="margin:25px;padding:10px;">
<div>
<p>Thanks a lot for using <strong>MultiTags</strong>!</p>
<p>If you find any errors or problems don't hesitate to <a href="http://www.vogel-nest.de/multitags">comment</a> or <a href="mailto:stefan@vogel-nest.de">contact me</a>.</p>
<p>You can also send me suggestions or improvements - whatever (besides SPAM) ;-)</p>
<p></p>
<p>You can find a complete description with some examples on my <a href="http://www.vogel-nest.de/wp_multitags_plugin">plugin-page</a>.</p>
</div>

<div id="multitags_gratitude" style="background:#ff7733;padding:10px;">
<p><i>You choose not to put a gratitude-link into your tag-pages footer. I respect that.</i></p>
<p>But wait a moment, perhaps you like to do some of the following stuff to show me your respect.<br />
It only takes seconds (or a click) for you and you will greatly honour my work and motivate me for supporting this plugin.</p>
<p>
You could do me a great favour if you simply:
<ul style="list-style:square;padding-left:30px;">
<li>twitter a Message like this <a href="http://twitter.com/home?status=%40piratspielzeug+Thanks+for+WP+MultiTags+http%3a%2f%2fbit.ly%2fwp_multitags+powered+by+http%3a%2f%2fwww.piratenspielzeug.com" target="_blank">"@piratspielzeug Thanks for WP MultiTags http://bit.ly/wp_multitags powered by http://www.piratenspielzeug.com"</a> or<br />
this <a href="http://twitter.com/home?status=%40svogel+Thanks+for+WP+MultiTags+http%3a%2f%2fbit.ly%2fwp_multitags+powered+by+http%3a%2f%2fwww.piratenspielzeug.com" target="_blank">"@svogel Thanks for WP MultiTags http://bit.ly/wp_multitags powered by http://www.piratenspielzeug.com"</a></li>
<li>bookmark my plugin-page: 
<!-- Seitzeichen -->
<script type="text/javascript">var szu=encodeURIComponent('http://www.vogel-nest.de/wp_multitags_plugin'); var szt=encodeURIComponent('MultiTags plugin for Wordpress').replace(/\'/g,'`'); var szjsh=(window.location.protocol == 'https:'?'https://ssl.seitzeichen.de/':'http://w4.seitzeichen.de/'); document.write(unescape("%3Cscript src='" + szjsh + "w/02/79/widget_0279afe1d5a12c73081232374101c6eb.js' type='text/javascript'%3E%3C/script%3E"));</script>
<!-- Seitzeichen -->
or the link to the ones that has powered this plugin (PiratenSpielzeug)
<!-- Seitzeichen -->
<script type="text/javascript">var szu=encodeURIComponent('http://www.piratenspielzeug.com'); var szt=encodeURIComponent('Piraten Spielzeug').replace(/\'/g,'`'); var szjsh=(window.location.protocol == 'https:'?'https://ssl.seitzeichen.de/':'http://w4.seitzeichen.de/'); document.write(unescape("%3Cscript src='" + szjsh + "w/02/79/widget_0279afe1d5a12c73081232374101c6eb.js' type='text/javascript'%3E%3C/script%3E"));</script>
<!-- Seitzeichen -->
</li>
<li>Spread the word - write a blogpost! <strong>That would really be great</strong>! Especially if you recommend it.</li>
<li>Put <a href="<?php echo admin_url('link-add.php?name=Kleine%20Dinge&linkurl=http%3a%2f%2fwww.vogel-nest.de') ?>">http://www.vogel-nest.de</a> or <a href="<?php echo admin_url('link-add.php?name=Piraten%20Spielzeug&linkurl=http%3a%2f%2fwww.piratenspielzeug.com') ?>">http://www.piratenspielzeug.com</a> in your Blogroll (simply click the links to add!)</li>
<li>If you don't like it, you can always reply to <a href="mailto:stefan@vogel-nest.de">stefan@vogel-nest.de</a> (that would also be appreciated!) - you can even mail me <strong>if</strong> you like it :-)</li>
</ul>

<strong>Thanks a lot for your help!</strong>
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

<div><strong>Thanks</strong> to <a href="http://bueltge.de">Frank Bueltge</a> for testing and feedback!
</div>

</div>

        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>
</div>