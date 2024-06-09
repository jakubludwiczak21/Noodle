<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../jquery-3.7.1min.js"></script>
<title>Noodle™</title>
<link rel="stylesheet" href="styles.css">
</head>

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

  $kod_testu = $_GET['kod'];

  $get_test_id = "SELECT id_testu FROM `testy_przeprowadzane` WHERE kod_testu = '$kod_testu'";
  $result = $conn->query($get_test_id);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_testu = $row['id_testu'];

    $get_test_title = $conn->query("SELECT tytuł FROM testy_stworzone WHERE id = '$id_testu';");
    $title_row = $get_test_title->fetch_assoc();
    $test_title = $title_row['tytuł'];

  }

  else {
    if (isset($_SESSION['user_id'])) {
      header("Location: panel_ucznia/dolacz_kod.php");
    }

    else { 
    header("Location: panel_ucznia/dolacz_kod_nologin.php");
    }

    exit();
  }


  if (!isset($_SESSION['user_id'])) {
    $kod_osoby = $_GET['kod_osoby'];
    $id_osoby = null;
  }
  else {
    $kod_osoby = NULL;
    $id_osoby = $_SESSION['user_id'];
  }

  $get_type = "SELECT id, nazwa_typu FROM typ_pytania;";
  


  $type_result = $conn->query($get_type);
  if ($type_result->num_rows > 0) {
    while($row = $type_result->fetch_assoc()) {
      if($row['nazwa_typu'] == 'Zamkniete') {
        $zamkniete = $row['id'];
      }
      elseif($row['nazwa_typu'] == 'Otwarte') {
        $otwarte = $row['id'];
      }
      elseif($row['nazwa_typu'] == 'Wielokrotnego') {
        $wielokrotnego = $row['id'];
      }
    }
  }

  // przesylanie odpowiedzi

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $stmt_closed = $conn->prepare("INSERT INTO odpowiedzi_podane (id_testu, id_osoby, kod_osoby, id_odpowiedz, id_pytania) VALUES (?, ?, ?, ?, ?)");
    $stmt_open = $conn->prepare("INSERT INTO odpowiedzi_podane (id_testu, id_osoby, kod_osoby, tresc_odpowiedzi, id_pytania) VALUES (?, ?, ?, ?, ?)");
  
    foreach ($_POST as $question_id => $answer) {
      $question_type_query = $conn->query("SELECT typ_pytania FROM pytania WHERE id = $question_id");
      $question_type_row = $question_type_query->fetch_assoc();
      $question_type = $question_type_row['typ_pytania'];
  
      if ($question_type == $zamkniete || $question_type == $wielokrotnego) {
        if (is_array($answer)) {
          foreach ($answer as $single_answer) {
            $stmt_closed->bind_param("iisii", $id_testu, $id_osoby, $kod_osoby, $single_answer, $question_id);
            $stmt_closed->execute();
          }
        } else {
          $stmt_closed->bind_param("iisii", $id_testu, $id_osoby, $kod_osoby, $answer, $question_id);
          $stmt_closed->execute();
        }
      } elseif ($question_type == $otwarte) {
        $stmt_open->bind_param("iissi", $id_testu, $id_osoby, $kod_osoby, $answer, $question_id);
        $stmt_open->execute();
      }
    }
  
    $stmt_closed->close();
    $stmt_open->close();
    header("Location: panel_ucznia/moje_testy.php");
    exit();
}


?>


