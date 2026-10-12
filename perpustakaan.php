<?php

// =====================================
// CLASS BOOK
// =====================================
class Book
{
    public $title;
    public $author;

    // Constructor
    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    // Method untuk menampilkan informasi buku
    public function getInfo()
    {
        return $this->title . " - " . $this->author;
    }
}


// =====================================
// CLASS MEMBER
// =====================================
class Member
{
    public $name;
    public $nim;
    public $borrowedBook;

    // Constructor
    public function __construct($name, $nim)
    {
        $this->name = $name;
        $this->nim = $nim;
        $this->borrowedBook = null;
    }

    // Method untuk meminjam buku
    public function borrowBook($book)
    {
        $this->borrowedBook = $book;
    }

    // Method untuk menampilkan informasi member
    public function getInfo()
    {
        return $this->name . " - " . $this->nim;
    }
}


// =====================================
// 1. MEMBUAT BEBERAPA OBJECT BOOK
// =====================================

$book1 = new Book(
    "Pemrograman PHP",
    "Nurul"
);

$book2 = new Book(
    "Belajar OOP PHP",
    "Haliz"
);

$book3 = new Book(
    "Dasar-Dasar Web",
    "Lona"
);


// =====================================
// 2. MEMBUAT OBJECT MEMBER
// =====================================

$member1 = new Member(
    "Lulu",
    "2410631250014"
);


// =====================================
// 5. SIMULASI PEMINJAMAN
// =====================================

$member1->borrowBook($book1);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Perpustakaan PHP</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .header {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 35px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
        }

        .header p {
            margin-top: 10px;
            color: #dfe6e9;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }

        h2 {
            color: #2c3e50;
        }

        .books {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .book {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .book-icon {
            font-size: 40px;
        }

        .book h3 {
            color: #2c3e50;
        }

        .book p {
            color: #666;
        }

        .member {
            background: white;
            margin-top: 30px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-box {
            background: #f4f6f8;
            padding: 15px;
            border-radius: 8px;
        }

        .info-box strong {
            display: block;
            margin-bottom: 5px;
        }

        .borrow {
            margin-top: 20px;
            padding: 18px;
            background: #e8f5e9;
            border-left: 5px solid #27ae60;
            border-radius: 6px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #777;
        }

        @media (max-width: 700px) {

            .books {
                grid-template-columns: 1fr;
            }

            .info {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>


<!-- HEADER -->

<div class="header">

    <h1>📚 Perpustakaan Sederhana</h1>

    <p>
        Simulasi PHP Object-Oriented Programming
    </p>

</div>


<div class="container">


    <!-- =================================
         3. MENAMPILKAN INFORMASI BUKU
         ================================= -->

    <h2>📖 Daftar Buku</h2>

    <div class="books">

        <div class="book">

            <div class="book-icon">📕</div>

            <h3>
                <?php echo $book1->title; ?>
            </h3>

            <p>
                Penulis:
                <?php echo $book1->author; ?>
            </p>

        </div>


        <div class="book">

            <div class="book-icon">📗</div>

            <h3>
                <?php echo $book2->title; ?>
            </h3>

            <p>
                Penulis:
                <?php echo $book2->author; ?>
            </p>

        </div>


        <div class="book">

            <div class="book-icon">📘</div>

            <h3>
                <?php echo $book3->title; ?>
            </h3>

            <p>
                Penulis:
                <?php echo $book3->author; ?>
            </p>

        </div>

    </div>


    <!-- =================================
         4. MENAMPILKAN INFORMASI MEMBER
         ================================= -->

    <div class="member">

        <h2>👤 Informasi Member</h2>

        <div class="info">

            <div class="info-box">

                <strong>Nama Member</strong>

                <?php echo $member1->name; ?>

            </div>


            <div class="info-box">

                <strong>NIM</strong>

                <?php echo $member1->nim; ?>

            </div>

        </div>


        <!-- =================================
             5. INFORMASI PEMINJAMAN
             ================================= -->

        <div class="borrow">

            <strong>📚 Status Peminjaman</strong>

            <p>

                <?php echo $member1->name; ?>

                meminjam buku:

                <strong>
                    "<?php echo $member1->borrowedBook->title; ?>"
                </strong>

            </p>

        </div>

    </div>

</div>


<div class="footer">

    Praktikum PHP OOP &copy; 2026

</div>


</body>
</html>