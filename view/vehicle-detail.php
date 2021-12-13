<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $vehicle['invMake'] . $vehicle['invModel']; ?>  | PHP Motors, Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="../../phpmotors/css/style.css" type="text/css">
</head>

<body>
    <div id="wrapper">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/header.php'; ?>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="main_content">
                    <h1><?php echo $vehicle['invMake'] . ' ' . $vehicle['invModel']; ?></h1>
                    <div class="vehicle_wrap">
                        <?php if(isset($message)){
                        echo $message; }
                        ?>
                        <?php if(isset($vehicleDisplay)){
                        echo $vehicleDisplay;
                        } ?>
                        <h2 class="thumbnailtitle">Vehicle Thumbnails</h2>
                        <?php if(isset($thumnailDisplay)){
                        echo $thumnailDisplay;
                        } ?>
                    </div>
                    <hr>
                    <div id="reviewform">
                        <h2>Customer Reviews</h2>
                        <?php
                        if (isset($_SESSION['loggedin'])){
                            echo "<h3>Review the $vehicle[invMake] $vehicle[invModel]</h3>";
                            
                            if (isset($_SESSION['reviewMessage'])) {
                            echo $_SESSION['reviewMessage'];
                            }
                            
                            echo "<form action='/phpmotors/reviews/index.php' method='post'>
                                    <fieldset>
                                    <label>Screen Name:</label><br>
                                    <input type=text value='" . substr($_SESSION['clientData']['clientFirstname'], 0, 1) . $_SESSION['clientData']['clientLastname'] . "' readonly><br>

                                    <label>Rview:</label><br>
                                    <textarea rows='4' cols='90' id='reviewText' name='reviewText' required></textarea><br>

                                    <input type='submit' name='submit' value='Submit Review'>
                                    <input type='hidden' name='action' value='addReview'> 
                                    <input type='hidden' name='invId'  value='$vehicle[invId]'> 
                                    <input type='hidden' name='clientId' value='" . $_SESSION['clientData']['clientId'] . "'>         
                                </fieldset>
                            </form>";    
                        } else {
                            
                            echo "You must <a href='/phpmotors/accounts/?action=login'>login</a> to write a review.";
                        }
                        ?>
                        
                    </div>
                    <?php if(isset($reviewsDisplay)){
                    echo $reviewsDisplay;
                    } ?>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?>
<?php if(isset($_SESSION['reviewMessage'])){
    unset($_SESSION['reviewMessage']);
}?>