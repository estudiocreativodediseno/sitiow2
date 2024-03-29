<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas_categoria extends CI_Controller {			

    /******* Variables globales *******/
    
		var $SECTION_ID;
		var $ACTUAL_PAGE = 1;
        
    function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url'); 
        $this->title = "Listado de Categorías - Listado de Categorías";
    }
    

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK [2013-04-26 04:19:48]
	 * Listado de Categorías - Listado de Categorías
	 *
	 * @return void
	 */
     function index(){
		try{
        
        	$fieldTags 		= array();
        	$urlSections 	= array();
        	//inicia function_index_code
            
					/*Código generado automáticamente para la instrucción: insertlibraries*/
			  
					$sectionId = "20";
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
							$output->libraries .= '				<link rel="stylesheet" type="text/css" href="'.substr(base_url(),0,strlen(base_url())-1).$row->url_path.$row->urlFile.'" />
		';
						else if($row->extensionFile == 'js')
							$output->libraries .= '				<script type="text/javascript" src="'.substr(base_url(),0,strlen(base_url())-1).$row->url_path.$row->urlFile.'"></script>
		';
		
					endforeach;
					/*Código generado automáticamente para la instrucción: urlsection*/
			  

					$rs = $this->db->select('url')->
								from('CAT_SECTIONS')->
								where('MD5(CAT_SECTIONS.sectionsId)','c74d97b01eae257e44aa9d5bade97baf')->get();
					$row =$rs->row();
					$output->urlSections['c74d97b01eae257e44aa9d5bade97baf'] = $row->url;
					
					
					/*Código generado automáticamente para la instrucción: urlsection*/
			  

					$rs = $this->db->select('url')->
								from('CAT_SECTIONS')->
								where('MD5(CAT_SECTIONS.sectionsId)','c51ce410c124a10e0db5e4b97fc2af39')->get();
					$row =$rs->row();
					$output->urlSections['c51ce410c124a10e0db5e4b97fc2af39'] = $row->url;
					
					
					/*Código generado automáticamente para la instrucción: urlsection*/
			  

					$rs = $this->db->select('url')->
								from('CAT_SECTIONS')->
								where('MD5(CAT_SECTIONS.sectionsId)','aab3238922bcc25a6f606eb525ffdc56')->get();
					$row =$rs->row();
					$output->urlSections['aab3238922bcc25a6f606eb525ffdc56'] = $row->url;
					
					
					/*Código generado automáticamente para la instrucción: urlsection*/
			  

					$rs = $this->db->select('url')->
								from('CAT_SECTIONS')->
								where('MD5(CAT_SECTIONS.sectionsId)','9bf31c7ff062936a96d3c8bd1f8f2ff3')->get();
					$row =$rs->row();
					$output->urlSections['9bf31c7ff062936a96d3c8bd1f8f2ff3'] = $row->url;
					
					
        	//termina function_index_code
	
			$output->fieldTags = $fieldTags;
			$output->title = 'Listado de Categorías - Listado de Categorías';
			$output->url_section = base_url().'index.php/marcas_categoria';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas_categoria', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por id: Listado de Categorías - Listado de Categorías
	 *
	 * @return void
	 */
     function id($valueId){
		try{
        
        	//inicia function_id_code
              /*No se reconoce la instrucción: insertlibraries*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			
        	//termina function_id_code
	
        	$fieldTags 		= array();
        	$urlSections 	= array();
			
			$output->fieldTags = $fieldTags;
			$output->urlSections = $fieldTags;
			$output->title = 'Listado de Categorías - Listado de Categorías';
			$output->url_section = base_url().'/marcas_categoria';
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas_categoria', $output);
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
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			
        	//termina function_find_code
	
			
        	$fieldTags 		= array();
        	$urlSections 	= array();
			
			$output->fieldTags = $fieldTags;
			$output->urlSections = $fieldTags;
			$output->title = 'Listado de Categorías - Listado de Categorías';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas_categoria', $output);
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
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			  /*No se reconoce la instrucción: urlsection*/
			
        	//termina function_like_code
	
			
        	$fieldTags 		= array();
        	$urlSections 	= array();
			
			$output->fieldTags = $fieldTags;
			$output->urlSections = $fieldTags;
			$output->title = 'Listado de Categorías - Listado de Categorías';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas_categoria', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
     /******* Funciones extras *******/
     
}


/* End of file Marcas_categoria.php */
/* Location: ./application/controllers/marcas_categoria.php */
