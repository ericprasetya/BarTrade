@extends('layouts.main')

@section('container')
  <div class="container d-flex my-5 justify-content-around">
    <div style="max-height: 500px; overflow:hidden;" class="rounded-4 shadow" >
    @if ($product->image)
      <img src="{{ asset('storage/'. $product->user->username . '/' . $product->image) }}" class="img-fluid" alt="{{ $product->category->name }}">
    @else
      <img src="https://source.unsplash.com/500x500?{{ $product->category->name }}" class="img-fluid" alt="{{ $product->category->name }}">
    @endif
    </div>

    <div class="" style="width: 400px">
      <h1>{{ $product->name }}</h1>
      <h5>Barter Value: ${{ $product->value }}</h5>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Seller Profile</button>
        </div>
      </nav>
      <div class="tab-content mt-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
          <h5>Category : {{ $product->category->name }}</h5>
          <p>{{ $product->description }}</p>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
          <h5>Seller Name : {{ $product->user->name }}</h5>
          <p>Seller Email : {{ $product->user->email }}</p>
          <a href="https://wa.me/{{ $product->user->phone }}?text=Saya%20tertarik%20untuk%20barter%20dengan%20Anda" target="_blank"><button type="button" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i> Contact Me Now!</button></a>
        </div>
      </div>
      <div class="card" style="width: 100%;height:fit-content;margin-top:50px">
        <div class="card-header">
          Barter Now!
        </div>
        <div class="card-body">
          <form action="transaction/{{ $product->id }}" class="d-flex justify-content-center flex-column">
              <div class="form-floating">
                <select class="form-select" id="barterType" aria-label="Floating label select example">
                  <option value="full-barter" selected>Full Barter</option>
                  <option value="trade-in">Trade in</option>
                </select>
                <label for="barterType">Choose Barter Type</label>
              </div>
              <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="agree">
                <label class="form-check-label" for="agree">
                  I already discuss barter with the seller and both seller and me agree with the chosen barter type
                </label>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Checkout</button>
            </div>
          </form>
      </div>

    </div>


  </div>
@endsection
