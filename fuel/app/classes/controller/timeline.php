<?php

class Controller_Timeline extends Controller_Base
{
	public $template = 'base/template';
	private $per_page = 10;

	public function action_index($id=0)
	{
		$id && $data['timeline'] = Model_Timeline::find($id);
		$this->template->content = View::forge('timeline/index', $data);
	}

	public function action_show()
	{
		$data = array();
		$count = Model_Timeline::count();
		$config = array(
			'pagination_url' => 'timeline/show',
			'uri_segment' => 3,
			'num_links' => 10,
			'per_page' => $this->per_page,
			'total_items' => $count,
			'show_first' => true,
			'show_last' => true,
		);

		$pagination = Pagination::forge('timeline_pagination', $config);

		$search ='';
		$search = (int)Input::get('only_myself');

		$data["timelines"] = Model_Timeline::get_timeline($this->per_page, $pagination, $search);

		$this->template->content = View::forge('timeline/show', $data);
		$this->template->content->set_safe('pagination', $pagination);
	}

	public function action_create()
	{
		$timeline = Model_Timeline::forge();
		if (Input::post('title') && Input::post('body')) {
			$title = Input::post('title');
			$body = Input::post('body');
			$timeline->title = $title;
			$timeline->body = $body;
			$timeline->user_id = Arr::get(Auth::get_user_id(), 1);

			if ($timeline->save()) {
				Response::redirect('timeline/show');
			}
		}
	}

	public function action_edit($id=0)
	{
		$id && $data["timeline"] = Model_Timeline::find($id);
		$this->template->content = View::forge('timeline/edit', $data);
	}

	public function action_update()
	{
		$timeline = Model_Timeline::forge();
		$title = Input::post('title');
		$body = Input::post('body');
		$user_id = Arr::get(Auth::get_user_id(), 1);

		$timeline->title = $title;
		$timeline->body = $body;
		$timeline->user_id = $user_id;

		if ($timeline->save()) {
			Response::redirect('timeline/show');
		}
	}

	public function action_destroy($id=0)
	{
		$id && $timeline = Model_Timeline::find($id);
		$timeline->delete();
		Response::redirect('timeline/show');
	}

	public function action_auto_insert()
	{
		for($i=1;$i<101;$i++) {
			$timeline = Model_Timeline::forge();
			$timeline->user_id = Arr::get(Auth::get_user_id(), 1);
			$timeline->title = $i.'番目のタイトルです。';
			$timeline->body = $i.'番目の本文です。';

			$timeline->save();
		}

		$this->template->content = 'finished';
		$max_int = Model_User::count();
			$rand = rand(1, $max_int);
	}

	public function action_auto_update()
	{
		$count = Model_Timeline::count();
		for($i=1;$i<=$count;$i++) {
			$max_int = Model_User::count();
			$rand = rand(2, $max_int);
			if ($rand == 24) {
				$rand = 2;
			}
			if (Model_Timeline::find($i)) {
				$timeline = Model_Timeline::find($i);
				$timeline->user_id = $rand;
				$timeline->save();
			}
		}

		$this->template->content = 'finished';
	}

}
