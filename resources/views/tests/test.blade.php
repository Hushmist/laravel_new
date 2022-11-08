<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="test/post" method="GET">
		@csrf
		
		<select name="user_cars[]" multiple="multiple" size="4">
		  <option value="1">Nissan</option>
		  <option value="2">Toyota</option>
		  <option value="3">BMW</option>
		  <option value="4">Wolksvagen</option>
		  <option value="5">Skoda</option>
		  <option value="6">Mercedes-Benz</option>
		</select>
		<button>Submit</button>
	</form>
</body>
</html>