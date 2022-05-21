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
    <title>IT Binary Star 2021</title>
    <link rel="icon" href="icon.png" type="image/jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-utilities.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bg.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <meta property="og:title" content="IT Binary Star 2021" />
    <meta property="og:description" content="IT Binary Star for freshy IT KMITL 2021" />
    <meta property="og:image" content="https://ibs21.codingtime.dev/media/default-profile.png" />

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
            <a href="/" class="navbar-link active"><span class="material-icons navbar-link-icons">home</span><span class="navbar-link-text">Home</span></a>
            <a href="/peer-mentoring" class="navbar-link"><span class="material-icons navbar-link-icons">groups</span><span class="navbar-link-text">Peer mentoring</span></a>
            <a href="/help" class="navbar-link"><span class="material-icons navbar-link-icons">help</span><span class="navbar-link-text">Help</span></a>
            <a href="/logout" class="navbar-link logout"><span class="material-icons navbar-link-icons">logout</span><span class="navbar-link-text">Logout</span></a>
            <a href="/profile" class="navbar-link account"><span class="material-icons navbar-link-icons">person</span><span class="navbar-link-text">My Profile</span></a>
        </div>
    </div>
    <div class="container">
        <?php
            if(strtotime(date("Y-m-d H:i:s")) < strtotime(date("2021-09-4 00:00:00")) && $_SESSION['authentication']['year'] === 'freshman') {
        ?>
        <div class="news">
            <p>🔔 อัพเดท! ทุกคนสามารถเห็นหน้าของรุ่นพี่ทั้งหมดได้แล้วววว วู้วววว!!!</p>
        </div>
        <?php
            }
        ?>
        <div class="header">
            <h1>Profile list</h1>
            <?php
                if($_SESSION['authentication']['year'] !== 'freshman') {
                    echo '<p>Display profile of freshman.</p>';
                } else {
                    echo '<p>Display profile who you can send messages to them.</p>';
                }
            ?>
        </div>
        <div class="status-card">
            <?php
                if($_SESSION['authentication']['year'] === 'freshman') {
            ?>
            <div class="status-card-item">
                <div>
                    <h1>Sent</h1>
                    <p><span id="totalMeessage">N/A</span>Message(s)</p>
                </div>
                <span class="material-icons">mail</span>
            </div>
            <div class="status-card-item">
                <div>
                    <h1>You can send message to</h1>
                    <p><span id="totalAccount">N/A</span>Account(s)</p>
                </div>
                <span class="material-icons">groups</span>
            </div>
            <?php
                } else {
            ?>
            <div class="status-card-item">
                <div>
                    <h1>Received</h1>
                    <p><span id="totalMeessage">N/A</span>Message(s)</p>
                </div>
                <span class="material-icons">mail</span>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="search">
            <input id="filter-search" class="filter-input" type="text" placeholder="Search by name">
            <select name="" id="filter-year" class="filter-select">
                <?php
                    if($_SESSION['authentication']['year'] !== 'freshman') {
                        echo '<option value="Freshman">Freshman</option>';
                    } else {
                        echo '<option value="Sophomore">Sophomore</option>';
                        echo '<option value="Junior">Junior</option>';
                        echo '<option value="Senior">Senior</option>';
                    }
                ?>
            </select>
        </div>
        <div class="container-profile-card">
        </div>
        <p id="profile-loading" class="profile-notfound" style="display: none;"><span class="material-icons">sentiment_neutral</span>Loading...</p>
        <p id="profile-notfound" class="profile-notfound" style="display: none;"><span class="material-icons">sentiment_neutral</span>Not found any profile card.</p>
    </div>
    <div class="modal" style="display: none;">
        <div class="modal-card">
            <div class="modal-card-header">
                <button class="modal-close" id="modal-close"><i class="fas fa-times"></i></button>
                <h1 id="modal-year">{{year}}</h1>
                <img id="modal-picture" src="https://media.discordapp.net/attachments/801830599589101608/877887395188592740/last.png?width=676&height=676" alt="">
            </div>
            <div class="modal-card-body">
                <h1 id="modal-fullname">{{fullname}}</h1>
                <p id="modal-bio">{{bio}}</p>
                <div class="modal-card-tags"></div>
                <div class="modal-card-body-contact"></div>
                <div class="modal-card-message">
                    <?php
                        if($_SESSION['authentication']['year'] === 'freshman') {
                    ?>
                    <textarea id="modal-message-send" rows="5" placeholder="Send something to them"></textarea>
                    <button type="button" id="modal-message-send-button">Send message</button>
                    <?php
                        } else {
                    ?>
                        <textarea id="modal-message-display" rows="5" readonly></textarea>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright 2021 All right reserved — @Codingtime</p>
    </footer>
    <script src="/js/filter.js"></script>
    <script>
        var cardContainer = $('.container-profile-card')
        var cardTemplate = '\
        <div style="display: none;" class="profile-card" year="{{year}}" fullname="{{fullname}}">\
            <div class="profile-card-header">\
                <span class="profile-tag-sent" style="display: {{sent-display}};">{{sent-message}}</span>\
                <div class="profile-image">\
                    <img loading="lazy" src="{{picture}}" alt="">\
                </div>\
                <div class="profile-card-header-detail">\
                    <div>\
                        <h1>{{fullname}}</h1>\
                        <p>{{bio}}</p>\
                    </div>\
                </div>\
            </div>\
            <div class="profile-card-body">\
                <button class="profile-card-header-button" type="button" onclick="modal({{key}})">\
                    <span class="material-icons">assignment_ind</span>\
                </button>\
                <div class="profile-card-body-detail">\
                    <div>\
                        <h1 id="profile-year">{{year}}</h1>\
                        <p>Status</p>\
                    </div>\
                    <div>\
                        <h1>{{programme}}</h1>\
                        <p>Programme</p>\
                    </div>\
                </div>\
            </div>\
        </div>'
        $.ajax({
            url: '/api/profilesList',
            type: 'GET',
            dataType: 'JSON',
            async: true,
            beforeSend: function(){
                $('#profile-notfound').css('display', 'none')
                $('#profile-loading').css('display', 'block')
            },
            success: function(res){
                var freshman = <?php 
                    echo ($_SESSION['authentication']['year'] === 'freshman') ? 'true' : 'false'; 
                ?>;

                $('#totalMeessage').text(res.total_message)
                <?php
                    if($_SESSION['authentication']['year'] === 'freshman') {
                ?>
                $('#totalAccount').text(res.qty)
                <?php
                    }
                ?>

                for(let i = 0; i < res.qty; i++) {
                    var card = cardTemplate;
                    card = card.replace(/{{year}}/g, res.data[i].year);
                    card = card.replace(/{{fullname}}/g, res.data[i].fullname);
                    card = card.replace(/{{programme}}/g, res.data[i].programme);
                    card = card.replace(/{{key}}/g, res.data[i].key);
                    card = card.replace(/{{bio}}/g, res.data[i].bio.substring(0,60));
                    card = card.replace(/{{picture}}/g, res.data[i].picture);

                    if(freshman) {
                        card = card.replace(/{{sent-message}}/g, 'Message was sent.')
                    } else {
                        card = card.replace(/{{sent-message}}/g, 'Received message.')
                    }

                    if((!freshman && res.data[i].message) || (freshman && !res.data[i].message)) {
                        if(freshman) {
                            card = card.replace(/{{sent-display}}/g, 'none')
                        } else {
                            card = card.replace(/{{sent-display}}/g, 'block')
                        }
                    } else if((!freshman && !res.data[i].message) || (freshman && res.data[i].message)) {
                        if(freshman) {
                            card = card.replace(/{{sent-display}}/g, 'block')
                        } else {
                            card = card.replace(/{{sent-display}}/g, 'none')
                        }
                    }

                    cardContainer.html(cardContainer.html()+card);
                }
                $('#profile-loading').css('display', 'none')
                filterYear();
            },
            error: function(err){
                console.log(err)
            }
        })
    </script>
    <script src="/js/modal.js"></script>
</body>
</html>