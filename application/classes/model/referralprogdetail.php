<?php defined('SYSPATH') or die('No direct script access.');

class Model_Referralprogdetail extends ORM {
 
 protected $_primary_key = 'referralProgDetailsID';
 
 protected $_belongs_to = array(
      'programs' => array(
          'model'  => 'referralprog',
          'foreign_key' =>'referralProgID', 
      ),
   );
 
 //die('stop');
} 
 