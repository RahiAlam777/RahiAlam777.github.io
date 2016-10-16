<?php require_once("squery.php"); 
		$status = "";
		function ping($host,$port=27015,$timeout=6)
		{
	        $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
	        if ( ! $fsock )
	        {
	              return FALSE;
	        }
	        else
	        {
	                return TRUE;
	        }
		}
		$host = 'jb.join-ob.com';
		$up = ping($host);
		
		if ( $up ) {
			$status = "Online";
			$colorCode = "status-online";
		}
		else {
			$status = "Offline";
			$colorCode = "status-offline";
		}
?>
