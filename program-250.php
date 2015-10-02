<?php


// symbols 
$symbols[0] = '0' ;
$symbols[1] = '1' ;
$symbols[2] = '2' ;

// rules
$rules[ $symbols[0].$symbols[0].$symbols[0] ] = $symbols[ 0 ] ;
$rules[ $symbols[0].$symbols[0].$symbols[1] ] = $symbols[ 1 ] ;
$rules[ $symbols[0].$symbols[1].$symbols[0] ] = $symbols[ 0 ] ;
$rules[ $symbols[0].$symbols[1].$symbols[1] ] = $symbols[ 1 ] ;
$rules[ $symbols[1].$symbols[0].$symbols[0] ] = $symbols[ 1 ] ;
$rules[ $symbols[1].$symbols[0].$symbols[1] ] = $symbols[ 1 ] ;
$rules[ $symbols[1].$symbols[1].$symbols[0] ] = $symbols[ 1 ] ;
$rules[ $symbols[1].$symbols[1].$symbols[1] ] = $symbols[ 1 ] ;



// tape
$tapeMin = -3 ;
$tapeMax = 3 ;
for($i=$tapeMin;$i<=$tapeMax;$i++) $tape[$i]=$symbols[0];
$tape[0] = $symbols[1] ;	

