<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Detail Pengguna</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0f2f5f;
            color: white;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
        }

        .card {
            background: white;
            color: #222;
            padding: 30px;
            border-radius: 15px;
        }

        .item {
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }

        .label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 18px;
            border-radius: 8px;
            background: #777;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Detail Pengguna</h1>

        <div class="item">
            <span class="label">Nama</span>
            {{ $user->name }}
        </div>

        <div class="item">
            <span class="label">Email</span>
            {{ $user->email }}
        </div>

        <div class="item">
            <span class="label">Role</span>
            {{ ucfirst($user->role) }}
        </div>

        <a href="{{ route('users.index') }}">
            ← Kembali
        </a>

    </div>

</div>

</body>
</html>