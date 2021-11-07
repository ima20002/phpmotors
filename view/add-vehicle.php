<?php
$classificationList = '<select name="classificationId">';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?><?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
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
                    <h1>Add Vehicle</h1>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>
                    <form class="space" action="/phpmotors/vehicles/index.php" method="post">
                        <p>*Note all Fields are Required</p>
                        <?php echo $classificationList; ?><br>

                        <label for="invMake">Make</label><br>
                        <input type="text" id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> required><br>

                        <label for="invModel">Model</label><br>
                        <input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required><br>

                        <label for="invDescription">Description</label><br>
                        <textarea rows="2" cols="20" id="invDescription" name="invDescription" required><?php if(isset($invDescription)){echo $invDescription;} ?></textarea><br> 

                        <label for="invImage">Image Path</label><br>
                        <input type="text" id="invImage" name="invImage" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required><br>

                        <label for="invThumbnail">Thumbnail Path</label><br>
                        <input type="text" id="invThumbnail" name="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required><br>

                        <label for="invPrice">Price</label><br>
                        <input type="number" id="invPrice" name="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required><br>

                        <label for="invStock">Stock</label><br>
                        <input type="number" id="invStock" name="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required><br>

                        <label for="invColor">Color</label><br>
                        <input type="text" id="invColor" name="invColor" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required><br>

                        <input type="submit" name="submit" value="Add Vehicle" id="btn">
                        <input type="hidden" name="action" value="adding-vehicle">
                    </form>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 