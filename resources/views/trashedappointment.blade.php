@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed Appointment list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @section('content')
  <h2>Trashed Appointment list</h2>
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Guardian Name</th>
        <th>Guardian Mail</th>
        <th>Student Name</th>
        <th>Student Age</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($appointment as  $a)
    <tr>
    <td>{{ $a->guardian_name }}</td>
        <td>{{ $a->guardian_mail }}</td> 
        <td>{{ $a->student_name }}</td>     
        <td>{{ $a->student_age }}</td>         
        <td><a href="restoreappointment/{{ $a->id }}">Restore</a></td>
        <td><a href="fdappointment/{{ $a->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>      
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
</body>
</html>