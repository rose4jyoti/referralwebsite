<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<h1>Create new article</h1>
 
<?php echo Form::open('article/post/'.$article->id); ?>
    <?php echo Form::label("title", "Title"); ?>
    <br />
    <?php echo Form::input("title", $article->title); ?>
    <br />
    <br />
    <?php echo Form::label("content", "Content"); ?>
    <br />
    <?php echo Form::textarea("content", $article->content); ?>
    <br />
    <br />
    <?php echo Form::submit("submit", "Submit"); ?>
<?php echo Form::close(); ?>