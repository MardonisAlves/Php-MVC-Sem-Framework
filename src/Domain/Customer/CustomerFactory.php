<?php 

namespace Bookstore\Domain\Customer;
/*
* Customer e uma interface
**/
use Bookstore\Domain\Customer;
use Bookstore\Domain\Person;


class CustomerFactory{
	
	public static function factory(
		string $type, 
		int $id , 
		string  $firstname , 
		string $surname, 
		string $email): Customer {

		$classname = __NAMESPACE__ . '\\' . ucfirst($type);
		if (!class_exists($classname)) {
		throw new \InvalidArgumentException('Wrong type.');
		}
		return new $classname($id, $firstname, $surname, $email);

	}
	
}