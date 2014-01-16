<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section id="comment-ca-marche" class="row-fluid">
    <ul class="unstyled">
        <li><?php echo __('Comment ça marche?'); ?></li>
        <li class="separateur"></li>    
        <li class="un"><div class="num">1</div><?php echo HTML::anchor('auth/login', __('titre.auth.login')) ?> ou <?php echo HTML::anchor('auth/register', 'enregistrez-vous') ?> dès maintenant !</li>
        <li class="separateur"></li>    

        <li class="deux"><div class="num">2</div><?php echo __('Rejoignez un groupe ou') . ' ' . HTML::anchor('groupe/creer', 'créez-en un') ?></li>
        <li class="separateur"></li>    

        <li class="trois"><div class="num">3</div><?php echo __('Suivez attentivement les offres des marchands') ?></li>
        <li class="separateur"></li>    

        <li class="quatre"><div class="num">4</div><?php echo __('Profitez des prix réduits !') ?></li>
    </ul>
</section>