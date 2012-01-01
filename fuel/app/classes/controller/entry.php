<?php
class Controller_Entry extends Controller_Template 
{

	public function action_index()
	{
		$data['entries'] = Model_Entry::find_all();
		$this->template->title = "Entries";
		$this->template->content = View::forge('entry/index', $data);

	}

	public function action_view($id = null)
	{
		$data['entry'] = Model_Entry::find_by_pk($id);

		$this->template->title = "Entry";
		$this->template->content = View::forge('entry/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Entry::validate('create');
			
			if ($val->run())
			{
				$entry = Model_Entry::forge(array(
					'date' => Input::post('date'),
					'description' => Input::post('description'),
					'price' => Input::post('price'),
					'category' => Input::post('category'),
					'currency' => Input::post('currency'),
					'account' => Input::post('account'),
				));

				if ($entry and $entry->save())
				{
					Session::set_flash('success', 'Added entry #'.$entry->id.'.');
					Response::redirect('entry');
				}
				else
				{
					Session::set_flash('error', 'Could not save entry.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Entries";
		$this->template->content = View::forge('entry/create');

	}

	public function action_edit($id = null)
	{
		$entry = Model_Entry::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Entry::validate('edit');

			if ($val->run())
			{
				$entry->date = Input::post('date');
				$entry->description = Input::post('description');
				$entry->price = Input::post('price');
				$entry->category = Input::post('category');
				$entry->currency = Input::post('currency');
				$entry->account = Input::post('account');

				if ($entry->save())
				{
					Session::set_flash('success', 'Updated entry #'.$id);
					Response::redirect('entry');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->set_global('entry', $entry, false);
		$this->template->title = "Entries";
		$this->template->content = View::forge('entry/edit');

	}

	public function action_delete($id = null)
	{
		if ($entry = Model_Entry::find_one_by_id($id))
		{
			$entry->delete();

			Session::set_flash('success', 'Deleted entry #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete entry #'.$id);
		}

		Response::redirect('entry');

	}


}