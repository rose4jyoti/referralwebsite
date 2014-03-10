<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Home extends Controller_Template  {
   
   protected $session = NULL;

   public function before()
    { 
        parent::before();
        $session = Session::instance();
	}

   public function action_test()
   {
        $view = new View('home/test'); // load 'article/index.php' view file
        $this->response->body($view);	
   }	

  public function action_einsert()
  {
   	 $id=$this->request->param('id');
	 
	 
	 $details = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $id)
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
	 
	 $details2= DB::select()->from('referralprogdetails')
		         ->where('referralProgID', '=', $id)
				 ->execute()
				 ->as_array();
	 
	 //print_r($details);
		 
    $this->template->content =View::factory('home/einsert')
							->bind('details', $details)	 
							->bind('details2', $details2)
							->set('id', $id) ;	 
   }

 
 
 
  public function action_index()
  {
        if($this->request->param('id')){

		  $id=$this->request->param('id');
		  $campaigndetail_id=$this->request->param('param');
		  
		  $session = Session::instance();
		  $session->set('cam_id',$id);
		  $session->set('campaigndetail_id',$campaigndetail_id);
		  
		}
	
	
        $session = Session::instance();		
		$id=$session->get('cam_id');
		$campaigndetail_id=$session->get('campaigndetail_id');
        //$contacts = ORM::factory('listcontact')->find_all(); // loads all article   object from table
        
		$options = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $id)
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
				 
	    $options2= DB::select()->from('referralprogdetails')
		         ->where('referralProgID', '=', $id)
				 ->execute()
				 ->as_array();
	
		$contacts= DB::select()->from('rp_users_referrals')
		         ->where('campaign_id', '=', $id)
		         ->where('referredByUserID', '=', $campaigndetail_id)
				 ->execute()
				 ->as_array();
	
					  
		/*$contacts = DB::select('rp_users_referrals.referralID','rp_users_referrals.referredByUserID', 'rp_users_referrals.referredName', 'rp_users_referrals.referredEmail', 'rp_users_referrals.sent_status')
		   ->from('rp_users_referrals')
		   ->join('rpusers')
		   ->on('rpusers.userID','=', 'rp_users_referrals.referredByUserID')
		            ->where('rpusers.userReferralID', '=', $id)
		            ->where('rpusers.userID', '=', 67)
		            ->execute()
		            ->as_array();
			print_r($contacts);	
		*/
		
		/////////////////////////////
		 if (HTTP_Request::POST == $this->request->method()){

          $data= $this->request->post();
          $count=count($data);
		  
		  if($data['formid']=='1'){
		      $contacts= DB::select()->from('rp_users_referrals')
		        // ->where('email', '=', $data['key'])
		         ->where('referredEmail', 'LIKE', '%'.$data['key'].'%')
				 ->execute()
				 ->as_array();
				 
			  //print_r($contacts);
			  //Request::current()->redirect('home/index/'.$data['id']);
		   }

		}
		/////////////////////////////
		$session = Session::instance();
		$id=$session->get('cam_id');
		
		$this->template->content =View::factory('home/index')
							    ->set('contacts', $contacts) 
								->set('options', $options)
								->set('options2', $options2)
							    ->bind('id', $id) 	
							    ->bind('campaigndetail_id',$campaigndetail_id );	
                      
  }
  
  
  public function action_congrats()
   {     
   
      // $results = ORM::factory('contact')->find_all(); // loads all article   object from table
	 
        /////////////////////////////
		 if (HTTP_Request::POST == $this->request->method()){

          $data= $this->request->post();
          $count=count($data);
		  
		   if($data['formid']=='0'){
		    
		    $session = Session::instance();
			$session->set('cam_id',$data['id']);
			
			$session->set('campaigndetail_id',$data['campaigndetail_id']);
			//print_r($session->get('cam_id'));
			
		    //for($i=1; $i<$count;$i++){
		    for($i=1; $i<100;$i++){
		     if(isset($data[$i])){
		     $to =$data[$i];		   
             $subject = "Referral program";
             $message = "Hello!, Welcome to the referral program...";
             $from = "someonelse@example.com";
             $headers = "From:" . $from;
             mail($to,$subject,$message,$headers);
             //echo "Mail Sent.";
		   
		   	 $query = DB::update('rp_users_referrals')
		         ->set(array('sent_status'=> 1))
		          ->where('referredEmail', '=',$data[$i] )
				  ->execute();
		   
		    }
           }
	       //$id=$data['id'];
		   //Request::current()->redirect('home/congrats/'.$data['id']);
		   //Request::current()->redirect('home/congrats/');

		  }
		  
		  
		 
		  
		  if($data['formid']=='1'){
		      $contacts= DB::select()->from('rp_users_referrals')
		        // ->where('email', '=', $data['key'])
				 ->where('referredEmail', 'LIKE', '%'.$data['key'].'%')
				 ->execute()
				 ->as_array(); 

			  /*$options = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $data['id'])
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
				 */
		   }
		   
		  if($data['formid']=='2'){
		  
		   //$data= $this->request->post();
		   //print_r($data);
		  
		  ////////////////////////////////

		     if(isset($data[1])){
		     $to =$data[1];		   
             $subject = "Remind Referral program";
             $message = "Hello!, This mesage hs been sent to remin you about the referral program...";
             $from = "someonelse@example.com";
             $headers = "From:" . $from;
             mail($to,$subject,$message,$headers);
             //echo "Mail Sent.";
		   
		   	 $query = DB::update('rp_users_referrals')
		         ->set(array('sent_status'=> 1))
		          ->where('referredEmail', '=',$data[1] )
				  ->execute();
		   
		    }
     	
		  Request::current()->redirect('home/congrats/');
       
		  
		  }
		  
      
		}
        
		$session = Session::instance();	
		$id=$session->get('cam_id');
		$campaigndetail_id=$session->get('campaigndetail_id');
		
		/**********listing the sent contacts**********/
		$contacts= DB::select()->from('rp_users_referrals')
		          //->where('referralProgID', '=', $id)
				 ->where('campaign_id', '=', $id)
		         ->where('referredByUserID', '=', $campaigndetail_id)
				 ->execute()
				 ->as_array();
				 
		/******counting invitation********/
		$temptotal= DB::select()->from('rp_users_referrals')
		         //->where('register_status', '=', 1)
				 ->execute()
				 ->as_array();
		$counttotal=  count($temptotal);	
		
		$tempsent= DB::select()->from('rp_users_referrals')
		         ->where('sent_status', '=', 1)
				 ->execute()
				 ->as_array();
		$countsent=  count($tempsent);	
        $tempregistered= DB::select()->from('rp_users_referrals')
		         ->where('referralStatus', '=', 'Registered')
				 ->execute()
				 ->as_array();
		$countregistered=  count($tempregistered);			
        //print_r($countsent);
        //print_r($countregistered);

			
		
		/////////////////////////////
		
		 $social= DB::select()->from('sociallinks')
		         //->where('referralProgID', '=', $id)
				 ->limit(1)
				 ->execute()
				 ->as_array();

		///////////////////////
        $session = Session::instance();
		$id=$session->get('cam_id');
				  $options = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $id)
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
		
		
		$created= DB::select()->from('referralprogs')
		         ->where('refProgID', '=', $id)
				 ->execute()
				 ->as_array();
	    
		
		
        $this->template->content =View::factory('home/congrats')
							    //->set('results', $results)
							    ->bind('options', $options)
								->bind('contacts', $contacts)
								->bind('counttotal', $counttotal)
								->bind('countsent', $countsent)
								->bind('countregistered', $countregistered)	
								->bind('social', $social)	
								->bind('created', $created)	
								->bind('id',$id )	
								->bind('campaigndetail_id',$campaigndetail_id );	
   }


  

