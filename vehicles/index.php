<?php
// Vehicles controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);

// Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

// Build the select list
// $classificationList = '<select id="classificationId" name="classificationId">';
// foreach ($classifications as $classification) {
//     $classificationList .= "<option value=" . urlencode($classification['classificationId']) . ">" . urlencode($classification['classificationName']) . "</option>";
// }
// $classificationList .= '</select>';


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }

switch ($action){
 case 'classification-page': 
    include '../view/add-classification.php'; 
    break;

 case 'vehicle-page': 
    include '../view/add-vehicle.php'; 
    break;

 case 'adding-classification':
    // Filter and store the data
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName'));

    $checkClassifName = checkclassifName($classificationName);

    // Check for missing data
    if(empty($checkClassifName)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/add-classification.php';
        exit;
    }

    // Send the data to the model
    $classiOutcome = addClassification($classificationName);

    // Check and report the result
    if($classiOutcome === 0){
        $message = "<p>Adding Classification Name failed. Please try again.</p>";
        include '../view/add-classification.php';
        exit;
    }

    header('Location: index.php');
    break;

 case 'adding-vehicle':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_STRING));

    // Check for missing data
    if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/add-vehicle.php';
        exit;
    }

    // Send the data to the model
    $vehicleOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

    // Check and report the result
    if($vehicleOutcome === 1){
        $message = "<p>Thanks for adding vehicle.</p>";
        include '../view/add-vehicle.php';
        exit;
    } else {
        $message = "<p>Adding vehicle failed. Please try again.</p>";
        include '../view/add-vehicle.php';
        exit;
    }
    break;

 default:
    include '../view/vehicle-man.php';
    break;
  
}