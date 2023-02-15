<?php 

$nro_registros = 0;
$errors = [];
$timestamp = 0;

validarArchivo($nro_registros,$errors,$timestamp);
contarErrores($nro_registros,$errors,$timestamp);

function contarErrores(&$nro_registros,&$errors,&$timestamp){

	switch ($nro_registros) {
				
	case '0':
		
			echo" <div class=\"alert alert-warning mt-0 mb-0 ml-0\" role=\"alert\">
		  			No se ingresaron registros.<br/>
			 	  </div>
			 	  <div class=\"alert alert-danger mt-0 mb-0 ml-0\" role=\"alert\">
		  		 	Número de errores: ".count($errors)."	  		 			  		 	
			 	  </div>";				
		break;
	
	case '1':
		if (count($errors) == 0) {
			
			echo"<div class=\"alert alert-success mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
			  		Se insertó  $nro_registros registro.<br>
			  		Importación finalizada: $timestamp<br/>
			  		No se registraron errores.
		  		 </div>";
		}
		else{
			echo"<div class=\"alert alert-success mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
			  		Se insertó  $nro_registros registro.<br/>
			  		Importación finalizada: $timestamp<br/>
		  		</div>	
		  		<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
		  		 	Número de errores: ".count($errors)."		  		 	
		 	  	</div>";

		}				
		break;

	default:
		if (count($errors) == 0) {
			echo"<div class=\"alert alert-success mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
		  		Se insertaron $nro_registros registros<br/>
			  	Importación finalizada: $timestamp<br/>
			  	No se registraron errores.
			 </div>";
		}
		else{
			echo"<div class=\"alert alert-success mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
		  		Se insertaron $nro_registros registros<br/>
			  	Importación finalizada: $timestamp
			  	</div>
			  	<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
		  		 	Número de errores: ".count($errors)."		  		 	
		 	  	</div>";
				}

			break;
	}
	
}

