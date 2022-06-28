<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST" enctype="multipart/form-data" action = {{ isset($action) && $action == 'create' ? "/cars/store" : "/cars/update/".$car['id'] }} >
        @csrf
        <input type="text" name="desc" placeholder = "Description" value="{{ isset($car) ? $car['description'] : '' }}">
            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <input type="text" name="produced_on" placeholder = "Produced_on" value="{{ isset($car) ? $car['produced_on'] : ''}}">
            @error('produced_on')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <input type="text" name="model" placeholder = "Model" value="{{ isset($car) ? $car['model'] : ''}}">
            @error('model')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <select name="manufacturer" >
            <option value="" disabled selected  >Select Manufacturer</option>
            @foreach ($manufacturers as $manufacturer)
                <option value={{$manufacturer->id}} {{isset($car) ? $manufacturer->id === $car->manufacturer_id ? "selected" : "" : ""}}>{{$manufacturer->name}}</option>
            @endforeach
        </select>
            @error('model')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <input id="image-upload" type="file" name="image" onchange="changeImage(event)">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <img id="image-preview" src="{{  isset($car) ? url($car['image']) : ""}}" alt="" style="width: 10rem height: 10rem">
        <Button type = "submit">{{$action == 'create' ? "Store" : "Update" }}</Button>
    </form>
    <script>
        const changeImage = (e) => {
            const preImg = document.getElementById("image-preview");
            const file = e.target.files[0];
            preImg.src = URL.createObjectURL(file);
            preImg.onLoad = () => {
                URL.revokeObjectURL(preImg.src)
            }
        }
    </script>
</body>
</html>