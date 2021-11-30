<?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Image Management</title>
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
                    <h1>Image Management</h1>
                    <h2>Add New Vehicle Image</h2>

                    <?php
                    if (isset($message)) {
                    echo $message;
                    } ?>

                    <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
                        <label for="invItem">Vehicle</label>
                            <?php echo $prodSelect; ?>
                            <fieldset>
                                <label>Is this the main image for the vehicle?</label>
                                <label for="priYes" class="pImage">Yes</label>
                                <input type="radio" name="imgPrimary" id="priYes" class="pImage" value="1">
                                <label for="priNo" class="pImage">No</label>
                                <input type="radio" name="imgPrimary" id="priNo" class="pImage" checked value="0">
                            </fieldset>
                        <label>Upload Image:</label>
                        <input type="file" name="file1">
                        <input type="submit" class="regbtn" value="Upload">
                        <input type="hidden" name="action" value="upload">
                    </form>
                    <hr>
                    <h2>Existing Images</h2>
                    <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
                    <?php
                    if (isset($imageDisplay)) {
                    echo $imageDisplay;
                    } ?>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?>
<?php unset($_SESSION['message']); ?>