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

	public function login()
	{
		return View::make('Login');
	}
	public function signup()
	{
		return View::make('Signup');
	}
	
	public function doLogout()
    {
        Auth::logout(); 
        return Redirect::to('/'); 
    }

	public function doLogin()
	{
		$rules = array(
	    		'email'    => 'required|email',
	    		'password' => 'required|alphaNum|min:3'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
		    return Redirect::to('/')
		        ->withErrors($validator)
		        ->withInput(Input::except('password'));
		}
		else
		{
		    $userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );

		    $usr = User::where('email', '=', $userdata['email'])->first();

		    if(empty($usr))
		    {
		    	$msg = array('email' => 'Sorry, this email is not registered, please sign up first');
				return Redirect::to('/')
					->withErrors($msg)
					->withInput(Input::except('password'));
		    }
		    
			else if(Auth::attempt($userdata))
			{
				return Redirect::to('showpost');
			}    	    
		    else
		    { 
		        $msg = array('email' => 'Email or Password is incorrect');
		        return Redirect::to('/')
		        	->withErrors($msg)
					->withInput(Input::except('password'));
		    }
		}
	}

	public function signUpPost()
	{
		$rules = array(
					'name'	=>	'required|string',
					'email'		=>	'required|email',
					'password'	=>	'required|alphaNum|min:3',
					'confirm_password'	=>	'required|alphaNum|min:3'
					);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails())
		{
			return Redirect::to('signup')
			->withErrors($validator);
		}		
		else
		{
			$user=new User;

			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			
			
			if((Input::get('password')) == (Input::get('confirm_password')))
			{
				$user->save();
			}
			else
			{
				$msg = array('msg' => 'Password did not match with the confirm password');
				return Redirect::back()
					->withErrors($msg)
					->withInput(Input::except('password'));
			}

		$msg=array('msg'=>'Signup successful....');
		
		return Redirect::back()
			->withErrors($msg);
		}
	}

	public function knowledgebasePost()
	{
		$post = new Post;
        
         $post->title = Input::get('title');
         $post->description = Input::get('post');
         $post->u_id = Auth::user()->id;
         
         $post->save();
            
         $msg =array('msg' => 'Post Created successfully');
		 
		 return Redirect::back()->withErrors($msg);
	}

	public function showPost()
	{
		$allpost = Post::all();
		return View::make('ShowPost',['allpost'=>$allpost]);
	}

	public function commentPost($p_id=null)
	{
		$comment = new Comment;
		$comment->comment = Input::get('comment');
		$comment->p_id = $p_id;
		$comment->u_id = Auth::user()->id;
		$comment->save();

		$msg =array('msg' => 'Post Created successfully');
		 
		return Redirect::back()->withErrors($msg);
	}

}
