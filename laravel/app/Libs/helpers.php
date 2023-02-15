<?php 
  function provinciaPreset($provinciaCliente){
      
      $provincias = ["Buenos Aires",
      "Catamarca",
      "Ciudad Autonoma de Buenos Aires",
      "Chaco",
      "Chubut",
      "Cordoba",
      "Corrientes",
      "Entre Rios",
      "Formosa",
      "Jujuy",
      "La Pampa",
      "La Rioja",
      "Mendoza",
      "Misiones",
      "Neuquen",
      "Rio Negro",
      "Salta",
      "San Juan",
      "San Luis",
      "Santa Cruz",
      "Santa Fe",
      "Santiago del Estero",
      "Tierra del Fuego, Antártida e Islas del Atlántico Sur",
      "Tucuman"];
      
      echo ("<div class=\"form-group pt-2 pb-2\">
      <label class=\"pb-2\" for=\"1\">Provincia</label>
      <select class=\"form-control\" name=\"provincia\" id=\"provincia\" value=\"\">");
      
      foreach ($provincias as $provincia) {
        if($provincia === $provinciaCliente){

          echo "<option selected>$provinciaCliente</option>";

        }
        else{

          echo "<option>$provincia</option>";
        }
          
        }

        echo( "</select>
    </div>");

      }

  

