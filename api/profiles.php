<?php
    require __DIR__.'/../modules/register.module.php';
    require __DIR__.'/../modules/database.module.php';
    require __DIR__.'/../modules/encrypt.module.php';

    header('Content-type: application/json');

    session_start();

    if(empty($_SESSION['authentication']['facebook']['id'])) {
        http_response_code(400);
        exit(json_encode([false, "unauthorization"]));
    }

    try {
        $db = new Database();
        $db->connect();

        (isset($_GET['id'])) ? $fbid = $db->conn->real_escape_string($_GET['id']) : throw new Exception("Data invalid", 1);

        $select = $db->conn->query("SELECT * FROM accounts WHERE acc_facebookid = '{$fbid}'");

        ($select->num_rows === 1) ? $data = $select->fetch_object() : throw new Exception("User not found", 1);

        if($_SESSION['authentication']['year'] === 'freshman') {
            $sql = "SELECT * FROM messages WHERE mss_from = '{$_SESSION['authentication']['facebook']['id']}' AND mss_to = '{$fbid}'";
        } else {
            $sql = "SELECT * FROM messages WHERE mss_from = '{$fbid}' AND mss_to = '{$_SESSION['authentication']['facebook']['id']}'";
        }

        $queryMessage = $db->conn->query($sql);

        if(!$queryMessage) {
            throw new Exception("Query message failed", 1);
        }

        $picture = "/media/profiles/{$fbid}.jpg";

        // if($_SESSION['authentication']['year'] === 'freshman') {
        //     $picture = "/media/profiles/{$fbid}.jpg";
        // } else {
        //     $picture = "/media/default-profile.png";
        // }

        if($queryMessage->num_rows > 0) {
            $mss_status = true;
            $crypt = new Encryption;
            $fetchMessage = $queryMessage->fetch_object();
            $mss_message = $crypt->decrypt($fetchMessage->mss_message);
            $picture = "/media/profiles/{$fbid}.jpg";
        } else {
            $mss_status = false;
            $mss_message = false;
        }

        echo json_encode([
            'id' => $data->acc_facebookid,
            'firstname' => $data->acc_firstname,
            'lastname' => $data->acc_lastname,
            'bio' => $data->acc_bio,
            'hashtags' => json_decode($data->acc_hashtags, true),
            'other_hashtags' => json_decode($data->acc_other_hashtags, true),
            'year' => ucfirst($data->acc_year),
            'message' => [$mss_status, $mss_message],
            'line' => $data->acc_sn_line,
            'facebook' => $data->acc_sn_facebook,
            'instagram' => $data->acc_sn_instagram,
            'picture' => $picture
        ]);
        
    } catch (Exception $e) {
        $db->conn->close();
        http_response_code(400);
        echo json_encode($e->getMessage());
    }
?>