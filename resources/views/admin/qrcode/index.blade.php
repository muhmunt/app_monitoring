<!DOCTYPE html>
<html>
<head>
	<title>Print Qr Code</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
 
 	<div style="text-align:center;font-size:1rem">
		{{$nis}}
	 </div>
	<div style="text-align:center;margin-top:10px" >
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(200)->generate($nis.str_slug($nama).$jk)) }} ">        
    </div>
 
</body>
</html>