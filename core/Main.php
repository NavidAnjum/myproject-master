<?php


class Main
{


	public $pagename="index";
	private $_route;



	public function run()
	{

		$route = new Route();
		$controller = new Controller();
		$this->_route = $route->getSegment();
		
		if(class_exists($this->_route['controller']))
		{

			$page = new $this->_route['controller'];
		
		}else{

			throw new Exception("Controller '".$this->_route['controller']. ".php' not found", 51);
			
		}
					
		

		$this->pagename = $this->_route['method'];
		$params = $this->_route['params'];
		//rendering page
		$controller->register($page,$this->pagename,$params);
		$controller->dispatch();
		
	}

}
?>