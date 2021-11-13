<?php
$classificationList = '<select name="classificationId" id="classificationId">';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $classificationList .= ' selected ';
        }
    }elseif(isset($invInfo['classificationId'])){
        if($classification['classificationId'] === $invInfo['classificationId']){
         $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="../../phpmotors/css/style.css" type="text/css">
</head>

<body>
    <div id="wrapper">
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
                    <h1><?php if(isset($invInfo['invMake'])){ 
                    echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>
                    <form class="space" action="/phpmotors/vehicles/index.php" method="post">
                        <p>Confirm Vehicle Deletion. The delete is permanent</p>

                        <fieldset>
                            <label for="invMake">Make</label><br>
                            <input type="text" readonly name="invMake" id="invMake" <?php
                        if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br>

                            <label for="invModel">Model</label><br>
                            <input type="text" readonly name="invModel" id="invModel" <?php
                        if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br>

                            <label for="invDescription">Description</label><br>
                            <textarea name="invDescription" readonly id="invDescription"><?php
                        if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
                        ?></textarea><br>

                        <input type="submit" name="submit" value="Delete Vehicle">

                            <input type="hidden" name="action" value="deleteVehicle">
                            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
                        echo $invInfo['invId'];} ?>">

                        </fieldset>
                    </form>
                </div>
            </main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/module/footer.php'; ?> 