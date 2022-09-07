<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        IMG
* GENERATION DATE:  20.07.2021
* CLASS FILE:       /home/vmasideason/public_html/sql_class_generator/generated_classes/PACKAGE.php
* FOR MYSQL TABLE:  TBL_PACKAGE
* FOR MYSQL DB:     ryc_food_service
* -------------------------------------------------------
* CODE GENERATED BY:
* MY PHP-MYSQL-CLASS GENERATOR
* from: >> www.vmasideas.com
* -------------------------------------------------------
*
*/

require_once (__dir__ . "/Utils.php");

// **********************
// CLASS DECLARATION
// **********************

class PACKAGE implements JsonSerializable
{ // class : begin

    // **********************
    // ATTRIBUTE DECLARATION
    // **********************

    private $id_package;   // KEY ATTR. WITH AUTOINCREMENT

	private $id_variant;   // (normal Attribute)
	private $minimum;   // (normal Attribute)
	private $maximum;   // (normal Attribute)
	private $piece;   // (normal Attribute)
	private $path;   // (normal Attribute)
	private $id_type;   // (normal Attribute)

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

	public function __construct6($id_variant, $minimum, $maximum, $piece, $path, $id_type)
	{
		try {
			global $log, $db, $IP;
			$log->trace("[$IP] Entrando a __construct6");
			$this->id_variant = $id_variant;
			$this->minimum = $minimum;
			$this->maximum = $maximum;
			$this->piece = $piece;
			$this->path = $path;
			$this->id_type = $id_type;
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.INICIA.PACKAGE " . $ex);
			throw $ex;
		}
	}


    /**
	 * Constructor
	 * @abstract Se recibe el id del para obtener los demas de datos de db
	 * @param id id del objeto a construir
	 */
	public function __construct1($id)
	{
		try {
			global $log, $db, $IP;
			$this->id_package = $id;
			// $db->where("id_img", Utils::convUtf8($this->id_img));
			$db->where("id_package", $this->id_package);
			$obj = $db->get('TBL_PACKAGE');
			if ($db->count > 0) {
				$this->id_variant = $obj[0]["id_variant"];
				$this->minimum = $obj[0]["minimum"];
				$this->maximum = $obj[0]["maximum"];
				$this->piece = $obj[0]["piece"];
				$this->path = $obj[0]["path"];
				$this->id_type = $obj[0]["id_type"];
			} else {
				$log->trace("[$IP] Obj de clase TBL_PACKAGE no encontrada: " . $id);
			}
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.TBL_PACKAGE.__construct1 " . $ex);
			throw $ex;
		}
	}

	// **********************
	// GETTER METHODS
	// **********************

	function getId_package()
	{
		return $this->id_package;
	}

	function getId_variant()
	{
		return $this->id_variant;
	}

	function getMinimum()
	{
		return $this->minimum;
	}

	function getMaximum()
	{
		return $this->maximum;
	}

	function getPath()
	{
		return $this->path;
	}

	function getId_type()
	{
		return $this->id_type;
	}

    function getPiece()
	{
		return $this->piece;
	}

	// **********************
	// SETTER METHODS
	// **********************

	function setId_package($val)
	{
		$this->id_package =  $val;
	}

	function setId_variant($val)
	{
		$this->id_variant =  $val;
	}

	function setPath($val)
	{
		$this->path =  $val;
	}

	function setMinimum($val)
	{
		$this->minimum =  $val;
	}

	function setMaximum($val)
	{
		$this->maximum =  $val;
	}

	function setId_type($val)
	{
		$this->id_type =  $val;
	}

	function setPiece($val)
	{
		$this->piece =  $val;
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
			$log->trace("[$IP] Entrando a IMG.save");

			

			$data = array(
			    "id_variant" => $this->id_variant,
			    "minimum" => $this->minimum,
			    "maximum" => $this->maximum,
			    "piece" => $this->piece,
			    "path" => $this->path,
			    "id_type" => $this->id_type
			);


			$id = $db->insert('TBL_PACKAGE', $data);

			if ($id) {
				$this->id_img = $id;
				return true;
			} else
				$log->error("[$IP] ERROR.IMG.save " .  $db->getLastError());
				return false;
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.IMG.save " . $ex);
			throw new Exception('Ocurrio un error al guardar los datos del objeto IMG: ' . $db->getLastError());
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
			$log->trace("[$IP] Entrando a IMG.update");
			$data = array(
			    "id_variant" => $this->id_variant,
			    "minimum" => $this->minimum,
			    "maximum" => $this->maximum,
			    "piece" => $this->piece,
			    "path" => $this->path,
			    "id_type" => $this->id_type
			);

			$db->where("id_package", $this->id_package);

			if ($db->update('TBL_PACKAGE', $data)) {
				return true;
			} else
				throw new Exception('Error al actualizar los datos del objeto : ' . $db->getLastError());
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.IMG.update " . $ex);
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
			$db->where("id_package", $this->id_package);
			if ($db->update('TBL_PACKAGE', $data))
				return true;
			else
				throw new Exception('Error al desactivar el objeto: ' . $db->getLastError());
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.IMG.deactivate " . $ex);
			throw $ex;
		}
	}


	/**
	 * activate
	 * @abstract Metodo para realizar la activación de la habitación
	 */
	public function activate()
	{
		try {
			global $log, $db, $IP;
			$data = array(
				"id_status" => "1"
			);
			$db->where("id_package", $this->id_package);
			if ($db->update('TBL_PACKAGE', $data))
				return true;
			else
				throw new Exception('Error al activar el objeto: ' . $db->getLastError());
		} catch (Exception $ex) {
			$log->error("[$IP] ERROR.IMG.activate " . $ex);
			throw $ex;
		}
	}

    /**
	 * Serializacion de objeto
	 */
	public function jsonSerialize()
	{
		return [
			"id_package" => $this->id_package,
			"id_variant" => $this->id_variant,
			"minimum" => $this->minimum,
			"maximum" => $this->maximum,
			"piece" => $this->piece,
			"path" => $this->path,
			"id_type" => $this->id_type
		];
	}
	

} // class : end

?>