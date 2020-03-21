<?php

$curlSession = curl_init();
$url = 'https://my-json-server.typicode.com/sky-uk/monitoring-tech-test/data';
curl_setopt($curlSession, CURLOPT_URL, $url);
curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

$jsonData = json_decode(curl_exec($curlSession), true);
curl_close($curlSession);
?>

<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<h2>hardeep-monitoring-sky-test/data</h2>
  <table id="example" class="table table-striped table-bordered" style="width:100%"> 
    
		<?php
		//Loop call only one time for getting Header Column
		$i = 0;
		$column_name = '';
		foreach($jsonData as $key => $value) {
			if($i == 0) {
				$column_name = array_keys($value);
			}
			$i++;
		}
		echo '<thead><tr>';
		if(is_array($column_name) && count($column_name) > 0) {
			foreach($column_name as $key => $value) {
				echo "<th>$value</th>";
			}
		}
		echo '</tr></thead>';
		?>
		<tbody>
		<?php
		//getting Data for each Column
		
		foreach($jsonData as $key => $values) {
			echo '<tr>';
			foreach($values as $v) {
				echo "<td>$v</td>";
			}
			echo '</tr>';
		}
		?>
    </tbody>
  </table>
  <script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
  </script>
</body>
</html>

