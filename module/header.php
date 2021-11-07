<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>PHP Motors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="../../phpmotors/css/style.css" type="text/css">
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="to-header">
                <img src="/phpmotors/images/site/logo.png" alt="Logo">
                <?php
                if (isset($_SESSION['loggedin'])) {
                    echo "<span><a href=' /phpmotors/accounts/'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a><a href='/phpmotors/accounts/?action=Logout'>| Logout</a></span>";
                } else {
                    echo "<span><a href='/phpmotors/accounts/?action=login'>My Account</a></span>";
                }
                ?>
            </div>
        </header>