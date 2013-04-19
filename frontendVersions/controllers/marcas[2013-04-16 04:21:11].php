<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas extends CI_Controller {			

    /******* Variables globales *******/
    
		var $SECTION_ID;
		var $ACTUAL_PAGE = 1;
        
    function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url'); 
        $this->title = "Marcas - Marcas de la tienda";
    }
    

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK [2013-04-16 04:18:48]
	 * Marcas - Marcas de la tienda
	 *
	 * @return void
	 */
     function index(){
		try{
        
        	$fieldTags = array();
        	//inicia function_index_code
            
        	//termina function_index_code
	
			$output->fieldTags = $fieldTags;
			$output->title = 'Marcas - Marcas de la tienda';
			$output->url_section = base_url().'index.php/marcas';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por id: Marcas - Marcas de la tienda
	 *
	 * @return void
	 */
     function id($valueId){
		try{
        
        	//inicia function_id_code
            
        	//termina function_id_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Marcas - Marcas de la tienda';
			$output->url_section = base_url().'/marcas';
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas', $output);
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
            
        	//termina function_find_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Marcas - Marcas de la tienda';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas', $output);
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
            
        	//termina function_like_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Marcas - Marcas de la tienda';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/marcas', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
     /******* Funciones extras *******/
     
}


/* End of file Marcas.php */
/* Location: ./application/controllers/marcas.php */
