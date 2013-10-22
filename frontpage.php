    <div id="object_pathway">
        <div id="object_pathway_left">
    	<?php echo pathway::generate4common(array()); ?>
        </div>
    	
        <?php echo html::anchor('messages/tell_a_friend/0/0', __('ui.label_send_to_friend', FALSE), array('id' => 'object_action')); ?>
    </div>
<div id="fp_left">
    
    <h3><?php echo html::image('static/default/images/icons/categories.png') ?> <span class="orange">Top</span> <?php __('ui.label_categories'); ?></h3>
    <div id="fp_categories">
        <ul>
            <?php if (count($feat_categories)) : foreach($feat_categories as $category): ?>
            <li><?php echo html::anchor('stories/category/'. $category->slug, $category->name); ?> publikacji: <strong><?php echo $category->stories; ?></strong></li>
            <?php endforeach; endif; ?>
        </ul>
    </div>
    
    <h3><div class="text"><?php echo html::image('static/default/images/icons/tags.png')?> <span class="orange">Top</span> <?php __('ui.label_tags'); ?></div><div class="more2"><?php echo html::anchor('tags', __('ui.label_more', FALSE)); ?></div></h3>
    <div id="fp_tags">
        <?php echo $tags; ?>
    </div>
    
    <h3><div class="text"><?php echo html::image('static/default/images/icons/rankings.png'); ?> <span class="orange">Top</span> Użytkownicy</div><div class="more2"><?php echo html::anchor('top/users', __('ui.label_more', FALSE)); ?></div></h3>
    <div id="fp_top5">
        <ul>
        <?php if (count($users)) : $i = 1; foreach($users as $user) : ?>
            <li><?php echo '<span class="lp">'. $i .'</span> '. html::anchor('user/' . $user->username, $user->username); $i++;?> publikacji: <strong><?php echo ($user->objects); ?></strong></li>
        <?php endforeach; endif; ?>
        </ul>  
    </div>
</div>

