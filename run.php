<?php

$time1=round(microtime(true) * 1000);


// symbols 
$symbols=array();

// rules
$rules=array();



// tape
$tape = array( ) ;


include("program.php");

// grid view

$x1 = -200 ; $x2 = $x1+400 ;
$y1 = 0 ; $y2 = $y1+($x2-$x1)/1.61;

// grid image
$gw = $x2-$x1;
$gh=$y2-$y1+2;

$gar=$gw/$gh;
$gim = @imagecreatetruecolor( $gw,$gh ) or die('Cannot Initialize new GD image stream');
$col1 = imagecolorallocate($gim, 0, 0,0); 
$col2 = imagecolorallocate($gim, 255,255,255); 




// iteration
$y = 0 ;

if($y==$y1){


	for($i=$tapeMin;$i<=$tapeMax;$i++){


		if($tape[$i]==$symbols[1]){
			imagesetpixel($gim,$i-$x1,$y,$col2);
		}

	}

}

$flagDraw = false ;
while( $y <= $y2 ) {

	//print("$y\n");

	//$tmin = $tapeMin + 0 ;
	//$tmax = $tapeMax - 0 ;

	$tapeNext = array( ) ;

	for( $i = $tapeMin ; $i <= $tapeMax ; $i++ ){

		//$ruleVal = $rules[ $tape[ $i - 1 ].$tape[ $i ].$tape[ $i + 1 ] ];

		$tapeNext[ $i ] = $rules[ $tape[ $i - 1 ].$tape[ $i ].$tape[ $i + 1 ] ];


		/*
		if( $flagDraw && $ruleVal == $symbols[ 1 ] ) {

			imagesetpixel( $gim , $i - $x1 , $y - $y1 + 1 , $col2 ) ;

		} else {
			*/

			if( $y >= $y1 && $tapeNext[ $i ]== $symbols[ 1 ] ){

				imagesetpixel( $gim , $i - $x1 , $y - $y1 + 1 , $col2 ) ;

				//$flagDraw = true ; 

			}

		//}

	}

	$tape = $tapeNext ;

	$tape[ $tapeMin-- ] = $symbols[ 0 ] ;
	$tape[ $tapeMax++ ] = $symbols[ 0 ] ;

	//$tapeMin-- ;
	//$tapeMax++ ;

	$tape[ $tapeMin ] = $symbols[ 0 ] ;
	$tape[ $tapeMax ] = $symbols[ 0 ] ;


	//print_r($tape);

	$y++ ;

}



/////

// output image
$iw=960;
$ih=$iw/$gar;



$im1 = @imagecreatetruecolor( $iw,$ih ) or die('Cannot Initialize new GD image stream');

imagecopyresized($im1 , $gim , 0, 0, 0, 0, $iw , $ih , $gw, $gh);



$col1 = imagecolorallocate($im1, 0, 0,0); 
$col2 = imagecolorallocate($im1, 255,255,255); 
$col3 = imagecolorallocate($im1, 255,0,0); 

imagestring($im1, 1, 5, 5,  'zaf.io', $col3);


imagepng($gim,"gim.png");
imagepng($im1,"out.png");

system("cp out.png out-$time1.png");

imagedestroy($im1);
imagedestroy($gim);


$time2=round((round(microtime(true) * 1000)-$time1)/1000,2);

print("$time2\n");