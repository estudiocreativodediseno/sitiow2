<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="format-detection" content="telephone=no" />
			<title>CRUCEROS VIAJES PALACIO | Los mejores cruceros del mundo</title>
		<!--[if lte IE 9]><link href="Cru/includes/styles/ie.css" rel="stylesheet" type="text/css" /><![endif]-->
	</head>

	<body>
		<div class="wrap">
			<div class="showcase-container">
				<div class="header">
					<h1><a href="<?php Core_Common_Route::linkController('index:index'); ?>" class="sprite brand">VIAJES PALACIO</a></h1>

					<div class="nav-board">
						<p class="tagline">Selección de Cruceros <span>al estilo palacio</span></p>
						
						<ul class="nav main-nav">
							<?php foreach($categories as $category):?>
							<li><a href="<?php Core_Common_Route::linkController('index:interior',array('category_id'=>$category->get('id'))); ?>"><?php echo $category->get('title');?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

			</div>

			<div class="board">
				<div class="banner-module">
					<div class="banner-combo left">
						<a href="<?php echo $banner_info->get('link'); ?>" target="_blank"><img src="banners/<?php echo $banner_info->get('img'); ?>" width="318" height="286" alt="" title="" /></a>
					</div>

					
					<div class="footer-module social-module">
						<h3 class="runin-tag">Más <span>opciones</span></h3>
        
				        <div class="help-item global">
				          <h4><a href="http://www.viajespalacio.com.mx" class="help-link" target="_blank">www.viajespalacio.com.mx</a></h4>
				          <h4>Tu experiencia de viaje</h4>
				        </div>


						<div class="social-box">
							<!-- Facebook Plugin -->
							<div class="social-badge facebook-badge">
								<div id="fb-root"></div>

								<script type="text/javascript" src="Cru/includes/scripts/facebook-plugin.js"></script>

								<div class="fb-like" data-href="" data-send="false" data-layout="box_count"
								data-width="49" data-show-faces="false" data-font="lucida grande" count="vertical">
								</div>
							</div>

							<!-- Twitter Plugin -->
							<div class="social-badge twitter-badge">
								<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="palaciohierro" target="_blank">Tweet</a>
								<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>