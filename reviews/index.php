<?php
// Reviews controller

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
// Get the uploads model
require_once '../model/uploads-model.php';
// Get the reviews model
require_once '../model/reviews-model.php';


// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }

switch ($action){
    case 'addReview':
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
        $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_STRING));
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_STRING));

        // Check for missing data
        if(empty ($reviewText)){
        $_SESSION['reviewMessage'] = '<p class="redmessage">Please provide information for empty form field.</p>';
        header('location: /phpmotors/vehicles/?action=vehicleinfomation&invId=' . $invId);
        exit;
        }

        // Send the data to the model
        $reviewOutcome = addReviews($reviewText, $invId, $clientId);

        // Check and report the result
        if($reviewOutcome === 1){
            $_SESSION['reviewMessage'] = "<p class='redmessage'>Thanks for the review, it is displayed below.</p>";
            header('location: /phpmotors/vehicles/?action=vehicleinfomation&invId=' . $invId);
            // header('location: /phpmotors/');
            exit;
        } else {
            $_SESSION['reviewMessage'] = "<p class='redmessage'>Adding review failed. Please try again.</p>";
            header('location: /phpmotors/vehicles/?action=vehicleinfomation&invId=' . $invId);
            exit;
        }
        break;
    
    case 'updateReview';
        $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING));
        $reviewInfo = getReviewByReviewId($reviewId);

        include '../view/review-update.php';
        break;

    case 'update';
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_STRING);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);

        // Check for missing data
        if(empty ($reviewId) || empty($reviewText)){
            $_SESSION['message']  = '<p class="redmessage">Please provide information for review field.</p>';
            include '../view/review-update.php';
            exit;
        }
    
        // Send the data to the model
        $updatereviewOutcome = updateReview($reviewId, $reviewText);

        // Check and report the result
        if($updatereviewOutcome === 1){
            $_SESSION['message']  = "<p class='redmessage'>The review was updated successfully</p>";
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message']  = "<p class='redmessage'>Error. updated was failed.</p>";
            header('location: /phpmotors/accounts/');
            exit;
        }
        break;

    case 'deleteReview';
        $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_STRING));
        $reviewInfo = getReviewByReviewId($reviewId);

        include '../view/review-delete.php';
        break;

    case 'delete';
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_STRING);

        $deleteReviewResult = deleteReview($reviewId);
        if ($deleteReviewResult) {
            $message = "<p class='redmessage'>Congratulations the review was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        } else {
            $message = "<p class='redmessage'>Error, the review was not deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/');
            exit;
        }

        break;  

    default:
        include '../view/vehicle-detail.php';
        break;
}