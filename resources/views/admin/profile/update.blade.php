
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@push('styles')
  
  <style>
    .profile-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 30px;
      max-width: 450px;
      width: 100%;
    }
    .profile-card h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }
    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      display: block;
      margin: 0 auto 15px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-size: 14px;
      color: #555;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }
    .form-row {
      display: flex;
      gap: 10px;
    }
    .form-row .form-group {
      flex: 1;
    }
    .btn {
      width: 100%;
      background: #007bff;
      border: none;
      padding: 12px;
      color: #fff;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
    }
    .btn:hover {
      background: #0056b3;
    }
  </style>
@endpush
  <div class="profile-card">
    <h2>Edit Profile</h2>
    <img src="{{ asset('assets/img/team/team4.jpeg') }}" alt="Profile Picture" class="avatar">

    <form>
      <div class="form-row">
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" placeholder="first name">
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" placeholder="last name">
        </div>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="example@gmail.com">
      </div>

      <div class="form-group">
        <label for="contact">Contacts Number</label>
        <input type="text" id="contact" placeholder="+62-xxxx-xxxx-xxx">
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" placeholder="address">
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city" placeholder="citu">
        </div>
        <div class="form-group">
          <label for="state">State</label>
          <input type="text" id="state" placeholder="state">
        </div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="********">
      </div>
      <div class="form-group">
        <label for="role">Role</label>
         <select class="border rounded-lg px-3 py-2">
          <option>admin</option>
          <option>Vendor</option>
          <option>user</option>
        </select>
      </div>

      <button type="submit" class="btn">Save</button>
    </form>
  </div>
@endsection