<body>
<div class="wrapper">
  <div class="header-content" id="head">
    <h1>Noodle™ - Twoje testy Online</h1>
  </div>
  <div class="container" id="con">

    <div class="sidebar" id="menu">
      
      <ul>
        <h2>Menu</h2>
        <li><a href="../index.php">Strona główna</a></li>
        <li ><a href="panel_ucznia/dolacz_kod.php" class="aktualna-strona">Dołącz do testu</a></li>
        <li><a href="panel_ucznia/moje_testy.php" >Moje testy</a></li>
      </ul>


      <ul>
        <li><a href="kontakt.php" >Kontakt</a></li>
      </ul>
    </div>
    <div class="main-content" id="main">
    <div class="teststicky">
                <div style="display: flex; justify-content: left;align-items:center;max-width:70%;">
                  <?php
                    echo "<h2>" . $test_title . "</h2>";
                  ?>
                </div>
                <div style="display: flex; justify-content: space-between; align-items:center;min-width:30%;">
                    <div class="rounded-button">
                      <a href="#wybierz-pytanie">Zobacz Pytania</a>
                    </div>
                    <div style="min-width: 65%;">
                        <div style="display: flex; justify-content: space-between; align-items:center;padding-bottom: 1em">
                            <p style="font-weight: bold;">Data wykonania:</p>
                            <p id="data-wykonania" style="text-align: right;"></p> 
                        </div>
                      
                        <div style="display: flex; justify-content: space-between; align-items:center;">
                            <p style="font-weight: bold;">Pozostało:</p>
                            <p id="pozostalo" style="text-align: right;"></p> 
                        </div>
                    </div>

                </div>
            </div>
      <div class="haslo">
        
      <h2 id="wybierz-pytanie" style="padding: 2em;padding-bottom:1em;text-align:left;width:100%">Wybierz pytanie</h2>
      <div class="rounded-container">
        <?php
          $count_questions_sql = "SELECT COUNT(id_pytania) AS liczba_pytan FROM testy_pytania WHERE id_testu = $id_testu GROUP BY id_testu;"; 
          $result = $conn->query($count_questions_sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            for($x=1; $x <= $row['liczba_pytan']; $x++) {
              echo '<div class="number-box" data-target="' . $x . '">' . $x . '</div>';
            }
          }  
        ?>
      </div>


        <h2 style="padding: 2em;padding-bottom:1em;text-align:left;width:100%">Rozwiąż test</h2>


        <form method="POST" class="test" onsubmit="return confirmSubmission(event)">
          <div class="rounded-container">
            <?php
              $get_question = "SELECT p.id AS id, p.tresc, p.typ_pytania , p.zdjecie
                              FROM pytania p
                              JOIN testy_pytania tp ON p.id = tp.id_pytania
                              WHERE tp.id_testu = $id_testu;";

              $result = $conn->query($get_question);
              if ($result->num_rows > 0) {
                $num_question = 1;
                while($question_row = $result->fetch_assoc()) {
                  echo '<div class="pytanie">
                          <div class="numerpyt">
                            <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">'. $num_question . '</label></h3>
                            <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer"> 1 </label> </h4>
                          </div>
                          <hr style="margin-bottom: 0.75em;">
                          <div class="odpowiedzi">
                            <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">' . $question_row['tresc'] .  '</label><br>';
                  if (!is_null($question_row['zdjecie'])) {
                    echo '<img class="zdjodp" src="../zdjecia/' . $question_row['zdjecie'] . '" alt="3_0">';
                  }

                  $get_answers = "SELECT id, tresc AS odpowiedz FROM odpowiedzi WHERE id_pytania =" . $question_row['id'] . ";";
                  $answer_result = $conn->query($get_answers);
                  if ($answer_result->num_rows > 0) {
                    $answer_num = 1;
                    while ($answer_row = $answer_result->fetch_assoc()) {
                      if ($question_row['typ_pytania'] == $zamkniete) {
                        echo '<input type="radio" name="' . $question_row['id'] . '" value="' . $answer_row['id'] . '" id="' . $num_question . '_' . $answer_num . '"><label for="' . $num_question . '_' . $answer_num . '">' . $answer_row['odpowiedz'] . '</label><br>';
                      }

                      if ($question_row['typ_pytania'] == $wielokrotnego) {
                        echo '<input type="checkbox" name="' . $question_row['id'] . '[]" value="' . $answer_row['id'] . '" id="' . $num_question . '_' . $answer_num . '"><label for="' . $num_question . '_' . $answer_num . '">' . $answer_row['odpowiedz'] . '</label><br>';
                      }

                      $answer_num++;
                    }
                  }

                  if ($question_row['typ_pytania'] == $otwarte) {
                    echo '<textarea rows="3" id="3_1" name="' . $question_row['id'] . '"  cols="50" placeholder="Odpowiedz na pytanie" class="full-width"></textarea>';
                  }

                  echo '</div>
                        </div>';

                  $num_question++;
                }
              }
            ?>
          </div>
          <input style="width: 50%;" type="submit" value="Zatwierdź" name="zaloguj" class="zaloguj" id="zaloguj">
        </form>
        </div>
   
  </div>
  </div>
  <div class="footer" id="stopka">
    <p>&copy; Strona testowa. Wszelkie prawa zastrzeżone.</p>
  </div>

</div>

