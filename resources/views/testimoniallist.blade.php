<!DOCTYPE html>
<html lang="en">
<head>
  <title>Testimonial List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Testimonial List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Profession</th>
        <th>Testimony</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($testimony as $t)
      <tr>
        <td>{{ $t->name }}</td>
        <td>{{ $t->profession }}</td>     
        <td>{{ $t->testimony }}</td>
        <td><img src="{{ asset('assets/images/'.$t->image) }}" width="120px"></td>        
        <td><a href="edittestimony/{{ $t->id }}">Edit</a></td>
        <td><a href="deletetestimony/{{ $t->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>    
  </table>
</div>

</body>
</html>
 