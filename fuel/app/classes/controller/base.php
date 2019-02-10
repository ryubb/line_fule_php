<?php

class Controller_Base extends Controller_Template
{

  public $template = 'base/template';

  public function before()
  {
    parent::before();
    // if (!Auth::check() and ! in_array(Request::active()->action, array())) {
    //   Response::redirect('base/login');
    // } 
		// if (Auth::check()) {
    //   $login_user = Arr::get(Auth::get_user_id(), 1);
    //   $data['login_user'] = Model_User::find($login_user);
    // }
  }

  public function action_index()
  {
    $this->template->content = View::forge('base/index');
  }

  public function action_login()
  {
    Auth::check() and Response::redirect('user/index');

    if (Input::post('username') && Input::post('password')) {
      $username = Input::post('username');
      $password = Input::post('password');
      $auth = Auth::instance();

      if ($auth->login($username, $password)) {
        Response::redirect('user/index');
      } else {
        $this->data['error'] = true;
      }
    }

    $this->template->content = View::forge('base/login');
  }

  public function action_logout()
  {
    Auth::logout();
    Response::redirect('base/index');
  }

  public function action_about()
  {
    $this->template->content = View::forge('base/about');
  }

  public function action_contact()
  {
    $this->template->content = View::forge('base/contact');
  }
  
}