<?php
	/*Este archivo se incluye como cabecera de todas aquellas páginas que requieran
	  que el usuario esté conectado al sistema.
	  En caso de no estar conectado, se redirecciona a la página de LOGIN para luego volver.
	*/
	session_start();
	$origen= substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)."?".$_SERVER["QUERY_STRING"];
	$pagina=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
//	$paginasHotel = array("hotel.php","request.php","index.php","hotel_imgs.php");
//	$paginaProvedor = array("request.php","index.php","proveedores.php","prov_imgs.php");
//	$paginaServices = array("request.php","index.php");

	if(!isset($_SESSION["idAdminSAW"]))
	{
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=login.php'>";
		exit();
	}
//	else
//	{
//		if(isset($_SESSION["idRoleSAW"]))
//		{
//			$rol=$_SESSION["idRoleSAW"];
//			
//			if($rol==2 && !(in_array($pagina,$paginasHotel) ))
//			{
//				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=login.php'>";
//				exit();
//			}
//			if($rol==4 && !(in_array($pagina,$paginaServices) ))
//			{
//				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=login.php'>";
//				exit();
//			}
//			if($rol==5 && !(in_array($pagina,$paginaProvedor) ))
//			{
//				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=login.php'>";
//				exit();
//			}
//			
//		}			
//	}
?>