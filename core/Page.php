<?php

class Page
{
	private $template;
	public function __construct()
	{
		$this->template = new Template();
	}

	public function index()
	{
		$this->template->setTemplate('welcome');
		$data['content'] = $this->template->view('test',array('hello'=>'hello world'),true);
		$this->template->render($data);
	}
	public function login()
	{
		
		$data['content'] = $this->template->render('test',array('hello'=>'hello world'),true);
		$this->template->render('Templates/template',$data);
	}
	public function home()
	{
		require_once("Views/home.php");
	}

	public function register()
	{
		$data['content'] = '';
		$this->template->setTemplate('register');
		$this->template->render($data);
		//require_once("Views/register.php");
	}

	public function users()
	{

	}
	
	public function profile()
	{
		$data['content']='';
		$this->template->render('Templates/profile',$data);
	}
	
	public function adduser()
	{

	}
	public function html5()
	{
		$data['content']='';
		$this->template->render('Templates/html5',$data);
	}
}
?>