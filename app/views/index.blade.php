@extends('template.theme')


@section('content')
<!DOCTYPE html>
<html>
  <head>
    <title>AzerTea - 2013 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="assets/css/hcolumns.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" media="screen">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <body>
<!--
.__                           _____             
|  |__ _____ ___  __ ____   _/ ____\_ __  ____  
|  |  \\__  \\  \/ // __ \  \   __\  |  \/    \ 
|   Y  \/ __ \\   /\  ___/   |  | |  |  /   |  \
|___|  (____  /\_/  \___  >  |__| |____/|___|  /
     \/     \/          \/                   \/ 
                     .___.__    .___                      
__  _  __ ____     __| _/|__| __| _/   ____  __ _________ 
\ \/ \/ // __ \   / __ | |  |/ __ |   /  _ \|  |  \_  __ \
 \     /\  ___/  / /_/ | |  / /_/ |  (  <_> )  |  /|  | \/
  \/\_/  \___  > \____ | |__\____ |   \____/|____/ |__|   
             \/       \/         \/                       
___.                    __   
\_ |__   ____   _______/  |_ 
 | __ \_/ __ \ /  ___/\   __\
 | \_\ \  ___/ \___ \  |  |  
 |___  /\___  >____  > |__|  
     \/     \/     \/        
-->    
    <div class="container body-class">

      <div id="columnsContainer">
          <div id="columns" ></div>
      </div>

       <div id="panneauLateral">
        <button class="btn" id="panneauToggleButton" onclick="deplierPanneau()"><i class="icon-plus"></i></button>
        <br/><br />
          <div id="listeMat">
            <div class="well">
              <img src="assets/img/appphotoNikon.jpg" alt="Icone d'appareil photo"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Appareil photo Nikon PT4560</b></span>
              </a>
              <span id="prix"><b>160 €</b></span>
              <p>
                <u>Annonce :</u> Un appareil photo 45' 1800 Mp de la marque Nikon. Immortalisez vos meilleurs moments.
              </p>
            </div>
            <div class="well">
              <img src="assets/img/camSony.jpg" alt="Icone de camescope"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Camera Sony XP4500</b></span>
              </a>
              <span id="prix"><b>3 €</b></span>
              <p>
                <u>Annonce :</u> Une camera de la marque Sony. Filmez vos meilleurs moments dans toutes circonstances.
              </p>
            </div>
            <div class="well">
              <img src="assets/img/appphotoNikon.jpg" alt="Icone d'appareil photo"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Appareil photo Nicon PT4560</b></span>
              </a>
              <span id="prix"><b>220 €</b></span>
              <p>
                <u>Annonce :</u> Mangez des nems a la confiture.
              </p>
            </div>
            <div class="well">
              <img src="assets/img/Nexus4.png" alt="Icone de Nexus 4"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>NEXUS 4</b></span>
              </a>
              <span id="prix"><b>250 €</b></span>
            </div>
            <div class="well">
              <img src="assets/img/appphotoNikon.jpg" alt="Icone d'appareil photo"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Appareil photo Nicon PT4560</b></span>
              </a>
              <span id="prix"><b>35 €</b></span>
            </div>
            <div class="well">
              <img src="assets/img/camSony.jpg" alt="Icone de camescope"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Camera Sony XP4500</b></span>
              </a>
              <span id="prix"><b>90 €</b></span>
            </div>
            
            <div class="well">
              <img src="assets/img/camSony.jpg" alt="Icone de camescope"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Camera Sony XP4500</b></span>
              </a>
              <span id="prix"><b>90 €</b></span>
            </div>
            
            <div class="well">
              <img src="assets/img/camSony.jpg" alt="Icone de camescope"  height="42" width="70">
              <a href="Cam">
                <span id="materiel"><b>Camera Sony XP4500</b></span>
              </a>
              <span id="prix"><b>90 €</b></span>
            </div>
            
      
          </div>
      </div>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <a class="brand" href="#" style="margin-left:5px"><img src="/assets/img/logoufound.png" style="
    width: 95px;
"></a>
                <ul class="nav">
                    <input type="text" id="search_problem_input" class="navbar-search span2" onkeypress="searchKeywords()">
                </ul>
                <ul class="nav pull-right" style="margin-right:30px">
                    <li class="active"><button class="btn btn-link" id="insco" style="right=70px; color:white" rel="popover" data-original-title><i class="icon-chevron-down"></i> Inscription/Connexion</button></li>
                    
                </ul>
            </div>
        </div>

     
        
        <!-- Champs via mail -->
        <div id="log_content" style="display:none">
        <div class="raw">
            <div class="control-group">
                <label class="control-label" for="inputIcon"></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="span2" id="email" onkeyup="checkInscriptionOuConnexion()" placeholder="Adresse mail" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="raw">
            <div class="control-group">
                <label class="control-label" for="inputIcon"></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-certificate"></i></span>
                        <input class="span2" id="inputIcon" placeholder="Mot de passe" type="password">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="raw">
            <button class="btn" id="btninscription">
            <i class="icon-download-alt"></i> S'inscrire
            </button>
        <button class="btn" id="btnconnection" style="display:none" ><i class="icon-user"></i> Se connecter</button>

        </div>

      

    </div>
    <div id="white_mask_group">
        <div class="white_mask" style="position:absolute; top:0px; left:0px; background-color:white; width:100%; height:100%; z-index:2000;"></div>
        <div id="searchOverWhiteMask" style="position:absolute; top:30%; left:0; right:0; margin-left:auto; margin-right:auto; background-color:white; width:400px; height:300px; z-index:2001; text-align:center;">
            <form class="">
                <div class="input-append">
                    <input id="mask_search_input" type="text" data-provide="typeahead" placeholder="Un probleme ?" onkeypress="hideMaskAndFocus(event)" /> <!-- id="input"-->
                    <button class="btn">Aidez moi !</button>
                </div>
            </form>
        </div>  
    </div>


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.hcolumns.min.js"></script>
    <script src="js/custom.js"></script>
      <script type="text/javascript">


    $("#columns").hColumns({
        labelText_maxLength: 30, 

        nodeSource: function(node_id, callback) {
           
        var test = [
                { id: 12, label: "Changer Ordinateur", type: "folder"},
                { id: 15, label: "Changer Composant", type: "folder"},
                { id: 42, label: "Réparer", type: "folder"}
                ];
                return callback(null, test);
        }
    });

    $(function (){
       $("#insco").popover({
        html : true,
        placement:'bottom',
        content: function() {
            return $('#log_content').html();
        },
        title: function() {
            return $('#log_title').html();
        },
        template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'
        }); 
    });



  $(function (){
     $('a').tooltip({placement:'bottom'});
  });

  $(document).ready(function(){
    $('#insco').popover({ 
      html : true,

    });
  });


  // 
  function searchKeywords() {

    var searchSentence = $("#search_problem_input");
    getSearch(searchSentence,
        function(data, textStatus, jqXHR) {
            // SUCCESS
            
        },
        function(jqXHR, textStatus, errorThrown) {

        });

  }

  function hideMaskAndFocus(e) {
      $("#panneauLateral").show();
      $("#white_mask_group").fadeOut(200);
      $("#search_problem_input").val(String.fromCharCode(e.keyCode));
      $("#search_problem_input").focus();
  }

  function checkInscriptionOuConnexion() {

    var email = $("#email").val();
    if(checkEmail(email)) {
        changerBoutonCo();
    }
    else{
        changerBoutonIns();
    }
    
    
  }

  function changerBoutonCo(){
    $("#btnconnection").show();
    $("#btninscription").hide();
  }

  function changerBoutonIns(){
    $("#btnconnection").hide();
    $("#btninscription").show();
  }

  function checkEmail(email) {
    if (email == ""){
        return false;
    }
    else{
        return true;//à modifier
    }
  }

  function deplierPanneau(){
    $("#panneauLateral").css('width', '80%');
    $("#panneauToggleButton").attr("onclick", "replierPanneau()");
    $("#panneauToggleButton i").attr("class", "icon-minus");
    $("#chevronG").hide();
    $("#chevronD").show();
  }

  function replierPanneau(){
    $("#panneauLateral").css('width', '28%');
    $("#panneauToggleButton").attr("onclick", "deplierPanneau()");
    $("#panneauToggleButton i").attr("class", "icon-plus");
    $("#chevronG").show();
    $("#chevronD").hide();
  }

  </script>

  </body>
</html>

@stop