<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $reviewInfo['invMake'] . $reviewInfo['invModel']; ?>  | PHP Motors, Inc.</title>
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
                    <h1><?php echo "Delete " . $reviewInfo['invMake'] . ' ' . $reviewInfo['invModel']; ?></h1>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>
                    <div id="reviewform">
                        <h3>Reviewed on <?php echo date("j F, Y", strtotime($reviewInfo['reviewDate'])); ?></h3>
                        <p id="deletwarning">Deletes cannnot be undone. Are you sure you want to delete this review?</p>
                        <form action="/phpmotors/reviews/index.php" method="post">
                            <fieldset>
                                <h4>Review Text</h4><br>
                                <p id="reviewForDelete"><?php echo $reviewInfo['reviewText'] ?></p>

                                <input type="submit" name="submit" value="Delete">
                                <input type="hidden" name="action" value="delete"> 
                                <input type="hidden" name="reviewId"  value="<?php echo $reviewId;?>">     
                            </fieldset>
                        </form>
                    </div>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?>