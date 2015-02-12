<?php


class Register extends BaseController{

	private $template;

	public function __construct()
	{
		$this->template = new Template('register');
	}

	public function preDispatch()
	{

	}
	
	public function index()
	{


		$data['content'] = '';
		//$this->template->setTemplate('register'); // you can set another layout manually
		$this->template->render($data);
	}

	public function test()
	{
		$string = "Please call us at 555-888-2222 or at 888-555-1234. Operators are standing by!";
		echo "<pre>";
		$pattern = '/\d{3}-\d{3}-\d{4}/';
		preg_match_all($pattern, $string,$match);
		//echo $string = preg_match_all(pattern, subject, matches)($pattern,$replace,$string);
		print_r($match);
	}
}