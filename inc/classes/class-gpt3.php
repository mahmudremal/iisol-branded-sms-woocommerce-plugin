<?php
/**
 * The OpenAI ChatGPT-3.
 * https://www.npmjs.com/package/openai
 * https://www.npmjs.com/package/chatgpt
 * 
 * @package FutureWordPressProjectBrandedSms
 */
namespace FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc;
use FUTUREWORDPRESS_PROJECT_BRANDEDSMS\Inc\Traits\Singleton;

class Gpt3 {
	use Singleton;
	private $base;
	protected function __construct() {
    $this->base = [];
		$this->setup_hooks();

	}
	protected function setup_hooks() {
	}
  
}
