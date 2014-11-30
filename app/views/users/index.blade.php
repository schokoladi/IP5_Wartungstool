<!doctype html>
<html>

<body>

<h1>Alle User</h1>
@foreach ($users as $user)
    <li>{{ link_to("/users/{$user->Name}", $user->Name) }}</li>
@endforeach
</body>
</html>