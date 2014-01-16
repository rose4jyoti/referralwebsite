<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * referral template controler.
 * 
 * @package Referral
 * @category Controllers
 * @author Luc Chateauvert
 * @copyright (c) 2014, Luc Chateauvert
 */
class Controller_Template_Referral extends Controller_Template {

    /**
     * Common key words to be applied to all pages
     * 
     * @var array 
     */
    private $common_keywords = array(
        'referral', 'viral marketing', 'email', 'campaign', 'customer aquisition'
    );

    /**
     * Page title
     * 
     * <title></title>
     * 
     * @var string 
     */
    protected $title = 'Referral Campaign';

    /**
     * Page Author.
     * 
     * @var string 
     */
    protected $author = 'S@RIXMarketing';

    /**
     * Description du document
     * 
     * @var string 
     */
    protected $description = 'description';

    /**
     * keywords
     * 
     * @var array 
     */
    protected $keywords = array();
    public $template = 'template/referral';

    /**
     *
     * @var View
     */
    protected $head = "layout/head";
    protected $js = array(
                'asset/js/bootstrap.js', 'asset/js/bootstrap.min.js', 'public/js/SuperSocialShare.js',
                'public/js/general.js', 'public/js/jquery.js', 'public/js/jquerytab.js'),            
            $css = array('bootstrap.css', 'bootstrap.min.css', 'bootstrap.theme.css',
                'bootstrap.theme.min.css', 'public/css/style.css'),
            $less = array();

    /**
     * Display before the content
     * @var View 
     */
    protected $menu = 'layout/empty';

    /**
     *
     * @var View 
     */
    protected $content;

    /**
     *
     * @var type 
     */
    protected $bottom_content = 'layout/empty';

    /**
     *
     * @var View 
     */
    protected $top_header = 'layout/top_header';

    /**
     *
     * @var View 
     */
    protected $header = 'layout/header';

    /**
     *
     * @var View 
     */
    protected $bottom_footer = 'layout/bottom_footer';

    /**
     *
     * @var View 
     */
    protected $footer = 'layout/footer';

    public function before() {

        parent::before();

        if ($this->content === NULL) {
            $this->content = $this->request->controller();
        }

        
        $this->head = View::factory($this->head);
        $this->top_header = View::factory($this->top_header);
        $this->header = View::factory($this->header);
        $this->menu = View::factory($this->menu);
        $this->content = View::factory($this->content);
        $this->bottom_content = View::factory($this->bottom_content);
        $this->footer = View::factory($this->footer);
        $this->bottom_footer = View::factory($this->bottom_footer);
    }

    public function action_index() {
        
    }

    public function after() {

        // Metas are global
        View::set_global("title", $this->title);
        View::set_global("description", $this->description);
        View::set_global("keywords", Arr::merge($this->common_keywords, $this->keywords));
        View::set_global("author", $this->author);

        // Files to minify
        View::set_global('css', $this->css);
        View::set_global('js', $this->js);
        View::set_global('js_after', $this->js_after);
        View::set_global('less', $this->less);

        $this->template->head = $this->head;

        $this->template->top_header = $this->top_header;

        $this->template->header = $this->header;

        $this->template->menu = $this->menu;

        $this->template->content = $this->content;

        $this->template->bottom_content = $this->bottom_content;

        $this->template->footer = $this->footer;

        $this->template->bottom_footer = $this->bottom_footer;

        parent::after();
    }

}
