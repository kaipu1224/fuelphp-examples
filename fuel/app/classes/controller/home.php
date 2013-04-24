<?php

class Controller_Home extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'Sample Applications';
		$this->template->content = View::forge('home/index');
	}
}
