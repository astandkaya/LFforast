<?php

namespace Controller;

class TopController extends Controller
{
	public function __invoke($vars): string
	{
		$title = \Service\TitleService::make();

		return $this->view("page.top", compact('title', 'vars'));
	}
}