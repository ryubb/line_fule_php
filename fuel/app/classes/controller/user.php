<?php

class Controller_User extends Controller_Template
{
	public $template = 'base/template';
	private $per_page = 10;

	public function action_index()
	{
		$this->template->content = View::forge('user/index');
	}

	public function action_view($id=0)
	{
		$id && $data['user'] = Model_User::find($id);
		$this->template->content = View::forge('user/view', $data);
	}

	public function action_show()
	{
		$data = array();
		$count = Model_User::count();
		$config = array(
			'pagination_url' => 'user/show',
			'uri_segment' => 3,
			'num_links' => 4,
			'per_page' => $this->per_page,
			'total_items' => $count
		);

		$pagination = Pagination::forge('user_pagination', $config);

		$search = '';
		$search = Input::get('search');

		$data['users'] = Model_User::get_user($this->per_page, $pagination, $search);
		// $data['users'] = Model_User::query()
		// 														->order_by('id', 'desc')
		// 														->limit($this->per_page)
		// 														->offset($pagination->offset)
		// 														->get();
		// $data['users'] = DB::select()->from('users')
		// 								->order_by('id', 'desc')
		// 								->limit($this->per_page)
		// 								->offset($pagination->offset)
		// 								->execute()->as_array();

		$this->template->content = View::forge('user/show', $data);
		$this->template->content->set_safe('pagination', $pagination);
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
			$auth = Auth::instance();
			$auth->login($username, $password);
			Response::redirect('user/index');
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
