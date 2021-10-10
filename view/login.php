<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="login">
                    <h1>Sign in</h1>
                    <form>
                        <label for="email">Email</label><br>
                        <input name="clientEmail" id="clientEmail" type="email"><br>

                        <label for="password">Password</label><br>
                        <input name="clientPassword" id="clientPassword" type="password"><br>

                        <input type="submit" value="LOGIN" id="login_button">
                    </form>
                    <p>No account? <a href="/phpmotors/accounts/?action=register">Sign-up</a></p>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 