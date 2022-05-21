<?php
    require __DIR__.'/../modules/register.module.php';
    require __DIR__.'/../modules/database.module.php';

    header('Content-type: application/json');

    session_start();

    if(empty($_SESSION['authentication']['facebook']['id'])) {
        http_response_code(400);
        exit(json_encode([false, "unauthorization"]));
    }

    try {
        $db = new Database;
        $db->connect();
        if($_SESSION['authentication']['year'] === 'freshman') {
            $sql = "SELECT * FROM accounts LEFT JOIN (SELECT mss_to, mss_time FROM messages WHERE mss_from = '{$_SESSION['authentication']['facebook']['id']}' GROUP BY mss_to) AS m ON m.mss_to = accounts.acc_facebookid WHERE accounts.acc_year != 'freshman' AND acc_facebookid != '{$_SESSION['authentication']['facebook']['id']}' ORDER BY m.mss_time DESC";
        } else {
            $sql = "SELECT * FROM accounts LEFT JOIN (SELECT mss_from, mss_time FROM messages WHERE mss_to = '{$_SESSION['authentication']['facebook']['id']}' GROUP BY mss_from) AS m ON m.mss_from = accounts.acc_facebookid WHERE accounts.acc_year = 'freshman' ORDER BY m.mss_time DESC";
        }
        $queryProfiles = $db->conn->query($sql);

        if(!$queryProfiles) {
            throw new Exception("Query failed", 1);
        }

        $profile = ['qty' => 0, 'total_message' => 0];

        if($queryProfiles->num_rows > 0) {
            while($fetchProfiles = $queryProfiles->fetch_object()) {
                $profile['qty']++;

                if(is_null($fetchProfiles->mss_time)) {
                    $message = false;
                } else {
                    $message = true;
                    $profile['total_message']++;
                }

                $picture = "/media/profiles/{$fetchProfiles->acc_facebookid}.jpg";

                // if($message || $_SESSION['authentication']['year'] === 'freshman') {
                //     $picture = "/media/profiles/{$fetchProfiles->acc_facebookid}.jpg";
                // } else {
                //     $picture = "/media/default-profile.png";
                // }

                $profile['data'][] = [
                    'key' => $fetchProfiles->acc_facebookid,
                    'fullname' => $fetchProfiles->acc_firstname.' '.$fetchProfiles->acc_lastname,
                    'year' => ucfirst($fetchProfiles->acc_year),
                    'programme' => $fetchProfiles->acc_programme,
                    'bio' => $fetchProfiles->acc_bio,
                    'message' => $message,
                    'picture' => $picture
                ];
            }
        }

        $db->conn->close();

        echo json_encode($profile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
        http_response_code(400);
    }
?>