<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="jquery-3.7.1min.js"></script>
<title>Noodle™</title>
<link rel="stylesheet" href="html/styles.css">
</head>

<body>
<div class="wrapper">
  <div class="header-content" id="head">
    <h1>Noodle™ - Twoje testy Online</h1>
  </div>
  <div class="container">

    <div class="sidebar" id="menu">
      
      <ul>
        <h2>Menu</h2>
        <li><a href="../../index.php">Strona główna</a></li>
        <li><a href="../dolacz_kod.php">Dołącz do testu</a></li>
        <li><a href="../moje_testy.php">Moje testy</a></li>
        <li><a href="../panel_nauczyciela/panel_nauczyciela.php"  class="aktualna-strona">Panel nauczyciela</a></li>
      </ul>


      <ul>
        <li><a href="../kontakt.php">Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
      <div class="haslo">
        <p>Nauczycielski panel administracyjny</p>
        <br>
                <form method="POST">
                    <label class="full-width" for="login">Login</label>
                    <input class="full-width" type="text" name="login" id="login" required>
                    <label class="full-width" for="haslo">Hasło</label>
                    <input class="full-width" type="password" name="haslo" id="haslo" required>
                    <div style="display: flex;padding-left:10%;align-items: center;"><input style="padding:0px;width:20px;height:20px" type="checkbox" onclick="showpass()" name="pokaz" id="pokaz"><label style="padding-left:10%;" for="pokaz" >Pokaż hasło</label></div>
                    <input type="submit" value="Zaloguj" name="zaloguj" class="zaloguj">
                </form>
        </div>
        <!--<p><a href="dodaj.php">Dodawanie pytan i testów (Link Roboczy)</a></p> -->
    </div>
    
  </div>
  <div class="footer" id="stopka">
    <p>&copy; Strona testowa. Wszelkie prawa zastrzeżone.</p> 
  </div>

</div>



<script>
var headHeight = $('#head').height() + parseInt($('#head').css('padding-top')) + parseInt($('#head').css('padding-bottom'));
var stopkaHeight = $('#stopka').height() + parseInt($('#stopka').css('padding-top')) + parseInt($('#stopka').css('padding-bottom'));
var menuMargin = parseInt($('#menu').css('margin-top')) + parseInt($('#menu').css('margin-bottom'));



var H = headHeight + stopkaHeight + menuMargin;
$("#menu").css('min-height', "calc(100vh - " + H + "px)");
$("#main").css('min-height', "calc(100vh - " + H + "px)");

var T = $('#head').height();
  $(".sidebar").css('top', T+ "px");


  function showpass(){
                var pass = document.getElementById("haslo");
                if (pass.type === "password") {
                    pass.type = "text";
                } else {
                    pass.type = "password";
                }
            }
</script>
</body>
</html>

<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "baza";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['haslo'];
    //echo $password;

    $stmt = $conn->prepare("SELECT u.id, u.imie, u.nazwisko, u.typ_konta, l.login, h.haslo FROM uzytkownicy u 
                            INNER JOIN uzytkownicy_hasla h ON u.id = h.id_uzytkownika 
                            INNER JOIN uzytkownicy_loginy l ON u.id = l.id_uzytkownika 
                            WHERE l.login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {   
        $row = $result->fetch_assoc();
        //echo $row['haslo'];
        if ($password == $row['haslo']) { // dla bezpieczeństwa powinno się użyc if (password_verify($password, $row['haslo'])) {   ale nie mamy hasowania haseł w bazie danych uwzględnionego
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['imie'] . ' ' . $row['nazwisko'];
            $_SESSION['typ_konta'] = $row['typ_konta'];
            //echo $_SESSION['typ_konta'];

            if($_SESSION['typ_konta'] == 1) {
                $_SESSION['location'] = "html/panel_nauczyciela/";
                //echo "Nauczyciel";
            }
            else {
                $_SESSION['location'] = "html/panel_ucznia/";
                //echo "Uczen";
            }
            header ("Location: " . $_SESSION['location'] ."strona_glowna.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that login.";
    }

    $stmt->close();
  }

  $conn->close();
?>