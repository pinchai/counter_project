<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Product</title>
</head>
<body>
<div class="container">
    <div class="row">
        {{--navbar--}}
        @include('navbar')

        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <center>Do your want to delete ?</center>
                    <center>
                        <ul>
                            <li>Name: {{ $current_user->name }}</li>
                            <li>Email: {{ $current_user->email }}</li>
                        </ul>
                    </center>
                </div>
                <div class="card-footer">
                    <a href="/register-list" class="btn btn-primary">Cancel</a>
                    <a href="/delete-user?id={{ $current_user->id }}" class="btn btn-danger">Yes Delete</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
