$('.options').click(function(){
	let elem = $(this).attr('class');
	let id = $(this).attr('data');

	if(elem === 'options'){
		$(this).addClass('active');
		$(this).removeClass('options');

		$.ajax({
			url: '../inc/add_star.php',
			type: 'post',
			data: {'id':id},
			success: function(data){
				
			},
			error: function(){
				alert("Ошибка данных!");
			}
		});
	}

	if(elem === 'active'){
		$(this).addClass('options');
		$(this).removeClass('active');

		$.ajax({
			url: '../inc/del_star.php',
			type: 'post',
			data: {'id':id},
			success: function(data){
			},
			error: function(){
				
			}
		});
	}
})


$('.active').click(function(){
	let elem = $(this).attr('class');
	let id = $(this).attr('data');

	if(elem === 'options'){
		$(this).addClass('active');
		$(this).removeClass('options');

		$.ajax({
			url: '../inc/add_star.php',
			type: 'post',
			data: {'id':id},
			success: function(data){
				
			},
			error: function(){
				alert("Ошибка данных!");
			}
		});
	}

	if(elem === 'active'){
		$(this).addClass('options');
		$(this).removeClass('active');

		$.ajax({
			url: '../inc/del_star.php',
			type: 'post',
			data: {'id':id},
			success: function(data){
			},
			error: function(){
				
			}
		});
	}
})