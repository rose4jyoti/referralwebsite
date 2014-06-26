<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Customer extends Controller_Template
{

    public function before()
    {
        parent::before();

        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }

        $customername = Auth::instance()->get_user()->username;
        $userid = Auth::instance()->get_user()->id;
        View::bind_global('customername', $customername);

        $campaigns = DB::select('referralprogs.customerID', 'referralprogdetails.referralProgDetailsID', 'referralprogdetails.referralProgTitle')->from('referralprogs')->join('referralprogdetails')->on('referralprogs.refProgID', '=', 'referralprogdetails.referralProgID')
            ->where('referralprogs.customerID', '=', $userid)
            ->execute()
            ->as_array();
        View::bind_global('campaigns', $campaigns);
        //print_r($campaigns);

        // Load $sidebar into the template as a view
        // $this->template->sidebar = View::factory('template/sidebar');

    }

    public function action_index()
    {
        $user = Auth::instance()->get_user();
        // if a user is not logged in, redirect to login page
        if (!$user) {
            Request::current()->redirect('user/login');
        }

        $this->template->content = View::factory('customer/index')
            ->bind('user', $user);

    }

    // loads the new article form
    public function action_refprogcreate()
    {
        $user = Auth::instance()->get_user();
        // if a user is not logged in, redirect to login page
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        //print_r($this->request->post());
        $data = $this->request->post();
        $userid = Auth::instance()->get_user()->id;
        //print_r($userid);

        if (HTTP_Request::POST == $this->request->method()) {
            $query = DB::insert('referralprogs', array('customerID', 'startTime', 'endTime', 'minReferralRequired', 'maxReferralLimit', 'rewardFrequence', 'actionRewarded', 'rewardsPerAction', 'entryEmailNotification', 'replyEmail', 'refProgStatus', 'refProgInstantRewardActivated'))
                ->values(array($userid, $data['startTime'], $data['endTime'], $data['minReferralRequired'], $data['maxReferralLimit'], $data['rewardFrequence'], $data['actionRewarded'], $data['rewardsPerAction'], $data['entryEmailNotification'], $data['replyEmail'], $data['refProgStatus'], $data['refProgInstantRewardActivated']))
                ->execute();

            Request::current()->redirect('customer/refproglist');

        }

        $this->template->content = View::factory('customer/refprogcreate')
            ->set('article', 'ok');
    }

    public function action_emails()
    {

        $finds = DB::select('refProgID', 'refProgTypeID')->from('referralprogs')
            ->order_by('refProgID', 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();

        if ($finds) {
            $id = $finds[0]['refProgID'];
        } else {
            Request::current()->redirect('customer/start');
        }

        $programid = $finds[0]['refProgTypeID'];

        $data = $this->request->post();

        if (HTTP_Request::POST == $this->request->method()) {

            $query = DB::insert('rp_email_templates', array('refProgID', 'emailFromEmail', 'emailFromName'))
                ->values(array($id, $data['rte'], $data['fnd']))
                ->execute();

            $query1 = DB::insert('rp_email_template_details', array('emailTempID', 'emailSubject', 'emailHtml', 'type'))
                ->values(array($query[0], $data['sub1'], $data['editor1'], 'Campaign_entry'))
                ->execute();

            $query2 = DB::insert('rp_email_template_details', array('emailTempID', 'emailSubject', 'emailHtml', 'type'))
                ->values(array($query[0], $data['sub2'], $data['editor2'], 'Reward_notification'))
                ->execute();
            $query3 = DB::insert('rp_email_template_details', array('emailTempID', 'emailSubject', 'emailHtml', 'type'))
                ->values(array($query[0], $data['sub3'], $data['editor3'], 'Campaign_referral'))
                ->execute();
            $query4 = DB::insert('rp_email_template_details', array('emailTempID', 'emailSubject', 'emailHtml', 'type'))
                ->values(array($query[0], $data['sub4'], $data['editor4'], 'Reminder_email'))
                ->execute();


            Request::current()->redirect('customer/appearance');

        }

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/emails')
            ->bind('header', $header)
            ->bind('footer', $footer);

    }

    public function action_cemails()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');

        $query = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();

        $temp = $query[0]['referralProgID'];


        $query1 = DB::select()->from('rp_email_templates')
            ->where('refProgID', '=', $temp)
            ->execute()
            ->as_array();

        $query2 = DB::select()->from('rp_email_template_details')
            ->where('emailTempID', '=', $query1[0]['emailTempID'])
            ->execute()
            ->as_array();
        //print_r($query2);


        //$paramid=$query1[0]['refProgTypeID'];
        $details = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute();


        if (HTTP_Request::POST == $this->request->method()) {

            $data = $this->request->post();

            /*$options1= DB::update('referralprogdetails')->set(array('referralProgTitle'=> $data['rpt'], 'referralProgDescription'=> $data['rpd']))
                 ->where('referralProgDetailsID', '=', $rpdid)
                 ->execute();
            */


            Request::current()->redirect('customer/cappearance/' . $rpdid);

        }


        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/cemails')
            ->set('rpdid', $rpdid)
            ->bind('query', $query)
            ->bind('query1', $query1)
            ->bind('query2', $query2)
            ->bind('details', $details)
            ->bind('header', $header)
            ->bind('footer', $footer);


    }

    public function action_start()
    {

        $user = Auth::instance()->get_user();
        // if a user is not logged in, redirect to login page
        if (!$user) {
            Request::current()->redirect('user/login');
        }


        $userid = Auth::instance()->get_user()->id;

        $refproid = $this->request->param('id');

        if ($refproid) {
            $query = DB::insert('referralprogs', array('customerID', 'refProgTypeID'))

                ->values(array($userid, $refproid))
                ->execute();

            Request::current()->redirect('customer/reward');

        }

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');

        $this->template->content = View::factory('customer/start')
            ->bind('header', $header)
            ->bind('footer', $footer);

    }

    public function action_reward()
    {

        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $finds = DB::select('refProgID', 'refProgTypeID')->from('referralprogs')
            ->order_by('refProgID', 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();

        //print_r($finds);

        if ($finds) {
            $id = $finds[0]['refProgID'];
        } else {
            Request::current()->redirect('customer/start');
        }

        $programid = $finds[0]['refProgTypeID'];
        //print_r($finds);
        //die();

        $data = $this->request->post();

        if (HTTP_Request::POST == $this->request->method()) {

            /*******file uploading**************/
            if (isset($_FILES['codefile1'])) {
                $filename1 = $this->_save_sheet($_FILES['codefile1']);

            }
            if (isset($_FILES['codefile2'])) {
                $filename2 = $this->_save_sheet($_FILES['codefile2']);

            }


            $query = DB::insert('referralprogdetails', array('referralProgID', 'referralProgTitle', 'referralProgDescription'))
                ->values(array($id, $data['rpt'], $data['rpd']))
                ->execute();


            $query = DB::update('referralprogs')->set(array('startTime' => $data['start'], 'endTime' => $data['end'], 'rewardFrequence' => $data['rf'], 'minReferralRequired' => $data['mrr'], 'actionRewarded' => $data['ar']))
                ->where('refProgID', '=', $id)
                ->execute();

            Request::current()->redirect('customer/emails');

        }

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/reward')
            ->bind('paramid', $programid)
            ->bind('header', $header)
            ->bind('footer', $footer);

    }

    public function action_creward()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');

        if (HTTP_Request::POST == $this->request->method()) {

            /*******file uploading**************/
            if (isset($_FILES['codefile1'])) {
                $filename1 = $this->_save_sheet($_FILES['codefile1']);

            }
            if (isset($_FILES['codefile2'])) {
                $filename2 = $this->_save_sheet($_FILES['codefile2']);

            }


            $data = $this->request->post();
            //print_r($data);

            $options1 = DB::update('referralprogdetails')->set(array('referralProgTitle' => $data['rpt'], 'referralProgDescription' => $data['rpd']))
                ->where('referralProgDetailsID', '=', $rpdid)
                ->execute();

            Request::current()->redirect('customer/cemails/' . $rpdid);

        }


        $query = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();

        $temp = $query[0]['referralProgID'];
        //print_r($temp);


        $query1 = DB::select()->from('referralprogs')
            ->where('refProgID', '=', $temp)
            ->execute()
            ->as_array();


        $paramid = $query1[0]['refProgTypeID'];

        $details = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute();


        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');

        $this->template->content = View::factory('customer/creward')
            ->set('paramid', $paramid)
            ->bind('rpdid', $rpdid)
            ->bind('query', $query)
            ->bind('query1', $query1)
            ->bind('details', $details)
            ->bind('header', $header)
            ->bind('footer', $footer);


    }


    public function action_appearance()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $finds = DB::select('refProgID', 'refProgTypeID')->from('referralprogs')
            ->order_by('refProgID', 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();

        //print_r($finds);


        if ($finds) {
            $id = $finds[0]['refProgID'];
        } else {
            Request::current()->redirect('customer/start');
        }

        $programid = $finds[0]['refProgTypeID'];

        /***********required details**************/

        $description = DB::select()->from('referralprogdetails')
            ->order_by('referralProgDetailsID', 'DESC')
            ->limit(1)
            ->execute();
        $details = DB::select()->from('referralprogs')
            ->order_by('refProgID', 'DESC')
            ->limit(1)
            ->execute();


        $data = $this->request->post();

        $filename = NULL;
        if ($this->request->method() == Request::POST) {
            if (isset($_FILES['avatar'])) {
                $filename = $this->_save_image($_FILES['avatar']);

                //print_r( $filename);

            }
        }


        /***************filename insert***********/
        if ($this->request->method() == Request::POST) {
            $query = DB::insert('rp_referralprog_images', array('referralProgID', 'referralProgImage', 'referralProgImageOrder'))

                ->values(array($id, $filename, $data['so']))
                ->execute();

            //Request::current()->redirect('customer/appearance');
        }

        if (!$filename) {
            $error_message = 'There was a problem while uploading the image.
                Make sure it is uploaded and must be JPG/PNG/GIF file.';
        }

        $images = DB::select()->from('rp_referralprog_images')
            ->where('referralProgID', '=', $id)
            ->order_by('referralProgImageID', 'ASC')
            ->execute()
            ->as_array();

        //print_r(images);					  

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');

        $this->template->content = View::factory('customer/appearance')
            ->bind('description', $description)
            ->bind('details', $details)
            ->bind('images', $images)
            ->bind('header', $header)
            ->bind('footer', $footer);

    }


    public function action_cappearance()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');


        $query = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();
        $id = $query[0]['referralProgID'];


        /***********required details**************/

        $description = DB::select()->from('referralprogdetails')
            ->order_by('referralProgDetailsID', 'DESC')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->limit(1)
            ->execute();

        $details = DB::select()->from('referralprogs')
            ->order_by('refProgID', 'DESC')
            ->limit(1)
            ->execute();

        $view = View::factory('customer/cappearance');
        $error_message = NULL;
        $filename = NULL;

        $detail = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute();


        $data = $this->request->post();

        if ($this->request->method() == Request::POST) {
            if (isset($_FILES['avatar'])) {
                $filename = $this->_save_image($_FILES['avatar']);
            }
        }

        /***************filename insert***********/
        if ($this->request->method() == Request::POST) {
            $query = DB::insert('rp_referralprog_images', array('referralProgID', 'referralProgImage', 'referralProgImageOrder'))
                ->values(array($id, $filename, $data['so']))
                ->execute();

            //Request::current()->redirect('customer/appearance');
        }

        /***************end filename insert***********/

        $images = DB::select()->from('rp_referralprog_images')
            ->where('referralProgID', '=', $id)
            ->order_by('referralProgImageID', 'ASC')
            ->execute()
            ->as_array();
        //print_r($images);
        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = $view
            ->set('rpdid', $rpdid)
            ->bind('description', $description)
            ->bind('details', $details)
            ->bind('images', $images)
            ->bind('detail', $detail)
            ->bind('header', $header)
            ->bind('footer', $footer);;


    }

    public function action_upload()
    {
        $view = View::factory('customer/upload');
        $error_message = NULL;
        $filename = NULL;

        if ($this->request->method() == Request::POST) {
            if (isset($_FILES['avatar'])) {
                $filename = $this->_save_image($_FILES['avatar']);
            }
        }

        if (!$filename) {
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
            !Upload::valid($image) OR
            !Upload::not_empty($image) OR
            !Upload::type($image, array('jpg', 'jpeg', 'png', 'gif'))
        ) {
            return FALSE;
        }

        $directory = DOCROOT . 'uploads/';

        if ($file = Upload::save($image, NULL, $directory)) {
            $filename = strtolower(Text::random('alnum', 20)) . '.jpg';

            Image::factory($file)
                ->resize(200, 200, Image::AUTO)
                ->save($directory . $filename);

            // Delete the temporary file
            unlink($file);

            return $filename;
        }

        return FALSE;
    }


    protected function _save_sheet($image)
    {
        if (
            !Upload::valid($image) OR
            !Upload::not_empty($image) OR
            !Upload::type($image, array('jpg', 'jpeg', 'png', 'gif', 'xlsx', 'xls'))
        ) {
            return FALSE;
        }

        $directory = DOCROOT . 'uploads/couponsheets';

        if ($file = Upload::save($image, NULL, $directory)) {
            echo $filename = strtolower(Text::random('alnum', 20)) . '.jpg';


            /*Image::factory($file)
                ->resize(200, 200, Image::AUTO)
                ->save($directory.$filename);
            */
            // Delete the temporary file
            //unlink($file);

            //die('here');
            return $filename;
        }

        return FALSE;
    }


    public function action_integration()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $finds = DB::select('refProgID', 'refProgTypeID')->from('referralprogs')
            ->order_by('refProgID', 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();

        if ($finds) {
            $id = $finds[0]['refProgID'];
        } else {
            Request::current()->redirect('customer/start');
        }

        $wid = $id;
        //print_r($id);


        $ukey = uniqid();
        $query = DB::update('referralprogs')
            ->set(array('refProgUniqueKeyID' => $ukey))
            ->where('refProgID', '=', $id)
            ->execute();

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/integration')
            ->bind('wid', $wid)
            ->bind('ukey', $ukey)
            ->bind('header', $header)
            ->bind('footer', $footer);

    }

    public function action_cintegration()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');

        $details = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();
        $temp = $details[0]['referralProgID'];

        $query1 = DB::select()->from('referralprogs')
            ->where('refProgID', '=', $temp)
            ->execute()
            ->as_array();
        //print_r($query1);
        $paramid = $query1[0]['refProgTypeID'];

        $wid = $temp;

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/cintegration')
            ->set('rpdid', $rpdid)
            ->set('wid', $wid)
            ->bind('details', $details)
            ->bind('query1', $query1)
            ->bind('header', $header)
            ->bind('footer', $footer);
    }


    public function action_delete()
    {

        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');

        if ($rpdid) {
            $result = DB::select()
                ->where('referralProgDetailsID', '=', $rpdid)
                ->from('referralprogdetails')
                ->execute()
                ->as_array();

            $id = $result[0]['referralProgID'];

            $query1 = DB::delete('referralprogdetails')->where('referralProgDetailsID', '=', $rpdid)->execute();
            $query2 = DB::delete('referralprogs')->where('refProgID', '=', $id)->execute();
            $query3 = DB::delete('rp_email_templates')->where('refProgID', '=', $id)->execute();
            $query4 = DB::delete('rp_referralprog_images')->where('referralProgID', '=', $id)->execute();

            /*
            $query5 = DB::select()->from('referralprogdetails')
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
             */
            Request::current()->redirect('customer/campaign');


        } else {
            Request::current()->redirect('customer/start');
        }

        //$this->template->content = View::factory('customer/delete');

    }

    public function action_activation()
    {

        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');
        $check = $this->request->param('param');
        if ($check == '0') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }

        if ($rpdid) {

            $temp = DB::select()->from('referralprogdetails')
                ->where('referralProgDetailsID', '=', $rpdid)
                ->execute()
                ->as_array();
            $id = $temp[0]['referralProgID'];

            $query = DB::update('referralprogs')->set(array('refProgStatus' => $status))
                ->where('refProgID', '=', $id)
                ->execute();
            Request::current()->redirect('customer/dashboard/' . $rpdid);

        } else {
            Request::current()->redirect('customer/start');
        }

        $this->template->content = View::factory('customer/dashboard');

    }


    public function action_refproglist()
    {

        $user = Auth::instance()->get_user();
        // if a user is not logged in, redirect to login page
        if (!$user) {
            Request::current()->redirect('user/login');
        }

        $userid = Auth::instance()->get_user()->id;
        //print_r($userid);

        $referralprogs = DB::select()->from('referralprogs')
            ->where('customerID', '=', $userid)
            ->execute();
        //print_r($referralprogs);


        $this->template->content = View::factory('customer/refprogindex')
            ->bind('referralprogs', $referralprogs);

    }


    // edit the article
    public function action_refprogedit()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $data = $this->request->post();
        //print_r($data);
        $userid = Auth::instance()->get_user()->id;

        $refprogid = $this->request->param('id');
        //print_r($refprogid);

        if (HTTP_Request::POST == $this->request->method()) {

            $query = DB::update('referralprogs')
                ->set(array('startTime' => $data['startTime'], 'endTime' => $data['endTime'], 'minReferralRequired' => $data['minReferralRequired'], 'maxReferralLimit' => $data['maxReferralLimit'], 'rewardFrequence' => $data['rewardFrequence'], 'actionRewarded' => $data['actionRewarded'], 'rewardsPerAction' => $data['rewardsPerAction'], 'entryEmailNotification' => $data['entryEmailNotification'], 'replyEmail' => $data['replyEmail'], 'refProgStatus' => $data['refProgStatus'], 'refProgInstantRewardActivated' => $data['refProgInstantRewardActivated']))
                ->where('refProgID', '=', '18')
                ->execute();


            Request::current()->redirect('customer/refproglist');

        }

        $this->template->content = View::factory('customer/refprogedit');

    }

    // delete the article
    public function action_refprogdelete()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $refprogid = $this->request->param('id');
        //print_r($refprogid);

        $query = DB::delete('referralprogs')
            ->where('refProgID', '=', $refprogid)
            ->execute();
        Request::current()->redirect('customer/refproglist');

    }


    public function action_dashboard()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $username = Auth::instance()->get_user()->username;
        $userid = Auth::instance()->get_user()->id;

        $rpdid = $this->request->param('id');

        /*******required details********/

        /********Draw charts**********/

        $details = DB::select('referralprogs.customerID', 'referralprogdetails.referralProgDetailsID', 'referralprogdetails.referralProgTitle', 'referralprogs.refProgID', 'referralprogs.no_impressions', 'referralprogs.no_clicks')
            ->from('referralprogs')
            ->join('referralprogdetails')
            ->on('referralprogs.refProgID', '=', 'referralprogdetails.referralProgID')
            ->where('referralprogs.customerID', '=', $userid)
            ->where('referralprogdetails.referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();


        $dataresult1 = "['Campaign', 'Shares'],";
        foreach ($details as $key => $temp) {
            $campaignname = substr($details[$key]['referralProgTitle'], 0, 10) . "..";

            $temp = $details[$key]['refProgID'];
            $option = DB::select(array('COUNT("campaign_id")', 'total_share'))->from('rp_users_referrals')
                ->where('campaign_id', '=', $temp)
                ->execute()
                ->as_array();

            $dataresult1 .= "[" . "'" . $campaignname . "'" . "," . $option['0']['total_share'] . "]" . ",";
        }
        $dataresult2 = "['Campaign', 'Clicks'],";
        foreach ($details as $key => $temp) {
            $campaignname = substr($details[$key]['referralProgTitle'], 0, 10) . "..";
            $no_clicks = $details[$key]['no_clicks'];
            $dataresult2 .= "[" . "'" . $campaignname . "'" . "," . $no_clicks . "]" . ",";
        }


        $temp = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();

        //print_r($temp);

        $temp3 = 0;
        if ($temp) {
            $temp2 = $temp[0]['referralProgID'];


            $temp3 = DB::select()->from('referralprogs')
                ->where('refProgID', '=', $temp2)
                ->execute()
                ->as_array();
        }

        if ($temp3) {
            $status = $temp3[0]['refProgStatus'];
            $no_impressions = $temp3[0]['no_impressions'];
            $no_clicks = $temp3[0]['no_clicks'];
        }


        //////////liost of participants/////////

        $list1 = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->order_by('referralProgDetailsID', 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();
        $list2 = $list1[0]['referralProgID'];

        $lists = DB::select()->from('rpusers')
            ->where('userReferralID', '=', $list2)
            ->execute()
            ->as_array();
        //print_r($lists);
        $listsn = array();

        $count = count($lists);
        for ($i = 0; $i < $count; $i++) {

            $temp = $lists[$i]['userID'];
            $email_sent = DB::select(array('COUNT("referredByUserID")', 'total_participants'))
                ->from('rp_users_referrals')
                ->where('referredByUserID', '=', $temp)
                ->execute()
                ->as_array();
            $email_sent = $email_sent[0]['total_participants'];

            $subscribers = DB::select(array('COUNT("userID")', 'total_subscribers'))
                ->from('rpusers')
                ->where('referbyid', '=', $temp)
                ->where('userReferralID', '=', $temp2)
                ->execute()
                ->as_array();
            $subscribers = $subscribers[0]['total_subscribers'];
            // print_r($email_sent);

            $listsn[$i]['userID'] = $lists[$i]['userID'];
            $listsn[$i]['userName'] = $lists[$i]['userName'];
            $listsn[$i]['userEmail'] = $lists[$i]['userEmail'];
            $listsn[$i]['userRegistredDate'] = $lists[$i]['userRegistredDate'];
            $listsn[$i]['email_sent'] = $email_sent;
            $listsn[$i]['subscribed'] = $subscribers;
        }

        //print_r($listsn);


        $temp = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute()
            ->as_array();
        $tempid = $temp['0']['referralProgID'];

        $participants = DB::select()->from('rpusers')
            ->where('userReferralID', '=', $tempid)
            ->execute()
            ->as_array();
        //print_r($participants);
        if ($participants) {
            $participants = count($participants);
            $referrals = DB::select()->from('rp_users_referrals')
                ->where('campaign_id', '=', $tempid)
                ->execute()
                ->as_array();
            //print_r($participants);
            $referrals = count($referrals);

        } else {
            $participants = 0;
            $referrals = 0;
        }


        $details = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->execute();

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');


        $this->template->content = View::factory('customer/dashboard')
            ->set('header', $header)
            ->set('footer', $footer)
            ->set('lists', $lists)
            ->bind('listsn', $listsn)
            ->set('dataresult1', $dataresult1)
            ->set('dataresult2', $dataresult2)
            ->bind('rpdid', $rpdid)
            ->bind('status', $status)
            ->bind('no_impressions', $no_impressions)
            ->bind('no_clicks', $no_clicks)
            ->bind('participants', $participants)
            ->bind('referrals', $referrals)
            ->bind('temp', $temp)
            ->bind('details', $details);


    }


    public function action_campaign()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;
        $username = Auth::instance()->get_user()->username;


        //$progs = ORM::factory('referralprog')
        //->find_all();
        //$progs=ORM::factory('referralprog', 100)->find;
        //$details= $progs->referralprogdetail->find_all();

        /**Total No. of impressions, participants, shares and clicks**/
        $numbers = DB::select(array('SUM("no_impressions")', 'total_impressions'), array('SUM("no_clicks")', 'total_clicks'))
            ->from('referralprogs')
            ->where('customerID', '=', $userid)
            ->execute()
            ->as_array();

        // print_r($numbers);


        $n_of_participants = DB::select(array('COUNT("userEmail")', 'total_participants'))
            ->from('rpusers')
            //->where('userReferralID','=', $userid)
            ->execute()
            ->as_array();

        $n_of_shares = DB::select(array('COUNT("referredEmail")', 'total_shares'))
            ->from('rp_users_referrals')
            //->where('userReferralID','=', $userid)
            ->execute()
            ->as_array();
        //print_r($n_of_participants);

        /********Draw charts**********/

        $details = DB::select('referralprogs.customerID', 'referralprogdetails.referralProgDetailsID', 'referralprogdetails.referralProgTitle', 'referralprogs.refProgID', 'referralprogs.no_impressions', 'referralprogs.no_clicks')
            ->from('referralprogs')
            ->join('referralprogdetails')
            ->on('referralprogs.refProgID', '=', 'referralprogdetails.referralProgID')
            ->where('referralprogs.customerID', '=', $userid)
            ->limit(5)
            ->order_by('referralprogs.refProgID', 'DESC')
            ->execute()
            ->as_array();


        //print_r($details);


        $dataresult1 = "['Campaign', 'Impressions'],";
        foreach ($details as $key => $temp) {
            $campaignname = substr($details[$key]['referralProgTitle'], 0, 10) . "..";
            $no_impressions = $details[$key]['no_impressions'];
            $dataresult1 .= "[" . "'" . $campaignname . "'" . "," . $no_impressions . "]" . ",";
        }

        $dataresult2 = "['Campaign', 'Shares'],";
        foreach ($details as $key => $temp) {
            $campaignname = substr($details[$key]['referralProgTitle'], 0, 10) . "..";

            $temp = $details[$key]['refProgID'];
            $option = DB::select(array('COUNT("campaign_id")', 'total_share'))->from('rp_users_referrals')
                ->where('campaign_id', '=', $temp)
                ->execute()
                ->as_array();


            $dataresult2 .= "[" . "'" . $campaignname . "'" . "," . $option['0']['total_share'] . "]" . ",";
        }

        $dataresult3 = "['Campaign', 'Participant'],";
        foreach ($details as $key => $temp) {
            $campaignname = substr($details[$key]['referralProgTitle'], 0, 10) . "..";

            $temp = $details[$key]['refProgID'];
            $option = DB::select(array('COUNT("userReferralID")', 'total_participant'))->from('rpusers')
                ->where('userReferralID', '=', $temp)
                ->execute()
                ->as_array();

            $dataresult3 .= "[" . "'" . $campaignname . "'" . "," . $option['0']['total_participant'] . "]" . ",";
        }
        $dataresult4 = "['Campaign', 'Clicks'],";
        foreach ($details as $key => $temp) {
            $campaignname = substr($details[$key]['referralProgTitle'], 0, 10) . "..";
            $no_clicks = $details[$key]['no_clicks'];
            $dataresult4 .= "[" . "'" . $campaignname . "'" . "," . $no_clicks . "]" . ",";
        }


        $header = View::factory('customer/header');
        $this->template->content = View::factory('customer/campaign')
            ->set('header', $header)
            ->set('username', $username)
            ->set('dataresult1', $dataresult1)
            ->set('dataresult2', $dataresult2)
            ->set('dataresult3', $dataresult3)
            ->set('dataresult4', $dataresult4)
            ->set('numbers', $numbers)
            ->set('n_of_participants', $n_of_participants)
            ->set('n_of_shares', $n_of_shares);


    }


    public function action_account()
    {
        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;
        ////////////////////////////////////////////
        $data = $this->request->post();
        //print_r($data);
        if (HTTP_Request::POST == $this->request->method()) {

            if ($data['formid'] == '1') {
                $query = DB::update('users')
                    ->set(array('customerName' => $data['customerName'], 'customerAddress1' => $data['customerAddress1'], 'customerAddress2' => $data['customerAddress2'], 'customerCity' => $data['customerCity'], 'customerStateProvID' => $data['customerStateProvID'], 'customerCountryID' => $data['customerCountryID'], 'customerPhone' => $data['customerPhone'], 'customerWebsite' => $data['customerWebsite'], 'customerCFirstName' => $data['customerCFirstName'], 'customerCLastName' => $data['customerCLastName']))
                    ->where('id', '=', $userid)
                    ->execute();
            }
            if ($data['formid'] == '2') {
                if ($data['password'] == $data['password_confirm']) {
                    if ((strlen($data['currentpass']) > 7) && (strlen($data['password']) > 7) && (strlen($data['password_confirm']) > 7)) {

                        $user = ORM::factory('user')
                            ->where('id', '=', $userid)
                            ->find()
                            ->update_user($this->request->post(), array('username', 'password',
                            ));

                        $message = 'Password chaged successfully !';
                    } else {
                        $message = 'password must be at least 8 characters long!';
                    }


                } else {
                    $message = 'New Password & confirm Password does not match!';
                }
                //print_r('here you are !');
                //print_r(Auth::instance()->get_user()->password);


            }


        }

        $options = DB::select()->from('users')
            ->where('id', '=', $userid)
            ->execute()
            ->as_array();

        $temp = $options[0]['id'];

        ////////////////////////////////////////////
        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/account')
            ->set('userid', $userid)
            ->bind('options', $options)
            ->bind('data', $data)
            ->bind('message', $message)
            ->bind('header', $header)
            ->bind('footer', $footer);

    }

    public function action_delete2()
    {
        $rpdid = $this->request->param('id');
        if ($rpdid) {
            $query = DB::delete('users')
                ->where('id', '=', $rpdid)
                ->execute();

            Request::current()->redirect('user/create');
        }

    }


    public function action_billing()
    {

        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }

        $userid = Auth::instance()->get_user()->id;

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');

        $this->template->content = View::factory('customer/billing')
            ->bind('header', $header)
            ->bind('footer', $footer);

        $this->template->content->packages = ORM::factory('package')
            ->order_by('amount')
            ->find_all();
    }

    public function action_payment()
    {

        $user = Auth::instance()->get_user();
        if (!$user) {
            Request::current()->redirect('user/login');
        }

        $userid = Auth::instance()->get_user()->id;
        // On préremplit le dodirectpayment
        $dodirectpayment = "";




        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');

        $this->template->content = View::factory('customer/payment', array("dodirectpayment" => $dodirectpayment))
            ->bind('header', $header)
            ->bind('footer', $footer);

    }

    /**
     * /customer/billingagreement/
     */
    public function action_billingagreement()
    {

        $package = ORM::factory('package', $this->request->post('package'));
        $billing_agreement_desc = $package->name. ' package ('.$package->description. ').';
        echo $billing_agreement_desc;

        $billing_agreement = PayPal::factory('SetExpressCheckout')
            ->query('CANCELURL', URL::site('customer/billingagreement', 'https'))
            ->query('RETURNURL', URL::site('customer/billing.php', 'https'));

        $billing_agreement
            ->query('NOSHIPPING', '1')
            ->query('ALLOWNOTE', '0')
            ->query('LOCALECODE', 'CA')
            ->query('HDRIMG', Html::image('public/image/Logo.png'));

        $billing_agreement
            ->query('PAYMENTREQUEST_0_AMT', PayPal::number_format(Tax::factory()->calculate($package->amount)));

        $billing_agreement
            ->query('L_BILLINGTYPE0', 'RecurringPayments')
            ->query('L_BILLINGAGREEMENTDESCRIPTION0', $billing_agreement_desc );

        $response = $billing_agreement->execute();

        $validation = PayPal_SetExpressCheckout::get_response_validation($response);

        if (!$validation->check()) {
            //echo PayPal::parse_response($response);
            var_dump($validation->errors('models'));
        }else{
            Request::current()->redirect('customer/billing');
        }
    }

    public function action_support()
    {
        $user = Auth::instance()->get_user();

        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;
        $username = Auth::instance()->get_user()->username;

        if ($this->request->method() == Request::POST) {
            $data = $this->request->post();

            $From = $data['email'];
            $To = 'info@luckyreferral.com';
            $Subject = $data['title'];

            $message = "";
            $message .= "<table style=''>";
            $message .= "<tr><td>Name:</td><td>" . $data['name'] . "</td></tr>";
            $message .= "<tr><td>Message:</td><td>" . $data['message'] . "</td></tr>";
            $message .= "</table>";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= "From:" . $From . "\r\n";
            mail($To, $Subject, $message, $headers);

            /*
            $query=DB::insert('supports', array('user_id','title','message'))
           ->values(array( $userid,$data['title'],$data['message']))
           ->execute();
            */
        }

        $header = View::factory('customer/header');
        $footer = View::factory('customer/footer');
        $this->template->content = View::factory('customer/support')
            ->bind('header', $header)
            ->bind('footer', $footer);

    }


    public function action_export()
    {
        $user = Auth::instance()->get_user();

        if (!$user) {
            Request::current()->redirect('user/login');
        }
        $userid = Auth::instance()->get_user()->id;
        $rpdid = $this->request->param('id');


///////////////////////////////////////

//Placing columns names in first row

        $csv_output = "";
        $delim = ',';

        $csv_output .= "Name" . $delim;
        $csv_output .= "Email" . $delim;
        $csv_output .= "Subscribe date" . $delim;
        $csv_output .= "Emails sent" . $delim;
        $csv_output .= "Contacts subscribed" . $delim;
        $csv_output .= "Total Rewards" . $delim;
        $csv_output .= "\n";

        $csv_output .= $delim;
        $csv_output .= $delim;
        $csv_output .= $delim;
        $csv_output .= $delim;
        $csv_output .= $delim;
        $csv_output .= "\n";
//End Placing columns in first row


///////////finding data from house///////////////////
        $data1 = DB::select()->from('referralprogdetails')
            ->where('referralProgDetailsID', '=', $rpdid)
            ->order_by('referralProgDetailsID', 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();
        $temp = $data1[0]['referralProgID'];
        $data2 = DB::select()
            ->from('rpusers')
            ->where('userReferralID', '=', $temp)
            ->order_by('userID', 'DESC')
            ->execute()
            ->as_array();


        foreach ($data2 as $temp) :

            $CSV_SEPARATOR = ",";
            $CSV_NEWLINE = "\r\n";

            $csv_output .= $temp['userName'] . $delim;
            $csv_output .= $temp['userEmail'] . $delim;
            $csv_output .= substr($temp['userRegistredDate'], 0, 10) . $delim;

            $temp = $temp['userID'];
            $email_sent = DB::select(array('COUNT("referredByUserID")', 'total_participants'))
                ->from('rp_users_referrals')
                ->where('referredByUserID', '=', $temp)
                ->execute()
                ->as_array();
            $email_sent = $email_sent[0]['total_participants'];


            $csv_output .= $email_sent . $delim;
            $csv_output .= '---' . $delim;
            $csv_output .= '0' . $delim;
            $csv_output .= "\n";

        endforeach;
        ////////////////////////////


        $csv_output .= " ";

        $csv_output .= "\n";

// while loop main first
        header("Content-Type: application/force-download\n");
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: public");
        header("Content-Disposition: attachment; filename=participantlistexports_" . date("Ymd") . ".csv");
        print $csv_output;
        exit;

/////////////////////////////////////////////////////	  

        Request::current()->redirect('customer/dashboard');

    }


}

?>