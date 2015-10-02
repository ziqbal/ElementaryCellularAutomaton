<?php


// symbols 
$symbols[ 0 ] = '0' ;
$symbols[ 1 ] = '1' ;

// rules
$rules[ $symbols[ 0 ].$symbols[ 0 ].$symbols[ 0 ] ] = $symbols[ 0 ] ;
$rules[ $symbols[ 0 ].$symbols[ 0 ].$symbols[ 1 ] ] = $symbols[ 1 ] ;
$rules[ $symbols[ 0 ].$symbols[ 1 ].$symbols[ 0 ] ] = $symbols[ 1 ] ;
$rules[ $symbols[ 0 ].$symbols[ 1 ].$symbols[ 1 ] ] = $symbols[ 1 ] ;
$rules[ $symbols[ 1 ].$symbols[ 0 ].$symbols[ 0 ] ] = $symbols[ 0 ] ;
$rules[ $symbols[ 1 ].$symbols[ 0 ].$symbols[ 1 ] ] = $symbols[ 1 ] ;
$rules[ $symbols[ 1 ].$symbols[ 1 ].$symbols[ 0 ] ] = $symbols[ 1 ] ;
$rules[ $symbols[ 1 ].$symbols[ 1 ].$symbols[ 1 ] ] = $symbols[ 0 ] ;



// tape

//print_r($argv);
if( isset( $argv[ 1 ] ) ) {

	$z = intval( $argv[ 1 ] ) ;
	$tape[ -$z ] = $symbols[ 1 ] ;	
	$tape[ $z ] = $symbols[ 1 ] ;	

} else {

 $tape[ 0 ] = $symbols[ 1 ] ;	

}

$tapeMin = min(array_keys( $tape ) ) - 3 ;
$tapeMax = max(array_keys( $tape ) ) + 3 ;

for( $i = $tapeMin ; $i <= $tapeMax ; $i++ ) {

	if( !isset( $tape[ $i ] ) ) $tape[ $i ] = $symbols[ 0 ] ;

}





