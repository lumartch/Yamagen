$("#profile").on('click', function(){
    $("#contInfo").load("/js/sidebar/profile.html");                    
});

$("#pub_user").on('click', function() {
    $("#contInfo").load("/js/sidebar/pub_user.html");
});
