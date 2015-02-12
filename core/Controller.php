<?php

//require 'core/interfaces/Icontroller.php';

class Controller implements Iroute{

	private $controller;
	private $method;
	private $args;

	public function register($controller,$method,$args)
	{
		$this->controller = $controller;
		$this->method     = $method;
		$this->args       = $args;
	}

	public function dispatch()
	{
		$base = new BaseController($this->controller);
		
		if(method_exists($this->controller, 'preDispatch'))
		{	
			$base->preDispatch();
		}
		
		if(method_exists($this->controller, $this->method))
		{
			//$this->controller->{$this->this->method}();	
			$reflectionMethod = new ReflectionMethod($this->controller,$this->method);
			$reflectionMethodParams = $reflectionMethod->getParameters();
			$refectionMethodParamsCount = count($reflectionMethodParams);
			$params = array();
			
			if(!empty($this->args))
			{	foreach($this->args as $arg)
				{
					$params[] = $arg;
				}
			}

			$paramsCount = count($params);

			$error_msg = ''; 
			if((!empty($reflectionMethodParams)) && ($refectionMethodParamsCount != $paramsCount))
			{
				$error_msg .= 'Class '.get_class($this->controller).'.php method '.$this->method.' arugment missing - ';
				foreach($reflectionMethodParams as $p=>$param)
				{
					if(empty($params[$p]))
					{
						$missingArgs[] = ' Missing argument '.$param->name;	
					}
				}
				$error_msg = $error_msg. implode(",",$missingArgs);

				if(strlen($error_msg))
				{
					throw new Exception($error_msg);
				}
			}
			call_user_func_array(array($this->controller,$this->method), $params);
		}
		else
		{
			throw new Exception("404 Page not found.",404);
		}

		if(method_exists($this->controller, 'postDispatch'))
			$base->postDispatch();
		
	}

	
	

}