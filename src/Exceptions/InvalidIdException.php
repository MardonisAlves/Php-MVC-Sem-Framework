<?php 
namespace Bookstore\Exceptions;

use Exception;
 
 class InvalidIdException extends Exception
 {
 	
 	function __construct($message = null)
 	{
 		$message = $message ? : 'Invalid id provided';

 		parent::__construct($message);
 	}
 }