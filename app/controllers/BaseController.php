<?php


class BaseController implements Icontroller
{
	private $controller;
	public function __construct($c)
	{
		$this->controller = $c;
	}
	public function preDispatch()
	{
			
		if(method_exists($this->controller, 'preDispatch'))
		{
			$this->controller->preDispatch();
		}
	}

	public function postDispatch()
	{
		if(method_exists($this->controller, 'postDispatch'))
		{
			$this->controller->postDispatch();
		}		
		
	}

	public function permission()
	{
		//$this->controller->preDispatch();
	}
}