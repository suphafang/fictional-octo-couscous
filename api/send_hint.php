<?php
    require_once(__DIR__.'/../modules/database.module.php');
    require_once(__DIR__.'/../modules/message.module.php');
    session_start();

    header('Content-type: application/json');
    $response = array();

    try {
        //Security script
        if(empty($_SESSION['authentication']['facebook']['id'])) {
            throw new Exception("unauthorization", 1);
        }

        if(!isset($_POST['id']) || !isset($_POST['hint'])) {
            throw new Exception("bad request", 1);
        }

        $time = date('Y-m-d');
        $allowTime = ['2021-09-05', '2021-09-07', '2021-09-09', '2021-09-11'];

        if(!in_array($time, $allowTime)) {
            throw new Exception("not allow date", 1);
        }

        $db = new Database;
        $db->connect();

        $stmt = $db->conn->prepare("SELECT * FROM peer_mentoring WHERE peer_mentor = ? AND peer_mentee = ? LIMIT 1");
        $stmt->bind_param("ss", $peer_mentor, $peer_mentee);
        $peer_mentor = $_SESSION['authentication']['facebook']['id'];
        $peer_mentee = $_POST['id'];
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows < 1) {
            throw new Exception("not match", 1);
        }

        $stmt = $db->conn->prepare("SELECT * FROM peer_mentoring_hints WHERE sent_from = ? AND sent_to = ? AND sent_at >= ?");
        $stmt->bind_param("sss", $peer_mentor, $peer_mentee, $time);
        $time = date('Y-m-d 00:00:00');
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            throw new Exception("full quota/day", 1);
        }

        // Final script
        $stmt = $db->conn->prepare("INSERT peer_mentoring_hints SET sent_from = ?, sent_to = ?, hint = ?, sent_at = ?");
        $stmt->bind_param("ssss", $peer_mentor, $peer_mentee, $hint, $time);
        $hint = htmlentities($_POST['hint']);
        $time = date('Y-m-d H:i:s');
        $stmt->execute();

        $response['status'] = true;
    } catch (Exception $e) {
        http_response_code(400);
        $response['status'] = false;
        $response['msg'] = $e->getMessage();
    } finally {
        echo json_encode($response);
    }
?>