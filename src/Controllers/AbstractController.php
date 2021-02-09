<?php

namespace Bookstore\Controllers;


use Bookstore\Core\Config;
use Bookstore\Core\Db;
use Bookstore\Core\Request;
use Monolog\Logger;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Monolog\Handler\StreamHandler;
use Bookstore\Utils\DependencyInjector;


abstract class AbstractController
{
	protected $request;
	protected $db;
	protected $config;
	protected $view;
	protected $log;

	public function __construct(DependencyInjector $di ,Request $request) {
		
		$this->request = $request;
		$this->di=$di;

		$this->db = $di->get('PDO');
		$this->view = $di->get('Environment');
		$this->config = $di->get('Utils\Config');
		
		if (isset($_COOKIE['id'])) {
			 $this->customerId = $_COOKIE['id'];
		}
		
	}


	public function setCustomerId(int $customerId) {
		$this->customerId = $customerId;
	}

	protected function render(string $template, array $params): string {
		return $this->view->load($template)->render($params);
	}
}