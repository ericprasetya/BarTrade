@extends('dashboard.main')

@section('dashboardContainer')
  <div class="order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-primary">Seller Product</span>
    </h4>
    <ul class="list-group mb-3">
      <li class="list-group-item lh-sm">
        <div style="height: 200px; overflow:hidden;" class="d-flex justify-content-center mb-2 pb-2 border-bottom" >
          @if ($barter->sellerProduct->image)
            <img src="{{ asset('storage/' . $barter->sellerProduct->image) }}" class="h-100 rounded" alt="{{ $barter->sellerProduct->category->name }}">
          @else
            <img src="https://source.unsplash.com/200x200?{{ $barter->sellerProduct->category->name }}" class="img-fluid rounded" alt="{{ $barter->sellerProduct->category->name }}">
          @endif
        </div>
        <div class="d-flex justify-content-between ">
          <div>
            <h6 class="my-0">{{ $barter->sellerProduct->name }}</h6>
            <small class="text-muted">By {{ $barter->sellerProduct->user->name }}</small>
            @error('seller_product_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <span class="text-muted">Rp {{ $barter->sellerProduct->value }}</span>
        </div>
      </li>
    </ul>

    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-primary">Your Product</span>
    </h4>
    <ul class="list-group mb-3">
      <li class="list-group-item lh-sm">
        <div style="height: 200px; overflow:hidden;" class="d-flex justify-content-center mb-2 pb-2 border-bottom" >
          @if ($barter->buyerProduct->image)
            <img src="{{ asset('storage/' . $barter->buyerProduct->image) }}" class="rounded h-100 d-block" alt="{{ $barter->buyerProduct->category->name }}">
          @else
            <img src="https://source.unsplash.com/200x200?{{ $barter->buyerProduct->category->name }}" class="img-fluid rounded" alt="{{ $barter->buyerProduct->category->name }}">
          @endif
        </div>
        <div class="d-flex justify-content-between ">
          <div>
            <h6 class="my-0">{{ $barter->buyerProduct->name }}</h6>
            <small class="text-muted">By {{ $barter->buyerProduct->user->name }}</small>
            @error('seller_product_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <span class="text-muted">Rp {{ $barter->buyerProduct->value }}</span>
        </div>
      </li>
    </ul>

    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-primary">Barter Details</span>
    </h4>
    <ul class="list-group mb-3">
      <li class="list-group-item d-flex justify-content-between">
        <span>Type: </span>
        <div>
          <span class="text-muted" id="priceDifference">{{ $barter->type }}</span>
        </div>
      </li>
      <li class="list-group-item d-flex justify-content-between">
        <span>Courier: {{ $barter->courier->name }}</span>
        <div>
          <span class="text-muted">Rp </span><span class="text-muted" id="priceDifference">{{ $barter->courier->fee }}</span>
        </div>
      </li>
      @if($barter->type == "TradeIn")
      <li class="list-group-item d-flex justify-content-between">
        <span>Price Difference</span>
        <div>
          <span class="text-muted">Rp </span><span class="text-muted" id="priceDifference">0</span>
        </div>
      </li>
      @endif
      <li class="list-group-item d-flex justify-content-between">
        <span>Platform fee</span>
        <div>
          <span class="text-muted">Rp </span><span class="text-muted" id="platformFee">10000</span>
        </div>
      </li>
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (IDR)</span>
        <div>
          <strong>Rp </strong><strong id="total">0</strong>
        </div>
      </li>
    </ul>

  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var total = document.getElementById("total");
  var platformFee = document.getElementById("platformFee");

  if('{{ $barter->type }}' == "TradeIn"){
    var priceDiff = document.getElementById("priceDifference");
    priceDiff.innerHTML = '{{ $barter->sellerProduct->value - $barter->buyerProduct->value}}'
    total.innerHTML = {{ $barter->courier->fee }} + parseInt(priceDiff.innerHTML) + parseInt(platformFee.innerHTML);
  }


  total.innerHTML =  {{ $barter->courier->fee }} + parseInt(platformFee.innerHTML);

</script>
@endsection