<?php


class Profile extends BaseController{

	private $template;

	public function __construct()
	{
		$this->template = new Template('profile');
	}

	
	public function index()
	{
		
		$data['content'] = '';
		//$this->template->setTemplate('register'); // you can set another layout manually
		$this->template->render($data);
	}

	public function test()
	{
		$testModel = new Test();
		print_r($testModel->getNumbers());
	}
}