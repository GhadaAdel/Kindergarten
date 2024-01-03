<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Subject</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Subject</h2>
  <form action="{{route('displaysubject')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Subject:</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="class_subject" value="{{ old('class_subject') }}">
      @error('class_subject')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">Minimum Age:</label>
      <input type="number" class="form-control" id="min_age" placeholder="Enter minimum age" name="min_age" value="{{ old('min_age') }}">
      @error('min_age')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">Maximum Age:</label>
      <input type="number" class="form-control" id="max_age" placeholder="Enter maximum age" name="max_age" value="{{ old('max_age') }}">
      @error('max_age')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">Start Time:</label>
      <input type="number" class="form-control" id="start_time" placeholder="Enter start time" name="start_time" value="{{ old('start_time') }}">
      @error('start_time')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">End Time:</label>
      <input type="number" class="form-control" id="end_time" placeholder="Enter end time" name="end_time" value="{{ old('end_time') }}">
      @error('end_time')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="{{ old('price') }}">
      @error('price')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">Capacity:</label>
      <input type="number" class="form-control" id="capacity" placeholder="Enter capacity" name="capacity" value="{{ old('capacity') }}">
      @error('capacity')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
    <label for="category">Teacher:</label>
      <select name="teacher_id" id="">
        <option value="">Select Teacher</option>
        @foreach($teacher as $t)
          <option value="{{ $t->id }}" {{ old('teacher_id') == $t->id ? 'selected' : '' }} >{{$t->name}}</option>
        @endforeach
      </select>
      @error('teacher_id')
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
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>
</body>
</html> 