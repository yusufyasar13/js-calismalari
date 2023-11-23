<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Ders Konuları</title>
        <link type="text/css" rel="stylesheet" href="">
        <script type="text/javascript" language="javascript" src=""></script>
        <style>

        </style>
    </head>

    <body>

        <?php
        $GelenVeri = $_GET["deger"];
        if($GelenVeri!=""){
            $VeritabaniBaglantisi = mysqli_connect("localhost","root","","js_ders");
            if(!$VeritabaniBaglantisi){
                die("Veritabanı Bağlantı Hatası");
            }
            mysqli_select_db($VeritabaniBaglantisi,"js_ders");
            mysqli_set_charset($VeritabaniBaglantisi,"utf8");
    
            $KayitSorgula = mysqli_fetch_assoc(mysqli_query($VeritabaniBaglantisi,"SELECT * FROM kisiler WHERE id=$GelenVeri ORDER BY id ASC LIMIT 1"));
    
                $isimdegeri = $KayitSorgula["isim"];
                $soyisimdegeri = $KayitSorgula["soyisim"];
                $yasdegeri = $KayitSorgula["yas"];
                $meslekdegeri = $KayitSorgula["meslek"];
                $sehirdegeri = $KayitSorgula["sehir"];
    
            echo "İsim: ".$isimdegeri."<br>";
            echo "Soyisim: ".$soyisimdegeri."<br>";
            echo "Yaş: ".$yasdegeri."<br>";
            echo "Meslek: ".$meslekdegeri."<br>";
            echo "Şehir: ".$sehirdegeri."<br>";
    
            mysqli_close($VeritabaniBaglantisi);
            
        }else{
            echo "Lütfen geçerli bir kayıt seçiniz";
        }

       

        ?>
    </body>
</html>