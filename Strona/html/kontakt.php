<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="../jquery-3.7.1min.js"></script>
<title>Noodle™</title>
<link rel="stylesheet" href="styles.css">
</head>

<style> 
    .cofnij-kontakt {
        padding: 1em;
        font-family: calibri;
        width: 100%;
        font-size: large;
        border: 1px solid orange;
        resize: vertical;
        border-radius: 10px;
        margin-top: 1em;
    }
    .cofnij-kontakt:hover {
        background-color: rgb(210, 210, 210);
    }
    
    input[type="submit" i]:hover {
        background-color: rgb(210, 210, 210);
    }
</style> 


<body>
<div class="wrapper">
  <div class="header-content" id="head">
    <h1>Noodle™ - Twoje testy Online</h1>
  </div>
  <div class="container" style="align-items: center;">

    <div class="main-content" id="main">
      <div class="haslo">
        <p>Napisz do nas</p>
        <br>
        <form>
            <input type="text" name="first_name" placeholder="Imię" id="imie" class="full-width-small" onchange="SprawdzImie()" required>
            <input type="text" name="last_name" placeholder="Nazwisko" id="nazwisko" class="full-width-small" onchange="SprawdzNazwisko()" required>
            <input type="text" name="subject" placeholder="Temat" class="full-width" id="temat" onchange="SprawdzTemat()" required>
            <input type="text" name="email" placeholder="E-mail" class="full-width" id="email" onchange="SprawdzEmail()" required>
            <textarea rows="5" name="message" cols="50" placeholder="Twoja Wiadomość" class="full-width" id="wiadomosc" onchange="SprawdzWiadomosc()" required></textarea>
            <span class="full-width">
                <span class="wider small-width">
                    <input type="submit" name="submit" value="Wyślij" class="wider zatwierdz">
                </span>
                <span>
                    <button type="button" onclick="history.back()" class="cofnij-kontakt">Cofnij</button>
                </span>
            </span>
        </form>

        </div>
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

            function SprawdzImie()
                {
                        Imie=document.getElementById("imie").value;
                        Warunek1 = /^[A-ZĆŁŚŻŹ][a-ząćęłńóśżź]{2,20}$/.test(Imie);
                        if(Warunek1==true)
                        {
                            document.getElementById('imie').style.borderColor = "green";
                            document.getElementById('imie').style.color = "green";
                        }
                        else if(Warunek1!=true && Imie!="")
                        {
                            document.getElementById('imie').style.borderColor = "red";
                            document.getElementById('imie').style.color = "red";
                            alert("Wpisz poprawne imię.");
                        }
                        else if(Imie=="")
                        {
                            document.getElementById('imie').style.borderColor = "gray";
                            document.getElementById('imie').style.color = "gray";
                            alert('Pole "Imię" jest obowiązkowe.');
                
                        }
                        
                }  
                function SprawdzNazwisko()
                {
                        Nazwisko=document.getElementById("nazwisko").value;
                        Warunek2 = /^[A-ZĆŁŚŻŹ][a-ząćęłńóśżź]{2,30}$/.test(Nazwisko);
                        if(Warunek2==true)
                        {
                            document.getElementById('nazwisko').style.borderColor = "green";
                            document.getElementById('nazwisko').style.color = "green";
                        }
                        else if(Warunek2!=true && Nazwisko!="")
                        {
                            document.getElementById('nazwisko').style.borderColor = "red";
                            document.getElementById('nazwisko').style.color = "red";
                            alert("Wpisz poprawne nazwisko.");
                        }
                        else if(Nazwisko=="")
                        {
                            document.getElementById('nazwisko').style.borderColor = "gray";
                            document.getElementById('nazwisko').style.color = "gray";
                            alert('Pole "Nazwisko" jest obowiązkowe.');
                        }
                }        
                function SprawdzEmail()
                {
                        Email=document.getElementById("email").value;
                        Warunek3 = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(Email);
                        if(Warunek3==true)
                        {
                            document.getElementById('email').style.borderColor = "green";
                            document.getElementById('email').style.color = "green";
                        }
                        else if(Warunek3!=true && Email!="")
                        {
                            document.getElementById('email').style.borderColor = "red";
                            document.getElementById('email').style.color = "red";
                            alert("Wpisz poprawny adres E-Mail.");
                        }
                        else if(Email=="")
                        {
                            document.getElementById('email').style.borderColor = "gray";
                            document.getElementById('email').style.color = "gray";
                            alert('Pole "E-Mail" jest obowiązkowe.');
                        }
                }
                function SprawdzTemat()
                { 
                        Temat=document.getElementById("temat").value;
                        
                        if( Temat.length > 0 && Temat.length < 150)
                        {
                            document.getElementById('temat').style.borderColor = "green";
                            document.getElementById('temat').style.color = "green";
                        }
                        else if(Temat=="")
                        {
                            document.getElementById('temat').style.borderColor = "gray";
                            document.getElementById('temat').style.color = "gray";
                            alert('Pole "Temat" jest obowiązkowe.');
                        }
                        else
                        {
                            document.getElementById('temat').style.borderColor = "red";
                            document.getElementById('temat').style.color = "red";
                           alert('Pole "Temat" musi zawierać pomiędzy 20 a 150 znaków.');
                        }
                }
                function SprawdzWiadomosc()
                {
                        Wiadomosc=document.getElementById("wiadomosc").value;
                        if( Wiadomosc.length >10 && Wiadomosc.length <1000)
                        {
                            document.getElementById('wiadomosc').style.borderColor = "green";
                            document.getElementById('wiadomosc').style.color = "green";
                        }
                        else if(Wiadomosc=="")
                        {
                            document.getElementById('wiadomosc').style.borderColor = "gray";
                            document.getElementById('wiadomosc').style.color = "gray";
                            alert('Pole "Wiadomość" jest obowiązkowe.');
                        }
                        else
                        {
                            document.getElementById('wiadomosc').style.borderColor = "red";
                            document.getElementById('wiadomosc').style.color = "red";
                           alert('Pole "Wiadomosc" musi zawierać pomiędzy 100 a 1000 znaków.');
                        }
                }
</script>
</body>
</html>
