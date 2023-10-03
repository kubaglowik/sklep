<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sklep dla uczniów</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <h1>Dzisiejsze promocje naszego sklepu</h1>
  </header>
  <main>
    <div class="lewy">
      <h2>taniej o 30%</h2>
      <div class="sk1">
        <ul>
          <?php
          $conn = mysqli_connect('localhost', 'root', '', 'sklep');
          $q = "SELECT nazwa FROM `towary` WHERE promocja=1";
          $result = mysqli_query($conn, $q);
          // var_dump($result);
          //  $l=mysqli_num_rows($result);
          while ($row = mysqli_fetch_row($result)) {
            echo $row[0] . "<br>";
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="srodek">
      <h2>sprawdź cenę!</h2>
      <form action="index.php" method="post">
        <select name="item" id="item">
          <?php
          $q = "SELECT nazwa,id FROM `towary` where idDostawcy=2";
          $result = mysqli_query($conn, $q);
          while ($row = mysqli_fetch_row($result)) {
            $name = $row[0];
            $id = $row[1];
            echo "<option value='" . $id . "'>" . $name . "</option>";
          }

          ?>

        </select>
        <input type="submit" name="submit" value="sprawdź">
      </form>
      <br><br><br>
      <div class="wyk">
        <?php

        if (isset($_POST["submit"])) {
          $id = $_POST["item"];

          echo "cena regularna = ";

          $price = "SELECT cena from towary where id=$id";
          $result = mysqli_query($conn, $price);

          $row = mysqli_fetch_row($result)[0];
          echo $row;
          echo "<br>";
          echo "cena -30% = ";

          $price2 = "SELECT round((cena-(cena*0.30)),1) from towary where id=$id";
          $result2 = mysqli_query($conn, $price2);

          $row2 = mysqli_fetch_row($result2)[0];
          echo $row2;
        }
        ?>
      </div>
    </div>
    <div class="prawy">
      <h2>kontakt</h2>
      <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
      <img src="promocja.png" alt="promocja" id="img">
    </div>
  </main>
  <footer>
    <h4>autor strony:000000000</h4>
  </footer>
</body>

</html>