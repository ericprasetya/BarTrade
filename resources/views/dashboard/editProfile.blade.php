@extends('dashboard.main')

@section('dashboardContainer')
<div class="row justify-content-center" style="height: 80vh;">
  <div class="col">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal">Update Form</h1>
      <form action="/user/{{ auth()->user()->username }}" method="POST">
        @method('put')
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name')
            is-invalid 
          @enderror" id="name" placeholder="Name" required value="{{ old('name', auth()->user()->name) }}">
          <label for="name">Name</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username')
          is-invalid 
        @enderror" id="username" placeholder="Username" required value="{{ old('username', auth()->user()->username) }}"">
          <label for="username">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="phone" class="form-control @error('phone')
          is-invalid 
        @enderror" id="phone" placeholder="phone" required value="{{ old('phone', auth()->user()->phone) }}">
          <label for="phone">Phone</label>
          @error('phone')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email')
          is-invalid 
        @enderror" id="email" placeholder="name@example.com" required value="{{ old('email', auth()->user()->email) }}">
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password')
          is-invalid 
        @enderror" id="password" placeholder="Password" required>
          <label for="password">Input your current password to continue</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update Profile</button>
      </form>
    </main>
  </div>
</div>
@endsection