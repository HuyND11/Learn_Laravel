<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "container">
        <form class = "form" method = "POST" action = "{{route('calculate')}}">
        @csrf
            <div class="mb-3">
                <label for="a" class="form-label">First number</label>
                <input type="text" name = "a" class="form-control " id="a" placeholder = "First Number" value = "{{isset($firstNumber) ? $firstNumber : ''}}">
                @error('a')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="a" class="form-label">Formula</label>
                <select class="form-select" name = "formula" id = "formula" aria-label="Default select example" >
                    <option value="0" selected disabled hidden>Formula</option>
                    <option value="1" {{(isset($formula) && $formula == 1 ? "selected" : '' )}}>Sum</option>
                    <option value="2" {{(isset($formula) && $formula == 2 ? "selected" : '' )}}>Mins</option>
                    <option value="3" {{(isset($formula) && $formula == 3 ? "selected" : '' )}}>Multiplication</option>
                    <option value="4" {{(isset($formula) && $formula == 4 ? "selected" : '' )}}>Divide</option>
                </select>
                @error('formula')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="b" class="form-label">Second number</label>
                <input type="text" name = "b" class="form-control" id="b" placeholder = "Second number" value = "{{isset($secondNumber) ? $secondNumber : ''}}" >
                @error('b')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="result" class="form-label">Result</label>
                <input type="text" class="form-control" id="result" disabled placeholder = "Result" value = "{{isset($result) ? $result : 0}}">
            </div>
            <button class = "btn btn-primary">Calculate</button>
        </form>
    </div>
</body>
</html>