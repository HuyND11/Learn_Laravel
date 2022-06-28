
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All car</h1>
    <a  href="/cars/create">Create</a>
    <table >
        <thead>
            <tr>
                <th>NO</th>
                <th>Description</th>
                <th>Produced_on</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Image</th>
                <th>Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        @foreach($cars as $car) 
            <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->description}}</td>
                <td>{{$car->produced_on}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->manufacturer->name}}</td>
                <td><img src="{{$car->image}}" alt="{{$car->image}}" /></td>
                <td><a href="{{url('cars',  $car->id) }}" >{{ $car->description }}</a></td>
                <td><a href = "/cars/{{$car->id}}/edit">Edit</a></td>
                <td><a onclick="return confirm('Are you sure?') " true ? href = '/cars/delete/{{$car->id}}' : "">Delete</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>