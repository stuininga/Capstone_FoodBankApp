<?php		
	$keyword = strval($_POST['address']);
	$search_param = "{$keyword}%";
	$conn = new mysqli("localhost", "stuininga1","BV34Bluebell","stuininga1_dmit2025");
	

	$sql = $conn->prepare("SELECT address FROM lfb_clients WHERE address LIKE ?");
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

