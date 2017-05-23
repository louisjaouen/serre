(function() {
  /**
   * Ajustement décimal d'un nombre
   *
   * @param {String}  type : Le type d'ajustement souhaité.
   * @param {Number}  value : le nombre à traité The number.
   * @param {Integer} exp  : l'exposant (le logarithme en base 10 de l'ajustement).
   * @returns {Number} la valeur ajustée.
   */
  function decimalAdjust(type, value, exp) {
    // Si la valeur de exp n'est pas définie ou vaut zéro...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si la valeur n'est pas un nombre 
    // ou si exp n'est pas un entier...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Si la valeur est négative
    if (value < 0) {
      return -decimalAdjust(type, -value, exp);
    }
    // Décalage
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Décalage inversé
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Arrondi décimal
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Arrondi décimal inférieur
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Arrondi décimal supérieur
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();





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
                valeur_capteur =  Math.round10(parseFloat(donnee.valeur),-1);
                //modifier le dessin
                if(valeur_capteur==0){
                  document.getElementById("watertext").innerHTML = "niveau d'eau trop bas !" ;
                  document.getElementById("waterimg").setAttribute("height",3*25);
                  document.getElementById("waterimg").setAttribute("y",89+(350-3*25));
                }else if(valeur_capteur==1){
                  document.getElementById("watertext").innerHTML = "niveau d'eau OK" ;
                  document.getElementById("waterimg").setAttribute("height",3*50);
                  document.getElementById("waterimg").setAttribute("y",89+(350-3*50));
                }else if(valeur_capteur==2){
                  document.getElementById("watertext").innerHTML = "niveau d'eau trop haut !" ;
                  document.getElementById("waterimg").setAttribute("height",3*100);
                  document.getElementById("waterimg").setAttribute("y",89+(350-3*100));
                }else{
                  document.getElementById("watertext").innerHTML = "probléme" ;
                  document.getElementById("waterimg").setAttribute("height",3*0);
                  document.getElementById("waterimg").setAttribute("y",89+(350-3*0));
                }
              }else if(num_capteur==1){
                valeur_capteur = Math.round10(parseFloat(donnee.valeur),-1);
                //modifier le dessin
                document.getElementById("phtext").innerHTML = "pH : " + valeur_capteur ;
                document.getElementById("phimg").setAttribute("x1",500+(100*(valeur_capteur-7)));
                document.getElementById("phimg").setAttribute("x2",500+(100*(valeur_capteur-7)));
              }else if(num_capteur==2){
                valeur_capteur = Math.round10(parseFloat(donnee.valeur),-1);
                document.getElementById("lumitext").innerHTML = "luminosité : " + valeur_capteur +" Lux" ;
              }else if(num_capteur==3){
                valeur_capteur =  Math.round10(parseFloat(donnee.valeur),-1);
                document.getElementById("tempeautext").innerHTML = "température de l'eau : " + valeur_capteur +" °C" ;
              }else if(num_capteur==4){
                valeur_capteur = Math.round10(parseFloat(donnee.valeur),-1);
                document.getElementById("tempairtext").innerHTML = "température de l'air : " + valeur_capteur +" °C" ;
              }else if(num_capteur==5){
                valeur_capteur = Math.round10(parseFloat(donnee.valeur),-1);
                document.getElementById("humitext").innerHTML = "humidité : " + valeur_capteur +" %" ;
              }else if(num_capteur==6){
                valeur_capteur = Math.round10(parseFloat(donnee.valeur),-1);
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

