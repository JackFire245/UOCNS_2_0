<?
$_SERVER["DOCUMENT_ROOT"] = "/home/p/pavelsch/uocns.ru/public_html"; 
?>
<?
ob_start();
session_start();
unset($arData['uploading_file']);
$arData['uploading_file'] = $_FILES;
function RandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 6; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
$randomString = RandomString();
$arData['randomString'] = '';
$arData['error'] = '';
$arData['choice_topology'] = '';
$arData['param_1'] = '';
$arData['param_2'] = '';
$arData['param_3'] = '';
$arData['param_4'] = '';
$arData['param_5'] = '';
$arData['param_6'] = '';
$arData['param_7'] = '';
$arData['param_8'] = '';
$arData['param_9'] = '';
$arData['sim_param_1'] = '';
$arData['sim_param_2'] = '';
$arData['sim_param_3'] = '';
$arData['sim_param_4'] = '';
$arData['sim_param_5'] = '';
$arData['sim_param_6'] = '';
$arData['sim_param_7'] = '';
$arData['sim_param_8'] = '';
$arData['coords_x'] = Array();
$arData['coords_y'] = Array();
$arData['links'] = Array();
if (is_uploaded_file($_FILES[0]["tmp_name"])){
	// Если файл загружен успешно, перемещаем его
	// из временной директории в конечную 
	$ar_tmp_name = explode('.',$_FILES[0]["name"]);
	if ($ar_tmp_name[1] == 'xml'){
		move_uploaded_file($_FILES[0]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/files_xml/".$randomString.'.xml');
		$arData['randomString'] = $randomString;
		$dir = $_SERVER["DOCUMENT_ROOT"].'/files_xml';
		$id_dir = @opendir($dir);
		if($id_dir) {
			while($e_dir = readdir($id_dir)){
				if(is_file($dir."/".$e_dir)) {
					$info_file = new SplFileInfo($dir."/".$e_dir);
					if ($e_dir == $randomString.'.xml'){
						// загрузка XML файла
						$xml = simplexml_load_file($dir."/".$e_dir);
						// начало разбора файла 
						if ($xml->getName() <> "TaskOCNS"){
							$arData['error'] = 'Структура файла некорректна';;
						} else {
							////////////////////////////////
							$tmp_choice_topology = '';
							foreach($xml->attributes() as $name_attr => $value_attr) {
								if ($name_attr == "Description"){
									$tmp_choice_topology = $value_attr;
								}
							}
							if ($tmp_choice_topology <> ''){
								$ar_tmp_choice_topology = explode('-(',$tmp_choice_topology);
								$arData['choice_topology'] = trim($ar_tmp_choice_topology[0]);
								if ($arData['choice_topology'] == 'Mesh' OR $arData['choice_topology'] == 'Torus'){
									$ar_tmp_param1 = explode(',',$ar_tmp_choice_topology[1]);
									$arData['param_1'] = trim($ar_tmp_param1[0]);
									$ar_tmp_param2 = explode(')',$ar_tmp_param1[1]);
									$arData['param_2'] = trim($ar_tmp_param2[0]);
								}
								if ($arData['choice_topology'] == 'Circulant'){
									$ar_tmp_param1 = explode(',',$ar_tmp_choice_topology[1]);
									$arData['param_3'] = trim($ar_tmp_param1[0]);
									$arData['param_4'] = trim($ar_tmp_param1[1]);
									$arData['param_5'] = trim($ar_tmp_param1[2]);
									if (count($ar_tmp_param1) == 4){
										$ar_tmp_param2 = explode(')',$ar_tmp_param1[3]);
										$arData['param_6'] = trim($ar_tmp_param2[0]);
									} else {
										$arData['param_6'] = trim($ar_tmp_param1[3]);
										$ar_tmp_param2 = explode(')',$ar_tmp_param1[4]);
										$arData['param_7'] = trim($ar_tmp_param2[0]);
									}								
								}
								if ($arData['choice_topology'] == 'CirculantOpt'){
									$ar_tmp_param1 = explode(',',$ar_tmp_choice_topology[1]);
									$arData['param_3'] = trim($ar_tmp_param1[0]);
									if (count($ar_tmp_param1) == 2){
										$ar_tmp_param2 = explode(')',$ar_tmp_param1[1]);
										$arData['param_6'] = trim($ar_tmp_param2[0]);
									} else {
										$arData['param_6'] = trim($ar_tmp_param1[1]);
										$ar_tmp_param2 = explode(')',$ar_tmp_param1[2]);
										$arData['param_7'] = trim($ar_tmp_param2[0]);
									}
								}
								if ($arData['choice_topology'] == 'ArbitraryTopology'){
									$ar_tmp_param1 = explode(')',$ar_tmp_choice_topology[1]);
									$arData['param_3'] = trim($ar_tmp_param1[0]);
								}
							}		
							////////////////////////////////
							foreach($xml->Network->Link->Parameter as $row_params) {
								foreach($row_params->attributes() as $name_attr => $value_attr) {
									if ($name_attr == "FifoCount"){
										$arData['param_8'] = trim($value_attr);
									}
									if ($name_attr == "FifoSize"){
										$arData['param_9'] = trim($value_attr);
									}
								}
							}
							////////////////////////////////			
							foreach($xml->Traffic->Parameter as $row_params) {
								foreach($row_params->attributes() as $name_attr => $value_attr) {
									if ($name_attr == "FlitSize"){
										$arData['sim_param_1'] = trim($value_attr);
									}
									if ($name_attr == "PacketSizeAvg"){
										$arData['sim_param_2'] = trim($value_attr);
									}
									if ($name_attr == "PacketSizeIsFixed"){
										$arData['sim_param_3'] = trim($value_attr);
									}
									if ($name_attr == "PacketPeriodAvg"){
										$arData['sim_param_4'] = trim($value_attr);
									}
								}
							}
							////////////////////////////////
							foreach($xml->Simulation->Parameter as $row_params) {
								foreach($row_params->attributes() as $name_attr => $value_attr) {
									if ($name_attr == "CountPacketRx"){
										$arData['sim_param_5'] = trim($value_attr);
									}
									if ($name_attr == "CountPacketRxWarmUp"){
										$arData['sim_param_6'] = trim($value_attr);
									}
									if ($name_attr == "CountRun"){
										$arData['sim_param_7'] = trim($value_attr);
									}
									if ($name_attr == "IsModeGALS"){
										$arData['sim_param_8'] = trim($value_attr);
									}
								}
							}
							////////////////////////////////
							if ($arData['choice_topology'] == 'ArbitraryTopology'){
								$tmp_coords_x = explode(' ',trim($xml->Coords_X));
								foreach($tmp_coords_x as $item_coord){
									$arData['coords_x'][] = trim($item_coord);
								}							
								$tmp_coords_y = explode(' ',trim($xml->Coords_Y));
								foreach($tmp_coords_y as $item_coord){
									$arData['coords_y'][] = trim($item_coord);
								}
								$tmp_links = explode('_',trim($xml->Links));
								foreach($tmp_links as $key => $ar_item_link){
									if ($key <> count($tmp_links)-1){
										if (trim($ar_item_link) <> ''){
											$tmp_links_2 = explode(' ',trim($ar_item_link));
											foreach($tmp_links_2 as $item_link){
												$arData['links'][$key][] = trim($item_link);
											}
										} else {
											$arData['links'][$key] = Array();
										}
									}
								}								
							}
							////////////////////////////////
						} 
						$arData['xml'] = $xml;
					}
				}
			}
		}
	} 
} else {
	$arData['error'] = 'Файл не загружен';
}
$res = json_encode($arData);
echo $res;
?>						