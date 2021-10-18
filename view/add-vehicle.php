<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
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
                    <form action="/phpmotors/vehicles/index.php" method="post">
                        <p>*Note all Fields are Required</p>
                        <?php echo $classificationList; ?><br>

                        <label for="invMake">Make</label><br>
                        <input type="text" id="invMake" name="invMake"><br>

                        <label for="invModel">Model</label><br>
                        <input type="text" id="invModel" name="invModel"><br>

                        <label for="invDescription">Description</label><br>
                        <textarea rows="2" cols="20" id="invDescription" name="invDescription"></textarea><br>

                        <label for="invImage">Image Path</label><br>
                        <input type="text" id="invImage" name="invImage"><br>

                        <label for="invThumbnail">Thumbnail Path</label><br>
                        <input type="text" id="invThumbnail" name="invThumbnail"><br>

                        <label for="invPrice">Price</label><br>
                        <input type="number" id="invPrice" name="invPrice"><br>

                        <label for="invStock">Stock</label><br>
                        <input type="number" id="invStock" name="invStock"><br>

                        <label for="invColor">Color</label><br>
                        <input type="text" id="invColor" name="invColor"><br>

                        <input type="submit" name="submit" value="Add Vehicle" id="btn">
                        <input type="hidden" name="action" value="adding-vehicle">
                    </form>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 