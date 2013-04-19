<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {			

    /******* Variables globales *******/
    
    function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url'); 
        $this->title = "Home - Ir al incio";
    }
    

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK [2013-03-25 10:18:04]
	 * Home - Ir al incio
	 *
	 * @return void
	 */
     function index(){
		try{
        
        	//inicia function_index_code
            
        	//termina function_index_code
	
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Ir al incio';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     

  	/**
     * Código generado automáticamente por CMS-FRAMEWORK
	 * Búsqueda por id: Home - Ir al incio
	 *
	 * @return void
	 */
     function id($valueId){
		try{
        
        	//inicia function_id_code
            
        	//termina function_id_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Ir al incio';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/home', $output);
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
		try{
        
        	//inicia function_page_code
            
        	//termina function_page_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Ir al incio';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
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
			$output->title = 'Home - Ir al incio';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/home', $output);
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
        
        	//inicia function_like_code
            
        	//termina function_like_code
	
			
			$output->fieldTags = $fieldTags;
			$output->title = 'Home - Ir al incio';
			
			/* Se carga la vista del Controlador*/
			$this->load->view('/home', $output);
		}catch(Exception $e){
			  /* En caso de error, lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
     }
     
     /******* Funciones extras *******/
     
}


/* End of file Home.php */
/* Location: ./application/controllers/home.php */
