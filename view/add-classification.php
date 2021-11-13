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
?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1>Add Car Classification</h1>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>
                    <form class="space" action="/phpmotors/vehicles/index.php" method="post">
                        <label for="classificationName">Classification Name</label><br>
                        <span class="msg">(Classification name must be no more than 30 characters)</span><br>
                        <input name="classificationName" id="classificationName" type="text" maxlength="30" <?php if(isset($classificationName)){echo "value='$classificationName'";}  ?> required><br>

                        <input type="submit" value="Add Classification">
                        <input type="hidden" name="action" value="adding-classification">
                    </form>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 