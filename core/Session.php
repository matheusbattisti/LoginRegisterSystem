<?php 

	namespace Core;

	class Session
	{

		public function __construct()
		{
		    if(!isset($_SESSION)) {
		        $this->initSession();
		    }
		}

		public static function initSession()
		{	
		    session_start(); 
		}

		public static function checkSessionId() 
		{	
			$id = $_SESSION['user']['id'];
			
			if(!isset($id)) { 
			    header("Location: /");
			}
			
		}

		public static function destroySession()
		{
			unset($_SESSION['user']['id']);
		}

		public static function destroyMessages()
		{
			unset($_SESSION['message']);
		}

	}