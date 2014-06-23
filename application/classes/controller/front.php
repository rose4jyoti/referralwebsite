<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front extends Controller_Template {

    public function before()
    { 
        parent::before();
		
		$user = Auth::instance()->get_user();
		if ($user)
		{
		 $customername = Auth::instance()->get_user()->username;
		 $userid = Auth::instance()->get_user()->id;

         // Make $page_title available to all views
         View::bind_global('customername', $customername);
		
		$campaigns = DB::select('referralprogs.customerID','referralprogdetails.referralProgDetailsID',  'referralprogdetails.referralProgTitle')->from('referralprogs')->join('referralprogdetails')->on('referralprogs.refProgID','=', 'referralprogdetails.referralProgID')
		            ->where('referralprogs.customerID', '=', $userid)
		            ->execute()
		            ->as_array();
					
		 View::bind_global('campaigns', $campaigns);
		}
         
		

    }  

	
	public function action_home() {
        $header = View::factory('front/header');
	    $footer = View::factory('front/footer');

		$this->template->content = View::factory('front/home')
		                          ->bind('header',$header)
						          ->bind('footer',$footer);
                                  //->set('username',$username);
								
	}
	public function action_hiw() {
        $header = View::factory('front/header');
	    $footer = View::factory('front/footer');

		$this->template->content = View::factory('front/hiw')
		                           ->bind('header',$header)
						          ->bind('footer',$footer);
              
	}
	public function action_price() {
        $header = View::factory('front/header');
	    $footer = View::factory('front/footer');
		$this->template->content = View::factory('front/price')
		                          ->bind('header',$header)
						          ->bind('footer',$footer);
              
	}
	public function action_blog() {
	    $header = View::factory('front/header');
	    $footer = View::factory('front/footer');
						  
		$this->template->content = View::factory('front/blog')
		                          ->bind('header',$header)
						          ->bind('footer',$footer);;
              
	}
	
	public function action_about(){
	
	    $header = View::factory('front/header');
	    $footer = View::factory('front/footer');
	
		$this->template->content = View::factory('front/about')
		                         ->bind('header',$header)
						         ->bind('footer',$footer);
	}
	public function action_tou() {
	
	    $header = View::factory('front/header');
	    $footer = View::factory('front/footer');
	
		$this->template->content = View::factory('front/tou')
		                         ->bind('header',$header)
						         ->bind('footer',$footer);
	}
	public function action_quality() {
	    $header = View::factory('front/header');
	    $footer = View::factory('front/footer');

		$this->template->content = View::factory('front/quality')
		                           ->bind('header',$header)
						           ->bind('footer',$footer);
	}
	public function action_privacypolicy() {
	    $header = View::factory('front/header');
	    $footer = View::factory('front/footer');

		$this->template->content = View::factory('front/privacypolicy')
		                           ->bind('header',$header)
						           ->bind('footer',$footer);
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

	    $header = View::factory('customer/header');		
	    $footer = View::factory('customer/footer');		

		$this->template->content = View::factory('front/contact')
		                           ->bind('postmessage',$postmessage)
								   ->bind('header',$header)
						           ->bind('footer',$footer);
		
	}
	
	
	/*public function action_contact() {
		  $this->template->content = View::factory('front/iframe');
		}
	*/


}

?>