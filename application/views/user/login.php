<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/style.css'); ?>
<?php //echo Html::style('public/css/bootstrap.css'); ?>
<?php //echo Html::style('public/css/bootstrap-theme.css'); ?>
<?php //echo Html::style('public/css/bootstrap-theme.min.css'); ?>
<?php //echo Html::style('public/css/bootstrap.min.css'); ?>

<style type="text/css">
body {
    font-size: 14px !important;
}
.btn-primary {
background-image: none !important;
background-color: #428bca !important;
}
</style>
<div class="wrapper_out">

<?php echo $header; ?>
    <div class="sign_in_wrapper">
        <div class="sign_box">

            <div class="sign_box_in">
                <div class="logo_b">

                    <?php echo Html::image('public/image/Logo.png', array('alt'=>'', 'class'=>'image', 'style'=>'padding: 10px 0 21px 40px')); ?>

                </div>


                <? if ($message) : ?>
                    <div class="row-fluid" style="float:left;">
                        <div class="alert alert" style="background:none !important; color:red !important; padding-left:45px;">
                            <?= $message; ?>
                        </div>                    
                    </div>
                <? endif; ?>

                
                    <?= Form::open('user/login', array('style'=>'float:left;width:100%;')); ?>
                    <!-- 
                    <?= Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('class' => 'main_in')); ?>
                               
                    <?= Form::password('password', '', array('class' => 'main_in')); ?>
                    -->              
                    <div class="">
                        <?php echo Form::input('username', HTML::chars(Arr::get($_POST, 'username')), array('class' => 'main_in', 'id' => 'username', 'placeholder' => 'email', 'autofocus' => 'autofocus')) ?>
                    </div>  
                    <div class="">
                        <?php echo Form::password('password', NULL, array('class' => 'main_in', 'id' => 'password', 'placeholder' => 'Password')) ?>

                        <div class="help-block text-right">                        
                            <?php echo HTML::anchor('user/recovery', 'Forgot your password?') ?>
                        </div>
                    </div>

                    <div class="text-right">
                        <?php echo Form::button("submit", "Sign In", array("class" => "btn-lg btn-primary")) ?><br/>
                    </div>
                    <div class="text-right">
                        <?php echo "Don't have an account yet ?" . HTML::anchor("user/create", "Sign up for free here!") ?>
                    </div>

                    <?= Form::close(); ?>
                

            </div>

 
        </div>

    </div>
	
<?php echo $footer; ?>	
</div>

