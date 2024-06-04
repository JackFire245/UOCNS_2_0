<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программа взаимодействия с моделью высокоуровневого моделирования сети на кристалле UOCNS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
	<link rel="stylesheet" href="style.css?v=<?=date('YmdHis');?>">
	<script type="text/javascript" src="script.js?v=<?=date('YmdHis');?>"></script>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
</head>
<body id="body">
<div class="wrapper">
	<div class="nocsim-main">
		<section class="nocsim-section4">
			<div class="nocsim-section4-container">
				<span class="nocsim-mb40">ЭТАПЫ</span>
				<div class="nocsim-section4-container-block" id="block_steps" current="0">
					<div class="nocsim-section4-container-block-cont" id="level_step_1" onclick="step_1();">
						Выбор топологии
					</div>
					<div class="nocsim-section4-container-block-cont no_active_level" id="level_step_2">
						Формирование произвольной топологии
					</div>
					<div class="nocsim-section4-container-block-cont no_active_level" id="level_step_3">
						Задание параметров
					</div>					
					<div class="nocsim-section4-container-block-cont no_active_level" id="level_step_4">
						Создание конфигурационного файла
					</div>					
					<div class="nocsim-section4-container-block-cont no_active_level" id="level_step_5">
						Результаты моделирования
					</div>
				</div>
			</div>			
		</section>
	</div>	
	<div class="nocsim-main">
		<div id="step_0">
			<section class="nocsim-section3">
				<div class="nocsim-section3-container">
					<div class="nocsim-section3-container-incide">
						<div clasS="nocsim-section3-container-incide_block">
							<div class="nocsim-section3-container_inner"> 
								<h3 class="nocsim-section3-container-title">Программа взаимодействия с моделью высокоуровневого моделирования сети на кристалле UOCNS</h3>
								<div class="nocsim-section4-container-block">	
									<div class="nocsim-section4-container-block-cont_var" onclick="step_1();">
										Запустить модуляцию модели
									</div>			
								</div>		
							</div>
							
						</div>
						
					</div>
				</div>
			</section>			
		</div>
		<div id="step_1" style="display:none;">
			<section class="nocsim-section3">
				<div class="nocsim-section4-container">
					<div style="padding: 20px 0px;">
						<ul class="form_rb_row__list">
							<div class="form_rb_row__column">
								<li class="form_rb_row__item">
									<fieldset class="form_rb_item" onclick="choice_network(1);">
										<span class="form_rb_item__radio_st form_rb_item__radio_st--off" id="mark_network_1"></span>
										<input type="radio" id="network_1" class="form_rb_item__radio" value="1">
										<label for="network_1" class="form_rb_item__label" id="label_network_1">Mesh</label>
									</fieldset> 
								</li>
								<li class="form_rb_row__item">
									<fieldset class="form_rb_item" onclick="choice_network(2);">
										<span class="form_rb_item__radio_st form_rb_item__radio_st--off" id="mark_network_2"></span>
										<input type="radio" id="network_2" class="form_rb_item__radio" value="2">
										<label for="network_2" class="form_rb_item__label" id="label_network_2">Torus</label>
									</fieldset>
								</li>	
								<li class="form_rb_row__item">
									<fieldset class="form_rb_item" onclick="choice_network(3);">
										<span class="form_rb_item__radio_st form_rb_item__radio_st--off" id="mark_network_3"></span>
										<input type="radio" id="network_3" class="form_rb_item__radio" value="3">
										<label for="network_3" class="form_rb_item__label" id="label_network_3">Circulant</label>
									</fieldset>
								</li>
