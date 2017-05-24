var donnees_annees;

var http = createRequestObject();

http.open('GET', '../affichage_donnee/affichage_courbe.php', false);
http.onreadystatechange = (function ()
{
  if (http.readyState == 4)
  {
    if (http.status == 200)
    {
      donnees_annees = JSON.parse(http.responseText);
      if (donnees_annees !== false)
      {
            
            
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



//Flot Moving Line Chart
var y=0;
var i=0;
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


function doItOnInterval()
{
  var http = createRequestObject();
  
  http.open('GET', '../affichage_donnee/lecture_donnees_capteur_ph_test.php', true);
  http.onreadystatechange = (function ()
    {
      if (http.readyState == 4)
      {
        if (http.status == 200)
        {
          var donnees_capteur = validateJSON(http.responseText);
          if (donnees_capteur !== false)
          {
            var donnee = donnees_capteur[0];
            
            y = donnee.valeur;
                
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

doItOnInterval();
setInterval("doItOnInterval()", 1000);
$(function() {
   


    var container = $("#flot-line-chart");

    // Determine how many data points to keep based on the placeholder's initial size;
    // this gives us a nice high-res plot while avoiding more than one point per pixel.

    var maximum = container.outerWidth() / 2 || 300;

    //

    var data = [];
    
    function getData() {

        if (data.length) {
            data = data.slice(1);
        }

        while (data.length < maximum) {
            var previous = data.length ? data[data.length - 1] : 50;
            
            
            
            data.push(y < 0 ? 0 : y > 10000 ? 1000 : y);
        }

        // zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    //

    series = [{
        data: getData(),
        lines: {
            fill: true
        }
    }];

    //

    var plot = $.plot(container, series, {
        grid: {
            borderWidth: 1,
            minBorderMargin: 20,
            labelMargin: 10,
            backgroundColor: {
                colors: ["#fff", "#e4f4f4"]
            },
            margin: {
                top: 8,
                bottom: 20,
                left: 20
            },
            markings: function(axes) {
                var markings = [];
                var xaxis = axes.xaxis;
                for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 2) {
                    markings.push({
                        xaxis: {
                            from: x,
                            to: x + xaxis.tickSize
                        },
                        color: "rgba(232, 232, 255, 0.2)"
                    });
                }
                return markings;
            }
        },
        xaxis: {
            tickFormatter: function() {
                return "";
            }
        },
        yaxis: {
            min: 0,
            max: 15
        },
        legend: {
            show: true
        }
    });

    // Update the random dataset at 25FPS for a smoothly-animating chart

    setInterval(function updateRandom() {
        series[0].data = getData();
        plot.setData(series);
        plot.draw();
    }, 1000);

});







//plot toggle
$(function() {
    

    // hard-code color indices to prevent them from shifting as
    // countries are turned on/off

    var i = 0;
    $.each(donnees_annees, function(key, val) {
        val.color = i;
        ++i;
    });

    // insert checkboxes 
    var choiceContainer = $("#choices");
    $.each(donnees_annees, function(key, val) {
        choiceContainer.append("<br/><input type='checkbox' name='" + key +
            "' checked='checked' id='id" + key + "'></input>" +
            "<label for='id" + key + "'>"
            + val.label + "</label>");
    });

    choiceContainer.find("input").click(plotAccordingToChoices);

    function plotAccordingToChoices() {

        var data = [];

        choiceContainer.find("input:checked").each(function () {
            var key = $(this).attr("name");
            if (key && donnees_annees[key]) {
                data.push(donnees_annees[key]);
            }
        });

        if (data.length > 0) {
            $.plot("#toggle", data, {
                series: {
                    lines: {
                        show: true
                    },
                    points: {
                        show: false
                    }
                },
                grid: {
                    hoverable: true //IMPORTANT! this is needed for tooltip to work
                },yaxis: {
                    
                },
                xaxis: {
                    mode: 'time'
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%s for %x was %y",
                    xDateFormat: "%y-%m-%d",

                    onHover: function(flotItem, $tooltipEl) {
                        // console.log(flotItem, $tooltipEl);
                    }
                }
            });
        }
    }
    plotAccordingToChoices();

    $("#journee").click(function () {
        function plotAccordingToChoices() {

            var data = [];

            choiceContainer.find("input:checked").each(function () {
                var key = $(this).attr("name");
                if (key && donnees_annees[key]) {
                    data.push(donnees_annees[key]);
                }
            });

            if (data.length > 0) {
                $.plot("#toggle", data, {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: false
                        }
                    },
                    grid: {
                        hoverable: true //IMPORTANT! this is needed for tooltip to work
                    },yaxis: {
                        
                    },
                    xaxis: {
                        mode: 'time',
                        minTickSize: [1, "hour"],
                        min: (new Date(2017, 04, 22)).getTime(),
                        max: (new Date(2017, 04, 23)).getTime(),
                        twelveHourClock: false
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%s for %x was %y",
                        xDateFormat: "%d-%m-%y",

                        onHover: function(flotItem, $tooltipEl) {
                            // console.log(flotItem, $tooltipEl);
                        }
                    }
                });
            }
        }
        plotAccordingToChoices();
    });

    $("#semaine").click(function () {
        function plotAccordingToChoices() {

            var data = [];

            choiceContainer.find("input:checked").each(function () {
                var key = $(this).attr("name");
                if (key && donnees_annees[key]) {
                    data.push(donnees_annees[key]);
                }
            });

            if (data.length > 0) {
                $.plot("#toggle", data, {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: false
                        }
                    },
                    grid: {
                        hoverable: true //IMPORTANT! this is needed for tooltip to work
                    },yaxis: {
                        
                    },
                    xaxis: {
                        mode: 'time',
                        minTickSize: [1, "day"],
                        min: (new Date(2017, 04, 16)).getTime(),
                        max: (new Date(2017, 04, 23)).getTime(),
                        twelveHourClock: false
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%s for %x was %y",
                        xDateFormat: "%d-%m-%y",

                        onHover: function(flotItem, $tooltipEl) {
                            // console.log(flotItem, $tooltipEl);
                        }
                    }
                });
            }
        }
        plotAccordingToChoices();
    });
    $("#annee").click(function () {
        function plotAccordingToChoices() {

            var data = [];

            choiceContainer.find("input:checked").each(function () {
                var key = $(this).attr("name");
                if (key && donnees_annees[key]) {
                    data.push(donnees_annees[key]);
                }
            });

            if (data.length > 0) {
                $.plot("#toggle", data, {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: false
                        }
                    },
                    grid: {
                        hoverable: true //IMPORTANT! this is needed for tooltip to work
                    },yaxis: {
                        
                    },
                    xaxis: {
                        mode: 'time',
                        minTickSize: [1, "month"],
                        min: (new Date(2016, 04, 22)).getTime(),
                        max: (new Date(2017, 04, 23)).getTime(),
                        twelveHourClock: false
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%s for %x was %y",
                        xDateFormat: "%d-%m-%y",

                        onHover: function(flotItem, $tooltipEl) {
                            // console.log(flotItem, $tooltipEl);
                        }
                    }
                });
            }
        }
        plotAccordingToChoices();
    });



    //plotAccordingToChoices();

});




2