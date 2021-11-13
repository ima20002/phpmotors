<header>
            <div id="to-header">
                <img src="/phpmotors/images/site/logo.png" alt="Logo">
                <?php
                if (isset($_SESSION['loggedin'])) {
                    echo "<span><a href=' /phpmotors/accounts/'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a><a href='/phpmotors/accounts/?action=Logout'>| Logout</a></span>";
                } else {
                    echo "<span><a href='/phpmotors/accounts/?action=login'>My Account</a></span>";
                }
                ?>
            </div>
        </header>