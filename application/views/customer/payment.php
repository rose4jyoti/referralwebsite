<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/bootstrap.css'); ?>
<?php echo Html::style('public/css/scrolling-nav.css'); ?>


<?php echo $header ?>

<?php
$paymentaction = __(isset($paymentaction) ? $paymentaction : "Pay");

$accordion_payer_id = uniqid();
$accordion_setexpresscheckout_collapse = "collapse-setexpresscheckout-" . uniqid();
$accordion_dodirectpayment_collapse = "collapse-dodirectpayment-" . uniqid();

$expresscheckout_id = uniqid();
$directpayment_id = uniqid();

$id = Security::unique_id();
?>

<!-- end: Page Title -->
<div class="container">

    <?php echo Form::open() ?>

    <div class="row" style="background-color: #fff; padding: 40px 0 30px 0">

        <div <?php echo HTML::attributes(array("id" => $accordion_payer_id, "class" => "accordion")) ?>>
            <div class="accordion-group">

                <div class="accordion-heading">

                    <?php
                    echo HTML::anchor("#$accordion_setexpresscheckout_collapse", "Pay with PayPal &copy;", array(
                        'class' => 'accordion-toggle',
                        "data-parent" => "#$accordion_payer_id",
                        'data-toggle' => 'collapse'
                    ))
                    ?>

                </div>

                <div <?php echo HTML::attributes(array("id" => $accordion_setexpresscheckout_collapse, "class" => "accordion-body collapse in")) ?>>
                    <div class="accordion-inner">
                        <?php echo Form::hidden("setexpresscheckout[]") ?>
                        <p><?php echo "You will be redirected to the Paypal website to pre-authorize the amount safely and will then be automatically redirected to Lucky Referral." ?>
                            .</p>

                            <div class="form-group text-right">
                                <?php echo Bootstrap::button(Bootstrap::icon("shopping-cart") . " Pay with Paypal", "payment", "setexpresscheckout", "primary", array("class" => "btn btn-primary pull-right", "id" => $expresscheckout_id)) ?>
                            </div>
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">

                    <?php
                    echo HTML::anchor("#$accordion_dodirectpayment_collapse", "Pay with your credit card", array(
                        'class' => 'accordion-toggle',
                        "data-parent" => "#$accordion_payer_id",
                        'data-toggle' => 'collapse'
                    ))
                    ?>

                </div>
                <div <?php
                echo HTML::attributes(array("id" => $accordion_dodirectpayment_collapse, "class" => "accordion-body")) ?>>

                    <div class="accordion-inner">

                        <p><?php echo "Pay with your credit card" ?></p>

                        <?php echo Form::open() ?>

                        <?php echo View::factory("paypal/dodirectpayment", array("dodirectpayment" => $dodirectpayment)) ?>

                        <div class="form-group text-right">
                            <?php echo Bootstrap::button(Bootstrap::icon("shopping-cart") . "Pay with your credit card", "payment", "dodirectpayment", "primary", array("class" => "btn btn-primary pull-right")) ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php echo Form::close() ?>

</div>


<?php echo $footer; ?>
