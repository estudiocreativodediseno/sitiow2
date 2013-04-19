                                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                                  <html xmlns="http://www.w3.org/1999/xhtml">
                                      <head>
                                          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                          <meta name="format-detection" content="telephone=no" />
                     
						<?php 		echo $libraries;	?>
						
                                          <!--<script type="text/javascript" src="scripts/analytics.js"></script>-->
                                  
                                              <title>CASA | PALACIO</title>
                                          
                                          <link rel="icon" href="favicon.ico" type="image/x-icon" />
                                          <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    
                                          <meta name="description" content="" />
                                          <meta name="keywords" content="" />
  
                                      <!--[if lt IE 9]><link href="styles/ie.css" rel="stylesheet" type="text/css" /><![endif]-->
                                      </head>
                                  
                                      <body>
                                          <div class="wrap main-content box">
                                              <div class="header">
                                                  <h1><a href="<?php echo base_url().$urlSections["c74d97b01eae257e44aa9d5bade97baf"].""; ?>" class="replacement brand">CASA | PALACIO</a></h1>
                                  
                                                  <ul class="nav helper-menu right">
                                                      <li><a href="#">Servicios especializados</a></li>
                                                      <li><a href="#">Nuestras tiendas</a></li>
                                                      <li><a href="http://www.vivetotalmentepalacio.com" class="blog">Blog oficial</a></li>
                                                  </ul>
                                  
                                                  <ul class="nav main-menu right">
                                                      <li><a href="{%url-section sectionId='c51ce410c124a10e0db5e4b97fc2af39' parameters=''%}">Tendencias</a></li>
                                                      <li><a href="{%url-section sectionId='aab3238922bcc25a6f606eb525ffdc56' parameters=''%}">Marcas &amp; Diseñadores</a></li>
                                                      <li><a href="{%url-section sectionId='9bf31c7ff062936a96d3c8bd1f8f2ff3' parameters=''%}">Catálogo de temporada</a></li>
                                                      <li><a href="#">Vive Casa</a></li>
                                                      <li><a href="#">Promociones</a></li>
                                                  </ul>
                                              </div>
                                  
                                              <!-- Escaparate -->
                                              <div class="showcase-container">
                                                  <ul id="showcase" class="showcase layer">
                                    <?php foreach($escaparatePrincipal_elements as $escaparatePrincipal_element): ?>
                            <li><img src="<?php echo base_url()."/uploads"; ?><?php echo $escaparatePrincipal_element[$fieldTags["imagen"]]["data"]; ?>" /></li>
                                    <?php endforeach; ?>
                                                  </ul>
                                  
                                                  <div class="tendencia layer"></div>
                                                  <a href="#" class="tendencia-btn layer"></a>
                                              </div>
                                  
                                              <!-- Panel -->
                                              <div class="panel clearfix">
                                                  <div class="teaser left">
                                                      <div class="featured-banner interiorismo">
                                                          <ul id="interiorismo">
                                                              <?php foreach($sliderModulo2_elements as $sliderModulo2_element): ?>
                                                                  <li><img src="<?php echo base_url()."/uploads"; ?><?php echo $sliderModulo2_element[$fieldTags["fieldName"]]["data"]; ?>" alt=""/></li>   
                                                              <?php endforeach; ?>
                                                          </ul>
                                                      </div>
                                  
                                                      <div class="featured-banner destacados">
                                                          <ul id="destacados">
                                                              <?php foreach($sliderModulo1_elements as $sliderModulo1_element): ?>
                                                                  <li><img src="<?php echo base_url()."/uploads"; ?><?php echo $sliderModulo1_element[$fieldTags["fieldName"]]["data"]; ?>" alt=""/></li>   
                                                              <?php endforeach; ?>   
                                                          </ul>
                                                       </div>
                                                  </div>
                                  
                                                  <div class="featured-products box right">
                                                      <div class="promo-label"></div>
                                                      
                                                      <ul id="productos-tendencia" class="featured-showcase">
                                                          <?php foreach($sliderProductosDestacados_elements as $sliderProductosDestacados_element): ?>
                                                             <li><a href="<?php echo $sliderProductosDestacados_element[$fieldTags["fieldName"]]["data"]; ?>"><img src="<?php echo base_url()."/uploads"; ?><?php echo $sliderProductosDestacados_element[$fieldTags["fieldName"]]["data"]; ?>" alt="" /></a></li>
                                                          <?php endforeach; ?> 
                                                      </ul>
                                                  </div>
                                              </div>
                                              
                                              <!-- Zona de marketing -->
                                              <div class="marketing-zone dropshadow">
                                                  <a href="#"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/marketing/mkt-nespresso.jpg" width="990" height="90" alt="" /></a>
                                              </div>
                                  
                                              <!-- Footer -->
                                              <div class="footer clearfix">
                                                  <div class="left">
                                                      <ul class="nav helper-menu clearfix">
                                                          <li><a href="#">Corporativo</a></li>
                                                          <li><a href="#">Contáctanos</a></li>
                                                          <li class="last"><a href="#">Bolsa de trabajo</a></li>
                                                      </ul>
                                                      
                                                      <p class="sales"><span>Ventas por teléfono</span> (55) 5229 5468  /  01 800 821 7317</p>
                                                  </div>
                                  
                                                  <div class="web-tool right clearfix">
                                                      <div class="newsletter left">
                                                          <!-- <div class="clearfix toggle"> -->
                                                              <h2>Recibe nuestro <span>newsletter</span></h2>
                                                              <p>Promociones • Novedades • Tendencias</p>
                                  
                                                              <form id="" class="news-signup" action="" method="post">
                                                                  <fieldset>
                                                                      <input type="text" value="Registra tu correo electrónico aquí" />
                                                                      <input type="image" class="sprite btn go-btn right" src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/buttons/transparent.gif" />
                                                                  </fieldset>
                                                              </form>
                                                          <!-- </div> -->
                                  
                                                          <!-- <div class="feedback hidden">
                                                              <ul class="msg right clearfix">
                                                                  <li><p>|* msg *|</p></li>
                                                                  <li><a href="#" class="return-btn"></a></li>
                                                              </ul>
                                                          </div> -->
                                                      </div>
                                  
                                                      <div class="qr-container right"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/tendencia/qr.jpg" width="101" height="80" /></div>
                                                  </div>
                                  
                                                  <div class="contact clearfix">
                                                      <div class="contact-details left">
                                                          <p>www.casapalacio.com.mx</p>
                                                          <p class="copyright">&reg; Todos los derechos reservados Casa Palacio 2013</p>
                                                          <!-- <p class="copyright">&reg; Todos los derechos reservados Casa Palacio <?php //echo date('Y') ?></p> -->
                                                      </div>
                                                  
                                                      <div class="follow right">
                                                          <h4>Síguenos</h4>
                                  
                                                          <ul class="social-bar clearfix">
                                                              <li><a href="http://pinterest.com/casapalacio/"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/buttons/pinterest-logo.jpg" width="64" height="26" /></a></li>
                                                              <li><a href="http://instagram.com/casa_palacio"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/buttons/instagram-logo.jpg" width="67" height="26" /></a></li>
                                                              <li><a href="http://twitter.com/casa_palacio"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/buttons/twitter-logo.jpg"  width="84" height="26" /></a></li>
                                                              <li><a href="https://www.facebook.com/vivetotalmentepalacio"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/buttons/facebook-logo.jpg" width="70" height="26" /></a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  
                                          <div class="wrap tab clearfix">
                                              <div class="tab-item"><a href="#"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/ui/el-palacio-de-hierro-logo.png" /></a></div>
                                              <div class="tab-item"><a href="#"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/ui/la-boutique-palacio-logo.png" /></a></div>
                                              <div class="tab-item"><a href="#"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/ui/viajes-palacio-logo.png" /></a></div>
                                              <div class="tab-item"><a href="#"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/ui/celebra-logo.png" /></a></div>
                                              <div class="tab-item"><a href="#"><img src="<?php echo base_url()."uploads/files/resources"; ?>/img/core/ui/credito-palacio-logo.png" /></a></div>
                                          </div>
                                  
                                          <div class="wrap privacity-note">
                                              <h4>Aviso de privacidad</h4>
                                  
                                              <p>En cumplimiento a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, El Palacio de Hierro, S.A. de C.V. informa a ustedes, los términos y condiciones del Aviso de Privacidad Simplificado de Datos Personales. Los datos personales recopilados son destinados para fines de identificación, contacto y verificación de información de nuestros clientes, para compras en línea y por<br /> teléfono, así como para el envío de las mercancías adquiridas y envío de promociones propias. Para información y contacto sobre este Aviso: <a href="mailto:atenciondatos@palaciohierro.com.mx">atenciondatos@palaciohierro.com.mx</a> o directamente en<br /> nuestras tiendas en el Módulo de atención al cliente. <a href="avisodeprivacidad/" target="_blank">Aviso de Privacidad completo.</a></p>
                                          </div>
                                      </body>
                                  </html>                     