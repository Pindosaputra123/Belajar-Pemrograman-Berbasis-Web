<?php
// definisi kelas Book untuk merepresentasikan data buku
class Book {
    // properti privat untuk menyimpan data buku
    private $code_book;
    private $name;
    private $qty;

    // konstruktor untuk inisialisasi objek buku
    public function __construct($code_book, $name, $qty) {
        $this->name = $name;
        $this->setCodeBook($code_book);
        $this->setQty($qty);
    }

    // method privat untuk validasi dan menyimpan kode buku
    private function setCodeBook($code_book) {
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Format kode buku tidak sesuai. Gunakan format BB00 (2 huruf besar + 2 angka).\n";
        }
    }

    // method privat untuk validasi dan menyimpan jumlah buku
    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Jumlah buku harus bilangan bulat positif.\n";
        }
    }

    // mengembalikan kode buku
    public function getCodeBook() {
        return $this->code_book;
    }

    // mengembalikan nama buku
    public function getName() {
        return $this->name;
    }

    // mengembalikan jumlah buku
    public function getQty() {
        return $this->qty;
    }
}


function tampilkanInfoBuku($book) {
    if ($book->getCodeBook() && $book->getQty()) {
        echo "Kode Buku : " . $book->getCodeBook() . "\n";
        echo "Nama Buku : " . $book->getName() . "\n";
        echo "Jumlah    : " . $book->getQty() . "\n\n";
    } else {
        echo "Buku tidak valid. Beberapa data gagal disimpan.\n\n";
    }
}

// buku dengan data valid
$book1 = new Book("AB12", "Pemrograman PHP", 5);
tampilkanInfoBuku($book1);

// buku dengan kode tidak valid (huruf kecil)
$book2 = new Book("ab12", "Buku Salah", 3);
tampilkanInfoBuku($book2);

// buku dengan format kode salah
$book3 = new Book("A123", "Buku Format Salah", 4);
tampilkanInfoBuku($book3);

// buku dengan jumlah negatif
$book4 = new Book("CD34", "Jumlah Negatif", -5);
tampilkanInfoBuku($book4);

// buku dengan jumlah nol
$book5 = new Book("EF56", "Jumlah Nol", 0);
tampilkanInfoBuku($book5);
?>