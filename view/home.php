<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                
                <div class="main_content">
                    <h1>Welcome to PHP Motors!</h1>
                    <img id="motor_car_pic" src="/phpmotors/images/delorean.jpg" alt="Car">
                    <div class="message">
                        <h2>DMC Delorean</h2>
                        <p>3 cup holders</p>
                        <p>Superman doors</p>
                        <p>Fuzzy dice!</p>
                    </div>
                    <div id="own_today_button"><a href=""><img src="/phpmotors/images/site/own_today.png" alt="Own Today"></a></div>
                </div>

                <div id="review_upgrade">
                    <div class="dmc"> 
                        <h2 class="sub_title">DMC Delorean Reviews</h2>
                        <ul>
                            <li>"So fast its almost like traveling in time." (4/5)</li>
                            <li>"Coolest ride on the road." (4/5)</li>
                            <li>"I'm feeling Marty Mcfly!" (5/5)</li>
                            <li>"The most futuristic ride of our day." (4.5/5)</li>
                            <li>"80's livin and I love it!" (5/5)</li>
                        </ul>
                    </div>

                    <div class="upgrade">
                        <h2 class="sub_title">Delorean Upgrades</h2>
                        <div class="upgrade_content">
                            <figure><img src="/phpmotors/images/upgrades/flux-cap.png" alt="">
                                    <figcaption><a href="" title="">Flux Capacitor</a></figcaption>
                            </figure>
                            <figure><img src="/phpmotors/images/upgrades/flame.jpg" alt="">
                                    <figcaption><a href="">Flame Decals</a></figcaption>
                            </figure>
                            <figure><img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="">
                                    <figcaption><a href="">Bumper Stickers</a></figcaption>
                            </figure>
                            <figure><img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="">
                                    <figcaption><a href="">Hub Caps</a></figcaption>
                            </figure>
                        </div>          
                    </div>
                </div>
            </main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?>    