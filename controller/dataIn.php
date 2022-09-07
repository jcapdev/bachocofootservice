<?php 
session_start();
//session_name("FC-VMAS");

require_once (__dir__."/../config.php"); 
require_once (__dir__."/../model/CATEGORY.php"); 
require_once (__dir__."/../model/PRODUCT.php"); 
require_once (__dir__."/../model/VARIANT.php"); 

// indicamos tipo de datos
header('Content-Type: application/json');

 /*                      Funciones generales                  */
    /*************************************************************/
    function throwJsonException($msg) {
        return json_encode(array('error'=> true, 'msg' => $msg));
    }

/****************                 Functions                        *************/

function intro() 
{
	global $log,$db,$IP;
	//$log->trace("[".$IP."] "."Entrando a funcion login: ".$user." - ".$passw);  
	try 
	{

        require_once 'PHPExcel/Classes/PHPExcel.php';
        $archivo = "../productos_RYCFS_BD.xlsx";
        $inputFileType = PHPExcel_IOFactory::identify($archivo);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($archivo);
        $sheet = $objPHPExcel->getSheet(0); 
        $highestRow = $sheet->getHighestRow(); 
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++){
            $sku= $sheet->getCell("A".$row)->getValue();
            $name= $sheet->getCell("B".$row)->getValue();
            $Description= $sheet->getCell("C".$row)->getValue();
            $category= $sheet->getCell("D".$row)->getValue();
            $subCategory= $sheet->getCell("E".$row)->getValue();
            $DescriptionVar= $sheet->getCell("F".$row)->getValue();
            $WeightUnit= $sheet->getCell("G".$row)->getValue();
            $Units= $sheet->getCell("H".$row)->getValue();
    
        $log->trace("[".$IP."] "."Entrando a funcion login: ".$sku." - ".$name);

        $id_category;
        $db->where("name", $category);
	    $cat = $db->get('TBL_CATEGORY');
	    if ($db->count > 0) {
            $cat_container= new CATEGORY($cat[0]['id_category']);
            $id_category= $cat_container->getId_category();
        }
        else{
            $cat_in = new CATEGORY(NULL,$category,NULL,NULL,NULL,1,$db->now(),$db->now());
            $cat_in->save();
            $id_category=$cat_in->getId_category();
        }

        $id_sub;
        if($subCategory!=NULL){            
            $db->where("name", $subCategory);
	        $subs = $db->get('TBL_CATEGORY');
	        if ($db->count > 0) {
                $cat_container= new CATEGORY($subs[0]['id_category']);
                $id_sub= $cat_container->getId_category();      
            }
            else{
                $subcat_in = new CATEGORY($id_category,$subCategory,NULL,NULL,NULL,1,$db->now(),$db->now());
                $subcat_in->save();
                $id_sub=$subcat_in->getId_category();
            }
        }
        else{
            $id_sub=$id_category;
        }


        $id_product;
        $db->where("name", $name);
	    $prod = $db->get('TBL_PRODUCT');
	    if ($db->count > 0) {
            $product_in = new PRODUCT($prod[0]['id_product']);
            $id_product= $product_in->getId_product();
        }
        else{
            $product_in = new PRODUCT($id_sub,$name,$Description,1,$db->now(),$db->now());
            $product_in->save();
            $id_product=$product_in->getId_product();
        }

        $db->where("sku", $sku);
	    $cat = $db->get('TBL_VARIANT');
	    if ($db->count == 0) {
            $variant_in = new VARIANT($id_product,$DescriptionVar,$WeightUnit,$Units,$sku,1,$db->now(),$db->now());
        
            $variant_in->save();
        }

        
    
    }

}
catch(Exception $ex) 
{
    // en caso de error lanzamos la exception 
    $log->error("[".$IP."] "."ERROR.EXCEL. ".$ex); 
    return throwJsonException($ex->getMessage());
}
}

/*******************************************************************************/
/*                                Page Load                                    */
/*******************************************************************************/

// Comprobamos si esta es una llamada de ajax
if(isset($_POST["Action"]))
{
	$action = $_POST["Action"];
	$log->trace("[".$IP."] "."Entrando a acción: ".$action); 
	if ($action=="insert") 
	{
		$result = intro();
		echo $result;
	}
}
//$log->trace("[$IP] Sesion: ".print_r($_SESSION["cita_seleccionada"],true));

?>