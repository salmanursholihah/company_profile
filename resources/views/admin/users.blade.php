@extends('layouts.admin')

@section('title', 'Manage Users')
@section('page-title', 'Users')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Admin Super</td>
      <td>admin@example.com</td>
      <td>Super Admin</td>
    </tr>
  </tbody>
</table>
@endsection