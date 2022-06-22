@extends('layouts.main')

@section('container')
<div class="container d-flex align-items-center flex-column my-5">
  <div class="border-bottom col-lg-8 py-2 mb-3">
    <h1 class="h2">Create New Product</h1>
  </div>
  <div class="col-lg-8">
    <form method="POST" action="/products" class="mb-5" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control @error('name')
          is-invalid
        @enderror" id="name" name="name" autofocus required value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="value" class="form-label">Product Value</label>
        <div class="input-group mb-3">
          <span class="input-group-text">Rp</span>
          <input type="text" class="form-control @error('value')
            is-invalid
          @enderror" id="value" name="value" required value="{{ old('value') }}">
          @error('value')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id">
          @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('image')
          is-invalid
        @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Product Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Add New Product</button>
      </div>
    </form>
  </div>
</div>

  <script>

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0])
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection
