<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Pengguna</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0f2f5f;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-add {
            background: #fff;
            color: #0f2f5f;
        }

        .btn-edit {
            background: #f0ad4e;
            color: #fff;
        }

        .btn-delete {
            background: #d9534f;
            color: #fff;
        }

        .btn-detail {
            background: #5bc0de;
            color: #fff;
        }

        .btn-back {
            background: #6c757d;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            color: #222;
            border-radius: 12px;
            overflow: hidden;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #163d73;
            color: #fff;
        }

        .role-admin {
            color: #c0392b;
            font-weight: bold;
        }

        .role-petugas {
            color: #2980b9;
            font-weight: bold;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Kelola Pengguna</h1>

        <a href="{{ route('users.create') }}" class="btn btn-add">
            + Tambah Pengguna
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->role === 'admin')
                            <span class="role-admin">Admin</span>
                        @else
                            <span class="role-petugas">Petugas</span>
                        @endif
                    </td>

                    <td>
                        <div class="actions">

                            <a
                                href="{{ route('users.show', $user) }}"
                                class="btn btn-detail"
                            >
                                Detail
                            </a>

                            <a
                                href="{{ route('users.edit', $user) }}"
                                class="btn btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('users.destroy', $user) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-delete"
                                >
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">
                        Belum ada pengguna.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

    <br>

    <a href="{{ route('books.index') }}" class="btn btn-back">
        ← Kembali ke Buku
    </a>

</div>

</body>
</html>