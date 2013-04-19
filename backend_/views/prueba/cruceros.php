                   ﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                   <html xmlns="http://www.w3.org/1999/xhtml">
                       <head>
                           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                           <meta name="format-detection" content="telephone=no" />
              
						<?php 		echo $libraries;	?>
						
                       
                               
                   </head>
                   
                   <body>
                   <div class="wrap">
                         
                         <!-- Catalogo de Productos -->
                         <div class="catalog-showcase">
                           <ul>
                               <?php foreach($cruceros_elements as $cruceros_element): ?>             <li class="catalog-item" id="<?php echo $cruceros_element[$fieldTags->entryContentsId]["data"]; ?>">
                                   <div class="product-banner" rel="1">
                                     <h2 class="product-tag">
                                         <?php echo $cruceros_element[$fieldTags->nombre]["data"]; ?><br />
                                         <span><?php echo $cruceros_element[$fieldTags->lugar]["data"]; ?></span>
                                     </h2>
                                     <a rel="1" href="#" class="product-shutter">
                                           <img src="<?php echo base_url()."/uploads"; ?><?php echo $cruceros_element[$fieldTags->imagen]["data"]; ?>" alt="" />
          
                                     </a> 
                                     <!-- Promocion -->
                                     <input type="hidden" value="">
                                     <input type="hidden" value="">
                                   </div>
                                   <div class="tab">
                                     <p class="product-destiny promotion"><span><?php echo $cruceros_element[$fieldTags->precio]["data"]; ?></span></p>
                                     <a href="#" rel="1" class="btn detail-btn">Ver <?php echo $cruceros_element["entryContentsId"]; ?> &rsaquo;</a> </div>
                                 </li>
                                 <?php endforeach; ?>           </ul>
                         </div>
                         <div class="paginator-bar">
                           <ul class="paginator">
          <li>resultados total:<?php echo $cruceros_total_results; ?></li>
          <li>total paginas: <?php echo $cruceros_total_pages; ?></li>
        <li>
			
						<div class="paginator">
							<?php if($cruceros_actual_page > 1): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $cruceros_actual_page-1; ?>">&lt;</a>
							<?php endif; ?>
							<ul>
								<?php for($i=1; $i<=$cruceros_total_pages; $i++){ ?>
									<li <?php if($cruceros_actual_page == $i) echo "class=\"current\""?>>
										<a href="<?php echo $url_section; ?>/page/<?php echo $i; ?>"><?php echo $i; ?></a>
									</li>
								<?php } ?>
							</ul>
							<?php if($cruceros_actual_page < $cruceros_total_pages): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $cruceros_actual_page+1; ?>">&gt;</a>
							<?php endif; ?>
						</div>
						
			</li><hr>
        <li>
						<div class="paginator">
							<?php if($cruceros_actual_page > 1): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $cruceros_actual_page-1; ?>">&lt;</a>
							<?php endif; ?>
							<ul>
								<li>
									Página <?php echo $cruceros_actual_page; ?> de <?php echo $cruceros_total_pages; ?>
								</li>
							</ul>
							<?php if($cruceros_actual_page < $cruceros_total_pages): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $cruceros_actual_page+1; ?>">&gt;</a>
							<?php endif; ?>
						</div>
						
			</li>  
  </ul> </div>                      </div>
                       
                     </div>
                     <!-- end board --> 
                    </div>
                   </div>
                   </body>
                   </html>         