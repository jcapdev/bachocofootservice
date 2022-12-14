<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        VARIANT
* GENERATION DATE:  20.07.2021
* CLASS FILE:       /home/vmasideason/public_html/sql_class_generator/generated_classes/VARIANT.php
* FOR MYSQL TABLE:  TBL_VARIANT
* FOR MYSQL DB:     ryc_food_service
* -------------------------------------------------------
* CODE GENERATED BY:
* MY PHP-MYSQL-CLASS GENERATOR
* from: >> www.vmasideas.com
* -------------------------------------------------------
*
*/

require_once (__dir__ . "/Utils.php");
require_once (__dir__."/CONSERVATION.php");
require_once (__dir__."/PACKAGE.php");

// **********************
// CLASS DECLARATION
// **********************

class VARIANT implements JsonSerializable
{ // class : begin


    // **********************
    // ATTRIBUTE DECLARATION
    // **********************

    private $id_variant;   // KEY ATTR. WITH AUTOINCREMENT

	private $id_product;   // (normal Attribute)
	private $description;   // (normal Attribute)
	private $measurement;   // (normal Attribute)
	private $units;   // (normal Attribute)
	private $sku;   // (normal Attribute)
	private $color;   // (normal Attribute)
	private $odor;   // (normal Attribute)
	private $taste;   // (normal Attribute)
	private $aspect;   // (normal Attribute)
	private $box;   // (normal Attribute)
	private $stowage;   // (normal Attribute)
	private $id_status;   // (normal Attribute)
	private $creation_time;   // (normal Attribute)
	private $last_update_time;   // (normal Attribute)

	private $temperature;
	private $package;

    // **********************
	// CONSTRUCTOR METHOD
	// **********************

	public function __construct()
	{
		$a = func_get_args();
		$i = func_num_args();
		if (method_exists($this, $f = '__construct' . $i)) {
			call_user_func_array(array($this, $f), $a);
		}
	}

	public function __construct14($id_product, $description, $measurement, $units, $sku, $color, $odor, $taste, $aspect, $box, $stowage, $id_status, $creation_time, $last_update_time)
	{
		try {
			global $log, $db, $IP;
			$log->trace("[$IP] Entrando a __construct14");
			$this->id_product = $id_product;
			$this->description = $description;
			$this->measurement = $measurement;
            $this->units = $units;
			$this->sku = $sku;
			$this->color = $color;
			$this->odor = $odor;
			$this->taste = $taste;
			$this->aspect = $aspect;
			$this->box = $box;
			$this->stowage = $stowage;
			$this->id_status = $id_status;
			$this->creation_time = $creation_time;
			$this->last_update_time = $last_update_time;

			$this->temperature = array();
			$this->package = array();
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.INICIA.VARIANT " . $ex);
			throw $ex;
		}
	}


    /**
	 * Constructor
	 * @abstract Se recibe el id del para obtener los demas de datos de db
	 * @param id id del objeto a construir
	 */
	public function __construct2($sku,$other)
	{
		try {
			global $log, $db, $IP;
			$this->sku = $sku;
			// $db->where("id_variant", Utils::convUtf8($this->id_variant));
			$db->where("sku", $this->sku);
			$obj = $db->get('TBL_VARIANT');
			if ($db->count > 0) {
				$this->id_product = $obj[0]["id_product"];
				$this->description = $obj[0]["description"];
				$this->measurement = $obj[0]["measurement"];
                $this->units = $obj[0]["units"];
				$this->id_variant = $obj[0]["id_variant"];
				$this->color = $obj[0]["color"];
				$this->odor = $obj[0]["odor"];
				$this->taste = $obj[0]["taste"];
				$this->aspect = $obj[0]["aspect"];
				$this->box = $obj[0]["box"];
				$this->stowage = $obj[0]["stowage"];
				$this->id_status = $obj[0]["id_status"];
				$this->creation_time = $obj[0]["creation_time"];
				$this->last_update_time = $obj[0]["last_update_time"];
				$this->temperature = array();
				$this->package = array();
				if ($other) {
					$db->where("id_variant", $this->id_variant);
					$temperature = $db->get("TBL_CONSERVATION");
					for ($c=0; $c<count($servicios); $c++) {
						$this->temperature[] = new CONSERVATION($temperature[$c]["id_variant"]);
					}
				}
				if ($other) {
					$db->where("id_variant", $this->id_variant);
					$package = $db->get("TBL_PACKAGE");
					for ($c=0; $c<count($servicios); $c++) {
						$this->package[] = new PACKAGE($package[$c]["id_variant"]);
					}
				}
			} else {
				$log->trace("[$IP] Obj de clase VARIANT no encontrada: " . $id);
			}
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.VARIANT.__constructsku " . $ex);
			throw $ex;
		}
	}

