<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template {
    
	 public function before()
    {
       parent::before();
		// Load the user information
		$user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if ($user)
		{
			$user = '1';
		}
    }
	
	public function action_index()
	{
		$this->template->content = View::factory('user/info')
			->bind('user', $user);
		
		// Load the user information
		$user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
	}

	public function action_create() 
	{
	    $sidebar=View::factory('sidebar');
		
		$this->template->content = View::factory('user/create')
			->bind('errors', $errors)
			->bind('message', $message)
			->set('sidebar', $sidebar);;
			
		if (HTTP_Request::POST == $this->request->method()) 
		{	
		
			try {
		
				// Create the user using form values
				$user = ORM::factory('user')
				      ->create_user($this->request->post(), array(
					'username',
					//'email',
                    'customerCFirstName',
                    'customerCLastName',
	                'password',					
                    'customerWebsite',
 				
				     ));
				
				// Grant user login role
				$user->add('roles', ORM::factory('role', array('name' => 'login')));
				
				// Reset values so form is not sticky
				$_POST = array();
				
				// Set success message
				$message = "You have added user '{$user->username}' to the database";
				
				Request::current()->redirect('user/login');
				
			} catch (ORM_Validation_Exception $e) {
				
				// Set failure message
				$message = 'There were errors, please see form below.';
				
				// Set errors using custom messages
				$errors = $e->errors('models');
			}
		}
	}
	
	public function action_login() 
	{
		$this->template->content = View::factory('user/login')
			->bind('message', $message);
			
		if (HTTP_Request::POST == $this->request->method()) 
		{
			// Attempt to login user
			$remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
			
			$user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
			
			// If successful, redirect user
			if ($user) 
			{
				Request::current()->redirect('customer/campaign');
			} 
			else 
			{
				$message = 'Please Enter correct Username and Password';
			}
		}
	}
	
	public function action_logout() 
	{
		// Log user out
		Auth::instance()->logout();
		
		// Redirect to login page
		Request::current()->redirect('user/login');
	}
	
  public function action_changepasss(){
    $user = Auth::instance()->get_user();
	 if (!$user)
	 {
	  Request::current()->redirect('user/login');
     }
		
	$userid = Auth::instance()->get_user()->id;

   if (HTTP_Request::POST == $this->request->method()) 
    {
	
	$userpass = Auth::instance()->get_user()->password;
	
	//print_r(hash($userpass, $salt = FALSE));
	//print_r($this->request->post()); 
	//die();
	//print_r($query); 

					  
    $find=$this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
	
    $formpassword=$this->request->data['User']['password'];
	
    $oldpassword=$this->Auth->password($formpassword);
	
    if($find['User']['password']==$oldpassword)
   {
     if($this->data['User']['npassword']==$this->data['User']['cpassword'])
     {
       $newpassword=$this->data['User']['npassword'];
   	   $hashpassword=$this->Auth->password($newpassword);
	   
       $this->User->query('update users set password = "'.$hashpassword.'" where id = "'.$find['User']['id'].'"');
       // $this->Session->write('message','Password is successfully changed');
       
	   $this->Session->setFlash('Password is successfully changed.');

       $this->redirect('/projects/home');
    
	   
     }  
     else
     {
       $this->Session->setFlash('New Password And Confirm Password does not Matched. Please Try Again!');
      // $this->redirect('/users/'); 
     }
    }
    else
      {
     // $this->Session->write('message','<font color="red">Please enter OldPassword Correctly</font>');
       $this->Session->setFlash('Please enter OldPassword Correctly');
       $this->redirect('/users/changepassword');
     }
   
   }
   
 
 }
 
 
 public function action_changepass() {
 
 $user = Auth::instance()->get_user();
	 if (!$user)
	 {
	  Request::current()->redirect('user/login');
     }
		
	$userid = Auth::instance()->get_user()->id;

 if (HTTP_Request::POST == $this->request->method()) 
 {
	

        $user = ORM::factory('user')
                ->where('id', '=', $userid)
                ->find()
                ->update_user($this->request->post(), array(
            'username',
            'password',
                ));
       //return $this->response('success', 'User Edited');
	    Request::current()->redirect('customer/account');

	
  }

 }
	
	
}
?>