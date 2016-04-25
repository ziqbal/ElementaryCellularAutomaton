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

	$(".divcell").removeClass().addClass("divcelloff").click(function(){

		$(this).toggleClass("divcelloff").toggleClass("divcellon");

	});


});

</script>

<style>

table{
	border:1px solid #888;
	margin:30px;
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


	print("<table>");

	print("<tr>");
	for($i=0;$i<8;$i++){

	print("<td>");
	include("singlerule.php");
	print("</td>");
	}
	print("</tr>");
	print("</table>");
?>


