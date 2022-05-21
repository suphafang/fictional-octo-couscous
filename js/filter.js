function filterYear() {
    var fetch = document.querySelectorAll('.profile-card');
    var found = 0;

    for(let i = 0; i < fetch.length; i++) {
        if(fetch[i].getAttribute('year') !== $('#filter-year').val()) {
            fetch[i].style.display = 'none';
        } else {
            fetch[i].style.display = 'block';
            found++;
        }
    }
    
    $('#filter-search').val('');

    if(found === 0) {
        $('#profile-notfound').css('display', 'block');
    } else {
        $('#profile-notfound').css('display', 'none');
    }
}
function filterSearchByName() {
    var fetch = document.querySelectorAll('.profile-card');
    var found = 0;
    for(let i = 0; i < fetch.length; i++) {
        if(fetch[i].getAttribute('fullname').toLowerCase().search($('#filter-search').val().toLowerCase()) >= 0 && fetch[i].getAttribute('year') === $('#filter-year').val()) {
            fetch[i].style.display = 'block';
            found++;
        } else {
            fetch[i].style.display = 'none';
        }
    }
    if(found === 0) {
        $('#profile-notfound').css('display', 'block');
    } else {
        $('#profile-notfound').css('display', 'none');
    }
}
$(document).ready(function() {

    $('#filter-year').change(function(){
        filterYear();
    })

    $('#filter-search').keyup(function(){
        filterSearchByName();
    })
});