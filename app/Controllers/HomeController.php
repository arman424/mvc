<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\EmailSender;
use App\Services\SMSSender;

class HomeController
{
    private User $user;

    private EmailSender $emailSender;

    private SMSSender $smsSender;

    public function __construct()
    {
	    $this->user = new User();
        $this->emailSender = new EmailSender();
        $this->smsSender = new SMSSender();
    }

    public function index(): void
    {
	    $csrfToken = bin2hex(random_bytes(32));
	    $_SESSION['csrf_token'] = $csrfToken;

        require_once './../views/form.php';
    }

    public function result(): void
    {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF validation failed.");
        }

        $data = htmlspecialchars($_POST['data'], ENT_QUOTES, 'UTF-8');

        $id = $this->user->insertData($data);
        $result = $this->user->getData($id);

        $this->emailSender->sendEmail($data);
        $this->smsSender->sendSMS($data);

        require_once './../views/result.php';
    }
}
