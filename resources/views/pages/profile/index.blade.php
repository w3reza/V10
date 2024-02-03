@extends('layouts.app')
@section('title','Profile Page')
@section('content')
<section class="vh-100" style="background-color: #2779e2;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">

                <h1 class="text-white mb-4 text-center">Profile Page</h1>


                <div class="card" style="border-radius: 15px;">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif

                    <div class="row align-items-center py-3">
                        <div class="col-md-3">
                        <h4 class="mb-4">
                            Hello, {{ auth()->user()->name }}
                        </h4>
                        </div>
                        <div class="col-md-7"> </div>

                        <div class="col-md-2">
                            <a href="{{ route('logout') }}"
                                class="btn btn-warning ml-2 mr-2">Logout</a>
                        </div>
                        </div>

                    <table class="display table table-bordered" style="width:96%;margin:20px;">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td>01</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{$user->phone }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('profile.edit', $user->id) }}"
                                                class="btn btn-success ml-2 mr-2">Edit</a>

                                        </div>

                                </tr>


                        </tbody>

                    </table>


                </div>

            </div>
        </div>
    </div>
</section>



    @endsection

