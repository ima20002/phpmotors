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
                    <h1><?php echo "Review the " . $reviewInfo['invMake'] . ' ' . $reviewInfo['invModel']; ?></h1>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>
                    <div id="reviewform">
                        <h3>Reviewed on <?php echo date("j F, Y", strtotime($reviewInfo['reviewDate'])); ?></h3>

                        <form action="/phpmotors/reviews/" method="post">
                            <fieldset>
                                <label>Review Text</label><br>
                                <textarea rows="4" cols="70" id="reviewText" name="reviewText" required><?php echo $reviewInfo['reviewText']; ?></textarea><br>

                                <input type="submit" name="submit" value="Update">
                                <input type="hidden" name="action" value="update"> 
                                <input type="hidden" name="reviewId" value="<?php echo $reviewId;?>">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?>