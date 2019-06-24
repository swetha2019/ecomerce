<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>This is confirmation message . You are mail was confirmed</h1>

<a href="{{route('sendMailDone','$user->email','$user->verifiedToken')}}">click here</a>
</body>
</html>