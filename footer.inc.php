<!-- KONIEC ZAWARTOSC STRONY -->
			</td>
		</tr>
		</table>
	</td>
	<td class="prawo"></td>
</tr>
<tr><!-- STOPKA -->
	<td width="50%" class="stopka"></td>
	<td valign="top" class="stopka">
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top"><img src="img/menu_end.jpg" alt="" width="241" height="76" hspace="0" vspace="0" border="0"><br>
			<div>
			<?if($_SERVER["REQUEST_URI"] == "/"):?>
			<a href="http://visualteam.pl">Tworzenie stron www</a>: <b>Visualteam</b>
			<?else:?>
			Tworzenie stron www: <b>Visualteam</b>
			<?endif?>
			</div><br></td>
			<td valign="top">
				<img src="img/nag_naskroty.gif" alt="" hspace="20" border="0">
				<table cellspacing="0" cellpadding="0" class="skrot">
				<tr>
					<td valign="top">
					<A HREF="<?php print codeLink("index.php?strona=index","index")?>">Główna</A><br>
					<A HREF="<?php print codeLink("index.php?strona=strona&id=6","O nas")?>">O Nas</A><br>
					<A HREF="<?php print codeLink("index.php?strona=salony","Salony")?>">Salony</A><br>
					<A HREF="<?php print codeLink("index.php?strona=praca","Praca")?>">Praca</A><br>
					<A HREF="<?php print codeLink("index.php?strona=strona&id=10","Kontakt")?>">Kontakt</A><br></td>
					<td valign="top">
					
					<A HREF="<?php print codeLink("index.php?strona=serwis","Serwis")?>">Serwis</A><br>
					<A HREF="<?php print codeLink("index.php?strona=okazja","Super Okazja")?>">Super okazja</A><br>
					<A HREF="<?php print codeLink("index.php?strona=oferta","Oferta tygodnia")?>">Oferta tygodnia</A><br>
					<A HREF="<?php print codeLink("index.php?strona=best","Bestsellery")?>">Bestsellery</A><br>
					<A HREF="<?php print codeLink("index.php?strona=szukaj","Szukanie zaawansowane")?>">Wyszukiwarka</A><br></td>
					<td valign="top">
					<A HREF="<?php print codeLink("index.php?strona=wkoszyku","koszyk")?>">Koszyk</A><br>
					<? if ($_SESSION[$przedrostek."login_".session_id()]=="") {?><A HREF="<?php print codeLink("index.php?strona=logowanie","Logowanie")?>">Logowanie</A><br><?}?>
					<A HREF="<?php print codeLink("index.php?strona=pomoc","Pomoc")?>">Pomoc</A><br>
					<A HREF="<?php print codeLink("index.php?strona=strona&id=9","Regulamin")?>">Regulamin</A><br>
					<A HREF="<?php print codeLink("index.php?strona=strona&id=12","Zasady użytkowania")?>">Zasady użytkowania</A><br></td>
					<td valign="top">
					<A HREF="<?php print codeLink("index.php?strona=polec","Poleć stronę")?>">Poleć stronę</A><br>
					<A HREF="<?php print codeLink("index.php?strona=strona&id=14","Karta Stałego Klienta")?>">Karta Stałego Klienta</A><br>
					<A HREF="<?php print codeLink("index.php?strona=strona&id=15","Informacje o dostawie")?>">Informacje o dostawie</A><br></td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</td>
	<td width="50%" class="stopka"></td>
</tr>
</table>

<style type="text/css">
#facebookHandler {
    background: url('http://www.timetrend.pl/fb/fb.png');
    width: 195px;
    height: 369px;
    padding: 10px 18px 10px 65px;
    position: fixed;
    top: 195px;
    right: -221px;
    z-index: 1000;
}

#IEroot #facebookHandler {
    position: absolute;
}

#facebookHandler div {
    background-color: white;
}
</style>

<div id="facebookHandler">
    <div>
        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Ftimetrend&amp;width=195&amp;colorscheme=light&amp;connections=10&amp;stream=false&amp;header=true&amp;height=369" 
            scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:195px; height:369px;" allowTransparency="true"></iframe>
    </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>  
<script type="text/javascript">
    var noConf = jQuery.noConflict();
    noConf(document).ready(function() {
        noConf("#facebookHandler").hover(function(){
            noConf("#facebookHandler").stop(true, false).animate({right:"-12"},"medium");
        },function(){
            noConf("#facebookHandler").stop(true, false).animate({right:"-221"},"medium");
        },500);
    });
</script>





<!-- GOOGLE ANALITICS -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12921296-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<!-- GOOGLE ANALITICS -->
<?php
    if (false && $seen/* || $_SERVER['REMOTE_ADDR'] == '77.253.145.144'*/) {
?>
    <div id="my_overlay" style="z-index: 1001; position:absolute; width: 100%; height: 100%; top:0;left:0; background-color: black; opacity:0.7"></div>
    <div id="my_overlay_img" style="z-index: 1002; position: absolute; top:190px; width: 100%; color: white; font-weight: bold; font-size: 16px;">
        <center>
            <div style="background-image: url('http://www.timetrend.pl/zegarek-roku-img/popup.jpg'); width: 500px; height: 600px;">
                <a href="#" id="zamknij" style="display: block; width: 100%; height: 30px;"></a>
                <a href="http://www.timetrend.pl/zegarek-roku" style="display: block; width: 100%; height: 560px;"></a>
            </div>
        </center>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#my_overlay').css('height', $('body').outerHeight());
            $('#zamknij, #my_overlay').click(function() {
                $('#my_overlay, #my_overlay_img').hide();
            });
        });
    </script>
<?php    
        setcookie('seen', time(), time() + 86400);
    }
?>
<!--[if IE]>
	</div>
<![endif]-->

<script type="text/javascript" src="cookies.js"></script>
	<div id="cookieOpacity" style="display: none; background-color: black; opacity: 0.8; position: fixed; bottom: 0; width: 100%; height: 40px; z-index:1000"></div>
	<div id="cookieHolder" style="display: none; position: fixed; bottom: 0; width: 100%; height: 30px; color: #B7B7B7; font-size: 9pt; font-family: tahoma; padding: 5px 0; z-index:1000">
		<div style="width: 980px; margin: 0 auto;">
			<div style="border-right: 1px solid #B7B7B7; float: left; padding: 0 5px;">
				<a href="http://www.timetrend.pl/cookies.pdf" target="_blank" style="color: #B7B7B7; font-size: 18pt; text-decoration: none;" rel="nofollow">Pliki Cookies (?)</a>
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
<script>lista_init();</script>

<? if ($_SESSION[$przedrostek.'blad_'.session_id()]!="") {?>
<script type="text/javascript">
	show_alert("<?=$_SESSION[$przedrostek.'blad_'.session_id()]?>");
</script>
<?
	$_SESSION[$przedrostek.'blad_'.session_id()]="";
}?>
<? if ($rozwin!="") {?>
<script type="text/javascript">
	menu_toggleVT("<?=$rozwin?>");
</script>
<?}?>