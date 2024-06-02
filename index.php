<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <!-- <link rel="stylesheet" href="bensin.css"> -->
    <style>
        body{
            display: grid;
            justify-content: center;
        }
        .kotak{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="kotak">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        class Shell {
            public $jumlah, $jenis, $ppn;
            public $DataHarga = [
                "Shell Super" => 15420,
                "Shell V-Power" => 16130,
                "Shell V-Power Diesel" => 18310,
                "Shell V-Power Nitro" => 16510
            ];
            public function __construct($jumlah, $jenis) {
                $this->jumlah = $jumlah;
                $this->jenis = $jenis;
                $this->ppn = $this->DataHarga[$jenis] * (1 +(10 / 100));
            }
            public function getJumlah() {
                return $this->jumlah;
            }
            public function getJenis(){
                return $this->jenis;
            }
            public function getHasil() {
                return $this->jumlah * $this->ppn;
            }
        }

        class Beli extends Shell {
            public function getSeluruh() {
                $total = $this->getHasil();
                echo "------------------------------------------------------------------------<br>";
                echo "Anda membeli bahan bakar minyak tipe " . $this->getJenis() . "<br> Dengan jumlah : " . $this->getJumlah() . " Liter <br> Total yang harus anda bayar Rp. " . number_format($total,0,',','.') . "<br>";
                echo "------------------------------------------------------------------------<br>";
            }
        }

        $beli = new Beli($_POST['jumlah'], $_POST['jenis']);
        $beli->getSeluruh();
    }
    ?>
    </div>
    <form method="post" action="">
        <label for="">Masukkan Jumlah Liter :</label>
        <input type="number" name="jumlah"><br>
        <label for="">Pilih Tipe Bahan Bakar :</label>
        <select name="jenis" id="">
            <option value="Shell Super">Shell Super</option>
            <option value="Shell V-Power">Shell V-Power</option>
            <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
            <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
        </select><br>
        <input type="submit" value="Beli">
    </form>
</body>
</html>
