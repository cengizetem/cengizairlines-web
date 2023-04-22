$(document).ready(function() {
    
    $.post("src/server/user_logined.php", function(data) {
        $("body").append(data);
    })

    $("#hiba").hide();
    $('#belepes').click(function() {
        $("#hiba").hide();
        $("#uzenet").empty();
        var username = $("#username").val();
        var passwd = $("#passwd").val();

        if (username.length == 0 || passwd.length == 0) {
            $("#uzenet").append("Kérem mindengyiket töltse ki!")
            $("#hiba").show();
        }
        else {
            $.post("src/server/user.php", {username: username,passwd: passwd }, function(data) {
                $("#uzenet").append(data)
                $("#hiba").show();
            })
        }
    });
  
});