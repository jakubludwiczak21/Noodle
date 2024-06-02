<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../jquery-3.7.1min.js"></script>
<title>Noodle™</title>
<link rel="stylesheet" href="styles.css">
</head>

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
                    <h2>Jakim rodzajem chleba jesteś? - TEST KOŃCOWY</h2>
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
        <div class="number-box" data-target="1">1</div>
        <div class="number-box" data-target="2">2</div>
        <div class="number-box" data-target="3">3</div>
        <div class="number-box" data-target="4">4</div>
        <div class="number-box" data-target="5">5</div>
        <div class="number-box" data-target="6">6</div>
      </div>


        <h2 style="padding: 2em;padding-bottom:1em;text-align:left;width:100%">Rozwiąż test</h2>


        <form method="POST" class="test" onsubmit="return confirmSubmission(event)">
          <div class="rounded-container">
            <div class="pytanie zamkniete">
              <div class="numerpyt">
                <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">1</label></h3>
                <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer">1</label> </h4>
              </div>
              <hr style="margin-bottom: 0.75em;">
              <div class="odpowiedzi">
                <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">Jaki chlebek lubisz najbardziej?</label><br>
                <input type="radio" name="1" id="1_1"><label for="1_1">Pszenny</label><br>
                <input type="radio" name="1" id="1_2"><label for="1_2">Razowy</label><br>
                <input type="radio" name="1" id="1_3"><label for="1_3">Żytni</label><br>
                <input type="radio" name="1" id="1_4"><label for="1_4">Tostowy</label><br>
              </div>
            </div>
            <div class="pytanie zamkniete_wiel">
              <div class="numerpyt">
                <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">2</label></h3>
                <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer">1</label> </h4>
              </div>
              <hr style="margin-bottom: 0.75em;">
              <div class="odpowiedzi">
                <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">Wybierz składniki na idealny chleb:</label><br>
                <input type="checkbox" name="2" id="2_1"><label for="2_1">Woda</label><br>
                <input type="checkbox" name="2" id="2_2"><label for="2_2">Mąka</label><br>
                <input type="checkbox" name="2" id="2_3"><label for="2_3">Cukier</label><br>
                <input type="checkbox" name="2" id="2_4"><label for="2_4">Mak</label><br>
                <input type="checkbox" name="2" id="2_5"><label for="2_5">Ziarno</label><br>
              </div>
            </div>
            <div class="pytanie otwarte">
              <div class="numerpyt">
                <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">3</label></h3>
                <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer">2</label> </h4>
              </div>
              <hr style="margin-bottom: 0.75em;">
              <div class="odpowiedzi">
                <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">Opisz chleb znajdujący się na fotografii:</label><br>
                <img class="zdjodp" src="../zdjecia/chleb.jpg" alt="3_0">
                <textarea rows="3" id="3_1" name="3"  cols="50" placeholder="Odpowiedz na pytanie" class="full-width"></textarea>
              </div>
            </div>
            <div class="pytanie zamkniete">
              <div class="numerpyt">
                <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">4</label></h3>
                <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer">3</label> </h4>
              </div>
              <hr style="margin-bottom: 0.75em;">
              <div class="odpowiedzi">
                <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">Który z poniższych chlebów jest bezglutenowy?</label><br>
                <img class="zdjodp" src="../zdjecia/bezglutenowy.jpg" alt="4_0">
                <input type="radio" name="4" id="4_1"><label for="4_1">Pszenny</label><br>
                <input type="radio" name="4" id="4_2"><label for="4_2">Żytni</label><br>
                <input type="radio" name="4" id="4_3"><label for="4_3">Bezglutenowy</label><br>
                <input type="radio" name="4" id="4_4"><label for="4_4">Orkiszowy</label><br>
              </div>
            </div>
            <div class="pytanie zamkniete_wiel">
              <div class="numerpyt">
                <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">5</label></h3>
                <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer">2</label> </h4>
              </div>
              <hr style="margin-bottom: 0.75em;">
              <div class="odpowiedzi">
                <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">Wybierz składniki do wypieku chleba orkiszowego:</label><br>
                <input type="checkbox" name="5" id="5_1"><label for="5_1">Mąka orkiszowa</label><br>
                <input type="checkbox" name="5" id="5_2"><label for="5_2">Drożdże</label><br>
                <input type="checkbox" name="5" id="5_3"><label for="5_3">Sól</label><br>
                <input type="checkbox" name="5" id="5_4"><label for="5_4">Woda</label><br>
                <input type="checkbox" name="5" id="5_5"><label for="5_5">Miód</label><br>
              </div>
            </div>
            <div class="pytanie otwarte">
              <div class="numerpyt">
                <h3 style="margin-bottom: 0.5em;margin-top:1em">Pytanie nr <label class="full-width" for="numer">6</label></h3>
                <h4 style="margin-bottom: 0.5em;margin-top:1em;font-weight:normal">Liczba punktów: <label class="full-width" for="numer">3</label> </h4>
              </div>
              <hr style="margin-bottom: 0.75em;">
              <div class="odpowiedzi">
                <label for="tresc" style="padding-bottom: 0.5em;font-size:110%">Napisz dokładny przepis na kremówki papieskie</label><br>
                <textarea rows="3" id="6_1" name="6"  cols="50" placeholder="Odpowiedz na pytanie" class="full-width"></textarea>
              </div>
            </div>
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
        window.location.href = "moje_testy.php";
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
