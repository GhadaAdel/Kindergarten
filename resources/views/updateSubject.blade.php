@extends('layouts.admin')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Subject</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @section('content')
  <h2>Update Subject</h2>
  <form action="{{ route('updateSubject',$sub->id)}}" method="post"  enctype="multipart/form-data">
  @csrf
  @method('put')
    <div class="form-group">
      <label for="title">Class Subject:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter class_subject" name="class_subject" value="{{ old('class_subject', $sub->class_subject) }}">
      @error('class_subject')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">min_age:</label>
      <input type="text" class="form-control" id="min_age" placeholder="min_age" name="min_age" value="{{ $sub->min_age}}">
      @error('min_age')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="max_age">max_age:</label>
      <input type="text" class="form-control" id="max_age" placeholder="max_age" name="max_age" value="{{ $sub->max_age}}">
      @error('max_age')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="start_time">start_time:</label>
      <input type="text" class="form-control" id="start_time" placeholder="start_time" name="start_time" value="{{ $sub->start_time}}">
      @error('start_time')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="end_time">end_time:</label>
      <input type="text" class="form-control" id="end_time" placeholder="end_time" name="end_time" value="{{ $sub->end_time}}">
      @error('end_time')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">end_time:</label>
      <input type="text" class="form-control" id="price" placeholder="price" name="price" value="{{ $sub->price}}">
      @error('price')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div><div class="form-group">
      <label for="capacity">end_time:</label>
      <input type="text" class="form-control" id="capacity" placeholder="capacity" name="capacity" value="{{ $sub->capacity}}">
      @error('capacity')
      <div class="alert alert-warning">
      {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $sub->image}}">
            <img src="{{ asset('assets/images/'.$sub->image) }}" alt="teacher" style="width:150px;">
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