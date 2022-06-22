@extends('layouts.main')

@section('container')
<div class="row px-5 mx-5 py-5">
  <div class="card col-3 p-0 mx-5" style="height: fit-content">
    <div class="card-header bg-blue">
      <a href="#" class="d-flex align-items-center link-light text-decoration-none">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a href="/dashboard" class="card-link">Dashboard</a></li>
      <li class="list-group-item"><a href="" class="card-link">Edit Profile</a></li>
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
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="products-tab" data-bs-toggle="tab" data-bs-target="#products-tab-pane" type="button" role="tab" aria-controls="products-tab-pane" aria-selected="false">Products</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link " id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions-tab-pane" type="button" role="tab" aria-controls="transactions-tab-pane" aria-selected="true">Transactions</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="products-tab-pane" role="tabpanel" aria-labelledby="products-tab" tabindex="0">
        @if (session()->has('success'))
          <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
          </div>
        @endif
        
        <a href="/products/create" class="btn btn-info my-3">Offer New Product</a>
        @foreach ($products as $product)
          <div class="card mb-3 flex-row" style="height: 300px">
            @if ($product->image)
            <div class="overflow-hidden flex-shrink-0" style="width: 300px">
              <img src="{{ asset('storage/'. $product->image) }}" class="h-100 d-block mx-auto" alt="{{ $product->category->name }}" >
            </div>
            @else
              <img src="https://source.unsplash.com/300x300?{{ $product->category->name }}" class="img-fluid" alt="{{ $product->category->name }}">
            @endif
              <div class="card-body flex-column position-relative">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text ">Value: Rp {{ $product->value }}</p>
                <p class="card-text ">Category: {{ $product->category->name }}</p>
                <p class="card-text">{{ $product->description }}</p>
                
                <div class="d-flex justify-content-between position-absolute bottom-0 w-100">
                  <p class="card-text"><small class="text-muted">Created {{ $product->created_at->diffForHumans() }}</small></p>
                  <div class="me-5 mb-2">
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                    <form method="POST" action="/products/{{ $product->id }}" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger" onclick="return confirm('Are you sure')">
                        <i class="bi bi-trash"></i> Delete
                      </button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        @endforeach
        <div>{{ $products->links() }}</div>
      </div>
      <div class="tab-pane fade" id="transactions-tab-pane" role="tabpanel" aria-labelledby="transactions-tab" tabindex="0">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Seller Product Name</th>
                <th scope="col">Seller Name</th>
                <th scope="col">Your Product</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $transaction->sellerProduct->name }}</td>
                  <td>{{ $transaction->sellerProduct->user->name }}</td>
                  <td>{{ $transaction->buyerProduct->name }}</td>
                  <td>
                    <a href="#" class="badge bg-info"><i class="bi bi-eye"></i></a>
                    <a href="#/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>
                    {{-- <form method="post" action="#" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="bg-danger border-0 badge" onclick="return confirm('Are you sure')">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form> --}}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection