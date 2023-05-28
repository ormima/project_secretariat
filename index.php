<?php

$con = mysqli_connect('localhost', 'root', '', 'firma');

$sql1 = "SELECT `imie`, `nazwisko`, `adres`, `miasto`, `czyRODO`, `czyBadania` FROM `pracownicy` WHERE `pracownicy`.`id` = '2'";
$query1 = mysqli_query($con, $sql1);

$sql2 = "SELECT COUNT(`pracownicy`.`id`) AS liczba_pracownikow FROM `pracownicy`";
$query2 = mysqli_query($con, $sql2);

$sql3 = "SELECT `pracownicy`.`id`, `pracownicy`.`imie`, `pracownicy`.`nazwisko` FROM `pracownicy` WHERE `pracownicy`.`id` = '2'";
$query3 = mysqli_query($con, $sql3);

$sql4 = "SELECT `pracownicy`.`id`, `stanowiska`.`nazwa`, `stanowiska`.`opis` FROM `pracownicy` INNER JOIN `stanowiska` ON `pracownicy`.`stanowiska_id` = `stanowiska`.`id` WHERE `pracownicy`.`id` = '2'";
$query4 = mysqli_query($con, $sql4);

if($con){
    while($row1 = mysqli_fetch_row($query1)){
        if($row1[4] == 1){
            if($row1[5] == 1){
                $res1 = "<h3>dane</h3><p>".$row1[0]." ".$row1[1]."</p><hr><h3>adres</h3><p>".$row1[2]." ".$row1[3]."</p><hr><p>RODO: podpisano</p><p>Badania: aktualne";
            }else{
                $res1 = "<h3>dane</h3><p>".$row1[0]." ".$row1[1]."</p><hr><h3>adres</h3><p>".$row1[2]." ".$row1[3]."</p><hr><p>RODO: podpisano</p><p>Badania: nieaktualne";
            }
            
        }else{
            if($row1[5] == 1){
                $res1 = "<h3>dane</h3><p>".$row1[0]." ".$row1[1]."</p><hr><h3>adres</h3><p>".$row1[2]." ".$row1[3]."</p><hr><p>RODO: niepodpisano</p><p>Badania: aktualne";
            }else{
                $res1 = "<h3>dane</h3><p>".$row1[0]." ".$row1[1]."</p><hr><h3>adres</h3><p>".$row1[2]." ".$row1[3]."</p><hr><p>RODO: niepodpisano</p><p>Badania: nieaktualne"; 
            }
        }
    }
    while($row2 = mysqli_fetch_row($query2)){
        $res2 = $row2[0];
    }
    while($row3 = mysqli_fetch_row($query3)){
        $res3 = "<img src='./".$row3[0].".jpg' alt='pracownik'><h2>".$row3[1]." ".$row3[2]."</h2>";
    }
    while($row4 = mysqli_fetch_row($query4)){
        $res3 .= "<h4>".$row4[1]."</h4><h5>".$row4[2]."</h5>";
    }
}else{
    echo "Coś poszło nie tak";
}


mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="left">
                <h1>Akta Pracownicze</h1>
                <!-- php res 1 -->
                <?=
                    $res1;
                ?>
                <hr>
                <h3>Dokumenty pracownika</h3>
                <a href="./zad1/zad1/cv.txt">Pobierz</a>
                <h1>Liczba zatrudnionych pracowników</h1>
                <!-- php res 2 -->
                <p>
                <?=
                    $res2;
                ?>
                </p>
            </div>
            <div class="right">
                <!-- php res 3 -->
                <?=
                    $res3;
                ?>
            </div>
        </div>
        <footer>
            <p>Autorem aplikacji jest: <i>000</i></p>
            <ul>
                <li>skontaktuj się</li>
                <li>poznaj naszą firmę</li>
            </ul>
        </footer>
    </div>
</body>
</html>