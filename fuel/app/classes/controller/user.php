<?php
class Controller_User extends Controller_Template 
{
	public function action_index()
	{
    $config = array(
        'pagination_url' => 'sample/user/index',
        'total_items'    => DB::count_records('users'),
        'per_page'       => 5,
        'num_links'      => 10,
        'uri_segment'    => 4, // http://localhost/sample/user/index/xx <- 4
    );
    Pagination::set_config($config);
    $p =Pagination::instance();

    $data["users"] = DB::select()->from('users')
	    ->limit($p->per_page)
	    ->offset($p->offset)
	    ->as_object('Model_User')
      ->execute()
      ->as_array();
		$view = View::forge('user/index',$data);
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('User');

		if ( ! $data['user'] = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('User');
		}

		$this->template->title = "User";
		$this->template->content = View::forge('user/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			
			if ($val->run())
			{
				$user = Model_User::forge(array(
					'name' => Input::post('name'),
					'age' => Input::post('age'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');

					Response::redirect('user');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('User');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('User');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->name = Input::post('name');
			$user->age = Input::post('age');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('user');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->name = $val->validated('name');
				$user->age = $val->validated('age');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('User');

		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('user');

	}


}