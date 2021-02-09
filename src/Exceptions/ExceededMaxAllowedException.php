<?php

namespace Bookstore\Exceptions;

use Exception;


class ExceededMaxAllowedException extends Exception
{
	
	function __construct($message = null) {
		$message = $message ?: 'Exceeded max allowed.';
		parent::__construct($message);
}
}
