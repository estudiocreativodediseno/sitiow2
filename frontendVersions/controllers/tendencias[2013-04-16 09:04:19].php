<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tendencias extends CI_Controller {			

    /******* Variables globales *******/
    
		var $SECTION_ID;
		var $ACTUAL_PAGE = 1;
        
    function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url'); 
        $this->title = "Tendencias - Tendecncias de la tienda";
    }
    

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK [2013-04-16 06:58:32]
	 * Tendencias - Tendecncias de la tienda
	 *
	 * @return void
	 */
     function index(){
		try{
        
        	$fieldTags = array();
        	//inicia function_index_code
            
					/*Código generado automáticamente para la instrucción: insertlibraries*/
			  
					$sectionId = "13";
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
        	//termina function_index_code
	
			$output->fieldTags = $fieldTags;
			$output->title = 'Tendencias - Tendecncias de la tienda';
			$output->url_section = base_url().'index.php/tendencias';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/tendencias', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por id: Tendencias - Tendecncias de la tienda
	 *
	 * @return void
	 */
     function id($valueId){
		try{
        
        	//inicia function_id_code
              /*No se reconoce la instrucción: insertlibraries*/
			
        	//termina function_id_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Tendencias - Tendecncias de la tienda';
			$output->url_section = base_url().'/tendencias';
			/* Se carga la vista del Controlador*/
			$this->load->view('/tendencias', $output);
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
			
        	//termina function_find_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Tendencias - Tendecncias de la tienda';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/tendencias', $output);
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
			
        	//termina function_like_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Tendencias - Tendecncias de la tienda';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/tendencias', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
     /******* Funciones extras *******/
     
}


/* End of file Tendencias.php */
/* Location: ./application/controllers/tendencias.php */
