<?php

$con=mysqli_connect("db:3306","wordpress","wordpress","wordpress");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$clusters=  mysqli_query($con,"SELECT DISTINCT `cluster-id` FROM `rules`");


echo "<form action='' method='post' class='mb-3'>";

$string1 =  "<table class=\"GeneratedTable\">".
" <thead>".
"   <tr>".
"     <th>Cluster-ID</th>".
"     <th>Logic Rules*</th>".
"     <th>Description</th>".
"   </tr>".
" </thead>".
" <tbody>";

echo $string1; 

$i=0;



while($row=$clusters->fetch_assoc())
 { 
    $clusterID= "clusterID".$i;
    $listname= "listName".$i;
    $textName="textName".$i;
    
    $id=$row["cluster-id"];
    array_push($clusterName, $id);

    $rules= mysqli_query($con,"SELECT `rule-text` FROM `rules` WHERE `cluster-id`='$id'");
    
    echo "<tr>";
    echo "<td>";
    echo "<input type=\"text\"  name='{$clusterID}' value=".$id." readonly>" ;
    echo "</td>";

    echo "  <td align=\"center\">";
    
    echo "   <select name='{$listname}' >     ";

        while ($rule=$rules->fetch_assoc()) {

            foreach ($rule as $value) {
            echo "<option>".$value."</option>";
              }
        }
    echo "      </select>";
    echo "   </td>";
    echo "     <td><input name='{$textName}' type=\"text\" size=\"30\"></td>";
    echo "   </tr>";


$i++;
}

echo "</tbody>";
echo "</table>";
echo "<br> <br>";
echo "<div>";
echo "<input class='button' type='submit' name='submit' value='Submit'>";
echo "</div>";

echo "</form>";

if(isset($_POST['submit'])){

$j=0;

    while($j<$i)
    {
    $clusterValue= $_POST["clusterID".$j];

    $listname=  $_POST["listName".$j];
    $textName= $_POST["textName".$j];
            
    mysqli_query($con, "INSERT INTO `cluster-labels` VALUES ('$clusterValue', '$listname', '$textName')");
    $j++;  
    }
  
    mysqli_close($con);

    header( 'Location: http://localhost:8000/?page_id=418');
}
  

?>