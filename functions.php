<?php

function navbar() {
    include 'navbar.php';
}

function header_single() {
    include 'header_single.php';
}

function menu_header() {
    include 'menu.php';
}

function the_login() {
    include 'login.php';
}

function login() {
    $server = "localhost";
    $user = "belom742_omilen";
    $password = " ";
    $dbname = "root";
    $conn = mysqli_connect ($server, $user, $password, $dbname);
    
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if ($login) {
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        if ((!empty ($user)) AND (!empty ($pass))) {
            $res_user = "SELECT * FROM users WHERE user='$user' LIMIT 1 " or die (mysqli_error());
            $res = mysqli_query($conn, $res_user);
            if ($res) {
                $row_user = mysqli_fetch_assoc($res);
                if (password_verify($pass, $row_user['pass'])) {
                    $_SESSION['id'] = $row_user['id'];
                    $_SESSION['user'] = $row_user['user'];
                    $_SESSION['cre_p'] = $row_user['cre_p'];
                    $_SESSION['ed_p'] = $row_user['ed_p'];
                    $_SESSION['rev_p'] = $row_user['rev_p'];
                    $_SESSION['reg_u'] = $row_user['reg_u'];
                    $_SESSION['rel_u'] = $row_user['rel_u'];
                    $_SESSION['cre_o'] = $row_user['cre_o'];
                    $_SESSION['rel'] = $row_user['rel'];
                    header("Location: dashboard.php");
                }
                else {
                    $_SESSION['msg'] = "Usuário ou senha incorreto!";
                    header("Location: login.php");
                }
            }
        } else {
            $_SESSION['msg'] = "Usuário ou senha incorreto!";
            header("Location: login.php");
        }
    } else {
        $_SESSION['msg'] = "Página não encontrada!";
        header("Location: login.php");
    }
}

function register() {
    $register = filter_input(INPUT_POST, 'register', FILTER_SANITIZE_STRING);
    if ($register) {
        $server = "localhost";
        $user = "belom742_omilen";
        $password = " ";
        $dbname = "root";
        $conn = mysqli_connect ($server, $user, $password, $dbname);

        $cre_p = (isset($_POST['cre_p'])) ? 1 : 0;
        $ed_p = (isset($_POST['ed_p'])) ? 1 : 0;
        $rev_p = (isset($_POST['rev_p'])) ? 1 : 0;
        $reg_u = (isset($_POST['reg_u'])) ? 1 : 0;
        $rel_u = (isset($_POST['rel_u'])) ? 1 : 0;
        $cre_o = (isset($_POST['cre_o'])) ? 1 : 0;
        $rel = (isset($_POST['rel'])) ? 1 : 0;
        $user_res = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $user_res['pass'] = password_hash($user_res['pass'], PASSWORD_DEFAULT);
        
        $result_user = "INSERT INTO users (user, pass, cre_p, ed_p, rev_p, reg_u, rel_u, cre_o, rel) VALUES (
        '".$user_res['user']."',
        '".$user_res['pass']."',
        '".$cre_p."',
        '".$ed_p."',
        '".$rev_p."',
        '".$reg_u."',
        '".$rel_u."',
        '".$cre_o."',
        '".$rel."'
    )";

    $res_user = mysqli_query($conn, $result_user);
    if (mysqli_insert_id($conn)) {
        $_SESSION['create_project'] = "Cadastrado com Sucesso";
        header ("Location: ../dashboard.php");
    } else {
        $_SESSION['msg'] = "Erro ao cadastrar usuário";
    }
}
}
class create {

    public function create_project() {
        $title = "Criar Projeto";
        include 'title_page.php';

        require 'security.php'; 
        include 'navbar.php'; 

        $server = "localhost";
        $user = "belom742_omilen";
        $password = " ";
        $dbname = "root";

        $conn = mysqli_connect ($server, $user, $password, $dbname);
        $query_n = mysqli_query($conn, "SELECT name, id FROM obras");
    }
}

function create_project_2() {
 if (!isset($_POST['ob'])) {
    header("Location: ../dashboard.php");
}
$title = "Criar Projeto";
include 'title_page.php';

require 'security.php'; 
include 'navbar.php'; 

$OB = $_POST['ob'];
$server = "localhost";
$user = "belom742_omilen";
$password = " ";
$dbname = "root";
$dbname_st = "projects";

$conn = mysqli_connect ($server, $user, $password, $dbname);

$name1 = $OB.'_Nom1';
$name2 = $OB.'_Nom2';
$name3 = $OB.'_Nom3';
$name4 = $OB.'_Nom4';

$query_1 = mysqli_query($conn, "SELECT id, Num FROM $name1");
$query_2 = mysqli_query($conn, "SELECT id, Num FROM $name2");
$query_3 = mysqli_query($conn, "SELECT id, Num FROM $name3");
$query_4 = mysqli_query($conn, "SELECT id, Num FROM $name4");

$conn_st = mysqli_connect ($server, $user, $password, $dbname_st);
$query_st = mysqli_query($conn_st, "SELECT id, name FROM status");

}



































?>