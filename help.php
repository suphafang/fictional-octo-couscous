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
    <title>Help - IT Binary Star 2021</title>
    <link rel="icon" href="icon.png" type="image/jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap-utilities.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/new/style.css">
    <link rel="stylesheet" href="/css/new/bg.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <a href="/help" class="navbar-link active"><span class="material-icons navbar-link-icons">help</span><span class="navbar-link-text">Help</span></a>
            <a href="/logout" class="navbar-link logout"><span class="material-icons navbar-link-icons">logout</span><span class="navbar-link-text">Logout</span></a>
            <a href="/profile" class="navbar-link account"><span class="material-icons navbar-link-icons">person</span><span class="navbar-link-text">My Profile</span></a>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <h1>HELP</h1>
            <p>The place that help you lern about this website.</p>
        </div>
        <div class="content">
            <div class="content-help">
                <details class="card-help">
                    <summary>รายละเอียดชั้นปี</summary>
                    <div class="card-help-detail">
                        <ul>
                            <li>Freshman : นักศึกษาชั้นปีที่ 1</li>
                            <li>Sophomore : นักศึกษาชั้นปีที่ 2</li>
                            <li>Junior : นักศึกษาชั้นปีที่ 3</li>
                            <li>Senior : นักศึกษาชั้นปีที่ 4</li>
                        </ul>
                    </div>
                </details>
            </div>
            <div class="content-help">
                <details class="card-help">
                    <summary>ระบบทักทายพี่</summary>
                    <div class="card-help-detail">
                        <p>ในหน้าแรกของเว็บไซต์จะรวบรวมรายชื่อรุ่นพี่จากทุกชั้นปีที่เข้าร่วมตั้งแต่ปี 2 ไปจนถึงรุ่นพี่ปี 3 และปี 4 โดยรุ่นพี่ทุกคนที่น้องได้ทักไป จะมีโอกาสได้เป็นพี่รหัสของน้อง! โดยวิธีการทักทายพี่ มีดังนี้</p>
                        <ol>
                            <li>ดูรายชื่อรุ่นพี่ในหน้าแรกของเว็บไซต์ ซึ่งในการ์ดของพี่ ๆ แต่ละคนจะมี ชื่อ ชั้นปี ข้อความแนะนำตัว และแฮชแท็กเฉพาะตัว ซึ่งน้องสามารถหารุ่นพี่ที่มีความชอบเหมือนกับน้อง ๆ ได้จากแฮชแท็กนี้เลย</li>
                            <li>เมื่อน้อง ๆ ต้องการจะทักพี่คนไหนสามารถกดที่สัญลักษณ์ ‘+’ ตรงกลางของการ์ดและระบบ จะขึ้นพื้นที่ให้น้อง ๆ เขียนข้อความ</li>
                            <li>เมื่อเขียนข้อความเสร็จสิ้นให้กดปุ่มส่งข้อความ ระบบจะส่งข้อความของน้อง ๆ ไปหาพี่ที่น้องเขียนให้ โดยน้องสามารถส่งข้อความได้เพียงรอบเดียวเพราะฉะนั้นคิดข้อความที่จะส่งดี ๆ ล่ะ</li>
                            <li>เมื่อน้องส่งข้อความทักทายเสร็จสิ้นน้องจะไม่สามารถส่งข้อความให้พี่คนนั้นได้อีก โดนส่วนกล่องข้อความของการ์ดนั้นจะหายไป</li>
                        </ol>
                    </div>
                </details>
            </div>
            <div class="content-help">
                <details class="card-help">
                    <summary>การสุ่มพี่รหัส</summary>
                    <div class="card-help-detail">
                        <p>หลังจากที่หมดช่วงเวลาให้น้องได้ทักพี่แล้ว ระบบจะเข้าสู่ช่วงของการสุ่มโดยมีหลักในการสุ่ม ดังนี้</p>
                        <ol>
                            <li>ระบบจะสุ่มรายชื่อพี่ จากรายชื่อพี่ที่น้อง ๆ ได้ทักไปทั้งหมด เพราะฉะนั้นอยากได้พี่คนไหนก็จงเลือกให้ดี</li>
                            <li>ระบบจะเรียงลำดับการสุ่มจากคนที่ทักพี่ได้มากที่สุดไปจนถึงน้อยที่สุด โดยหากรายชื่อพี่ของน้องได้ถูกเลือกจนครบก่อนจะถึงรอบ ระบบจะทำการสุ่มจากรุ่นพี่ที่เหลือทั้งหมดแทน เพราะฉะนั้นจงกะจำนวนพี่ให้ดีเพื่อให้ได้พี่ที่น้องต้องการ</li>
                        </ol>
                    </div>
                </details>
            </div>
            <div class="content-help">
                <details class="card-help">
                    <summary>ระบบการใบ้</summary>
                    <div class="card-help-detail">
                        <p>หลังจากที่สุ่มรายชื่อพี่รหัสจนครบจะเข้าสู่ช่วงเวลาของการหาพี่รหัสกันแล้ว ! โดยตรงเมนูจะมีเมนู “กล่องคำใบ้” ขึ้นมา ซึ่งน้องทุกสามารถเข้าไปดูคำใบ้ของพี่ตนเองได้ ดังนี้</p>
                        <ol>
                            <li>เมื่อเข้ามาที่หน้าเมนู กล่องคำใบ้ ในส่วนล่างจะมี Pop up ขึ้นมาให้น้อง ๆ ได้กดดู โดยเมื่อกดดูก็จะขึ้นคำใบ้ของพี่ที่น้อง ๆ ได้ขึ้นมา</li>
                            <li>เมื่อรับคำใบ้เสร็จ คำใบ้ที่น้องได้จะถูกนำไปเก็บที่ช่องประวัติคำใบ้ ซึ่งน้องจะสามารถกลับมาดูคำใบ้ที่ตนเองได้ที่ตรงนี้</li>
                            <li>โดยเมื่อกดรับคำใบ้แต่ละครั้งแล้วระบบก็นับถอยหลังเวลาที่น้องจะสามารถกดคำใบ้ครั้งต่อไปได้</li>
                        </ol>
                        <p>ดูคำใบ้ให้ดีแล้วตามหา “คู่ดาว” ของน้องให้เจอก่อนกิจกรรมวันสุดท้ายให้ได้ล่ะ !😉</p>
                    </div>
                </details>
            </div>
            <div class="content-help">
                <details class="card-help">
                    <summary>อื่น ๆ</summary>
                    <div class="card-help-detail">
                        <p>หากน้อง ๆ ต้องการแก้ไขข้อมูลส่วนตัวต่าง ๆ รวมถึงข้อมูลการติดต่อ สามารถแก้ไขได้โดย</p>
                        <ol>
                            <li>กดดูที่เมนู Profile ของน้อง ๆ จะขึ้นหน้าที่ให้น้อง ๆ สามารถแก้ข้อมูลพื้นฐานได้</li>
                            <li>เมื่อแก้ไขเสร็จสิ้นให้กดที่ปุ่ม บันทึก เพื่อบันทึกข้อมูลที่แก้ไข</li>
                        </ol>
                        <p>ดูคำใบ้ให้ดีแล้วตามหา “คู่ดาว” ของน้องให้เจอก่อนกิจกรรมวันสุดท้ายให้ได้ล่ะ !😉</p>
                    </div>
                </details>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright 2021 All right reserved — @Codingtime</p>
    </footer>
</body>
</html>