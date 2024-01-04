@extends('layouts.app')
@section('content')
<div class="container-fluid d-flex flex-column" style="height: 650px">
    <div class="row h-100">
        <div class="col-2 h-100" style="background: #bde0fe;">
            <h1 class="h3 text-light text-center py-4 mb-2">
                <i class="fa-solid fa-square-poll-vertical" style="font-size: 20px; color: black;"></i>
                <span class="mx-3 d-none d-lg-inline text-black" style="font-size: 20px;">Admin Panel</span>
            </h1>
            <ul class="list-group text-center text-lg-start mb-3 mx-2 pb-3">
                <li class="list-group-item my-2 border-0" style="background: #bde0fe;">
                    <a href="{{ url('/items') }}" class="btn btn-secondary" style="width: 150px">
                        <i class="fa-brands fa-dropbox"></i>
                        <span class="ms-3 d-none d-lg-inline">Item</span>
                    </a>
                </li>
                <li class="list-group-item my-1 border-0" style="background: #bde0fe;">
                    <a href="{{ url('/categories') }}" class="btn btn-primary" style="width: 150px">
                        <i class="fa-solid fa-list"></i>
                        <span class="ms-3 d-none d-lg-inline">Category</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="col-10 bg-light">
            <nav class="navbar navbar-expand border-bottom">
                <div class="container-fluid">
                    <div></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-key"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="ms-2">Profile</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="ms-2">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <small class="py-4">Category > <span class="text-primary">Update Category</span></small>
                <div class="bg-primary" style="border-radius: 5px;">
                    <p class="px-3 py-2 my-4 text-light">Update Categories</p>
                </div>
                <h5>Category Information</h5>
                <div class="container">

                    <form action="{{ url("/categories/update/$category->id") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <label for="">Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                </div>
                                <div class="mb-2">
                                    <label for="">Select Status</label>
                                    <select name="status" class="form-select">
                                       <option value="0" @selected($category->status)>Publish</option>
                                       <option value="1" @selected($category->status)>Unpublish</option>
                                    </select>
                                </div> 
                                <div class="mb-2">
                                    <label for="">Category Image</label>
                                    <input type="file" name="photo" class="form-control" value="{{ $category->photo }}">
                                </div> 
                                <div class="mt-4 float-end">
                                    <button class="btn btn-primary">Update</button>
                                    <a href="{{ url('/categories') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

