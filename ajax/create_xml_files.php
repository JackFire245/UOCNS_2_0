<?
$_SERVER["DOCUMENT_ROOT"] = "/home/p/pavelsch/uocns.ru/public_html"; 
?>
<?
function RandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 6; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
function Step_cicles ($start_node, $end_node, $N, $s1, $s2, $K){
	$best_way_R = 0;
	$step_R = 0;
	$best_way_L = 0;
	$step_L = 0;
    $s = $end_node - $start_node;
	/////////
    $R1 = $s / $s2 + $s % $s2;
    $R2 = $s / $s2 - $s % $s2 + $s2 + 1;
    if ($s % $s2 == 0){
        $best_way_R = $R1;
        $step_R = $s2;
    } else {
        if ($R1 < $R2){
            $best_way_R = $R1;
            $step_R = $s1;
        } else {
            $best_way_R = $R2;
            $step_R = $s2;
        }
    }
    for ($i = 1; $i < $K+1; $i++){
        $Ri1 = ($s + $N*$i) / $s2 + ($s + $N*$i) % $s2;
        $Ri2 = ($s + $N*$i) / $s2 - ($s + $N*$i) % $s2 + $s2 + 1;
        if ($Ri1 < $best_way_R){
            $best_way_R = $Ri1;
            $step_R = $s2;
        }
        if ($Ri2 < $best_way_R){
            $best_way_R = $Ri2;
            $step_R = $s2;
        }
    }
    $s = $start_node - $end_node + $N;
    $L1 = $s / $s2 + $s % $s2;
    $L2 = $s / $s2 - $s % $s2 + $s2 + 1;
    if ($s % $s2 == 0){
        $best_way_L = $L1;
        $step_L = -$s2;
    } else {
        if ($L1 < $L2){
            $best_way_L = $L1;
            $step_L = -$s1;
        } else {
            $best_way_L = $L2;
            $step_L = -$s2;
        }
    }
    for ($i = 1; $i < $K+1; $i++){
        $Ri1 = ($s + $N * $i)/ $s2 + ($s + $N * $i) % $s2;
        $Ri2 = ($s + $N * $i) / $s2 - ($s + $N * $i) % $s2 + $s2 + 1;
        if ($Ri1 < $best_way_L){
            $best_way_L = $Ri1;
            $step_L = -$s2;
        }
        if ($Ri2 < $best_way_L){
            $best_way_L = $Ri2;
            $step_L = -$s2;
        }
    }
	if ($best_way_R < $best_way_L){
        return $step_R;
    } else {
        return $step_L;
    }       
}
function findRouteROU($start_node, $end_node, $N, $s1, $s2, $K){
    if ($start_node == $end_node){
		return $start_node;
	} else {
		if ($start_node > $end_node){
			$start_node = $start_node - Step_cicles($start_node, $end_node, $N, $s1, $s2, $K);
		} else {
			$start_node = $start_node + Step_cicles($start_node, $end_node, $N, $s1, $s2, $K);
		}
		if ($start_node > $N){
			$start_node = $start_node - $N;
		} else {
			if ($start_node < 0) {
				$start_node = $start_node + $N;
			}
		}
		return $start_node;
	}
}
function findRoutePO($start_node, $end_node, $N, $s1, $s2){
    $S = $end_node - $start_node;
	if ($S == 0){ 
	   	return $start_node;
	}
    if ($S < 0){ 
	   	$S = $S + $N;
	}
	if ($S <= ($N / 2)){
        if ($S >= $s2){
            $start_node = ($s2 + $start_node) % $N;
        } else {
            $start_node = ($s1 + $start_node) % $N;
		}
	} else {
        $S = $N - $S;
        if ($S >= $s2){
            $start_node = ($N - $s2 + $start_node) % $N;
        } else {
            $start_node = ($N - $s1 + $start_node) % $N;
        }
	}
	return $start_node;
}
function findPort ($netlist, $sourse, $target, $count_ports) {
    $port = $count_ports;
    for ($j = 0; $j < $count_ports; $j++) {
        if ($netlist[$sourse][$j] == $target) {
            $port = $j;
        }
    }
    return $port;
}
function pathForNode ($k, $parents) {
	//////////////////////
	$nVertices = $k;
	unset($pathForNode);
	$pathForNode = array();
	//////////////////////
	for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
		for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
			unset($path);
			$path = array();
			if ($vertexIndex != $vertexIndexSrc){
				$item_path = $vertexIndex; 
				do {
					$path[] = $item_path;
					$item_path = $parents[$vertexIndexSrc][$item_path];
				} while ($item_path != -1);				
			}
			$pathForNode[$vertexIndexSrc][] = array_reverse($path);
		}
	}
	return $pathForNode;	
}
function fullRouting ($k, $p, $netlist, $algoritm, $s1, $s2, $count_iteration){
	//////////////////////
	$nVertices = $k;
	unset($routing);
	$routing = Array();
	//////////////////////////  
	// ШАГ 1. Начальное заполнение $routing значением равным количеству портов 
	for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
		for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
			$routing[$vertexIndexSrc][$vertexIndex] = $p;				
		}			
	} 
	//////////////////////////
	// ШАГ 2. Матрица смежности
	unset($adjacencyMatrix);
	$adjacencyMatrix = Array(); 
	for ($i = 0; $i < $k; $i++) {
		for ($j = 0; $j < $k; $j++) {
			$adjacencyMatrix[$i][$j] = 0;
		}
	}
	for ($i = 0; $i < $k; $i++) {
		for ($j = 0; $j < $p; $j++) {
			if ($netlist[$i][$j] <> -1){
				$adjacencyMatrix[$i][$netlist[$i][$j]] = 1;
				$adjacencyMatrix[$netlist[$i][$j]][$i] = 1;
			}
		}
	}
	$arData['adjacencyMatrix'] = $adjacencyMatrix;
	//////////////////////////
	// ШАГ 3. Родительский массив для хранения узлов родителей при движении от конкретного узла к любому другому
	unset($parents);
	$parents = Array();	
	// shortestDistances[src][i] будет хранить кратчайшее расстояние от src до i
	unset($shortestDistances);
	$shortestDistances = Array();        
	// added[src][i] будет равен true, если вершина i включена в дерево кратчайших путей или задано кратчайшее расстояние от src до i
	unset($added);
	$added = Array();
	// Инициализируем все расстояния как БЕСКОНЕЧНЫЕ и added[] как false
	for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
		for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
			$shortestDistances[$vertexIndexSrc][$vertexIndex] = PHP_INT_MAX;
			$parents[$vertexIndexSrc][$vertexIndex] = -1;
			$added[$vertexIndexSrc][$vertexIndex] = false;
		}
	}
	//////////////////////
	for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
		$startVertex = $vertexIndexSrc;     // стартовая вершина для каждого узла
		// Расстояние исходной вершины от самой себя всегда равно 0
		$shortestDistances[$vertexIndexSrc][$startVertex] = 0;
		// Начальная вершина не имеет родительского элемента
		$parents[$vertexIndexSrc][$startVertex] = -1;
		//////////////////////
		// Найти кратчайший путь для всех вершин
		for ($i = 1; $i < $nVertices; $i++){
			// Выбераем вершину с минимальным расстоянием из множества вершин, которые еще не обработаны. 
			// nearestVertex всегда равен startNode в первой итерации.
			$nearestVertex = -1;
			$shortestDistance = PHP_INT_MAX;
			for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
				if (!$added[$vertexIndexSrc][$vertexIndex] AND $shortestDistances[$vertexIndexSrc][$vertexIndex] < $shortestDistance){
					$nearestVertex = $vertexIndex;
					$shortestDistance = $shortestDistances[$vertexIndexSrc][$vertexIndex];
				}
			}
			// Помечаем выбранную вершину как обработанную.
			$added[$vertexIndexSrc][$nearestVertex] = true;
			// Обновить значение dist для соседних вершин выбранной вершины.
			for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
				$edgeDistance = $adjacencyMatrix[$nearestVertex][$vertexIndex];
				if ($edgeDistance > 0 AND (($shortestDistance + $edgeDistance) < $shortestDistances[$vertexIndexSrc][$vertexIndex])){
					$parents[$vertexIndexSrc][$vertexIndex] = $nearestVertex;
					$shortestDistances[$vertexIndexSrc][$vertexIndex] = $shortestDistance + $edgeDistance;
				}
			}
		}
	}
	$arData['shortestDistances'] = $shortestDistances;
	$arData['parents'] = $parents;
	////////////////////////////////
	// ШАГ 4. Массив для хранения кратчайшего пути - дерево путей
	unset($pathForNode);
	$pathForNode = Array();
	if ($algoritm == 'Dijkstra'){
		$pathForNode = pathForNode($k, $parents);
	}
	if ($algoritm == 'PO' AND $s1 <> 0 AND $s2 <> 0){
		for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
			for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
				unset($path);
				$path = Array();
				if ($vertexIndexSrc <> $vertexIndex){
					$current_start_node = -1;
					$new_start_node = $vertexIndexSrc;
					do {
						$current_start_node = $new_start_node;
						$path[] = $current_start_node;
						$new_start_node = findRoutePO($current_start_node, $vertexIndex, $k, $s1, $s2);						
					} while ($new_start_node <> $current_start_node);
				}
				$pathForNode[$vertexIndexSrc][$vertexIndex] = $path;
			}
		}
	}
	if ($algoritm == 'ROU' AND $s1 <> 0 AND $s2 <> 0 AND $count_iteration <> 0){
		for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
			for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
				unset($path);
				$path = Array();
				if ($vertexIndexSrc <> $vertexIndex){
					$current_start_node = -1;
					$new_start_node = $vertexIndexSrc;
					do {
						$current_start_node = $new_start_node;
						$path[] = $current_start_node;
						$new_start_node = findRouteROU($current_start_node, $vertexIndex, $k, $s1, $s2, $count_iteration);						
					} while ($new_start_node <> $current_start_node);
				}
				$pathForNode[$vertexIndexSrc][$vertexIndex] = $path;
			}
		}	
	}
	$arData['pathForNode'] = $pathForNode;
	///////////////////////////////
	// ШАГ 5. Построение матрицы маршрутизации
	for ($vertexIndexSrc = 0; $vertexIndexSrc < $nVertices; $vertexIndexSrc++){
		for ($vertexIndex = 0; $vertexIndex < $nVertices; $vertexIndex++){
			if (count($pathForNode[$vertexIndexSrc][$vertexIndex]) > 0) {
				//из пути берем первую пару портов и по ней определяем порт, который указываем в матрице маршрутизации
				$x1 = $pathForNode[$vertexIndexSrc][$vertexIndex][0];
				$x2 = $pathForNode[$vertexIndexSrc][$vertexIndex][1];
				$port = findPort($netlist, $x1, $x2, $p);
				$routing[$vertexIndexSrc][$vertexIndex] = $port;
			} 
		}
	}  
	//////////////////////////
	// сохраняем результат	
	$arData['routing'] = $routing;		
	/////////////////////////////////
	return $arData;
}
unset($arData);
$arData = Array();
//////////////////////////
$choice_topology = $_REQUEST["choice_topology"];
if (empty($choice_topology)){
	$choice_topology = '';	
}
$arData['choice_topology'] = $choice_topology;
//////////////////////////
$number_topology = $_REQUEST["number_topology"];
if (empty($number_topology)){
	$number_topology = '';	
}
$arData['number_topology'] = $number_topology;
//////////////////////////
$param_1 = $_REQUEST["param_1"];
if (empty($param_1)){
	$param_1 = '';	
}
$arData['param_1'] = $param_1;
//////////////////////////
$param_2 = $_REQUEST["param_2"];
if (empty($param_2)){
	$param_2 = '';	
}
$arData['param_2'] = $param_2;
//////////////////////////
$param_3 = $_REQUEST["param_3"];
if (empty($param_3)){
	$param_3 = '';	
}
$arData['param_3'] = $param_3;
//////////////////////////
$param_4 = $_REQUEST["param_4"];
if (empty($param_4)){
	$param_4 = '';	
}
$arData['param_4'] = $param_4;
//////////////////////////
$param_5 = $_REQUEST["param_5"];
if (empty($param_5)){
	$param_5 = '';	
}
$arData['param_5'] = $param_5;
//////////////////////////
$param_6 = $_REQUEST["param_6"];
if (empty($param_6)){
	$param_6 = '';	
}
$arData['param_6'] = $param_6;
//////////////////////////
$param_7 = $_REQUEST["param_7"];
if (empty($param_7)){
	$param_7 = '';	
}
$arData['param_7'] = $param_7;
//////////////////////////
$param_8 = $_REQUEST["param_8"];
if (empty($param_8)){
	$param_8 = '';	
}
$arData['param_8'] = $param_8;
//////////////////////////
$param_9 = $_REQUEST["param_9"];
if (empty($param_9)){
	$param_9 = '';	
}
$arData['param_9'] = $param_9;
//////////////////////////
$sim_param_1 = $_REQUEST["sim_param_1"];
if (empty($sim_param_1)){
	$sim_param_1 = '';	
}
$arData['sim_param_1'] = $sim_param_1;
//////////////////////////
$sim_param_2 = $_REQUEST["sim_param_2"];
if (empty($sim_param_2)){
	$sim_param_2 = '';	
}
$arData['sim_param_2'] = $sim_param_2;
//////////////////////////
$sim_param_3 = $_REQUEST["sim_param_3"];
if (empty($sim_param_3)){
	$sim_param_3 = '';	
}
$arData['sim_param_3'] = $sim_param_3;
//////////////////////////
$sim_param_4 = $_REQUEST["sim_param_4"];
if (empty($sim_param_4)){
	$sim_param_4 = '';	
}
$arData['sim_param_4'] = $sim_param_4;
//////////////////////////
$sim_param_5 = $_REQUEST["sim_param_5"];
if (empty($sim_param_5)){
	$sim_param_5 = '';	
}
$arData['sim_param_5'] = $sim_param_5;
//////////////////////////
$sim_param_6 = $_REQUEST["sim_param_6"];
if (empty($sim_param_6)){
	$sim_param_6 = '';	
}
$arData['sim_param_6'] = $sim_param_6;
//////////////////////////
$sim_param_7 = $_REQUEST["sim_param_7"];
if (empty($sim_param_7)){
	$sim_param_7 = '';	
}
$arData['sim_param_7'] = $sim_param_7;
//////////////////////////
$sim_param_8 = $_REQUEST["sim_param_8"];
if (empty($sim_param_8)){
	$sim_param_8 = '';	
}
$arData['sim_param_8'] = $sim_param_8;
//////////////////////////
$uploading_file = $_REQUEST["uploading_file"];
if (empty($uploading_file)){
	$uploading_file = '';	
}
$arData['uploading_file'] = $uploading_file;
/////////////////////////
$arData['links'] = Array();
if ($param_3 <> ''){
	for ($i = 0; $i < (int)$param_3; $i++) {
		$link_particle = $_REQUEST["particle_".$i];
		if (empty($link_particle)){
			$link_particle = '';	
		}
		$arData['links'][$i] = Array();
		if ($link_particle <> ''){
			$tmp_link_particle = explode('_',$link_particle);
			foreach($tmp_link_particle as $value_link){
				$arData['links'][$i][] = $value_link;
			}
		}
	}
}
/////////////////////////
$arData['coords_x'] = Array();
if ($param_3 <> ''){
	for ($i = 0; $i < (int)$param_3; $i++) {
		$coords_x = $_REQUEST["coords_x_".$i];
		if (empty($coords_x)){
			$coords_x = '';	
		}
		$arData['coords_x'][$i] = $coords_x;		
	}
}
/////////////////////////
$arData['coords_y'] = Array();
if ($param_3 <> ''){
	for ($i = 0; $i < (int)$param_3; $i++) {
		$coords_y = $_REQUEST["coords_y_".$i];
		if (empty($coords_y)){
			$coords_y = '';	
		}
		$arData['coords_y'][$i] = $coords_y;		
	}
}
/////////////////////////
$arData['randomString'] = RandomString();
$arData['file_xml'] = '';
$arData['save_xml_file_path'] = '';
$arData['error'] = '';
$arData['netlist'] = Array();
$arData['routing'] = Array();
///////////////////////
if ($choice_topology <> '' AND $number_topology <> ''){
	if ($uploading_file <> ''){
		$arData['randomString'] = $uploading_file;
	}
	if ($number_topology == '1' AND $param_1 <> '' AND $param_2 <> ''){
		///////////////////	
		$n = (int)$param_1;		// Количество строк
		$m = (int)$param_2; 	// Количество столбцов		
		$dimention = $m*$n;     // Количество узлов
		// храним и инициализируем "боковые" id роутеров отдельно
		unset($leftList);
		$leftList = Array();
		unset($rightList);
		$rightList = Array();
		unset($upList);
		$upList = Array();
		unset($downList);
		$downList = Array();
		///////////////////
		//left
		$id = $m; 
		do {
			$leftList[] = $id; 
			$id += $m;
		} while ($id < $m * ($n - 1));
		///////////////////
		//right
		$id = 2 * $m - 1;
		do {
			$rightList[] = $id; 
			$id += $m;
		} while ($id < $dimention - 1);
		///////////////////
		//up
		$id = 1;
		do {
			$upList[] = $id; 
			$id++;
		} while ($id < $m - 1);
		///////////////////
		//down
		$id = $m * ($n - 1) + 1;
		do {
			$downList[] = $id; 
			$id++;
		} while ($id < $dimention - 1);
		///////////////////
		$arData['leftList'] = $leftList;
		$arData['rightList'] = $rightList;
		$arData['upList'] = $upList;
		$arData['downList'] = $downList;
		unset($netlist);
		$netlist = Array();
		//////////////////////////  начальное заполнение
		$id = 0;
		do {
			$netlist[$id][0] = -1;
            $netlist[$id][1] = -1;
            $netlist[$id][2] = -1;
            $netlist[$id][3] = -1;           
			$id++;
		} while ($id < $dimention);
		//////////////////////////
		$id = 0;
		do {
			// объявление локальных констант для нумеров портов для минимизации ошибок
            $zero = $id - 1;
            $one = $id + $m;
            $two = $id + 1;
            $three = $id - $m;
            $disconnect = -1;
			if ($id == 0) { // левый верхний угол 1,2
                $netlist[$id][0] = $disconnect;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $disconnect;
            } else if ($id == $m - 1) { // правый верхний угол 0,1
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $disconnect;
                $netlist[$id][3] = $disconnect;
            } else if ($id == $m * ($n - 1)) { // левый нижний угол 2,3
                $netlist[$id][0] = $disconnect;
                $netlist[$id][1] = $disconnect;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            } else if ($id == $dimention - 1) { // правый нижний угол 0,3
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $disconnect;
                $netlist[$id][2] = $disconnect;
                $netlist[$id][3] = $three;
            } else if (in_array($id,$leftList)) { // левая сторона 1,2,3
                $netlist[$id][0] = $disconnect;
				$netlist[$id][1] = $one;
				$netlist[$id][2] = $two;
                $netlist[$id][3] = $three;              
            } else if (in_array($id,$upList)) { // верхняя сторона 0,1,2
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $disconnect;
            } else if (in_array($id,$rightList)) { // правая сторона 0,1,3
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $disconnect;
                $netlist[$id][3] = $three;
            } else if (in_array($id,$downList)) { // нижняя сторона 0,2,3
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $disconnect;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            } else { // середина
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            }
			$id++;
		} while ($id < $dimention);
		$arData['netlist'] = $netlist;
		///////////////////
		unset($routing);
		$result = fullRouting ($dimention, 4, $netlist, 'Dijkstra', 0, 0, 0);
		$routing = $result['routing'];
		$arData['pathForNode'] = $result['pathForNode'];
		//////////////////////////
		// сохраняем результат	
		$arData['routing'] = $routing;	
	}
	if ($number_topology == '2' AND $param_1 <> '' AND $param_2 <> ''){
		///////////////////	
		$n = (int)$param_1; 	// Количество столбцов
		$m = (int)$param_2;		// Количество строк
		$dimention = $m*$n;
		// храним и инициализируем "боковые" id роутеров отдельно
		unset($leftList);
		$leftList = Array();
		unset($rightList);
		$rightList = Array();
		unset($upList);
		$upList = Array();
		unset($downList);
		$downList = Array();
		///////////////////
		//left
		$id = $m;
		do {
			$leftList[] = $id; 
			$id += $m;
		} while ($id < $m * ($n - 1));
		///////////////////
		//right
		$id = 2 * $m - 1;
		do {
			$rightList[] = $id; 
			$id += $m;
		} while ($id < $dimention - 1);
		///////////////////
		//up
		$id = 1;
		do {
			$upList[] = $id; 
			$id++;
		} while ($id < $m - 1);
		///////////////////
		//down
		$id = $m * ($n - 1) + 1;
		do {
			$downList[] = $id; 
			$id++;
		} while ($id < $dimention - 1);
		///////////////////
		unset($netlist);
		$netlist = Array();
		//////////////////////////  начальное заполнение
		$id = 0;
		do {
			$netlist[$id][0] = -1;
            $netlist[$id][1] = -1;
            $netlist[$id][2] = -1;
            $netlist[$id][3] = -1;           
			$id++;
		} while ($id < $dimention);
		//////////////////////////
		$id = 0;
		do {
			// объявление локальных констант для нумеров портов для минимизации ошибок
			$zero = $id - 1;
            $one = $id + $m;
            $two = $id + 1;
            $three = $id - $m;
			// "пробрасываемые" порты
            $residualZero = $id + ($m - 1);
            $residualOne = $id - $m*($n - 1);
            $residualTwo = $id - ($m - 1) ;
            $residualThree = $id + $m*($n - 1);
            if ($id == 0) { // левый верхний угол 
                $netlist[$id][0] = $residualZero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $residualThree;
            } else if ($id == $m - 1) { // правый верхний угол
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $residualTwo;
                $netlist[$id][3] = $residualThree;
            } else if ($id == $m * ($n - 1)) { // левый нижний угол 
                $netlist[$id][0] = $residualZero;
                $netlist[$id][1] = $residualOne;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            } else if ($id == $dimention - 1) { // правый нижний угол 
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $residualOne;
                $netlist[$id][2] = $residualTwo;
                $netlist[$id][3] = $three;
            } else if (in_array($id,$leftList)) { // левая сторона
                $netlist[$id][0] = $residualZero;
				$netlist[$id][1] = $one;                
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            } else if (in_array($id,$upList)) { // верхняя сторона 
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $residualThree;
            } else if (in_array($id,$rightList)) { // правая сторона
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $residualTwo;
                $netlist[$id][3] = $three;
            } else if (in_array($id,$downList)) { // нижняя сторона
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $residualOne;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            } else { // середина
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$id][2] = $two;
                $netlist[$id][3] = $three;
            }
			$id++;
		} while ($id < $dimention);
		$arData['netlist'] = $netlist;
		///////////////////
		unset($routing);
		$result = fullRouting ($dimention, 4, $netlist, 'Dijkstra', 0, 0, 0);
		$routing = $result['routing'];
		$arData['pathForNode'] = $result['pathForNode'];
		//////////////////////////
		// сохраняем результат	
		$arData['routing'] = $routing;	
	}
	if ($number_topology == '3' AND $param_3 <> '' AND $param_4 <> '' AND $param_5 <> '' AND $param_6 <> ''){
		////////////////////////////////
		$k = (int)$param_3; 		// Количество узлов
		if ($param_4 <= $param_5){
			$s1 = (int)$param_4;		// Меньший шаг
			$s2 = (int)$param_5;		// Больший шаг
		}
		if ($param_5 < $param_4){
			$s1 = (int)$param_5;		// Меньший шаг
			$s2 = (int)$param_4;		// Больший шаг
		}
		unset($netlist);
		$netlist = Array();
		//////////////////////////  начальное заполнение
		$id = 0;
		do {
			$netlist[$id][0] = -1;
            $netlist[$id][1] = -1;
            $netlist[$id][2] = -1;
            $netlist[$id][3] = -1;           
			$id++;
		} while ($id < $k);   
		//////////////////////////
		$id = 0;
		do {
		    // изначально задано, что s1 < s2, поэтому:
            $zero = $id + $s1;
			$zeroPlus = $zero - $k;
            $one = $id + $s2;
            $onePlus = $one - $k;            
            if (($id + $s1) > ($k - 1)) {
                $netlist[$id][0] = $zeroPlus;
                $netlist[$id][1] = $onePlus;
                $netlist[$zeroPlus][3] = $id;
                $netlist[$onePlus][2] = $id;
            } else if (($id + $s2) > ($k - 1)) {
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $onePlus;
                $netlist[$zero][3] = $id;
                $netlist[$onePlus][2] = $id;
            } else {
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$zero][3] = $id;
                $netlist[$one][2] = $id;
            }        
			$id++;
		} while ($id < $k);
		$arData['netlist'] = $netlist;
		///////////////////
		unset($routing);
		$routing = Array();
		if ($param_6 == 'Dijkstra'){
			///////////////////			
			$result = fullRouting ($k, 4, $netlist, 'Dijkstra', 0, 0, 0);
			$routing = $result['routing'];
			$arData['pathForNode'] = $result['pathForNode'];
			//////////////////////////			
		}
		if ($param_6 == 'PO'){
			///////////////////			
			$result = fullRouting ($k, 4, $netlist, 'PO', $s1, $s2, 0);
			$routing = $result['routing'];
			$arData['pathForNode'] = $result['pathForNode'];
			//////////////////////////			
		}
		if ($param_6 == 'ROU' AND $param_7 <> ''){
			///////////////////			
			$result = fullRouting ($k, 4, $netlist, 'ROU', $s1, $s2, (int)$param_7);
			$routing = $result['routing'];
			$arData['pathForNode'] = $result['pathForNode'];
//			$arData['Step_cicles'] = Step_cicles(2, 0, 5, 1, 2, 1);  // для отладки
//			$arData['findRouteROU'] = findRouteROU(2, 0, 5, 1, 2, 1);   // для отладки
			//////////////////////////			
		}
		// сохраняем результат	
		$arData['routing'] = $routing;
	}
	if ($number_topology == '4' AND $param_3 <> '' AND $param_6 <> ''){
		////////////////////////////////
		$k = (int)$param_3; 		// Количество узлов
		//диаметр предельно оптимального циркулянта
        $d = round((sqrt(2*$k - 1) - 1)/2);
        $s1 = $d;
		$s2 = $d + 1;
		unset($netlist);
		$netlist = Array();
		//////////////////////////  начальное заполнение
		$id = 0;
		do {
			$netlist[$id][0] = -1;
            $netlist[$id][1] = -1;
            $netlist[$id][2] = -1;
            $netlist[$id][3] = -1;           
			$id++;
		} while ($id < $k);   
		//////////////////////////
		$id = 0;
		do {
		    // изначально задано, что s1 < s2, поэтому:
            $zero = $id + $s1;
			$zeroPlus = $zero - $k;
            $one = $id + $s2;
            $onePlus = $one - $k;            
            if (($id + $s1) > ($k - 1)) {
                $netlist[$id][0] = $zeroPlus;
                $netlist[$id][1] = $onePlus;
                $netlist[$zeroPlus][3] = $id;
                $netlist[$onePlus][2] = $id;
            } else if (($id + $s2) > ($k - 1)) {
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $onePlus;
                $netlist[$zero][3] = $id;
                $netlist[$onePlus][2] = $id;
            } else {
                $netlist[$id][0] = $zero;
                $netlist[$id][1] = $one;
                $netlist[$zero][3] = $id;
                $netlist[$one][2] = $id;
            }        
			$id++;
		} while ($id < $k);
		$arData['netlist'] = $netlist;
		///////////////////
	}
	/////////////////////////////////////////////////////
	// Формирование таблицы соединения узлов (матрица Netlist) для произвольной топологии
	if ($number_topology == '5' AND $param_3 <> '' AND !empty($arData['links'])){
		$k = (int)$param_3; 		// Количество узлов
		$p = 2; 					// Количество портов
		foreach($arData['links'] as $num_particle => $ar_link_particle){
			if ($p < count($ar_link_particle)){
				$p = count($ar_link_particle);				
			}
		}
		/////////////////////////////
		// схема назначения портов: порты нумеруются от 0,
		// порты первой половины списка портов "противоположны" портам второй половины списка портов
		// например, при наличии 4 портов, 0 и 1 "противоположны" 2 и 3 соответственно 
		// при нечетном количестве портов, порт в середине списка портов "противоположен" сам себе
		////////////////////////////
		//  для анализа нечетного количества портов
		$arData['middle_port'] = 0;
		if (($p % 2) <> 0){
			$arData['middle_port'] = round($p / 2, 0, PHP_ROUND_HALF_DOWN);
		}
		//////////////////////////
		unset($netlist);
		$netlist = Array();
		//////////////////////////  
		// начальное заполнение соответствует, полному отсутствию связей между портами для всех узлов  
		$id = 0;
		do {
			for ($i = 0; $i < $p; $i++){
				$netlist[$id][$i] = -1;				
			}				
			$id++;
		} while ($id < $k);   
		//////////////////////////
		// учитываем возможность отсутствия связей у узла
		unset($tmp_links);
		$tmp_links = $arData['links'];
		foreach($tmp_links as $num_particle => $ar_link_particle){
			if (count($ar_link_particle) == 0){
				unset($tmp_links[$num_particle]);
			}
		}
		//////////////////////////
		$find_max_links = -2;	// для входа в цикл используем значение, удовлетворяющее входу, но не участвующее в алгоритме 
		//////////////////////////
		$control_solution = true;   // контроль за полным распределением всех линков по портам
		do {
			///////////////////////////
			// попытка найти условие для выполнения итерации
			// выбираем из оставщихся в наличии узлов с максимальным количеством связанных портов 
			$find_max_links = -1;
			$count_link = 0;
			foreach($tmp_links as $num_particle => $ar_link_particle){
				if ($count_link < count($ar_link_particle)){
					$count_link = count($ar_link_particle);
					$find_max_links = $num_particle;
				}
			}
			///////////////////////////
			if ($find_max_links <> -1){
				$current_control_solution = false;
				$current_particle = $find_max_links;
				$arData['current_particle'][] = $current_particle;
				$arData['tmp_links'][$current_particle] = $tmp_links;  // для отладки - оставщийся в момент итерации список необработанных по связям узлов 
				$arData['ports'][$current_particle] = Array();  // для отладки
				foreach($tmp_links[$current_particle] as $link_particle){
					///////////////////////////////////
					// вариант обработки четного количества портов
					if ($arData['middle_port'] == 0){
						for ($i = 0; $i < $p; $i++){
							$port_1 = $i;
							if ($i < ($p / 2)){
								$port_2 = $i + ($p / 2);
							} else {
								$port_2 = $i - ($p / 2);
							}
							if ($netlist[$current_particle][$port_1] == -1 AND $netlist[(int)$link_particle][$port_2] == -1){
								$netlist[$current_particle][$port_1] = (int)$link_particle;
								$netlist[(int)$link_particle][$port_2] = $current_particle;
								$current_control_solution = true;								
								$arData['ports'][$current_particle][(int)$link_particle][$port_1.'_'.$port_2] = 'Да';	 // для отладки
								break;
							} else {
								$arData['ports'][$current_particle][(int)$link_particle][$port_1.'_'.$port_2] = 'Нет_'.$netlist[$current_particle][$port_1].'_'.$netlist[(int)$link_particle][$port_2];  // для отладки	
							}
						}
					} else {
					/////////////////////////////////////
					// вариант обработки нечетного количества узлов					
						$need_middle_port = 1;
						for ($i = 0; $i < $p; $i++){
							if ($i <> $arData['middle_port']){
								$port_1 = $i;
								if ($i < round($p / 2, 0, PHP_ROUND_HALF_UP)){
									$port_2 = $i + round($p / 2, 0, PHP_ROUND_HALF_UP);
								} else {
									$port_2 = $i - round($p / 2, 0, PHP_ROUND_HALF_UP);
								}
								if ($netlist[$current_particle][$port_1] == -1 AND $netlist[(int)$link_particle][$port_2] == -1){
									$netlist[$current_particle][$port_1] = (int)$link_particle;
									$netlist[(int)$link_particle][$port_2] = $current_particle;
									$current_control_solution = true;
									$need_middle_port = 0;
									$arData['ports'][$current_particle][(int)$link_particle][$port_1.'_'.$port_2] = 'Да';  // для отладки
									break;
								} else {
									$arData['ports'][$current_particle][(int)$link_particle][$port_1.'_'.$port_2] = 'Нет_'.$netlist[$current_particle][$port_1].'_'.$netlist[(int)$link_particle][$port_2];  // для отладки
								}
							}
						}
						if ($need_middle_port == 1){
							$port_1 = $arData['middle_port'];
							$port_2 = $arData['middle_port'];
							if ($netlist[$current_particle][$port_1] == -1 AND $netlist[(int)$link_particle][$port_2] == -1){
								$netlist[$current_particle][$port_1] = (int)$link_particle;
								$netlist[(int)$link_particle][$port_2] = $current_particle;
								$current_control_solution = true;
								$arData['ports'][$current_particle][(int)$link_particle][$port_1.'_'.$port_2] = 'Да';   // для отладки
							} else {
								$arData['ports'][$current_particle][(int)$link_particle][$port_1.'_'.$port_2] = 'Нет_'.$netlist[$current_particle][$port_1].'_'.$netlist[(int)$link_particle][$port_2];  // для отладки
							}
						}
					}
				}
				/////////////////////////////////
				// убираем отработанные линки в узлах
				unset($tmp_links[$current_particle]);
				foreach($tmp_links as $num_particle => $ar_link_particle){
					foreach($ar_link_particle as $num_link => $link_particle){
						if ($link_particle == $current_particle){
							unset($tmp_links[$num_particle][$num_link]);
							unset($new_tmp_links_num_particle);
							$new_tmp_links_num_particle = Array();
							foreach($tmp_links[$num_particle] as $new_link_particle){
								$new_tmp_links_num_particle[] = $new_link_particle;
							}
							$tmp_links[$num_particle] = $new_tmp_links_num_particle;
						}
					}
					if (count($tmp_links[$num_particle]) == 0){
						unset($tmp_links[$num_particle]);
					}
				}
				/////////////////////////////////
				if (!$current_control_solution){
					$control_solution = false;					
				}
				///////////////////////////////// 
				// точка останова - для отладки итераций
/*				if (count($arData['current_particle']) == 3){					
					break;
 				}  */				
			}
		} while ($find_max_links <> -1);
		/////////////////////////////////
		if (!$control_solution){
			mail('pschuyan@edu.hse.ru','UOCNS.RU - create_xml_files.php', 'Нет возможности полностью распределить все связи, назначенные узлам по портам в '.$arData['randomString'].'.xml');
		}
		// сохраняем результат	
		$arData['netlist'] = $netlist;		
		/////////////////////////////////			
		unset($routing);
		$result = fullRouting ($k, $p, $netlist, 'Dijkstra', 0, 0, 0);
		$routing = $result['routing'];
		$arData['pathForNode'] = $result['pathForNode'];
		//////////////////////////
		// сохраняем результат	
		$arData['routing'] = $routing;	
	}
	if ((!empty($arData['netlist']) AND !empty($arData['routing'])) OR $number_topology == '3' OR $number_topology == '4' OR $number_topology == '5'){
		$xml = new domDocument("1.0", "ISO-8859-1"); // Создаём XML-документ версии 1.0 с кодировкой ISO-8859-1
		$xml->preserveWhiteSpace = false;
		$xml->formatOutput = true;
		/////////////
		$TaskOCNS = $xml->createElement("TaskOCNS"); // Создаём корневой элемент
		$xml->appendChild($TaskOCNS);
		if ($number_topology == '1' OR $number_topology == '2'){
			$TaskOCNS->setAttribute("Description", $choice_topology.'-('.$param_1.','.$param_2.')'); // Устанавливаем атрибут "Description" у узла "TaskOCNS"
		}
		if ($number_topology == '3'){
			if ($param_6 == 'ROU'){
				$txt_param_7 = ','.$param_7;
			} else {
				$txt_param_7 = '';
			}
			$TaskOCNS->setAttribute("Description", $choice_topology.'-('.$param_3.','.$param_4.','.$param_5.','.$param_6.$txt_param_7.')'); // Устанавливаем атрибут "Description" у узла "TaskOCNS"
		}
		if ($number_topology == '4'){
			if ($param_6 == 'ROU'){
				$txt_param_7 = ','.$param_7;
			} else {
				$txt_param_7 = '';
			}
			$TaskOCNS->setAttribute("Description", $choice_topology.'-('.$param_3.','.$param_6.$txt_param_7.')'); // Устанавливаем атрибут "Description" у узла "TaskOCNS"
		}
		if ($number_topology == '5'){
			$TaskOCNS->setAttribute("Description", 'ArbitraryTopology-('.$param_3.')'); // Устанавливаем атрибут "Description" у узла "TaskOCNS"
		}
		/////////////
		$Network = $xml->createElement("Network"); // Создаём узел "Network" 
		$TaskOCNS->appendChild($Network);
		/////////////
		$str_network = '&#10;';
		foreach($arData['netlist'] as $key_1 => $ar_part_netlist){
			foreach($ar_part_netlist as $key_2 => $part_netlist){
				$str_network = $str_network.$part_netlist.' ';
			}
			$str_network = $str_network.'&#10;';
		}
		$Netlist = $xml->createElement("Netlist",trim($str_network)); // Создаём узел "Network" с текстом внутри
		$Network->appendChild($Netlist);
		/////////////
		$str_routing = '&#10;';
		foreach($arData['routing'] as $key_1 => $ar_part_routing){
			foreach($ar_part_routing as $key_2 => $part_routing){
				$str_routing = $str_routing.$part_routing.' ';
			}
			$str_routing = $str_routing.'&#10;';
		}
		$Routing = $xml->createElement("Routing", trim($str_routing)); // Создаём узел "Routing" с текстом внутри
		$Network->appendChild($Routing);
		/////////////
		$Link = $xml->createElement("Link"); // Создаём узел "Link"
		$Network->appendChild($Link);
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Link->appendChild($Parameter);
		$Parameter->setAttribute("FifoSize", $param_9); // Устанавливаем атрибут "FifoSize" у узла "Link"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Link->appendChild($Parameter);
		$Parameter->setAttribute("FifoCount", $param_8); // Устанавливаем атрибут "FifoCount" у узла "Link"
		/////////////
		$Traffic = $xml->createElement("Traffic"); // Создаём узел "Traffic" 
		$TaskOCNS->appendChild($Traffic);
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Traffic->appendChild($Parameter);
		$Parameter->setAttribute("FlitSize", $sim_param_1); // Устанавливаем атрибут "FlitSize" у узла "Traffic"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Traffic->appendChild($Parameter);
		$Parameter->setAttribute("PacketSizeAvg", $sim_param_2); // Устанавливаем атрибут "PacketSizeAvg" у узла "Traffic"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Traffic->appendChild($Parameter);
		$Parameter->setAttribute("PacketSizeIsFixed", $sim_param_3); // Устанавливаем атрибут "PacketSizeIsFixed" у узла "Traffic"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Traffic->appendChild($Parameter);
		$Parameter->setAttribute("PacketPeriodAvg", $sim_param_4); // Устанавливаем атрибут "PacketPeriodAvg" у узла "Traffic"
		/////////////
		$Simulation = $xml->createElement("Simulation"); // Создаём узел "Simulation" 
		$TaskOCNS->appendChild($Simulation);
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Simulation->appendChild($Parameter);
		$Parameter->setAttribute("CountRun", $sim_param_7); // Устанавливаем атрибут "CountRun" у узла "Simulation"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Simulation->appendChild($Parameter);
		$Parameter->setAttribute("CountPacketRx", $sim_param_5); // Устанавливаем атрибут "CountPacketRx" у узла "Simulation"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Simulation->appendChild($Parameter); 
		$Parameter->setAttribute("CountPacketRxWarmUp", $sim_param_6); // Устанавливаем атрибут "CountPacketRxWarmUp" у узла "Simulation"
		/////////////
		$Parameter = $xml->createElement("Parameter"); // Создаём узел "Parameter"
		$Simulation->appendChild($Parameter);
		$Parameter->setAttribute("IsModeGALS", $sim_param_8); // Устанавливаем атрибут "IsModeGALS" у узла "Simulation"
		/////////////
		if ($number_topology == '5'){
			$str_coords_x = '&#10;';
			foreach($arData['coords_x'] as $part_coords_x){
				$str_coords_x = $str_coords_x.$part_coords_x.' ';		
			}
			$str_coords_x = $str_coords_x.'&#10;';
			$Coords_X = $xml->createElement("Coords_X",trim($str_coords_x)); // Создаём узел "Coords_X" 
			$TaskOCNS->appendChild($Coords_X);
			/////////////
			$str_coords_y = '&#10;';
			foreach($arData['coords_y'] as $part_coords_y){
				$str_coords_y = $str_coords_y.$part_coords_y.' ';		
			}
			$str_coords_y = $str_coords_y.'&#10;';
			$Coords_Y = $xml->createElement("Coords_Y",trim($str_coords_y)); // Создаём узел "Coords_Y" 
			$TaskOCNS->appendChild($Coords_Y);
			/////////////
			$str_links = '&#10;';
			foreach($arData['links'] as $key_1 => $ar_links){
				foreach($ar_links as $key_2 => $item_link){
					$str_links = $str_links.$item_link.' ';
				}
				$str_links = $str_links.'_&#10;';
			}
			$Links = $xml->createElement("Links", trim($str_links)); // Создаём узел "Links" 
			$TaskOCNS->appendChild($Links);
		}
		/////////////
		$xml->save($_SERVER["DOCUMENT_ROOT"]."/files_xml/".$arData['randomString'].'.xml'); // Сохраняем полученный XML-документ в файл
		$arData['file_xml'] = htmlspecialchars(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/files_xml/".$arData['randomString'].'.xml'), ENT_QUOTES);
		$arData['save_xml_file_path'] = "https://uocns.ru/files_xml/".$arData['randomString'].".xml?file=yes";
	}
} else {
	$arData['error'] = 'Не все параметры заполнены';
}
$res = json_encode($arData);
echo $res;
?>						