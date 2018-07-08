function some ()
{
	var params = window
    .location
    .search
    .replace('?','')
    .split('&')
    .reduce(
        function(p,e){
            var a = e.split('=');
            p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
            return p;
        },
        {}
    );
	var hits = $("#hits").html();
	hits++;
	var id = params['id'];
	$.ajax({
		url: '/news/index/',
		type: "POST",
		data: ({ hits_ajax: 1, hits: hits, id: id }),
		dataType: "html",
		success: function (data)
		{

		},
		error: function (data)
		{
			console.log('Error', data);
		}
	});

}
var timerId=setInterval("some()", 10000);
setTimeout(function() {clearInterval(timerId)}, 11000);

function randSome() 
{
	var randVal = Math.random() * (5 - 1) + 1;
	randVal = Math.floor(randVal);

	var read = $("#nowRead").val('');
	$("#nowRead").html("Сейчас читают: " + randVal);
}

var timer = setInterval("randSome()", 3000);

