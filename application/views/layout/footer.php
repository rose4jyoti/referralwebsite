<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="container" style="background: #105dbb;">
    <div class="row">

        <div class="span4">
            <h3><?php echo __("footer.header.members") ?></h3>
            <ul class="unstyled">
                <li><?php echo HTML::anchor('enregistrement', __('enregistrement.titre')) ?></li>
                <li><?php echo HTML::anchor('fonctionnement', __('menu.fonctionnement')) ?></li>

            </ul>
        </div>  

		<!--        <div class="span3">
					<h3>Acheteurs</h3>
					<ul class="unstyled">
						<li><?php echo HTML::anchor('enregistrement/acheteur', 'Inscription') ?></li>
						<li><?php echo HTML::anchor('https://www.paypal.com', 'PayPal™') ?></li>
					</ul>
				</div>
		
				<div class="span3">
					<h3>Marchands</h3>
					<ul class="unstyled">
						<li><?php echo HTML::anchor('enregistrement/vendeur', 'Inscription') ?></li>
						<li><?php echo HTML::anchor('packages', 'Forfaits') ?></li>
					</ul>
				</div>
		-->

        <div class="span4">
            <h3><?php echo __("footer.header.company") ?></h3>
            <ul class="unstyled">
                <li><?php echo HTML::anchor('about', __("footer.about")) ?></li>
                <li><?php echo HTML::anchor('contact', __("footer.contact")) ?></li>   
                <li><?php echo HTML::anchor('conditions', __("conditions.titre")) ?></li>
                <li><?php echo HTML::anchor('confidentialite', __("confidentialite.titre")) ?></li>
            </ul>
        </div>

        <div class="span4">
            <h3><?php echo __("footer.header.followus") ?></h3>
            <ul class="unstyled">
                <li class="unstyled">
					<?php echo Html::anchor('https://www.facebook.com/183094165211459', Html::image('asset/image/social/facebook.png', array('alt' => "Facebook", "style" => "height: 30px; padding-right: 10px")), array('target' => '_blank')) ?>
					<?php echo Html::anchor('https://plus.google.com/108353311943826341071', Html::image('asset/image/social/googleplus.png', array('alt' => "Google+", "style" => "height: 30px; padding-right: 10px")), array('target' => '_blank')) ?>
					<?php echo HTML::anchor(Route::get('accueil')->uri(array('action' => 'rss')), HTML::image('asset/image/social/rss.png', array('alt' => "RSS", "style" => "height: 30px; padding-right: 10px")))?>
                    <!--<?php echo GooglePlus::moreone_button(array("layout" => "button_count")); ?>
					<?php echo Facebook::like(URL::site('', Host::current('protocol')), array("layout" => "button_count")) ?>
					<?php echo Twitter::share(URL::site('', Host::current('protocol')), Host::current('name')) ?>-->
                </li>
            </ul>
        </div>
    </div>       
</div>




