<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center text-success">Laravel Crud with Sweet Alert</h2>
  <br>
  @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul> 
    </div>
  @endif
    <form method="POST" action="{{route('articles.update',$article->id)}}" role="form">
      {{ csrf_field() }}
      {{method_field('PUT')}}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$article->title}}">        
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <input type="text" class="form-control" id="body" name="body" placeholder="Enter body" value="{{$article->body}}">        
      </div>
      <div class="form-group">
        <label for="image">image</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="Enter Image" value="{{$article->image}}">        
      </div>
      <a href="{{route('articles.index')}}" class="btn btn-warning">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@include('sweetalert::alert')

</body>
</html>