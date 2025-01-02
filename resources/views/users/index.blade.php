<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="container d-flex justify-content-between">
            <div class="">
            </div>
            <div class="bg-primary my-2 py-2">
                <a href="{{route('add-user')}}" class="text-white text-decoration-none px-5 py-2 ">Add User</a>
            </div>
        </div>
        <table class="table table-secondary">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">email</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{ $user->collectLocalization('first_name') }}</td>
                    <td>{{$user->collectLocalization('last_name')}}</td>
                    <td>{{$user->email}}</td>
                  </tr>
                    
                @endforeach
                </tbody>
          </table>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>