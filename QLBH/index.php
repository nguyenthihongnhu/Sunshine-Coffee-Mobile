<?php
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sunshine_coffee";
  
// Create connection
$conn = mysqli_connect( $servername, $username, $password, $dbname );
  
// Check connection
if ( !$conn ) {
    die("Connection failed: " . mysqli_connect_error());
}
  
// // SQL query to create table
// $sql = "CREATE TABLE date_test1 (
//     created_at DATETIME
// )";
  
// if (mysqli_query($conn, $sql)) {
//     echo "Table date_test created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }
//   // Check connection
// if ( !$conn ) {
//     die("Connection failed: " . mysqli_connect_error());
// }
  
// SQL query to insert data into table
// $sql = "INSERT INTO date_test1( created_at ) 
//         VALUES( '2018-12-05 12:39:16' );";
  
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
 
// // SQL query 
// $sql = "SELECT * FROM date_test1
// WHERE DATE(created_at) = '2018-12-05'";
  
// $result = mysqli_query( $conn, $sql ); 
  
// if ($result) {
//     echo $result; //printing Query result
// } 
// else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
// Close connection
// mysqli_close($conn);

?>