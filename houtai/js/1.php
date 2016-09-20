<?php
include_once("auth.php");
include_once("inc/ms_conn.php");
include_once("inc/comm_function.php");
$PersonCode=$_POST["PersonCode"]; //前端传来的参数
$KQYM=$_POST["KQYM"];
$sqlstr="Exec dbo.HR_Prg_GetPersonYMKQ2 '$KQYM','$PersonCode'";
$rs =mssqlquery($sqlstr); //自定义的mssql方法，类拟mssql_query方法
$row = mssql_num_rows($rs); //取行总行数
$result["total"] = $row;
$items =array();
while ($row = mssql_fetch_array($rs)){
foreach($row as $key=>$value){
//这里很重要,php的json_encode只支持utf-8,否则含汉字字段值会被置为null
 $row[$key]=iconv('gb2312','UTF-8',$row[$key]); }
 array_push($items, $row); }
 $result["rows"] =$items;
 echo json_encode($result);
?> 