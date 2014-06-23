<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="container" style="background: #105dbb; padding: 30px 5px 10px 5px;">
    <div class="row">
        <div class="span2 text-center">
            <?php echo Html::image('public/image/Logo.png', array(
                'alt' => " ",
                "style" => "width: 300px; height: auto; padding-left: 15px; padding-top: 30px;"
            ));  ?>
            <?php echo HTML::anchor('home', $image) ?>
        </div>

        <noscript><?php
        echo Bootstrap::alert(__('noscript.warning', array(
            ":safari" => HTML::anchor('http://www.mozilla.org/firefox/', 'Safari'),
            ":chrome" => HTML::anchor('http://www.mozilla.org/firefox/', 'Google Chrome'),
            ":firefox" => HTML::anchor('http://www.mozilla.org/firefox/', 'Mozilla Firefox'),
            ":explorer" => HTML::anchor('http://www.mozilla.org/firefox/', 'Internet Explorer'),
                        )
                ), 'warning')
        ?></noscript>

        <!--Le menu principal-->

        <div id="menu-principal" class="navbar span7">
            <!--Le menu principal en tant que tel-->
            <div id="boutons-menu" class="navbar-inner">
                <div class="container">
                    <span class="brand hidden-desktop">Referral</span>
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php
                    $elements = array(
                        "front/home" => HTML::anchor('front/home', 'Home'),
                        "front/hiw" => HTML::anchor('front/hiw', 'How it works'),
                        "front/price" => HTML::anchor('front/price', 'Pricing'),
                        "front/blog" => HTML::anchor('front/blog', 'Blog'),
                        "user/login" => HTML::anchor('user/login', 'Sign In')
                    );

                    if (Auth::instance()->logged_in()) {
                        $elements += array(
                            "compte/index" => HTML::anchor('compte', __('menu.moncompte')),
                                //       "compte/groupes" => HTML::anchor("compte/groupes", __('menu.mesgroupes')),
                        );
                    } else {

                        $elements += array(
                            'auth/login' => HTML::anchor('auth/login', __('menu.seconnecter')),
                                //'enregistrement' => HTML::anchor('enregistrement', __('enregistrement.titre')),
                                //'packages/index' => HTML::anchor('packages', 'Forfaits'),
                        );
                    }
                    ?>

                    <div class="nav-collapse collapse">      

                        <?php echo Bootstrap::navs($elements, Request::current()->controller() . '/' . Request::current()->action(), array("class" => "nav-principal")) ?>

                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>