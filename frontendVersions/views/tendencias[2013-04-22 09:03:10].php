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
                             <h1><a href="<?php echo substr(base_url(),0,strlen(base_url())-1).$urlSections["c74d97b01eae257e44aa9d5bade97baf"].""; ?>" class="replacement brand">CASA | PALACIO</a></h1>
             
                             <ul class="nav helper-menu right">
                                 <li><a href="#">Servicios especializados</a></li>
                                 <li><a href="#">Nuestras tiendas</a></li>
                                 <li><a href="http://www.vivetotalmentepalacio.com" class="blog">Blog oficial</a></li>
                             </ul>
             
                             <ul class="nav main-menu right">
                                 <li><a href="#" class="current">Tendencias</a></li>
                                 <li><a href="<?php echo substr(base_url(),0,strlen(base_url())-1).$urlSections["aab3238922bcc25a6f606eb525ffdc56"].""; ?>">Marcas &amp; Diseñadores</a></li>
                                 <li><a href="<?php echo substr(base_url(),0,strlen(base_url())-1).$urlSections["9bf31c7ff062936a96d3c8bd1f8f2ff3"].""; ?>">Catálogo de temporada</a></li>
                                 <li><a href="#">Vive Casa</a></li>
                                 <li><a href="#">Promociones</a></li>
                             </ul>
                         </div>
             
                         <!-- Teaser -->
                         <div class="teaser">
                             <div class="inner-showcase-container dropshadow">
                                 <div class="escaparate-detalle layer"></div>
                                 <?php /*Find*/ foreach($tendencias_elements as $tendencias_element): ?>
                                     <img src="<?php echo base_url()."/uploads"; ?><?php echo $tendencias_element[$fieldTags["escaparate"]]["data"]; ?>" alt="" />                          
   
                                 <?php endforeach; ?>               
                             </div>
                     <?php /*Find*/ foreach($tendencias_elements as $tendencias_element): ?>
                             <div class="concept">
                                 <div class="tagline">
                                     <h2 class="ribbon">Claves</h2>
                                     <h3><?php echo $tendencias_element[$fieldTags["conc_sub1"]]["data"]; ?> <br /><span><?php echo $tendencias_element[$fieldTags["conc_sub2"]]["data"]; ?></span></h3>
                                 </div>
                                 
                                 <div class="article right">
                                     <h4><?php echo $tendencias_element[$fieldTags["conc_desc1"]]["data"]; ?></h4>
             
                                     <p><?php echo $tendencias_element[$fieldTags["conc_desc2"]]["data"]; ?>></p>
             
                                 </div>
                             </div>
             
                             <div class="showcase-container dropshadow">
                                 <ul id="inner-gallery" class="inner-gallery">
                                     <li><img src="img/tendencia/galeria/tendencia-galeria-t1.jpg" /></li>
                                     <li><img src="img/tendencia/galeria/tendencia-galeria-t1.jpg" /></li>
                                     <li><img src="img/tendencia/galeria/tendencia-galeria-t1.jpg" /></li>
                                     <li><img src="img/tendencia/galeria/tendencia-galeria-t1.jpg" /></li>
                                     <li><img src="img/tendencia/galeria/tendencia-galeria-t1.jpg" /></li>
                                 </ul>
                             </div>
             
                             <div class="season-products">
                                 <div class="tagline">
                                     <h2 class="ribbon">Colección</h2>
                                     <h3>Productos en tendencia <br /><span>de temporada</span></h3>
                                 </div>
                                 
                                 <div class="article left">
                                     <h4>Lorem ipsum dolor sit amet, consectetur adip iscing elitnteger sit.</h4>
             
                                     <p>Silla en madera negra, de Ralph Lauren.<br />
                                         Lámpara Austrek, de Kenzo.<br />
                                         Tetera vintage, exclusiva de Casa Palacio.</p>
                                 </div>
             
                                 <div class="featured-products box right">
                                     <div class="promo-label"></div>
                                     
                                     <ul id="productos-tendencia" class="featured-showcase">
                                         <li><img src="img/tendencia/galeria/tendencia-productos-t1.jpg" alt="" /></li>
                                         <li><img src="img/tendencia/galeria/tendencia-productos-t1.jpg" alt="" /></li>
                                         <li><img src="img/tendencia/galeria/tendencia-productos-t1.jpg" alt="" /></li>
                                     </ul>
                                 </div>
                             </div>
             
                             <div class="season-advice">
                                 <div class="tagline">
                                     <h2 class="ribbon">Siguiendo</h2>
                                     <h3>los aires e inspiraciones <br /><span>en tendencia</span></h3>
                                 </div>
             
                                 <div class="article left">
                                     <h5>Lorem ipsum colores</h5>
                                     <p>In condimentum interdum nibh, eu dictum tortor facilisis consectetur. Praesent pre tium imperdiet hendrerit. Duis vitae ferme ntum nunc. Quisque mattis nibh quis sol tristique ultricies.</p>
             
                                     <h5>Texturas inder duis</h5>
                                     <p>Suspendisse varius venenatis lacus, quis rutrum risus faucibus ut. Morbi pellentes que tempor tellus, sed condimentum.</p>
                                 </div>
             
                                 <div class="advice-products right">
                                     <div class="recomendacion-detalle layer"></div>
             
                                     <ul id="recomendacion" class="featured-showcase">
                                         <li><img src="img/tendencia/galeria/tendencia-recomendado-t1.jpg" alt="" /></li>
                                         <li><img src="img/tendencia/galeria/tendencia-recomendado-t1.jpg" alt="" /></li>
                                         <li><img src="img/tendencia/galeria/tendencia-recomendado-t1.jpg" alt="" /></li>
                                     </ul>
                                 </div>
                             </div>
               
                             <div class="season-poster"><img src="img/tendencia/tendencia-poster.jpg" alt="" /></div>
                         </div>
                         
                         <!-- Zona de marketing -->
                         <div class="marketing-zone dropshadow">
                             <a href="#"><img src="<?php echo base_url()."/uploads"; ?><?php echo $tendencias_element[$fieldTags["banner"]]["data"]; ?>" width="990" height="90" alt="" /></a>
    
                         </div>
                  <?php endforeach; ?>                                           
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
                                                 <input type="image" class="sprite btn go-btn right" src="img/core/buttons/transparent.gif" />
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
             
                                 <div class="qr-container right"><img src="img/tendencia/qr.jpg" width="101" height="80" /></div>
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
                                         <li><a href="http://pinterest.com/casapalacio/"><img src="img/core/buttons/pinterest-logo.jpg" width="64" height="26"></a></li>
                                         <li><a href="http://instagram.com/casa_palacio"><img src="img/core/buttons/instagram-logo.jpg" width="67" height="26"></a></li>
                                         <li><a href="http://twitter.com/casa_palacio"><img src="img/core/buttons/twitter-logo.jpg"  width="84" height="26"></a></li>
                                         <li><a href="https://www.facebook.com/vivetotalmentepalacio"><img src="img/core/buttons/facebook-logo.jpg" width="70" height="26"></a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
             
                     <div class="wrap tab clearfix">
                         <div class="tab-item"><a href="#"><img src="img/core/ui/el-palacio-de-hierro-logo.png" /></a></div>
                         <div class="tab-item"><a href="#"><img src="img/core/ui/la-boutique-palacio-logo.png" /></a></div>
                         <div class="tab-item"><a href="#"><img src="img/core/ui/viajes-palacio-logo.png" /></a></div>
                         <div class="tab-item"><a href="#"><img src="img/core/ui/celebra-logo.png" /></a></div>
                         <div class="tab-item"><a href="#"><img src="img/core/ui/credito-palacio-logo.png" /></a></div>
                     </div>
             
                     <div class="wrap privacity-note">
                         <h4>Aviso de privacidad</h4>
             
                         <p>En cumplimiento a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, El Palacio de Hierro, S.A. de C.V. informa a ustedes, los términos y condiciones del Aviso de Privacidad Simplificado de Datos Personales. Los datos personales recopilados son destinados para fines de identificación, contacto y verificación de información de nuestros clientes, para compras en línea y por<br /> teléfono, así como para el envío de las mercancías adquiridas y envío de promociones propias. Para información y contacto sobre este Aviso: <a href="mailto:atenciondatos@palaciohierro.com.mx">atenciondatos@palaciohierro.com.mx</a> o directamente en<br /> nuestras tiendas en el Módulo de atención al cliente. <a href="avisodeprivacidad/" target="_blank">Aviso de Privacidad completo.</a></p>
                     </div>
                 </body>
             </html>       