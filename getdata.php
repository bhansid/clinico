<?php
include "connection.php";
$sym = $_REQUEST['s'];
$string = $sym;
$array11 = explode(',', $string);
$leng = count($array11);

	$stack = array();

for($i=0;$i<$leng;$i++)
{
//	echo $array[$i];



	$select = "select symptomid from symptoms where symptom='$array11[$i]'";
	$res = mysqli_query($conn, $select);


	while ($res1=mysqli_fetch_array($res)){


		$select1 = "select diseaseid from symptoms where symptomid='$res1[0]'";

		$res1 = mysqli_query($conn,$select1);

		while($res2=mysqli_fetch_array($res1)){

			$select2 = "select diseasename from diseases where diseaseid='$res2[0]'";

			$res3 = mysqli_query($conn,$select2);
			while($res4 = mysqli_fetch_array($res3)){

			array_push($stack,"$res4[0]");

			}

		}

}


}
$stack1 = array_unique($stack);
$stack1 = array_values($stack1);
sort($stack1);
//print_r($stack1);

//	$res1=mysqli_fetch_array($res);
//	$res2=array_unique($res1);
//
//	while($res3 = $res2)
//	{
//		$select1 = "select diseaseid from symptoms where symptomid='$res3'";
//		$res5=mysqli_query($conn,$select1);
//		while($res6=mysqli_fetch_array($res5)){
//			echo $res6[0];
//		}
//	}


?>
<br>
<h2 class="text-center">List of Possible Diseases</h2><br>
    <table class="table table-bordered"  >
		<thead>
		<tr>
			<th class="text-center">Sr. No.</th>
			<th class="text-center">Disease Name</th>
			<th class="text-center">Symptoms</th>
		</tr>
		</thead>

		<?php
        $count = 0;
        $less=count($stack1);
		$stackss = array();
        for($j=0;$j<$less;$j++)
		{
			?>
			<tr>
				<?php
			$c = "select DISTINCT diseaseid from diseases where diseasename='$stack1[$j]'";
			//echo $c;
			$c_res = mysqli_query($conn, $c);
			while($ccc = mysqli_fetch_array($c_res))
			{
?>


			<td><?php echo ++$count ?></td>
		<td><?php echo $stack1[ $j ] ?></td>
				<?php
				$ss = "select DISTINCT symptom from symptoms where diseaseid=$ccc[0]";
//				echo $ss;
				$cc = mysqli_query($conn, $ss);
				while($cc1 = mysqli_fetch_array($cc))
				{

					$cc2 = $cc2 . ' | ' .$cc1[0];


				}
				$cc2 = $cc2 . ' | ';?>
					<td><?php echo $cc2?>	<?php $cc2 = ''?>	</td>
<?php
				}?>
		</tr>
		<?php
		}
//		$stack1ss = array_unique($stackss);
//		$stack1ss = array_values($stack1ss);
//		sort($stack1ss);
//		print_r($stackss);
		?>
	</table>
<div class="form-group">
	<input id="consult" value="Consult Doctor" class="btn btn-success center-block" onclick="appoint()">
</div>
