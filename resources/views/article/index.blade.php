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
  <p>
    @if (Session::has('success_message'))
      <div class="alert alert-success">
        {{Session::get('success_message')}}
      </div>
    @endif      
  </p>
    <a href="{{route('articles.create')}}" class="btn btn-primary btn-sm">New Post</a>
  <br>
  <br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="getdataTable">
      @foreach ($articles as $key => $item)
        <tr>
          <td>{{++$key}}</td>
          <td>{{$item->title}}</td>
          <td>{{$item->body}}</td>
          <td>{{$item->image}}</td>
          <td>
            <a href="" class="btn btn-info btn-sm">View</a>
            <a href="{{route('articles.edit',$item->id)}}" class="btn btn-success btn-sm">Edit</a>
            <a href="{{route('articles.show',$item->id)}}" class="btn btn-danger btn-sm">Del</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('sweetalert::alert')
<script type="text/javaScript">
 
</script>
</body>
</html>