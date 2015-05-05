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


		/**
		 * @param $string
		 * @param $characters
		 * @param $expected
		 *
		 * @dataProvider excerptProvider
		 */
		public function testExcerpt ($string, $characters, $expected)
		{
			$this->assertEquals(
				$expected,
				Html::excerpt($string, $characters)
			);
		}


		public function sanitizeProvider ()
		{
			return [
				['"&asdasd7awdkn@#;"'],
				['ersdfaHUGbjnadn9871e'],
				['<>&SHDnbkwhdsa4'],
				['&copy'],
				['<script>alert("hello");</script>'],
			];
		}


		public function excerptProvider ()
		{
			return [
				[
					'123456789',
					3,
					'123...',
				],
				[
					'123456789',
					10,
					'123456789',
				],
				[
					'<tag>123</tag>456789',
					10,
					'123456789',
				],
				[
					'<tag>123</tag>456789',
					3,
					'123...',
				],
			];
		}
	}