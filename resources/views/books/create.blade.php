<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Buku</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #1e4264;
            min-height: 100vh;
            color: #172033;
        }

        /* =========================
           MAIN WRAPPER
        ========================= */

        .wrapper {
            width: 92%;
            max-width: 1100px;
            margin: 40px auto;
        }


        /* =========================
           TOP NAV
        ========================= */

        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .brand {
            color: white;
        }

        .brand-small {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 3px;
            opacity: 0.7;
            margin-bottom: 7px;
        }

        .brand h1 {
            margin: 0;
            font-size: 34px;
            letter-spacing: -1px;
        }

        .brand p {
            margin: 7px 0 0;
            color: #c8d9e8;
            font-size: 14px;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-link {
            text-decoration: none;
            color: white;

            border: 1px solid rgba(255,255,255,0.3);

            padding: 11px 18px;

            border-radius: 9px;

            font-size: 13px;
            font-weight: bold;

            background: rgba(255,255,255,0.08);

            transition: 0.2s;
        }

        .back-link:hover {
            background: rgba(255,255,255,0.17);
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            display: grid;

            grid-template-columns: 270px 1fr;

            background: white;

            border-radius: 18px;

            overflow: hidden;

            box-shadow: 0 20px 50px rgba(0,0,0,0.22);
        }


        /* =========================
           LEFT PANEL
        ========================= */

        .left-panel {
            background: #163750;

            padding: 35px 28px;

            color: white;

            display: flex;
            flex-direction: column;

            justify-content: space-between;
        }

        .panel-icon {
            width: 60px;
            height: 60px;

            border-radius: 15px;

            background: #2d6a94;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;

            margin-bottom: 25px;
        }

        .left-panel h2 {
            margin: 0 0 12px;

            font-size: 22px;

            line-height: 1.3;
        }

        .left-panel p {
            margin: 0;

            color: #b9cfdf;

            font-size: 13px;

            line-height: 1.7;
        }

        .tips {
            margin-top: 35px;
        }

        .tip-title {
            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1.5px;

            color: #8fb4cc;

            margin-bottom: 13px;
        }

        .tip {
            display: flex;

            gap: 9px;

            margin-bottom: 11px;

            font-size: 12px;

            color: #c9dbe8;

            line-height: 1.5;
        }

        .tip span {
            color: #70b4e3;
            font-weight: bold;
        }


        /* =========================
           FORM AREA
        ========================= */

        .form-area {
            padding: 35px 38px;
        }

        .form-header {
            margin-bottom: 25px;

            border-bottom: 1px solid #edf1f5;

            padding-bottom: 20px;
        }

        .form-header h2 {
            margin: 0;

            font-size: 21px;

            color: #172033;
        }

        .form-header p {
            margin: 6px 0 0;

            font-size: 13px;

            color: #94a3b8;
        }


        /* =========================
           ERROR
        ========================= */

        .error-box {
            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            border-radius: 10px;

            padding: 13px 16px;

            margin-bottom: 22px;

            font-size: 13px;
        }

        .error-box strong {
            display: block;
            margin-bottom: 6px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .error-box li {
            margin-bottom: 3px;
        }


        /* =========================
           FORM GRID
        ========================= */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            font-size: 13px;

            font-weight: bold;

            color: #334155;
        }

        .required {
            color: #ef4444;
        }


        /* =========================
           INPUT
        ========================= */

        input,
        select {
            width: 100%;

            padding: 12px 13px;

            border: 1px solid #d7dee7;

            border-radius: 9px;

            background: #fbfcfd;

            color: #172033;

            font-size: 14px;

            outline: none;

            transition: 0.2s;
        }

        input::placeholder {
            color: #9aa6b4;
        }

        input:hover,
        select:hover {
            border-color: #b8c4d1;
        }

        input:focus,
        select:focus {
            background: white;

            border-color: #3275a7;

            box-shadow: 0 0 0 3px rgba(50,117,167,0.10);
        }

        select {
            cursor: pointer;
        }


        /* =========================
           HINT
        ========================= */

        .hint {
            margin-top: 5px;

            font-size: 10px;

            color: #9aa6b4;
        }


        /* =========================
           ACTION
        ========================= */

        .actions {
            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 27px;

            padding-top: 20px;

            border-top: 1px solid #edf1f5;
        }

        .btn-cancel {
            text-decoration: none;

            padding: 11px 18px;

            border-radius: 9px;

            background: #f1f5f9;

            color: #64748b;

            font-size: 13px;

            font-weight: bold;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-submit {
            border: none;

            cursor: pointer;

            padding: 11px 20px;

            border-radius: 9px;

            background: #28638d;

            color: white;

            font-size: 13px;

            font-weight: bold;

            box-shadow: 0 6px 15px rgba(40,99,141,0.20);

            transition: 0.2s;
        }

        .btn-submit:hover {
            background: #1e5075;

            transform: translateY(-1px);
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .content {
                grid-template-columns: 1fr;
            }

            .left-panel {
                padding: 25px;

                display: block;
            }

            .tips {
                display: none;
            }

            .form-area {
                padding: 28px 25px;
            }
        }


        @media (max-width: 600px) {

            .wrapper {
                width: 94%;
                margin: 25px auto;
            }

            .top-nav {
                flex-direction: column;
                align-items: flex-start;

                gap: 17px;
            }

            .brand h1 {
                font-size: 29px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn-cancel,
            .btn-submit {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">


    <!-- HEADER -->

    <div class="top-nav">

        <div class="brand">

            <div class="brand-small">
                LIBRARY MANAGEMENT
            </div>

            <h1>
                Tambah Buku
            </h1>

            <p>
                Tambahkan koleksi baru ke perpustakaan.
            </p>

        </div>


        <a
            href="{{ route('books.index') }}"
            class="back-link"
        >
            ← Kembali
        </a>

    </div>


    <!-- CONTENT -->

    <div class="content">


        <!-- LEFT PANEL -->

        <div class="left-panel">

            <div>

                <div class="panel-icon">
                    📖
                </div>

                <h2>
                    Buku Baru
                </h2>

                <p>
                    Masukkan informasi buku dengan lengkap
                    agar koleksi perpustakaan tetap tertata
                    dengan baik.
                </p>


                <div class="tips">

                    <div class="tip-title">
                        Panduan
                    </div>

                    <div class="tip">
                        <span>✓</span>
                        <div>
                            Isi semua data yang wajib diisi.
                        </div>
                    </div>

                    <div class="tip">
                        <span>✓</span>
                        <div>
                            Pilih kategori yang sesuai.
                        </div>
                    </div>

                    <div class="tip">
                        <span>✓</span>
                        <div>
                            Pastikan jumlah stok benar.
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- FORM -->

        <div class="form-area">


            <div class="form-header">

                <h2>
                    Informasi Buku
                </h2>

                <p>
                    Lengkapi data berikut untuk menambahkan buku baru.
                </p>

            </div>


            <!-- ERROR -->

            @if ($errors->any())

                <div class="error-box">

                    <strong>
                        Periksa kembali data yang dimasukkan:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->

            <form
                action="{{ route('books.store') }}"
                method="POST"
            >

                @csrf


                <div class="form-grid">


                    <!-- JUDUL -->

                    <div class="form-group full">

                        <label for="judul">
                            Judul Buku
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="{{ old('judul') }}"
                            placeholder="Masukkan judul buku"
                            required
                        >

                        <div class="hint">
                            Contoh: Laskar Pelangi
                        </div>

                    </div>


                    <!-- PENULIS -->

                    <div class="form-group">

                        <label for="penulis">
                            Penulis
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="penulis"
                            name="penulis"
                            value="{{ old('penulis') }}"
                            placeholder="Nama penulis"
                            required
                        >

                    </div>


                    <!-- TAHUN -->

                    <div class="form-group">

                        <label for="tahun_terbit">
                            Tahun Terbit
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="tahun_terbit"
                            name="tahun_terbit"
                            value="{{ old('tahun_terbit') }}"
                            placeholder="Contoh: 2024"
                            min="1000"
                            max="{{ date('Y') }}"
                            required
                        >

                    </div>


                    <!-- STOK -->

                    <div class="form-group">

                        <label for="stok">
                            Stok
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            value="{{ old('stok') }}"
                            placeholder="Jumlah stok"
                            min="0"
                            required
                        >

                    </div>


                    <!-- KATEGORI -->

                    <div class="form-group">

                        <label for="category_id">
                            Kategori
                            <span class="required">*</span>
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            required
                        >

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <!-- ACTION -->

                <div class="actions">

                    <a
                        href="{{ route('books.index') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        + Simpan Buku
                    </button>

                </div>


            </form>

        </div>

    </div>

</div>

</body>
</html>