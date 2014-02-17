<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front extends Controller_Template {

    public function before()
    { 
        parent::before();

    }  

	
	public function action_home() {
		$this->template->content = View::factory('front/home');
                                  //->set('username',$username);
	}
	public function action_hiw() {
		$this->template->content = View::factory('front/hiw');
              
	}
	public function action_price() {
		$this->template->content = View::factory('front/price');
              
	}
	public function action_blog() {
		$this->template->content = View::factory('front/blog');
              
	}
	
	public function action_about() {
		$this->template->content = View::factory('front/about');
	}
	public function action_tou() {
		$this->template->content = View::factory('front/tou');
	}
	public function action_quality() {
		$this->template->content = View::factory('front/quality');
	}
	public function action_privacypolicy() {
		$this->template->content = View::factory('front/privacypolicy');
	}
	public function action_contact() {

	  if (HTTP_Request::POST == $this->request->method()){
	  
	      $data=$this->request->post();
		  
		  //$to      = 'iamkeshri@gmail.com';   
		  $to      = 'info@referowl.com'; 
          $from    = $data['email']; 
          $subject = 'Contact Message';
		  
		  $message="<b>Name:</b>".$data['name'].'<br>';
		  $message.="<b>Email:</b>".$data['email'].'<br>';
		  $message.="<b>Requset Type:</b>".$data['type'].'<br>';
          $message.= "<b>Message:</b>".$data['message'];
         
          $headers = "From:".$from."\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  

	      mail($to,$subject,$message,$headers);
		  
		  $postmessage='Thank You, One of our members will contact you.';
		  
	    }

		$this->template->content = View::factory('front/contact')
		                           ->bind('postmessage',$postmessage);;
		
	}
	
	
		public function action_contact() {
		  $this->template->content = View::factory('front/iframe');
		}
	


}

?> 