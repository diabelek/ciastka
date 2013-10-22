<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title><?php echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="all, index, follow" />
	<meta name="revisit-after" content="5 days" />
	<meta name="keywords" content="<?php echo $meta['keywords']; ?>" />
   	<meta name="description" content="<?php echo $meta['description']; ?>" />	
    <meta name="verify-v1" content="xvjgTM0kUu5q1r9vpKvfgNsMVvA7UaPVDL7yNxCJLx8=" />
    
    <link rel="shortcut icon" href="<?php echo url::site('static/default') ?>/favicon.ico" type="image/x-icon"/>
    
    <?php if (false && APP_ENV): ?>
    <link rel="stylesheet" href="<?php echo url::site('static/default/css/frontend.css'); ?>" type="text/css" media="all" />
    <?php else: ?>
    <?php echo html::stylesheet(array(
    'static/default/css/base.css', 
    'static/default/css/addons.css',
    )); ?>
    <?php endif; ?>
    
    <script type="text/javascript">
        var base_url = "<?php echo url::base(); ?>";
    </script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
   
    <?php if (false && APP_ENV): ?>
    <script type="text/javascript" src="<?php echo url::site('static/default/js/frontend.js'); ?>"></script>
    <?php else: ?>
     <?php echo html::script(array(
    'static/default/js/jquery.form.pack.js', 
    'static/default/js/jquery.autocomplete.pack.js', 
    'static/default/js/jquery.rating.pack.js', 
    'static/default/js/jquery.livequery.pack.js', 
    'static/default/js/jquery.jcarousel.pack.js',
    'static/default/js/jquery.treeview.pack.js',
    'static/default/js/jquery.datepicker.pack.js',
    'static/default/js/frontend.js', 
    )); ?>
    <?php endif; ?>
    
    <!--[if lte IE 6]>
    	<?php echo html::stylesheet(array('static/default/css/ie6.css')); ?>
        <?php echo html::script(array('static/default/js/supersleight.js')); ?>
    <![endif]-->
    
    <!--[if lte IE 7]>
        <?php echo html::script(array('static/default/js/screwUSPTO.js')); ?>
    <![endif]-->
    <meta name="google-site-verification" content="l_t_1OwUYiIhK0VJ1dkm9LT5LOa8SNr2WIcglGRZdRs" />
    <script type="text/javascript">
    　var _gaq = _gaq || [];
    　_gaq.push(['_setAccount', 'UA-19032500-3']);
    　_gaq.push(['_trackPageview']);

    　(function() {
    　　var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    　　ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    　　var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    　})();

    </script>
</head>
<body id="top">
    <div id="top_bg">
        <div id="top_contener">
            <div id="top_left">
                <div id="butterfly">
                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="210" id="butterfly_final" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="<?php echo url::site('static/default/images/butterfly.swf'); ?>" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#000000" /><embed src="<?php echo url::site('static/default/images/butterfly.swf'); ?>" quality="high" wmode="transparent" bgcolor="#000000" width="550" height="210" name="butterfly_final" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />

