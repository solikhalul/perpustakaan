<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pengguna</title>

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

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button,
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #0f2f5f;
            color: white;
        }

        .back {
            background: #777;
            color: white;
        }

        .error {
            color: #b00020;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Pengguna</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama</label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
            >

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Password Baru</label>

            <input
                type="password"
                name="password"
                placeholder="Kosongkan jika tidak ingin mengubah password"
            >

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror


            <label>Role</label>

            <select name="role" required>
                <option
                    value="admin"
                    {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}
                >
                    Admin
                </option>

                <option
                    value="petugas"
                    {{ old('role', $user->role) === 'petugas' ? 'selected' : '' }}
                >
                    Petugas
                </option>
            </select>

            @error('role')
                <div class="error">{{ $message }}</div>
            @enderror


            <button type="submit">
                Simpan Perubahan
            </button>

            <a href="{{ route('users.index') }}" class="back">
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>