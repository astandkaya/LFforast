<?php

namespace Controller;

use eftec\bladeone\BladeOne;

abstract class Controller
{
	private const DIR_TEMPLATE = __DIR__.'/../template';
	private const DIR_TEMPLATE_CACHE = __DIR__.'/../cache/template';

	private BladeOne $view;
	
	public function __construct()
	{
		$this->view = new BladeOne(
			self::DIR_TEMPLATE,
			self::DIR_TEMPLATE_CACHE,
			BladeOne::MODE_DEBUG,
		);
	}

	abstract public function __invoke($vars): string;


	protected function view($view = null, $variables = []): string
	{
		return $this->view->run($view, $variables);
	}
}