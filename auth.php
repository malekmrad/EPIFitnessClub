<?php
session_start();
$serveurname='localhost';
$user='root';
$password='';
$dbname='efc';
$conn= new mysqli($serveurname, $user, $password, $dbname);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $secret_key = 'YOUR_SECRET_KEY';
    $response = $_POST['h-captcha-response'];
    $remote_ip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://hcaptcha.com/siteverify';
    $data = array(
        'secret' => $secret_key,
        'response' => $response,
        'remoteip' => $remote_ip
    );
    $options = array(
        'http' => array(
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    if ($response->success == true) {
        // User passed the hCaptcha challenge
        // Process the login form
    } else {
        // User failed the hCaptcha challenge
        $error = 'Please verify that you are not a robot.';
    }
}
$username = $_POST['uName'];
$password = $_POST['password'];
$_SESSION['username'] = $username; 
$sql = "SELECT * FROM signup WHERE username='$username' AND psw='$password'";
$result = mysqli_query($conn, $sql);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) == 1) {

    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;
    

    header('Location: boutique.php');
} else {

    echo "Invalid username or password";
    header('Refresh: 2; login.php');
}

mysqli_close($conn);
?>