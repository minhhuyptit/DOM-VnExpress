

var itemsPerPage = 3;
var totalPages   = 0;
var totalItems   = 0;
var currentPage  = 1;

$(document).ready(function(){
	init();
	$('#slbPages').change(function(){
		currentPage =  $(this).val();
		setPageInfo();
		loadData(currentPage);
	})

	$('.goPrevious').click(function(){
		if(currentPage != 1){
			currentPage--;
			setPageInfo();
			loadData(currentPage);
		}
	});

	$('.goNext').click(function(){
		if(currentPage != totalPages){
			currentPage++
			setPageInfo();
			loadData(currentPage+1);
		}
	});
});

function init(){
	$.ajax({
		'url'		: 'load-data.php',
		'data'		: {'type': 'count', 'items': itemsPerPage},
		'type'		: 'POST',
		'dataType'	: 'json',
	}).done(function(data){
		totalPages = data.totalPages;
		totalItems = data.totalItems;
		setPageInfo(); 
		for (var i = 1; i <= totalPages; i++) {
			$('#slbPages').append('<option value="'+i+'">Page '+i+'</option>');
		}
		loadData(currentPage);
	});
}


function setPageInfo(){
	$('.pageInfo').text('Page '+currentPage+' of ' + totalPages);
	$('#slbPages').val(currentPage);
	if(currentPage == 1){
		$('.goPrevious').attr('disabled','disabled');
	}else{
		$('.goPrevious').removeAttr('disabled');
	}
	if(currentPage == totalPages){
		$('.goNext').attr('disabled','disabled');
	}else{
		$('.goNext').removeAttr('disabled');
	}
}

function loadData(page){
	$.ajax({
		'url'		: 'load-data.php',
		'data'		: {'type': 'list', 'page': currentPage, 'items':itemsPerPage},
		'type'		: 'POST',
		'dataType'	: 'json',
	}).done(function(data){
		if(data.length > 0){
			$('.content-course').empty();
			var xhtml = '';
			$.each(data, function(){
				xhtml += '<div class="media">';
				xhtml +=	'<a class="pull-left" href="#"><img class="media-object" src="data/'+this.image+'"></a>';
				xhtml +=	'<div class="media-body">';
				xhtml +=		'<h4 class="media-heading">'+this.name+'</h4>' + this.description;
				xhtml +=	'</div>'
				xhtml += '</div>';
			});
			$('.content-course').append(xhtml);
		}
	});
}
