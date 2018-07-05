function ratePluse (data, id) 
{
	var count_like = $('#count-'+id).html();
	count_like++;
	var a = ajax_rate('plus', data, count_like);
	// alert("yes");
}

function rateMinus (data, id) 
{
	var count_like = $('#count-'+id).html() - 1;
	var a = ajax_rate('minus', data, count_like);
}

function ajax_rate (dat, data, counter) 
{
	
	$.ajax({
		url: location.pathname + location.search,
		type: "POST",
		data: ({
			ajax_rate: 1,
			id: data,
			rate: dat,
			count_likes: counter
		}),
		dataType: 'html',
		success: function (data) 
		{
			var dec = $.parseJSON(data);
			
			// console.log(counter);
			// $('.count').html(count + 1);
			console.log(dec);
		},
		error: function (data) {
        	console.log('Error', data);
    	}
	});
}

function sendComment (data)
{
	var elem = document.getElementById("text-comment");
	var text = elem.value;

	if (text == '') 
	{
		$("#error").html("Комментарий не может быть без текста!");
		return;
	}

	if (text.length < 2) 
	{
		$("#error").html("Комментарий не может быть короче 2-х символов!");
		return;
	}

	$.ajax({
		url: location.pathname + location.search,
		type: "POST",
		data: ({text: text, is_ajax: 1, id: data}),
		dataType: 'html',
		success: function (data) 
		{
			var dec = $.parseJSON(data);

			console.log(dec[dec.length - 1]);
		},
		error: function (data) {
        	console.log('Error', data);
    	}
	});
}