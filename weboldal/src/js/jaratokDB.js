$(document).ready(function(){ 

    //#region all
    $.post("../src/server/jaratok/jaratokDBAll.php", function(orszagok) {
        $("tbody").html(orszagok);
    })

    $.post("../src/server/jaratok/jaratokDBAllnulla.php", function(orszagok) {
        $("#nulla").html(orszagok);
    })
    //#endregion 
    
        $("#update-form").hide();
        $( "#update-message" ).hide();
        $( "#felvetel-form" ).hide();
        $( "#felvetel-message" ).hide();
        $("#utasjarat-form").hide();
    
    //#region kereses
    $("#kereses-real-time").keyup(function() {
        kereses = $("#kereses-real-time").val();
        $.post("../src/server/jaratok/jaratokkereses.php", {kereses: kereses} ,function(jaratok) {
            $("tbody").html(jaratok);
        })
    })
    //#endregion 

    //#region isokodok
$.post("../src/server/jaratok/jaratokvarosok.php", function(varosok) {
    $("#honnan_select").html(varosok);
})

$.post("../src/server/jaratok/jaratokvarosok.php", function(varosok) {
    $("#hova_select").html(varosok);
})

$.post("../src/server/jaratok/jaratokrepulok.php", function(repulok) {
    $("#repulo_select").html(repulok);
})

$.post("../src/server/jaratok/jaratokvarosok.php", function(varosok) {
    $("#uj-honnan_select").html(varosok);
})

$.post("../src/server/jaratok/jaratokvarosok.php", function(varosok) {
    $("#uj-hova_select").html(varosok);
})

$.post("../src/server/jaratok/jaratokrepulok.php", function(repulok) {
    $("#uj-repulo_select").html(repulok);
})
//#endregion



   //#region update
$("tbody").on("click", "#update" , function() {
    document.getElementById("updateform").reset();
    $("#hibaupdate").hide();
    $("#updateuzenet").empty();

    var jaratUpdate = $(this).val();

    $("#jaratszam-form").attr("value", $(this).val());
    $("#indulas-form").attr("value", $("#indulas_" + jaratUpdate).text());
    $("#erkezes-form").attr("value", $("#erkezes_" + jaratUpdate).text());

    document.getElementById("updateform").reset();
    $("#regisztracio-form").attr("value", jaratUpdate);
    $("#update-form").dialog({
        modal: true,
        buttons: {
            Módosít: function() {
            $("#hibaupdate").hide();
            $("#updateuzenet").empty();

            var jaratszam = $("#jaratszam-form").val()
            var repulorekod = $("#repulo_select").find(':selected').val()
            var indulas = $("#indulas-form").val() 
            var erkezes = $("#erkezes-form").val()
            var honnan = $("#honnan_select").find(':selected').val()
            var hova = $("#hova_select").find(':selected').val()
            
            console.log(erkezes)


            if( indulas == "" || erkezes == "" ) {
                $("#updateuzenet").append("Üres vagy hibás bemenet!");
                $("#hibaupdate").show();
            }
            else {
                erkezes = erkezes.slice(0, 19).replace('T', ' ');
                indulas = indulas.slice(0, 19).replace('T', ' ');
                $( this ).dialog( "close" );
                    $.post("../src/server/jaratok/jaratokDBUpdate.php", {jaratszam:jaratszam, repulorekod: repulorekod, indulas: indulas, erkezes: erkezes, honnan: honnan, hova: hova }, function(data) {
                        $("#tr_" + jaratUpdate).html(data)
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
    var ujjaratszam = ""
    var ujrepulorekod = ""
    var ujindulas = ""
    var ujerkezes = ""
    var ujhonnan = ""
    var ujhova = ""
        $("#felvetel-form").dialog({
          modal: true,
          buttons: {
            Felvétel: function() {
              $("#hibafelvetel").hide();
              $("#felveteluzenet").empty();

             ujjaratszam = $("#uj-jaratszam-form").val()
             ujrepulorekod = $("#uj-repulo_select").find(':selected').val()
             ujindulas = $("#uj-indulas-form").val() 
             ujerkezes = $("#uj-erkezes-form").val()
             ujhonnan = $("#uj-honnan_select").find(':selected').val()
             ujhova = $("#uj-hova_select").find(':selected').val()



             if( ujindulas == "" || ujerkezes == "" ) {
                $("#updateuzenet").append("Üres vagy hibás bemenet!");
                $("#hibaupdate").show();
            }
                else {
                    ujerkezes = ujerkezes.slice(0, 19).replace('T', ' ');
                ujindulas = ujindulas.slice(0, 19).replace('T', ' ');
                $( this ).dialog( "close" );
                    $.post("../src/server/jaratok/jaratokfelvetel.php", {jaratszam:ujjaratszam, repulorekod: ujrepulorekod, indulas: ujindulas, erkezes: ujerkezes, honnan: ujhonnan, hova: ujhova }, function(data) {
                    })    
                    $("#felvetel-message").dialog({
                      modal: true,
                      buttons: {
                        Ok: function() {
                          $( this ).dialog( "close" );
                          $.post("../src/server/jaratok/jaratokDBAll.php", function(orszagok) {
                            $("tbody").html(orszagok);
                        })
                        }
                      }
                    });                   
                    $.post("../src/server/jaratok/jaratokDBAll.php", function(orszagok) {
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


//#region delete
$("tbody").on("click", "#delete" , function() { 
    var jaratszam = $(this).val();
    $("#tr_" + jaratszam).remove()
    $.post("../src/server/jaratok/jaratoktorles.php", {jaratszam: jaratszam} ,function() {})
})
//#endregion 

//#region jaratutasok
$("tbody").on("click", "#jaratutasok" , function() { 
    var jaratszam = $(this).val();
    $.post("../src/server/jaratok/jaratokDBAllutasai.php", {jaratszam: jaratszam} , function(orszagok) {
        $("#utasai").html(orszagok);
    })


    $("#adatutasfelvetel").attr('value', jaratszam)
    
    $("#utasjarat-form").dialog({
        modal: true,
        buttons: {},
        close: function() {
            $.post("../src/server/jaratok/jaratokDBAll.php", function(orszagok) {
                $("tbody").html(orszagok);
            })
        
            $.post("../src/server/jaratok/jaratokDBAllnulla.php", function(orszagok) {
                $("#nulla").html(orszagok);
            })
        }
    })
})
//#endregion
$("#utasai").on("click", "#utasdelete" , function() { 
    var deleteutasi = $(this).val();
    $("#tr_" + deleteutasi).remove()
    $.post("../src/server/jaratok/jaratokutasaitorlese.php", {deleteutas: deleteutasi} , function() {})
    
})


$.post("../src/server/jaratok/jaratokutasokselect.php", function(varosok) {
    $("#utas_select").html(varosok);
})



$("#utasjarat-form").on("click", "#adatutasfelvetel" , function() { 
    var utasadd = $(this).val();
    utasselect = $("#utas_select").find(':selected').val()
   
    $.post("../src/server/jaratok/jaratokutasadd.php", {utasadd: utasadd, utasselect: utasselect} , function() {})

    $.post("../src/server/jaratok/jaratokDBAllutasai.php", {jaratszam: utasadd} , function(datam) {
        $("#utasai").html(datam);
    })
})




});
