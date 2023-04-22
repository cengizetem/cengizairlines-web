$(document).ready(function(){ 

//#region all
$.post("../src/server/orszagok/orszagokDBAll.php", function(orszagok) {
    $("tbody").html(orszagok);
})
//#endregion 

    $("#update-form").hide();
    $( "#update-message" ).hide();
    $( "#felvetel-form" ).hide();
    $( "#felvetel-message" ).hide();

//#region kereses
$("#kereses-real-time").keyup(function() {
    kereses = $("#kereses-real-time").val();
    $.post("../src/server/orszagok/orszagokkereses.php", {kereses: kereses} ,function(orszagok) {
        $("tbody").html(orszagok);
    })
})
//#endregion 

//#region delete
$("tbody").on("click", "#delete" , function() { 
    var isocode = $(this).val();
    $("#tr_" + isocode).remove()
    $.post("../src/server/orszagok/orszagoktorles.php", {isocode: isocode} ,function() {})
})
//#endregion 

//#region update
$("tbody").on("click", "#update" , function() {
    $("#hibaupdate").hide();
    $("#updateuzenet").empty();

    var orszagUpdate = $(this).val();

    $("#ISO-form").attr("value", $(this).val());
    $("#orszag-form").attr("value", $("#orszag_" + orszagUpdate).text());
    $("#nyelv-form").attr("value", $("#nyelv_" + orszagUpdate).text());
    $("#penz-form").attr("value", $("#penz_" + orszagUpdate).text());

    document.getElementById("updateform").reset();
    $("#ISO-form").attr("value", orszagUpdate);
    $("#update-form").dialog({
        modal: true,
        buttons: {
            Módosít: function() {
            $("#hibaupdate").hide();
            $("#updateuzenet").empty();

            var iso = $("#ISO-form").val()
            var orszag = $("#orszag-form").val()
            var nyelv = $("#nyelv-form").val()
            var penz = $("#penz-form").val()
            
            if(orszag.length == 0 ||
                penz.length == 0 ||
                nyelv.length == 0) {
                $("#updateuzenet").append("Üres vagy hibás bemenet!");
                $("#hibaupdate").show();
            }
            else {
                $( this ).dialog( "close" );
                    $.post("../src/server/orszagok/orszagokDBUpdate.php", {iso: iso, orszag: orszag, nyelv: nyelv, penz:penz }, function(data) {
                        $("#tr_" + iso).html(data)
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

//#region felvetel
$("#adatfelvetel").click(function() {
    document.getElementById("felvetelform").reset();
    $("#hibafelvetel").hide();
    $("#felveteluzenet").empty();
        ujiso = ""
        ujorszag = ""
        ujnyelv = ""
        ujpenz = ""
        $("#felvetel-form").dialog({
          modal: true,
          buttons: {
            Felvétel: function() {
              $("#hibafelvetel").hide();
              $("#felveteluzenet").empty();

              ujiso = $("#uj-ISO-form").val()
              ujorszag = $("#uj-orszag-form").val()
              ujnyelv = $("#uj-nyelv-form").val()
              ujpenz = $("#uj-penz-form").val()



              if (ujorszag.length == 0 ||
                ujpenz.length == 0 ||
                ujnyelv.length == 0 ||
                ujiso.length != 3
                )
                 {
                    $("#felveteluzenet").append("Üres vagy hibás inputot adtál meg!")
                    $("#hibafelvetel").show();
                }
                else {
                    $( this ).dialog( "close" );
                    $.post("../src/server/orszagok/orszagokfelvetel.php", {iso: ujiso, orszag: ujorszag, nyelv: ujnyelv, penz:ujpenz }, function(data) {})
                    $("#felvetel-message").dialog({
                      modal: true,
                      buttons: {
                        Ok: function() {
                          $( this ).dialog( "close" );
                          $.post("../src/server/orszagok/orszagokDBAll.php", function(orszagok) {
                            $("tbody").html(orszagok);
                        })
                        }
                      }
                    });                   
                    $.post("../src/server/orszagok/orszagokDBAll.php", function(orszagok) {
                        $("tbody").html(orszagok);
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

});
