@extends('layouts.main')

@section('container')
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach ($products as $product)
      <div class="col">
        <div class="card shadow-sm">
          <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7);"><a href="/products?category={{ $product->category->slug }}" class="text-decoration-none text-white">{{ $product->category->name }}</a> </div>
          @if ($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" alt=""  class="card-img-top" height="400">
          @else
            <img src="https://source.unsplash.com/400x400?{{ $product->category->name }}" class="card-img-top" alt="..." height="400">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Value : <strong>Rp {{ $product->value }}</strong></p>
            <p class="card-text">By : {{ $product->user->name }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="/products/{{ $product->id }}" class="btn btn-primary">View Details</a>
              <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $products->links() }}
  </div>
</div>

@endsection