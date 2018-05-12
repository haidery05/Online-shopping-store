@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <img src="public/images/{{ $user->picture }}" style="width: 200px; height: 200px; float: left; border-radius:0%; margin-right: 25px;" alt="">
            <h2>{{ $user->name }}'s Profile</h2>
            <form action="profile" enctype="multipart/form-data" method="POST" role="form">

            {{ csrf_field() }}

               @if(Auth::User()->id == $user->user_id)
                <div class="form-group">
                    <label for="">Upload Profile Picture</label>
                    <input type="file" name="picture" id="">

                <button type="submit" class="pull-right btn btn-sm btn-primary">Submit</button>
                </div>
                @endif
                <table>
                    <tr>
                        <td> <p>Role is : </p></td>
                        <td><p>{{$user->role}}</p></td>
                    </tr>

                    <tr>
                        <td><p>Gender :</p></td>
                        <td><p> {{$user->gender}}</p></td>
                    </tr>

                    <tr>
                        <td><p>Date of Birth : </p></td>
                        <td><p>{{$user->dob}}</p></td>
                    </tr>        

                    <tr>
                        <td><p>Age :</p></td>
                        <td><p> {{$user->dob->age}}</p></td>
                    </tr>                    

                    <tr>
                        <td><p>Member since :</p></td>
                        <td><p>{{ $user->created_at->diffForHumans()}}</p></td>
                    </tr>                    
                </table>

            </form>
        </div>
    </div>
</div>
@endsection
