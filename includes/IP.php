<?php

class IP
{
	function __constructor()
	{
		$fecha=getdate();
		//El constructor no hace nada
	}
	
	public function obtieneIP()
	{
		if ($_SERVER) 
		{
			if ( $_SERVER['HTTP_X_FORWARDED_FOR'] )
			{
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} 	
			elseif ( $_SERVER["HTTP_CLIENT_IP"] )
			{
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			}
			else	 
			{
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		} 
		else
		{
			if ( getenv( 'HTTP_X_FORWARDED_FOR' ) )
			{
				$realip = getenv( 'HTTP_X_FORWARDED_FOR' );
			} 
			elseif ( getenv( 'HTTP_CLIENT_IP' ) ) 
			{
				$realip = getenv( 'HTTP_CLIENT_IP' );
			} 
			else
			{
				$realip = getenv( 'REMOTE_ADDR' );
			}
		}	
		return $realip;
	}
	
	public function fecha()
	{
		$fecha=getdate();
		$fecha2="$fecha[mday]/$fecha[mon]/$fecha[year]";
		return $fecha2;
	}
	
	public function hora()
	{
		$fecha=getdate();
		$hora="$fecha[hours]:$fecha[minutes]";
		return $hora;
	}
	
	
}

?>