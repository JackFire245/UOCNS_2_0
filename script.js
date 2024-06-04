function step_1(){
	var level_step_1 = document.getElementById("level_step_1");	
	if (level_step_1){								
		level_step_1.setAttribute('class','nocsim-section4-container-block-cont current_level');
	}
	var block_steps = document.getElementById("block_steps");	
	if (block_steps){								
		var current = block_steps.getAttribute('current');
		if (current != '1'){
			var level_step = document.getElementById("level_step_"+current);	
			if (level_step){								
				level_step.setAttribute('class','nocsim-section4-container-block-cont');
			}			
			var step = document.getElementById("step_"+current);	
			if (step){								
				step.setAttribute('style','display:none;');
			}
			var step_1 = document.getElementById("step_1");	
			if (step_1){								
				step_1.removeAttribute('style');
				step_1.scrollIntoView({
					block: 'start', // если start то страница будет прокручена к началу элемента 
					behavior: 'smooth' // отвечает за плавную прокрутку
				});
			}			
			block_steps.setAttribute('current','1');
			control_value_for_step_2_3('');					
		}
	}
	var level_step_5 = document.getElementById("level_step_5");	
	if (level_step_5){								
		level_step_5.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
	}
}
function choice_network(item_choice){
	var input_network = document.getElementById("mark_network_"+item_choice);
	if (input_network){
		var all_form_rb_item__radio_st = null;
		var elem_form_rb_item__radio_st;
		all_form_rb_item__radio_st = [...document.querySelectorAll('.form_rb_item__radio_st')];
		all_form_rb_item__radio_st.forEach((elem) => {
			elem_form_rb_item__radio_st = elem.getAttribute('id');
			if (elem_form_rb_item__radio_st == "mark_network_"+item_choice) {
				elem.setAttribute('class','form_rb_item__radio_st form_rb_item__radio_st--on');
				var input_choice_topology = document.getElementById("choice_topology");
				var label_network = document.getElementById("label_network_"+item_choice);
				if (input_choice_topology && label_network){	
					input_choice_topology.innerHTML = label_network.innerHTML;
					var input_number_topology = document.getElementById("number_topology");
					if (input_number_topology){	
						input_number_topology.innerHTML = item_choice;													
					}
					var block_param_8 = document.getElementById("block_param_8");	
					if (block_param_8){
						block_param_8.removeAttribute('style');
					}
/*					var block_param_9 = document.getElementById("block_param_9");	
					if (block_param_9){
						block_param_9.removeAttribute('style');
					}  */
					if (item_choice == 1 || item_choice == 2){
						var block_param_1 = document.getElementById("block_param_1");	
						if (block_param_1){
							block_param_1.removeAttribute('style');
						}
						var block_param_2 = document.getElementById("block_param_2");	
						if (block_param_2){
							block_param_2.removeAttribute('style');
						}
						var block_param_3 = document.getElementById("block_param_3");	
						if (block_param_3){
							block_param_3.setAttribute('style','display:none;');
						}
						var block_param_4 = document.getElementById("block_param_4");	
						if (block_param_4){
							block_param_4.setAttribute('style','display:none;');
						}
						var block_param_5 = document.getElementById("block_param_5");	
						if (block_param_5){
							block_param_5.setAttribute('style','display:none;');
						}
						var block_param_6 = document.getElementById("block_param_6");	
						if (block_param_6){
							block_param_6.setAttribute('style','display:none;');
						}
						var block_param_7 = document.getElementById("block_param_7");	
						if (block_param_7){
							block_param_7.setAttribute('style','display:none;');
						}							
					} 	
					if (item_choice == 3 || item_choice == 4){
						var block_param_1 = document.getElementById("block_param_1");	
						if (block_param_1){
							block_param_1.setAttribute('style','display:none;');
						}
						var block_param_2 = document.getElementById("block_param_2");	
						if (block_param_2){
							block_param_2.setAttribute('style','display:none;');
						}
						var block_param_3 = document.getElementById("block_param_3");	
						if (block_param_3){
							block_param_3.removeAttribute('style');
						}
						if (item_choice == 4){
							var block_param_4 = document.getElementById("block_param_4");	
							if (block_param_4){
								block_param_4.setAttribute('style','display:none;');
							}
							var block_param_5 = document.getElementById("block_param_5");	
							if (block_param_5){
								block_param_5.setAttribute('style','display:none;');
							}
						} else {
							var block_param_4 = document.getElementById("block_param_4");	
							if (block_param_4){
								block_param_4.removeAttribute('style');
							}
							var block_param_5 = document.getElementById("block_param_5");	
							if (block_param_5){
								block_param_5.removeAttribute('style');
							}
						}
						var block_param_6 = document.getElementById("block_param_6");	
						if (block_param_6){
							block_param_6.removeAttribute('style');
						}							
						var value_param_6 = document.getElementById("value_param_6");	
						if (value_param_6){
							var value_value_param_6 = value_param_6.innerHTML;
							if (value_value_param_6 == 'ROU'){
								var block_param_7 = document.getElementById("block_param_7");	
								if (block_param_7){
									block_param_7.removeAttribute('style');
								}
							} else {
								var block_param_7 = document.getElementById("block_param_7");	
								if (block_param_7){
									block_param_7.setAttribute('style','display:none;');
								}
							}
						}
					}
					if (item_choice == 5){
						var block_param_1 = document.getElementById("block_param_1");	
						if (block_param_1){
							block_param_1.setAttribute('style','display:none;');
						}
						var block_param_2 = document.getElementById("block_param_2");	
						if (block_param_2){
							block_param_2.setAttribute('style','display:none;');
						}
						var block_param_3 = document.getElementById("block_param_3");	
						if (block_param_3){
							block_param_3.removeAttribute('style');
						}
						var block_param_4 = document.getElementById("block_param_4");	
						if (block_param_4){
							block_param_4.setAttribute('style','display:none;');
						}
						var block_param_5 = document.getElementById("block_param_5");	
						if (block_param_5){
							block_param_5.setAttribute('style','display:none;');
						}
						var block_param_6 = document.getElementById("block_param_6");	
						if (block_param_6){
							block_param_6.setAttribute('style','display:none;');
						}							
						var block_param_7 = document.getElementById("block_param_7");	
						if (block_param_7){
							block_param_7.setAttribute('style','display:none;');
						}							
					}	
					control_value_for_step_2_3('');					
				}					
			} else {
				elem.setAttribute('class','form_rb_item__radio_st form_rb_item__radio_st--off');
			}
		});					
	}	
}
function choice_name_algoritm(choice_item){
	let all_is_block_inner_item = null;
	var elem_is_block_inner_item;		
	all_is_block_inner_item = [...document.querySelectorAll('.is-block-inner-item')];
	all_is_block_inner_item.forEach((elem) => {
		elem_is_block_inner_item = elem.getAttribute('id');
		if (elem_is_block_inner_item == 'name_algoritm_'+choice_item) {
			elem.setAttribute('class','is-block-inner-item is-block-inner-item--active');
			var value_param_6 = document.getElementById("value_param_6");	
			if (value_param_6){
				var value_name_algoritm = document.getElementById("value_name_algoritm_"+choice_item);	
				if (value_name_algoritm){
					value_param_6.innerHTML = value_name_algoritm.innerHTML; 
				}
				if (value_param_6.innerHTML == 'ROU'){
					var block_param_7 = document.getElementById("block_param_7");	
					if (block_param_7){
						block_param_7.removeAttribute('style');
					}
				} else {
					var block_param_7 = document.getElementById("block_param_7");	
					if (block_param_7){
						block_param_7.setAttribute('style','display:none;');
					}
				}
				control_value_for_step_2_3('');					
			}
		} else {
			elem.setAttribute('class','is-block-inner-item');
		}	
	});
}
function control_value_for_step_2_3(param_txt){
	var show_button = '';
	var input_number_topology = document.getElementById("number_topology");
	if (input_number_topology){	
		var item_choice = input_number_topology.innerHTML;													
		if (item_choice != ''){
			if (item_choice == '1' || item_choice == '2'){
				var param_1 = document.getElementById("param_1");
				var param_2 = document.getElementById("param_2");
				var param_8 = document.getElementById("param_8");
				var param_9 = document.getElementById("param_9");					
				if (param_1 && param_2 && param_8 && param_9){								
					if (param_1.value != '' && param_2.value != '' && param_8.value != '' && param_9.value != ''){
						show_button = 'Да';						
					}
				}
			}
			if (item_choice == '3'){
				var param_3 = document.getElementById("param_3");
				var param_4 = document.getElementById("param_4");
				var param_5 = document.getElementById("param_5");
				var value_param_6 = document.getElementById("value_param_6");	
				var param_7 = document.getElementById("param_7");
				var param_8 = document.getElementById("param_8");
				var param_9 = document.getElementById("param_9");					
				if (param_3 && param_4 && param_5 && value_param_6 && param_7 && param_8 && param_9){
					var control_algoritm = 0;
					if (value_param_6.innerHTML == 'ROU' && param_7.value != ''){	
						control_algoritm = 1;
					}
					if (value_param_6.innerHTML != '' && value_param_6.innerHTML != 'ROU'){	
						control_algoritm = 1;
					}
					if (param_3.value != '' && param_4.value != '' && param_5.value != '' && param_8.value != '' && param_9.value != '' && control_algoritm == 1){
						show_button = 'Да';
						if (param_4.value > param_5.value){
							var tmp_value_step = param_4.value;	
							param_4.value = param_5.value;
							param_5.value = tmp_value_step;							
						}			
						var tmp_value_dim = param_3.value;	
						if ((tmp_value_dim - 1) < param_5.value){
							param_5.value = tmp_value_dim - 1;
						}
						if ((tmp_value_dim - 1) < param_4.value){
							param_4.value = tmp_value_dim - 1;
						}
					}					
				}
			}
			if (item_choice == '4'){
				var param_3 = document.getElementById("param_3");
				var value_param_6 = document.getElementById("value_param_6");	
				var param_7 = document.getElementById("param_7");
				var param_8 = document.getElementById("param_8");
				var param_9 = document.getElementById("param_9");	
				if (param_3 && value_param_6 && param_7 && param_8 && param_9){
					var control_algoritm = 0;
					if (value_param_6.innerHTML == 'ROU' && param_7.value != ''){	
						control_algoritm = 1;
					}
					if (value_param_6.innerHTML != '' && value_param_6.innerHTML != 'ROU'){	
						control_algoritm = 1;
					}
					if (param_3.value != '' && param_8.value != '' && param_9.value != '' && control_algoritm == 1){
						show_button = 'Да';												
					}					
				}
			}
			if (item_choice == '5'){
				var param_3 = document.getElementById("param_3");
				var param_8 = document.getElementById("param_8");
				var param_9 = document.getElementById("param_9");	
				if (param_3 && param_8 && param_9){
					if (param_3.value != '' && param_8.value != '' && param_9.value != ''){
						show_button = 'Да';
						var canvasBody = document.getElementById("canvas");
						if (canvasBody){
							if (param_txt == 'param_3'){
								var area_object_particles = document.getElementById("area_object_particles");
								if (area_object_particles){		
									area_object_particles.innerHTML = "";
								}
								canvasBody.setAttribute('protect','');
								var upload_coords = document.getElementById("upload_coords");
								if (upload_coords){
									upload_coords.setAttribute('upload_coords','');
								}
							}							
						}						
					}					
				}
			}
			if (show_button == 'Да' && item_choice != '5'){
				var button_step_2 = document.getElementById("button_step_2");	
				if (button_step_2){								
					button_step_2.setAttribute('onclick','step_3();');
					button_step_2.setAttribute('class','nocsim-section3-container-cont-button');	
				}
				var level_step_3 = document.getElementById("level_step_3");	
				if (level_step_3){								
					level_step_3.setAttribute('class','nocsim-section4-container-block-cont');
					level_step_3.setAttribute('onclick','step_3();');
				}
				var level_step_2 = document.getElementById("level_step_2");	
				if (level_step_2){								
					level_step_2.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
					level_step_2.removeAttribute('onclick');
				}
			}
			if (show_button == 'Да' && item_choice == '5'){
				var button_step_2 = document.getElementById("button_step_2");	
				if (button_step_2){								
					button_step_2.setAttribute('onclick','step_2();');
					button_step_2.setAttribute('class','nocsim-section3-container-cont-button');							
				}
				var level_step_2 = document.getElementById("level_step_2");	
				if (level_step_2){	
					if (level_step_2.getAttribute('class') == 'nocsim-section4-container-block-cont no_active_level'){				
						level_step_2.setAttribute('class','nocsim-section4-container-block-cont');
						level_step_2.setAttribute('onclick','step_2();');
					}
				}
				var level_step_4 = document.getElementById("level_step_4");	
				if (level_step_4){								
					if (level_step_4.getAttribute('class') == 'nocsim-section4-container-block-cont' && param_txt != 'param_3'){
						var button_step_2 = document.getElementById("button_step_2");	
						if (button_step_2){								
							button_step_2.setAttribute('onclick','step_3();');
							button_step_2.setAttribute('class','nocsim-section3-container-cont-button');	
						}
						var level_step_3 = document.getElementById("level_step_3");	
						if (level_step_3){								
							level_step_3.setAttribute('class','nocsim-section4-container-block-cont');
							level_step_3.setAttribute('onclick','step_3();');
						}
					}
				}			
			}
			if (show_button == ''){
				var button_step_2 = document.getElementById("button_step_2");	
				if (button_step_2){								
					button_step_2.removeAttribute('onclick');
					button_step_2.setAttribute('class','nocsim-section3-container-cont-button no_active_button');						
				}
				var level_step_2 = document.getElementById("level_step_2");	
				if (level_step_2){								
					level_step_2.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
					level_step_2.removeAttribute('onclick');
				}
				var level_step_3 = document.getElementById("level_step_3");	
				if (level_step_3){								
					level_step_3.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
					level_step_3.removeAttribute('onclick');
				}
				var level_step_4 = document.getElementById("level_step_4");	
				if (level_step_4){								
					level_step_4.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
					level_step_4.removeAttribute('onclick');
				}
				var level_step_5 = document.getElementById("level_step_5");	
				if (level_step_5){								
					level_step_5.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
					level_step_5.removeAttribute('onclick');
				}
			}
			control_value_for_step_4();
		}
	}	
}
function step_2(){
	var level_step_2 = document.getElementById("level_step_2");	
	if (level_step_2){								
		level_step_2.setAttribute('class','nocsim-section4-container-block-cont current_level');
	}
	var block_steps = document.getElementById("block_steps");	
	if (block_steps){								
		var current = block_steps.getAttribute('current');
		if (current != '2'){
			var level_step = document.getElementById("level_step_"+current);	
			if (level_step){								
				level_step.setAttribute('class','nocsim-section4-container-block-cont');
			}			
			var step = document.getElementById("step_"+current);	
			if (step){								
				step.setAttribute('style','display:none;');
			}
			var step_2 = document.getElementById("step_2");	
			if (step_2){								
				step_2.removeAttribute('style');
				step_2.scrollIntoView({
					block: 'start', // если start то страница будет прокручена к началу элемента 
					behavior: 'smooth' // отвечает за плавную прокрутку
				});
			}
			block_steps.setAttribute('current','2');
			var level_step_3 = document.getElementById("level_step_3");	
			if (level_step_3){								
				level_step_3.setAttribute('class','nocsim-section4-container-block-cont');
				level_step_3.setAttribute('onclick','step_3();');
			}
			var canvasBody = document.getElementById("canvas");
			if (canvasBody){
				if (canvasBody.getAttribute('protect') == ''){
					show_topology();					
				}
			}
			control_value_for_step_2_3('');						
		}					
	}
	var level_step_5 = document.getElementById("level_step_5");	
	if (level_step_5){								
		level_step_5.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
	}	
}
function show_topology(){
	var particleAmount = '';
	var param_3 = document.getElementById("param_3");
	if (param_3){
		if (param_3.value != ''){
			particleAmount = param_3.value;
		}
	}
	if (particleAmount != ''){
		var canvas_inner = document.getElementById("canvas_inner");
		var canvasBody = document.getElementById("canvas");
		if (canvas_inner && canvasBody){
			var drawArea = canvasBody.getContext("2d");
			var delay = 200, tid;
			var area_canvas_inner = canvas_inner.getBoundingClientRect();
			let resizeReset = function() {
				w = canvasBody.width = area_canvas_inner.width;
				h = canvasBody.height = 500;
			}
			let deBouncer = function() {
				clearTimeout(tid);
				tid = setTimeout(function() {
					resizeReset();
				}, delay);
			};
			resizeReset();	
			window.addEventListener("resize", function(){
				deBouncer();
			});
			const opts = { 
				particleColor: "#000",
				defaultRadius: 10,
			};				
			ItemParticle = function(num){
				this.x = Math.round(Math.random() * w); 
				this.y = Math.round(Math.random() * h);
				var upload_coords = document.getElementById("upload_coords");
				if (upload_coords){
					if (upload_coords.getAttribute('upload_coords') == '1'){
						this.x = parseInt(upload_coords.getAttribute('x_'+num)); 
						this.y = parseInt(upload_coords.getAttribute('y_'+num)); 
					} 
				}			
				this.color = opts.particleColor;
				this.radius = opts.defaultRadius; 
				this.border = function(){ 
					if (this.x > (w-2*this.radius)) this.x = (w-2*this.radius);
					if (this.y > (h-2*this.radius)) this.y = (h-2*this.radius);
					if (this.x < 2*this.radius) this.x = 2*this.radius;
					if (this.y < 2*this.radius) this.y = 2*this.radius;	
				};				
				this.draw = function(){
					var area_object_particles = document.getElementById("area_object_particles");
					if (area_object_particles){		
						area_object_particles.innerHTML = area_object_particles.innerHTML + '<div onclick="click_particle('+num+');" oncontextmenu="contextmenu_particle('+num+');"  onmousedown="mousedown_particle('+num+',event);" ondragstart="return false;" class="item_particle" id="particle_'+num+'" style="left:'+(this.x-this.radius-2*this.radius*num)+'px;top:'+(this.y+this.radius)+'px;" x="'+this.x+'" y="'+this.y+'" count_link="0"></div>';
					}					
					drawArea.beginPath();
					drawArea.arc(this.x, this.y, this.radius, 0, Math.PI*2);
					drawArea.closePath();
					drawArea.fillStyle = this.color;
					drawArea.fill(); 
					canvasBody.setAttribute('protect','1');
				};				
			};	
			particles = [];
			for (let i = 0; i < particleAmount; i++){
				particles.push( new ItemParticle(i) );
			}
			window.requestAnimationFrame(start_draw_particles);
			function start_draw_particles(){ 
				drawArea.clearRect(0,0,w,h);
				for (let i = 0; i < particles.length; i++){
					particles[i].border();
					particles[i].draw();
					for (let j = 0; j < particles.length; j++){
						if (i != j){
							var particle_item = document.getElementById("particle_"+i);	
							if (particle_item){
								var upload_coords = document.getElementById("upload_coords");
								if (upload_coords){
									if (upload_coords.getAttribute('upload_coords') == '1'){
										if (upload_coords.getAttribute('links_'+i) != ''){
											var link_attribute = upload_coords.getAttribute('links_'+i).split('-');
											var find_link = 0;
											for (let n = 0; n < link_attribute.length; n++) {
												if (link_attribute[n] == "link_"+j){
													particle_item.setAttribute(link_attribute[n],'1');	
													find_link = 1;
													particle_item.setAttribute("count_link",parseInt(particle_item.getAttribute("count_link"))+1);	
													var first_particle_item_x = particle_item.getAttribute('x');
													var first_particle_item_y = particle_item.getAttribute('y');
													var second_particle_item = document.getElementById("particle_"+j);	
													if (second_particle_item){
														var second_particle_item_x = second_particle_item.getAttribute('x');
														var second_particle_item_y = second_particle_item.getAttribute('y');
														drawArea.lineWidth = 1;
														drawArea.strokeStyle = '#000';
														drawArea.beginPath();
														drawArea.moveTo(first_particle_item_x, first_particle_item_y);
														drawArea.lineTo(second_particle_item_x, second_particle_item_y);
														drawArea.closePath();
														drawArea.stroke();
													}
												}							
											}
											if (find_link == 0){
												particle_item.setAttribute("link_"+j,'');
											}
										} else {
											particle_item.setAttribute("link_"+j,'');
										}					
									} else {
										particle_item.setAttribute("link_"+j,'');
									}
								}							
							}
						}
					}
				}				
			}
//			console.log(particles);
//			console.log(area_canvas_inner);
		}
	}
}
function update_draw_particles(){
	var particleAmount = '';
	var param_3 = document.getElementById("param_3");
	if (param_3){
		if (param_3.value != ''){
			particleAmount = param_3.value;
		}
	}
	if (particleAmount != ''){
		var canvas_inner = document.getElementById("canvas_inner");
		var canvasBody = document.getElementById("canvas");
		if (canvas_inner && canvasBody){
			var drawArea = canvasBody.getContext("2d");
			var area_canvas_inner = canvas_inner.getBoundingClientRect();
			let resizeReset = function() {
				w = canvasBody.width = area_canvas_inner.width;
				h = canvasBody.height = 500;
			}
			const opts = { 
				particleColor: "#000",
				defaultRadius: 10,
			};
			ItemParticle = function(num){ 
				var particle_item = document.getElementById("particle_"+num);	
				if (particle_item){
					this.x = parseInt(particle_item.getAttribute('x')); 
					this.y = parseInt(particle_item.getAttribute('y'));
					this.color = opts.particleColor;
					this.radius = opts.defaultRadius; 
					this.draw = function(){
						drawArea.beginPath();
						drawArea.arc(this.x, this.y, this.radius, 0, Math.PI*2);
						drawArea.closePath();
						drawArea.fillStyle = this.color;
						drawArea.fill();
					};					
				}
			};	
			particles = [];
			for (let i = 0; i < particleAmount; i++){
				particles.push( new ItemParticle(i) );
			}
			window.requestAnimationFrame(draw_particles);	
			function draw_particles(){ 
				drawArea.clearRect(0,0,w,h);
				for (let i = 0; i < particles.length; i++){
					particles[i].draw();
					var first_particle_item = document.getElementById("particle_"+i);	
					if (first_particle_item){
						var first_particle_item_x = first_particle_item.getAttribute('x');
						var first_particle_item_y = first_particle_item.getAttribute('y');
						for (let j = 0; j < particles.length; j++){
							if (i != j){
								var particle_item = document.getElementById("particle_"+j);	
								if (particle_item){
									var first_particle_item_link = first_particle_item.getAttribute("link_"+j);
									var particle_item_x = particle_item.getAttribute('x');
									var particle_item_y = particle_item.getAttribute('y');
									var particle_item_link = particle_item.getAttribute("link_"+i);
									if (first_particle_item_link == '1' || particle_item_link == '1'){
										drawArea.lineWidth = 1;
										drawArea.strokeStyle = '#000';
										drawArea.beginPath();
										drawArea.moveTo(first_particle_item_x, first_particle_item_y);
										drawArea.lineTo(particle_item_x, particle_item_y);
										drawArea.closePath();
										drawArea.stroke();
									}
								}
							}
						}
					}						
				}								
			}			
//			console.log(particles);
//			console.log(area_canvas_inner);
		}
	}
}
function click_particle(item){
	var canvas = document.getElementById("canvas");	
	var particle_item = document.getElementById("particle_"+item);	
	if (canvas && particle_item){
		var moving = canvas.getAttribute('moving');
		if (moving == ''){
			var first_partner = canvas.getAttribute('first_partner');
			if (first_partner != ''){
				if (first_partner != item){
					var first_particle_item = document.getElementById("particle_"+first_partner);	
					if (first_particle_item){
						var first_particle_item_x = first_particle_item.getAttribute('x');
						var first_particle_item_y = first_particle_item.getAttribute('y');
						var first_particle_item_link = first_particle_item.getAttribute("link_"+item);
						var particle_item_x = particle_item.getAttribute('x');
						var particle_item_y = particle_item.getAttribute('y');
						var particle_item_link = particle_item.getAttribute("link_"+first_partner);
						if (first_particle_item_link != '1' || particle_item_link != '1'){
							var canvasBody = document.getElementById("canvas");
							if (canvasBody){
								first_particle_item.setAttribute("count_link",parseInt(first_particle_item.getAttribute("count_link"))+1);
								particle_item.setAttribute("count_link",parseInt(particle_item.getAttribute("count_link"))+1);
								var drawArea = canvasBody.getContext("2d");
								drawArea.lineWidth = 1;
								drawArea.strokeStyle = '#000';
								drawArea.beginPath();
								drawArea.moveTo(first_particle_item_x, first_particle_item_y);
								drawArea.lineTo(particle_item_x, particle_item_y);
								drawArea.closePath();
								drawArea.stroke();							
							}						
						}
						first_particle_item.setAttribute('class','item_particle');
						first_particle_item.setAttribute("link_"+item,'1');						
						particle_item.setAttribute('class','item_particle');
						particle_item.setAttribute("link_"+first_partner,'1');						
						canvas.setAttribute('first_partner','');
					}
				} else {
					particle_item.setAttribute('class','item_particle');
					canvas.setAttribute('first_partner','');												
				}  
			} else {
				var first_unpartner = canvas.getAttribute('first_unpartner');
				if (first_unpartner == ''){
					particle_item.setAttribute('class','item_particle item_particle_active');
					canvas.setAttribute('first_partner',item);
				}				
			}
		}
	}
	onMouseUp();
}
function contextmenu_particle(item){
	var canvas = document.getElementById("canvas");	
	var particle_item = document.getElementById("particle_"+item);	
	if (canvas && particle_item){
		var moving = canvas.getAttribute('moving');
		if (moving == ''){
			var first_unpartner = canvas.getAttribute('first_unpartner');
			if (first_unpartner != ''){
				if (first_unpartner != item){
					var first_particle_item = document.getElementById("particle_"+first_unpartner);	
					if (first_particle_item){
						var first_particle_item_x = first_particle_item.getAttribute('x');
						var first_particle_item_y = first_particle_item.getAttribute('y');
						var first_particle_item_link = first_particle_item.getAttribute("link_"+item);
						var particle_item_x = particle_item.getAttribute('x');
						var particle_item_y = particle_item.getAttribute('y');
						var particle_item_link = particle_item.getAttribute("link_"+first_unpartner);
						if (first_particle_item_link == '1' || particle_item_link == '1'){
							first_particle_item.setAttribute("count_link",parseInt(first_particle_item.getAttribute("count_link"))-1);
							particle_item.setAttribute("count_link",parseInt(particle_item.getAttribute("count_link"))-1);
							update_draw_particles();
						}
						first_particle_item.setAttribute('class','item_particle');
						first_particle_item.setAttribute("link_"+item,'');
						particle_item.setAttribute('class','item_particle');
						particle_item.setAttribute("link_"+first_unpartner,'');
						canvas.setAttribute('first_unpartner','');
					}
				} else {
					particle_item.setAttribute('class','item_particle');
					canvas.setAttribute('first_unpartner','');				
				}  
			} else {
				var first_partner = canvas.getAttribute('first_partner');
				if (first_partner == ''){
					particle_item.setAttribute('class','item_particle item_particle_inactive');
					canvas.setAttribute('first_unpartner',item);
				}							
			}
		}
	}
	onMouseUp();	
}
function onMouseUp(){
	var canvas = document.getElementById("canvas");	
	if (canvas){
		canvas.setAttribute('item','');
		canvas.setAttribute('x','');
		canvas.setAttribute('y','');
		canvas.setAttribute('moving','');		
	}	
}
function mousedown_particle(item, event){
	var canvas = document.getElementById("canvas");
	var particle_item = document.getElementById("particle_"+item);	
	if (canvas && particle_item){
		var shift_moveX = event.pageX - parseInt(particle_item.getAttribute('x')); 
		var shift_moveY = event.pageY - parseInt(particle_item.getAttribute('y'));
		canvas.setAttribute('item',item);
		canvas.setAttribute('x',shift_moveX);
		canvas.setAttribute('y',shift_moveY);		
	}	 
}
function onMouseMove(event) {
	var canvas = document.getElementById("canvas");
	if (canvas){
		var item = canvas.getAttribute('item');
		var x = canvas.getAttribute('x');
		var y = canvas.getAttribute('y');
		if (item != '' && x != '' && y != ''){	
			canvas.setAttribute('moving','yes');
			var radius = 10;
			var num = parseInt(item);
			var particle_item = document.getElementById("particle_"+item);	
			if (particle_item){
				var particalX = event.pageX - parseInt(x); 
				var particalY = event.pageY - parseInt(y);
				particle_item.setAttribute('x',particalX);
				particle_item.setAttribute('y',particalY);				
				particle_item.setAttribute('style','left:'+(particalX-radius-2*radius*num)+'px;top:'+(particalY+radius)+'px;');
				var shift_moveX = event.pageX - parseInt(particle_item.getAttribute('x')); 
				var shift_moveY = event.pageY - parseInt(particle_item.getAttribute('y'));
				canvas.setAttribute('x',shift_moveX);
				canvas.setAttribute('y',shift_moveY);
				update_draw_particles();
			}
		}
	}
}
function choice_sim_param_3(choice_item){
	let all_is_block_inner_item = null;
	var elem_is_block_inner_item;		
	all_is_block_inner_item = [...document.querySelectorAll('.is-block-inner-item_param_3')];
	all_is_block_inner_item.forEach((elem) => {
		elem_is_block_inner_item = elem.getAttribute('id');
		if (elem_is_block_inner_item == 'choice_sim_param_3_'+choice_item) {
			elem.setAttribute('class','is-block-inner-item_param_3 is-block-inner-item--active');
			var sim_param_3 = document.getElementById("sim_param_3");	
			if (sim_param_3){
				var value_sim_param_3 = document.getElementById("value_sim_param_3_"+choice_item);	
				if (value_sim_param_3){
					sim_param_3.innerHTML = value_sim_param_3.innerHTML; 
				}					
				control_value_for_step_4();	
			}
		} else {
			elem.setAttribute('class','is-block-inner-item_param_3');
		}	
	});
}
function choice_sim_param_8(choice_item){
	let all_is_block_inner_item = null;
	var elem_is_block_inner_item;		
	all_is_block_inner_item = [...document.querySelectorAll('.is-block-inner-item_param_8')];
	all_is_block_inner_item.forEach((elem) => {
		elem_is_block_inner_item = elem.getAttribute('id');
		if (elem_is_block_inner_item == 'choice_sim_param_8_'+choice_item) {
			elem.setAttribute('class','is-block-inner-item_param_8 is-block-inner-item--active');
			var sim_param_8 = document.getElementById("sim_param_8");	
			if (sim_param_8){
				var value_sim_param_8 = document.getElementById("value_sim_param_8_"+choice_item);	
				if (value_sim_param_8){
					sim_param_8.innerHTML = value_sim_param_8.innerHTML; 
				}					
				control_value_for_step_4();	
			}
		} else {
			elem.setAttribute('class','is-block-inner-item_param_8');
		}	
	});
}
function control_value_for_step_4(input){
	var show_button = '';
	var sim_param_1 = document.getElementById("sim_param_1");
	var sim_param_2 = document.getElementById("sim_param_2");	
	var sim_param_3 = document.getElementById("sim_param_3");
	var sim_param_4 = document.getElementById("sim_param_4");		
	var sim_param_5 = document.getElementById("sim_param_5");	
	var sim_param_6 = document.getElementById("sim_param_6");	
	var sim_param_7 = document.getElementById("sim_param_7");	
	var sim_param_8 = document.getElementById("sim_param_8");		
	if (sim_param_1 && sim_param_2 && sim_param_3 && sim_param_4 && sim_param_5 && sim_param_6 && sim_param_7 && sim_param_8){								
		if (sim_param_1.value != '' && sim_param_2.value != '' && sim_param_3.innerHTML != '' && sim_param_4.value != '' && sim_param_5.value != '' && sim_param_6.value != '' && sim_param_7.value != '' && sim_param_8.innerHTML != ''){
			var level_step_3 = document.getElementById("level_step_3");	
			if (level_step_3){								
				if (level_step_3.getAttribute('class') != 'nocsim-section4-container-block-cont no_active_level'){
					show_button = 'Да';
				}
			}
		}
	}
	if (show_button == 'Да'){
		var button_step_4 = document.getElementById("button_step_4");	
		if (button_step_4){								
			button_step_4.setAttribute('onclick','step_4();');
			button_step_4.setAttribute('class','nocsim-section3-container-cont-button');
		}
		var level_step_4 = document.getElementById("level_step_4");	
		if (level_step_4){								
			level_step_4.setAttribute('class','nocsim-section4-container-block-cont');
			level_step_4.setAttribute('onclick','step_4();');
		}
	}
	if (show_button == ''){
		var button_step_4 = document.getElementById("button_step_4");	
		if (button_step_4){								
			button_step_4.removeAttribute('onclick');
			button_step_4.setAttribute('class','nocsim-section3-container-cont-button no_active_button');						
		}
		var level_step_4 = document.getElementById("level_step_4");	
		if (level_step_4){								
			level_step_4.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
			level_step_4.removeAttribute('onclick');
		}
		var level_step_5 = document.getElementById("level_step_5");	
		if (level_step_5){								
			level_step_5.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
			level_step_5.removeAttribute('onclick');
		}		
	}
}	
function upload_file() {
	var file;
	var div_user_file = document.getElementById('input_xml_file');
	if (div_user_file){
		file = div_user_file.files;
		if( typeof file != 'undefined' ) {
			var button_upload_params = document.getElementById("button_upload_params");
			if (button_upload_params){	
				button_upload_params.innerHTML = 'Загрузка...';
				button_upload_params.setAttribute('style','background-color:#ddd;');			
			}
			var data = new FormData();
			var count_new_files = 0;
			$.each( file, function( key, value ){
				data.append( key, value );
				count_new_files = key + 1;
			});
			data.append( 'count_new_files', count_new_files );
			$.ajax({
				url: '/ajax/upload_files.php',
				type: 'POST',
				data        : data,
				cache       : false,
				dataType    : 'json',
				beforeSend	: function() {},
				// отключаем обработку передаваемых данных, пусть передаются как есть
				processData : false,
				// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
				contentType : false,
				success: function(Data){
//					console.log(Data);
					var button_upload_params = document.getElementById("button_upload_params");
					if (button_upload_params){	
						button_upload_params.innerHTML = 'Загрузить из файла';
						button_upload_params.removeAttribute('style');			
					}
					if (Data['error'] == '' ){
						var error_text = document.getElementById("error_uploading_file_1");								
						if (error_text){
							error_text.innerHTML = '';
						}
						var error_text = document.getElementById("error_uploading_file_3");								
						if (error_text){
							error_text.innerHTML = '';
						}
						var uploading_file = document.getElementById("uploading_file");
						if (uploading_file){	
							uploading_file.innerHTML = Data['randomString'];												
						}
						if (Data['choice_topology'] == 'Mesh'){choice_network(1);}
						if (Data['choice_topology'] == 'Torus'){choice_network(2);}
						if (Data['choice_topology'] == 'Circulant'){choice_network(3);}
						if (Data['choice_topology'] == 'CirculantOpt'){choice_network(4);}
						if (Data['choice_topology'] == 'ArbitraryTopology'){
							choice_network(5);
							var upload_coords = document.getElementById("upload_coords");
							if (upload_coords){
								for (let i = 0; i < Data['coords_x'].length; i++){
									upload_coords.setAttribute("x_"+i,Data['coords_x'][i]);
								}
								for (let i = 0; i < Data['coords_y'].length; i++){
									upload_coords.setAttribute("y_"+i,Data['coords_y'][i]);
								}
								for (let i = 0; i < Data['links'].length; i++){
									var link_particle = '';
									for (let j = 0; j < Data['links'][i].length; j++){
										if (link_particle == ''){
											link_particle = 'link_'+Data['links'][i][j];
										} else {
											link_particle = link_particle+'-link_'+Data['links'][i][j];
										}
									}
									upload_coords.setAttribute("links_"+i,link_particle);									
								}
								var canvasBody = document.getElementById("canvas");
								if (canvasBody){
									var area_object_particles = document.getElementById("area_object_particles");
									if (area_object_particles){		
										area_object_particles.innerHTML = "";
									}
									canvasBody.setAttribute('protect','');
								}
								upload_coords.setAttribute('upload_coords','1');								
							}					
						}
						var input_param_1 = document.getElementById("param_1");
						var input_param_2 = document.getElementById("param_2");
						var input_param_3 = document.getElementById("param_3");
						var input_param_4 = document.getElementById("param_4");
						var input_param_5 = document.getElementById("param_5");
						var input_value_param_6 = document.getElementById("value_param_6");
						var input_param_7 = document.getElementById("param_7");
						var input_param_8 = document.getElementById("param_8");
						var input_param_9 = document.getElementById("param_9");	
						var input_sim_param_1 = document.getElementById("sim_param_1");		
						var input_sim_param_2 = document.getElementById("sim_param_2");		
						var input_sim_param_3 = document.getElementById("sim_param_3");		
						var input_sim_param_4 = document.getElementById("sim_param_4");	
						var input_sim_param_5 = document.getElementById("sim_param_5");		
						var input_sim_param_6 = document.getElementById("sim_param_6");		
						var input_sim_param_7 = document.getElementById("sim_param_7");		
						var input_sim_param_8 = document.getElementById("sim_param_8");								
						if (input_param_1 && input_param_2 && input_param_3 && input_param_4 && input_param_5 && input_value_param_6 && input_param_7 && input_param_8 && input_param_9 && input_sim_param_1 && input_sim_param_2 && input_sim_param_3 && input_sim_param_4 && input_sim_param_5 && input_sim_param_6 && input_sim_param_7 && input_sim_param_8){	
							input_param_1.value = Data['param_1'];
							input_param_1.setAttribute('value',Data['param_1']);
							input_param_2.value = Data['param_2'];
							input_param_2.setAttribute('value',Data['param_2']);
							input_param_3.value = Data['param_3'];
							input_param_3.setAttribute('value',Data['param_3']);
							input_param_4.value = Data['param_4'];
							input_param_4.setAttribute('value',Data['param_4']);
							input_param_5.value = Data['param_5'];
							input_param_5.setAttribute('value',Data['param_5']);
							if (Data['param_6'] == 'Dijkstra'){choice_name_algoritm(1);}
							if (Data['param_6'] == 'PO'){choice_name_algoritm(2);}
							if (Data['param_6'] == 'ROU'){choice_name_algoritm(3);}
							input_param_7.value = Data['param_7'];
							input_param_7.setAttribute('value',Data['param_7']);
							input_param_8.value = Data['param_8'];
							input_param_8.setAttribute('value',Data['param_8']);
							input_param_9.value = Data['param_9'];
							input_param_9.setAttribute('value',Data['param_9']);
							input_sim_param_1.value = Data['sim_param_1'];
							input_sim_param_1.setAttribute('value',Data['sim_param_1']);
							input_sim_param_2.value = Data['sim_param_2'];
							input_sim_param_2.setAttribute('value',Data['sim_param_2']);
							if (Data['sim_param_3'] == 'true'){choice_sim_param_3(1);}
							if (Data['sim_param_3'] == 'false'){choice_sim_param_3(2);}
							input_sim_param_4.value = Data['sim_param_4'];
							input_sim_param_4.setAttribute('value',Data['sim_param_4']);
							input_sim_param_5.value = Data['sim_param_5'];
							input_sim_param_5.setAttribute('value',Data['sim_param_5']);
							input_sim_param_6.value = Data['sim_param_6'];
							input_sim_param_6.setAttribute('value',Data['sim_param_6']);
							input_sim_param_7.value = Data['sim_param_7'];
							input_sim_param_7.setAttribute('value',Data['sim_param_7']);
							if (Data['sim_param_8'] == 'true'){choice_sim_param_8(1);}
							if (Data['sim_param_8'] == 'false'){choice_sim_param_8(2);}								
						}
						control_value_for_step_2_3('');											
					} else {
						var block_steps = document.getElementById("block_steps");	
						if (block_steps){								
							var current = block_steps.getAttribute('current');
							if (current == '1'){
								var error_text = document.getElementById("error_uploading_file_1");								
								if (error_text){
									error_text.innerHTML = Data['error'];
								}
							}
							if (current == '3'){
								var error_text = document.getElementById("error_uploading_file_3");								
								if (error_text){
									error_text.innerHTML = Data['error'];
								}
							}
						}
					} 						
				},
				error: function(Data){
//					console.log(Data);
				},
			});
		} 
	}					
}
function step_3(){
	var level_step_3 = document.getElementById("level_step_3");	
	if (level_step_3){								
		level_step_3.setAttribute('class','nocsim-section4-container-block-cont current_level');
	}
	var block_steps = document.getElementById("block_steps");	
	if (block_steps){								
		var current = block_steps.getAttribute('current');
		if (current != '3'){
			var level_step = document.getElementById("level_step_"+current);	
			if (level_step){								
				level_step.setAttribute('class','nocsim-section4-container-block-cont');
			}			
			var step = document.getElementById("step_"+current);	
			if (step){								
				step.setAttribute('style','display:none;');
			}
			var step_3 = document.getElementById("step_3");	
			if (step_3){								
				step_3.removeAttribute('style');
				step_3.scrollIntoView({
					block: 'start', // если start то страница будет прокручена к началу элемента 
					behavior: 'smooth' // отвечает за плавную прокрутку
				});
			}
			block_steps.setAttribute('current','3');				
		}					
	}
	var level_step_5 = document.getElementById("level_step_5");	
	if (level_step_5){								
		level_step_5.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
	}	
}
function step_4(){
	var level_step_4 = document.getElementById("level_step_4");	
	if (level_step_4){								
		level_step_4.setAttribute('class','nocsim-section4-container-block-cont current_level');
	}
	var block_steps = document.getElementById("block_steps");	
	if (block_steps){								
		var current = block_steps.getAttribute('current');
		if (current != '4'){
			var level_step = document.getElementById("level_step_"+current);	
			if (level_step){								
				level_step.setAttribute('class','nocsim-section4-container-block-cont');
			}			
			var step = document.getElementById("step_"+current);	
			if (step){								
				step.setAttribute('style','display:none;');
			}				
			block_steps.setAttribute('current','4');
			var input_choice_topology = document.getElementById("choice_topology");
			var input_number_topology = document.getElementById("number_topology");
			var input_param_1 = document.getElementById("param_1");
			var input_param_2 = document.getElementById("param_2");
			var input_param_3 = document.getElementById("param_3");
			var input_param_4 = document.getElementById("param_4");
			var input_param_5 = document.getElementById("param_5");
			var input_param_6 = document.getElementById("value_param_6");
			var input_param_7 = document.getElementById("param_7");
			var input_param_8 = document.getElementById("param_8");
			var input_param_9 = document.getElementById("param_9");
			var sim_param_1 = document.getElementById("sim_param_1");
			var sim_param_2 = document.getElementById("sim_param_2");	
			var sim_param_3 = document.getElementById("sim_param_3");
			var sim_param_4 = document.getElementById("sim_param_4");		
			var sim_param_5 = document.getElementById("sim_param_5");	
			var sim_param_6 = document.getElementById("sim_param_6");	
			var sim_param_7 = document.getElementById("sim_param_7");	
			var sim_param_8 = document.getElementById("sim_param_8");
			var uploading_file = document.getElementById("uploading_file");
			if (input_choice_topology && input_number_topology && input_param_1 && input_param_2 && input_param_3 && input_param_4 && input_param_5 && input_param_6 && input_param_7 && input_param_8 && input_param_9 && sim_param_1 && sim_param_2 && sim_param_3 && sim_param_4 && sim_param_5 && sim_param_6 && sim_param_7 && sim_param_8 && uploading_file){	
				var data = new FormData();				
				data.append( 'choice_topology', input_choice_topology.innerHTML );
				data.append( 'number_topology', input_number_topology.innerHTML );
				data.append( 'param_1', input_param_1.value );
				data.append( 'param_2', input_param_2.value );
				data.append( 'param_3', input_param_3.value );
				data.append( 'param_4', input_param_4.value );
				data.append( 'param_5', input_param_5.value );
				data.append( 'param_6', input_param_6.innerHTML );
				data.append( 'param_7', input_param_7.value );
				data.append( 'param_8', input_param_8.value );
				data.append( 'param_9', input_param_9.value );
				data.append( 'sim_param_1', sim_param_1.value );
				data.append( 'sim_param_2', sim_param_2.value );
				if (sim_param_3.innerHTML == 'ДА'){
					data.append( 'sim_param_3', 'true' );
				}
				if (sim_param_3.innerHTML == 'НЕТ'){
					data.append( 'sim_param_3', 'false' );
				}
				data.append( 'sim_param_4', sim_param_4.value );
				data.append( 'sim_param_5', sim_param_5.value );
				data.append( 'sim_param_6', sim_param_6.value );
				data.append( 'sim_param_7', sim_param_7.value );
				if (sim_param_8.innerHTML == 'ДА'){
					data.append( 'sim_param_8', 'true' );
				}
				if (sim_param_8.innerHTML == 'НЕТ'){
					data.append( 'sim_param_8', 'false' );
				}
				data.append( 'uploading_file', uploading_file.innerHTML );
				if (input_number_topology.innerHTML == '5' && input_param_3.value != ''){
					for (let i = 0; i < input_param_3.value; i++){
						var particle_item = document.getElementById("particle_"+i);
						if (particle_item){
							var count_link = '';
							var coords_x = particle_item.getAttribute('x');
							var coords_y = particle_item.getAttribute('y');
							for (let j = 0; j < input_param_3.value; j++){
								var link_particle_item = particle_item.getAttribute('link_'+j);
								if (link_particle_item == '1'){
									if (count_link == ''){
										count_link = count_link + j;
									} else {
										count_link = count_link + '_' + j;
									}
								}
							}
							data.append( 'coords_x_'+i, coords_x );
							data.append( 'coords_y_'+i, coords_y );
							data.append( 'particle_'+i, count_link );
						}
					}					
				}
				$.ajax({
					url: '/ajax/create_xml_files.php',
					type: 'POST',
					data        : data,
					cache       : false,
					dataType    : 'json',
					beforeSend	: function() {},
					// отключаем обработку передаваемых данных, пусть передаются как есть
					processData : false,
					// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
					contentType : false,
					success: function(Data){
//						console.log(Data);
						if (Data['file_xml'] != '' && Data['randomString'] != '' && Data['save_xml_file_path'] != ''){
							var text_xml_file = document.getElementById("text_xml_file");	
							if (text_xml_file){								
								text_xml_file.innerHTML = Data['file_xml'];
							}
							var save_file = document.getElementById("save_file");	
							if (save_file){								
								save_file.innerHTML = Data['randomString'];
							}
							var button_save_xml_file = document.getElementById("button_save_xml_file");	
							if (button_save_xml_file){								
								button_save_xml_file.setAttribute('href',Data['save_xml_file_path']);
								button_save_xml_file.setAttribute('download','');
							}
							var button_step_5 = document.getElementById("button_step_5");	
							if (button_step_5){								
								button_step_5.setAttribute('onclick','simulation();');
								button_step_5.setAttribute('class','nocsim-section3-container-cont-button');						
							}
							var step_4 = document.getElementById("step_4");	
							if (step_4){								
								step_4.removeAttribute('style');
								step_4.scrollIntoView({
									block: 'start', // если start то страница будет прокручена к началу элемента 
									behavior: 'smooth' // отвечает за плавную прокрутку
								});
							}							
						}
					},
					error: function(Data){
//						console.log(Data);
					},
				});					
			}
		}
	} 
	var level_step_5 = document.getElementById("level_step_5");	
	if (level_step_5){								
		level_step_5.setAttribute('class','nocsim-section4-container-block-cont no_active_level');
	}
}
function info_help(){
	var current_offsetY = window.pageYOffset;
	document.body.style.position = 'fixed';	
	document.body.style.top = '-'+current_offsetY+'px';
	var wh = document.body.clientWidth; // ширина
	if (wh<440){
		var width_content_modal_window = document.getElementById("width_content_modal_window");
		if (width_content_modal_window){
			width_content_modal_window.removeAttribute('style');													
		}
	}
	var section_content_modal_window = document.getElementById("content_modal_window");
	if (section_content_modal_window){
		section_content_modal_window.removeAttribute('style');													
	}	
}
function close_content_modal_window() {
	var current_offsetY =  document.body.style.top;
	document.body.style.position = '';
	document.body.style.top = '';
	window.scrollTo(0, parseInt(current_offsetY || '0') * -1);
	var section_content_modal_window = document.getElementById("content_modal_window");
	if (section_content_modal_window){
		section_content_modal_window.setAttribute('style','display:none;');													
	}	
}
function simulation(){
	var file_name = '';
	var save_file = document.getElementById("save_file");	
	if (save_file){								
		file_name = save_file.innerHTML;
	}
	var data = new FormData();				
	data.append( 'file_name', file_name );
	$.ajax({
		url: '/ajax/simulation.php',
		type: 'POST',
		data        : data,
		cache       : false,
		dataType    : 'json',
		beforeSend	: function() {},
		// отключаем обработку передаваемых данных, пусть передаются как есть
		processData : false,
		// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
		contentType : false,
		success: function(Data){
			console.log(Data);
			if (Data['result'] != '' && Data['save_result_file_path'] != ''){
				var text_result = document.getElementById("text_result");	
				if (text_result){								
					text_result.innerHTML = Data['result'];
				}
				var button_save_result_file = document.getElementById("button_save_result_file");	
				if (button_save_result_file){								
					button_save_result_file.setAttribute('href',Data['save_result_file_path']);
					button_save_result_file.setAttribute('download','');
				}
				var level_step_4 = document.getElementById("level_step_4");	
				if (level_step_4){								
					level_step_4.setAttribute('class','nocsim-section4-container-block-cont');
				}
				var step_4 = document.getElementById("step_4");	
				if (step_4){								
					step_4.setAttribute('style','display:none;');
				}
				var level_step_5 = document.getElementById("level_step_5");	
				if (level_step_5){								
					level_step_5.setAttribute('class','nocsim-section4-container-block-cont current_level');
				}
				var block_steps = document.getElementById("block_steps");	
				if (block_steps){								
					block_steps.setAttribute('current','5');
				}
				var step_5 = document.getElementById("step_5");	
				if (step_5){								
					step_5.removeAttribute('style');
					step_5.scrollIntoView({
						block: 'start', // если start то страница будет прокручена к началу элемента 
						behavior: 'smooth' // отвечает за плавную прокрутку
					});
				}							
			}			
		},
		error: function(Data){
//			console.log(Data);
		},
	});
}