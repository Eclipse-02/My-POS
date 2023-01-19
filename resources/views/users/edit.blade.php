@extends('layouts.master')

@section('title', 'User')

@section('content')
    <div class="row mt-4 justify-content-center align-items-center" style="height: calc(75vh)">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h3 class="text-capitalize text-center">Edit User</h3>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nama" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="username">Nama User</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Nama User" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" value="{{ $user->password }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="h6 text-capitalize" for="role">Role</label>
                                    <select name="role" id="role" value="{{ old('role') }}">
                                        <option value="" selected disabled>Role</option>
                                        <option value="admin" >Admin</option>
                                        <option value="kasir" >Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection