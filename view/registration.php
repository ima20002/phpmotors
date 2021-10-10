<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="register">
                    <h1>Register</h1>
                    <form>
                        <label for="fname">First name:</label><br>
                        <input id="clientFirstname" name="clientFirstname" type="text"><br>

                        <label for="lname">Last name:</label><br>
                        <input id="clientLastname" name="clientLastname" type="text"><br>
                        
                        <label for="email">Email:</label><br>
                        <input name="clientEmail" id="clientEmail" type="email"><br>

                        <label for="password">Password:</label><br>
                        <input name="clientPassword" id="clientPassword" type="password"><br>

                        <input type="submit" value="Register" id="register_button">
                    </form> 
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 