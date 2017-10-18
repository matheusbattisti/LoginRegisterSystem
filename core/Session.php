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
			$id = session_id();

			if(!isset($id)) { 
			    header("Location: /");
			}
			
		}

		public static function destroySession()
		{
			session_destroy();
		}

	}