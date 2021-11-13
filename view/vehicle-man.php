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
    if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] == 1) {
        header('Location: ../index.php');
        exit;
    }
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1>Add Car Classification</h1>
                    <span class="space"><a href="/phpmotors/vehicles/?action=classification-page">Add Classification</a></span><br>
                    <span class="space"><a href="/phpmotors/vehicles/?action=vehicle-page">Add Vehicle</a></span>

                    <?php
                    if (isset($message)) { 
                    echo $message; 
                    } 
                    if (isset($classificationList)) { 
                    echo '<h2>Vehicles By Classification</h2>'; 
                    echo '<p>Choose a classification to see those vehicles</p>'; 
                    echo $classificationList; 
                    }
                    ?>
                    <noscript>
                    <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
                    </noscript>
                    <table id="inventoryDisplay"></table>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 
<?php unset($_SESSION['message']); ?>