<?php

class Controller_User extends Controller_Template
{
	public $template = 'base/template';

	public function action_index()
	{
		$this->template->content = View::forge('user/index');
	}

	public function action_view()
	{
		$id = Arr::get(Auth::get_user_id(), 1);
		$id && $data['user'] = Model_User::find($id);
		$this->template->content = View::forge('user/view', $data);
	}

	public function action_show()
	{
		$data['users'] = Model_User::find('all');
		$this->template->content = View::forge('user/show', $data);
	}

	public function action_new()
	{
		$this->template->content = View::forge('user/new');
	}

	public function action_create()
	{
		$username = Input::post('username');
		$email = Input::post('email');
		$password = Input::post('password');

		$user = Model_User::forge();

		$user->username = $username;
		$user->email = $email;
		$user->password = Auth::hash_password($password);

		if ($user->save()) {
			Response::redirect('base/login');
		}
	}

	public function action_edit($id=0)
	{
		$id && $data['user'] = Model_User::find($id);
		if (!isset($id)) {
			Response::redirect('user/index');
		}
		$this->template->content = View::forge('user/edit', $data);
	}

	public function action_update($id=0)
	{
		$id && $user = Model_User::find($id);
		$username = Input::post('username');
		$email = Input::post('email');
		$password = Input::post('password');

		$user->username = $username;
		$user->email = $email;
		$user->password = Auth::hash_password($password);

		if ($user->save()) {
			Response::redirect('user/view');
		}
	}

	public function action_destroy($id=0)
	{
		$id && $user = Model_User::find($id);
		$user->delete();
		Auth::logout();
		Response::redirect('base/index');
	}

	public function action_auto_insert()
	{
		for ($i=1; $i<11; $i++) {
			$user = Model_User::forge();
			$user->username = 'auto_test'.$i;
			$user->email = 'auto_test'.$i.'@a.com';
			$user->password = Auth::hash_password('foobar');
			$user->save();
		}
		$this->template->content = 'finished';
	}

}
