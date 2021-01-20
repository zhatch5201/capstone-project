<?php

// Connection
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'casa order project';
$db_port = 3306;

$mysqli = new mysqli(
   $db_host,
   $db_user,
   $db_password,
   $db_db
);

if ($mysqli->connect_error) {
   echo 'Errno: ' . $mysqli->connect_errno;
   echo '<br />';
   echo 'Error: ' . $mysqli->connect_error;

} else {
   echo 'Success: a proper connection to mySQL was made.';
   echo '<br />';
   echo 'Host Information: ' . $mysqli->host_info;
   echo '<br />';
   echo 'Protocol Version: ' . $mysqli->protocol_version . '<br />';
}
if(isset($_POST['submit']) && $_POST['submit'] != '') {
   // Name
   $last_name = $_POST['Last-Name'];

   // Room Number
   $room_number = $_POST['Room-Number'];

   // Checkboxes
   // Drinks
   $milk = $_POST['Milk'];
   $Coffee = $_POST['Coffee'];
   $Tea = $_POST['Tea'];
   $Juice = $_POST['Juice'];
   $raw_drink_array = [$milk, $Coffee, $Tea, $Juice];
   $drink_values = ['milk', 'Coffee', 'Tea', 'Juice'];
   $drink_array = array();
   $i = 0;
   $chosen_drinks = '';

   foreach($raw_drink_array as $checkValue) {
      if($checkValue != NULL) {
         $checkValue = $drink_values[$i];
         array_push($drink_array, $checkValue);
      }
      $i++;
   }
   foreach($drink_array as $value) {
      $chosen_drinks .= $value;
   }

   // Appetizers                                                  ===================== Broken Right now =====================
   $soup = $_POST['cns'];
   $salad = $_POST['Caesar'];
   $raw_appetizer_array = [$soup, $salad];
   $appetizer_values = ['Chicken Noodle Soup', 'Caesar Salad'];
   $appetizer_array = array();
   $x = 0;

   foreach($raw_appetizer_array as $checkValue) {
      if($checkValue != NULL) {
         $checkValue = $appetizer_values[$x];
         array_push($appetizer_array, $checkValue);
      }
      $x++;
   }
   //                                                            ================ Still Broken until you fix it====================

   // Entree
   $entree = $_POST['entree'];
   if(gettype($entree) === NULL) {
      $entree = 'None';
   }

   // Dessert
   $sugar = $_POST['dessert'];
   if(gettype($dessert) === NULL) {
      $dessert = 'None';
   }

   // Special Request
   $special_request = $_POST['additionalRequests'];
   if(gettype($special_request) === NULL) {
      $special_request = 'None';
   }

   if(mysqli_query($mysqli, "INSERT INTO `orders` (`Last Name(s)`, `Room Number`, `Drinks`, `Appetizers`, `Entree`, `Dessert`, `Special Request`) VALUES ('$last_name', '$room_number', '$chosen_drinks', '$appetizer_array', '$entree', '$dessert', '$special_request')")) {
         echo 'mySQL query submitted!';
   } else {
      echo 'Something broke';
   }
}
$mysqli->close();
?>