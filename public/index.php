<?php

use routes\Web;

session_start();

require_once '../autoload.php';
require_once '../routes/Web.php';

(new Web())->dispatch();