<!DOCTYPE html>
<html>
<head>
	<title>Laravel Ajax Request using X-editable bootstrap Plugin Example</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
</head>

<body>
<div class="container">
	<h3 class="text-center">Laravel X-editable bootstrap Plugin</h3>
	<table class="table table-bordered">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Status</th>
			<th width="100px">Action</th>
		</tr>
			@foreach($users as $user)
				<tr>
					<td><a href="" class="update" data-name="first_name" data-type="text" data-pk="{{ $user->id }}" data-title="Enter First Name">{{ $user->first_name }}</a></td>
					<td><a href="" class="update" data-name="last_name" data-type="text" data-pk="{{ $user->id }}" data-title="Enter Last Name">{{ $user->last_name }}</a></td>
					<td><a href="" class="update" data-name="email" data-type="email" data-pk="{{ $user->id }}" data-title="Enter email">{{ $user->email }}</a></td>
					<td><a href="" class="update" data-name="gender" data-type="text" data-pk="{{ $user->id }}" data-title="Enter Gender">{{ $user->gender }}</a></td>
					<td><a href="" class="update" data-name="status" data-type="text" data-pk="{{ $user->id }}" data-title="Enter Status">{{ $user->status }}</a></td>
					<td><button class="btn btn-danger btn-sm">Delete</button></td>
				</tr>
			@endforeach
	</table>

</div>

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.update').editable({
			url: '/x-edit/update-user',
			type: 'text',
			pk: 1,
			name: 'name',
			title: 'Enter name'
	});
</script>

</body>
</html>