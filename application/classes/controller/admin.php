<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {

    public function before()
    { 
        parent::before();
		
		$user = Auth::instance()->get_user();
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
         
		$customername = Auth::instance()->get_user()->username;
		 
        // Make $page_title available to all views
        View::bind_global('customername', $customername);
    }  
	
	public function action_index() {
	   $user = Auth::instance()->get_user();
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
		
		$this->template->content = View::factory('customer/index')
			                      ->bind('user', $user);
         
	   
	}
	
	public function action_dashboard() {
	   $user = Auth::instance()->get_user();
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
		
      $values = DB::select()->from('sociallinks')
		         //->where('referralProgDetailsID', '=', $rpdid)
				 ->execute()
				 ->as_array();
	
       $data=$this->request->post();
	   if (HTTP_Request::POST == $this->request->method()){
 
		 DB::update('sociallinks')->set(array('facebook'=> $data['facebook'], 'twitter'=> $data['twitter'],'linkedin'=> $data['linkedin']))
		          ->where('id', '=', 4)
				  ->execute();
		 
		 
		  Request::current()->redirect('admin/dashboard');
		}
		
		
		$this->template->content = View::factory('admin/dashboard')
		                          ->set('values',$values)
			                      ->bind('user', $user);
	}
	
	
	
}

?>