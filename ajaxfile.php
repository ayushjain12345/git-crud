<?php
include "session.php";

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; 
$columnIndex = $_POST['order'][0]['column']; 
$columnName = $_POST['columns'][$columnIndex]['data'];
$columnSortOrder = $_POST['order'][0]['dir'];
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); 

$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (name like '%".$searchValue."%' or 
        address like '%".$searchValue."%' or 
        subject like'%".$searchValue."%'or
        mobile like'%".$searchValue."%' or
        password like '%".$searchvalue."%') ";
}

$sel = mysqli_query($conn,"select count(*) as allcount from student");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

$sel = mysqli_query($conn,"select count(*) as allcount from student WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

$empQuery = "select * from student WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();
while ($row = mysqli_fetch_assoc($empRecords)) {
      $data[] = array( 
      "id"=>$row['id'],
      "name"=>$row['name'],
      "address"=>$row['address'],
      "subject"=>$row['subject'],
      "mobile"=>$row['mobile'],
      "password"=>$row['password']
   );
}
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);
echo json_encode($response);
?>

