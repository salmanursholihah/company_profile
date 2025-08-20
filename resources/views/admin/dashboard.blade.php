@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <h5>Total Users</h5>
        <p class="fs-3">{{ $usersCount ?? 0 }}</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <h5>Active Subscriptions</h5>
        <p class="fs-3">{{ $subsCount ?? 0 }}</p>
      </div>
    </div>
  </div>
</div>
@endsection