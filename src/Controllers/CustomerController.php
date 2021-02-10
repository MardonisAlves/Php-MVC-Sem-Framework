<?php

namespace Bookstore\Controllers;
use Bookstore\Exceptions\NotFoundException;
use Bookstore\Model\CustomerModel;


class CustomerController extends AbstractController{

	

	public function index() :string{
		return $this->render('index.twig' , []);
	}

	public function login(): string {
		if(!$this->request->isPost()) {
			return $this->render('index.twig', []);
		}
		$params = $this->request->getParams();
		$email = $params->getString('email');
	 //var_dump($params);
		if(!$email) {
			$params = ['errorMessage' => 'No info provided.'];
			return $this->render('index.twig', $params);
		}
		$email = $params->getString('email');
	//echo $email;
		$customerModel = new CustomerModel($this->db);
	//var_dump($customerModel);

		
		try {
			$customer = $customerModel->getByEmail($email);
		} catch (NotFoundException $e) {
	//$this->log->warn('Customer email not found: ' . $email);
			$params = ['errorMessage' => 'Email not found.'];
			return $this->render('index.twig', $params);
		}
		setcookie('user', $customer->getId());
		
		$newController = new BookController($this->di ,$this->request);
		return $newController->getAll();

	}
}
