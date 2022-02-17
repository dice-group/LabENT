<?php
/*
Template Name: Serve
*/

add_action( 'template_redirect', 'OutputCSV', 10); 
OutputCSV();
function OutputCSV()
{
	header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=labeled_entities.csv');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	
	ob_end_clean();
	$output = fopen('php://output', 'w');
	
	$con=mysqli_connect("db:3306","wordpress","wordpress","wordpress");
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	fputcsv($output, array('ClusterID',  'Types'));
	// Select All from mysql table
	$query = "SELECT `entityID`, `eType` FROM `entitylabels`";
	$result = mysqli_query($con,$query);
	
	while($row=$result->fetch_row())
	{ 
		fputcsv($output, $row);
	}
	
	fclose($output);	
	die();
}
?>