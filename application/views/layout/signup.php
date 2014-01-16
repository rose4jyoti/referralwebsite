<?php
defined('SYSPATH') or die('No direct script access.');
?>

<?php 
if (!Auth::instance()->logged_in() ): 
    ?>
    <div id="sign-up">
        <p style="margin:0;">
            <?php echo HTML::anchor("auth/login", "Connectez") ?>

        </p>
        <p style="padding-top: 25px;">
            <?php echo HTML::anchor("enregistrement", "Adhérez") ?>


        </p>
    </div>
<?php endif; ?>