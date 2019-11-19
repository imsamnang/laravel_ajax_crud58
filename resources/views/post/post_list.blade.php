@foreach ($posts as $key => $post)
  <tr>
	<td>{{++$key}}</td>
	<td><img src="{{asset('Upload/Post/'.$post->image)}}" width="40" height="40" alt="{{$post->title}}"></td>
		<td>{{$post->title}}</td>
		<td>{{$post->body}}</td>
		<td>
			<a href="#" class="btn btn-success btn-sm edit" data-id="{{$post->id}}">Edit</a>
			<a href="#" class="btn btn-danger btn-sm delete" data-id="{{$post->id}}">Delete</a>
		</td>
	</tr>
@endforeach