	/**
	 * Constructor
	 * @abstract Se recibe el id del para obtener los demas de datos de db
	 * @param id id del objeto a construir
	 */
	public function __construct1($sku)
	{
		try {
			global $log, $db, $IP;
			$this->sku = $sku;
			// $db->where("id_variant", Utils::convUtf8($this->id_variant));
			$db->where("sku", $this->sku);
			$obj = $db->get('TBL_VARIANT');
			if ($db->count > 0) {
				$this->id_product = $obj[0]["id_product"];
				$this->description = $obj[0]["description"];
				$this->measurement = $obj[0]["measurement"];
                $this->units = $obj[0]["units"];
				$this->id_variant = $obj[0]["id_variant"];
				$this->color = $obj[0]["color"];
				$this->odor = $obj[0]["odor"];
				$this->taste = $obj[0]["taste"];
				$this->aspect = $obj[0]["aspect"];
				$this->box = $obj[0]["box"];
				$this->stowage = $obj[0]["stowage"];
				$this->id_status = $obj[0]["id_status"];
				$this->creation_time = $obj[0]["creation_time"];
				$this->last_update_time = $obj[0]["last_update_time"];
				$this->temperature = array();
				$this->package = array();
			} else {
				$log->trace("[$IP] Obj de clase VARIANT no encontrada: " . $id);
			}
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.VARIANT.__constructsku " . $ex);
			throw $ex;
		}
	}

	// **********************
	// GETTER METHODS
	// **********************

	function getId_variant()
	{
		return $this->id_variant;
	}

	function getId_product()
	{
		return $this->id_product;
	}

	function getDescription()
	{
		return $this->description;
	}

	function getMeasurement()
	{
		return $this->measurement;
	}

    function getUnits()
	{
		return $this->units;
	}

	function getSku()
	{
		return $this->sku;
	}

////////////////////////////

	function getColor()
	{
		return $this->color;
	}

	function getOdor()
	{
		return $this->odor;
	}

	function getTaste()
	{
		return $this->taste;
	}

	function getAspect()
	{
		return $this->aspect;
	}

	function getBox()
	{
		return $this->box;
	}

	function getStowage()
	{
		return $this->stowage;
	}

	function getId_status()
	{
		return $this->id_status;
	}

	function getCreation_time()
	{
		return $this->creation_time;
	}

	function getLast_update_time()
	{
		return $this->last_update_time;
	}

	function getTemperature()
	{
		return $this->temperature;
	}

	function getPackage()
	{
		return $this->package;
	}

	// **********************
	// SETTER METHODS
	// **********************

	function setId_variant($val)
	{
		$this->id_variant =  $val;
	}

	function setId_product($val)
	{
		$this->id_product =  $val;
	}

	function setDescription($val)
	{
		$this->description =  $val;
	}

	function setMeasurement($val)
	{
		$this->measurement =  $val;
	}

    function setUnits($val)
	{
		$this->units =  $val;
	}

	function setSku($val)
	{
		$this->sku =  $val;
	}

	/////////////

	function setColor($val)
	{
		$this->color =  $val;
	}

	function setOdor($val)
	{
		$this->odor =  $val;
	}

	function setTaste($val)
	{
		$this->taste =  $val;
	}

	function setAspect($val)
	{
		$this->aspect =  $val;
	}

	function setBox($val)
	{
		$this->box =  $val;
	}

	function setStowage($val)
	{
		$this->stowage =  $val;
	}

	function setId_status($val)
	{
		$this->id_status =  $val;
	}

	function setCreation_time($val)
	{
		$this->creation_time =  $val;
	}

