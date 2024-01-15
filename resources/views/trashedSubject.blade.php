@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed Subject list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @section('content')
  <h2>Trashed Subject list</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Minimum Age</th>
        <th>Maximum Age</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Price</th>
        <th>Capacity</th>
        <th>Teacher</th>
        <th>Image</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subject as  $sub)
    <tr>
      <td>{{ $sub->class_subject }}
        <td>{{ $sub->min_age }}</td>
        <td>{{ $sub->max_age }}</td>
        <td>{{ $sub->start_time }}</td>
        <td>{{ $sub->end_time }}</td>
        <td>{{ $sub->price }}</td>
        <td>{{ $sub->capacity }}</td>
        <td>{{ $sub->teacher_id }}</td>
        <td>{{ $sub->image }}</td>
        <td><a href="restoreSubject/{{ $sub->id }}">Restore</a></td>
       <td><a href="fdSubject/{{$sub->id}}">Delete</a></td>
      
      </tr>
      @endforeach
     
      </tr>
    </tbody>
  </table>
</div>
@endsection
</body>
</html>