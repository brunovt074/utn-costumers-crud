<!doctype html>
<!--Seteamos el lenguaje en Locale-->
<html lang="">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap y CSS personalizado -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost/dashboard/projects/utn-costumers-crud/shared_files/css/estilo.css">    

    <title>Carga de Clientes</title>
  </head>

  <body>
    <header>    
        <!--NAVBAR-->
        <nav class="navbar container-fluid" id="barra-nav">
          <a class="col-sm-12 col-md-1" href="http://localhost/dashboard/projects/utn-costumers-crud/laravel/public/">
            <img src="http://localhost/dashboard/projects/utn-costumers-crud/shared_files/imgs/utn-logo.png" width="253" height="40" class="d-inline-block" alt="">      
          </a>
          <h3></h3>
        </nav>  
        <!--FIN NAVBAR-->
        <nav class="container-fluid nav mt-3 hstack gap-2">
        <ul class="nav nav-pills pl-5 ml-5 hstack gap-3">
        <li class="nav-item">
          <a class="btn btn-primary" type="button" href="http://localhost/dashboard/projects/utn-costumers-crud/laravel/public/clientes/create">Crear Cliente</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary" type="button" href="http://localhost/dashboard/projects/utn-costumers-crud/laravel/public/">Lista de clientes</a>
        </li>        
      </ul>  
      </nav>
      <hr>      
        
        <!--TITULO-->
        <div class="container-fluid mt-4 pt-2 mb-3 pb-3 text-center">
           <h2>Carga de BDD con archivo CSV en PHP Nativo</h2>
           <hr>           
        </div>    
    </header>    
    
    <main class="pb-5 mb-5">        
        <div class="container-fluid pb-5 mb-5 text-center">
            <!--INICIO CUADRO-->       
            <div class="card container text-center col-sm-12 col-md-6 col-lg-4 mb-5 pl-0 pr-0">
                <div class="card-body pb-5 pt-3 pl-0 pr-0">
                    <h5 class="pb-5" >Subir archivo de estudiantes con extension .csv</h5>      
                    <div class="" >
                        <!--action para mandar la info    -->
                        <!--name = variable con validez para el action id => referencia al DOM del html-->
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <div class="container">
                            <input type="file" name="listaClientes" id="listaClientes">   
                        </div>
                        <div class="mt-5">
                            <input type="submit" name="submit">
                        </div>                        
                        </form>                                  
                    </div>                                
                </div>
                <?php
                //aseguramos que haya un submit cargado, de lo contrario no ejecutamos el codigo
                
                if (isset($_REQUEST['submit'])) {
                include('upload.php');                           
                }
            ?>                                
            </div>
            <!--FIN CUADRO-->
        </div>      
    </main>
    
    <!--FOOTER-->
    <footer class="container-fluid mt-5 mb-0">
        <div class="container mb-0">
            <p class="pt-3">
               Página realizada por Bruno Vargas Tettamanti<br>
               E-mail: brunovt.074@gmail.com<br>               
            </p>                
        </div>
    </footer>
    <!--FIN FOOTER-->  
  </body>
</html>


