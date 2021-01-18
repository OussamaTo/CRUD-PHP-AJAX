<?php
include 'database.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$Nom=$_POST['Nom'];
		$Prénom=$_POST['Prénom'];
		$Email=$_POST['Email'];
		$Adresse=$_POST['Adresse'];
		$Tel=$_POST['Tel'];
		$sql = "INSERT INTO `utilisateur`( `Nom`, `Prénom`,`Email`,`Adresse`,`Tel`) 
		VALUES ('$Nom','$Prénom','$Email','$Adresse','$Tel')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$Nom=$_POST['Nom'];
		$Prénom=$_POST['Prénom'];
		$Email=$_POST['Email'];
		$Adresse=$_POST['Adresse'];
		$Tel=$_POST['Tel'];
		$sql = "UPDATE `utilisateur` SET `Nom`='$Nom',`Prénom`='$Prénom',`Email`='$Email',`Adresse`='$Adresse',`Tel`='$Tel' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `utilisateur` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM utilisateur WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
?>