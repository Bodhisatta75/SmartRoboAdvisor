<?php
require('connection.php');
$user = $_POST['user'];
$password = $_POST['password'];

$query="SELECT * FROM smartroboadvisor.user where username='$user' and password='$password'";
echo $query;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)) {
    echo "Returned rows are: " . mysqli_num_rows($result);
    // Free result set
    header('Location: home.php');
    //mysqli_free_result($result);
}
// header('Location: home.php');

?>
<html>
    <body>
        <h2>Redirect</h2>
    </body>
</html>