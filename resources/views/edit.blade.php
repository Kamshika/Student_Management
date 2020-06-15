<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Update</title>
        <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-brand mb-0 h1">Edit Student Data</span>
        </nav>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
    </head>
    <body>
        <form class="needs-validation" action="/dashboard/{{$student->id}}" method="POST" novalidate>
        {{csrf_field()}}
        @method('PUT')
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="hidden" name="id" value="{{$student->id}}">
                <input type="text" class="form-control" name="FirstName" value="{{$student->FirstName}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" name="LastName" value="{{$student->LastName}}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom03">Maths</label>
                <input type="text" class="form-control" name="Maths" value="{{$student->Maths}}" required>
                <div class="invalid-feedback">
                    Please provide a valid Marks.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom04">Physics</label>
                <input type="text" class="form-control" name="Physics" value="{{$student->Physics}}" required>
                <div class="invalid-feedback">
                Please select a valid Marks.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom05">Chemistry</label>
                <input type="text" class="form-control" name="Chemistry" value="{{$student->Chemistry}}" required>
                <div class="invalid-feedback">
                    Please provide a valid Marks.
                </div>
            </div>
        </div>
        <input class="btn btn-success" type="submit" name="submit" value="Update">       
        </form>
    </body>
</html>