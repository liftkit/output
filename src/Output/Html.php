<?php


	namespace LiftKit\Output;
	
	
	/**
	 * Library for working with HTML Output
	 */
	class Html
	{
		
		
		
		/**
		 * Sanitizes output by escaping characters as entities
		 * 
		 * @param string $string
		 */
		public static function sanitize ($string)
		{
			return htmlentities($string, ENT_COMPAT | ENT_HTML401, 'UTF-8');
		}
	}