@extends('layout.layout')
@section('content')

<div>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="card m-5 d-flex flex-column w-50 justify-content-center align-items-center">
            <form class="card-body p-2" method="post" action="{{url('register')}}">
                @csrf
                <!-- {{ csrf_field() }} -->
                <div class="row">
                    <div class="col-6">
                        <div class="m-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" required class="form-control" id="name" name="name"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="m-3">
                            <label for="exampleInputEmail1" class="form-label">Last name</label>
                            <input type="text" required class="form-control" id="lastname" name="lastname"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="m-3">
                            <label for="exampleInputEmail1" class="form-label">Age</label>
                            <input type="number" required class="form-control" id="age" name="age"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="m-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" required class="form-control" id="email" name="email"
                                aria-describedby="emailHelp">
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-25">Submit</button>
                </div>
            </form>
        </div>


        @if (count($users) === 0)
        <div class="alert alert-warning" role="alert">
            No data found!
        </div>

        @else
        <div class="d-flex w-100 p-5 m-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->age}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif


    </div>
</div>