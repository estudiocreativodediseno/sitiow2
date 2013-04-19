<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {			

    /******* Variables globales *******/
    
		var $SECTION_ID;
		var $ACTUAL_PAGE = 1;
        
    function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url'); 
        $this->title = "Home - Home";
    }
    

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK [2013-04-10 04:25:16]
	 * Home - Home
	 *
	 * @return void
	 */
     function index(){
		try{
        
        	$fieldTags = array();
        	//inicia function_index_code
            
					/*Código generado automáticamente para la instrucción: insertlibraries*/
			  
					$sectionId = "16";
					$rs = $this->db->select('CAT_LIBRARIES.urlFile, CAT_LIBRARIES.displayName, CAT_LIBRARY_TYPES.extensionFile, CAT_LIBRARY_TYPES.url_path')->
								from('CAT_SECTIONS')->
								join('CAT_TEMPLATES','CAT_TEMPLATES.templatesId = CAT_SECTIONS.templatesId','INNER')->
								join('DET_LIBRARIES_TEMPLATES','DET_LIBRARIES_TEMPLATES.templatesId = CAT_TEMPLATES.templatesId','INNER')->
								join('CAT_LIBRARIES','CAT_LIBRARIES.librariesId = DET_LIBRARIES_TEMPLATES.librariesId','INNER')->
								join('CAT_LIBRARY_TYPES','CAT_LIBRARY_TYPES.libraryTypesId = CAT_LIBRARIES.libraryTypesId','INNER')->
								where('CAT_SECTIONS.sectionsId',$sectionId)->
								where('CAT_LIBRARIES.active',1)->
								order_by('order')->get();
					$output->libraries = '';
					foreach($rs->result() as $row):
						if($row->extensionFile == 'css')
							$output->libraries .= '				<link rel="stylesheet" type="text/css" href="'.base_url().$row->url_path.$row->urlFile.'" />
		';
						else if($row->extensionFile == 'js')
							$output->libraries .= '				<script type="text/javascript" src="'.base_url().$row->url_path.$row->urlFile.'"></script>
		';
		
					endforeach;
					/*Código generado automáticamente para la instrucción: startloop*/
			  
						$rs_contents = $this->db->select('CAT_ENTRY_CONTENTS.*')->
										from('CAT_ENTRY_CONTENTS')->
										where('MD5(entryStructuresId)','c74d97b01eae257e44aa9d5bade97baf')->get();
						
						$this->db->flush_cache();
						$output->escaparatePrincipal_elements = array();
						$cnt = 0;
						foreach ($rs_contents->result() as $row){
							$cnt++;
							$this->db->select("DET_ENTRY_CONTENTS.data, CAT_DATA_TYPES.dataTypesId, CAT_DATA_TYPES.prefix, CAT_DATA_TYPES.postfix"); 
							$this->db->from("CAT_ENTRY_CONTENTS");
							$this->db->join("DET_ENTRY_CONTENTS", "CAT_ENTRY_CONTENTS.entryContentsId  = DET_ENTRY_CONTENTS.entryContentsId ", "INNER");
							$this->db->join("CAT_DATA_TYPES", "DET_ENTRY_CONTENTS.dataTypesId  	= CAT_DATA_TYPES.dataTypesId ", "INNER");
							$rs_qry = $this->db->where("MD5(DET_ENTRY_CONTENTS.entrycontentsId) = '".md5($row->entryContentsId)."'  ")->get();

							$dataRow = array();
							foreach ($rs_qry->result() as $rowData)
								$dataRow[MD5($rowData->dataTypesId)] = array(
																"data"=>$rowData->prefix.$rowData->data.$rowData->postfix,
																"dataTypeId"=>$rowData->dataTypesId);
							
							$dataRow["entryContentsId"] = $row->entryContentsId;
							array_push($output->escaparatePrincipal_elements,$dataRow);
						}
						$perPage 	= 0;
						$output->escaparatePrincipal_actual_page = $actualPage = $this->ACTUAL_PAGE;
						$actualPage--;
						if($perPage>0){
							$output->escaparatePrincipal_total_pages = ($cnt-($cnt%$perPage))/$perPage + ($cnt%$perPage>0?1:0);
							if($actualPage*$perPage >= $cnt)
								$output->escaparatePrincipal_elements = array_slice($output->escaparatePrincipal_elements, ($actualPage-1)*$perPage,$cnt%$perPage);   
							else
								$output->escaparatePrincipal_elements = array_slice($output->escaparatePrincipal_elements, ($actualPage-1)*$perPage,$perPage);   
						}else
							$output->escaparatePrincipal_total_pages = 1;
						
						$output->escaparatePrincipal_total_results = $cnt;
			
					/*Código generado automáticamente para la instrucción: element*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
									$fieldTags->fieldName = "f7177163c833dff4b38fc8d2872f1ec6";
  /*No se reconoce la instrucción: endloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			
        	//termina function_index_code
	
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Home';
			$output->url_section = base_url().'index.php/site/home';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/site/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por id: Home - Home
	 *
	 * @return void
	 */
     function id($valueId){
		try{
        
        	//inicia function_id_code
              /*No se reconoce la instrucción: insertlibraries*/
			  /*No se reconoce la instrucción: startloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			/*No se reconoce la instrucción: element*/
			  /*No se reconoce la instrucción: endloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			
        	//termina function_id_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Home';
			$output->url_section = base_url().'/site/home';
			/* Se carga la vista del Controlador*/
			$this->load->view('/site/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por página de resultados
	 *
	 * @param	page		Página
	 * @return 	void
	 */
     function page($page){
		$this->ACTUAL_PAGE = $page;
        $this->index();
     }
     
     
  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por coincidencia exacta de campo
	 *
	 * @param 	field   	Campos par aplicar la búsqueda
	 * @param 	q			Criterio de búsqueda
	 * @param 	page		Página
	 * @return 	void		
	 */
     function find($field, $q, $page=1){
		try{
        
        	//inicia function_find_code
              /*No se reconoce la instrucción: insertlibraries*/
			  /*No se reconoce la instrucción: startloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			/*No se reconoce la instrucción: element*/
			  /*No se reconoce la instrucción: endloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			
        	//termina function_find_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Home';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/site/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
     
  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por coincidencia similar (uso de Like %q%
	 *
	 * @param 	field   	Campos par aplicar la búsqueda
	 * @param 	q			Criterio de búsqueda
	 * @param 	page		Página
	 * @return 	void		
	 */
     function like($field, $q, $page=1){
		try{
        	$fieldTags = array();
        	//inicia function_like_code
              /*No se reconoce la instrucción: insertlibraries*/
			  /*No se reconoce la instrucción: startloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			/*No se reconoce la instrucción: element*/
			  /*No se reconoce la instrucción: endloop*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			  /*No se reconoce la instrucción: urlresourcesfolder*/
			
        	//termina function_like_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Home';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/site/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
     /******* Funciones extras *******/
     
}


/* End of file Home.php */
/* Location: ./application/controllers/site/home.php */
