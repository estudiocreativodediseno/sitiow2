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
     * Código generado automáticamente por CMS-FRAMEWORK [2013-04-08 06:18:13]
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
		
					endforeach;  /*No se reconoce la instrucción: urlresourcesfolder*/
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
