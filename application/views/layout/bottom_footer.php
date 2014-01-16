<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="blue-border-footer">
    <div class="container">
        <div class="row">
            <div class="span4"></div>
            <div class="span4 text-center"><?php echo __("footer.copyright", array(":year" => Date::formatted_time(NULL, 'Y'))) ?></div>
            <div class="span4 text-right"><?php echo __("footer.creation", array(":website" => HTML::anchor(Kohana::$config->load("config.webmaster.website"), Kohana::$config->load("config.webmaster.name")))) ?></div>
       <!--     <div class="span3"><?php echo HTML::anchor("confidentialite", __("confidentialite.titre")) ?></div>
            <div class="span3"><?php echo HTML::anchor("conditions", __("conditions.titre")) ?></div> -->
        </div><!--/#droits-dauteur-->
    </div>
</div>