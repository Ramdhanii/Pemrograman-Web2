<?php 
// ini sebuah komentar
/* ini multi line komentar */
# ini juga komentar

// echo "Hello World <br>";
// echo 'Hello World <br>';
// print_r('Adam Malik <br>');
// var_dump('STT Nurul Fikri');

// Membuat variabel User
$nama = "Adam Malik";
$umur = 18;
$berat = 70.2;
$mahasiswa = true;

// echo "Nama saya adalah $nama <br>";
// echo "Umur saya $umur <br>";
// echo "Berat badan saya mencapai $berat kg";

// Membuat variabel Sistem
// echo "Dokumen Root" .$_SERVER["DOCUMENT_ROOT"];
// echo "<br>";
// echo "Nama File" .$_SERVER["PHP_SELF"];


// Mmebuat variabel Konstanta
define('PHI', 3.14);
$jari = 10;
$luas = PHI * $jari * $jari;
$keliling = 2 * PHI * $jari;

// echo "Luas Lingkaran dengan jari-jari $jari = $luas <br>";
// echo "Keliling Lingkarang dengan jari jari $jari = $keliling";

// Membuat Array

$programs = ["PHP", "Javascript", "HTML", "CSS"];

//echo $programs[0];
echo "Jumlah data variabel programs sebanyak ". count($programs) ."<br>";
foreach($programs as $program){
    echo "Bahasa $program <br>";
}

?>