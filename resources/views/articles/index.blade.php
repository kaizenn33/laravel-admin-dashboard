
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
                    <a href="{{ url('/items') }}" class="btn btn-primary" style="width: 150px">
                        <i class="fa-brands fa-dropbox"></i>
                        <span class="ms-3 d-none d-lg-inline">Item</span>
                    </a>
                </li>
                <li class="list-group-item my-1 border-0" style="background: #bde0fe;">
                    <a href="{{ url('/categories') }}" class="btn btn-secondary" style="width: 150px">
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
                @if (session("info"))
                    <div class="alert alert-warning my-2">
                        {{ session("info") }}
                    </div>
                @endif
                @if (session("update"))
                    <div class="alert alert-success my-2">
                        {{ session("update") }}
                    </div>
                @endif
                <small class="py-4">Items List</small>
                <div class="my-4 float-end w-20">
                    <a href="{{ url('/items/add') }}" class="btn btn-primary">+ Add Items</a>
                </div>
            </div><br>
            <div class="container-fluid" style="max-width: 1100px">
                <table class="table table-hover table-borderless">
                    <thead class="table-primary">
                        <tr>
                            <th>
                                Action
                            </th>
                            <th>No</th>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Owner</th>
                            <th>Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>

                            <td>
                                <a href="{{ url("items/update/$item->id") }}" class=" me-1"><i class="fa-solid fa-pen-to-square" style="font-size: 21px"></i></a>
                                <a href="{{ url("/items/delete/$item->id") }}" class="ms-1"><i class="fa-solid fa-trash" style="font-size: 21px"></i></a>
                            </td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item ->name}}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->ownerName }}</td>
                            <td>
                                @if ($item->status == "0")
                                    <i class="fa-solid fa-check"></i>
                                @endif
                                @if ($item->status == "1")
                                    <i class="fa-solid fa-x"></i>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-end mx-5">
                {{ $items->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection