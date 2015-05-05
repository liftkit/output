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


		/**
		 * @param $string
		 * @param $characters
		 *
		 * @return string
		 */
		public static function excerpt ($string, $characters, $ellipsis = '...')
		{
			$string = strip_tags($string);

			if (strlen($string) > $characters) {
				return substr($string, 0, $characters) . $ellipsis;
			} else {
				return $string;
			}
		}
	}