<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1>Sign in</h1>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    ?>
                    <form action="/phpmotors/accounts/" method="post">
                        <label for="clientEmail">Email</label><br>
                        <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required><br>

                        <label for="clientPassword">Password</label><br>
                        <span class="msg">(Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character)</span><br>
                        <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

                        <input type="submit" value="LOGIN" id="btn">
                        <input type="hidden" name="action" value="Login">
                    </form>
                    <p>No account? <a href="/phpmotors/accounts/?action=registration">Sign-up</a></p>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 