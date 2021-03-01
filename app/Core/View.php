<?php

namespace App\Core;

use Exception;

class View 
{

	public static function render($view, $vars = [])
    {
		extract($vars);
		$path = 'views/'.$view.'.php';
		
		if (file_exists($path)) {
			require $path;
		} else {
            throw new Exception("File $path do not exist");
        }
	}

}	