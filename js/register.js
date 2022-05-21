var tags = new Tagify(document.getElementById('input-tags'), {
    enforceWhitelist: true,
    whitelist: [
        "เทรด Crypto",
        "หุ้น",
        "การเมือง",
        "Art",
        "Movies",
        "series",
        "animes",
        "sitcom",
        "(ชอบเค้า แต่เค้าไม่ชอบ ;^;)",
        "รถ",
        "ธรรมชาติ",
        "Coding",
        "Startup",
        "อ่านหนังสือ",
        "วาดรูป",
        "ประวัติศาสตร์",
        "fashion",
        "Clubhouse",
        "Social Media",
        "นอน",
        "Meme",
        "Variety",
        "ละคร",
        "Musical(ละครเวที)",
        "Socialize",
        "Youtuber",
        "ASMR",
        "ชอบกิน",
        "Cosplay",
        "ออกกำลังกาย",
        "สเกตบอร์ด",
        "สัตว์เลี้ยง",
        "ฟังเพลง",
        "K-pop",
        "T-pop",
        "J-pop",
        "กีฬา",
        "ดนตรี",
        "สะสมของ",
        "ทำอาหาร",
        "ร้องเพลง",
        "Cover Dance",
        "เต้น",
        "เล่นเกม",
        "ถ่ายรูป",
        "ท่องเที่ยว",
        "technology",
        "ดูดวง",
        "วิทยาศาสตร์",
        "ฟังเรื่องเหนือธรรมชาติ"
    ],
    dropdown: {
        position: "input",
        maxItems: 100,
        enabled: 0
    }
});
var othertags = new Tagify(document.getElementById('input-other-tags'));

const buttonNext = $('.form-navigator-next')
const buttonPrev = $('.form-navigator-prev')

buttonNext.click(function(){
    var current = $('.form-navigator')

    if(parseInt(current.attr('current')) < 3) {
        $('[formNumber='+current.attr('current')+']').fadeOut(200, function(){
            current.attr('current', parseInt(current.attr('current'))+1)
    
            if(current.attr('current') !== '1') {
                buttonPrev.css('display', 'flex')
            }
            if(current.attr('current') === '3') {
                buttonNext.html('Register<span class="material-icons">login</span>')
            }
    
            $('[formNumber='+current.attr('current')+']').fadeIn(200)
        })
    } else {
        var firstname = $('#input-firstname').val()
        var lastname = $('#input-lastname').val()
        var studentid = $('#input-studentid').val()
        var year = $('#input-year').val()
        var programme = $('#input-programme').val()
        var tags = $('#input-tags').val()
        var otherTags = $('#input-other-tags').val()
        var bio = $('#input-bio').val()

        var getInputElements = document.querySelectorAll('[require]')

        var invalidNum = 0;

        for (let index = 0; index < getInputElements.length; index++) {
            if(getInputElements[index].value === '' || !getInputElements[index].value) {
                console.log(getInputElements[index])
                invalidNum++;
            }
        }

        if(invalidNum > 0) {
            Swal.fire({
                icon: 'error',
                title: 'กรุณากรอกข้อมูลให้ครบถ้วน'
            })
            return false;
        }

        var processTags = [];
        var jsonTags = [];
        jsonTags = JSON.parse(tags)
        for(let i in jsonTags){
            processTags.push(jsonTags[i].value);
        }
        tags = JSON.stringify(processTags);

        var processOtherTags = [];
        var jsonOtherTags = [];
        if(otherTags !== '') {
            jsonOtherTags = JSON.parse(otherTags)
        }
        for(let i in jsonOtherTags){
            processOtherTags.push(jsonOtherTags[i].value);
        }
        otherTags = JSON.stringify(processOtherTags);

        $.ajax({
            url: "/api/register",
            type: "post",
            dataType: "json",
            data: {
                facebookid: $('#key').val(),
                firstname: firstname,
                lastname: lastname,
                studentid: studentid,
                year: year,
                programme: programme,
                bio: bio,
                hashtages: tags,
                otherHashtages: otherTags,
            },
            beforeSend: function(){
            },
            success: function(res){
                window.location.replace('/');
            },
            error: function(err){
                console.log(err);
            }
        });
    }
})

buttonPrev.click(function(){
    var current = $('.form-navigator')
    $('[formNumber='+current.attr('current')+']').fadeOut(200, function(){
        current.attr('current', parseInt(current.attr('current'))-1)

        if(current.attr('current') === '1') {
            buttonPrev.css('display', 'none')
        }

        buttonNext.removeAttr('id')
        buttonNext.html('Next<span class="material-icons">arrow_forward</span>')

        $('[formNumber='+current.attr('current')+']').fadeIn(200)
    })
})
