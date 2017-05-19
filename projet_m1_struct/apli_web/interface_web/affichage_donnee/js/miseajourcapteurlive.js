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
  http.open('GET', '../affichage_donnee/lecturelivetouscapteurs.php', true);
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
            var valeur_capteur = 100;
            donnee = donnees_capteur[num_capteur];

            if(num_capteur==0){
              //modifier texte
              valeur_capteur =  Math.floor(parseInt(donnee.valeur));
              //modifier le dessin
              document.getElementById("watertext").innerHTML = "niveau d'eau : " + valeur_capteur + "cm";
              document.getElementById("waterimg").setAttribute("height",3*valeur_capteur);
              document.getElementById("waterimg").setAttribute("y",89+(350-3*valeur_capteur));
            }else if(num_capteur==1){
              valeur_capteur = Math.floor(parseInt(donnee.valeur));
              //modifier le dessin
              document.getElementById("phtext").innerHTML = "pH : " + valeur_capteur ;
              document.getElementById("phimg").setAttribute("x1",500+(100*(valeur_capteur-7)));
              document.getElementById("phimg").setAttribute("x2",500+(100*(valeur_capteur-7)));
            }else if(num_capteur==2){
              valeur_capteur = Math.floor(parseInt(donnee.valeur));
              document.getElementById("lumitext").innerHTML = "luminosité : " + valeur_capteur +" Lux" ;
            }else if(num_capteur==3){
              valeur_capteur = Math.floor( parseInt(donnee.valeur));
              document.getElementById("tempeautext").innerHTML = "température de l'eau : " + valeur_capteur +" °C" ;
            }else if(num_capteur==4){
              valeur_capteur = Math.floor( parseInt(donnee.valeur));
              document.getElementById("tempairtext").innerHTML = "température de l'air : " + valeur_capteur +" °C" ;
            }else if(num_capteur==5){
              valeur_capteur = Math.floor( parseInt(donnee.valeur));
              document.getElementById("humitext").innerHTML = "humidité : " + valeur_capteur +" %" ;
            }else if(num_capteur==6){
              valeur_capteur = Math.floor( parseInt(donnee.valeur));
              document.getElementById("salitext").innerHTML = "salinité : " + valeur_capteur +" %" ;
            }
            }
          }
          else
          {
            console.log('probléme d\'actualisation du DOM');
          }
        }
        else
        {
          console.log('ereur requete ajax');
        }
      }
    });
  http.send(null);
    
}

//Call the ajax refresh each seconds

doItOnInterval(7);
setInterval("doItOnInterval(7)", 900);