<div id="fp_right">
    <div id="fp_stories">
        <h1><?php echo html::image('static/default/images/icons/stories.png') .' '. __('ui.tab_stories', FALSE); ?></h1>
        <?php if(count($stories) > 0) : ?>
        <?php $first = TRUE; foreach($stories as $story) :
            if($first): $first = FALSE;?>
            <div id="top_story">
                <h2><?php echo html::anchor('story,'. $story->id .','. $story->slug . '.html', text::limit_chars($story->title, 30, '...')); ?></h2>
                
                <?php if ($story->featured_media AND $story->feat_media_type == ITEM_PHOTO): ?>
                <div id="top_story_img">
                <?php echo html::anchor('story,'. $story->id .','. $story->slug . '.html', html::image(Config::item('upload.upload_directory') . '/stories/gallery_' . $story->gallery_id .'/t180_'. $story->featured_media));?>
                </div>
                <?php elseif ($story->featured_media AND $story->video_provider == 1): ?>
                <div id="top_story_img" class="video_clip">
              	<?php echo html::anchor('story,'. $story->id .','. $story->slug . '.html', '<span></span>'.html::image(array('src' => 'http://i.ytimg.com/vi/'. $story->featured_media .'/default.jpg', 'height' => 180))); ?>
                </div>
                <?php elseif ($story->featured_media AND $story->video_provider == 2): ?>
                <div id="top_story_img" class="video_clip">
              	<?php echo html::anchor('story,' . $story->id .','. $story->slug . '.html', '<span></span>'.html::image(array('src' => '/static/default/images/movie.jpg', 'height' => 180))); ?>
                </div>
                <?php endif; ?>
                
                <div id="top_story_info">
                    <?php echo __('ui.label_posted_at', FALSE) .' '. $story->created_at .' '.__('ui.label_by', FALSE) .' '. html::anchor('user/'.$story->author, $story->author) ?> 
                </div>
               
                <?php echo text::limit_chars(text::bbcode($story->excerpt, false), 200, '...'); ?>
                <div id="top_story_more">
                    <?php echo html::anchor('story,'. $story->id .','. $story->slug . '.html', __('ui.label_more', FALSE)); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="next_top_story">
                <div class="next_top_story_avatar">
                    <?php if ($story->avatar): ?>
                    <?php echo html::anchor('user/'. $story->author, html::image($avatar_path . $story->user_id . '/t25_'. $story->avatar)); ?>
                    <?php else: ?>
                    <?php echo html::anchor('user/'. $story->author, html::image('static/default/images/t25_default_avatar.gif')); ?>
                    <?php endif; ?>
                </div>
            
                <?php echo html::anchor('story,'. $story->id . ',' . $story->slug . '.html', text::limit_chars($story->title, 30, '...')); ?>
                <div class="top_stories_info">
                    <?php __('ui.label_comments_nr'); ?>: <?php echo $story->comments; ?>, <?php echo $story->views; ?> <?php __('ui.label_views'); ?>, <?php __('ui.label_rating'); ?>: <?php echo $story->rating; ?> / <?php echo $story->votes; ?> <?php __('ui.label_votes'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <?php if (false && APP_ENV): ?>
        <div id="ad_750_90">
    <script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://ad.sentimo.pl/www/delivery/ajs.php':'http://ad.sentimo.pl/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=6");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script>
    <noscript><a href='http://ad.sentimo.pl/www/delivery/ck.php?n=a0b3a1b4&amp;cb=31312313131' target='_blank'>
    <img src='http://ad.sentimo.pl/www/delivery/avw.php?zoneid=6&amp;n=a0b3a1b4' border='0' alt='' /></a>
    </noscript>
        </div>
    <?php endif ?>
    
    <div id="fp_columns">
        <div class="fp_column">
            <div class="header_rounded fp_header fp_column_left">
    			<div class="left"></div>
    			<div class="content"><div class="text"><h3><?php echo html::image('static/default/images/icons/groups.png') ?> <span class="orange">Top</span> <?php __('ui.tab_groups'); ?></h3></div>
    			<div class="more2"><?php echo html::anchor('groups', __('ui.label_more', FALSE)); ?></div>
                </div>
    			<div class="right">
                </div>
            </div>
            
            <ul>
                <?php if (count($feat_groups)) : foreach($feat_groups as $group): ?>
                <li><?php echo html::anchor('group,'. $group->id . ','. $group->slug . '.html', $group->name); ?> członków: <strong><?php echo $group->members; ?></strong></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
            
        <div class="fp_column fp_column_center">
            <div class="header_rounded fp_header">
    			<div class="left"></div>
    			<div class="content"><div class="text"><h3><?php echo html::image('static/default/images/icons/blogs.png') ?> <span class="orange">Top</span> <?php __('ui.tab_blogs'); ?></h3></div>
                <div class="more2"><?php echo html::anchor('blogs', __('ui.label_more', FALSE)); ?></div>
                </div>
    			<div class="right">
                </div>
            </div>
            
            <ul>
                <?php if (count($feat_blogs)) : foreach($feat_blogs as $blog): ?>
                <li><?php echo html::anchor('blog,'. $blog->id . ','. $blog->slug . '.html', $blog->name); ?> ocena: <strong> <?php echo $blog->rating; ?></strong></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
        
        <div class="fp_column fp_column_right">
            <div class="header_rounded fp_header">
    			<div class="left"></div>
    			<div class="content"><div class="text"><h3><?php echo html::image('static/default/images/icons/events.png')?> <span class="orange">Top</span> <?php __('ui.tab_events'); ?></h3></div>
                <div class="more2"><?php echo html::anchor('events', __('ui.label_more', FALSE)); ?></div>
                </div>
    			<div class="right">
                </div>
            </div>
            
            <ul>
                <?php if (count($events)) : foreach($events as $event): ?>
                <li><?php echo html::anchor('event,'. $event->id . ','. $event->slug . '.html', $event->name); ?> ocena: <strong><?php echo $event->rating; ?></strong></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    
    <?php if (false && APP_ENV): ?>
    <div id="ad_750_90">
    <script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://ad.sentimo.pl/www/delivery/ajs.php':'http://ad.sentimo.pl/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=6");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script>
    <noscript><a href='http://ad.sentimo.pl/www/delivery/ck.php?n=a0b3a1b4&amp;cb=31312313131' target='_blank'>
    <img src='http://ad.sentimo.pl/www/delivery/avw.php?zoneid=6&amp;n=a0b3a1b4' border='0' alt='' /></a>
    </noscript>
    </div>
    <?php endif ?>
</div>