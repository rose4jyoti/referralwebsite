<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo HTML::meta(NULL, "text/html; charset=utf-8", array("http-equiv" => "Content-Type")) ?>

<title><?php echo __($title) ?></title>

<?php echo HTML::meta("description", __($description)) ?>
<?php echo HTML::meta("keywords", implode(", ", array_map("__", $keywords))) ?>
<?php echo HTML::meta("author", __($author)) ?>
<?php echo HTML::meta("viewport", "width=device-width, initial-scale=1.0") ?>

<?php echo HTML::shortcut_icon("favicon.ico", array("rel" => "shortcut icon", "type" => "image/vnd.microsoft.icon")) ?>

<?php foreach (Minify::factory("css")->minify($css) as $minified): ?>
    <?php echo HTML::style($minified) ?>
<?php endforeach; ?>

<?php foreach (Minify::factory("less")->minify($less) as $minified): ?>
    <?php echo HTML::style($minified) ?>
<?php endforeach; ?>


<?php foreach (Minify::factory("js")->minify($js) as $minified): ?>
    <?php echo HTML::script($minified) ?>
<?php endforeach; ?>

<?php // Precomputed scripts ?>
<?php echo View::factory("javascript/paysetat", NULL, TRUE) ?>
