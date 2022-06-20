@extends('layouts.main')

@section('container')
  <form class="container mb-5" action="/transaction" method="post">
    @csrf
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Seller Product</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item lh-sm">
            <div style="max-height: 200px; overflow:hidden;" class="d-flex justify-content-center mb-2 pb-2 border-bottom" >
              @if ($product->image)
                <img src="{{ asset('storage/'. $product->user->username . '/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->category->name }}">
              @else
                <img src="https://source.unsplash.com/200x200?{{ $product->category->name }}" class="img-fluid rounded" alt="{{ $product->category->name }}">
              @endif
            </div>
            <div class="d-flex justify-content-between ">
              <div>
                <h6 class="my-0">{{ $product->name }}</h6>
                <small class="text-muted">By {{ $product->user->name }}</small>
                @error('seller_product_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <span class="text-muted">Rp {{ $product->value }}</span>
            </div>
          </li>
        </ul>

        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your Product</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <select class="form-select" id="buyerProduct" name="buyer_product_id" required>
                <option value="">Choose...</option>
                @foreach ($buyerProducts as $bp)
                  <option value="{{ $bp->id }}" data-value="{{ $bp->value }}">{{ $bp->name }}</option>
                @endforeach
              </select>
              <small class="text-muted">By {{ auth()->user()->name }}</small>
              @error('buyer_product_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <span class="text-muted" id="buyerProductValue">Rp 0</span>
          </li>
        </ul>

        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Choose Courier</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <select class="form-select" id="courier" name="courier_id" required>
                <option value="">Choose...</option>
                @foreach ($couriers as $courier)
                  <option value="{{ $courier->id }}" data-fee="{{ $courier->fee }}">{{ $courier->name }}</option>
                @endforeach
              </select>
              @error('courier_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div>
              <span class="text-muted">Rp </span><span class="text-muted" id="courierFee">0</span>
            </div>
          </li>
          @if($type == "TradeIn")
          <li class="list-group-item d-flex justify-content-between">
            <span>Price Difference</span>
            <div>
              <span class="text-muted">Rp </span><span class="text-muted" id="priceDifference">0</span>
            </div>
          </li>
          @endif
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <div>
              <strong>Rp </strong><strong id="total">0</strong>
            </div>
          </li>
        </ul>

      </div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <div class="form-transaction">
          <input type="hidden" name="seller_product_id" value="{{ $product->id }}" id="seller-product-id">
          <input type="hidden" name="type" value="{{ $type }}">

          <div class="row g-3">
            <div class="col-12">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name')
              is-invalid
              @enderror" id="name" placeholder="Your name" name="name" value="{{ old('name', auth()->user()->name) }}" readonly required>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username')
              is-invalid 
            @enderror" id="username" placeholder="Username" name="username" value="{{ old('username', auth()->user()->username) }}" readonly required>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email')
              is-invalid 
            @enderror" id="email" placeholder="you@example.com" name="email" value="{{ old('email', auth()->user()->email) }}" name="email" readonly required>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control @error('address')
              is-invalid 
            @enderror" id="address" placeholder="Jalan mawar 1 Jakarta Pusat" name="address" value="{{ old('address') }}" required>
            @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            </div>

            <div class="col-md-5">
              <label for="type" class="form-label">Barter Type</label>
              <select class="form-select" id="type" name="type" required disabled>
                <option value="FullBarter">Full Barter</option>
                <option value="TradeIn">Trade In</option>
              </select>
              @error('type')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            @foreach ($payments as $payment)
            <div class="form-check">
              <input id="{{ $payment->name }}" name="payment_id" type="radio" class="form-check-input" value="{{ $payment->id }}" {{ old('payment_id')==$payment->id ? "checked" : "" }} required>
              <label class="form-check-label" for="{{ $payment->name }}">{{ $payment->name }}</label>
            </div>
            @endforeach
          </div>
          @error('payment')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

          {{-- <div class="row gy-3">
            <div class="col-md-6">
              <label for="card-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="card-name" placeholder="" required name="card-name" value="{{ old('card-name') }}">
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="card-number" class="form-label">Bank account number</label>
              <input type="text" class="form-control" id="card-number" placeholder="" required value="{{ old('card-number') }}">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div> --}}

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Pay</button>
        </div>
      </div>
    </div>
  </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var type = "{{ $type }}";
  var buyerProductSelector = document.getElementById("buyerProduct");
  var buyerProductValue = document.getElementById("buyerProductValue");
  var total = document.getElementById("total");
  var courierSelector = document.getElementById("courier");
  var courierFee = document.getElementById("courierFee");
  document.getElementById("type").value = type;
  
  // document.getElementById("buyer-product-id").value = buyerProductSelector.getAttribute('data-id');

  if(type == "TradeIn"){
    var priceDiff = document.getElementById("priceDifference");
  }

  $('#buyerProduct').on('change', function(){
    buyerProductValue.innerHTML = "Rp " + $(this).find("option:selected").data('value');
    if(type == "TradeIn"){
      priceDiff.innerHTML = ({{ $product->value }} - $(this).find("option:selected").data('value'))
      total.innerHTML = (parseInt(priceDiff.innerHTML) + parseInt(courierFee.innerHTML));
    }
  })

  $('#courier').on('change', function(){
    courierFee.innerHTML =  $(this).find("option:selected").data('fee');
    total.innerHTML =  $(this).find("option:selected").data('fee');
    if(type == "TradeIn"){
      total.innerHTML = (parseInt(priceDiff.innerHTML) + parseInt(courierFee.innerHTML));
    }
  })

  // courierSelector.addEventListener("change", function(){
  //   courierFee.innerHTML = courierSelector.getAttribute('data-fee');
  //   total.innerHTML = courierSelector.value;
  //   if(type == "TradeIn"){
  //     total.innerHTML = (parseInt(priceDiff.innerHTML) + parseInt(courierFee.innerHTML));
  //   }
  // });

</script>
@endsection