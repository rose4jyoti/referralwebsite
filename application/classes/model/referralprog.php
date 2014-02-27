<?php defined('SYSPATH') or die('No direct script access.');

class Model_Referralprog extends ORM {
  
  die();
  protected $_primary_key = 'refProgID';
	
  protected $_has_one = array(
    'details' => array(
        'model' => 'referralprogdetail',
        'foreign_key' => 'referralProgID',
    ),
   );
  
  /*
   protected $_belongs_to = array(
      'details2' => array(
          'model'  => 'referralprogdetail',
          'foreign_key' => 'refProgID'
      ),
   );
   */
   
} 
