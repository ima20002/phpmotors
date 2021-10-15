<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
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
                    <form action="/phpmotors/accounts/index.php" method="post">
                        <label for="classificationName">Classification Name</label><br>
                        <input name="classificationName" id="classificationName" type="text"><br>

                        <input type="submit" value="Add Classification" id="btn">
                        <input type="hidden" name="action" value="adding-classification">
                    </form>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 