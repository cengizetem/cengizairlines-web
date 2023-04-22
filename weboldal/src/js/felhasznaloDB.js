$(document).ready(function(){

//#region all
    $.post("../src/server/felhasznalo/felhasznaloDBAll.php", function(felhasznalok) {
        $("tbody").html(felhasznalok);
    })
//#endregion 
    
    $("#update-form").hide();
    $( "#update-message" ).hide();
    $( "#felvetel-form" ).hide();
    $( "#felvetel-message" ).hide();
    
    
//#region kereses
    $("#kereses-real-time").keyup(function() {
        kereses = $("#kereses-real-time").val();
        $.post("../src/server/felhasznalo/felhasznalokereses.php", {kereses: kereses} ,function(felhasznalok) {
            $("tbody").html(felhasznalok);
        })
    })
//#endregion 

//#region felvetel
    $("#adatfelvetel").click(function() {
                document.getElementById("felvetelform").reset();
                $("#hibafelvetel").hide();
                $("#felveteluzenet").empty();
                    ujusername = ""
                    ujpasswd = ""
                    $("#felvetel-form").dialog({
                      modal: true,
                      buttons: {
                        Felvétel: function() {
                          $("#hibafelvetel").hide();
                          $("#felveteluzenet").empty();

                          ujusername =  $("#uj-username-form").val();
                          ujpasswd =  $("#uj-jelszo-form").val();



                          if (ujusername.length == 0 || ujpasswd.length  == 0)
                             {
                                $("#felveteluzenet").append("Üres inputot adtál meg!")
                                $("#hibafelvetel").show();
                            }
                            else {
                                $( this ).dialog( "close" );
                                $.post("../src/server/felhasznalo/felhasznalofelvetel.php", {felhasznalo: ujusername, passwd: ujpasswd }, function(data) {})
                                $("#felvetel-message").dialog({
                                  modal: true,
                                  buttons: {
                                    Ok: function() {
                                      $( this ).dialog( "close" );
                                      $.post("../src/server/felhasznalo/felhasznaloDBAll.php", function(felhasznalok) {
                                        $("tbody").html(felhasznalok);
                                    })
                                    }
                                  }
                                });
                                $.post("../src/server/felhasznalo/felhasznaloDBAll.php", function(felhasznalok) {
                                  $("tbody").html(felhasznalok);
                              })                    
                                
                            }
                      },
                      Bezárni: function() {
                        $(this).dialog("close");
                      }
                      }
                    })
    });
//#endregion

//#region delete
    $("tbody").on("click", "#delete" , function() { 
        var username = $(this).val();
        $("#tr_" + username).remove()
        $.post("../src/server/felhasznalo/felhasznalotorles.php", {username: username} ,function() {})
    })
//#endregion 


//#region update
    $("tbody").on("click", "#update" , function() {
                  $("#hibaupdate").hide();
                    $("#updateuzenet").empty();
            var felhasznaloUpdate = $(this).val();
            document.getElementById("updateform").reset();
            $("#username-form").attr("value", felhasznaloUpdate);
            $("#update-form").dialog({
                modal: true,
                buttons: {
                  Módosít: function() {
                    $("#hibaupdate").hide();
                    $("#updateuzenet").empty();

                    var felhasznalo = $("#username-form").val()
                    var jelszo = $("#jelszo-form").val()
                    
                    if(jelszo.length == 0) {
                      $("#updateuzenet").append("Üres a jelszó bemenet!");
                      $("#hibaupdate").show();
                    }
                    else {
                      $( this ).dialog( "close" );
                            $.post("../src/server/felhasznalo/felhasznaloDBUpdate.php", {felhasznalo: felhasznalo, jelszo: jelszo }, function(data) {
                                $("#tr_" + felhasznalo).html(data)
                            })                        
                            $( "#update-message" ).dialog({
                                modal: true,
                                buttons: {
                                  Ok: function() {
                                    $( this ).dialog( "close" );
                                  }
                                }
                              });
                    }

                  },
                  Bezárni: function() {
                    $(this).dialog("close");
                  }
                }
              });
              
    });
//#endregion 
});


