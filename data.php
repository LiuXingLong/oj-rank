<?php
ignore_user_abort();
set_time_limit(0);
if(empty($_POST)){
	header('Location: ./admin/index.php');
	exit;
}
$value = array();
foreach($_POST as $k => $v){
	if($k=="name"){
		$value['name'] = trim($v);
	}else if($k=="id"){
		$value['id'] = trim($v);
	}else if($v!=""){
		$value[$k] = explode(",",$v);
		$count = count($value[$k]);
		for($i=0;$i<$count;$i++){
			$value[$k][$i] = trim($value[$k][$i]);
		}
	}	
}
$json_string = file_get_contents('acm.json');
$data = json_decode($json_string, true);
$count = count($data);
for($i=0;$i<=$count;$i++){
	if($i==$count){
		$data[$i] = $value;
	}else if($value['id'] == $data[$i]['id']){
		$data[$i] = $value;
		break;
	}
}
$json_string = json_encode($data);
file_put_contents('acm.json', $json_string);
$data = null;
$data[0] = $value;
$json_string = json_encode($data);
file_put_contents('acm1.json', $json_string);

exec("python ./run1.py");

$json_string = file_get_contents('out.json');
$data = json_decode($json_string, true);

$json_string = file_get_contents('out1.json');
$data1 = json_decode($json_string, true);

$count = count($data['data']);
for($i=0;$i<=$count;$i++){	
	if($i==$count){
		$data['data'][$i] = $data1['data'][0];
	}else if($data['data'][$i]['id']==$data1['data'][0]['id']){
		$data['data'][$i] = $data1['data'][0];
		break;
	}
}

$json_string = json_encode($data);
file_put_contents('out.json', $json_string);
echo "success";
