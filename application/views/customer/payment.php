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
<div class="container-fluid">
    <div class="row" style="background-color: #fff; padding: 40px 0 30px 0">
        <div class="container">
            <div class="row">
                <?php echo Form::open() ?>

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
                                <p><?php echo "You will be redirected to the Paypal website to pre-authorize the amount safely and will then be automatically redirected to Lucky Referral." ?>.</p>

                                <div class="row-fluid">
                                    <div class="span8">
                                        <div class="control-group">
                                            <div class="control-label">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <?php echo Bootstrap::button(Bootstrap::icon("shopping-cart") . " Pay with Paypal", "payment", "setexpresscheckout", "primary", array("disabled", "class" => "btn btn-primary pull-right", "id" => $expresscheckout_id)) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (true): ?>

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
                            echo HTML::attributes(array(
                                "id" => $accordion_dodirectpayment_collapse,
                                "class" => "accordion-body collapse "))
                            ?>>
                                <div class="accordion-inner">

                                    <p><?php echo "Pay with your credit card" ?></p>

                                    <?php echo View::factory("paypal/dodirectpayment", array("dodirectpayment" => $dodirectpayment)) ?>
                                    <form class="form form-vertical">
                                        <div class="col-lg-12">
                                            <div class="control-group col-lg-6">
                                                <label>First Name</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-6">
                                                <label>Last Name</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="control-group col-lg-6">
                                                <label>Email address (business)</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-6">
                                                <label>Company / organization</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="control-group col-lg-6">
                                                <label>Office telephone</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-6">
                                                <label>Office fax</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="control-group col-lg-6">
                                                <label>Address</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-6">
                                                <label>Address 2</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="control-group col-lg-6">
                                                <label>City</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-6">
                                                <label>State / province</label>
                                                <div class="controls">
                                                    <select class="form-control"><option>options</option></select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="control-group col-lg-6">
                                                <label>Zip / postal code</label>
                                                <div class="controls">
                                                    <input class="form-control" placeholder="Enter Name" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-6">
                                                <label>Country</label>
                                                <div class="controls">
                                                    <select class="form-control"><option>options</option></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="control-group">
                                                <label></label>
                                                <div class="controls">
                                                    <button type="submit" class="btn-lg btn-success">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row-fluid">

                                        <div class="span8">
                                            <div class="control-group">
                                                <div class="control-label">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <?php echo Bootstrap::button(Bootstrap::icon("shopping-cart") . "Pay with your credit card", "payment", "dodirectpayment", "primary", array("id" => $directpayment_id, "disabled", "class" => "btn btn-primary pull-right")) ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>


                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>


<?php echo $footer; ?>
