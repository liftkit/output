<?php

	
	namespace LiftKit\Tests\Unit\Output;
	
	use LiftKit\Output\Html;
	use PHPUnit_Framework_TestCase as TestCase;
	
	
	class HtmlTest extends TestCase
	{
		
		
		/**
		 * @dataProvider sanitizeProvider
		 */
		public function testSanitize ($string)
		{
			$this->assertEquals(
				htmlentities($string, ENT_COMPAT | ENT_HTML401, 'UTF-8'),
				Html::sanitize($string)
			);
		}
		
		
		public function sanitizeProvider ()
		{
			return array(
				array('"&asdasd7awdkn@#;"'),
				array('ersdfaHUGbjnadn9871e'),
				array('<>&SHDnbkwhdsa4'),
				array('&copy'),
				array('<script>alert("hello");</script>'),
			);
		}
	}