<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DOMDocument</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>		
<body>
	<div class="container list-quiz">
		<h1 class="page-header">Tổng hợp tin tức thể thao - DOMDocument</h1>
		<div class="row my-content">
			<ul class="nav nav-pilis nav-justified">
				<li class="actived"><a href="#vnexpress1" data-toggle="tab">VnExpress Cách 1</a></li>
				<li><a href="#vnexpress2" data-toggle="tab">VnExpress Cách 2</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div id="vnexpress1" class="tab-pane fade in active"></div>
				<div id="vnexpress2" class="tab-pane fade"></div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var loadDT = false;
		$(document).ready(function(){
			$('#vnexpress1').load('load-data.php', {'type': 'vnexpress1'});
			$('a[href=#vnexpress2]').click(function(){
				if(loadDT == false){
					$('#vnexpress2').load('load-data.php', {'type': 'vnexpress2'});
				}
				loadDT = true;
			});
		});
	</script>
</body>
</html>