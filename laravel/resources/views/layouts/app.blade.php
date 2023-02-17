<!--PLANTILLA-PADRE-->

<!doctype html>
<!--Seteamos el lenguaje en Locale-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap y CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('http://localhost/dashboard/projects/utn-costumers-crud/shared_files/css/estilo.css')}}">   

    <title>@yield('titulo')</title>
  </head>

  <body>    
    <header>
      <!--NAVBAR-->
      
        <nav class="navbar container-fluid" id="barra-nav">
        <div class="col-sm-12 col-md-1">
          <a class="navbar-brand" href="{{ route('home') }}">
          <img src="http://localhost/dashboard/projects/utn-costumers-crud/shared_files/imgs/utn-logo.png" width="253" height="40" class="d-inline-block align-top" alt="img-utn">        
        </a>
        </div>       
      </nav>

      <nav class="nav container-fluid mt-3 ml-0 pl-0 hstack gap-2">
        <ul class="container nav nav-pills pr-2 mr-2 hstack gap-3">
        <li class="nav-item">
          <a class="btn btn-primary" type="button" href="{{ route('clientes.create') }}">Crear Cliente</a>
        </li>
        <li class=" nav-item">
          <a class="btn btn-primary" type="button" href="http://localhost/dashboard/projects/utn-costumers-crud/php/public/index.php">Cargar archivo csv de clientes</a>
        </li>        
      </ul>  
      </nav>
      <hr>     
    </header>

    <main class="pb-3 mb-5">                     
        <div class="container-fluid pb-3 mb-5">
          <div class="container mb-5 pb-3">
            @yield('titulo-seccion')        
            @yield('contenido')         
          </div>                    
        </div>              
    </main>  
      
    <!--FOOTER-->
    <footer class="container-fluid mt-5 mb-0 pb-0">
        <div class="container mb-0 pb-0">
            <p class="pt-3 mb-0 pb-0">
               Página realizada por Bruno Vargas Tettamanti<br>
               E-mail: brunovt.074@gmail.com<br>
               
               <a class="text-white" href="https://www.linkedin.com/in/bruno-vargas-tettamanti-developer/">Linkedin</a>
            </p>                
        </div>
    </footer>
    <!--FIN FOOTER-->

    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>  
</html>