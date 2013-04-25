<?php

class Controller_Qrcode extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'jquery-qrcode.js sample';
		$this->template->content = View::forge('qrcode/index');
	}

}
