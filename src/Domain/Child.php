<?php
namespace Bookstore\Domain;


 
class Child extends Pops
{	
	public	function SayHi()
	{
		echo "Hi , i am Child";
		parent::SayHi();
	}

}
	