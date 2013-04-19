<?php

/*
 * Custom router function v 0.1
 *
 * Add functionality : read into more than one sub-folder
 *
 */

Class MY_Router extends CI_Router
{
	Function MY_Router()
	{
		parent::CI_Router();
	}


		function __construct(){
			parent::__construct();
		}
		
	function _validate_request($segments)
	{
		$segments = $this->arraytolower($segments);
		if (file_exists(APPPATH.'controllers/'.$segments[0].EXT))
		{
			return $segments;
		}

		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{
			$this->set_directory($segments[0]);
			$segments = array_slice($segments, 1);

			/* ----------- ADDED CODE ------------ */

			while(count($segments) > 0 && is_dir(APPPATH.'controllers/'.$this->directory.$segments[0]))
			{
				$this->directory = ($this->directory . $segments[0]);
				$segments = array_slice($segments, 1);
			}

			/* ----------- END ------------ */


			if(substr($this->directory,strlen($this->directory)-1,1) != '/')
				$this->directory .= '/';
			if (count($segments) > 0)
			{
				if ( ! file_exists(APPPATH.'controllers/'.$this->directory.$segments[0].EXT))
				{
					show_404($this->fetch_directory().$segments[0]);
				}
			}
			else
			{
				$this->set_class($this->default_controller);
				$this->set_method('index');

				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT))
				{
					$this->directory = '';
					return array();
				}

			}

			return $segments;
		}

		show_404($segments[0]);
	}
	
	function arraytolower($array, $include_leys=false) {
   
		if($include_leys) {
		  foreach($array as $key => $value) {
			if(is_array($value))
			  $array2[strtolower($key)] = arraytolower($value, $include_leys);
			else
			  $array2[strtolower($key)] = strtolower($value);
		  }
		  $array = $array2;
		}
		else {
		  foreach($array as $key => $value) {
			if(is_array($value))
			  $array[$key] = arraytolower($value, $include_leys);
			else
			  $array[$key] = strtolower($value);  
		  }
		}
	   
		return $array;
	  } 
}

?>
