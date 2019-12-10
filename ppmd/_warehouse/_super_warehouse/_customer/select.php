<?php
include_once('../../DBcontroller.php');
if(isset($_POST["employee_id"]))
{
	$output='';
	$query=$db->query("SELECT * FROM tbl_employee WHERE id ='".$_POST['employee_id']."'");
	$query->execute();
	/*$output.='	
	<div class="table-reponsive">
		<table class="table table-bordered">';

		foreach ($query as $result) {
			$output .= '
				<tr>
					<td><label>Name</label></td>
					<td>'.$result["name"].'</td>
				</tr>
				<tr>
					<td><label>Address</label></td>
					<td>'.$result["address"].'</td>
				</tr>
				<tr>
					<td><label>Gender</label></td>
					<td>'.$result["gender"].'</td>
				</tr>
				<tr>
					<td><label>Designation</label></td>
					<td>'.$result["designation"].'</td>
				</tr>
				<tr>
					<td><label>Age</label></td>
					<td>'.$result["age"].'</td>
				</tr>
			';
		}
		$output .= "</table></div>";
		echo $output;*/
}

?>
<div class="table-reponsive">
	<table class="table table-bordered">
		<?php
		foreach ($query as $emp) {?>
		<tr>
			<td><label>Name</label></td>
			<td><?=$emp['name']?></td>
		</tr>

		<tr>
			<td><label>Address</label></td>
			<td><?=$emp['address']?></td>
		</tr>

		<tr>
			<td><label>Gender</label></td>
			<td><?=$emp['gender']?></td>
		</tr>

		<tr>
			<td><label>Designation</label></td>
			<td><?=$emp['designation']?></td>
		</tr>

		<tr>
			<td><label>Age</label></td>
			<td><?=$emp['age']?></td>
		</tr>
		<?php
		}
		?>
	</table>
</div>