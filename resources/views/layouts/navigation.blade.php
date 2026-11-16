
<nav style="
    background: #123b70;
    padding: 18px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    color: white;
">

    <div style="font-size: 22px; font-weight: bold;">
        📚 PERPUSTAKAAN
    </div>

    <div style="
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    ">

        <a href="{{ route('dashboard') }}"
           style="color:white; text-decoration:none; padding:10px;">
            Dashboard
        </a>

        <a href="{{ route('books.index') }}"
           style="color:white; text-decoration:none; padding:10px;">
            Buku
        </a>

        <a href="{{ route('categories.index') }}"
           style="color:white; text-decoration:none; padding:10px;">
            Kategori
        </a>

        <a href="{{ route('members.index') }}"
           style="color:white; text-decoration:none; padding:10px;">
            Anggota
        </a>

        <a href="{{ route('loans.index') }}"
           style="color:white; text-decoration:none; padding:10px;">
            Peminjaman
        </a>

        @can('manage-users')
            <a href="{{ route('users.index') }}"
               style="color:white; text-decoration:none; padding:10px;">
                Pengguna
            </a>
        @endcan

        <span style="color:#dbeafe; padding:10px;">
            {{ Auth::user()->name ?? 'Pengguna' }}
        </span>

        <form action="{{ route('logout') }}" method="POST" style="margin:0;">
            @csrf

            <button type="submit" style="
                background:#dc3545;
                color:white;
                border:none;
                padding:10px 16px;
                border-radius:6px;
                cursor:pointer;
            ">
                Logout
            </button>
        </form>

    </div>
</nav>
