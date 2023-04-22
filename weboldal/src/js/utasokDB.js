$(document).ready(function(){
  samekey("ok")
    $.post("../src/server/utas/utasDBAll.php", function(utasdata) {
        $("tbody").html(utasdata);
    })
    $("#update-form").hide();
    $( "#update-message" ).hide();
    $( "#felvetel-form" ).hide();
    $( "#felvetel-message" ).hide();
    
    

    $("#kereses-real-time").keyup(function() {
        kereses = $("#kereses-real-time").val();
        $.post("../src/server/utas/utaskereses.php", {kereses: kereses} ,function(utasdata) {
            $("tbody").html(utasdata);
        })
    })

    $("#adatfelvetel").click(function() {
                document.getElementById("felvetelform").reset();
                    ujutlevelSzam = ""
                    ujnev = ""
                    ujszulIdo = ""
                    ujtelefon = ""
                    ujemail = ""
                    ujszulIdo = ""
                    $("#felvetel-form").dialog({
                      modal: true,
                      buttons: {
                        Felvétel: function() {
                          $("#hibafelvetel").hide();
                          $("#felveteluzenet").empty();

                         

                          ujutlevelSzam =  $("#uj-utlevel-form").val();
                          ujnev =  $("#uj-nev-form").val();
                          ujszulIdo =  $("#uj-szulIdo-form").val();
                          ujtelefon =  $("#uj-telefon-form").val();
                          ujemail =  $("#uj-email-form").val();


                          if (ujnev.length == 0 || ujutlevelSzam.length  == 0 || ujtelefon.length == 0 ||
                            ujemail.length == 0 || ujszulIdo == "" || !isEmail(ujemail) || !isMobile(ujtelefon) || !isUtlevel(ujutlevelSzam)
                            ) {
                                $("#felveteluzenet").append("Hibás vagy üres inputot adtál meg!")
                                $("#hibafelvetel").show();
                            }
                            else {
                                $( this ).dialog( "close" );
                                $.post("../src/server/utas/utasfelvetel.php", {utlevelSzam: ujutlevelSzam, nev: ujnev,szulIdo: ujszulIdo ,telefon: ujtelefon ,email: ujemail }, function(data) {})
                                $("#felvetel-message").dialog({
                                  modal: true,
                                  buttons: {
                                    Ok: function() {
                                      $( this ).dialog( "close" );
                                      $.post("../src/server/utas/utasDBAll.php", function(utasdata) {
                                        $("tbody").html(utasdata);
                                    })
                                    }
                                  }
                                });
                                $.post("../src/server/utas/utasDBAll.php", function(utasdata) {
                                  $("tbody").html(utasdata);
                              })                      
                                
                            }
                      },
                      Bezárni: function() {
                        $(this).dialog("close");
                      }
                      }
                    })
    });

    $("tbody").on("click", "#delete" , function() { 
        var szemelyTorles = $(this).val();
        $("#tr_" + szemelyTorles).remove()
        $.post("../src/server/utas/utastorles.php", {szemelyTorles: szemelyTorles} ,function() {})
    })


    $("tbody").on("click", "#update" , function() {
            var szemelyUpdate = $(this).val();

            $("#utlevel-form").attr("value", $(this).val());
            $("#nev-form").attr("value", $("#neve_" + szemelyUpdate).text());
            $("#szulIdo-form").attr("value", $("#szulido_" + szemelyUpdate).text());
            $("#telefon-form").attr("value", $("#telefonszam_" + szemelyUpdate).text());
            $("#email-form").attr("value", $("#email_" + szemelyUpdate).text());

            document.getElementById("updateform").reset();

            $("#update-form").dialog({
                modal: true,
                buttons: {
                  Módosít: function() {
                    $("#hibaupdate").hide();
                    $("#updateuzenet").empty();
                    utlevelSzam =  $("#utlevel-form").val();
                    nev =  $("#nev-form").val();
                    szulIdo =  $("#szulIdo-form").val();
                    telefon =  $("#telefon-form").val();
                    email =  $("#email-form").val();

                    if (nev.length == 0 ||
                        telefon.length == 0 ||
                        email.length == 0 ||
                        szulIdo == "" || !isEmail(email) || !isMobile(telefon)
                        ) {
                            $("#updateuzenet").append("Hibás vagy üres inputot adtál meg!")
                            $("#hibaupdate").show();
                        }
                        else {
                            $( this ).dialog( "close" );
                            $.post("../src/server/utas/utasDBUpdate.php", {utlevelSzam: utlevelSzam, nev: nev,szulIdo: szulIdo ,telefon: telefon ,email: email }, function(data) {
                                $("#tr_" + szemelyUpdate).html(data)
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
    
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  function isMobile(mobile) {
    var regex = /\+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{1,13}$/;
    return regex.test(mobile);
}

function isUtlevel(utlevel) {
  var regex = /([A-Z]{2,2})(\d{7,7})/;
  return regex.test(utlevel);
}

function samekey(key) {
  lista = []
  $.post("../src/server/utas/utaslista.php", function(utasdata) {
    lista.push(utasdata)
})
console.log(lista)
}