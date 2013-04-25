
                <!-- Inicia workspace -->
                <div class ="workspace" id="workspace">
					<div class="inner resize clearfix">
                    
                    
                        <div class="module-title">
                            <div class="icon-module" style="width:80px;">
                                <img width="100%" src="<?php echo base_url().'/uploads/files/images/'.$moduleData->urlIconImage; ?>" />
                            </div>
                            <div class="displayname-module">
                                <?php echo $moduleData->displayName; ?>
                            </div>
                        </div>
                            
						<div class="inner-header clearfix">
							<div class="title-bar">
								<h2 id="tooltip" alt="<?php echo $publicacion->publishDescription; ?>">
                                	<?php echo $publicacion->publishName; ?>
                                </h2>
								<h3><?php echo $publicacion->publishDescription; ?></h3>
							</div>

							<div class="date-box">
								<p>Última actualización: <?php echo $publicacion->updateDate; ?></p>
								<p>
									<?php 
										echo $publicacion->permanently=='1'?
													' PUBLICACIÓN PERMANENTE "':
													'PUBLICACIÓN DEL '.$publicacion->dateStart.' AL '.$publicacion->dateEnd; 
									?>
                                </p>
							</div>
						</div>
                        
                        
                    <!-- Inicia workspace -->
                    <div class ="workspace" id="workspace">
                    

                            <div class="edit-form-data">
                                <?php
                                    $this->load->library('formDataTypes');	
                                    $form = new FormDataTypes();				/* Creamos el objeto */
    
                                    foreach ($data as $row){
                                        $element = $form->getFormElement($row->entryContentsId, $row->dataTypesId,false,true); 
                                        if(strlen($element)>0){
                                ?>	
                                            <div class="edit-form-title data-information">
                                                <div class="edit-form-title data-information label">
                                                    <strong><?php echo  $row->displayName; ?></strong>
                                                </div>
                                                <div class="edit-form-title data-information data">
                                                    <?php echo $element; ?>
                                                </div>
                                                
                                            </div>	
                                <?php
                                        }
                                    }
                                ?>                                
                                
							<?php  
									//$attributes = array('class' => '', 'id' => 'editFormData', 'action' => 'nothing');
									//echo form_open('javascript',$attributes); 
							?>  
                            <form id="editFormData" name="editFormData" class="clearfix" method="post" action="javascript:void(0);">
                                

                                <div class="edit-form-data">
									<?php
										$this->load->library('formDataTypes');	
										$form = new FormDataTypes();				/* Creamos el objeto */
		
										foreach ($data as $row){
                                        	$element = $form->getFormElement($row->entryContentsId, $row->dataTypesId,true,false); 
											if(strlen($element)>0){
                                    ?>	
                                                <fieldset class="component comp-text">
                                                    <label for="" class="bit tagline">
														<?php echo  $row->displayName; ?> <br />
                                                    	<span><?php echo $row->description; ?></span>
                                                 	</label>
                                                    
                                                    <div class="bit">
                                                        <?php echo $element; ?>
                                                        <p class="label">notas lorem ipsum dolor hjvjhvhv</p>
                                                    </div>
                    
                                                    <span class="helper" id ="tooltip" alt="<?php echo $row->description; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </fieldset>	
                                    <?php
                                    		}
                                    	}
                                    ?>             
                                    
                                    
                                    <ul class="controller nav-bar clearfix">
                                        <?php foreach($structures as $st): ?>
                                            <li  id ="tooltip" alt="<?php echo $st	->description; ?>">
                                            	<a href="<?php echo base_url().'admin.php/cms/content/contentspublished/showlist/'.md5($st->entryStructuresId).'?mod='.md5($this->config->item('publish_edit_section')).'&ps='.md5($row->entryContentsId); ?>" class="txt-btn"><?php echo $st->name; ?></a>&nbsp;&nbsp;&nbsp;|
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>                   
                                </div>
                                
                                <ul class="controller nav-bar clearfix">
                                    <li><a href="#" class="action-btn save-btn" id="btnSave">Guardar</a></li>
                                    <li><a href="#" class="action-btn cancel-btn">Cancelar</a></li>
                                </ul>
                                
                                <div id="edit-buttons-area">
                                
                                    <!--

                                	<input class="action-btn save-btn"  type="button" value="Cancelar" />
                                	<input class="button"  type="submit" value="Guardar" />                                	
                                    <a class="button" href="#click" type="submit" onclick="saveDataForm();">Guardar</a>
                                	<a class="button" href="#click" type="submit" onclick="validateForm();">Validar</a>
                                	<a class="button" href="#click" onclick="">Cancelar</a>
                                    -->
                                </div>
                            </div>
                            
                            </form>
                            
                        
                        

                    </div>
                    <!-- Termina workspace -->
            </div>
            <!-- Termina main-content -->
              