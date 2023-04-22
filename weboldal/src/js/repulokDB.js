$(document).ready(function(){ 

    //#region all
    $.post("../src/server/repulok/repulokDBAll.php", function(repulok) {
        $("tbody").html(repulok);
    })
    //#endregion 
    
        $("#update-form").hide();
        $( "#update-message" ).hide();
        $( "#felvetel-form" ).hide();
        $( "#felvetel-message" ).hide();
    
    //#region kereses
    $("#kereses-real-time").keyup(function() {
        kereses = $("#kereses-real-time").val();
        $.post("../src/server/repulok/repulokkereses.php", {kereses: kereses} ,function(orszagok) {
            $("tbody").html(orszagok);
        })
    })
    //#endregion 
    
    //#region delete
    $("tbody").on("click", "#delete" , function() { 
        var rekod = $(this).val();
        $("#tr_" + rekod).remove()
        $.post("../src/server/repulok/repuloktorles.php", {rekod: rekod} ,function() {})
})
//#endregion 

//#region update
    $("tbody").on("click", "#update" , function() {
        $("#hibaupdate").hide();
        $("#updateuzenet").empty();

        var repuloUpdate = $(this).val();

        $("#regisztracio-form").attr("value", $(this).val());
        $("#nev-form").attr("value", $("#neve_" + repuloUpdate).text());
        $("#tipus-form").attr("value", $("#tipus_" + repuloUpdate).text());
        $("#max-form").attr("value", $("#max_" + repuloUpdate).text());
        $("#jegy-form").attr("value", $("#jegy_" + repuloUpdate).text());

        document.getElementById("updateform").reset();
        $("#regisztracio-form").attr("value", repuloUpdate);
        $("#update-form").dialog({
            modal: true,
            buttons: {
                Módosít: function() {
                $("#hibaupdate").hide();
                $("#updateuzenet").empty();

                var rekod = $("#regisztracio-form").val()
                var nev = $("#nev-form").val()
                var tipus = $("#tipus-form").val()
                var max = $("#max-form").val()
                var jegy = $("#jegy-form").val()
                
                if(nev.length == 0 ||
                    tipus.length == 0 ||
                    max <= 0 || jegy <= 0) {
                    $("#updateuzenet").append("Üres vagy hibás bemenet!");
                    $("#hibaupdate").show();
                }
                else {
                    $( this ).dialog( "close" );
                        $.post("../src/server/repulok/repulokDBUpdate.php", {rekod: rekod, nev: nev, tipus: tipus, max:max,jegy:jegy }, function(data) {
                            $("#tr_" + rekod).html(data)
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
        ujrekod = ""
        ujneve = ""
        ujtipus = ""
        ujmax = 1
        ujjegy = 1
        $("#felvetel-form").dialog({
          modal: true,
          buttons: {
            Felvétel: function() {
              $("#hibafelvetel").hide();
              $("#felveteluzenet").empty();

              ujrekod = $("#uj-regisztracio-form").val()
              ujneve = $("#uj-nev-form").val()
              ujtipus = $("#uj-tipus-form").val()
              ujmax = $("#uj-max-form").val()
              ujjegy = $("#uj-jegy-form").val()

              if (ujrekod.length == 0 ||
                ujneve.length == 0 ||
                ujtipus.length == 0 ||
                    ujmax <= 0 || ujjegy.length <= 0)
                
                 {
                    $("#felveteluzenet").append("Üres vagy hibás inputot adtál meg!")
                    $("#hibafelvetel").show();
                }
                else {
                    $( this ).dialog( "close" );
                    $.post("../src/server/repulok/repulokfelvetel.php", {rekod: ujrekod, nev: ujneve, tipus: ujtipus, max: ujmax,jegy: ujjegy }, function(data) {})
                    $("#felvetel-message").dialog({
                      modal: true,
                      buttons: {
                        Ok: function() {
                          $( this ).dialog( "close" );
                          $.post("../src/server/repulok/repulokDBAll.php", function(repulok) {
                            $("tbody").html(repulok);
                        })
                        }
                      }
                    });                   
                    $.post("../src/server/repulok/repulokDBAll.php", function(repulok) {
                        $("tbody").html(repulok);
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
    