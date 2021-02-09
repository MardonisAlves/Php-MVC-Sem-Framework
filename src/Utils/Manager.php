<?php

namespace Bookstore\Utils;


class Manager {

	use Contract , Communicator{

		Contract::sing insteadof  Communicator;
		Communicator::sing  as makeAsing;

		Communicator::sing insteadof  Contract;
		Contract::sing  as makeAsing;
	}

	
}