<?php


class Helpers{
	
	public static function error_message(Exception $ex)
	{
		if(Env == 'development')
		{

			echo'<div style="display:block;background:tomato;color:#fff;font-family:arial;font-weight:bold;"><h1 style="margin:0px; padding:10px;">Message : '. $ex->getMessage() .'</h1></div>';
			$traces = $ex->getTrace();
			
			foreach($traces as $i => $trace)
			{
				echo '<ul style="list-style:none;padding:0px; margin:0px;">';
				echo '<li style="background:#555;color:#fff; padding-left:5px;"> Stack Trace : '.($i+1).'</li>';
				echo '<li style="border-bottom:1px solid #acacac;">File:'.$trace['file'].'</li>';
				echo '<li style="border-bottom:1px solid #acacac;">Class:'.$trace['class'].'</li>';
				echo '<li style="border-bottom:1px solid #acacac;">Function:'.$trace['function'].'</li>';
				echo '<li style="border-bottom:1px solid #acacac;">line:'.$trace['line'].'</li>';
				echo '</ul>';
			}

		}
		else
		{

		}
	}

}