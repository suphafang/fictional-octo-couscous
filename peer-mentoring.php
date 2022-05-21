<?php  
    require_once(__DIR__.'/modules/facebook.module.php');
    require_once(__DIR__.'/modules/database.module.php');

    $status = Login_with_facebook::identity();

    if($status === 'unregister'){
        header('location: /register');
        exit();
    } elseif ($status === false) {
        header('location: /login');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer mentoring - IT Binary Star 2021</title>
    <link rel="icon" href="icon.png" type="image/jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-utilities.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/new/style.css">
    <link rel="stylesheet" href="/css/new/bg.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .msg-chat {
            margin: 1rem;
        }
        .msg-chat-date {
            font-size: .75rem;
            margin-left: .5rem;
            color: hsla(0, 0%, 100%, .75);
        }
        .msg-chat-body {
            border-radius: .75rem;
            background: hsla(0, 0%, 100%, .125);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1rem;
            position: relative;
            padding: 1rem 2rem;
            box-shadow: 0 0 10px 5px rgb(0 0 0 / 10%);
        }
        .msg-chat-body > span.material-icons {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(to bottom right, rgba(235, 52, 131, 1), rgba(131, 52, 235, 1));
            color: hsla(0, 0%, 100%, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
            width: 2rem;
            height: 2rem;
            left: -.5rem;
            top: -.5rem;
            box-shadow: 0 0 10px 5px rgb(0 0 0 / 10%);
        }
        .peer-mentee {
            border-radius: .75rem .75rem;
            background: hsla(0, 0%, 100%, .125);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: grid;
            grid-template-columns: .5fr 1fr;
        }
        .peer-mentee:not(last-child) {
            margin-bottom: 2rem;
        }
        .peer-mentee-header {
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .peer-mentee-img {
            width: 100%;
            padding-bottom: 100%;
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
        }
        .peer-mentee-img > img {
            position: absolute;
            object-fit: cover;
            object-position: center;
            width: 100%;
            height: 100%;
        }
        .peer-mentee-body {
            padding: 2rem;
        }
        .peer-mentee-body > form {
            display: flex;
            flex-direction: column;
        }
        textarea {
            outline: none;
            padding: .75rem;
            border: none!important;
            border-radius: .4rem;
            background: transparent;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: #FFFFFF;
            box-shadow: 0 0 15px 0px rgba(0, 0, 0, .125);
            -webkit-appearance: none;
            max-height: 75px;
            font-size: .95rem;
        }
        .peer-mentee-body > form > button {
            margin-top: 1rem;
            outline: none;
            padding: .75rem 1.5rem;
            border: none;
            border-radius: .4rem;
            background: transparent;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: #FFFFFF;
            box-shadow: 0 0 15px 0px rgba(0, 0, 0, .125);
            align-items: center;
            transition: 500ms;
            font-size: .9rem;
            max-width: 50%;
            text-align: center;
        }
        .peer-mentee-content {
            position: relative;
        }
        .peer-mentee-body h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .peer-mentee-contact {
            position: absolute;
            top: 0;
            right: 0;
        }
        .peer-mentee-contact > a {
            padding: 1.125rem;
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            background: hsla(0, 0%, 100%, .125);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: #FFFFFF;
            transition: 500ms;
        }
        .peer-mentee-contact > a:hover {
            transform: rotate(25deg);
        }
        .peer-mentee-tags {
            margin-bottom: 1rem;
            max-width: 75%;
        }
        .peer-mentee-tags > span {
            background: hsla(0, 0%, 100%, .125);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: .25rem;
            font-size: .75rem;
            padding: .25rem .5rem;
            cursor:pointer;
            margin: .125rem;
            display: inline-block;
        }
        .limit {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
            color: hsla(0, 0%, 100%, 0.5);
        }
        @media screen and (max-width: 992px) {
            .peer-mentee {
                grid-template-columns: 1fr;
            }
            .peer-mentee-header {
                padding: 0;
            }
            .peer-mentee-img {
                width: 100%;
                padding-bottom: 100%;
                border-radius: .75rem .75rem 0 0;
                border: none;
            }
        }
        @media screen and (max-width: 768px) {
            .peer-mentee-contact {
                position:initial;
                margin-bottom: 1rem;
                display: flex;
                justify-content: center;
            }
            .peer-mentee-contact > a:not(last-child) {
                margin-left: .5rem;
            }
            .peer-mentee-tags {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
    </div>
    <div class="topbar">
        <a href="#" class="topbar-detail"><span class="topbar-detail-year"><?php echo $_SESSION['authentication']['year']; ?></span> <span class="topbar-detail-name"><?php echo $_SESSION['authentication']['first_name'].' '.$_SESSION['authentication']['last_name']; ?> - </span><?php echo $_SESSION['authentication']['studentid']; ?></a>
    </div>
    <div class="navbar">
        <a href="#" class="navbar-brand">ITBSTAR</a>
        <div class="navbar-group">
            <a href="/" class="navbar-link"><span class="material-icons navbar-link-icons">home</span><span class="navbar-link-text">Home</span></a>
            <a href="/peer-mentoring" class="navbar-link active"><span class="material-icons navbar-link-icons">groups</span><span class="navbar-link-text">Peer mentoring</span></a>
            <a href="/help" class="navbar-link"><span class="material-icons navbar-link-icons">help</span><span class="navbar-link-text">Help</span></a>
            <a href="/logout" class="navbar-link logout"><span class="material-icons navbar-link-icons">logout</span><span class="navbar-link-text">Logout</span></a>
            <a href="/profile" class="navbar-link account"><span class="material-icons navbar-link-icons">person</span><span class="navbar-link-text">My Profile</span></a>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <h1>Peer mentoring</h1>
        </div>
        <div class="content">
            <?php
                $db = new Database;
                $db->connect();
                if($_SESSION['authentication']['year'] !== 'freshman') {
                    $QueryPeerMentee = $db->conn->query("SELECT * FROM peer_mentoring LEFT JOIN accounts ON peer_mentoring.peer_mentee = accounts.acc_facebookid WHERE peer_mentor = '{$_SESSION['authentication']['facebook']['id']}'");
                    if($QueryPeerMentee) {
                        while($fetch = $QueryPeerMentee->fetch_object()) {
            ?>
            <div class="peer-mentee">
                    <div class="peer-mentee-header">
                        <div class="peer-mentee-img">
                            <img src="/media/profiles/<?php echo $fetch->acc_facebookid ?>.jpg" alt="">
                        </div>
                    </div>
                    <div class="peer-mentee-body">
                        <div class="peer-mentee-content">
                            <h1><?php echo $fetch->acc_firstname.' '.$fetch->acc_lastname ?></h1>
                            <div class="peer-mentee-tags">
                                <?php
                                    $tags = json_decode($fetch->acc_hashtags)+json_decode($fetch->acc_other_hashtags);
                                    foreach ($tags as $value) {
                                        echo "<span>{$value}</span>";
                                    }
                                ?>
                            </div>
                            <p><?php echo $fetch->acc_bio ?></p>
                            <div class="peer-mentee-contact">
                                <?php
                                    if(!empty($fetch->acc_sn_facebook)) {
                                        echo '<a target="_blank" href="'.$fetch->acc_sn_facebook.'"><i class="fab fa-facebook-f"></i></a>';
                                    }
                                    if(!empty($fetch->acc_sn_instagram)) {
                                        echo '<a target="_blank" href="https://instagram.com/'.$fetch->acc_sn_instagram.'"><i class="fab fa-instagram"></i></a>';
                                    }
                                    if(!empty($fetch->acc_sn_line)) {
                                        echo '<a target="_blank" href="https://line.me/ti/p/~'.$fetch->acc_sn_line.'"><i class="fab fa-line"></i></a>';
                                    } else {
                                        echo 'No contact';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            $time = date('Y-m-d');
                            $allowTime = ['2021-09-05', '2021-09-07', '2021-09-09', '2021-09-11'];

                            if(in_array($time, $allowTime)) {

                                $stmt = $db->conn->prepare("SELECT * FROM peer_mentoring_hints WHERE sent_from = ? AND sent_to = ? AND sent_at >= ?");
                                $stmt->bind_param("sss", $peer_mentor, $peer_mentee, $time);
                                $peer_mentor = $_SESSION['authentication']['facebook']['id'];
                                $peer_mentee = $fetch->acc_facebookid;
                                $time = date('Y-m-d 00:00:00');
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if($result->num_rows > 0) {
                        ?>
                        <div class="limit">
                            <h1>คุณได้ส่งคำใบ้สำหรับวันนี้ไปแล้ว</h1>
                        </div>
                        <?php
                                } else {
                        ?>
                        <form id="form-<?php echo $fetch->acc_facebookid ?>">
                            <h1>Hint</h1>
                            <textarea name="hint" rows="2" id="hint-<?php echo $fetch->acc_facebookid ?>"></textarea>
                            <button type="button" onclick="send(<?php echo $fetch->acc_facebookid ?>)">Send</button>
                        </form>
                        <?php
                                }
                            } else {
                        ?>
                        <div class="limit">
                            <h1>ไม่สามารถส่งคำมใบ้ได้ในวันนี้</h1>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            <?php
                        }
                    }
                } else {

                    $stmt = $db->conn->prepare("SELECT * FROM peer_mentoring_hints WHERE sent_to = ?");
                    $stmt->bind_param("s", $peer_mentee);
                    $peer_mentee = $_SESSION['authentication']['facebook']['id'];
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0) {
                        while($fetch = $result->fetch_object()) {
            ?>
                <div class="msg-chat">
                    <div class="msg-chat-body"><span class="material-icons">mode_comment</span><?php echo $fetch->hint ?></div>
                    <span class="msg-chat-date"><?php echo $fetch->sent_at ?></span>
                </div>
            <?php
                        }
                    } else {
                        echo '<p style="text-align: center; margin: 10rem 0">Not found any hint to you.</p>';
                    }
                }
            ?>
        </div>
    </div>
    <footer>
        <p>Copyright 2021 All right reserved — @Codingtime</p>
    </footer>
    <script>
        function send(key) {
            var hint = $('#hint-'+key).val();
            
            if(hint === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Emtpy message',
                    text: 'Please type something',
                })
            } else {
                $.ajax({
                    url: '/api/send_hint',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        hint:hint,
                        id:key
                    },
                    beforeSend: function(){
                        console.log('sending')
                    },
                    success: function(res){
                        var form = '#form-'+key;
                        console.log(form)
                        $(form).html('<div class="limit"><h1>คุณได้ส่งคำใบ้สำหรับวันนี้ไปแล้ว</h1></div>');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                        })
                    },
                    error: function(e){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: e.responseJSON.msg,
                        })
                    }
                });
            }
        }
    </script>
</body>
</html>