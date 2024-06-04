<?php
$_SERVER["DOCUMENT_ROOT"] = "/home/p/pavelsch/uocns.ru/public_html";
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?
////////////
unset($arData);
$arData = [];
//////////////////////////
$file_name = $_REQUEST["file_name"];
if (empty($file_name)){
	$file_name = '';
}
$arData = [
    'file_name' => $file_name,
    'error' => '',
    'choice_topology' => ''
];
/*
for ($i = 1; $i < 10; $i++){
    if ($i <> 9){
		$arData['param_'.$i] = '';
		$arData['sim_param_'.$i] = '';
	} else {
		$arData['param_'.$i] = '';
	}
}
$arData['links'] = [];
*/
////////////
if ($file_name <> ''){
	$dir = $_SERVER["DOCUMENT_ROOT"].'/files_xml';
	$id_dir = @opendir($dir);
	if($id_dir) {
		while($e_dir = readdir($id_dir)){
			if(is_file($dir."/".$e_dir)) {
				$info_file = new SplFileInfo($dir."/".$e_dir);
				if ($e_dir == $file_name.'.xml'){
					// загрузка XML файла
/*					$xml = simplexml_load_file($dir."/".$e_dir);
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
								$count_column = 4;
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
								$count_column = 4;
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
								$count_column = 4;
							}
							if ($arData['choice_topology'] == 'ArbitraryTopology'){
								$ar_tmp_param1 = explode(')',$ar_tmp_choice_topology[1]);
								$arData['param_3'] = trim($ar_tmp_param1[0]);
								$count_column = 0;
								$tmp_links = explode('_',trim($xml->Links));
								foreach($tmp_links as $key => $ar_item_link){
									if ($key <> count($tmp_links)-1){
										if (trim($ar_item_link) <> ''){
											$tmp_links_2 = explode(' ',trim($ar_item_link));
											$current_count = 0;
											foreach($tmp_links_2 as $item_link){
												$arData['links'][$key][] = trim($item_link);
												$current_count++;
											}
											if ($current_count > $count_column){
												$count_column = $current_count;
											}
										} else {
											$arData['links'][$key] = Array();
										}
									}
								}																
							}
						}
						$arData['count_column'] = $count_column;
						////////////////////////////////
						$tmp_netlist = explode(' ',trim($xml->Network->Netlist));
						$ii = 0;
						$jj = 0;						
						foreach($tmp_netlist as $value_netlist){
							if ($ii == $count_column){
								$ii = 0;
								$jj++;
							}
							$arData['Netlist'][$jj][$ii] = trim($value_netlist);
							$ii++;
						}
						////////////////////////////////
						$tmp_routing = explode(' ',trim($xml->Network->Routing));
						$ii = 0;
						$jj = 0;						
						if ($arData['choice_topology'] == 'Mesh' OR $arData['choice_topology'] == 'Torus'){
							$count_nodes = (int)$arData['param_1']*(int)$arData['param_2'];
						}
						if ($arData['choice_topology'] == 'Circulant' OR $arData['choice_topology'] == 'CirculantOpt' OR $arData['choice_topology'] == 'ArbitraryTopology'){
							$count_nodes = (int)$arData['param_3'];
						}
						foreach($tmp_routing as $value_routing){
							if ($ii == $count_nodes){
								$ii = 0;
								$jj++;
							}
							$arData['Routing'][$jj][$ii] = trim($value_routing);
							$ii++;
						}
						$arData['count_nodes'] = $count_nodes;
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
					}   */
					$data = html_entity_decode(htmlspecialchars(file_get_contents($dir."/".$e_dir), ENT_QUOTES));  
					$ch  = curl_init();
					$arrSetHeaders = array(
						'Content-Type: application/xml',
					);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $arrSetHeaders);
					curl_setopt($ch, CURLOPT_URL, 'http://5.35.94.247:8080/simulator/custom');
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                     
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
					curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; I; Windows NT 5.1; ru; rv:1.9.2.13) Gecko/20100101 Firefox/4.0');
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
					$answer = curl_exec($ch);
					// Проверяем наличие ошибок
					if (!curl_errno($ch)) {
						$info = curl_getinfo($ch);
						$duration = $info['total_time'];
					}
					curl_close($ch); 
					$result = json_decode($answer, true);
//					$arData['xml'] = $xml;
					$arData['data'] = $data;
					/////////////////////////////
//					$tmp_result_parts = explode('Усредненные результаты моделирования',$result['content']);
//					$result['content'] = "Конфигурация сети на кристалле\n\nОписание сети:   ".$tmp_choice_topology."\nКоличество IP-ядер:   ".$count_nodes."\n\nРазмер флита, бит:   ".$arData['sim_param_1']."\nСредняя длина пакета, флитов:   ".$arData['sim_param_2']."\nФиксированный размер пакета, флитов:   ".$arData['sim_param_3']."\nСредний период генерации пакетов, тактов:   ".$arData['sim_param_4']."\n\nКоличество виртуальных каналов:   ".$arData['param_8']."\nРазмер буфера виртуального канала, флитов:   ".$arData['param_9']."\n\nВремя моделирования, принятых пакетов:   ".$arData['sim_param_5']."\nВремя насыщения модели сети, принятых пакетов:   ".$arData['sim_param_6']."\nКоличество прогонов симулятора:   ".$arData['sim_param_7']."\n\n\nУсредненные результаты моделирования".$tmp_result_parts[1];	
					/////////////////////////////
					$arData['result'] = $result['content'];
					file_put_contents($_SERVER["DOCUMENT_ROOT"]."/result_txt/".$file_name.'.txt', $result['content']); // Сохраняем полученный результат в файл
					$arData['save_result_file_path'] = "https://uocns.ru/result_txt/".$file_name.".txt?file=yes";
				}
			}
		}
	}
} else {
	$arData['error'] = 'Файл не загружен';
}
$res = json_encode($arData);
echo $res;
