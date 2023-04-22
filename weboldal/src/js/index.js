$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "src/server/indexVarosok.php",
        dataType: "html",
        success: function(varosAdatok) {
                $("#varosok").append(varosAdatok);
        }
    });
    
    let kijelentkezett = new URLSearchParams(window.location.search)
    $("#kijelentkezet").hide();
    if(kijelentkezett.has('logout')) {
        $("#kijelentkezet").dialog({
            modal: true,
            buttons: {
              Ok: function() {
                $( this ).dialog( "close" );
                window.location.href ='/';
              }
            }
        });
    }

    $("#talalatok").hide();
    $("#kereses_feltetel").hide();

    $('#kereses').click(function() {	
        $("#hibauzenet").hide();
        $("#talalatok").empty();
        $("#hol_feltetel").empty();
        $("#mikor_feltetel").empty();

        var honnan = $("#honnan").val();
        
        
        var hova = $("#hova").val();


        let mikor = $("#mikor").val();

        if (mikor.length === 0) {
            mikor = new Date(2022, 11, 01);
        }
        else {
            mikor = new Date(mikor);
        }

        var mikorString = [mikor.getFullYear(),(Number(mikor.getMonth()) + 1), mikor.getDate()].join("-");

        $("#hol_feltetel").append(honnan +"  --> " + hova);
        $("#mikor_feltetel").append(mikorString);
        $("#kereses_feltetel").show();

        var okhonnan = false;
        var okhova = false;
        var honnantemp = honnan.split(" ")
        var honnanVaros = honnantemp[0]
        if (honnantemp[1] != undefined) {
            okhonnan = true;
            var honnanIso = honnantemp[1].replace('(','').replace(')','');
        }
       
        var hovatemp = hova.split(" ")
        var hovaVaros = hovatemp[0]
        if (hovatemp[1] != undefined) {
            okhova = true;
            var hovaIso = hovatemp[1].replace('(','').replace(')','');
        }
       
        if (okhonnan == false || okhova == false) {
            $("#hibauzenet").show();
        }
        else {
            $.post("src/server/indexhtml.php", {honnanVaros: honnanVaros, hovaVaros: hovaVaros, honnanIso: honnanIso, hovaIso: hovaIso, mikorString: mikorString}, function(indexdata) {
                $("#talalatok").append(indexdata);
                $("#talalatok").show();
            })
        }

        

    });

}); 

