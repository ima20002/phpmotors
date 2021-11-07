<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
<?php
    if ($_SESSION['loggedin'] != TRUE) {
        header('Location: ../index.php');
        exit;
    }
?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1><?php echo $_SESSION['clientData']['clientFirstname']," ", $_SESSION['clientData']['clientLastname']?></h1>
                    <p>You are logged in.</p>
                    <ul>
                        <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']?></li>
                        <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']?></li>
                        <li>Email: <?php echo $_SESSION['clientData']['clientEmail']?></li>
                    </ul>

                    <?php
                        if ($_SESSION['clientData']['clientLevel'] != 1){
                            echo '<h2>Inventory Management</h2>';
                            echo '<p>Use this link to manage the inventory</p>';
                            echo '<span class="space"><a href="/phpmotors/vehicles/index.php">Vehicle Management</a></span>';
                        }
                    ?>
                    
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 