<?php
//session_start();
//echo $_SESSION['compaingnid'];
?>

<?php
//print_r($_REQUEST);
$customerid = $_REQUEST['id'];
?>

<!----------Data fetching from database----->
<?php
$dbhost = 'localhost';
$dbuser = 'softoasi_referal';
$dbpass = ']N^fwqZ*@7X9';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
//$sql = 'SELECT * FROM rp_referralprog_images';
$sql = "SELECT * FROM rp_referralprog_images WHERE referralProgID='" . $customerid . "'  ORDER BY referralProgImageID Asc";

mysql_select_db('softoasi_referral');
$result = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($row['referralProgImageOrder'] == '1') {
        $img1 = $row['referralProgImage'];
    }
}

$sql2 = "SELECT * FROM referralprogdetails WHERE referralProgID='" . $customerid . "' ";
$result2 = mysql_query($sql2, $conn);
while ($row = mysql_fetch_array($result2, MYSQL_ASSOC)) {
    $refprogdesc = $row['referralProgDescription'];
}

/*********Referralprogs*************/
$sql3 = "SELECT * FROM referralprogs WHERE refProgID='" . $_REQUEST['id'] . "' ";
$result3 = mysql_query($sql3, $conn);
while ($row = mysql_fetch_array($result3, MYSQL_ASSOC)) {
    $progstatus = $row['refProgStatus'];
}

mysql_close($conn);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Referral contacts importer</title>
    <!---<LINK href="style.css" rel="stylesheet" type="text/css">--->

    <LINK href="style1.css" rel="stylesheet" type="text/css">
    <LINK href="page7.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        var form_ready = <?php echo (isset($this->current_class) && $this->current_class->ExternalAuth) ? "false" : "true"; ?>;

        function ImportContacts(state, contacts_option) {
            var import_form = document.getElementById("import_form");
            if (import_form) {
                if (state && ("state" in import_form)) {
                    import_form["state"].value = state;
                }

                if (contacts_option && ("contacts_option" in import_form)) {
                    import_form["contacts_option"].value = contacts_option;
                }

                import_form.submit();
            }
        }
    </script>
</head>
<body>

<div class="wrapper_out">
    <div class="wrapper_in" style="width:auto;">


        <!-------------------start contents----------------->

        <div class="block_out" style='width:auto;'>
            <div class="img1" style="margin: 0px">
                <div class="img_in">
                    <div style="padding: 0 0 0 0; min-height: 401px;" class="left">


                        <?php if (isset($img1)) { ?>

                            <img height="397px" width="344px"
                                 src="http://softoasistech.com/dev2013/referral/uploads/<?php echo $img1 ?>"
                                 alt="Uploaded avatar"/>

                        <?php } else { ?>

                            <img height="397px" width="344px"
                                 src="http://softoasistech.com/dev2013/referral/public/image/a.jpg"
                                 alt="Uploaded avatar"/>

                        <?php } ?>

                    </div>
                    <div class="right">
                        <p>
                            <b style="font-weight:bold;text-transform: capitalize;">
                                <?php //echo substr($refprogdesc, '0', '30').'..';?>
                                <?php echo $refprogdesc; ?>
                            </b>

                        </p>




                        <?php require_once $this->include_form; ?>


                        <div class="lock">
                            <img class="bbb_n" alt="" src="/dev2013/referral/public/image/lock.jpg">

                            <h1>your password will not be saved and no email message will be sent to your contacts
                                without your consent.</h1>
                        </div>

                        <h2 class="bottom_text">Read the CONTEST <b>term and conditions</b> before participating</h2>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

</div>
</div>


<!---------------------------------------------------------->


<script type="text/javascript">
    try {
        var auth_window = window.ExternalAuthentication;
    }
    catch (ignore) {
        var auth_window = undefined;
    }

    (function () {
        var external_auth = "external.php?contacts_option=<?php echo $selected_option; ?>";
        submit_form = function (form) {
            return function () {
                if (form_ready) {
                    form.submit();
                    return true;
                }
                else if (external_auth != "") {
                    if (auth_window)
                        auth_window.close();
                    auth_window = window.open(external_auth, "ExternalAuthentication", "top=200,left=200,width=500,height=400,location=yes,status=yes,resizable=yes", true);
                    auth_window.focus();
                    return false;
                }
            }
        }

        toggle_checked = function (check) {
            return function () {
                check.checked = !check.checked;
            }
        }

        cancel_propagation = function (e) {
            if (!e) {
                var e = window.event;
            }

            e.cancelBubble = true;

            if (e.stopPropagation)
                e.stopPropagation();
        }

        set_checked = function (checkboxes) {
            return function () {
                for (i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = this.checked;
                }
            }
        }

        var invite_form = document.getElementById("invite_form");
        if (invite_form) {
            var table_rows = invite_form.getElementsByTagName("tr");
            var form_contacts = [];
            for (var i = 1; i < table_rows.length; i++) {
                var input = table_rows[i].getElementsByTagName("input");
                if (!input || input[0].type != "checkbox")
                    continue;
                input[0].onclick = cancel_propagation;
                table_rows[i].onclick = toggle_checked(input[0]);
                form_contacts.push(input[0]);
            }

            var toggleAll = document.getElementById("ToggleSelectedAll");
            toggleAll.onclick = set_checked(form_contacts);
        }
        var import_form = document.getElementById("import_form");
        if (import_form) {
            import_form.onsubmit = submit_form(import_form);
        }
    })();

</script>
</body>
</html>