<script>
$(document).ready(function() {
  var czasRozpoczecia = new Date().getTime();

  function getOffsetHeight(selector) {
    var element = $(selector);
    return element.outerHeight(true); 
  }

  function calculateScrollOffset(target) {
    var stickyElementHeight = getOffsetHeight('.teststicky');
    var totalOffset = getOffsetHeight('#head') + stickyElementHeight;
    var targetElement = $(target);
    return targetElement.offset().top - totalOffset;
  }

  $('.rounded-button').on('click', function() {
    var scrollToPosition = calculateScrollOffset('#wybierz-pytanie');
    $('html, body').animate({
      scrollTop: scrollToPosition
    }, 500);
  });

  $('.number-box').on('click', function() {
    var target = $(this).data('target');
    var scrollToElement = $('.pytanie').eq(target - 1);
    var scrollToPosition = calculateScrollOffset(scrollToElement);
    $('html, body').animate({
      scrollTop: scrollToPosition
    }, 500);
  });

  $('.test input[type="radio"], .test input[type="checkbox"]').change(function() {
    var questionNumber = $(this).attr('name');
    var inputFilled = $('input[name="' + questionNumber + '"]:checked').length > 0;
    updateNumberBoxFilledClass(questionNumber, inputFilled);
  });

  $('.test input[type="text"], .test textarea').on('input', function() {
    var questionNumber = $(this).attr('name');
    var inputFilled = $(this).val().trim().length > 0;
    updateNumberBoxFilledClass(questionNumber, inputFilled);
  });

  function updateNumberBoxFilledClass(questionNumber, inputFilled) {
    if (inputFilled) {
      $('.number-box[data-target="' + questionNumber + '"]').addClass('filled');
    } else {
      $('.number-box[data-target="' + questionNumber + '"]').removeClass('filled');
    }
  }

  function odswiezCzas() {
    var teraz = new Date().getTime();
    var roznica = czasRozpoczecia + 45 * 60 * 1000 - teraz;

    var minuty = Math.floor((roznica % (1000 * 60 * 60)) / (1000 * 60));
    var sekundy = Math.floor((roznica % (1000 * 60)) / 1000);

    minuty = minuty < 10 ? "0" + minuty : minuty;
    sekundy = sekundy < 10 ? "0" + sekundy : sekundy;

    $('#pozostalo').text(minuty + ":" + sekundy + " z 45min");

    if (roznica <= 0) { 
      clearInterval(timer);
      $('#zaloguj').click(); 
    }
    return minuty + ":" + sekundy;
  }

  odswiezCzas(); 
  var timer = setInterval(odswiezCzas, 1000);

  function confirmSubmission(event) {
    event.preventDefault();
    console.log("Confirm submission triggered.");
    var remainingTime = odswiezCzas();
    console.log("Remaining time:", remainingTime);
    var unansweredQuestions = [];

    $('.number-box').each(function() {
        if (!$(this).hasClass('filled')) {
            unansweredQuestions.push($(this).data('target'));
        }
    });

    var message = `Czy na pewno chcesz zakończyć test? Czas do zakończenia: ${remainingTime}`;
    if (unansweredQuestions.length > 0) {
        message += `\nNastępujące pytania nie są wypełnione: ${unansweredQuestions.join(', ')}`;
    }

    console.log("Submission confirmation message:", message);

    if (confirm(message)) {
        console.log("User confirmed submission, redirecting to 'moje_testy.php'.");
        event.target.submit();
        //window.location.href = "panel_ucznia/moje_testy.php"; <-- to nie pozwala na przeslanie danych do bazy
    } else {
        console.log("Submission cancelled, scrolling to top.");
        var scrollToPosition = calculateScrollOffset('#wybierz-pytanie');
        $('html, body').animate({
            scrollTop: scrollToPosition
        }, 500);
    }
}

$('.test').on('submit', confirmSubmission);

  

  var dataWykonania = "19.05.2024 23:59";
  $('#data-wykonania').text(dataWykonania);

  var headHeight = getOffsetHeight('#head');
  var stopkaHeight = getOffsetHeight('#stopka');
  var menuMargin = parseInt($('#menu').css('margin-top')) + parseInt($('#menu').css('margin-bottom'));
  var H = headHeight + stopkaHeight + menuMargin;
  $("#menu").css('min-height', "calc(100vh - " + H + "px)");

  var T = $('#head').height();
  var M = headHeight;

  $(".sidebar").css('top', T + "px");
  $(".teststicky").css('top', M + "px");
});
</script>

</body>
</html>