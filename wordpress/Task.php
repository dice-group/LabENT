<?php
$con=mysqli_connect("db:3306","wordpress","wordpress","wordpress");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT  triples, generatedText FROM entities ");

echo "<form action='' method='post' class='mb-3'>";
echo"<div class='u-expanded-width u-table u-table-responsive u-table-1' >
<table class='u-table-entity u-table-entity-1'><colgroup> <col width='45.8%' /> <col width='51.3%' /> <col width='12.9%' /> </colgroup>
<thead class='u-palette-4-dark-2 u-table-header u-table-header-1'>
<tr style='height: 29px;'>
<th class='u-align-center u-border-1 u-border-black u-table-cell'>Triples</th> 
<th class='u-align-center u-border-1 u-border-black u-table-cell'>Generated-Text</th>
<th class='u-align-center u-border-1 u-border-black u-table-cell'>Types</th>
</tr>
</thead>
<tbody class='u-align-center u-custom-font u-heading-font u-table-body u-table-body-1'>" ;

$i = 0;
while($row = $result->fetch_assoc())
{

    echo "<tr style='height: 29px;'>";

    foreach ($row as $value) {
      echo "<td class='u-border-1 u-border-palette-1-dark-2 u-table-cell'>" . $value . "</td>";
    }
$i++;
echo "<td class='u-border-1 u-border-palette-1-dark-2 u-table-cell'>";
$listname= "entTypes".$i;
echo "<input list='{$listname}'  name='{$listname}' size='10'><datalist id='{$listname}'><option value='Person'><option value='Place'><option value='Film'><option value='Book'><option value='Technology'><option value='Event'></datalist>";
echo "</td></tr>";
}
echo "</tbody></table></div>";
echo "<br> <br>";
echo "<div>";
echo "<input class='u-border-none u-btn u-btn-round u-button-style u-palette-4-dark-2 u-radius-6 u-btn-1'  type='submit' name='submit' value='Finish' style='position: relative; left: 30%;'>";
echo "</div>";

 echo "</form>";

if(isset($_POST['submit'])){
if(!empty($_POST['entTypes1'])) {
$selected1 = $_POST['entTypes1'];
               mysqli_query($con, "UPDATE entities SET type ='$selected1' WHERE id=1");
}

if(!empty($_POST['entTypes2'])) {
$selected2 = $_POST['entTypes2'];
mysqli_query($con, "UPDATE entities SET type ='$selected2' WHERE id=2");
}

if(!empty($_POST['entTypes3'])) {
$selected3 = $_POST['entTypes3'];
mysqli_query($con,"UPDATE entities SET type ='$selected3' WHERE id=3");

}

header( 'Location: http://localhost/labent/thanks/') ;
}  
mysqli_close($con);
?>