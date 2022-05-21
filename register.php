<?php
    require_once(__DIR__.'/modules/facebook.module.php');
	require_once(__DIR__.'/modules/database.module.php');

    $fb = new Login_with_facebook('147605887474105', '5310c85b103366b03f36d6bbf0b795f1');

    if(!$fb->getAccessToken()){
		header('location: /login?error=access_denied');
    }

    $fb->getMe(['first_name', 'last_name', 'picture.type(square).height(500)']);

    $db = new Database();
    $db->connect();

    $query = $db->conn->query("SELECT * FROM accounts WHERE acc_facebookid = '{$fb->me['id']}' LIMIT 1");
    
    if($query->num_rows === 1) {
        $path = __DIR__.'/media/profiles/'.$fb->me['id'].'.jpg';
        if(!file_put_contents($path, file_get_contents($fb->me['picture']['url']))){
            header('location: /login?error=uploadProfilePictureFailed');
            exit();
        }

        $fetchAccount = $query->fetch_object();

        $updateSTMT = $db->conn->prepare('UPDATE accounts SET acc_last_login = ? WHERE acc_facebookid = ? LIMIT 1');
        $updateSTMT->bind_param('ss', $current_datetime, $fb->me['id']);

        $current_datetime = date('Y-m-d H:i:s');
        
        if(!$updateSTMT->execute()) {
            header('location: /login?error=updateTableFailed');
            exit();
        }

        $_SESSION['authentication'] = [
            'first_name' => $fetchAccount->acc_firstname,
            'last_name' => $fetchAccount->acc_lastname,
            'studentid' => $fetchAccount->acc_studentid,
            'facebook' => ['id' => $fb->me['id'], 'access_token' => $fb->accessToken],
            'status' => 'registered',
            'year' => $fetchAccount->acc_year
        ];

        header("location: /");
        exit();
    }

    $_SESSION['temp_fb_picture'] = ['id' => $fb->me['id'], 'url' => $fb->me['picture']['url']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-utilities.css" rel="stylesheet">
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/new/register-style.css">
    <link rel="stylesheet" href="/css/new/bg.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
</head>
<body>
    <input id="key" hidden value="<?php echo $fb->me['id']; ?>">
    <div class="bg">
        <img src="/mars.svg" alt="">
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
    <div class="container">
        <div class="brand">
            <h1>IT BINARY</h1>
            <span>STAR</span>
            <p>สุดขอบฟ้าล่าดาวคู่</p>
        </div>
        <?php
            if(true) {
        ?>
        <div class="form-register">
            <h1>Register</h1>
            <div formNumber="1">
                <div class="form-group">
                    <label for="input-firstname">Firstname</label>
                    <input type="text" id="input-firstname" placeholder="Firstname" require>
                </div>
                <div class="form-group">
                    <label for="input-lastname">Lastname</label>
                    <input type="text" id="input-lastname" placeholder="lastname" require>
                </div>
                <div class="form-group">
                    <label for="input-studentid">Student ID</label>
                    <input type="text" id="input-studentid" placeholder="xx07xxxx" maxlength="8" minlength="8" require>
                </div>
                <div class="form-group">
                    <label for="input-year">Year</label>
                    <select id="input-year" require>
                        <option value="" selected disabled hidden>- Please select your year -</option>
                        <option value="freshman">1st year - Freshman</option>
                        <option value="sophomore">2nd year - Sophomore</option>
                        <option value="junior">3rd year - junior</option>
                        <option value="senior">4th - Senior</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-programme">Programme</label>
                    <select id="input-programme" require>
                        <option value="" selected disabled hidden>- Please select your programme -</option>
                        <option value="IT">IT - Information Technology</option>
                        <option value="DSBA">DSBA - Data Science and Business Analytics</option>
                        <option value="BIT">BIT - Business Information Technology</option>
                    </select>
                </div>
            </div>
            <div formNumber="2" style="display: none;">
                <div class="form-group">
                    <label for="input-tags">Tags</label>
                    <input id="input-tags" require>
                </div>
                <div class="form-group">
                    <label for="input-other-tags">Your tags</label>
                    <input id="input-other-tags">
                </div>
                <div class="form-group">
                    <label for="input-bio">Bio</label>
                    <textarea id="input-bio" rows="4" placeholder="Tell people about your self."></textarea>
                </div>
            </div>
            <div formNumber="3" style="display: none; text-align: center;">
                <h1><span class="material-icons" style="font-size: 2rem;">privacy_tip</span></h1>
                <p>การเลือกดำเนินการต่อนับว่าคุณได้ยินยอมให้ผู้พัฒนาดำเนินการจัดเก็บ ใช้ และเผยแพร่ข้อมูลส่วนบุคคลของคุณ</p>
                <p>กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนดำเนินการในขั้นตอนต่อไป ข้อมูลบางรายการไม่สามารถแก้ไขได้ภายหลัง</p>
            </div>
            <div class="form-navigator" current="1">
                <button class="form-navigator-prev" type="button" style="display: none;"><span class="material-icons">arrow_back</span>Previous</button>
                <button class="form-navigator-next" type="button">Next<span class="material-icons">arrow_forward</span></button>
            </div>
        </div>
        <?php
            } else {
        ?>
            <div class="form-register">
                <h1>ปิดรับสมัคร</h1>
            </div>
        <?php
            }
        ?>
    </div>
    <script src="/js/new/register.js"></script>
</body>
</html>