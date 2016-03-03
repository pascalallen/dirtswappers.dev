<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getLogin()
	{
		return View::make('login');
	}
	
	public function showProfile()
	{
		return View::make('profile');
	}

	public function postLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
			$user = Auth::user();
		    return Redirect::action('PostsController@index');
		} else {
		    // login failed, go back to the login screen
		    Session::flash('errorMessage', 'Wrong email or password!');
		    return Redirect::back()->withInput();
		}

	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::action('HomeController@showWelcome');
	}

	public function search()
	{
		$search = Input::get('search');

	    $searchTerms = explode(' ', $search);

	    $query = Post::with('user');

	    foreach($searchTerms as $term)
	    {
	        $query->where('title', 'LIKE', '%'. $term .'%')
	        ->orWhere('body', 'LIKE', '%' . $term . '%')
	        ->orWhere('location', 'LIKE', '%' . $term . '%');
	    }

	    $results = $query->orderBy('created_at', 'desc')->get();

	    return View::make('search')->with(['results' => $results]);
	}

	public function searchShow($id)
	{
		$post = Post::find($id);

		if($post) {
			return Redirect::action('PostsController@show', $post->id);
		}
	}

	public function usersHome()
	{
		$user = Auth::user();
		return View::make('timeline')->with('user', $user);

	}
}
