<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>PHP Motors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="../../phpmotors/css/style.css" type="text/css">
</head>

<body>
    <div id="wrapper">
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
                    <h1>Manage Account</h1>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>
                    <form method="post" action="/phpmotors/accounts/">
                        <label for="clientFirstname">First name:</label><br>
                        <input id="clientFirstname" name="clientFirstname" type="text" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} elseif(isset($clientInfo['clientFirstname'])) {echo "value='$clientInfo[clientFirstname]'"; }?> required><br>

                        <label for="clientLastname">Last name:</label><br>
                        <input id="clientLastname" name="clientLastname" type="text" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} elseif(isset($clientInfo['clientLastname'])) {echo "value='$clientInfo[clientLastname]'"; }?> required><br>
                        
                        <label for="clientEmail">Email:</label><br>
                        <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} elseif(isset($clientInfo['clientEmail'])) {echo "value='$clientInfo[clientEmail]'"; }?> required><br>

                        <input type="submit" name="submit" value="Update"><br><br>
                        <input type="hidden" name="action" value="updateAccount">
                        <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
                        elseif(isset($clientId)){ echo $clientId; } ?>">
                    </form>
                    
                    <?php
                    if (isset($messagePass)) {
                    echo $messagePass;
                    }
                    ?>
                    <form method="post" action="/phpmotors/accounts/">
                        <label for="clientPassword">Password:</label><br>
                        <span class="msg">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                        <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

                        <input type="submit" name="submit" value="Update">
                        <input type="hidden" name="action" value="updatePassword">
                        <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
                        elseif(isset($clientId)){ echo $clientId; } ?>">
                    </form> 
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 