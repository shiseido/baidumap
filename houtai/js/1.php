<?php
include_once("auth.php");
include_once("inc/ms_conn.php");
include_once("inc/comm_function.php");
$PersonCode=$_POST["PersonCode"]; //ǰ�˴����Ĳ���
$KQYM=$_POST["KQYM"];
$sqlstr="Exec dbo.HR_Prg_GetPersonYMKQ2 '$KQYM','$PersonCode'";
$rs =mssqlquery($sqlstr); //�Զ����mssql����������mssql_query����
$row = mssql_num_rows($rs); //ȡ��������
$result["total"] = $row;
$items =array();
while ($row = mssql_fetch_array($rs)){
foreach($row as $key=>$value){
//�������Ҫ,php��json_encodeֻ֧��utf-8,���򺬺����ֶ�ֵ�ᱻ��Ϊnull
 $row[$key]=iconv('gb2312','UTF-8',$row[$key]); }
 array_push($items, $row); }
 $result["rows"] =$items;
 echo json_encode($result);
?> 