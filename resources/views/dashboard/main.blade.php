@extends('layouts.main')

@section('container')
<div class="row px-5 mx-5 py-5">
  <div class="card col-3 p-0 mx-5" style="height: fit-content">
    <div class="card-header bg-blue text-light d-flex align-items-center">
      <i class="bi bi-person-circle fs-2 me-2"></i>
      <strong>{{ auth()->user()->name }}</strong>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="/dashboard" class="card-link">Dashboard</a></li>
      <li class="list-group-item"><a href="/user/{{ auth()->user()->username }}/edit" class="card-link">Edit Profile</a></li>
      <li class="list-group-item"><a href="/products/create" class="card-link">Offer New Product</a></li>
    </ul>
    <div class="card-body">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
      </form> 
    </div>
  </div>

  <div class="col">
    
    @yield('dashboardContainer')
  </div>
</div>

@endsection