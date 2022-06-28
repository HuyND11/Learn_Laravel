<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car: {{$car['id']}}</title>
</head>
<body>
    <h1>Car {{$car['id']}}</h1>
    <ul>
        <li>description: {{$car['description']}}</li>
        <li>Model: {{$car['model']}}</li>
        <li>Produced On: {{$car['produced_on']}}</li>
        <li><img src="{{url($car['image'])}}" alt="{{url($car['image'])}}" /></li>
    </ul>
</body>
</html>