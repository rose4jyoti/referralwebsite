<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="blue-border-header hidden-phone">

    <div class="container">
        <div class="row">

            <?php if (Auth::instance()->logged_in()): ?>

                <?php foreach (Auth::instance()->get_user()->roles->find_all() as $role): ?>
                    <?php echo View::factory("component/role", array("role" => $role)); ?> |
                <?php endforeach; ?>

                <?php echo HTML::anchor("compte", Auth::instance()->get_user()->nom_complet(), array('style' => 'color: rgb(86, 191, 245)')) ?> |
            <?php endif; ?>

            <?php if (Auth::instance()->logged_in('admin')) : ?>
                <?php echo HTML::anchor("admin", "Administration") ?> | 
            <?php endif; ?>

            <?php if (Auth::instance()->logged_in()): ?>

                <?php echo HTML::anchor("auth/logout", __("layout.topheader.deconnexion")) ?>
            <?php else: ?>
                <?php echo HTML::anchor("auth/login", __("layout.topheader.connexion")) ?>

            <?php endif; ?>

			
            <?php
            // MENU DE LANGUE ICI
             //$lang = I18n::lang() === 'en' ? 'fr' : 'en';
             //$title = I18n::lang() === 'en' ? 'Français' : 'English';
             //$uri = Urlang::instance()->untranslate(Request::current()->uri());
             //echo HTML::anchor($uri, $title, NULL, NULL, TRUE, $lang);
            ?>
        </div><!--/#droits-dauteur-->
    </div>
</div>

<div class="blue-border-header-phone visible-phone">

    <div class="container">
        <div class="row">

            <?php if (Auth::instance()->logged_in()): ?>

                <?php foreach (Auth::instance()->get_user()->roles->find_all() as $role): ?>
                    <?php echo View::factory("component/role", array("role" => $role)); ?> |
                <?php endforeach; ?>

                <?php echo HTML::anchor("compte", Auth::instance()->get_user()->nom_complet(), array('style' => 'color: rgb(86, 191, 245)')) ?> |
            <?php endif; ?>

            <?php if (Auth::instance()->logged_in('admin')) : ?>
                <?php echo HTML::anchor("admin", "Administration") ?> | 
            <?php endif; ?>

            <?php if (Auth::instance()->logged_in()): ?>

                <?php echo HTML::anchor("auth/logout", "Déconnexion") ?>
            <?php else: ?>
                <?php echo HTML::anchor("auth/login", "Connexion") ?>

            <?php endif; ?>

            <?php
            // $lang = I18n::lang() === 'en' ? 'fr' : 'en';
            // $title = I18n::lang() === 'en' ? 'Français' : 'English';
            // $uri = Urlang::instance()->untranslate(Request::current()->uri());
            // echo HTML::anchor($uri, $title, NULL, NULL, TRUE, $lang);
            ?>
        </div><!--/#droits-dauteur-->
    </div>
</div>

<div class="blue-border-header-push hidden-phone"></div>

