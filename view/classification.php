<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="../../phpmotors/css/style.css" type="text/css">
</head>

<body>
    <div id="wrapper">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1><?php echo $classificationName; ?> vehicles</h1>
                    <?php if(isset($message)){
                    echo $message; }
                    ?>
                    <?php if(isset($vehicleDisplay)){
                    echo $vehicleDisplay;
                    } ?>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 