<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesión";

    $user->setUser($userSession->getCurrentUser());
    include_once 'admin/pages/charts/chartjs.php';

}else if(isset($_POST['user']) && isset($_POST['pass'])){
    //echo "Validacion de login";

    $userForm = $_POST['user_name'];
    $passForm = $_POST['pass'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";    

        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'admin/pages/charts/chartjs.php';

    }else{
        //echo "Nombre de usuario y/o Contraseña incorrecta"; 
        $errorLogin = "Nombre de usuario y/o Contraseña incorrecta";
        include_once 'login.php';
    }

}else{
    echo "Login";
    include_once 'login.php';
}


?>