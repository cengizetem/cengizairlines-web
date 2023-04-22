$(document).ready(function(){ 

//#region all
$.post("../src/server/varosok/varosokDBAll.php", function(varosok) {
    $("tbody").html(varosok);
})
//#endregion 

    $("#update-form").hide();
    $( "#update-message" ).hide();
    $( "#felvetel-form" ).hide();
    $( "#felvetel-message" ).hide();

    //#region kereses
$("#kereses-real-time").keyup(function() {
    kereses = $("#kereses-real-time").val();
    $.post("../src/server/varosok/varosokkereses.php", {kereses: kereses} ,function(varosok) {
        $("tbody").html(varosok);
    })
})
//#endregion 

//#region isokodok
$.post("../src/server/varosok/varosokisokodok.php", function(isokodok) {
    $("#iso_select").html(isokodok);
})
$.post("../src/server/varosok/varosokisokodok.php", function(isokodok) {
    $("#uj-iso_select").html(isokodok);
})
//#endregion


//#region update
$("tbody").on("click", "#update" , function() {
   

    $("#hibaupdate").hide();
    $("#updateuzenet").empty();

    var varosUpdate = $(this).val();

    $("#id-form").attr("value", $(this).val());
    /**$("#iso_select").attr("value", $("#ISO_" + varosUpdate).text());*/
    $("#varos-form").attr("value", $("#varos_" + varosUpdate).text());

    document.getElementById("updateform").reset();
    $("#regisztracio-form").attr("value", varosUpdate);
    $("#update-form").dialog({
        modal: true,
        buttons: {
            Módosít: function() {
            $("#hibaupdate").hide();
            $("#updateuzenet").empty();

            var id = $("#id-form").val()
            var isocode = $("#iso_select").find(':selected').val()
            var varos = $("#varos-form").val()
            
            
            if( varos.length == 0 ) {
                $("#updateuzenet").append("Üres vagy hibás bemenet!");
                $("#hibaupdate").show();
            }
            else {
                $( this ).dialog( "close" );
                    $.post("../src/server/varosok/varosokDBUpdate.php", {id:id, isocode: isocode, varos: varos}, function(data) {
                        $("#tr_" + id).html(data)
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
        ujvaros = ""

        $("#felvetel-form").dialog({
          modal: true,
          buttons: {
            Felvétel: function() {
              $("#hibafelvetel").hide();
              $("#felveteluzenet").empty();

              ujiso = $("#uj-iso_select").val()
              
              ujvaros = $("#uj-varos-form").val()



              if (ujvaros.length == 0)
                 {
                    $("#felveteluzenet").append("Üres vagy hibás inputot adtál meg!")
                    $("#hibafelvetel").show();
                }
                else {
                    $( this ).dialog( "close" );
                    $.post("../src/server/varosok/varosokfelvetel.php", {iso: ujiso, varos: ujvaros}, function(data) {})
                    $("#felvetel-message").dialog({
                      modal: true,
                      buttons: {
                        Ok: function() {
                          $( this ).dialog( "close" );
                          $.post("../src/server/varosok/varosokDBAll.php", function(varosok) {
                            $("tbody").html(varosok);
                        })
                        }
                      }
                    });                   
                    $.post("../src/server/varosok/varosokDBAll.php", function(varosok) {
                        $("tbody").html(varosok);
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
    var id = $(this).val();
    $("#tr_" + id).remove()
    $.post("../src/server/varosok/varosoktorles.php", {id: id} ,function() {})
})
//#endregion 

    });