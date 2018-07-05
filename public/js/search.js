var input = document.getElementById("search");
var form = document.getElementById("search-form");

input.oninput = function() {
	function func () {
	var sel = document.getElementById("#list-search-form");
		$('#list-search-form').css('display', 'none');
		 console.log(sel);
	}
	if (input.value.length == 0) {
		setTimeout(func, 100);
	}
	if (input.value.length > 2) {
		$.ajax( {
			url: "/main/index/",
			type: "POST",
			data: ({input: input.value, is_ajax: 1}),
			dataType: "html",
			success: function (data) {
        		var searchTag = $.parseJSON(data);

        		if (searchTag.length == 1 ) {
        			$('#list-search-form option').detach();
        			$('#list-search-form').css('display', 'none');
        			$('#search').val('');
        			$('#search').val(searchTag[0]['tag_name']);
        			$("#search-form").attr("action", "/main/tag?tag=" + searchTag[0]['tag_name']);
        			var option = document.createElement("option");
        			option.setAttribute('value', '/main/tag?tag=' + searchTag[0]['tag_name']);
    				option.innerHTML = searchTag[0]['tag_name'];
    				$("#list-search-form").append(option);
        		}

        		if (searchTag.length > 5) {
        			searchTag.splice(5, searchTag.length - 1);
        		}

        		if (searchTag.length > 1) {
	        		$('#list-search-form option').detach();
	    			for (var i = searchTag.length - 1; i >= 0; i--) {

	    				$('#list-search-form').css('display', 'block');
	    				var option = document.createElement("option");
	    				option.setAttribute('value', '/main/tag?tag=' + searchTag[i]['tag_name']);
	    				option.innerHTML = searchTag[i]['tag_name'];
	    				$("#list-search-form").append(option);

	    				console.log(searchTag.length + " ");
	    			}

	        		console.log("больше одного тега");
        		}
        		if (searchTag.length == 0) {
        			$('#list-search-form option').detach();
        			$('#list-search-form').css('display', 'block');
	    			var option = document.createElement("option");
	    			option.innerHTML = "Такого тега нет";
	    			$("#list-search-form").append(option)
        		}

			},
			error: function (data) {
				console.log("что-то пошло не так");
			}
		});
	}	
};
function fuu () {
	$('#search').val('');
}