public function action_congrats2()
   {     
   
		$session = Session::instance();	
		$id=$session->get('cam_id');
		$campaigndetail_id=$session->get('campaigndetail_id');
		
		/**********listing the sent contacts**********/
		$contacts= DB::select()->from('rp_users_referrals')
		          //->where('referralProgID', '=', $id)
				 ->where('campaign_id', '=', $id)
		         ->where('referredByUserID', '=', $campaigndetail_id)
				 ->execute()
				 ->as_array();
				 
		/******counting invitation********/
		$temptotal= DB::select()->from('rp_users_referrals')
		         //->where('register_status', '=', 1)
				 ->execute()
				 ->as_array();
		$counttotal=  count($temptotal);	
		
		$tempsent= DB::select()->from('rp_users_referrals')
		         ->where('sent_status', '=', 1)
				 ->execute()
				 ->as_array();
		$countsent=  count($tempsent);	
        $tempregistered= DB::select()->from('rp_users_referrals')
		         ->where('referralStatus', '=', 'Registered')
				 ->execute()
				 ->as_array();
		$countregistered=  count($tempregistered);			
        //print_r($countsent);
        //print_r($countregistered);

			
		
		/////////////////////////////
		
		 $social= DB::select()->from('sociallinks')
		         //->where('referralProgID', '=', $id)
				 ->limit(1)
				 ->execute()
				 ->as_array();

		///////////////////////
        $session = Session::instance();
		$id=$session->get('cam_id');
				  $options = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $id)
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
		
		
		$created= DB::select()->from('referralprogs')
		         ->where('refProgID', '=', $id)
				 ->execute()
				 ->as_array();
	    
		
		
        $this->template->content =View::factory('home/congrats')
							    //->set('results', $results)
							    ->bind('options', $options)
								->bind('contacts', $contacts)
								->bind('counttotal', $counttotal)
								->bind('countsent', $countsent)
								->bind('countregistered', $countregistered)	
								->bind('social', $social)	
								->bind('created', $created)	
								->bind('id',$id )	
								->bind('campaigndetail_id',$campaigndetail_id );	
  }  
   
   
   
   
   
 }