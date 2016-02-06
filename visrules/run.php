<?php

$iw = 140 ;
$ih = 120 ;


// The text to draw
$text = 'Testing...';
$font = 'arial.ttf';



$im = imagecreatetruecolor( $iw, $ih ) ;
$color1 = imagecolorallocate( $im , 0 , 0 , 0 ) ;
$color2 = imagecolorallocate( $im , 255,255,255 ) ;
imagefilledrectangle ( $im , 0 , 0 , $iw,$ih,$color1);
//imagettftext($im, 20, 0, 11, 21, $color2, $font, $text);
ob_start( ) ;
imagepng( $im ) ;
$img1 = base64_encode( ob_get_contents( ) ) ;
ob_end_clean( ) ;
imagedestroy( $im ) ;

$im = imagecreatetruecolor( $iw, $ih ) ;
$color1 = imagecolorallocate( $im , 0 , 255 , 0) ;
$color2 = imagecolorallocate( $im , 255,255,255 ) ;
imagefilledrectangle ( $im , 0 , 0 , $iw,$ih,$color1);
//imagettftext($im, 20, 0, 11, 21, $color2, $font, $text);
ob_start( ) ;
imagepng( $im ) ;
$img2 = base64_encode( ob_get_contents( ) ) ;
ob_end_clean( ) ;
imagedestroy( $im ) ;


/*

$im = imagecreatetruecolor( $iw, $ih ) ;
$color1 = imagecolorallocate( $im , 255 , 255 , 255) ;
$color2 = imagecolorallocate( $im , 0,0,0) ;
imagefilledrectangle ( $im , 0 , 0 , $iw,$ih,$color1);
imagettftext($im, 20, 0, 60, 60, $color2, $font, "?");
ob_start( ) ;
imagepng( $im ) ;
$img2 = base64_encode( ob_get_contents( ) ) ;
ob_end_clean( ) ;
imagedestroy( $im ) ;
*/


?>


<script src='jquery.js'></script>


<script>
$(function(){


$("img").mousedown(function(){
    return false;
});

	console.log("hey");

	$(".divcellz").removeClass().addClass("divcelloff").click(function(){

		$(this).toggleClass("divcelloff").toggleClass("divcellon");

	});


});

</script>

<style>

table{
}
.divcelloff{

	background-repeat: no-repeat;
	background-position: center;
	background-image: url("data:image/png;base64,<?=$img1?>");

}


.divcellon{

	background-repeat: no-repeat;
	background-position: center;
	background-image: url("data:image/png;base64,<?=$img2?>");

}
</style>


<?php

function ruleupdate(){
	global $dline;
	global $tick;

	if($tick>1002){
	$dline=array();
	for($j=0;$j<1000;$j++){
		$v=3;
		$dline[]=$v;
	}
	return;	
	}

	$newline=array();
	for($j=0;$j<1000;$j++){
		$newline[]=0;

	}

	for($j=1;$j<999;$j++){
		if( ( $dline[$j-1] == 0 ) && ( $dline[$j] == 0 ) && ( $dline[$j+1] == 0 ) ) $newline[$j] = 0 ;
		if( ( $dline[$j-1] == 0 ) && ( $dline[$j] == 0 ) && ( $dline[$j+1] == 1 ) ) $newline[$j] = 0 ;
		if( ( $dline[$j-1] == 0 ) && ( $dline[$j] == 1 ) && ( $dline[$j+1] == 0 ) ) $newline[$j] = 0 ;
		if( ( $dline[$j-1] == 0 ) && ( $dline[$j] == 1 ) && ( $dline[$j+1] == 1 ) ) $newline[$j] = 0 ;
		if( ( $dline[$j-1] == 1 ) && ( $dline[$j] == 0 ) && ( $dline[$j+1] == 0 ) ) $newline[$j] = 0 ;
		if( ( $dline[$j-1] == 1 ) && ( $dline[$j] == 0 ) && ( $dline[$j+1] == 1 ) ) $newline[$j] = 1 ;
		if( ( $dline[$j-1] == 1 ) && ( $dline[$j] == 1 ) && ( $dline[$j+1] == 0 ) ) $newline[$j] = 0 ;
		if( ( $dline[$j-1] == 1 ) && ( $dline[$j] == 1 ) && ( $dline[$j+1] == 1 ) ) $newline[$j] = 0 ;
	}


	$dline=$newline;



}

	$dline=array();
	for($j=0;$j<1000;$j++){
		$v=0;
		//if($j==514) $v=1;
		//if(mt_rand(0,100)>50) $v=1;
		if(($j%2)==1) $v=1;
		$dline[]=$v;
	}

	$tick=0;
	for($i=0;$i<21;$i++){

		include("run-draw.php");
		$tick++;
		ruleupdate();	
	}
?>


