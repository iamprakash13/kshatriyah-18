<?php
//session 
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    echo '403 Forbidden access denied';
    exit;
}



//connection
$db_host = 'localhost'; 
$db_user = 'id6636891_guruprasath'; 
$db_pass = '1234king'; 
$db_name = 'id6636891_aameccse';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 	FROM register';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
    
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="home.ico"/>
	 <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
   
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<title>Data Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}

	</style>
</head>
<body>
    
	<h1>Paper Presentation</h1>
	<div id="div3">
	<table class="data-table">
		<caption class="title">Kshatriyah 18 participants list</caption> 
		<thead>
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>College</th>
				<th>Dept</th>
				<th>Event 1</th>
				<th>Event 2</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
	if($row['event1']=="PaperPresentation"||$row['event2']=="PaperPresentation"){
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['collage'] . '</td>
					<td>'.$row['dept'] . '</td>
					<td>'.$row['event1'] . '</td>
					<td>'.$row['event2'] . '</td>
					<td>'.$row['email'] . '</td>
					<td>'.$row['phone'] . '</td>
			
				</tr>';
			
			$no++;
		}
		
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL</th>
				<th><?=number_format($no-1)?></th>
			</tr>
		</tfoot>
	</table>
	</div>
	
        
	<SCRIPT LANGUAGE="JavaScript">
//var message="Sorry,Right click disabled. Message from Techgeekshan";
///////////////////////////////////
function clickIE() {if (document.all) {alert(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
window.history.forward(-1);
</script>
</body>
</html>