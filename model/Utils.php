<?php
/**
 * Util
 * @abstract Clase con metodos comunes y utiles
 */
class Utils {
    /**
     * convertUtf8
     * @abstract Metodo para convertir una cadena a formato utf8 para ingreso a base de datos 
     */
    public static function convUtf8($string)
    {
        try
        {
            return iconv("UTF-8", "ISO-8859-1",$string);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
	/**
     * toMoney
     * @abstract Metodo para convertir una cadena numerica a un formato de dinero
     */
    public static function toMoney($val,$symbol='$',$r=2)
    {
        if($val != "")
        {
            $n = $val; 
            $c = is_float($n) ? 1 : number_format($n,$r);
            $d = '.';
            $t = ',';
            $sign = ($n < 0) ? '-' : '';
            $i = $n = number_format(abs($n),$r);
            $j = (($j = strlen($i)) > 3) ? $j % 3 : 0; 
        
            return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;
       }
       else
       {
            return "";
       }
    }
	
	
    /**
     * toValidUrl
     * @abstract Metodo para convertir un path con acentos especiales en un url valido
     */
    public static function toValidUrl($path)
    {
        $aux = str_replace('%2F','/',urlencode($path));
        $aux = str_replace('+','%20', $aux);
        return $aux;
    }
}
?>