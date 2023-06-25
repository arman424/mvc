<?php

namespace routes;

use App\Controllers\HomeController;

final class Web
{
	private HomeController $homeController;

	public function __construct()
	{
		$this->homeController = new HomeController();
	}

	public function dispatch(): void
	{
		switch (ltrim($_SERVER['REQUEST_URI'], '/')) {
			case '':
				$this->home();
				break;
			case 'result':
				$this->result();
				break;
			default:
				$this->notFound();
				break;
		}
	}

	public function home(): void
	{
		$this->homeController->index();
	}

	public function result(): void
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->homeController->result();
			return;
		}
		$this->notFound();
	}

	public function notFound(): void
	{
		header('HTTP/1.0 404 Not Found');
		echo '404 Not Found';
	}
}