function crearStatementTabla(){

	return $stmtTabla = "-- phpMyAdmin SQL Dump
						-- version 5.2.0
						-- https://www.phpmyadmin.net/
						--
						-- Servidor: 127.0.0.1
						-- Tiempo de generación: 13-12-2022 a las 01:41:01
						-- Versión del servidor: 10.4.24-MariaDB
						-- Versión de PHP: 8.1.6

						SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
						START TRANSACTION;
						SET time_zone = \"+00:00\";


						/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
						/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
						/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
						/*!40101 SET NAMES utf8mb4 */;

						--
						-- Base de datos: `daw2022_bvargas`
						--
						CREATE DATABASE IF NOT EXISTS `daw2022_bvargas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
						USE `daw2022_bvargas`;

						-- --------------------------------------------------------

						--
						-- Estructura de tabla para la tabla `clientes`
						--

						CREATE TABLE IF NOT EXISTS `clientes` (
						  `nro_cliente` bigint(99) NOT NULL AUTO_INCREMENT,
						  `cuit` varchar(11) NOT NULL,
						  `apellido` varchar(100) NOT NULL,
						  `nombre` varchar(100) NOT NULL,
						  `telefono` varchar(25) NOT NULL,
						  `email` varchar(150) NOT NULL,
						  `provincia` varchar(100) NOT NULL,
						  PRIMARY KEY (`nro_cliente`),
						  UNIQUE KEY `cuit` (`cuit`)
						) ENGINE=InnoDB AUTO_INCREMENT=5816 DEFAULT CHARSET=utf8mb4;
						COMMIT;

						/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
						/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
						/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
						";
}
	
function manipularDatos(&$nro_registros,&$errors,&$timestamp){
	
	//nos fijamos que se haya subido algun archivo y este sea de tipo csv
	if(isset($_FILES) && $_FILES['listaClientes']['type'] ==='text/csv'){

		//nos aseguramos que sea una archivo subido mediante POST para evitar codigo malicioso.
		if(is_uploaded_file($_FILES['listaClientes']['tmp_name'])){
						
			try{			
			
			//conectamos a la BDD
			$count = 0;
			$bdd = new PDO('mysql:host=localhost','root','');	

			$bdd -> exec(crearStatementTabla());

			$bdd = new PDO('mysql:host=localhost; dbname=daw2022_bvargas','root','');
				
				//abrimos archivo
				try {
					date_default_timezone_set('America/Argentina/Buenos_Aires');

					$abrir_csv = fopen($_FILES['listaClientes']['tmp_name'], 'r');			

					//realizamos los inserts
					try {
						
						//fgetcsv se utiliza para parsear el archivo csv e indicar parametros
						while ($usar_csv = fgetcsv($abrir_csv,0,';')) {
							
							if($count > 0){
								
								try {

									//con el exec contamos el nro de registros ingresados.
									$bdd -> exec("INSERT INTO clientes(cuit, apellido,nombre,  telefono, email, provincia) VALUES ('$usar_csv[0]','$usar_csv[1]', '$usar_csv[2]', '$usar_csv[3]', '$usar_csv[4]','$usar_csv[5]')");
										
								}catch (Exception $e) {

									$errors[]= $e->getMessage();	

									$bdd -> exec("INSERT IGNORE INTO clientes(cuit, apellido,nombre,  telefono, email, provincia) VALUES ('$usar_csv[0]','$usar_csv[1]', '$usar_csv[2]', '$usar_csv[3]', '$usar_csv[4]','$usar_csv[5]')");
									
								}
								
							}

						$count++; 	
						}

												
					} catch (Exception $e) {
						$errors[]= $e->getMessage();
						echo"<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
							  	ERROR: ".$e->getMessage()."<br/>
							</div>";
						
					}

				} catch (Exception $e) {
					$errors[]= $e->getMessage();
					echo"<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
							  	ERROR: ".$e->getMessage()."<br/>
							</div>";								
				}				
				
			//Capturamos posibles excepciones en BDD
			}catch(PDOException $e){
				$errors[]= $e->getMessage();
				echo"<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
						ERROR: ".$e->getMessage()."<br/>
					</div>";
				
			}finally{

				$timestamp = date('d/m/Y H:i:s');
				
				//cerrando archivo csv
				if(isset($abrir_csv)){
					fclose($abrir_csv);	
				}
				

				//cerrando conexiones de BDD
				$bdd = null;

				if ($count > 0) {
					--$count;
					$nro_registros = $count - count($errors);

					if ($nro_registros < 0) {
						$nro_registros = 0;
					}
				}
				
							
				

				
					

				}
			}
		}
		else if($_FILES['listaClientes']['type'] !='text/csv'){

				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
			  		ERROR: Formato de archivo incorrecto<br/>
					</div>";
				$errors[] = $_FILES['listaClientes']['error'];
		}
	}

	
		

function validarArchivo(&$nro_registros,&$errors,&$timestamp){

	
	switch ($_FILES['listaClientes']['error']) {
	
			case UPLOAD_ERR_OK:
				manipularDatos($nro_registros,$errors,$timestamp);
				break;
			case UPLOAD_ERR_INI_SIZE:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: El archivo excede el límite de tamaño. (Directiva  upload_max_filesize en php.ini)<br/>
					  </div>";
			  	$errors[] = $_FILES['listaClientes']['error'];
				break;
			case UPLOAD_ERR_FORM_SIZE:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: El archivo excede el límite de tamaño. (Directiva MAX_FILE_SIZE en el formulario HTML).<br/>						
					  </div>";
			  	$errors[] = $_FILES['listaClientes']['error'];
				break;
			case UPLOAD_ERR_PARTIAL:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: El archivo se cargo parcialmente.<br/>
					  </div>";
			    $errors[] = $_FILES['listaClientes']['error'];
				break;
			case UPLOAD_ERR_NO_FILE:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: No se selecciono archivo.<br/>
					  </div>";
			    $errors[] = $_FILES['listaClientes']['error'];
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: No se encuentra directorio temporal.<br/>
					  </div>";
			    $errors[] = $_FILES['listaClientes']['error'];
				break;
			case UPLOAD_ERR_CANT_WRITE:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: Falló al intentar escribir en disco.<br/>
					  </div>";
			    $errors[] = $_FILES['listaClientes']['error'];
				break;
			case UPLOAD_ERR_EXTENSION:
				echo "<div class=\"alert alert-danger mt-0 mb-0\" role=\"alert\">
						ERROR: Una extension PHP detuvo la carga. Consulte phpinfo()<br/>
					  </div>";
			    $errors[] = $_FILES['listaClientes']['error'];
				break;			
			default:
				
				break;
		}

}
		
		
?>