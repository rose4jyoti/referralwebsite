<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index() {
        $this->response->body('hello, world!');
    }
 
    public function action_another() {
        $this->response->body('added another action...');
    }
	
}
