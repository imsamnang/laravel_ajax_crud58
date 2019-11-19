@foreach ($cats as $key => $cat)
  <tr>
	<td>{{++$key}}</td>
	<td><img src="{{asset('Upload/Category/'.$cat->image)}}" width="40" height="40" alt="{{$cat->title}}"></td>
		<td>{{$cat->name}}</td>
		<td>
			<a href="#" class="btn btn-success btn-sm edit" data-id="{{$cat->id}}">Edit</a>
			<a href="#" class="btn btn-danger btn-sm delete" data-id="{{$cat->id}}">Delete</a>
		</td>
	</tr>
@endforeach