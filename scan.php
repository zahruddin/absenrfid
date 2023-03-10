<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="lain/jquery/jquery.min.js"></script>
	<title>Scan Kartu</title>

	<!-- scanning membaca kartu RFID -->
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function(){
				$("#cekkartu").load('teskirim.php')
			}, 2000);
		});	
	</script>

</head>
<body>

	<!-- isi -->
	<div class="container-fluid" style="padding-top: 10%">
		<div id="cekkartu"></div>
	</div>
	<br>

</body>
</html>