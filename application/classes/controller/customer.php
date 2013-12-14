<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Customer extends Controller_Template {

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
		
		
		$campaigns =DB::select()->from('rp_referralprog_details')
                      //->where('customerID','=', $userid)
                      ->execute();
					  
		 View::bind_global('campaigns', $campaigns);
					  
        // Load $sidebar into the template as a view
        // $this->template->sidebar = View::factory('template/sidebar');
 
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
	
    // loads the new article form
    public function action_refprogcreate() {
	    $user = Auth::instance()->get_user();
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
       //print_r($this->request->post());
	    $data=$this->request->post();
		$userid = Auth::instance()->get_user()->id;
		//print_r($userid);
		
        if (HTTP_Request::POST == $this->request->method()){
         $query=DB::insert('rp_referralprogs', array('customerID', 'startTime', 'endTime','minReferralRequired','maxReferralLimit', 'rewardFrequence', 'actionRewarded','rewardsPerAction','entryEmailNotification', 'replyEmail','refProgStatus', 'refProgInstantRewardActivated'))
		 ->values(array($userid, $data['startTime'], $data['endTime'],$data['minReferralRequired'], $data['maxReferralLimit'], $data['rewardFrequence'],$data['actionRewarded'], $data['rewardsPerAction'], $data['entryEmailNotification'], $data['replyEmail'],$data['refProgStatus'],$data['refProgInstantRewardActivated']))
		 ->execute();
		 
		 Request::current()->redirect('customer/refproglist');
		 
		}
		
		$this->template->content = View::factory('customer/refprogcreate')
			 ->set('article', 'ok');
   }
	
	public function action_emails() {
	    
		 $finds = DB::select('refProgID', 'refProgTypeID')->from('rp_referralprogs')
				 ->order_by('refProgID', `DESC`)
				 ->limit(1)
				 ->execute()
				 ->as_array();
				 
		 if($finds){
		 $id=$finds[0]['refProgID'];
		 }
		 else{
		 Request::current()->redirect('customer/start');
		 }
		 
		 $programid=$finds[0]['refProgTypeID'];
		 
	    $data=$this->request->post();

       if (HTTP_Request::POST == $this->request->method()){
         
		 $query=DB::insert('rp_email_templates', array('refProgID','emailFromEmail', 'emailFromName'))
		 ->values(array($id, $data['rte'], $data['fnd']))
		 ->execute();

		  $query1=DB::insert('rp_email_template_details', array('emailTempID','emailSubject', 'emailHtml'))
		 ->values(array( $query[0], $data['sub1'], $data['editor1']))
		 ->execute();
		 
		 Request::current()->redirect('customer/appearance');
		 
		}

         $this->template->content = View::factory('customer/emails');
	   
	}
	
    public function action_cemails() {
		 $user = Auth::instance()->get_user();
		 if (!$user)
		 {
			Request::current()->redirect('user/login');
		 }
		 $userid = Auth::instance()->get_user()->id;
		 
		 $rpdid=$this->request->param('id');
		 
	     $query = DB::select()->from('rp_referralprog_details')
		         ->where('referralProgDetailsID', '=', $rpdid)
				 ->execute()
				 ->as_array();
				 
		
		 
		 $temp=$query[0]['referralProgID'];

		 
		 $query1 = DB::select()->from('rp_email_templates')
		         ->where('refProgID', '=', $temp)
				 ->execute()
				 ->as_array();
				 
	     //print_r($query1);
		 //die();
		 
		 //$paramid=$query1[0]['refProgTypeID'];
		 $details =DB::select()->from('rp_referralprog_details')
                      ->where('referralProgDetailsID','=', $rpdid)
                      ->execute();		
		 
		$this->template->content = View::factory('customer/cemails')
                                 ->set('rpdid',$rpdid)
                                 ->bind('query',$query)
                                 ->bind('query1',$query1)
                                 ->bind('details',$details);
		 
		   
	}
	
	public function action_start() {
	
       $user = Auth::instance()->get_user();
		// if a user is not logged in, redirect to login page
		 if (!$user)
		 {
			Request::current()->redirect('user/login');
		 }
        
	
		$userid = Auth::instance()->get_user()->id;

	    $refproid=$this->request->param('id'); 

        if ($refproid){
         $query=DB::insert('rp_referralprogs', array('customerID', 'refProgTypeID'))
		 
		 ->values(array( $userid, $refproid))
		 ->execute();
		 
		 Request::current()->redirect('customer/reward');
		 
		 }
		
	   
         $this->template->content = View::factory('customer/start');
	   
	}
	
	public function action_reward() {
	    
		 $user = Auth::instance()->get_user();
		 if (!$user)
		 {
			Request::current()->redirect('user/login');
		 }
		 $userid = Auth::instance()->get_user()->id;
		 
		 $finds = DB::select('refProgID', 'refProgTypeID')->from('rp_referralprogs')
				 ->order_by('refProgID', 'DESC')
				 ->limit(1)
				 ->execute()
				 ->as_array();
				 
		//print_r($finds);
		
		if($finds){		
		 $id=$finds[0]['refProgID'];
		 }
		 else{
		 Request::current()->redirect('customer/start');
		 }
		 
		 $programid=$finds[0]['refProgTypeID'];
		 //print_r($finds);
		 //die();
		 
	     $data=$this->request->post();

         if (HTTP_Request::POST == $this->request->method()){
 
          $query=DB::insert('rp_referralprog_details', array('referralProgID','referralProgTitle', 'referralProgDescription'))
		 
		 ->values(array( $id, $data['rpt'], $data['rpd']))
		 ->execute();
		  
		 
		 $query = DB::update('rp_referralprogs')->set(array('startTime'=> $data['start'], 'endTime'=> $data['end'],'rewardFrequence'=> $data['rf'],'minReferralRequired' => $data['mrr'], 'actionRewarded'=>$data['ar']))
		          ->where('refProgID', '=', $id)
				  ->execute();
		 
		  Request::current()->redirect('customer/emails');
		 
		 }
		 $this->template->content = View::factory('customer/reward')
		                           ->bind('paramid', $programid);
								   
	}
		 
    public function action_creward() {
		 $user = Auth::instance()->get_user();
		 if (!$user)
		 {
			Request::current()->redirect('user/login');
		 }
		 $userid = Auth::instance()->get_user()->id;
		 
		 $rpdid=$this->request->param('id');
		 
		 $query = DB::select()->from('rp_referralprog_details')
		         ->where('referralProgDetailsID', '=', $rpdid)
				 ->execute()
				 ->as_array();
		 $temp=$query[0]['referralProgID'];
		 
		 $query1 = DB::select()->from('rp_referralprogs')
		         ->where('refProgID', '=', $temp)
				 ->execute()
				 ->as_array();
		 $paramid=$query1[0]['refProgTypeID'];
		 
        $details =DB::select()->from('rp_referralprog_details')
                      ->where('referralProgDetailsID','=', $rpdid)
                      ->execute();		 
		$this->template->content = View::factory('customer/creward')
								 ->set('paramid', $paramid)
                                 ->bind('rpdid',$rpdid)
                                 ->bind('query',$query)
                                 ->bind('query1',$query1)
                                 ->bind('details',$details);
		 
		   
	}
	

		
	
  public function action_appearance() {
       $user = Auth::instance()->get_user();
	   if (!$user)
		{
		Request::current()->redirect('user/login');
	    }
	   $userid = Auth::instance()->get_user()->id;
		 
	   $finds = DB::select('refProgID', 'refProgTypeID')->from('rp_referralprogs')
				 ->order_by('refProgID', 'DESC')
				 ->limit(1)
				 ->execute()
				 ->as_array();
			
		//print_r($finds);
				 
				 
		if($finds){
		$id=$finds[0]['refProgID'];
		}
		else{
		 Request::current()->redirect('customer/start');
		}
		
		$programid=$finds[0]['refProgTypeID'];
	
	    /***********required details**************/
			  
		$description =DB::select()->from('rp_referralprog_details')
					  ->order_by('referralProgDetailsID', 'DESC')
					  ->limit(1)
                      ->execute();
		$details =DB::select()->from('rp_referralprogs')
					  ->order_by('refProgID', 'DESC')
					  ->limit(1)
                      ->execute();
		

		$data=$this->request->post();
		
        $filename = NULL;
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['avatar']))
            {
                $filename = $this->_save_image($_FILES['avatar']);
            }
        }
		
		
		/***************filename insert***********/
		if ($this->request->method() == Request::POST)
        {
		 $query=DB::insert('rp_referralprog_images', array('referralProgID','referralProgImage','referralProgImageOrder'))
		 
		 ->values(array( $id, $filename, $data['so']))
		 ->execute();
		  
		 //Request::current()->redirect('customer/appearance');
		}
		
		if ( ! $filename)
        {
            $error_message = 'There was a problem while uploading the image.
                Make sure it is uploaded and must be JPG/PNG/GIF file.';
        }
		
		$images =DB::select()->from('rp_referralprog_images')
		              ->where('referralProgID','=', $id)
					  ->order_by('referralProgImageID', 'ASC')
                      ->execute()
					  ->as_array();

        //print_r(images);					  
		
		$this->template->content =View::factory('customer/appearance')
		                    ->bind('description', $description)
							->bind('details', $details)
							->bind('images', $images);
								
 }
	

	
	public function action_cappearance() {
      $user = Auth::instance()->get_user();
	   if (!$user)
		{
		Request::current()->redirect('user/login');
		}
	   $userid = Auth::instance()->get_user()->id;
		 
	   $rpdid=$this->request->param('id');
	  
		
		$query = DB::select()->from('rp_referralprog_details')
		         ->where('referralProgDetailsID', '=', $rpdid)
				 ->execute()
				 ->as_array();
		 $id=$query[0]['referralProgID'];
		 
	
	
	    /***********required details**************/
		
		$images =DB::select()->from('rp_referralprog_images')
		              ->where('referralProgID','=', $id)
					  ->order_by('referralProgImage', 'DESC')
                      ->execute()
					  ->as_array();
		//print_r($images);
					  
		$description =DB::select()->from('rp_referralprog_details')
					  ->order_by('referralProgDetailsID', 'DESC')
					  ->limit(1)
                      ->execute();
		$details =DB::select()->from('rp_referralprogs')
					  ->order_by('refProgID', 'DESC')
					  ->limit(1)
                      ->execute();
		
        
		
		
        $view = View::factory('customer/cappearance');
        $error_message = NULL;
        $filename = NULL;
		
		
		
		$detail =DB::select()->from('rp_referralprog_details')
                      ->where('referralProgDetailsID','=', $rpdid)
                      ->execute();	
			
	    $this->template->content = $view
		                    ->set('rpdid', $rpdid)
		                    ->bind('description', $description)
							->bind('details', $details)
							->bind('images', $images)
							->bind('detail', $detail);
							

		$data=$this->request->post();
		//print_r($data);
		//die();
 
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['avatar']))
            {
                $filename = $this->_save_image($_FILES['avatar']);
            }
        }
		
		/***************filename insert***********/
		if ($this->request->method() == Request::POST)
        {
		 $query=DB::insert('rp_referralprog_images', array('referralProgID','referralProgImage','referralProgImageOrder'))
		 
		 ->values(array( $id, $filename, $data['so']))
		 ->execute();
		  
		 //Request::current()->redirect('customer/appearance');
		}
		
		/***************filename insert***********/
		 
        if ( ! $filename)
        {
            $error_message = 'There was a problem while uploading the image.
                Make sure it is uploaded and must be JPG/PNG/GIF file.';
        }
 
        $view->uploaded_file = $filename;
        $view->error_message = $error_message;		  
		 
		
	
	}
	
	public function action_upload()
    {
        $view = View::factory('customer/upload');
        $error_message = NULL;
        $filename = NULL;
 
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['avatar']))
            {
                $filename = $this->_save_image($_FILES['avatar']);
            }
        }
 
        if ( ! $filename)
        {
            $error_message = 'There was a problem while uploading the image.
                Make sure it is uploaded and must be JPG/PNG/GIF file.';
        }
 
        $view->uploaded_file = $filename;
        $view->error_message = $error_message;
		
		$this->template->content = $view;
        //$this->response->body($view);
    }
	
	protected function _save_image($image)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'uploads/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).'.jpg';
 
            Image::factory($file)
                ->resize(200, 200, Image::AUTO)
                ->save($directory.$filename);
 
            // Delete the temporary file
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }
	
	public function action_integration() {
	   $user = Auth::instance()->get_user();
	   if (!$user)
		{
		Request::current()->redirect('user/login');
		}
	   $userid = Auth::instance()->get_user()->id;
	   
	   $finds = DB::select('refProgID', 'refProgTypeID')->from('rp_referralprogs')
				 ->order_by('refProgID', `DESC`)
				 ->limit(1)
				 ->execute()
				 ->as_array();
		
	   if($finds){
		$id=$finds[0]['refProgID'];
	   }
	   else{
	    Request::current()->redirect('customer/start');
	   }
	   
	   $wid= $id;
	   //print_r($id);
		
	   $data=$this->request->post();
	 
	   if (HTTP_Request::POST == $this->request->method()){
		  
		 $query = DB::update('rp_referralprogs')
		         ->set(array('refProgUniqueKeyID'=> $data['ukey']))
		          ->where('refProgID', '=', $id)
				  ->execute();
				  
		   //Request::current()->redirect('customer/emails');
		 
		 }
	   
       $this->template->content = View::factory('customer/integration')
	                             ->bind('wid', $wid);
	   
	}
	
	public function action_cintegration() {
	   $user = Auth::instance()->get_user();
	   if (!$user)
		{
		Request::current()->redirect('user/login');
		}
	   $userid = Auth::instance()->get_user()->id;
		 
	   $rpdid=$this->request->param('id');
       //print_r($rpdid);
	   $details =DB::select()->from('rp_referralprog_details')
                      ->where('referralProgDetailsID','=', $rpdid)
                      ->execute()
					  ->as_array();	
					  
		 $temp=$details[0]['referralProgID'];
		 
		 //print_r($temp);
		 
		 $query1 = DB::select()->from('rp_referralprogs')
		         ->where('refProgID', '=', $temp)
				 ->execute()
				 ->as_array();
		 
		 $paramid=$query1[0]['refProgTypeID'];
		 
		 $wid= $temp;
					  
	    $this->template->content = View::factory('customer/cintegration')
	                              ->set('rpdid', $rpdid)
	                              ->set('wid', $wid)
	                             ->bind('details', $details)
	                             ->bind('query1', $query1);
	}
	
	
	public function action_delete(){
	
        $user = Auth::instance()->get_user();
		if (!$user)
		 {
			Request::current()->redirect('user/login');
		 }
		 $userid = Auth::instance()->get_user()->id;

	     $rpdid=$this->request->param('id'); 

		 if ($rpdid){
		  $result = DB::select()
		           ->where('referralProgDetailsID','=', $rpdid)
		           ->from('rp_referralprog_details')
				   ->execute()
				   ->as_array();

		  $id= $result[0]['referralProgID'];
		
		  $query1= DB::delete('rp_referralprog_details')->where('referralProgDetailsID','=',$rpdid)->execute();
		  $query2= DB::delete('rp_referralprogs')->where('refProgID','=',$id)->execute();
		  $query3= DB::delete('rp_email_templates')->where('refProgID','=',$id)->execute();
		  $query4= DB::delete('rp_referralprog_images')->where('referralProgID','=',$id)->execute();
		  

		  $query5 = DB::select()->from('rp_referralprog_details')
		              ->limit(1)
					  ->order_by('referralProgDetailsID', 'DESC')
                      ->execute()
					  ->as_array();
		  //print_r($query5);
	
		  if($query5){
		   $returnid= $query5[0]['referralProgDetailsID'];
		   }
  
		   if(isset($returnid)){
		     Request::current()->redirect('customer/dashboard/'.$returnid);
		   }
		    else{
		     Request::current()->redirect('customer/start');
		   }
		   


		 }
		 else{
		  Request::current()->redirect('customer/start');
		 }

         //$this->template->content = View::factory('customer/delete');
	   
	}
	
	public function action_activation(){
	
        $user = Auth::instance()->get_user();
		if (!$user)
		 {
			Request::current()->redirect('user/login');
		 }
		 $userid = Auth::instance()->get_user()->id;

	     $rpdid=$this->request->param('id');
		 $check=$this->request->param('param');
		 if($check=='0'){
		  $status='Inactive';
		 }
		 else{
		  $status='Active';
		 } 

		 if ($rpdid){
		 
		  $temp=DB::select()->from('rp_referralprog_details')
		              ->where('referralProgDetailsID','=',$rpdid)
                      ->execute()
					  ->as_array();
		  $id=$temp[0]['referralProgID'];
		
		  $query = DB::update('rp_referralprogs')->set(array('refProgStatus'=>$status))
		          ->where('refProgID', '=', $id)
				  ->execute();
		   Request::current()->redirect('customer/dashboard/'.$rpdid);

		  }
		  else{
		   Request::current()->redirect('customer/start');
		  }

         $this->template->content = View::factory('customer/dashboard');
	   
	}
	
	
	
	public function action_refproglist() {

		$user = Auth::instance()->get_user();
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
	      Request::current()->redirect('user/login');
		}
		
		$userid = Auth::instance()->get_user()->id;
		//print_r($userid);

         $referralprogs =DB::select()->from('rp_referralprogs')
                      ->where('customerID','=', $userid)
                      ->execute();
           //print_r($referralprogs);

    
	  $this->template->content = View::factory('customer/refprogindex')
			                   ->bind('referralprogs', $referralprogs);
         
    }
     
	
	// edit the article
    public function action_refprogedit() {
	    $user = Auth::instance()->get_user();
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
		$data=$this->request->post();
		//print_r($data);
		$userid = Auth::instance()->get_user()->id;

		$refprogid = $this->request->param('id');
		//print_r($refprogid);
		
        if (HTTP_Request::POST == $this->request->method()){
		
		  $query = DB::update('rp_referralprogs')
		                                    ->set(array('startTime'=>$data['startTime'], 'endTime'=>$data['endTime'],'minReferralRequired'=>$data['minReferralRequired'],'maxReferralLimit'=>$data['maxReferralLimit'], 'rewardFrequence'=>$data['rewardFrequence'], 'actionRewarded'=>$data['actionRewarded'],'rewardsPerAction'=>$data['rewardsPerAction'],'entryEmailNotification'=>$data['entryEmailNotification'], 'replyEmail'=>$data['replyEmail'],'refProgStatus'=>$data['refProgStatus'], 'refProgInstantRewardActivated'=>$data['refProgInstantRewardActivated']))
		                                    ->where('refProgID','=', '18')
											->execute();
	
		  
		 Request::current()->redirect('customer/refproglist');
		 
		}
		 
		$this->template->content = View::factory('customer/refprogedit');
			                 
    }
 
    // delete the article
    public function action_refprogdelete() {
        $user = Auth::instance()->get_user();
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
		$refprogid  = $this->request->param('id');
		//print_r($refprogid);
		
		$query = DB::delete('rp_referralprogs')
		                 ->where('refProgID','=',$refprogid)
						 ->execute();
		Request::current()->redirect('customer/refproglist');
		
    }
	
	
	public function action_dashboard() {
	    $user = Auth::instance()->get_user();
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
		$username = Auth::instance()->get_user()->username;
		//$userid = Auth::instance()->get_user()->id;

	    $rpdid=$this->request->param('id');
		
		
		$temp=DB::select()->from('rp_referralprog_details')
		              ->where('referralProgDetailsID','=',$rpdid)
                      ->execute()
					  ->as_array();
					  
		//print_r($temp);
					  
		$temp3=0;			  
		if($temp){
		$temp2=$temp[0]['referralProgID'];
		
		$temp3=DB::select()->from('rp_referralprogs')
		              ->where('refProgID','=',$temp2)
                      ->execute()
					  ->as_array();
		}
		
		if($temp3){
		$status=$temp3[0]['refProgStatus'];
		}
		
		$lists =DB::select()->from('rpusers')
                      //->where('customerID','=', $userid)
                      ->execute();
					  
		
		$details =DB::select()->from('rp_referralprog_details')
                      ->where('referralProgDetailsID','=', $rpdid)
                      ->execute();
					  
		$this->template->content = View::factory('customer/dashboard')
		                         ->set('username',$username)
								 ->set('lists', $lists)
                                 ->bind('rpdid',$rpdid)
                                 ->bind('status',$status)
                                 ->bind('temp',$temp)
                                 ->bind('details',$details);
         
	   
	}
	
	public function action_campaign() {
	    $user = Auth::instance()->get_user();
		if (!$user)
		{
			Request::current()->redirect('user/login');
		}
		$username = Auth::instance()->get_user()->username;
		
		$this->template->content = View::factory('customer/campaign')
                                  ->set('username',$username);
	   
	
	}
	
    
	 public function action_account() {

		$user = Auth::instance()->get_user();
		if (!$user)
		{
	      Request::current()->redirect('user/login');
		}
		
		$userid = Auth::instance()->get_user()->id;

	    $this->template->content = View::factory('customer/account')
		                           ->set('userid',$userid);
         
    }
	
 public function action_delete2() {
   $rpdid=$this->request->param('id');
   if($rpdid){
     $query = DB::delete('users')
	        ->where('id','=',$rpdid)
			->execute();
   
   Request::current()->redirect('user/create');
   }
   
 }

 public function action_billing() {

		$user = Auth::instance()->get_user();
		if (!$user)
		{
	      Request::current()->redirect('user/login');
		}
		
		$userid = Auth::instance()->get_user()->id;

	    $this->template->content = View::factory('customer/billing');
         
    }
	
 public function action_support() {
    $user = Auth::instance()->get_user();
		if (!$user)
		{
	      Request::current()->redirect('user/login');
		}
		
		$userid = Auth::instance()->get_user()->id;

	    $this->template->content = View::factory('customer/support');
 
 }
 	
	
}

?>