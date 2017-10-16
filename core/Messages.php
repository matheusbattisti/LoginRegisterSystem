<?php 

	namespace Core;

	class Messages
	{
		/**
		* param @type = success, info, warning, strng
		* param @text = the message text, string
		*/
		public static function setMessage($type, $text)
		{	
			//checking if session has started
			if (session_status() == PHP_SESSION_NONE) {
			    session_start();
			}

			//passing type and message do session
			$_SESSION['message-type'] = $type;
			$_SESSION['message'] = $text;	

		}	

		public static function clearMessage() {
			unset($_SESSION['message']);
		}

	}