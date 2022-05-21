<?php
    require __DIR__.'/../modules/facebook.module.php';
    require __DIR__.'/../modules/register.module.php';
    require __DIR__.'/../modules/database.module.php';

    header('Content-type: application/json');

    if (
        !isset($_POST['facebookid']) ||
        !isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['studentid']) ||
        !isset($_POST['year']) ||
        !isset($_POST['programme']) ||
        !isset($_POST['bio']) ||
        !isset($_POST['hashtages']) ||
        !isset($_POST['otherHashtages'])
    ) {
        http_response_code(400);
        echo json_encode([false, 'data invalid']);
        exit();
    }
    
    $db = new Database();
    $db->connect();

    $regis = new Register();
    $regis->set_database($db->conn);
    $query = $regis->regis(
        $_POST['facebookid'], 
        $_POST['firstname'], 
        $_POST['lastname'], 
        $_POST['studentid'], 
        $_POST['year'], 
        $_POST['programme'], 
        $_POST['bio'],
        $_POST['hashtages'],
        $_POST['otherHashtages']
    );

    if($query){
        $path = __DIR__.'/../media/profiles/'.$_SESSION['temp_fb_picture']['id'].'.jpg';
        if(!file_put_contents($path, file_get_contents($_SESSION['temp_fb_picture']['url']))){
            exit(json_encode([false, 'Upload profile picture failed.']));
        }

        $_SESSION['authentication'] = [
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'studentid' => $_POST['studentid'],
            'facebook' => ['id' => $_POST['facebookid']],
            'status' => 'registered',
            'year' => $_POST['year']
        ];

        session_write_close();

        http_response_code(200);
        echo json_encode([true, 'register success']);
    } else {
        http_response_code(400);
        echo json_encode([false, $regis->error]);
    }
?>