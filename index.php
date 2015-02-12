<?php
require_once("core/Loader.php");

define('DS',DIRECTORY_SEPARATOR);

define('Env','development');  // possible value production | development

if(Env == 'development')
{
	error_reporting(E_ALL);	
}
else
{
	error_reporting(0);
}



try{

	$loader = new Loader;
	$loader->loadResources();	

	$i=new Main();
	$i->run();

}
catch(Exception $ex)
{
	Helpers::error_message($ex);
}