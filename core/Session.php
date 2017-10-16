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

		public function initSession()
		{
		    session_start();
		}

	}