$('#modal-close').click(function(){
    $('.modal').fadeOut(200, function(){
        $('.modal').css('display', 'none');
    })
});
function modal(ref){
    var contactArea = $('.modal-card-body-contact');
    var tags = $('.modal-card-tags');

    console.log(ref)
    
    $.ajax({
        url: '/api/profiles',
        type: 'GET',
        dataType: 'JSON',
        data: {
            id:ref
        },
        beforeSend: function(){
            contactArea.html('');
            $('#modal-message-send').val('');
            tags.html('');
        },
        success: function(res){
            $('#modal-year').text(res.year)
            $('#modal-fullname').text(res.firstname+' '+res.lastname)
            $('#modal-bio').text(res.bio)
            $('#modal-picture').attr('src', res.picture)

            for(let i = 0; i < res.hashtags.length; i++) {
                tags.html(tags.html()+'<span>'+res.hashtags[i]+'</span>')
            }
            for(let i = 0; i < res.other_hashtags.length; i++) {
                tags.html(tags.html()+'<span>'+res.other_hashtags[i]+'</span>')
            }

            if(res.facebook !== '') {
                contactArea.html(contactArea.html()+'<a target="_blank" href="'+res.facebook+'" class="modal-contact-facebook"><i class="fab fa-facebook-f"></i></a>');
            }
            if(res.instagram !== '') {
                contactArea.html(contactArea.html()+'<a target="_blank" href="//instagram.com/'+res.instagram+'" class="modal-contact-instagram"><i class="fab fa-instagram"></i></a>');
            }
            if(res.line !== '') {
                contactArea.html(contactArea.html()+'<a target="_blank" href="//line.me/ti/p/~'+res.line+'" class="modal-contact-line"><i class="fab fa-line"></i></a>');
            }

            if(document.getElementById('modal-message-send')) {
                console.log('found')
                if(res.message[0] === false) {
                    $('#modal-message-send-button').css('display', 'block')
                    $('#modal-message-send-button').attr('ref', ref)
                    $('#modal-message-send').removeAttr('readonly')
                } else {
                    $('#modal-message-send-button').css('display', 'none')
                    $('#modal-message-send').attr('readonly', 'true')
                    $('#modal-message-send').val(res.message[1])
                }
            } else {
                if(res.message[0] === false) {
                    $('#modal-message-display').css('display', 'none')
                } else {
                    $('#modal-message-display').css('display', 'block')
                    $('#modal-message-display').val(res.message[1])
                }
            }


            $('.modal').fadeIn(200, function(){
                $('.modal').css('display', 'flex')
            })
        },
        error: function(err){
            console.log(err)
        }
    });
};

$('#modal-message-send-button').click(function(){
    var ref = $(this).attr('ref')
    var message = $('#modal-message-send').val()
    if(!message) {
        alert('Please type a message before send.')
        return false;
    }
    $.ajax({
        url: '/api/message',
        type: 'POST',
        dataType: 'JSON',
        data: {
            receiver: ref,
            message: message
        },
        beforeSend: function(){
        },
        success: function(res){
            $('#modal-message-send-button').css('display', 'none')
            $('#modal-message-send').attr('readonly', 'true')
            Swal.fire({
                icon: 'success',
                title: 'Sent',
            })
        },
        error: function(err){
            console.log(err)
        }
    })
})
