<?php

namespace App\Database;

use PDO;

final class DB extends PDO
{
	private static ?PDO $instance = null;

	private function __construct() {}

	public static function getInstance(): PDO
	{
	     if (self::$instance === null) {
		    self::$instance = new PDO(
                    'mysql:host=127.0.0.1;port=3306;dbname=mvc_example',
                'root',
                ''
            );
         }

         return self::$instance;
	}
}