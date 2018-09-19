$(document).ready(function(){
	getArticles();
	
	$("#formToSend").submit(function() 
	{
		$.ajax({
			type: "POST",
			url: "res.php",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function() {
				alert("Статья успешно добавлена");
				getArticles();
			},
			error: function(){
				alert("ajax failed");
			}
		});
		
		
		return false;
	});
	
	var ids = [];
	
	function getArticles(){
		$.ajax({
			type: "POST",
			url: "get.php",
			success: function(data){
				data = JSON.parse(data);
				$.each(data, function(i, item){
					if ($.inArray(item.article_id, ids) == -1)
					{
						ids.push(item.article_id);
						$("ul").append("<li id=" +item.article_id+">" + item.articleName + "</li>" + "<br>");
					}
				});
			},
			error: function(){
				alert("ajax failed");
			}
		});
		return false;
	}


	$('body').on('click', 'li', function() {
		$("#rightBelow").empty();
		$("#rightBelow").append("<h2>Подробнее</h2>");
		getClickId = ($(this).attr("id"));	
		$.ajax({
			type: "POST",
			url: "get.php",
			success: function(data){
				data = JSON.parse(data);
				$.each(data, function(i, item){
					if (item.article_id == getClickId){
						ids.push(item.article_id);
						$("#rightBelow").append("<h1>" + item.articleName + "</h1><p>" + item.articlePreview + "</p>" );
					}
				});
			},
			error: function(){
				alert("ajax failed");
			}
		});
		return false;
	});
	
	
	
	
});    