<?/*							<li class="form_rb_row__item">
									<fieldset class="form_rb_item" onclick="choice_network(4);">
										<span class="form_rb_item__radio_st form_rb_item__radio_st--off" id="mark_network_4"></span>
										<input type="radio" id="network_4" class="form_rb_item__radio" value="4">
										<label for="network_4" class="form_rb_item__label" id="label_network_4">CirculantOpt</label>
									</fieldset>
								</li>  */?>
								<li class="form_rb_row__item" id="hide_mobile_network">
									<fieldset class="form_rb_item" onclick="choice_network(5);">
										<span class="form_rb_item__radio_st form_rb_item__radio_st--off" id="mark_network_5"></span>
										<input type="radio" id="network_5" class="form_rb_item__radio" value="5">
										<label for="network_5" class="form_rb_item__label" id="label_network_5">Произвольная топология</label>
									</fieldset>
								</li>								
							</div>	
							<div class="form_rb_row__column">
								<div class="nocsim-section5-container-block" id="block_param_8" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Количество виртуальных каналов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_8" onchange="control_value_for_step_2_3('param_8');" min="1" type="number" autocomplete="off" placeholder="" name="param_8" value="4"/>
									</div>
								</div>
								<div class="nocsim-section5-container-block" id="block_param_9" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Размер буфера виртуального канала, флитов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_9" onchange="control_value_for_step_2_3('param_9');" min="1" type="number" autocomplete="off" placeholder="" name="param_9" value="4"/>
									</div>
								</div>
								<div class="nocsim-section5-container-block" id="block_param_1" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Количество строк
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_1" onchange="control_value_for_step_2_3('param_1');" min="1" type="number" autocomplete="off" placeholder="" name="param_1" value=""/>
									</div>
								</div>
								<div class="nocsim-section5-container-block" id="block_param_2" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Количество столбцов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_2" onchange="control_value_for_step_2_3('param_2');" min="1" type="number" autocomplete="off" placeholder="" name="param_2" value=""/>
									</div>
								</div>	
								<div class="nocsim-section5-container-block" id="block_param_3" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Количество узлов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_3" onchange="control_value_for_step_2_3('param_3');" min="2" type="number" autocomplete="off" placeholder="" name="param_3" value=""/>
									</div>
								</div>	
								<div class="nocsim-section5-container-block" id="block_param_4" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Меньший шаг
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_4" onchange="control_value_for_step_2_3('param_4');" min="1" type="number"autocomplete="off" placeholder="" name="param_4" value=""/>
									</div>
								</div>
								<div class="nocsim-section5-container-block" id="block_param_5" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Больший шаг
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_5" onchange="control_value_for_step_2_3('param_5');" min="1" type="number" autocomplete="off" placeholder="" name="param_5" value=""/>
									</div>
								</div>
								<div class="nocsim-section5-container-block" id="block_param_6" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Название алгоритма
									</div>
									<div class="nocsim-section3-container-block-container">
										<div class="is-block-inner">
											<div class="is-block-inner-item" id="name_algoritm_1" onclick="choice_name_algoritm(1);">
												<span id="value_name_algoritm_1">Dijkstra</span>
											</div>
											<div class="is-block-inner-item" id="name_algoritm_2" onclick="choice_name_algoritm(2);">
												<span id="value_name_algoritm_2">PO</span>
											</div>
											<div class="is-block-inner-item" id="name_algoritm_3" onclick="choice_name_algoritm(3);">
												<span id="value_name_algoritm_3">ROU</span>
											</div>											
										</div>
									</div>
								</div>
								<div class="nocsim-section5-container-block" id="block_param_7" style="display:none;">
									<div class="nocsim-section3-container-block-txt">
										Количество итераций поиска лучшего шага
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" id="param_7" onchange="control_value_for_step_2_3('param_7');" type="text" autocomplete="off" placeholder="" name="param_7" value=""/>
									</div>
								</div>
							</div>							
						</ul>
						<div style="display:none;" id="choice_topology"></div>	
						<div style="display:none;" id="number_topology"></div>
						<div style="display:none;" id="value_param_6"></div>
						<div class="nocsim-section5-container-block-cont">
							<div class="nocsim-section3-container-card-text">
								<div class="nocsim-section3-container-card-step">Шаг <span class="nocsim-mr10 nocsim-ml10">1</span>из<span class="nocsim-mr10 nocsim-ml10">5</span></div>
							</div>
							<div class="block_uploading_file">	
								<label for="input_xml_file" class="nocsim-section3-container-cont-button" id="button_upload_params">Загрузить из файла</label>
								<input style="display:none;" id="input_xml_file" type="file" accept=".xml" onchange="upload_file();" value="">
								<div id="uploading_file" style="display:none;"></div>
								<div id="error_uploading_file_1" class="error_text"></div>
							</div>
							<button class="nocsim-section3-container-cont-button no_active_button" id="button_step_2">Продолжить</button>
						</div>						
					</div>
				</div>
			</section>			
		</div>
		<script>
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
				var level_step_2 = document.getElementById("level_step_2");	
				if (level_step_2){								
					level_step_2.setAttribute('style','display:none;');					
				}
				var hide_mobile_network = document.getElementById("hide_mobile_network");	
				if (hide_mobile_network){								
					hide_mobile_network.setAttribute('style','display:none;');					
				}
			}
		</script>
		<div id="step_2" style="display:none;" oncontextmenu="return false;">
			<section class="nocsim-section3">
				<div class="nocsim-section4-container">
					<div class="nocsim-section4-container-block-cont" style="display:inline-flex;height:auto;" onclick="info_help();">
						ИНСТРУКЦИЯ
					</div>
					<div id="area_object_particles" style="display:inline-flex;">
						
					</div>
					<div>
						<ul class="form_rb_row__list" style="height:500px;" id="canvas_inner">
							<canvas id="canvas" onmousemove="onMouseMove(event);" onmouseup="onMouseUp();" x="" y="" item="" style="z-index:0;" first_partner="" first_unpartner="" protect="" moving="">
							
							</canvas>															
						</ul>						
						<div class="nocsim-section5-container-block-cont">
							<div class="nocsim-section3-container-card-text">
								<div class="nocsim-section3-container-card-step">Шаг <span class="nocsim-mr10 nocsim-ml10">2</span>из<span class="nocsim-mr10 nocsim-ml10">5</span></div>
							</div>							
							<button class="nocsim-section3-container-cont-button" onclick="step_3();" id="button_step_3">Продолжить</button>
						</div>
					</div>
				</div>
			</section>
			<section class="modal_window" id="content_modal_window" style="display:none;">
				<section class="width_modal_window" id="width_content_modal_window" style="width:550px;">
					<button class="close_modal_window" onclick="close_content_modal_window();">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M315.3 411.3c-6.253 6.253-16.37 6.253-22.63 0L160 278.6l-132.7 132.7c-6.253 6.253-16.37 6.253-22.63 0c-6.253-6.253-6.253-16.37 0-22.63L137.4 256L4.69 123.3c-6.253-6.253-6.253-16.37 0-22.63c6.253-6.253 16.37-6.253 22.63 0L160 233.4l132.7-132.7c6.253-6.253 16.37-6.253 22.63 0c6.253 6.253 6.253 16.37 0 22.63L182.6 256l132.7 132.7C321.6 394.9 321.6 405.1 315.3 411.3z" fill="currentColor"></path></svg>
					</button>
					<br>
					<h2 class="modal_window_header">Способы формирования</h2>
					<div class="modal_window_wrapper">
						<ul>
							<li class="item_sposob">Соединение узлов</li>
							<p class="desc_sposob">необходимо выбрать первый узел, нажать на него <span style="color:#000;">левой</span> кнопкой мышки, навестить на второй узел, с которым <span style="color:#000;">нет</span> соединения, нажать повторно на <span style="color:#000;">левую</span> кнопку мыши, связь между узлами появится</p>
							<li class="item_sposob">Удаление соединения</li>
							<p class="desc_sposob">необходимо выбрать первый узел, нажать на него <span style="color:#000;">правой</span> кнопкой мышки, навестить на второй узел, с которым <span style="color:#000;">есть</span> связь, нажать повторно на <span style="color:#000;">правую</span> кнопку мыши, связь между узлами пропадёт</p>
							<li class="item_sposob">Перемещение узлов</li>
							<p class="desc_sposob">необходимо <span style="color:#000;">зажать левую</span> кнопку мыши и перетащить узел в нужное положение на экране и отпустить кнопку</p>
						</ul>	
					</div>
				</section>
			</section>
			<section id="upload_coords" style="display:none;" upload_coords=""></section>			
		</div>
		<div id="step_3" style="display:none;">
			<section class="nocsim-section3">
				<div class="nocsim-section3-container">
					<div class="nocsim-section3-container-incide">
						<div clasS="nocsim-section5-container-incide_block">
							<div class="nocsim-section5-container_inner"> 
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Размер флита, бит
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" onchange="control_value_for_step_4(this);" min="1" type="number" id="sim_param_1" autocomplete="off" placeholder="" name="sim_param_1" value=""/>
									</div>
								</div>
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Средняя длина пакета, флитов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" onchange="control_value_for_step_4(this);" min="1" type="number" id="sim_param_2" autocomplete="off" placeholder="" name="sim_param_2" value=""/>
									</div>
								</div>	
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Фиксированный размер пакета флитов
									</div>
									<div class="nocsim-section3-container-block-container">
										<div class="is-block-inner">
											<div class="is-block-inner-item_param_3" id="choice_sim_param_3_1" onclick="choice_sim_param_3(1);">
												<span id="value_sim_param_3_1">ДА</span>
											</div>
											<div class="is-block-inner-item_param_3" id="choice_sim_param_3_2" onclick="choice_sim_param_3(2);">
												<span id="value_sim_param_3_2">НЕТ</span>
											</div>											
										</div>
									</div>
									<div style="display:none;" id="sim_param_3"></div>
								</div>
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Средний период генерации пакетов, тактов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" onchange="control_value_for_step_4(this);" min="1" type="number" id="sim_param_4" autocomplete="off" placeholder="" name="sim_param_4" value=""/>
									</div>
								</div>								
							</div>
							<div class="nocsim-section5-container_inner"> 								
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Время моделирования, принятых пакетов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" onchange="control_value_for_step_4(this);" min="1" type="number" id="sim_param_5" autocomplete="off" placeholder="" name="sim_param_5" value=""/>
									</div>
								</div>	
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Время насыщения модели сети, принятых пакетов
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" onchange="control_value_for_step_4(this);" min="1" type="number" id="sim_param_6" autocomplete="off" placeholder="" name="sim_param_6" value=""/>
									</div>
								</div>	
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Количество прогонов симулятора
									</div>
									<div class="nocsim-section3-container-block-container">
										<input class="nocsim-section3-container-block-container-input" onchange="control_value_for_step_4(this);" min="1" type="number" id="sim_param_7" autocomplete="off" placeholder="" name="sim_param_7" value=""/>
									</div>
								</div>
								<div class="nocsim-section5-container-block">
									<div class="nocsim-section3-container-block-txt">
										Параметр IsModeGALS
									</div>
									<div class="nocsim-section3-container-block-container">
										<div class="is-block-inner">
											<div class="is-block-inner-item_param_8" id="choice_sim_param_8_1" onclick="choice_sim_param_8(1);">
												<span id="value_sim_param_8_1">ДА</span>
											</div>
											<div class="is-block-inner-item_param_8" id="choice_sim_param_8_2" onclick="choice_sim_param_8(2);">
												<span id="value_sim_param_8_2">НЕТ</span>
											</div>											
										</div>
									</div>
									<div style="display:none;" id="sim_param_8"></div>
								</div>								
							</div>							
						</div>
						<div class="nocsim-section3-container-block-cont">
							<div class="nocsim-section3-container-card-text">
								<div class="nocsim-section3-container-card-step">Шаг <span class="nocsim-mr10 nocsim-ml10">3</span>из<span class="nocsim-mr10 nocsim-ml10">5</span></div>
							</div>
							<div class="block_uploading_file">	
								<label for="input_xml_file" class="nocsim-section3-container-cont-button" id="button_upload_params">Загрузить из файла</label>
								<input style="display:none;" id="input_xml_file" type="file" accept=".xml" onchange="upload_file();" value="">
								<div id="uploading_file" style="display:none;"></div>
								<div id="error_uploading_file_3" class="error_text"></div>
							</div>
							<button class="nocsim-section3-container-cont-button no_active_button" id="button_step_4">Продолжить</button>
						</div>
					</div>
				</div>
			</section>			
		</div>	
		<div id="step_4" style="display:none;">
			<section class="nocsim-section3">
				<div class="nocsim-section3-container">
					<div class="nocsim-section4-container-incide">
						<div clasS="nocsim-section5-container-incide_block">
							<pre class="prettyprint linenums" id="text_xml_file">
							
							</pre>													
						</div>
						<div class="nocsim-section3-container-block-cont">
							<div class="nocsim-section3-container-card-text">
								<div class="nocsim-section3-container-card-step">Шаг <span class="nocsim-mr10 nocsim-ml10">4</span>из<span class="nocsim-mr10 nocsim-ml10">5</span></div>
							</div>
							<a class="nocsim-section3-container-cont-button" id="button_save_xml_file">Скачать файл</a>
							<div id="save_file" style="display:none;"></div>
							<button class="nocsim-section3-container-cont-button no_active_button" id="button_step_5">Запуск моделирования</button>
						</div>
					</div>
				</div>
			</section>			
		</div>
		<div id="step_5" style="display:none;">
			<section class="nocsim-section3">
				<div class="nocsim-section3-container">
					<div class="nocsim-section4-container-incide">
						<div clasS="nocsim-section5-container-incide_block">
							<pre class="prettyprint linenums" id="text_result">
							
							</pre>													
						</div>
						<div class="nocsim-section3-container-block-cont">
							<div class="nocsim-section3-container-card-text">
								<div class="nocsim-section3-container-card-step">Шаг <span class="nocsim-mr10 nocsim-ml10">5</span>из<span class="nocsim-mr10 nocsim-ml10">5</span></div>
							</div>
							<a class="nocsim-section3-container-cont-button" id="button_save_result_file">Скачать файл результата</a>														
						</div>
					</div>
				</div>
			</section>			
		</div>	
	</div>
</div>	
</body>
</html>