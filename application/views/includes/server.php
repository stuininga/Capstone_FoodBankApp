<?php		
	$keyword = strval($_POST['address']);
	$search_param = "{$keyword}%";
	$conn = new mysqli("localhost", "leduc-foodbank-a","x2imqnDnRvaObnD","leduc_foodbank_a_admin");
	

	$sql = $conn->prepare("SELECT address FROM lfb_household WHERE address LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$addressResult[] = $row["address"];
		}
		echo json_encode($addressResult);
	}
	$conn->close();
?>

