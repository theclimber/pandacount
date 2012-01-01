<?php
class Controller_Category extends Controller_Template 
{

	public function action_index()
	{
		$data['categories'] = Model_Category::find_all();
		$this->template->title = "Categories";
		$this->template->content = View::forge('category/index', $data);

	}

	public function action_view($id = null)
	{
		$data['category'] = Model_Category::find_by_pk($id);

		$this->template->title = "Category";
		$this->template->content = View::forge('category/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Category::validate('create');
			
			if ($val->run())
			{
				$category = Model_Category::forge(array(
					'name' => Input::post('name'),
					'parent' => Input::post('parent'),
				));

				if ($category and $category->save())
				{
					Session::set_flash('success', 'Added category #'.$category->id.'.');
					Response::redirect('category');
				}
				else
				{
					Session::set_flash('error', 'Could not save category.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('category/create');

	}

	public function action_edit($id = null)
	{
		$category = Model_Category::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Category::validate('edit');

			if ($val->run())
			{
				$category->name = Input::post('name');
				$category->parent = Input::post('parent');

				if ($category->save())
				{
					Session::set_flash('success', 'Updated category #'.$id);
					Response::redirect('category');
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

		$this->template->set_global('category', $category, false);
		$this->template->title = "Categories";
		$this->template->content = View::forge('category/edit');

	}

	public function action_delete($id = null)
	{
		if ($category = Model_Category::find_one_by_id($id))
		{
			$category->delete();

			Session::set_flash('success', 'Deleted category #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete category #'.$id);
		}

		Response::redirect('category');

	}


}