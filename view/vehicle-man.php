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
                    <span class="space"><a href="/phpmotors/vehicles/?action=classification-page">Add Classification</a></span><br>
                    <span class="space"><a href="/phpmotors/vehicles/?action=vehicle-page">Add Vehicle</a></span>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 