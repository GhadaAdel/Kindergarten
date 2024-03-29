@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Testimonial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @section('content')
  <h2>Add Testimonial</h2>
  <form action="{{route('displaytestimony')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
      @error('name')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="profession">Profession:</label>
      <input type="text" class="form-control" id="profession" placeholder="Enter profession" name="profession" value="{{ old('profession') }}">
      @error('profession')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="testimony">Testimony:</label>
      <textarea class="form-control" rows="5" id="testimony" name="testimony">{{ old('testimony') }}</textarea>
      @error('testimony')
       <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div> 
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
      @error('image')
       <div class="alert alert-warning">{{ $message }}</div>          
      @enderror
    </div>
    <button type="submit" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Add</button>
  </form>
</div>
@endsection
</body>
</html> 