<?php
class Controller_Currency extends Controller_Template 
{

	public function action_index()
	{
		$data['currencies'] = Model_Currency::find_all();
		$this->template->title = "Currencies";
		$this->template->content = View::forge('currency/index', $data);

	}

	public function action_view($id = null)
	{
		$data['currency'] = Model_Currency::find_by_pk($id);

		$this->template->title = "Currency";
		$this->template->content = View::forge('currency/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Currency::validate('create');
			
			if ($val->run())
			{
				$currency = Model_Currency::forge(array(
					'name' => Input::post('name'),
					'rate' => Input::post('rate'),
				));

				if ($currency and $currency->save())
				{
					Session::set_flash('success', 'Added currency #'.$currency->id.'.');
					Response::redirect('currency');
				}
				else
				{
					Session::set_flash('error', 'Could not save currency.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Currencies";
		$this->template->content = View::forge('currency/create');

	}

	public function action_edit($id = null)
	{
		$currency = Model_Currency::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Currency::validate('edit');

			if ($val->run())
			{
				$currency->name = Input::post('name');
				$currency->rate = Input::post('rate');

				if ($currency->save())
				{
					Session::set_flash('success', 'Updated currency #'.$id);
					Response::redirect('currency');
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

		$this->template->set_global('currency', $currency, false);
		$this->template->title = "Currencies";
		$this->template->content = View::forge('currency/edit');

	}

	public function action_delete($id = null)
	{
		if ($currency = Model_Currency::find_one_by_id($id))
		{
			$currency->delete();

			Session::set_flash('success', 'Deleted currency #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete currency #'.$id);
		}

		Response::redirect('currency');

	}


}