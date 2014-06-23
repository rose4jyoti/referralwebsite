<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php echo Html::style('public/css/bootstrap.css'); ?>
<?php echo Html::style('public/css/scrolling-nav.css'); ?>


<?php echo $header ?>

<?
$currentTimeoutInSecs = ini_get(’session.gc_maxlifetime’);
var_dump($currentTimeoutInSecs);
?>

<!-- end: Page Title -->
<div class="container-fluid">
    <div class="row" style="background-color: #fff; padding: 40px 0 30px 0">
        <div class="container">
            <div class="row">
                <!-- start: Page Title -->
                <div class="col-md-12">
                    <h2>My current plan</h2>
                </div>
                <div class="row" style="border: 1px #d2d2d2; padding: 5px 0 5px 0">
                    <div class="col-md-3">
                        Free trial
                    </div>
                    <div class="col-md-3">
                        0 current participants
                    </div>
                    <div class="col-md-3">
                        100 participants over the 14 days.
                    </div>
                    <div class="col-md-3">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Upgrade <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Standard</a></li>
                                <li><a href="#">Premium</a></li>
                                <li><a href="#">Professional</a></li>
                                <li><a href="#">Ultimate</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- start: Page Title -->
                <div class="col-md-12">
                    <h2>My billing information</h2>
                </div>
                <div class="col-md-12" style="border: 1px #d2d2d2; padding: 5px 0 5px 0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Credit card number</th>
                            <th>Credit card type</th>
                            <th>Expiration</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Card ending in 9013</td>
                            <td>Visa </td>
                            <td>05/2015</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-info btn-lg" href="<?php echo URL::base(); ?>/user/create">Edit payment</a>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- start: Page Title -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>Billing address information</h2>
                        </div>
                    </div>
                    <div class="panel-body">
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
                    </div><!--/panel content-->
                </div><!--/panel-->

            </div>
        </div>
    </div>
</div>

<?php echo $footer; ?>




