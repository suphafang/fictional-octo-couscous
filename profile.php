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

    $db = new Database;
    $db->connect();

    $queryInfo = $db->conn->query("SELECT * FROM accounts WHERE acc_facebookid = '{$_SESSION['authentication']['facebook']['id']}'");
    
    $accountInfo = $queryInfo->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - IT Binary Star 2021</title>
    <link rel="icon" href="icon.png" type="image/jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-utilities.css" rel="stylesheet">
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/new/style.css">
    <link rel="stylesheet" href="/css/new/bg.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
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
            <a href="/peer-mentoring" class="navbar-link"><span class="material-icons navbar-link-icons">groups</span><span class="navbar-link-text">Peer mentoring</span></a>
            <a href="/help" class="navbar-link"><span class="material-icons navbar-link-icons">help</span><span class="navbar-link-text">Help</span></a>
            <a href="/logout" class="navbar-link logout"><span class="material-icons navbar-link-icons">logout</span><span class="navbar-link-text">Logout</span></a>
            <a href="/profile" class="navbar-link account"><span class="material-icons navbar-link-icons">person</span><span class="navbar-link-text">My Profile</span></a>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <h1>My profile</h1>
            <p>Display your personal data. You can update your data through this page.</p>
        </div>
        <div class="content">
            <a href="/logout" class="btn-logout">Logout</a>
            <div class="form-card">
                <form class="card-profile" id="form-profile">
                    <h2>Profile</h2>
                    <div class="form-group">
                        <label class="form-label" for="input-fullname">Name (Can't change)</label>
                        <input class="form-input disable" type="text" id="input-fullname" value="<?php echo $_SESSION['authentication']['first_name'].' '.$_SESSION['authentication']['last_name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-year">Year (Can't change)</label>
                        <input class="form-input disable" type="text" id="input-year" value="<?php echo $_SESSION['authentication']['year']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-studentid">Student ID (Can't change)</label>
                        <input class="form-input disable" type="text" id="input-studentid" value="<?php echo $_SESSION['authentication']['studentid']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-fullname">Bio (Max length: 150 Character)</label>
                        <textarea class="form-input" id="input-bio" rows="5" maxlength="150" placeholder="Type something for your bio."><?php echo $accountInfo->acc_bio; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-tags">Your interesting tags (Do not begin with '#'. Press enter for add new tag.)</label>
                        <input class="form-input" id="input-tags" value='<?php 
                            $tags = [];
                            foreach(json_decode($accountInfo->acc_other_hashtags) as $value){
                                $tags[] = ['value' => $value];
                            }
                            echo json_encode($tags);
                        ?>'>
                    </div>
                    <button type="submit" class="form-btn-submit"><span class="material-icons">save</span> SAVE</button>
                </form>
                <form class="card-profile" id="form-contact">
                    <h2>Contact</h2>
                    <div class="form-group">
                        <label class="form-label" for="input-fullname">Facebook (Type url with protocal (e.g. https://))</label>
                        <input class="form-input" id="input-facebook" type="url" value="<?php echo $accountInfo->acc_sn_facebook; ?>" placeholder="e.g. https://facebook.com/yourFacebook">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-fullname">Instagram ID (Only ID, Don't type URL)</label>
                        <input class="form-input" id="input-instagram" type="text" value="<?php echo $accountInfo->acc_sn_instagram; ?>" placeholder="e.g. suphafang">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-fullname">Line ID</label>
                        <input class="form-input" id="input-line" type="text" value="<?php echo $accountInfo->acc_sn_line; ?>" placeholder="e.g. YourLineID">
                    </div>
                    <button type="submit" class="form-btn-submit"><span class="material-icons">save</span> SAVE</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright 2021 All right reserved — @Codingtime</p>
    </footer>
    <script>
        var tagify = new Tagify(document.getElementById('input-tags'));
    </script>
    <script src="/js/new/update_profile.js"></script>
</body>
</html>