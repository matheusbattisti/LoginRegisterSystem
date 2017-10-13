<?php 

	namespace Core;

	class Conn
	{
		public static function getDb()
		{
			return new \PDO("mysql:host=localhost;dbname=users", "root", "");
		}
	}