	function setLast_update_time($val)
	{
		$this->last_update_time =  $val;
	}

	function setTemperature($val)
	{
		$this->temperature =  $val;
	}

	function setPackage($val)
	{
		$this->package =  $val;
	}

	/**
	 * save
	 * @abstract Metodo para guardar un objeto nuevo
	 */
	public function save()
	{
		try {
			// creamos objeto de base datos
			global $log, $db, $IP;
			$log->trace("[$IP] Entrando a VARIANT.save");

			

			$data = array(
                "id_product" => $this->id_product,
				"description" => $this->description,
				"measurement" => $this->measurement,
                "units" => $this->units,
				"sku" => $this->sku,
				"color" => $this->color,
				"odor" => $this->odor,
				"taste" => $this->taste,
				"aspect" => $this->aspect,
				"box" => $this->box,
				"stowage" => $this->stowage,
				"id_status" => $this->id_status,
				"current_time" => $this->creation_time,
				"last_update_time" => $this->last_update_time
			);


			$id = $db->insert('TBL_VARIANT', $data);

			if ($id) {
				$this->id_variant = $id;
				return true;
			} else
				$log->error("[$IP] ERROR.VARIANT.save " .  $db->getLastError());
				return false;
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.VARIANT.save " . $ex);
			throw new Exception('Ocurrio un error al guardar los datos del objeto VARIANT: ' . $db->getLastError());
		}
	}

	/**
	 * update
	 * @abstract Metodo para realizar la actualizacion de los datos de un objeto
	 */
	public function update()
	{
		try {

			global $log, $db, $IP;
			$log->trace("[$IP] Entrando a VARIANT.update");
			$data = array(
				"id_product" => $this->id_product,
				"description" => $this->description,
				"measurement" => $this->measurement,
                "units" => $this->units,
				"sku" => $this->sku,
				"color" => $this->color,
				"odor" => $this->odor,
				"taste" => $this->taste,
				"aspect" => $this->aspect,
				"box" => $this->box,
				"stowage" => $this->stowage,
				"id_status" => $this->id_status,
				"current_time" => $this->creation_time,
				"last_update_time" => $this->last_update_time
			);

			$db->where("id_variant", $this->id_variant);

			if ($db->update('TBL_VARIANT', $data)) {
				return true;
			} else
				throw new Exception('Error al actualizar los datos del objeto : ' . $db->getLastError());
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.VARIANT.update " . $ex);
			throw $ex;
		}
	}


    /**
	 * deactivate
	 * @abstract Metodo para realizar la desactivacion del objeto
	 */
	public function deactivate()
	{
		try {
			global $log, $db, $IP;
			$data = array(
				"id_status" => "2"
			);
			$db->where("id_variant", $this->id_variant);
			if ($db->update('TBL_VARIANT', $data))
				return true;
			else
				throw new Exception('Error al desactivar el objeto: ' . $db->getLastError());
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.VARIANT.deactivate " . $ex);
			throw $ex;
		}
	}


	/**
	 * activate
	 * @abstract Metodo para realizar la activaci??n de la habitaci??n
	 */
	public function activate()
	{
		try {
			global $log, $db, $IP;
			$data = array(
				"id_status" => "1"
			);
			$db->where("id_variant", $this->id_variant);
			if ($db->update('TBL_VARIANT', $data))
				return true;
			else
				throw new Exception('Error al activar el objeto: ' . $db->getLastError());
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.VARIANT.activate " . $ex);
			throw $ex;
		}
	}

    /**
	 * Serializacion de objeto
	 */
	public function jsonSerialize()
	{
		return [
			"id_variant" => $this->id_variant,
			"id_product" => $this->id_product,
			"description" => $this->description,
			"measurement" => $this->measurement,
            "units" => $this->units,
			"sku" => $this->sku,
			"color" => $this->color,
			"odor" => $this->odor,
			"taste" => $this->taste,
			"aspect" => $this->aspect,
			"box" => $this->box,
			"stowage" => $this->stowage,
			"id_status" => $this->id_status,
			"creation_time" => $this->creation_time,
			"last_update_time" => $this->last_update_time,
			"temperature" => $this->temperature,
			"package" => $this->package,
		];
	}
	

} // class : end

?>