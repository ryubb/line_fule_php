<?php

class Controller_User extends Controller_Template
{
	public $template = 'base/template';

	public function action_index()
	{
		$this->template->title = 'User &raquo; Index';
		$this->template->content = View::forge('user/index');
	}

	public function action_new()
	{
		$this->template->content = View::forge('user/new');
	}

	public function action_create()
	{
		$username = Input::post('username');
		$name = Input::post('name');
		$email = Input::post('email');
		$password = Input::post('password');

		$auth = Auth::instance();
		$user = Model_User::forge();

		$user->username = $username;
		$user->email = $email;
		$user->password = $auth->hash_password($password);

		if ($user->save()) {
			Response::redirect('base/login');
		}
	}

}
