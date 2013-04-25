<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class sectionCreator {
	
	
		var $CI;
		var $SECTION_ID;
		var $ACTUAL_PAGE = 1;
		
		/**
		* Constructor de la librería
		*
		* return void
		*/
		public function __construct(){
			$this->CI =& get_instance();
			$this->CI->load->helper('url');
			$this->CI->load->library('session');
			$this->CI->load->database();
		}
		
		/**
		* Función que genera el còdigo HTML de la vista de la sección
		*
		* @param sectionId     id de sección a generar Vista
		* return void
		*/
		public function generateViewCode($sectionId){
			
			$this->SECTION_ID = $sectionId;
			$rs = $this->CI->db->select('CAT_SECTIONS.sectionsId, templateUpdateDate, url, frontTemplateUpdateDate')->
						from('CAT_SECTIONS')->
						join('CAT_TEMPLATES','CAT_TEMPLATES.templatesId = CAT_SECTIONS.templatesId','INNER')->
						where('sectionsId',$sectionId)->get();
			$row 		= $rs->row();
			
			$file_section_path 		= $this->CI->config->item('upload_section_templates_folder');
			$frontend_section_path 	= $this->CI->config->item('frontend_section_folder');
			$frontend_versions_path 	= $this->CI->config->item('frontend_versions_folder');
				
			$nameParts =  explode('/',$row->url);
			$controllerName = $nameParts[count($nameParts)-1];
			if(count($nameParts)>1)
				unset($nameParts[count($nameParts)-1]);
				
			if(!file_exists($file_section_path.md5($sectionId).'.tpl'))
				echo "El archivo ".$file_section_path.md5($sectionId).'.tpl'." no existe";
			

			$folder = implode('/',$nameParts);
			if(!file_exists($frontend_versions_path.'views'.$folder))
				mkdir($frontend_versions_path.'views'.$folder, 0777, true);
			if(!file_exists($frontend_section_path.'views'.$folder))
				mkdir($frontend_section_path.'views'.$folder, 0777, true);
				
			$outputFile = $frontend_section_path.'views'.$row->url.'.php';
			if(file_exists($outputFile))
				copy($outputFile, $frontend_versions_path.'views'.$row->url.'['.$row->frontTemplateUpdateDate.'].php');
				
			$data->lines = array();
			$gestor = fopen($file_section_path.md5($sectionId).'.tpl', "r");
			$textFile = '';
			while(!feof($gestor)) {
				$line = fgets($gestor);
				$line = $this->checkTemplateSintax($line);
				$textFile .= $line;
			}
			fclose($gestor);
							 
			//if(strlen($textFile)>2)	$textFile = substr($textFile,0,strlen($textFile)-2);
			file_put_contents($outputFile, $textFile);
			file_get_contents($outputFile); 
			
			$updateData = array(  	'frontTemplateUpdateDate' 	=> date('Y-m-d h:i:s'),
									'frontTemplateUpdateUserId'	=> $this->CI->session->userdata['usersId']		);
			$this->CI->db->where('sectionsId',		$sectionId);
			$this->CI->db->update('CAT_SECTIONS', 	$updateData); 
	
			return '';
		}
		
		/**
		* Función que genera el còdigo php del controlador de la sección
		*
		* @param sectionId     id de sección a generar Vista
		* return void
		*/
		public function generateControllerCode($sectionId){
			
			$this->SECTION_ID = $sectionId;
			$rs = $this->CI->db->select('CAT_SECTIONS.*')->
						from('CAT_SECTIONS')->
						join('CAT_TEMPLATES','CAT_TEMPLATES.templatesId = CAT_SECTIONS.templatesId','INNER')->
						where('sectionsId',$sectionId)->get();
			$row 		= $rs->row();
			
			$nameParts =  explode('/',$row->url);
			$controllerName = $nameParts[count($nameParts)-1];
			if(count($nameParts)>1)
				unset($nameParts[count($nameParts)-1]);
				
			$file_section_path 		= $this->CI->config->item('upload_section_templates_folder');
			$frontend_section_path 	= $this->CI->config->item('frontend_section_folder');
			$generators_folder 		= $this->CI->config->item('template_generators_folder');
			$frontend_versions_path 	= $this->CI->config->item('frontend_versions_folder');
				
			if(!file_exists($generators_folder.'Controller.tpl'))
				echo "El archivo ".$generators_folder.'Controller.tpl'." no existe";
			
			$folder = implode('/',$nameParts);
			if(!file_exists($frontend_versions_path.'controllers'.$folder))
				mkdir($frontend_versions_path.'controllers'.$folder, 0777, true);
			if(!file_exists($frontend_section_path.'controllers'.$folder))
				mkdir($frontend_section_path.'controllers'.$folder, 0777, true);				
					
			$outputFile = $frontend_section_path.'controllers'.$row->url.'.php';
			if(file_exists($outputFile))
				copy($outputFile, $frontend_versions_path.'controllers'.$row->url.'['.$row->frontTemplateUpdateDate.'].php');
			
			$data->lines = array();
			$gestor = fopen($file_section_path.md5($sectionId).'.tpl', "r");
			$textFile = $indexCode = $idCode = $findCode = $likeCode = $pageCode = '';
			while(!feof($gestor)) {
				$line = fgets($gestor);
				
				$statements = '  ';
				$posOpen = strpos($line,  $this->CI->config->item('open_framework_tag'));
				$posClose = strpos($line,  $this->CI->config->item('close_framework_tag'));
				while($posClose*$posOpen>0){
					$statement 		= substr($line,$posOpen,$posClose-$posOpen+2);	
					$statements .= $statement;
					$line 	= str_replace($statement,'',$line);
					$posOpen = strpos($line,  $this->CI->config->item('open_framework_tag'));
					$posClose = strpos($line,  $this->CI->config->item('close_framework_tag'));
				}
					
				$posOpen = strpos($statements,  $this->CI->config->item('open_framework_tag'));
				$posClose = strpos($statements,  $this->CI->config->item('close_framework_tag'));
				
				if($posClose*$posOpen>0){

					$indexCode 	.= $this->checkControllerSintax($statements,'_index');
					$idCode 	.= $this->checkControllerSintax($statements,'_id');
					$findCode 	.= $this->checkControllerSintax($statements,'_find');
					$likeCode 	.= $this->checkControllerSintax($statements,'_like');
					$pageCode 	.= $this->checkControllerSintax($statements,'_page');
				}
			}
			fclose($gestor);
			
			
			$gestor = fopen($generators_folder.'Controller.tpl', "r");
			while(!feof($gestor)) {
				$line = fgets($gestor);
				$textFile 	.= $line;
			}
			fclose($gestor);
			
			$urlParts 		= explode('/',$row->url);
			$sectionName 	= $urlParts[count($urlParts)-1];
			
			
			$openTag 	= $this->CI->config->item('open_framework_tag');
			$closeTag 	= $this->CI->config->item('close_framework_tag');
			$creationDate = date('Y-m-d h:i:s');
			$textFile = str_replace($openTag.'url_section'.$closeTag,$row->url,$textFile);
			$textFile = str_replace($openTag.'section_name'.$closeTag,ucfirst(strtolower($sectionName)),$textFile);
			$textFile = str_replace($openTag.'function_parameters'.$closeTag,'/******* Parametros *******/',$textFile);
			$textFile = str_replace($openTag.'title_page'.$closeTag,$row->name.' - '.$row->description,$textFile);
			$textFile = str_replace($openTag.'title_section'.$closeTag,$row->name.' - '.$row->description,$textFile);
			$textFile = str_replace($openTag.'function_description'.$closeTag,$row->name.' - '.$row->description,$textFile);
			$textFile = str_replace($openTag.'view_section_file'.$closeTag,$row->url,$textFile);
			$textFile = str_replace($openTag.'global_vars'.$closeTag,'/******* Variables globales *******/',$textFile);
			$textFile = str_replace($openTag.'extra_functions'.$closeTag,'/******* Funciones extras *******/',$textFile);
			$textFile = str_replace($openTag.'creation_date'.$closeTag,$creationDate,$textFile);
			
			$textFile = str_replace($openTag.'function_index_code'.$closeTag,$indexCode,$textFile);
			$textFile = str_replace($openTag.'function_id_code'.$closeTag,$idCode,$textFile);
			$textFile = str_replace($openTag.'function_find_code'.$closeTag,$findCode,$textFile);
			$textFile = str_replace($openTag.'function_like_code'.$closeTag,$likeCode,$textFile);
			$textFile = str_replace($openTag.'function_page_code'.$closeTag,$pageCode,$textFile);

			file_put_contents($outputFile, $textFile);
			file_get_contents($outputFile); 
			
			$updateData = array(  	'frontTemplateUpdateDate' 	=> $creationDate,
									'frontTemplateUpdateUserId'	=> $this->CI->session->userdata['usersId']		);
			$this->CI->db->where('sectionsId',		$sectionId);
			$this->CI->db->update('CAT_SECTIONS', 	$updateData); 
			
			return '';
			
		}
		
		
		/**
		* Función verifica si la linea necesita generar codigo PHP adicional en el controlador
		*
		* @param line     Linea de codigo del template a procesar
		* return void
		*/
		function checkTemplateSintax($line){
			$posOpen 	= strpos($line,  $this->CI->config->item('open_framework_tag'));
			$posClose 	= strpos($line,  $this->CI->config->item('close_framework_tag'));
			if($posClose*$posOpen>0){
				$statement 		= substr($line,$posOpen,$posClose-$posOpen+2);			
				$posSpace	 	= strpos($statement,' ');
				$posDot	 	= strpos($statement,'.');
				$posSpace = $posDot<$posSpace ? ($posDot>0?$posDot:$posSpace) : ($posSpace>0?$posSpace:$posDot) ;
				$instruction 	= substr($line,$posOpen+2,($posSpace>0?$posSpace:$posClose-$posOpen)-2);
				$instruction 	= str_replace('-','',$instruction);

				if (method_exists($this, 'get_'.$instruction.'_view_code'))
					$line = str_replace($statement,$this->{'get_'.str_replace('-','',$instruction).'_view_code'}($statement),$line) ;
				else
					$line = str_replace($statement,'<!-- Etiqueta '.$instruction.' no definida -->',$line);
				return $this->checkTemplateSintax($line);
			}

			return $line;
		}
		
		
		/**
		* Función verifica si la linea necesita generar codigo PHP adicional en el controlador
		*
		* @param line     Linea de codigo del template a procesar
		* return void
		*/
		function checkControllerSintax($line,$function=''){
			
			$posOpen = strpos($line,  $this->CI->config->item('open_framework_tag'));
			$posClose = strpos($line,  $this->CI->config->item('close_framework_tag'));
			
			if($posClose*$posOpen>0){
				$statement 		= substr($line,$posOpen,$posClose-$posOpen+2);			
				$posSpace	 	= strpos($statement,' ');
				$posDot	 	= strpos($statement,'.');
				$posSpace = $posDot<$posSpace ? ($posDot>0?$posDot:$posSpace) : ($posSpace>0?$posSpace:$posDot) ;
				$instruction 	= substr($line,$posOpen+2,($posSpace>0?$posSpace:$posClose-$posOpen)-2);
				$instruction 	= str_replace('-','',$instruction);

				if (method_exists($this, 'get_'.$instruction.'_controller'.$function.'_code'))
					$line = '
					/*Código generado automáticamente para la instrucción: '.$instruction.'*/
			'.str_replace($statement,$this->{'get_'.str_replace('-','',$instruction).'_controller'.$function.'_code'}($statement),$line) ;
				else
					$line = str_replace($statement,'/*No se reconoce la instrucción: '.$instruction.'*/
			',$line);

				return $this->checkControllerSintax($line,$function);
			}
            
			return $line;
		}
		
		
		
		
		/*************************************************************************************
			 A partir de aqui, son las funciones específicas por sentencia framework
		**************************************************************************************/
			
			
			
			
		/*************************************************************************************
			 start-loop
		**************************************************************************************/
			
		/*	start-loop: index Function	*/
		function get_startloop_controller_index_code($statement){
			
			
			
			$posStart 	= strpos($statement,'rowsPerPage=')+strlen('rowsPerPage=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$perPage 	= is_numeric(substr($statement, $posStart, $posEnd-$posStart))?substr($statement, $posStart, $posEnd-$posStart):0;
			
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
					
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			
			$code = '
						$rs_contents = $this->db->select(\'CAT_ENTRY_CONTENTS.*\')->
										from(\'CAT_ENTRY_CONTENTS\')->
										where(\'MD5(entryStructuresId)\',\''.$structure.'\')->get();
						
						$this->db->flush_cache();
						$output->'.$this->toCamelString($row->name).'_elements = array();
						$cnt = 0;
						foreach ($rs_contents->result() as $row){
							$cnt++;
							$this->db->select("DET_ENTRY_CONTENTS.data, CAT_DATA_TYPES.dataTypesId, CAT_DATA_TYPES.prefix, CAT_DATA_TYPES.postfix"); 
							$this->db->from("CAT_ENTRY_CONTENTS");
							$this->db->join("DET_ENTRY_CONTENTS", "CAT_ENTRY_CONTENTS.entryContentsId  = DET_ENTRY_CONTENTS.entryContentsId ", "INNER");
							$this->db->join("CAT_DATA_TYPES", "DET_ENTRY_CONTENTS.dataTypesId  	= CAT_DATA_TYPES.dataTypesId ", "INNER");
							$rs_qry = $this->db->where("MD5(DET_ENTRY_CONTENTS.entrycontentsId) = \'".md5($row->entryContentsId)."\'  ")->get();

							$dataRow = array();
							foreach ($rs_qry->result() as $rowData)
								$dataRow[MD5($rowData->dataTypesId)] = array(
																"data"=>$rowData->prefix.$rowData->data.$rowData->postfix,
																"dataTypeId"=>$rowData->dataTypesId);
							
							$dataRow["entryContentsId"] = $row->entryContentsId;
							array_push($output->'.$this->toCamelString($row->name).'_elements,$dataRow);
						}
						$perPage 	= '.$perPage.';
						$output->'.$this->toCamelString($row->name).'_actual_page = $actualPage = $this->ACTUAL_PAGE;
						$actualPage--;
						if($perPage>0){
							$output->'.$this->toCamelString($row->name).'_total_pages = ($cnt-($cnt%$perPage))/$perPage + ($cnt%$perPage>0?1:0);
							if($actualPage*$perPage >= $cnt)
								$output->'.$this->toCamelString($row->name).'_elements = array_slice($output->'.$this->toCamelString($row->name).'_elements, ($actualPage-1)*$perPage,$cnt%$perPage);   
							else
								$output->'.$this->toCamelString($row->name).'_elements = array_slice($output->'.$this->toCamelString($row->name).'_elements, ($actualPage-1)*$perPage,$perPage);   
						}else
							$output->'.$this->toCamelString($row->name).'_total_pages = 1;
						
						$output->'.$this->toCamelString($row->name).'_total_results = $cnt;
			';
			return $code;
		}
		
		
		/*	start-loop: page Function	*/
		function get_startloop_controller_page_code($statement){
			
			return '';
		}
		
		
		/*	start-loop: id Function	*/
		function _get_startloop_controller_id_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			$code = '
						$this->db->select("*"); 
						$this->db->from("CAT_ENTRY_CONTENTS");
						$this->db->join("DET_ENTRY_CONTENTS", "CAT_ENTRY_CONTENTS.entryContentsId  = DET_ENTRY_CONTENTS.entryContentsId ", "INNER");
						$this->db->join("CAT_DATA_TYPES", "DET_ENTRY_CONTENTS.dataTypesId  	= CAT_DATA_TYPES.dataTypesId ", "INNER");
						$rs_qry = $this->db->where("MD5(DET_ENTRY_CONTENTS.entrycontentsId) = \'".MD5($valueId)."\'  ")->get();
			';
			return '<?php foreach($'.$this->toCamelString($row->name).'_elements as $'.$this->toCamelString($row->name).'_element): ?>';
		}
		/*  start-loop: View Code Generator */
		function get_startloop_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			return '<?php foreach($'.$this->toCamelString($row->name).'_elements as $'.$this->toCamelString($row->name).'_element): ?>';
		}
		
		/*************************************************************************************
			 end-loop
		**************************************************************************************/
			
		/*  end-loop: View Code Generator */
		function get_endloop_view_code($statement){
			return '<?php endforeach; ?>';
		}
		
		/*************************************************************************************
			 url-base
		**************************************************************************************/
			
		/*  end-loop: View Code Generator */
		function get_urlbase_view_code($statement){
			return '<?php echo base_url(); ?>';
		}
		
		/*************************************************************************************
			 url-uploads-folder
		**************************************************************************************/
			
		/*  end-loop: View Code Generator */
		function get_urluploadsfolder_view_code($statement){
			return '<?php echo base_url()."'.$this->CI->config->item('upload_folder_url').'"; ?>';
		}
		
		/*************************************************************************************
			 url-uploads-folder
		**************************************************************************************/
			
		/*  end-loop: View Code Generator */
		function get_urlresourcesfolder_view_code($statement){
			return '<?php echo base_url()."'.$this->CI->config->item('upload_resources_folder_url').'"; ?>';
		}
		
		
		/*************************************************************************************
			 element
		**************************************************************************************/

		/*  element: index Function */
		function get_element_controller_index_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			$structure 	= $this->toCamelString($row->name);
			
			$posStart 	= strpos($statement,'fieldId=')+strlen('fieldId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$dataField 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('dataTypesId, name')->
						from('CAT_DATA_TYPES')->
						where('MD5(dataTypesId)',$dataField)->get();
			$row = $rs->row();

			$dataField 	= $this->toCamelString($row->name);
	
			$posStart 	= strpos($statement,'.')+1;
			$posSpace	= strpos($statement,' ');
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) ;			
			$dataName 	= substr($statement, $posStart, $posEnd-$posStart);
			return '						$fieldTags["'.$dataName.'"] = "'.md5($row->dataTypesId).'";
';
			
		}

		/*  element: View Code Generator */
		function get_element_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			$structure 	= $this->toCamelString($row->name);
			
			$posStart 	= strpos($statement,'fieldId=')+strlen('fieldId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$dataField 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_DATA_TYPES.name')->
						from('CAT_DATA_TYPES')->
						where('MD5(dataTypesId)',$dataField)->get();
			$row = $rs->row();

			$dataField 	= $this->toCamelString($row->name);
	
			$posStart 	= strpos($statement,'.')+1;
			$posSpace	= strpos($statement,' ');
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) ;			
			$dataName 	= substr($statement, $posStart, $posEnd-$posStart);
			return '<?php echo $'.$structure.'_element[$fieldTags["'.$dataName.'"]]["data"]; ?>';
		}
		
		
		/*************************************************************************************
			 elementId
		**************************************************************************************/

		/*  elementId: View Code Generator */
		function get_elementid_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();

			$structure 	= $this->toCamelString($row->name);

			return '<?php echo $'.$structure.'_element["entryContentsId"]; ?>';
		}
		
		/*************************************************************************************
			 total-results
		**************************************************************************************/

		/*  total-results: View Code Generator */
		function get_totalresults_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();

			$structure 	= $this->toCamelString($row->name);

			return '<?php echo $'.$structure.'_total_results; ?>';
		}
		
		
		/*************************************************************************************
			 paginator
		**************************************************************************************/
			
		/*	paginator: index Function	*/
		function get_paginator_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
					
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			
			$code = '
			
						<div class="paginator">
							<?php if($'.$this->toCamelString($row->name).'_actual_page > 1): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $'.$this->toCamelString($row->name).'_actual_page-1; ?>">&lt;</a>
							<?php endif; ?>
							<ul>
								<?php for($i=1; $i<=$'.$this->toCamelString($row->name).'_total_pages; $i++){ ?>
									<li <?php if($'.$this->toCamelString($row->name).'_actual_page == $i) echo "class=\"current\""?>>
										<a href="<?php echo $url_section; ?>/page/<?php echo $i; ?>"><?php echo $i; ?></a>
									</li>
								<?php } ?>
							</ul>
							<?php if($'.$this->toCamelString($row->name).'_actual_page < $'.$this->toCamelString($row->name).'_total_pages): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $'.$this->toCamelString($row->name).'_actual_page+1; ?>">&gt;</a>
							<?php endif; ?>
						</div>
						
			';
			return $code;
		}
		
		
		/*************************************************************************************
			 paginator-short
		**************************************************************************************/
			
		/*	paginator-short: index Function	*/
		function get_paginatorshort_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
					
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();
			
			$code = '
						<div class="paginator">
							<?php if($'.$this->toCamelString($row->name).'_actual_page > 1): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $'.$this->toCamelString($row->name).'_actual_page-1; ?>">&lt;</a>
							<?php endif; ?>
							<ul>
								<li>
									Página <?php echo $'.$this->toCamelString($row->name).'_actual_page; ?> de <?php echo $'.$this->toCamelString($row->name).'_total_pages; ?>
								</li>
							</ul>
							<?php if($'.$this->toCamelString($row->name).'_actual_page < $'.$this->toCamelString($row->name).'_total_pages): ?>
								<a class="prev" href="<?php echo $url_section; ?>/page/<?php echo $'.$this->toCamelString($row->name).'_actual_page+1; ?>">&gt;</a>
							<?php endif; ?>
						</div>
						
			';
			return $code;
		}
		
		
		/*************************************************************************************
			 total-pages
		**************************************************************************************/

		/*  total-pages: View Code Generator */
		function get_totalpages_view_code($statement){
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$structure 	= substr($statement, $posStart, $posEnd-$posStart);
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structure)->get();
			$row = $rs->row();

			$structure 	= $this->toCamelString($row->name);

			return '<?php echo $'.$structure.'_total_pages; ?>';
		}
		
		
		/*************************************************************************************
			 url-section
		**************************************************************************************/

		/*  url-section: View Code Generator */
		function get_urlsection_view_code($statement){
			
			$posStart 	= strpos($statement,'parameters=')+strlen('parameters=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$parameters	= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,str_replace("%","",$this->CI->config->item('section_tag')).'=')
										+strlen(str_replace("%","",$this->CI->config->item('section_tag')).'=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			
			$section 	= substr($statement, $posStart, $posEnd-$posStart);
			
			$rs = $this->CI->db->select('CAT_SECTIONS.*')->
						from('CAT_SECTIONS')->
						where('MD5(sectionsId)',$section)->get();
			$row = $rs->row();


			return '<?php echo substr(base_url(),0,strlen(base_url())-1).$urlSections["'.$section.'"]."'.$parameters.'"; ?>';
		}
		
		
		/*  url-section: index Function */
		function get_urlsection_controller_index_code($statement){
			
			$posStart 	= strpos($statement,str_replace("%","",$this->CI->config->item('section_tag').'='))+
								strlen(str_replace("%","",$this->CI->config->item('section_tag')).'=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$section 	= substr($statement, $posStart, $posEnd-$posStart);
			
			$rs = $this->CI->db->select('CAT_SECTIONS.*')->
						from('CAT_SECTIONS')->
						where('MD5(sectionsId)',$section)->get();
			$row = $rs->row();


			return '

					$rs = $this->db->select(\'url\')->
								from(\'CAT_SECTIONS\')->
								where(\'MD5(CAT_SECTIONS.sectionsId)\',\''.$section.'\')->get();
					$row =$rs->row();
					$output->urlSections[\''.$section.'\'] = $row->url;
					
					';
		}
		
		
		
		/*************************************************************************************
			 find-elements
		**************************************************************************************/

		/*  find-elements: View Code Generator */
		function get_findelements_view_code($statement){
						   
			$posStart 	= strpos($statement,'name=')+strlen('name=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$name 		= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'maxElements=')+strlen('maxElements=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$maxElements= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'rowsPerPage=')+strlen('rowsPerPage=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$rowsPerPage= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$structureId= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'whereFieldId=')+strlen('whereFieldId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$whereFieldId 	= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'condition=')+strlen('condition=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$condition 	= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'value=')+strlen('value=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$value 		= substr($statement, $posStart, $posEnd-$posStart);

			$rs = $this->CI->db->select('dataTypesId,entryStructuresId')->
						from('DET_ENTRY_STRUCTURE')->
						where('MD5(entryStructuresId)',$structureId)->
						where('MD5(dataTypesId)',$whereFieldId)->get();
			$row = $rs->row();
			$field = $row->dataTypesId;
			
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structureId)->get();
			$row = $rs->row();
			
			return '<?php /*Find*/ foreach($'.$this->toCamelString($row->name).'_elements as $'.$this->toCamelString($row->name).'_element): ?>';
		}
		
		/*  find-elements: index Function */
		function get_findelements_controller_index_code($statement){
		
			$posStart 	= strpos($statement,'name=')+strlen('name=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$name 		= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'maxElements=')+strlen('maxElements=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$maxElements= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'rowsPerPage=')+strlen('rowsPerPage=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$rowsPerPage= substr($statement, $posStart, $posEnd-$posStart);
			$rowsPerPage = strlen($rowsPerPage)==0?0:$rowsPerPage;
			
			$posStart 	= strpos($statement,'structureId=')+strlen('structureId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$structureId= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'whereFieldId=')+strlen('whereFieldId=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$whereFieldId 	= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'condition=')+strlen('condition=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$condition 	= substr($statement, $posStart, $posEnd-$posStart);
			
			$posStart 	= strpos($statement,'value=')+strlen('value=')+1;
			$posSpace	= strpos($statement,' ',$posStart);
			$posEnd	 	= strpos($statement,'%',2);
			$posEnd 	= $posEnd<$posSpace ? ($posEnd>0?$posEnd:$posSpace) : ($posSpace>0?$posSpace:$posEnd) - 1;
			$value 		= substr($statement, $posStart, $posEnd-$posStart);
			
			$rs = $this->CI->db->select('CAT_ENTRY_STRUCTURES.*')->
						from('CAT_ENTRY_STRUCTURES')->
						where('MD5(entryStructuresId)',$structureId)->get();
			$row = $rs->row();
			
			$condition = (strlen($value)*strlen($condition)*strlen($whereFieldId))?'					
						$this->db->where("CAT_DATA_TYPES", "DET_ENTRY_CONTENTS.dataTypesId  	= CAT_DATA_TYPES.dataTypesId ", "INNER");
						':'';

			return $code = '
						$rs_contents = $this->db->select(\'CAT_ENTRY_CONTENTS.*\')->
										from(\'CAT_ENTRY_CONTENTS\')->
										where(\'MD5(entryStructuresId)\',\''.$structureId.'\')->get();
						
						$this->db->flush_cache();
						$output->'.$this->toCamelString($row->name).'_elements = array();
						$cnt = 0;
						foreach ($rs_contents->result() as $row){
							$cnt++;
							$this->db->select("DET_ENTRY_CONTENTS.data, CAT_DATA_TYPES.dataTypesId, CAT_DATA_TYPES.prefix, CAT_DATA_TYPES.postfix"); 
							$this->db->from("CAT_ENTRY_CONTENTS");
							$this->db->join("DET_ENTRY_CONTENTS", "CAT_ENTRY_CONTENTS.entryContentsId  = DET_ENTRY_CONTENTS.entryContentsId ", "INNER");
							$this->db->join("CAT_DATA_TYPES", "DET_ENTRY_CONTENTS.dataTypesId  	= CAT_DATA_TYPES.dataTypesId ", "INNER");
							$rs_qry = $this->db->where("MD5(DET_ENTRY_CONTENTS.entrycontentsId) = \'".md5($row->entryContentsId)."\'  ")->get();

							$dataRow = array();
							foreach ($rs_qry->result() as $rowData)
								$dataRow[MD5($rowData->dataTypesId)] = array(
																"data"=>$rowData->prefix.$rowData->data.$rowData->postfix,
																"dataTypeId"=>$rowData->dataTypesId);
							
							$dataRow["entryContentsId"] = $row->entryContentsId;
							array_push($output->'.$this->toCamelString($row->name).'_elements,$dataRow);
						}
						$perPage 	= '.$rowsPerPage.';
						$output->'.$this->toCamelString($row->name).'_actual_page = $actualPage = $this->ACTUAL_PAGE;
						$actualPage--;
						if($perPage>0){
							$output->'.$this->toCamelString($row->name).'_total_pages = ($cnt-($cnt%$perPage))/$perPage + ($cnt%$perPage>0?1:0);
							if($actualPage*$perPage >= $cnt)
								$output->'.$this->toCamelString($row->name).'_elements = array_slice($output->'.$this->toCamelString($row->name).'_elements, ($actualPage-1)*$perPage,$cnt%$perPage);   
							else
								$output->'.$this->toCamelString($row->name).'_elements = array_slice($output->'.$this->toCamelString($row->name).'_elements, ($actualPage-1)*$perPage,$perPage);   
						}else
							$output->'.$this->toCamelString($row->name).'_total_pages = 1;
						
						$output->'.$this->toCamelString($row->name).'_total_results = $cnt;
			';
			
			$code = '
						$this->db->select("*"); 
						$this->db->from("CAT_ENTRY_CONTENTS");
						$this->db->join("DET_ENTRY_CONTENTS", "CAT_ENTRY_CONTENTS.entryContentsId  = DET_ENTRY_CONTENTS.entryContentsId ", "INNER");
						$this->db->join("CAT_DATA_TYPES", "DET_ENTRY_CONTENTS.dataTypesId  	= CAT_DATA_TYPES.dataTypesId ", "INNER");
						';
						
		/* Pendiente 
			$code .= '
						$rs_qry = $this->db->where("MD5(DET_ENTRY_CONTENTS.entrycontentsId) = \'".MD5($valueId)."\'  ")->get();
			';
		*/
			$code .= '
						$rs_qry = $this->db->where("MD5(DET_ENTRY_CONTENTS.entrycontentsId) = \'".MD5($valueId)."\'  ")->get();
			';
			return '';
	
		}
		
		
		/*************************************************************************************
			 end-find-elements
		**************************************************************************************/
			
		/*  end-find-elements: View Code Generator */
		function get_endfindelements_view_code($statement){
			return '<?php endforeach; ?>';
		}
		
		
		/*************************************************************************************
			 insert-libraries
		**************************************************************************************/

		/*  element: index Function */
		function get_insertlibraries_controller_index_code($statement){
			
			$rs = $this->CI->db->select('CAT_LIBRARIES.urlFile, CAT_LIBRARIES.displayName, CAT_LIBRARY_TYPES.extensionFile, CAT_LIBRARY_TYPES.url_path')->
								from('CAT_SECTIONS')->
								join('CAT_TEMPLATES','CAT_TEMPLATES.templatesId = CAT_SECTIONS.templatesId','INNER')->
								join('DET_LIBRARIES_TEMPLATES','DET_LIBRARIES_TEMPLATES.templatesId = CAT_TEMPLATES.templatesId','INNER')->
								join('CAT_LIBRARIES','CAT_LIBRARIES.librariesId = DET_LIBRARIES_TEMPLATES.librariesId','INNER')->
								join('CAT_LIBRARY_TYPES','CAT_LIBRARY_TYPES.libraryTypesId = CAT_LIBRARIES.libraryTypesId','INNER')->
								where('CAT_SECTIONS.sectionsId',$this->SECTION_ID)->
								where('CAT_LIBRARIES.active',1)->
								order_by('order')->get();


			return '
					$sectionId = "'.$this->SECTION_ID.'";
					$rs = $this->db->select(\'CAT_LIBRARIES.urlFile, CAT_LIBRARIES.displayName, CAT_LIBRARY_TYPES.extensionFile, CAT_LIBRARY_TYPES.url_path\')->
								from(\'CAT_SECTIONS\')->
								join(\'CAT_TEMPLATES\',\'CAT_TEMPLATES.templatesId = CAT_SECTIONS.templatesId\',\'INNER\')->
								join(\'DET_LIBRARIES_TEMPLATES\',\'DET_LIBRARIES_TEMPLATES.templatesId = CAT_TEMPLATES.templatesId\',\'INNER\')->
								join(\'CAT_LIBRARIES\',\'CAT_LIBRARIES.librariesId = DET_LIBRARIES_TEMPLATES.librariesId\',\'INNER\')->
								join(\'CAT_LIBRARY_TYPES\',\'CAT_LIBRARY_TYPES.libraryTypesId = CAT_LIBRARIES.libraryTypesId\',\'INNER\')->
								where(\'CAT_SECTIONS.sectionsId\',$sectionId)->
								where(\'CAT_LIBRARIES.active\',1)->
								order_by(\'order\')->get();
					$output->libraries = \'\';
					foreach($rs->result() as $row):
						if($row->extensionFile == \'css\')
							$output->libraries .= \'				<link rel="stylesheet" type="text/css" href="\'.substr(base_url(),0,strlen(base_url())-1).$row->url_path.$row->urlFile.\'" />
		\';
						else if($row->extensionFile == \'js\')
							$output->libraries .= \'				<script type="text/javascript" src="\'.substr(base_url(),0,strlen(base_url())-1).$row->url_path.$row->urlFile.\'"></script>
		\';
		
					endforeach;';
		}
		
		/*  element: View Code Generator */
		function get_insertlibraries_view_code($statement){
			return '
						<?php 		echo $libraries;	?>
						';
			$rs = $this->CI->db->select('CAT_LIBRARIES.urlFile, CAT_LIBRARIES.displayName, CAT_LIBRARY_TYPES.extensionFile, CAT_LIBRARY_TYPES.url_path')->
						from('CAT_SECTIONS')->
						join('CAT_TEMPLATES','CAT_TEMPLATES.templatesId = CAT_SECTIONS.templatesId','INNER')->
						join('DET_LIBRARIES_TEMPLATES','DET_LIBRARIES_TEMPLATES.templatesId = CAT_TEMPLATES.templatesId','INNER')->
						join('CAT_LIBRARIES','CAT_LIBRARIES.librariesId = DET_LIBRARIES_TEMPLATES.librariesId','INNER')->
						join('CAT_LIBRARY_TYPES','CAT_LIBRARY_TYPES.libraryTypesId = CAT_LIBRARIES.libraryTypesId','INNER')->
						where('CAT_SECTIONS.sectionsId',$this->SECTION_ID)->
						where('CAT_LIBRARIES.active',1)->
						order_by('order')->get();
			$libraries = '';
			foreach($rs->result() as $row):
				if($row->extensionFile == 'css')
					$libraries .= '				<link rel="stylesheet" type="text/css" href="<?php echo substr(base_url(),0,strlen(base_url())-1); ?>'.$row->url_path.$row->urlFile.'" />
';
				else if($row->extensionFile == 'js')
					$libraries .= '				<script type="text/javascript" src="<?php echo substr(base_url(),0,strlen(base_url())-1); ?>'.$row->url_path.$row->urlFile.'"></script>
';


				if($row->extensionFile == 'css')
					$libraries .= '				<link rel="stylesheet" type="text/css" href="<?php echo substr(base_url(),0,strlen(base_url())-1); ?>'.$row->url_path.$row->urlFile.'" />
';
				else if($row->extensionFile == 'js')
					$libraries .= '				<script type="text/javascript" src="<?php echo substr(base_url(),0,strlen(base_url())-1); ?>'.$row->url_path.$row->urlFile.'"></script>
';

			endforeach;
			
			return $libraries;
		}
		
		private function toCamelString($string){
			return lcfirst(str_replace(" ","",ucwords($string)));
		}
	}

/* End of file sectionCreator.php */
/* Location: ./application/libraries/sectionCreator.php */