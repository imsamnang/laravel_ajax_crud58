@foreach ($students as $res)
  <tr>
    <th scope="row">{{$res->id}}</th>
    <td><img src="{{asset('Upload/student/'.$res->photo)}}" alt="Photo" width="30" height="30"></td>
    <td>{{$res->nis}}</td>
    <td>{{$res->name}}</td>
    <td>{{$res->class}}</td>
    <td>
      <a href="" class="btn btn-warning btn-sm edit" id="{{$res->id}}" data-id="{{$res->id}}">Edit</a> 
      <a href="" class="btn btn-danger btn-sm delete" id="{{$res->id}}" data-id="{{$res->id}}">Del</a>
    </td>
  </tr>
@endforeach