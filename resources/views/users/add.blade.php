<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
     <div class="row d-flex justify-content-center">
        <div class="col-lg-7">
            <h1 class="text-center py-2">Add USER</h1>
            <form action="{{route('add-user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp">
                  @error('first_name')
                  <span class="text-danger">{{$message}}</span>
                      
                  @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="emailHelp">
                 @error('last_name')
                 <span class="text-danger">{{$message}}</span>
                     
                 @enderror
                </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                        
                    @enderror 
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  @error('password')
                 <span class="text-danger">{{$message}}</span>
                     
                 @enderror
                </div>

               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
     </div>
    </div>
</body>
</html>