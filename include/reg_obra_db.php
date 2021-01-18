<?php
$OB = $_POST['OB'];
$servername = "localhost";
$username = "root";
$password = " ";
$db = "projects";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
$name1 = $OB.'_Nom1';
$name2 = $OB.'_Nom2';
$name3 = $OB.'_Nom3';
$name4 = $OB.'_Nom4';
// Check connection
if ($conn->connect_error) {
    echo "Error creating database: " . $conn->error;
} 

$post1 = $_POST["TA"];
$post2 = $_POST["TB"];
$post3 = $_POST["TC"];
$post4 = $_POST["TD"];


$result = "SELECT * FROM obras WHERE name='$OB'";
$resultado_p = mysqli_query($conn, $result);

if (mysqli_num_rows($resultado_p) == 0) {

    $dataOB = mysqli_query($conn, "INSERT INTO obras (name) VALUES ('".$OB."')");

    $sql1 = "CREATE TABLE $name1 (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    Num VARCHAR(30) NOT NULL
)";


$sql2 = "CREATE TABLE $name2 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Num VARCHAR(30) NOT NULL
)";


$sql3 = "CREATE TABLE $name3 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Num VARCHAR(30) NOT NULL
)";


$sql4 = "CREATE TABLE $name4 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Num VARCHAR(30) NOT NULL
)";

// Create folder OB
mkdir("upload/".$OB, 0777);

// Create database
if (mysqli_query($conn, $sql1)) {
    for ($i=0; $i < count($post1) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name1 (Num) VALUES ('".$post1[$i]."')");
    }
}else {
    echo "Error creating table: " . mysqli_error($conn);
}if (mysqli_query($conn, $sql2)) {
    for ($i=0; $i < count($post2) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name2 (Num) VALUES ('".$post2[$i]."')");
    }
}else {
    echo "Error creating table: " . mysqli_error($conn);
}if (mysqli_query($conn, $sql3)) {
    for ($i=0; $i < count($post3) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name3 (Num) VALUES ('".$post3[$i]."')");
    }
}else {
    echo "Error creating table: " . mysqli_error($conn);
}if (mysqli_query($conn, $sql4)) {
    for ($i=0; $i < count($post4) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name4 (Num) VALUES ('".$post4[$i]."')");
    }
}else {
    echo "Error creating table: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4)) {
    $_SESSION['create_project'] = "Obra criada com sucesso!";
    header("Location: ../dashboard.php");
} else {
    $_SESSION['create_project'] = "Ocorreu um erro!";
    header("Location: ../dashboard.php");
}

} else {
    for ($i=0; $i < count($post1) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name1 (Num) VALUES ('".$post1[$i]."')");
    }
    for ($i=0; $i < count($post2) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name2 (Num) VALUES ('".$post2[$i]."')");
    }
    for ($i=0; $i < count($post3) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name3 (Num) VALUES ('".$post3[$i]."')");
    }
    for ($i=0; $i < count($post4) ; $i++) {
        $data1 = mysqli_query($conn, "INSERT INTO $name4 (Num) VALUES ('".$post4[$i]."')");
    }
    $_SESSION['create_project'] = "Campos adicionados com sucesso!";
    header("Location: ../dashboard.php");
}
?>