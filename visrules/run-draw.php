
<table>

<tr>


<?php

	for($z=500;$z<515;$z++){

		$dlv=$dline[$z];


		$cl="";

		if($dlv==0) $cl="divcelloff"; 
		if($dlv==1) $cl="divcellon"; 



?>



<td class='tdcell'>
	<div class='divcell <?=$cl?>'>
		<img src='frame.png'/>
	</div>
</td>


<?php
	}

?>

</tr>

</table>
