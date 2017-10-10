<?php 

	namespace Core;

	class Conn
	{
		public static function Db()
		{
			return new \PDO("mysql:host=localhost;dbname=users", "root", "");
		}
	}