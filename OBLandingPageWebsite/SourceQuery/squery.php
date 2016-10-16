<?php
	require __DIR__ . '/../SourceQuery/bootstrap.php';
	use xPaw\SourceQuery\SourceQuery;
	
	// For the sake of this example
	Header( 'X-Content-Type-Options: nosniff' );
			
	// Edit this ->
	define( 'SQ_SERVER_ADDR', '149.202.88.7' ); //149.202.88.7
	define( 'SQ_SERVER_PORT', '27015' );
	define( 'SQ_TIMEOUT',     2 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-
			
	error_reporting(0);
	$Query = new SourceQuery( );
	$playersOnline = Array();
		
	$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
	
	$map = $Query->GetInfo( )[Map];
	$pOnline = $Query->GetInfo( )[Players];
	$maxPlayers = $Query->GetInfo( )[MaxPlayers];
	
	foreach ($Query->GetPlayers( ) as $player) {
		array_push($playersOnline, $player[Name]);
	}
		
	$Query->Disconnect( );
?>
