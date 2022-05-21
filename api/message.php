<?php
    require_once(__DIR__.'/../modules/database.module.php');
    require_once(__DIR__.'/../modules/message.module.php');

    header('Content-type: application/json');

    session_start();

    if(empty($_SESSION['authentication']['facebook']['id'])) {
        http_response_code(400);
        exit(json_encode([false, "unauthorization"]));
    }

    if(!isset($_POST['receiver']) || !isset($_POST['message'])) {
        http_response_code(400);
        exit(json_encode([false, "Bad request"]));
    }
    
    if($_SESSION['authentication']['year'] !== 'freshman') {
        http_response_code(400);
        exit(json_encode([false, "สนุกหรอครับ ต้องการอะไรจากสังคม. Show power?"], JSON_UNESCAPED_UNICODE));
    }

    $db = new Database;
    $db->connect();
    $deliver = new Message($db->conn);
    $deliver->to($_POST['receiver']);
    $deliver->from($_SESSION['authentication']['facebook']['id']);
    $deliver->message($_POST['message']);
    
    if($deliver->send()) {
        echo json_encode([true, "success"]);
    } else {
        http_response_code(400);
        echo json_encode([false, $deliver->error]);
    }
?>