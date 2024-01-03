<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Testimonial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Uppdate Testimonial</h2>
  <form action="{{ route('updateTestimonial',$testimony->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name', $testimony->name) }}">
      @error('name')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="profession">Profession:</label>
      <input type="text" class="form-control" id="profession" placeholder="Enter profession" name="profession" value="{{ old('profession', $testimony->profession) }}">
      @error('profession')
        <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="testimony">Testimony:</label>
      <textarea class="form-control" rows="5" id="testimony" name="testimony">{{ old('testimony', $testimony->testimony) }}</textarea>
      @error('testimony')
       <div class="alert alert-warning">{{ $message }}</div>
      @enderror
    </div> 
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $testimony->image) }}">
      <img src=" {{ asset('assets/images/'.$testimony->image) }} " alt="client" style="width:250px;">
      @error('image')
       <div class="alert alert-warning">{{ $message }}</div>          
      @enderror
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>
</body>
</html> 