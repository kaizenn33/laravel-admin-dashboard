@extends('layouts.app')
@section('content')
<div class="container-fluid d-flex flex-column" style="height: 1000px">
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
                <small>Items > <span class="text-primary">Add Items</span></small>
                <div class="bg-primary" style="border-radius: 5px;">
                    <p class="px-3 py-2 my-4 text-light">Add Items</p>
                </div>
                <h5>Item Information</h5>
                <form action="{{ url('/items/add') }}" method="POST">
                    <div class="row">
                        <div class="col-5 mx-4">
                            @csrf
                            <div class="mb-2">
                                <label for="">Item Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select">
                                    @foreach ($categories as $c) 
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">Description</label>
                                <div class="button-container mt-3">
                                    <i class="fa-solid fa-bold mx-1" style="font-size: 14px"></i>
                                    <i class="fa-solid fa-italic mx-1" style="font-size: 14px"></i>
                                    <i class="fa-solid fa-underline mx-1" style="font-size: 14px"></i>
                                    <i class="fa-solid fa-indent mx-1 float-end" style="font-size: 14px"></i>
                                </div>
                                <textarea name="description" class="form-control" id=text-box></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="">Select Condition</label>
                                <select name="condition" class="form-select">
                                    @foreach ($conditions as $c) 
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Select Type</label>
                                <select name="type" class="form-select">
                                    @foreach ($types as $t) 
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="mb-2">
                                <label for="">Select Status</label>
                                <select name="status" class="form-select">
                                   <option value="0">Publish</option>
                                   <option value="1">Unpublish</option>
                                </select>
                            </div> 
                            <div class="mb-2">
                                <label for="">Item Image</label>
                                <input type="file" name="image" class="form-control">
                            </div> 
                        </div>
                        <div class="col-5 mx-4">
                            <div class="mb-2">
                                <label for="">Owner Name</label>
                                <input type="input" name="owner_name" class="form-control">
                            </div> 
                            <div class="mb-2">
                                <label for="">Contact Number</label>                        
                                <input type="input" name="phone" id="phone" class="form-control">
                            </div> 
                            <div class="mb-2">
                                <label for="">Address</label>                        
                                <textarea name="address" class="form-control"></textarea>
                            </div> 
                            <div class="mb-2">
                                <label for="">Location</label>                        
                                <input type="text" id="point" class="form-control" name="location" readonly>
                                <div style="width: 100%; height: 300px;" id="map"></div>
                                <input type="hidden" name="smth" id="location">
                            </div> 
                            <div class="mb-2">
                                <button class="btn btn-primary float-end">Submit</button>
                                <a href="{{ url('/items') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <script>
        document.addEventListener("DOMContentLoaded", function(){
            const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.3.4/js/utils.js",
        });
        
        var map = L.map('map').setView([51.505, -0.09], 13); 
        console.log(map);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        var marker = L.marker([51.505, -0.09], {
            draggable: 'true'
        }).addTo(map);
        
        
        marker.on('dragend', function(event) {
            var latLng = event.target.getLatLng();
            document.getElementById('location').value = latLng.lat + ',' + latLng.lng;
        });
        map.on('click', function(event) {
        var latLng = event.latlng;
        document.getElementById('point').value = latLng.lat + ',' + latLng.lng;
        });
        })
   </script>
@endsection