</object>
                </div>
                
                <div id="menu">
                    <?php echo $menu; ?>
                </div>
            </div>
            
            <div id="top_right">
                <div id="top_search">
                    <form action="<?php echo url::site('search?t='); ?>" method="get" id="top_search_form">
                        <input type="text" name="t" id="t" size="10" />
                    </form>

                    <a href="#" id="top_search_link">Szukaj</a>
                    
                    <div id="top_links">
                        <a href="<?php echo url::site('pomoc.html'); ?>"><?php __('ui.label_helpdesk') ?></a>
                        <a href="<?php echo url::site('contact'); ?>"><?php __('ui.label_contact') ?></a>
                    </div>
                </div>
                
                <?php if ($is_logged == 1): ?>
                    <div id="user_logged">
                        <div id="avatar">
                            
                        <?php if ($user_object->avatar): ?>
                            <?php echo html::anchor('dashboard', html::image($avatar_path. $user_object->id . '/t50_'. $user_object->avatar)); ?>
                            <?php else: ?>
                                <?php echo html::anchor('dashboard', html::image('static/default/images/t50_default_avatar.gif')); ?>
                            <?php endif; ?>
                        </div>
                        
                        <?php echo html::anchor('dashboard', $user_object->username, array('onFocus' => 'blur()')); ?>
                        <?php echo ($user_object->last_login) ? __('ui.label_last_sign_in', FALSE) .': '. $user_object->last_login : 'Witaj, to Twoje pierwsze logowanie w Sentimo'; ?>
                        <?php echo html::anchor('dashboard', 'Dashboard', 'class="top_logged_user"'); ?>
                        <?php echo html::anchor('profiles/edit/',  __('ui.label_edit_profile', FALSE), 'class="top_logged_user"'); ?>
                    </div>
                    
                    <div id="top_quick">
                        <?php echo html::image('static/default/images/icons/quick_messages.png'); ?>
                        <?php if ($priv_messages == 0): ?>
                        <?php echo html::anchor('messages/inbox', __('ui.label_no_prv_messages', FALSE), 'id = "no_messages"'); ?> 
                        <?php else: ?>
                        <?php echo html::anchor('messages/inbox', __('ui.label_new_prv_messages', FALSE) .': '. $priv_messages); ?> 
                        <?php endif; ?>
                        <?php echo html::anchor('logout', __('ui.label_sign_out', FALSE), 'id="logout"'); ?>
                    </div>
                
                <?php else : ?>
                
                    <div id="top_account">
                        <?php echo html::image('static/default/images/register.png'); ?>
                        
                        <a href="<?php echo url::site('register'); ?>"><?php __('ui.label_no_account'); ?></a>
                    </div>
                    
                    <div id="top_quick_login">
                        <form action="<?php echo url::site('login'); ?>" method="post" id="top_quick_login_form">
                            <input type="text" name="username" id="login" size="10" />
                            <input type="password" name="password" id="password" size="10" />
                            
                            <input id="top_quick_login_sb" type="submit" value="<?php __('ui.label_sign_in'); ?>" />
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div id="content_bg">
        <?php if ($action_success != ''): ?>
        <div id="action_success"><?php echo $action_success; ?></div>
        <?php elseif($action_error != ''): ?>
        <div id="action_errors"><?php echo $action_error; ?></div>
        <?php endif; ?>
        
        <div id="content_contener">
            <?php echo $content; ?>
        </div>
    </div>
    
    <div id="bg_top_footer">&nbsp;</div>
    
    <div id="footer_bg">
        <div id="footer">
            <div id="top_page">
                <a href="#top"><?php __('ui.label_top_page'); ?></a>
            </div>
            <div id="footer_content">
                <div class="footer_column">
                    <h4><?php __('ui.tab_stories'); ?></h4>
                    <ul>
                        <?php if (count($feat_categories)) : foreach($feat_categories as $category): ?>
                        <li><?php echo html::anchor('stories/category/'. $category->slug, $category->name); ?></li>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
                
                <div class="footer_column">
                    <h4><?php __('ui.tab_blogs'); ?></h4>
                    <ul>
                        <?php if (count($feat_blogs)) : foreach($feat_blogs as $blog): ?>
                        <li><?php echo html::anchor('blog,'. $blog->id . ','. $blog->slug . '.html', $blog->name); ?></li>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
                
                <div class="footer_column">
                    <h4><?php __('ui.tab_groups'); ?></h4>
                    <ul>
                        <?php if (count($feat_groups)) :foreach($feat_groups as $group): ?>
                        <li><?php echo html::anchor('group,'. $group->id . ','. $group->slug . '.html', $group->name); ?></li>
                        <?php endforeach; endif;?>
                    </ul>
                </div>
                
                <div class="footer_column">
                    <h4><?php __('ui.tab_rankings'); ?></h4>
                    <ul>
                        <li><?php echo html::anchor('top/users', 'Użytkownicy'); ?></li>
                        <li><?php echo html::anchor('top/stories', 'Wspomnienia'); ?></li>
                        <li><?php echo html::anchor('top/events', 'Wydarzenia'); ?></li>
                        <li><?php echo html::anchor('top/groups', 'Grupy'); ?></li>
                        <li><?php echo html::anchor('top/blogs', 'Blogi'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div id="bg_bottom_footer">
        <div id="bottom_contener">
            <p id="copyright"><?php echo html::image('static/default/images/copyright.jpg'); ?> <a href="http://adstone.pl">Agencja Reklamowa</a> adStone
 &copy; 2008 <br /> <?php __('ui.label_all_rights_reserved'); ?></p>
            <p id="bottom_links">
                <a href="<?php echo url::site('o_nas.html'); ?>"><?php __('ui.label_about_us'); ?></a> |
                <a href="http://bugs.sentimo.pl"><?php __('ui.label_bug_report'); ?></a> |
                <a href="http://bugs.sentimo.pl/wishlist"><?php __('ui.label_wishlist'); ?></a> |
                <a href="<?php echo url::site('regulamin.html'); ?>"><?php __('ui.label_site_rules'); ?></a> |
                <a href="<?php echo url::site('polityka_prywatnosci.html'); ?>"><?php __('ui.label_privacy_policy'); ?></a> |
                <a href="<?php echo url::site('reklama.html'); ?>"><?php __('ui.label_advertising'); ?></a> 
            </p>
            <p id="links">
                <?php
                    include_once(DOCROOT . "statlink1291900685XpJC0iUleK.php");
                    echo statlink_show_links("", " | ", "", "");
                ?>
            </p>
        </div>
    </div>
		<script type="text/javascript" src="cookies.js"></script>
	<div id="cookieOpacity" style="display: none; background-color: black; opacity: 0.8; position: fixed; bottom: 0; width: 100%; height: 40px; z-index:1000"></div>
	<div id="cookieHolder" style="display: none; position: fixed; bottom: 0; width: 100%; height: 30px; color: #B7B7B7; font-size: 9pt; font-family: tahoma; padding: 5px 0; z-index:1000">
		<div style="width: 980px; margin: 0 auto;">
			<div style="border-right: 1px solid #B7B7B7; float: left; padding: 0 5px;">
				<a href="http://cookies.go-2.pl/cookies.pdf" style="color: #B7B7B7; font-size: 18pt; text-decoration: none;" rel="nofollow">Pliki Cookies (?)</a>
			</div>
			<div style="float: left; padding: 0 5px;">
				Używamy plików cookies, by ułatwić korzystanie z serwisu.<br/>Jeśli nie chcesz, by pliki cookies były zapisywane na Twoim dysku zmień ustawienia swojej przeglądarki.
			</div>
			<div style="float: right; padding: 0 5px;">
				<a href="#"  onClick="zamknij()" style="color: #B7B7B7; font-size: 18pt; text-decoration: none; border: 1px solid #B7B7B7; padding: 1px 5px;">OK</a>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function zamknij() {
			document.getElementById('cookieOpacity').style.display = 'none';
			document.getElementById('cookieHolder').style.display = 'none';
			
			setCookie('cookiesAccepted', true, 360);
			return false;
		}
		
		widzial = getCookie('cookiesAccepted');
		if (widzial == null || widzial == '') {
			document.getElementById('cookieOpacity').style.display = 'block';
			document.getElementById('cookieHolder').style.display = 'block';
		}
	</script>
</body>
</html>
    