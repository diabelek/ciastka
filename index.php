dupa<?php
defined( '_JEXEC' ) or die( 'Dostęp zastrzeżony' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if !IE]><!-->
<link href="templates/<?php echo $this->template ?>/css/layout.css" rel="stylesheet" type="text/css" />	
<link href="templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
<!--<![endif]-->
<!--[if IE 6]>
<style type="text/css">
img, div { behavior: url(iepngfix.htc) }
</style> 
<link href="templates/<?php echo $this->template ?>/css/layout.css" rel="stylesheet" type="text/css" />	
<link href="templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
<link href="templates/<?php echo $this->template ?>/css/layout.css" rel="stylesheet" type="text/css" />	
<link href="templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if gte IE 8]>
<link href="templates/<?php echo $this->template ?>/css/layout.css" rel="stylesheet" type="text/css" />	
<link href="templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" />
<![endif]-->
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34933644-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>

<div id="header_background">
<div id="header">
	<div id="logo">
		<?php if ($this->countModules('logo')): ?>
		<jdoc:include type="modules" name="logo" style="xhtml" />
		<?php endif; ?>
	</div>
	
	<div id="menu">
		<div id="menu_tekst">
		<?php if ($this->countModules('menu')): ?>
		<jdoc:include type="modules" name="menu" style="xhtml" />
		<?php endif; ?>
			</div>	
	</div>	
</div>
</div>


<div id="container">
	<div id="left">
		<div id="left_tekst">	
		
		
		
	<div id="slogan">
		<div id="slogan_tekst">
		<?php if ($this->countModules('user6')): ?>
		<jdoc:include type="modules" name="user6" style="xhtml" />
		<?php endif; ?>
			</div>	
	</div>	
	
	
		
				<div id="tekst">
								<div id="tekst_tekst">
											<jdoc:include type="component" />
								</div>	
				</div>	
	
	<div id="baners">
		<div id="baners_background">
		<?php if ($this->countModules('user2')): ?>
		<jdoc:include type="modules" name="user2" style="xhtml" />
		<?php endif; ?>
			</div>	
	</div>	

	  </div>
	</div>	
	
	<div id="right">
	
	
		<div id="slogan_right">
				<div id="slogan_tekst_right">
				</div>	
		</div>	
		
		<div id="tekst_right">
																																<?php if ($this->countModules('user7')): ?>
																			                                                            <div id="mapka">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user7" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																
																																<?php if ($this->countModules('user8')): ?>
																			                                                            <div id="mapka1">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user8" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																<?php if ($this->countModules('user9')): ?>
																			                                                            <div id="mapka2">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user9" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																<?php if ($this->countModules('user10')): ?>
																			                                                            <div id="zezwolenie1">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user10" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																<?php if ($this->countModules('user11')): ?>
																			                                                            <div id="zezwolenie2">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user11" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																<?php if ($this->countModules('user12')): ?>
																			                                                            <div id="zezwolenie3">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user12" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																																																<?php if ($this->countModules('user13')): ?>
																			                                                            <div id="zezwolenie4">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user13" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																																																<?php if ($this->countModules('user14')): ?>
																			                                                            <div id="zezwolenie5">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user14" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
																																
																																
																																<?php if ($this->countModules('user15')): ?>
																			                                                            <div id="zezwolenie6">
																																																											<div id="tekst_tekst">
																						                                                                                        <jdoc:include type="modules" name="user15" style="xhtml" />
																																		                                                   </div>
																																																	</div>
																																<?php endif; ?>
										
		</div>	
	
	

	</div>	

</div>

<div id="end">
</div>


<div id="pasek1_background">
<div id="pasek1">
<div id="pasek1_tekst">
		<?php if ($this->countModules('user4')): ?>
		<jdoc:include type="modules" name="user4" style="xhtml" />
		<?php endif; ?>
		</div>
</div>
</div>


<div id="footer_background">
<div id="footer">

	<div id="box_footer">
		<div id="box_footer_tekst">
		<?php if ($this->countModules('user01')): ?>
		<jdoc:include type="modules" name="user01" style="xhtml" />
		<?php endif; ?>
			</div>
	</div>
	
	<div id="box_footer">
			<div id="box_footer_tekst">
	  <?php if ($this->countModules('user02')): ?>
	  <jdoc:include type="modules" name="user02" style="xhtml" />
	  <?php endif; ?>
			</div>
	</div>
	
	<div id="box_footer">
			<div id="box_footer_tekst">
	  <?php if ($this->countModules('user03')): ?>
	  <jdoc:include type="modules" name="user03" style="xhtml" />
	  <?php endif; ?>
			</div>
	</div>
	
	<div id="box_footer">
			<div id="box_footer_tekst">
	  <?php if ($this->countModules('user04')): ?>
	  <jdoc:include type="modules" name="user04" style="xhtml" />
	  <?php endif; ?>
			</div>
	</div>
	
	<div id="box_footer">
			<div id="box_footer_tekst">
		<?php if ($this->countModules('user05')): ?>
		<jdoc:include type="modules" name="user05" style="xhtml" />
	  <?php endif; ?>
			</div>
	</div>
	
</div>
</div>

<div id="stopka">
<div id="stopka_tekst">
		<?php if ($this->countModules('user5')): ?>
		<jdoc:include type="modules" name="user5" style="xhtml" />
		<?php endif; ?>
</div>
</div>

<script type="text/javascript" src="cookies.js"></script>
<div id="cookieOpacity" style="display: none; background-color: white; opacity: 0.8; position: fixed; bottom: 0; width: 100%; height: 40px; z-index:1000"></div>
<div id="cookieHolder" style="display: none; position: fixed; bottom: 0; width: 100%; height: 30px; color: #353535; font-size: 9pt; font-family: tahoma; padding: 5px 0; z-index:1000">
	<div style="width: 980px; margin: 0 auto;">
		<div style="border-right: 1px solid #353535; float: left; padding: 0 5px;">
			<a href="http://cookies.go-2.pl/cookies.pdf" target="_blank" style="color: #353535; font-size: 18pt; text-decoration: none;" rel="nofollow">Pliki Cookies (?)</a>
		</div>
		<div style="float: left; padding: 0 5px;">
			Używamy plików cookies, by ułatwić korzystanie z serwisu.<br/>Jeśli nie chcesz, by pliki cookies były zapisywane na Twoim dysku zmień ustawienia swojej przeglądarki.
		</div>
		<div style="float: right; padding: 0 5px;">
			<a href="#" onClick="zamknij()" style="color: #353535; font-size: 18pt; text-decoration: none; border: 1px solid #353535; padding: 1px 5px;">OK</a>
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