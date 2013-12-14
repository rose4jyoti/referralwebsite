<?php defined('SYSPATH') or die('No direct script access.');

 class Controller_Article extends Controller {
 //class Controller_Article extends Controller_Template {
  
    //public $template='template';
	
	public function action_index() {
	    
		//$user = Model::factory( 'contact' );

		$articles = ORM::factory('article')->find_all(); // loads all article object from table
         
        $view = new View('article/index'); // load 'article/index.php' view file
        $view->set("articles", $articles); // set "articles" object to view
         
        $this->response->body($view);
		//$this->template->set('content', $view); // renders a view as a response
    }
     
    // loads the new article form
    public function action_new() {
	
        $article = new Model_Article();
         
        $view = new View('article/edit');
        $view->set("article", $article);
         
        $this->response->body($view);
    }
	
	// save the article
    public function action_post() {
        $article_id = $this->request->param('id');
        $article = new Model_Article($article_id);
        $article->values($_POST); // populate $article object from $_POST array
        $article->save(); // saves article to database
         
        $this->request->redirect('index.php/article'); // redirects to article page after saving
    }
	
	// edit the article
    public function action_edit() {
        $article_id = $this->request->param('id');
        $article = new Model_Article($article_id);
 
        $view = new View('article/edit');
        $view->set("article", $article);
         
        $this->response->body($view);
    }
 
    // delete the article
    public function action_delete() {
        $article_id = $this->request->param('id');
        $article = new Model_Article($article_id);
 
        $article->delete();
        $this->request->redirect(self::INDEX_PAGE);
    }
	
	
   
}
