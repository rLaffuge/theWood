/**
 * Created by user on 08/03/2016.
 */

$(document).ready(function(){

   $("#rech_domaine").change(function(){

      var domaine = $(this).val();
       var themes = $("#rech_theme");

       themes.html('<option value="">---Theme---</option>');

       $.post("/theWood/back/Controllers/C_loadTheme.php",{
           "idDomaine" : domaine
       })
       .done(function(data){

           json = JSON.parse(data);
           $.each(json, function(key, val){
               themes.append('<option value="' + val.idTheme + '">' + val.libelleTheme + '</option>');
           })

       })

   });

    $(".nb_panier").change(function(){

        var input = $(this);
        var nb = input.val();
        var id = input.attr("id").replace("article","");

        $.post("/theWood/back/Controllers/C_MajPanier.php",{
                "id" : id,
                "nb" : nb
            })
            .done(function(data){

                json = JSON.parse(data);

                if(json.ok == "1")
                {
                    input.parent().next().text(json.prix+" €");
                    $("#alert_panier").hide();
                    maj_total();
                }
                else if(json.ok == "2")
                {
                    input.val(json.nb);
                    $("#alert_panier").text("Impossible de valider la quantité demandée").show();
                }
                else if(json.ok == "3")
                {
                    input.val(json.nb);
                }
            });

    });


    var maj_total = function()
    {
        var prixtotal = 0;
        $(".prixpanier").each(function(){
            prixtotal = prixtotal + parseFloat($(this).text().substring(0,$(this).text().length -1));
        });
        $("#prixTotal").text(prixtotal);

    };

    $(".suppr_article").click(function(){

       var input = $(this);
       var id = input.attr("id");

        $.post("/theWood/back/Controllers/C_SupprPanier.php",{
                "id" : id
        })
            .done(function(data){

                if(data === "1")
                {
                    input.parent().parent().remove();
                    maj_total();
                }

            });
    });


});