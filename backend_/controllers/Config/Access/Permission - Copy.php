<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends CI_Controller {			/* Heredamos de la clase CI_Controller */

	var $title;
  function __construct(){
   
    parent::__construct();
	/* Validamos si el usuario está en sesión*/
   	if(!isset($this->session->userdata['username']))
		redirect('login/index');
    
    $this->load->database();				/* Cargamos la base de datos */
    $this->load->library('grocery_crud');	/* Cargamos la libreria*/   
    $this->load->helper('url'); 			/* Añadimos el helper al controlador */
	$this->title = "Adminsitración de Permisos";
  }

  function index(){
    /*
     * Mandamos todo lo que llegue a la funcion
     * admin().
     **/
    redirect('/config/access/permission/admin');
  }

  /*
   *
   **/
  function admin(){
		try{
	
			
			$crud = new grocery_CRUD();				/* Creamos el objeto */
			$crud->set_theme('flexigrid');			/* Seleccionamos el tema */
			$crud->set_table('DET_PERMISSIONS');		/* Seleccionmos el nombre de la tabla de nuestra base de datos*/
			$crud->set_subject('Permisos de Usuario');			/* Le asignamos un nombre */
			$crud->set_language('spanish');			/* Asignamos el idioma español */
		
			/* Generamos la tabla */
			$crud->set_relation('userGroupsId', 'CAT_USER_GROUPS', 'name');		
			//$crud->set_relation('modulesId', 'CAT_MODULES', 'displayName');		
			//$crud->set_relation_n_n('Modulos', 'DET_PERMISSIONS', 'CAT_MODULES', 'modulesId', 'modulesId', 'name','modulesId,parentModuleId,order');		
			$crud->set_relation_n_n('Funciones', 'DET_PERMISSIONS', 'CAT_FUNCTIONS', 'moduleFunctionsId', 'functionsId', 'name','name');		
			//$crud->set_relation_n_n('Modulos', 'CAT_MODULES', 'CAT_MODULE_FUNCTIONS', 'modulesId', 'moduleFunctionsId', 'name','order');		
			
			/* Campos del modelo */
			$crud->fields(
			  	'userGroupsId',
			  	//'Modulos',
			  	'Funciones');
			/* Campos obligatorios */
			$crud->required_fields(
			  	'userGroupsId'
			  	//'modulesId'
				);
			
			/* Campos a mostrar */
			$crud->columns(
			  	'userGroupsId',
			  	'modulesId',
			  	'moduleFunctionsId')        
			->display_as('userGroupsId','Grupo de Usuario')
			->display_as('modulesId','Módulo')
			->display_as('description','Descripción')
			->display_as('moduleFunctionsId','Función');
									
			
			/* Generamos la tabla */
			$data->output = $output = $crud->render();
			$data->title = $this->title;
			
			/* Cargamos en la vista*/
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header',$this->session->userdata);
			$this->load->view('templates/aside');
			$this->load->view('access/permission/admin', $output);
			$this->load->view('templates/footer');
	
		}catch(Exception $e){
			  /* Si	 algo sale mal cachamos el error y lo mostramos */
			  show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
  }
  
}