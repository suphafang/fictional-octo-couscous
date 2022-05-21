$('#form-profile').submit(function(event){
    event.preventDefault()

    var bio = $('#input-bio').val()
    var rawTags = $('#input-tags').val()

    var tags = [];
    var jsonTags = [];

    if(rawTags !== '') {
        jsonTags = JSON.parse(rawTags)
    }

    for(let i in jsonTags){
        tags.push(jsonTags[i].value);
    }

    tags = JSON.stringify(tags);

    $.ajax({
        url: '/api/update?type=profile',
        type: 'POST',
        dataType: 'JSON',
        data: {
            bio: bio,
            tags: tags
        },
        beforeSend: function(){
        },
        success: function(res){
            Swal.fire({
                icon: 'success',
                title: 'Updated',
            })
        },
        error: function(err){
            console.log(err);
        }
    });
})

$('#form-contact').submit(function(event){
    event.preventDefault()

    var facebook = $('#input-facebook').val()
    var instagram = $('#input-instagram').val()
    var line = $('#input-line').val()

    $.ajax({
        url: '/api/update?type=contact',
        type: 'POST',
        dataType: 'JSON',
        data: {
            facebook: facebook,
            instagram: instagram,
            line: line
        },
        beforeSend: function(){
        },
        success: function(res){
            Swal.fire({
                icon: 'success',
                title: 'Updated',
            })
        },
        error: function(err){
            console.log(err);
        }
    });
})
