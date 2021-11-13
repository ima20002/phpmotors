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
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
<?php
    if ($_SESSION['loggedin'] != TRUE) {
        header('Location: ../index.php');
        // echo "Login failed";
        exit;
    }
?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1><?php echo $_SESSION['clientData']['clientFirstname']," ", $_SESSION['clientData']['clientLastname']?></h1>
                    <?php 
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                    } else if(isset($message)){
                        echo $message;
                    }
                    ?>
                    <p>You are logged in.</p>
                    <ul>
                        <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
                        <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
                        <li>Email: <?php echo $_SESSION['clientData']['clientEmail']?></li>
                    </ul>

                    <h2>Account Management</h2>
                    <p>Use this link to update account information</p>
                    <?php echo "<a href='/phpmotors/accounts/?action=update'>Update Account Information</a>" ?>

                    <?php
                        if ($_SESSION['clientData']['clientLevel'] != 1){
                            echo '<h2>Inventory Management</h2>';
                            echo '<p>Use this link to manage the inventory</p>';
                            echo '<span class="space"><a href="/phpmotors/vehicles/index.php">Vehicle Management</a></span>';
                        }
                    ?>
                    
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 