<?php
session_start();

require_once (__dir__."/../config.php"); 
require_once (__dir__."/../model/CATEGORY.php");

// indicamos tipo de datos
header('Content-Type: application/json');

    /*                      Funciones generales                  */
    /*************************************************************/
    function throwJsonException($msg) {
        return json_encode(array('error'=> true, 'msg' => $msg));
    }
    /*************************************************************/
    /*                    Funciones Especificas                  */
    /*************************************************************/

    /**
     * Funcion para obtener las categorias
     */
    function GetCategories() 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetCategories");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
			$filas = $db->rawQuery("SELECT c.* FROM TBL_CATEGORY c WHERE c.id_category_parent IS NULL AND c.id_status=1");
			if ($db->count > 0)
			{	
				$json =  json_encode($filas);
				return $json;        
			}
			else
			{
				return json_encode([]);
			}     
        }
        catch(Exception $ex) 
		{
            // en caso de error lanzamos la exception 
			$log->error("[".$IP."] "."ERROR.GET.CATEGORY. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }

    /**
     * Funcion para obtener solo una categoria o subcategoria
     */
    function GetCategory($id_category) 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetCategory");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
			$filas = $db->rawQuery("SELECT c.* FROM TBL_CATEGORY c WHERE c.id_category=$id_category AND c.id_status=1");
			if ($db->count > 0)
			{	
				$json =  json_encode($filas);
				return $json;        
			}
			else
			{
				return json_encode([]);
			}     
        }
        catch(Exception $ex) 
		{
            // en caso de error lanzamos la exception 
			$log->error("[".$IP."] "."ERROR.GET.CATEGORY. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }

    /**
     * Funcion para obtener las subcategorias de una categoria
     */
    function GetSubcategories($id_category) 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetSubcategories");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
			$filas = $db->rawQuery("SELECT c.* FROM TBL_CATEGORY c WHERE c.id_category_parent=$id_category AND c.id_status=1");
			if ($db->count > 0)
			{	
				$json =  json_encode($filas);
				return $json;        
			}
			else
			{
				return json_encode([]);
			}     
        }
        catch(Exception $ex) 
		{
            // en caso de error lanzamos la exception 
			$log->error("[".$IP."] "."ERROR.GET.SUBCATEGORY. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }
    
    /**
     * Funcion para obtener las subcategorias de una categoria
     */
    function GetSubs() 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetSubs");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
			$filas = $db->rawQuery("SELECT DISTINCT c.id_category,c.name, c.id_category_parent FROM TBL_CATEGORY c WHERE c.id_category_parent IS NOT NULL AND c.id_status=1");
			if ($db->count > 0)
			{	
			    
			    foreach($filas as &$row){
			        $parent= $db->rawQuery("SELECT p.name AS name FROM TBL_CATEGORY p WHERE p.id_category='".$row["id_category_parent"]."' AND p.id_status=1");
			        $row["parent"]=$parent[0]["name"];
			        $count_prod= $db->rawQuery("SELECT Count(*) AS count_products FROM TBL_CATEGORY c INNER JOIN TBL_PRODUCT p ON p.id_category=c.id_category WHERE c.name='".$row["name"]."' AND p.id_status=1");
			        $row["count"]=$count_prod[0]["count_products"];
			    }
				$json =  json_encode($filas);
				return $json;        
			}
			else
			{
				return json_encode([]);
			}     
        }
        catch(Exception $ex) 
		{
            // en caso de error lanzamos la exception 
			$log->error("[".$IP."] "."ERROR.GET.SUBCATEGORY. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }
    

    /*************************************************************/
    /*                Punto de entrada de la aplicacion          */
    /*************************************************************/
    // Comprobamos si esta es una llamada de ajax
    
    if(isset($_POST["Action"]))
    {
        $action = $_POST["Action"];
		$log->trace("[".$IP."] "."ACTION: ".$action);
        if($action == "GetCategories")
        {
            $result = GetCategories();
            echo $result;
        }
		else if($action == "GetSubcategories") {
			$id_category = $_POST["id_category"];
			$result = GetSubcategories($id_category);
			echo $result;
		}
		else if($action == "GetSubs") {
			$result = GetSubs();
			echo $result;
		}
        else if($action == "GetCategory") {
			$id_category = $_POST["id_category"];
			$result = GetCategory($id_category);
			echo $result;
		}
    }
?>