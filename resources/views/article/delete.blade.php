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
    <div class="alert alert-danger" id="error_copy">
        @foreach ($errors->all() as $error)
          {{$error}}<br/>
        @endforeach
    </div>
  @endif
    <form method="POST" action="{{route('articles.destroy',$article->id)}}" role="form">
      {{ csrf_field() }}
      {{method_field('DELETE')}}
      <p style="font-size: 20px; font-weight: bold" class="text-center text-danger">
        Are you sure, You want to delete this Article-({{$article->title}})?
      </p>
      <div class="text-center">
        <a href="{{route('articles.index')}}" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </form>
</div>

@include('sweetalert::alert')

</body>
</html>