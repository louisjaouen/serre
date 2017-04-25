function createRequestObject()
{
    var http;
    if (window.XMLHttpRequest)
    { // Mozilla, Konqueror/Safari, IE7 ...
        http = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    { // Internet Explorer 6
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return http;
}
function validateJSON(jsonText)
{
    return !(/[^,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]/.test(
            jsonText.replace(/"(\\.|[^"\\])*"/g, '')))
       && eval('(' + jsonText + ')');
} // validateJSON(jsonText)


function doItOnInterval(nb_capteur)
{
  var http = createRequestObject();
  http.open('GET', '../lecture.php', true);
  http.onreadystatechange = (function ()
    {
      if (http.readyState == 4)
      {
        if (http.status == 200)
        {
          var donnees_capteur = validateJSON(http.responseText);
          if (donnees_capteur !== false)
          {
            var str = '';
            for(var i=0;i<nb_capteur;i++){
              var num_capteur=i;
            var donnee = donnees_capteur[num_capteur];
            var randomize = 100;
            donnee = donnees_capteur[num_capteur];

            if(num_capteur==0){
              //modifier texte
              randomize =  Math.floor(parseInt(donnee.valeur));
              //modifier le dessin
              document.getElementById("watertext").innerHTML = "niveau d'eau : " + randomize + "cm";
              document.getElementById("waterimg").setAttribute("height",3*randomize);
              document.getElementById("waterimg").setAttribute("y",89+(350-3*randomize));
            }else if(num_capteur==1){
              randomize = Math.floor(parseInt(donnee.valeur));
              //modifier le dessin
              document.getElementById("phtext").innerHTML = "pH : " + randomize ;
              document.getElementById("phimg").setAttribute("x1",500+(100*(randomize-7)));
              document.getElementById("phimg").setAttribute("x2",500+(100*(randomize-7)));
            }else if(num_capteur==2){
              randomize = Math.floor(parseInt(donnee.valeur));
              document.getElementById("lumitext").innerHTML = "luminosité : " + randomize +" Lux" ;
            }else if(num_capteur==3){
              randomize = Math.floor( parseInt(donnee.valeur));
              document.getElementById("tempeautext").innerHTML = "température de l'eau : " + randomize +" °C" ;
            }else if(num_capteur==4){
              randomize = Math.floor( parseInt(donnee.valeur));
              document.getElementById("tempairtext").innerHTML = "température de l'air : " + randomize +" °C" ;
            }else if(num_capteur==5){
              randomize = Math.floor( parseInt(donnee.valeur));
              document.getElementById("humitext").innerHTML = "humidité : " + randomize +" %" ;
            }else if(num_capteur==6){
              randomize = Math.floor( parseInt(donnee.valeur));
              document.getElementById("salitext").innerHTML = "salinité : " + randomize +" %" ;
            }
            }
          }
          else
          {
            alert('probléme d\'actualisation du DOM');
          }
        }
        else
        {
          alert('ereur requete ajax');
        }
      }
    });
  http.send(null);
    
}

//Call the ajax refresh each seconds

doItOnInterval(7);
setInterval("doItOnInterval(7)", 10000);

