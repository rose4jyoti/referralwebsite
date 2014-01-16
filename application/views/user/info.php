<div class="vik1" style=" background-color: #C2C2C2;
     border: 2px solid red;
     float: left;
     margin: 35px 25px 0 0;
     padding: 10px 0 0;
     width: 200px;">
    <h2 style="color:green;">Action</h2>
    <ul>
        <li style="list-style: square outside none;">
            <?php echo Html::anchor('user/create', 'Register'); ?>
        </li>
        <li style="list-style: square outside none;">
            <?php echo Html::anchor('user/login', 'Login'); ?>
        </li>
        <li style="list-style: square outside none;">
            <?php echo Html::anchor('customer/index', 'Profile'); ?>
        </li>
        <li style="list-style: square outside none;">
            <?php echo Html::anchor('user/logout', 'Logout'); ?>
        </li>

        <li style="list-style: square outside none;">
            <?php echo Html::anchor('customer/refprogcreate', 'Create Referal prog'); ?>
        </li>
        <li style="list-style: square outside none;">
            <?php echo Html::anchor('customer/refproglist', 'List Referal prog'); ?>
        </li>
        <li style="list-style: square outside none;">
            <?php echo Html::anchor(URL::base(), 'Invite Contacts'); ?>
        </li>

    </ul>
</div>

<div class="vik2" style="  background-color: #F7F7F7;
     border: 1px solid red;
     border-radius: 15px 0 0 0;
     float: left;
     margin: 32px 0 0;
     padding: 0 15px;">

    <h1 style="color:red;">==Profile page==</h1>
    <h3 style="color:blue;"> Welcome &nbsp; <?= $user->username; ?>!</h3>

    <table style="border: 5px solid green;">

        <tr><td>
                Username:
            </td>
            <td>
<?= $user->username; ?>
            </td></tr>
        <tr><td>
                Email:
            </td>
            <td>
<?= $user->email; ?>
            </td></tr>

        <tr><td>
                First name:
            </td>
            <td>
<?= $user->userFirstName; ?>
            </td></tr>

        <tr><td>
                Last name:
            </td>
            <td>
<?= $user->userLastName; ?>
            </td></tr>
        <tr><td>
                Phone:
            </td>
            <td>
<?= $user->userPhone; ?>
            </td></tr>

        <tr><td>
                Number of logins:
            </td>
            <td>
<?= $user->logins; ?>
            </td></tr><tr><td>
                Last Login:
            </td>
            <td>
<?= Date::fuzzy_span($user->last_login); ?>
            </td></tr>

    </table>

    <br>

<?= HTML::anchor('user/logout', 'Logout'); ?>


</div>