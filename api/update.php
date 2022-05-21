<?php
    require __DIR__.'/../modules/update_profile.module.php';
    header('Content-type: application/json');
    
    try {
        session_start();

        if(!isset($_SESSION['authentication']['facebook']['id'])) {
            throw new Exception("unauthorization", 1);
        }

        if(!isset($_GET['type'])) {
            throw new Exception("Bed request - 0", 1);
        }

        $update = new Update;

        if($_GET['type'] === 'profile') {
            if(!isset($_POST['bio']) || !isset($_POST['tags'])) {
                throw new Exception("Bed request - 1", 1);
            }
            $update->set_value(
                facebookid: $_SESSION['authentication']['facebook']['id'],
                bio: $_POST['bio'],
                tags: $_POST['tags']
            );
        } elseif($_GET['type'] === 'contact') {
            if(!isset($_POST['facebook']) || !isset($_POST['instagram']) || !isset($_POST['line'])) {
                throw new Exception("Bed request - 2", 1);
            }
            $update->set_value(
                facebookid: $_SESSION['authentication']['facebook']['id'],
                facebook: $_POST['facebook'],
                instagram: $_POST['instagram'],
                line: $_POST['line']
            );
        } else {
            throw new Exception("Type not found", 1);
        }
        
        if(!$update->upload($_GET['type'])) {
            throw new Exception("Error Processing Request", 1);
        }



        echo json_encode([true, 'updated']);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([false, $e->getMessage()]);
    }
?>