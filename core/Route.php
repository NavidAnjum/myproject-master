<?php

class Route{

	private $_routeConfig;
	
	public function __construct()
	{
		global $loader;
		$this->_routeConfig = $loader->getConfig('routes');
	}

	function getSegment()
	{
		$route = array();

		if($this->_routeConfig['seo_friendly']){

			// here will be set route if url is seo friendly
			if(!file_exists('.htaccess')){

$htaccessData='<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^(.*)$ index.php/$1   
</IfModule>';
			
				file_put_contents('.htaccess', $htaccessData);
			}

			$str = explode("/",$_SERVER["REQUEST_URI"]);
			foreach ($str as $key => $value) {
				if($key == 0 && strlen($value) == 0)
					continue;
				if($key == 1)
					$route['controller'] = (!empty($value))? trim($value) : '';
				if($key == 2)
					$route['method']     = (!empty($value))? trim($value) : '';
				if($key > 2)
					$route['params'][$key] = $value;
			}

			
		}
		else
		{
			if(!file_exists('.htaccess')){
				unlink('.htaccess');
			}
			// query stirng based route
			
			$queryString = $_SERVER['QUERY_STRING'];
			$str = explode("&",$queryString);
			
			
			foreach($str as $key=>$value)
			{
				$keyValue = explode("=",$value);
				if($key === 0)
				{
					// search controllers
					$route['controller'] = (!empty($keyValue[1]))? trim($keyValue[1]) : '';
				}
				if($key === 1)
				{
					// search methods in controller
					$route['method'] = (!empty($keyValue[1]))? trim($keyValue[1]) : '';
				}
				if($key > 1)
				{
					$route['params'][$keyValue[0]] = (!empty($keyValue[1]))? trim($keyValue[1]) : '';
				}
			}

		}

		if(empty($route['controller']))
				$route['controller'] = $this->_routeConfig['default_controller'];

			if(empty($route['method']))
				$route['method']     = $this->_routeConfig['default_action'];

			if(empty($route['params']))
				$route['params']     = array();

		return $route;
	}	
}
