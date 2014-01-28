<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Home extends Controller_Template  {
   
   protected $session = NULL;

   public function before()
    { 
        parent::before();
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
	 
	 $details2= DB::select()->from('rp_referralprog_details')
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
		$id=$this->request->param('id');
		
        //$contacts = ORM::factory('listcontact')->find_all(); // loads all article   object from table
        
		$options = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $id)
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
				 
	    $options2= DB::select()->from('rp_referralprog_details')
		         ->where('referralProgID', '=', $id)
				 ->execute()
				 ->as_array();
				 
				 
		$contacts= DB::select()->from('listcontacts')
		        // ->where('referralProgID', '=', $id)
				 ->execute()
				 ->as_array();
		
		
		/////////////////////////////
		 if (HTTP_Request::POST == $this->request->method()){

          $data= $this->request->post();
          $count=count($data);
		  
		  if($data['formid']=='1'){
		      $contacts= DB::select()->from('listcontacts')
		        // ->where('email', '=', $data['key'])
		         ->where('email', 'LIKE', '%'.$data['key'].'%')
				 ->execute()
				 ->as_array();
				 
			  //print_r($contacts);
			  //Request::current()->redirect('home/index/'.$data['id']);
		   }
		   
		  if($data['formid']=='2'){
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
		   
		   	 $query = DB::update('listcontacts')
		         ->set(array('sent_status'=> 1))
		          ->where('email', '=',$data[$i] )
				  ->execute();
		   
		    }
           }
	       $id=$data['id'];
		   //Request::current()->redirect('home/congrats/'.$data['id']);
		   Request::current()->redirect('home/congrats/');

		  }
		  
      
		}
		/////////////////////////////
		
		$this->template->content =View::factory('home/index')
							    ->set('contacts', $contacts) 
								->set('options', $options)
								->set('options2', $options2)
							    ->set('id', $id) ;	
                      
  }
  
  
  

  public function action_congrats()
   {     
      
        $id= $this->request->param('id');
		$options = DB::select()->from('rp_referralprog_images')
		         ->where('referralProgID', '=', $id)
				 ->order_by('referralProgImageID', 'ASC')
				 ->execute()
				 ->as_array();
				 
				 
		$results = ORM::factory('contact')->find_all(); // loads all article   object from table
         
		 
		$contacts= DB::select()->from('listcontacts')
		        // ->where('referralProgID', '=', $id)
				 ->execute()
				 ->as_array();
				 
		/******counting invitation********/
		$temptotal= DB::select()->from('listcontacts')
		         //->where('register_status', '=', 1)
				 ->execute()
				 ->as_array();
		$counttotal=  count($temptotal);	
		
		$tempsent= DB::select()->from('listcontacts')
		         ->where('sent_status', '=', 1)
				 ->execute()
				 ->as_array();
		$countsent=  count($tempsent);	
        $tempregistered= DB::select()->from('listcontacts')
		         ->where('register_status', '=', 1)
				 ->execute()
				 ->as_array();
		$countregistered=  count($tempregistered);			
        //print_r($countsent);
        //print_r($countregistered);

			
		/////////////////////////////
		 if (HTTP_Request::POST == $this->request->method()){

          $data= $this->request->post();
          $count=count($data);
		  
		  if($data['formid']=='1'){
		      $contacts= DB::select()->from('listcontacts')
		        // ->where('email', '=', $data['key'])
				 ->where('email', 'LIKE', '%'.$data['key'].'%')
				 ->execute()
				 ->as_array(); 
			  
			  //print_r($contacts);	
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
		   
		   	 $query = DB::update('listcontacts')
		         ->set(array('sent_status'=> 1))
		          ->where('email', '=',$data[1] )
				  ->execute();
		   
		    }
     	
		  Request::current()->redirect('home/congrats/');
       
		   
		  ///////////////////////////////
		  
		  }
		  
      
		}
		/////////////////////////////
		
		 $social= DB::select()->from('sociallinks')
		         //->where('referralProgID', '=', $id)
				 ->limit(1)
				 ->execute()
				 ->as_array();

		//print_r($social);
        
		
        $this->template->content =View::factory('home/congrats')
							    ->set('results', $results)
							    ->bind('options', $options)
								->bind('contacts', $contacts)
								->bind('counttotal', $counttotal)
								->bind('countsent', $countsent)
								->bind('countregistered', $countregistered)	
								->bind('social', $social);	
   }

}