<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    {!! Form::open([]) !!}

    {!! Form::text('name', @$name) !!}

    {!! Form::password('password') !!}

    {!! Form::submit('Send') !!}

    {!! Form::close() !!}

</body>
</html>