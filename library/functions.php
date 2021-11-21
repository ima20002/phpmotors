<?php

function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
   return preg_match($pattern, $clientPassword);
}


//Add-classification
// check the classification name for maximum of 30 characters
function checkclassifName($classificationName){
   $maxlength = '/^.{1,30}$/';
   return preg_match($maxlength, $classificationName);
}

function buildNavigation($classifications){
   $navList = '<ul>';
   $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
   foreach ($classifications as $classification) {
      $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName=" .urlencode($classification['classificationName'])."' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
   }
   $navList .= '</ul>';
   return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
   $classificationList = '<select name="classificationId" id="classificationList">'; 
   $classificationList .= "<option>Choose a Classification</option>"; 
   foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
   } 
   $classificationList .= '</select>'; 
   return $classificationList; 
  }


// Wrap vehicles by classification in a list
function buildVehiclesDisplay($vehicles){
   $dv = '<ul id="inv-display">';
   foreach ($vehicles as $vehicle) {
      $dv .= '<li>';
      $dv .= "<a href='/phpmotors/vehicles/?action=vehicleinfomation&invId=" .urlencode($vehicle['invId'])."' title='View our $vehicle[invMake] lineup of vehicles'><img src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></a>";
      $dv .= '<hr>';
      $dv .= "<h2><a href='/phpmotors/vehicles/?action=vehicleinfomation&invId=" .urlencode($vehicle['invId'])."' title='View our $vehicle[invMake] lineup of vehicles'>$vehicle[invMake] $vehicle[invModel]</a></h2>";
      $invPrice = $vehicle['invPrice'];
      $invPrice = number_format($invPrice, 0, '.', ',');
      $dv .= "<span>&#36; $invPrice</span>";
      $dv .= '</li>';
   }
   $dv .= '</ul>';
   return $dv;
   }

// Wrap vehicles by classification in a list
function buildEachVehicleDisplay($vehicle){
   $dv = '<ul id="inv-detail-display">';
      $dv .= '<li>';
      $dv .= "<div><img src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></div>";
      $invPrice = $vehicle['invPrice'];
      $invPrice = number_format($invPrice, 0, '.', ',');
      $dv .= "<div><h3>Price: &#36; $invPrice</h3>";
      $dv .= "<h3>$vehicle[invMake] $vehicle[invModel] Details</h3>";
      $dv .= "<p>$vehicle[invDescription]</p>";
      $dv .= "<h3>Color: $vehicle[invColor]</h3>";
      $dv .= "<h3>Stock#: $vehicle[invStock]</h3></div>";
      $dv .= '</li>';
   $dv .= '</ul>';
   return $dv;
   }