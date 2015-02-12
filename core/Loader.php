<?php 

class Loader{
	

	private $_appPath;
	private $_configs = array();

	public function __construct()
	{
		$this->_appPath = getcwd();
	}

	public function  loadResources()
	{
		$autoload     = $this->getConfig('autoload');
		$controllers  = $autoload['controllers']; 
		$models       = $autoload['models']; 
		spl_autoload_register(function($class)use($controllers,$models){
			
			if(file_exists('core/'.$class.'.php'))
			{
				include 'core/'.$class.'.php';	
			}

			if(file_exists('core/interfaces/'.$class.'.php'))
			{
				include 'core/interfaces/'.$class.'.php';	
			}		
			
			foreach($controllers as $controller)		
			{
				
				if(file_exists($controller.DS.$class.'.php'))
				{
					include $controller.DS.$class.'.php';
				}
			}

			foreach($models as $model)		
			{
				if(file_exists($model.DS.$class.'.php'))
				{
					include $model.DS.$class.'.php';
				}
			}	

			/*
				try{

					throw new Exception("Class ".ucwords($class)." Not Found");

				}catch(Exception $ex)
				{
					
					echo $ex->getMessage();
					exit;
				}
			}*/

		});
	}	

	public function loadConfig()
	{
		
		
		$_configDir = $this->_appPath.DS.'config';
		
		if (is_dir($_configDir)) {

			$files = (scandir($_configDir));
			if(!empty($files))
			{
				foreach($files as $file)
				{
					if($file == "." || $file == "..")
					{	
						continue; 
					}
					$fileName = trim($_configDir.DS.$file);
					
					if(file_exists($fileName))
					{ 

						$config_elm = substr(basename($fileName), 0, -4);
						
						$this->configs[$config_elm] = include($_configDir.DS.$file);
					 	
					}
				}
			}
		}
		
		
	}

	public function getConfig($config)
	{
		if(!empty($this->configs))
		{ 
			return $this->configs[$config];
		}
		else{
		
			$this->loadConfig();
			return $this->configs[$config];
		}
	}
}