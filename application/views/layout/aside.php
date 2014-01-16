<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Form::open(Accueil::uri()); ?>

<!--Zone de recherche-->
<div class="menu recherche">

    <div class="input-append" style="margin: 5px;">
		<?php
		echo
		Form::input("recherche", Request::current()->query("recherche"), array(
			"type" => "search",
			"style" => "width: 136px;",
			"placeholder" => __('aside.search.placeholder')
		))
		?>

		<?php echo Bootstrap::button(Bootstrap::icon("search")) ?>

    </div>
</div>

<div class="menu categories">
	<?php echo View::factory("menu/categories"); ?>
</div>

<div class="menu filtres">
	<?php echo View::factory("menu/filtres"); ?>
</div>
<?php echo Form::close() ?>

<div class="text-center" style="padding-bottom: 30px">
	<?php echo HTML::image("asset/img/paypal-logo-148x148.png", array('alt' => 'Paypal Verified')); ?>
</div>