    function optionCheck(){
          var option = document.getElementById("status_orc").value;
          if(option == "Aceito"){
              document.getElementById("hiddenDiv",).style.display ="flex";
          } else {
            document.getElementById("hiddenDiv").style.display ="none";
          }
          if(option == "Rejeitado"){
            document.getElementById("hiddenDiv2").style.display ="flex";
        } else {
        	document.getElementById("hiddenDiv2").style.display ="none";
        }
    };

    function gpcliACheck(){
        var option = document.getElementById("gpcliente").value;
        if(option == "gpca"){
            document.getElementById("hiddenGpa",).style.display ="flex";
        } else {
        	document.getElementById("hiddenGpa").style.display ="none";
        }
        if(option == "gpcb"){
            document.getElementById("hiddenGpb",).style.display ="flex";
        } else {
            document.getElementById("hiddenGpb").style.display ="none";
        }
    };

    function taxCheck(){
        var option = document.getElementById("tax").value;
        if(option == "ruc"){
            document.getElementById("hiddenTax",).style.display ="inline";
        } else {
        	document.getElementById("hiddenTax").style.display ="none";
        }
        if(option == "nit"){
            document.getElementById("hiddenTax2").style.display ="inline";
        } else {
        	document.getElementById("hiddenTax2").style.display ="none";
        }
        if(option == "taxn"){
            document.getElementById("hiddenTax3").style.display ="inline";
        } else {
        	document.getElementById("hiddenTax3").style.display ="none";
        }
    };

    function grupoCheck(){
        var option = document.getElementById("grupo").value;
        if(option == "A"){
            document.getElementById("hiddenA",).style.display ="inline";
        } else {
        	document.getElementById("hiddenA").style.display ="none";
        }
        if(option == "B"){
            document.getElementById("hiddenB").style.display ="inline";
        } else {
        	document.getElementById("hiddenB").style.display ="none";
        }
    };


        $('#checkbox_show').click(function(){
           document.getElementById("checkbox").style.display ="inline";
    });

        $('#addNota').click(function(){
           document.getElementById("showAddNota").style.display ="inline";
    });
