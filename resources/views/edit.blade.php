<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<form action="{{ url('admin/questionimg/' . $question->id) }}" method="post">

    <!-- Solución de error por CSRF -->
    <!--<input type="hidden" name="_method" value="post">-->
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
    @method('put')
    @csrf

    <!-- Inputs del formulario -->

    <div class="mb-3">
        <label for="question" class="form-label">question</label>
        <input type="text" class="form-control" id="question" name="question" required value="{{ old('question', $question->question) }}">
    </div>

    <div class="mb-3">
        <label for="correct" class="form-label">correct</label>
        <input type="number" class="form-control" id="correct" name="correct"  required value="{{ old('correct', $question->correct) }}">
    </div>

    <div class="mb-3">
        <label for="realNew" class="form-label">realNew</label>
        <input type="text" class="form-control" id="realNew" name="realNew" required value="{{ old('realNew', $question->realNew) }}">
    </div>



    <button type="submit" class="btn btn-success">Update</button>

</form>

   
</body>
</html>
