@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Teacher</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @section('content')
  <h2>Update Teacher</h2>
  <form action="{{ route('updateteacher',$teacher->id)}}" method="post"  enctype="multipart/form-data">
  @csrf
  @method('put')
    <div class="form-group">
      <label for="title">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $teacher->name }}">
      @error('name')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Position:</label>
      <input type="text" class="form-control" id="position" placeholder="position" name="position" value="{{ $teacher->position}}">
      @error('position')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="fb">Facebook:</label>
      <input type="text" class="form-control" id="fb" placeholder="fb" name="fb" value="{{ $teacher->fb}}">
      @error('fb')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="fb">X:</label>
      <input type="text" class="form-control" id="x" placeholder="x" name="x" value="{{ $teacher->x}}">
      @error('x')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="fb">Insta:</label>
      <input type="text" class="form-control" id="insta" placeholder="insta" name="insta" value="{{ $teacher->insta}}">
      @error('insta')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $teacher->image}}">
            <img src="{{ asset('assets/images/'.$teacher->image) }}" alt="teacher" style="width:150px;">
            @error('image')
            <div class="alert alert-warning">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

@endsection

</body>
</html>