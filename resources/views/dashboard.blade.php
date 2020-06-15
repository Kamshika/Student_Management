<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Marksheet</title>
          <nav class="navbar navbar-dark bg-primary">
          <span class="navbar-brand mb-0 h1">Student Marksheet</span>
          <ul class="nav justify-content-end">
              <span class="navbar-brand">
                <em>Welcome {{ ucfirst(Auth()->user()->name) }}</em>
              </span>
              <li class="nav-item ">
                <a type="button" class="btn btn-link-light"  href="{{url('logout')}}">Logout</a>
              </li>
          </ul>
          </nav>

        <!-- Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


        <script type="text/javascript">
        $(document).ready(function () {
            // Activate tooltips
         //   $('[data-toggle="tooltip"]').tooltip();

            // Filter table rows based on searched term
            $("#search").on("keyup", function () {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function () {
                    $row = $(this);
                    var name = $row.find("td:nth-child(2)").text().toLowerCase();
                    console.log(name);
                    if (name.search(term) < 0) {
                        $row.hide();
                    } else {
                        $row.show();
                    }
                });
            });
        });
    </script>

    </head>

<body>
        <form class="needs-validation bg-white col-lg-6" action="/dashboard" method="POST" novalidate>
            {{csrf_field()}}
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="LastName" name="LastName" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom03">Maths</label>
                    <input type="text" class="form-control" id="Maths" name="Maths" required>
                        @if ($errors->has('Maths'))
                            <span class="error">{{ $errors->first('Maths') }}</span>
                        @endif   
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom04">Physics</label>
                    <input type="text" class="form-control" id="Physics" name="Physics" required>
                        @if ($errors->has('Physics'))
                            <span class="error">{{ $errors->first('Physics') }}</span>
                        @endif 
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom05">Chemistry</label>
                    <input type="text" class="form-control" id="Chemistry" name="Chemistry" required>
                        @if ($errors->has('Chemistry'))
                            <span class="error">{{ $errors->first('Chemistry') }}</span>
                        @endif 
                </div>
            </div>
            <input class="btn btn-success" type="submit" value="Add">  
        </form>
    
    <div class="container">
        <nav class="navbar navbar-light bg-white">
            <span class="navbar-brand mb-0 h1"></span>
            <ul class="nav justify-content-end">
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ url('search') }}">
                {{csrf_field()}}
                @method('GET')
                    <input class="form-control mr-sm-2" type="search" placeholder="Search by name" aria-label="Search" id="search">
                    <input class="btn btn-dark" type="submit" name="submit" value="Search"> 
                </form>
            </ul>
        </nav>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Maths</th>
                    <th scope="col">Chemistry</th>
                    <th scope="col">Physics</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->FirstName}}</td>
                        <td>{{$student->LastName}}</td>
                        <td>{{$student->Maths}}</td>
                        <td>{{$student->Physics}}</td>
                        <td>{{$student->Chemistry}}</td>
                        <td>
                            <a class="btn btn-info" href="http://127.0.0.1:8000/dashboard/{{$student->id}}/edit">Edit</a>
                        </td>
                        <td>
                            <form action="/dashboard/{{$student->id}}" method="POST" >
                            {{csrf_field()}}
                            @method('DELETE')
                                <input type="hidden" id="id" name="id" value="{{$student->id}}">
                                <input class="btn btn-danger" type="submit" value="Delete"> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>