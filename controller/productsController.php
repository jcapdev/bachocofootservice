<?php
session_start();

require_once (__dir__."/../config.php"); 
require_once (__dir__."/../model/PRODUCT.php");
require_once (__dir__."/../model/CATEGORY.php");
require_once (__dir__."/../model/VARIANT.php");
require_once (__dir__."/../model/IMG.php");

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
     * Funcion para obtener los productos por categoria
     */
    function GetProducts($name) 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetProducts");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
			//$filas = $db->rawQuery("SELECT p.* FROM TBL_CATEGORY c INNER JOIN TBL_PRODUCT p ON p.id_category=c.id_category WHERE c.name='".$name."' AND p.id_status=1");
			
			$filas = $db->rawQuery("SELECT  c.id_category, c.id_product, c.name FROM  TBL_PRODUCT c  INNER JOIN TBL_CATEGORY k ON k.id_category=c.id_category WHERE k.id_category = '".$name."'   OR k.name='".$name."'");
			
			if ($db->count > 0)
			{	
			    foreach ($filas as &$row) {
			        $category= new CATEGORY($row["id_category"]);
					$parent= new CATEGORY($category->getId_category_parent());
		        	$images = $db->rawQuery("SELECT i.path FROM TBL_IMG i WHERE i.id_product = ".$row["id_product"]." AND i.id_status=1 AND i.main_img=1");
		        	//$variants = $db->rawQuery("SELECT v.* FROM TBL_VARIANT v WHERE v.id_product = ".$row["id_product"]." AND v.id_status=1");
			        $row["image"] = $images[0]["path"];
					$row["category_name"] = $category->getName();
					$row["parent_name"] = $parent->getName();
			        //$row["variants"] = $variants;
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
			$log->error("[".$IP."] "."ERROR.GET.PRODUCTS. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }
    
    /**
     * Funcion para obtener los productos por busqueda
     */
    function GetSearch($name) 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetSearch");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
			$filas = $db->rawQuery("SELECT p.* FROM TBL_PRODUCT p WHERE p.id_status=1 AND (p.name LIKE '%$name%' OR p.description_b2b LIKE '%$name%')");
			
			//$filas = $db->rawQuery("SELECT  c.id_category, c.id_product, c.name FROM  TBL_PRODUCT c  WHERE (c.name LIKE '%$name%' OR c.description_b2b LIKE '%$name%' OR c.id_catego)");
			$filas = $db->rawQuery("SELECT  c.id_category, c.id_product, c.name, cat.id_category_parent  FROM  TBL_PRODUCT c  INNER JOIN TBL_CATEGORY cat ON c.id_category = cat.id_category  WHERE (c.name LIKE '%$name%' OR c.description_b2b LIKE '%$name%' OR cat.id_category_parent like '%$name%')");
			
			if ($db->count > 0)
			{	
			    foreach ($filas as &$row) {
		        	$category= new CATEGORY($row["id_category"]);
					$parent= new CATEGORY($category->getId_category_parent());
		        	$images = $db->rawQuery("SELECT i.path FROM TBL_IMG i WHERE i.id_product = ".$row["id_product"]." AND i.id_status=1 AND i.main_img=1");
		        	//$variants = $db->rawQuery("SELECT v.* FROM TBL_VARIANT v WHERE v.id_product = ".$row["id_product"]." AND v.id_status=1");
			        $row["image"] = $images[0]["path"];
					$row["category_name"] = $category->getName();
					$row["parent_name"] = $parent->getName();
			        //$row["variants"] = $variants;
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
			$log->error("[".$IP."] "."ERROR.GET.SEARCH. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }
    
    /**
     * Funcion para obtener los productos
     */
    function GetProductsAll() 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetProductsAll");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
            $filas = $db->rawQuery("SELECT  c.id_category, c.id_product, c.name FROM TBL_PRODUCT c  ORDER BY RAND() LIMIT 16");
            

			//$filas = $db->rawQuery("SELECT p.* FROM TBL_PRODUCT p WHERE p.id_status=1 ORDER BY RAND() LIMIT 16");
			
			if ($db->count > 0)
			{
			   $parent;
			    foreach ($filas as &$row) {
                    $category= new CATEGORY($row["id_category"]);
					$parent= new CATEGORY($category->getId_category_parent());
		        	$images = $db->rawQuery("SELECT i.path FROM TBL_IMG i WHERE i.id_product = ".$row["id_product"]." AND i.id_status=1 AND i.main_img=1");
		        	//$variants = $db->rawQuery("SELECT v.* FROM TBL_VARIANT v WHERE v.id_product = ".$row["id_product"]." AND v.id_status=1");
			        $row["image"] = $images[0]["path"];
					$row["category_name"] = $category->getName();
					$row["parent_name"] = $parent->getName();
			        //$row["variants"] = $variants;
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
			$log->error("[".$IP."] "."ERROR.GET.PRODUCTSALL. ".$ex); 
            return throwJsonException($ex->getMessage());
        }
    }

    /**
     * Funcion para obtener un producto
     */
    function GetProduct($id_product) 
	{
		global $log,$db,$IP;
		$log->trace("[".$IP."] "."Entrando a funcion GetProduct");   
        try 
		{
			//$user_in = unserialize($_SESSION["user_in"]);
            $product = new PRODUCT($id_product);
            
            
            $productos = $db->rawQuery("SELECT p.*, c.name as subcategory_name, c.id_category_parent as parent_category_id  FROM TBL_PRODUCT p INNER JOIN TBL_CATEGORY c ON p.id_category=c.id_category WHERE p.id_product= $id_product AND p.id_status=1");
            
            foreach($productos as &$result){
                $menus = $db->rawQuery("SELECT c.name FROM TBL_CATEGORY c WHERE c.id_category=".$productos[0]["parent_category_id"]);
                $result["category_name"] = $menus[0]["name"];
            }
            
            $variants = $db->rawQuery("SELECT v.* FROM TBL_VARIANT v WHERE v.id_product = $id_product AND v.id_status=1");
            $images = $db->rawQuery("SELECT i.* FROM TBL_IMG i WHERE i.id_product = $id_product AND i.id_status=1 ORDER BY i.main_img DESC");

            $json_data = array("data" => $productos[0], "variants" => $variants, "images"=> $images);
            $json =  json_encode($json_data);
			return $json; 
                  
        }
        catch(Exception $ex) 
		{
            // en caso de error lanzamos la exception 
			$log->error("[".$IP."] "."ERROR.GET.PRODUCT. ".$ex); 
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
        if($action == "GetProducts")
        {
            $name = $_POST["name"];
            $result = GetProducts($name);
            echo $result;
        }
        else if($action == "GetSearch")
        {
            $name = $_POST["name"];
            $result = GetSearch($name);
            echo $result;
        }
        else if($action == "GetProductAll") {
			$result = GetProductsAll();
			echo $result;
		}
		else if($action == "GetProduct") {
			$id_product = $_POST["id_product"];
			$result = GetProduct($id_product);
			echo $result;
		}
    }
?>