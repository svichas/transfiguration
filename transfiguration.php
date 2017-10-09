<?php 

/*
Require Core files.
*/
require 'Core/Lexer.php';
require 'Core/Parser.php';
require 'Core/Translator.php';
require 'Helpers/Evaluator.php';

use Transfiguration\Core\Lexer;
use Transfiguration\Core\Translator;
use Transfiguration\Core\Parser;

class Transfiguration {
	
	public $requirebase = "";
	public $parser;
	public $hooks = [];

	public $data = [];
	public $path = "";
	public $html = "";
	
	public function __construct($html, $data = [], $path="") {
		
		$this->html = $html;
		$this->data = $data;
		$this->path = $path;
	}

	public function hook($hook="", $method="") {

		$this->hooks[] = [
			"hook" => $hook,
			"method" => $method
		];

		return $this;
	}

	public function parserTokens() {
		$lexer = new Lexer($this->html);
		$this->parser = new Parser($lexer->exportTokens(), $this->data, $this->path, $this->hooks);
		return $this->parser->exportTokens();
	}

	public function export() {
		$translator = new Translator($this->parserTokens());
		return $translator->translate();
	}

	public function render() {
		$translator = new Translator($this->parserTokens());
		echo $translator->translate();
		return $this;
	}
	
}