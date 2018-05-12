<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	
    
        <div class="container">
            <h1>List of Users </h1>
            Filters:
            <a href="/?gender=Female">Female</a> |
            <a href="/?gender=Male">Male</a> |
            <a href="/?role=Seller">Seller</a> |
            <a href="/?role=Buyer">Buyer</a> |
            <a href="/">Reset</a>

            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->gender}}</td>
                        <td>{{ $user->role}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>




    

</body>
</html>