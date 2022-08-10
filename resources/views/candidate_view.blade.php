<!DOCTPE html>
<html>
<head>
<title>Candidate Records</title>
</head>
<body>
<table border = "1">
<tr>
<td>Name</td>
<td>Address</td>
<td>Education</td>
<td>Work</td>
<td>Experience</td>
</tr>
@foreach ($users as $user)
<tr>

<td>{{ $user->first_name }}</td>
<td>{{ $user->last_name }}</td>
<td>{{ $user->city_name }}</td>
<td>{{ $user->email }}</td>
</tr>
@endforeach
</table>
</body>
</html>