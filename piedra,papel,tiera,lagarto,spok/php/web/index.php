<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>srcots</title>
    <link rel="stylesheet" href="style.css" />
  </head>

  <?php
    session_start();

    /* variables default */
    if(!isset($_SESSION['game']) || isset($_GET['reset'])){
      $_SESSION['game'] = 0;
      $_SESSION['turn'] = 1;
      $_SESSION['p1Value'] = 0;
      $_SESSION['p1Points'] = 0;
      $_SESSION['p2Value'] = 0;
      $_SESSION['p2Points'] = 0;
      $_SESSION['winner'] = 0;
    }

    /* pasa a la siguiente ronda */
    if(isset($_GET['next'])){
      $_SESSION['game'] = 1;

      if($_SESSION['p1Points'] == 2){
        $_SESSION['winner'] = 1;
        $_SESSION['game']=4;
      }
      if($_SESSION['p2Points'] == 2){
        $_SESSION['winner'] = 2;
        $_SESSION['game']=4;
      }
      $_SESSION['turn'] = 1;
      header('Location: index.php');
    }
  ?>
  <body <?php
    if($_SESSION['game'] == 4){
      echo "class='overhidden'";
    }
  ?>>
  <?php
    /* cambia del menú al juego */
    if(isset($_GET['play']) == 'True'){
      $_SESSION['game'] = 1;
      header('Location: index.php');
    }

    /* Guarda jugada en variable */
    if(isset($_GET['value'])){
      if($_SESSION['turn'] == 1){
        $_SESSION['p1Value'] = $_GET['value'];
        $_SESSION['turn'] = 2;
      }else{
        $_SESSION['p2Value'] = $_GET['value'];
        $_SESSION['turn'] = 1;
        $_SESSION['game'] = 2;
      }
    }

    /* ganador de la ronda */
    if($_SESSION['game'] == 2){
      $p1 = $_SESSION['p1Value'];
      $p2 = $_SESSION['p2Value'];

    if($p1 == $p2){
      $_SESSION['winner'] = 0;
    };
    /* TIJERAS */
    if($p1 == 1 and $p2 == 2 || $p2 == 4){
        $_SESSION['winner'] = 1;
    };
    if($p2 == 1 and $p1 == 2 || $p1 == 4){
        $_SESSION['winner'] = 2;
    }
     /* PAPEL */
     if($p1 == 2 and $p2 == 3 || $p2 == 5){
        $_SESSION['winner'] = 1;
    };
    if($p2 == 2 and $p1 == 3 || $p1 == 5){
        $_SESSION['winner'] = 2;
    }
    /* PIEDRA */
    if($p1 == 3 and $p2 == 4 || $p2 == 1){
        $_SESSION['winner'] = 1;
    };
    if($p2 == 3 and $p1 == 4 || $p1 == 1){
        $_SESSION['winner'] = 2;
    }
     /* LAGARTO */
     if($p1 == 4 and $p2 == 5 || $p2 == 2){
        $_SESSION['winner'] = 1;
    };
    if($p2 == 4 and $p1 == 5 || $p1 == 2){
        $_SESSION['winner'] = 2;
    }
    /* SPOK */
    if($p1 == 5 and $p2 == 1 || $p2 == 3){
        $_SESSION['winner'] = 1;
    };
    if($p2 == 5 and $p1 == 1 || $p1 == 3){
        $_SESSION['winner'] = 2;
    }

    if($_SESSION['winner'] == 1){
      $_SESSION['p1Points']++;
    }
    if($_SESSION['winner'] == 2){
      $_SESSION['p2Points']++;
    }
    }

    /* menú del juego */
    if($_SESSION['game']== 0){
      ?>
        <main>
          <h2>PIEDRA, PAPEL, TIJERA, LAGARTO, SPOCK</h2>
        <h1 onclick="window.location.href='index.php?play=True'">JUGAR</h1>
      </main>
      <?php
    }

    /* tablero */
    if($_SESSION['game'] == 1){
      ?>
        <div class="turn">
          <h1>JUGADOR <?php echo $_SESSION['turn']; ?></h1>
          <h2><?php echo $_SESSION['p1Points']." - ".$_SESSION['p2Points'] ?></h2>
        </div>
        <div class="board">
          <img src="./img/main.png" alt="" />
          <img src="./img/1.png" onclick="window.location.href='index.php?value=1'" />
          <img src="./img/2.png" onclick="window.location.href='index.php?value=2'" />
          <img src="./img/3.png" onclick="window.location.href='index.php?value=3'" />
          <img src="./img/4.png" onclick="window.location.href='index.php?value=4'" />
          <img src="./img/5.png" onclick="window.location.href='index.php?value=5'" />
        </div>
      <?php
    }

    /* resultados 1 */
    if($_SESSION['game'] == 2){
      ?>
        <div class="turn">
          <h1>RESULTADO</h1>
          <h2><?php echo $_SESSION['p1Points']." - ".$_SESSION['p2Points'] ?></h2>

        </div>
        <div class="result">
          <div>
            <?php
              if($_SESSION['winner'] == 0){
                echo "<h1>EMPATE!</h1>";
              }else{
                echo "<h1>EL JUGADOR ".$_SESSION['winner']." HA GANADO LA RONDA !</h1>";
              };
            ?>
          </div>
          <div class="si">
            <div>
              <h1>JUGADOR 1:</h1>
              <img src="./img/<?php echo $_SESSION['p1Value']?>.png"/>
            </div>
            <div>
              <h1>JUGADOR 2:</h1>
              <img src="./img/<?php echo $_SESSION['p2Value']?>.png"/>
            </div>
            <div>
              <img src="./img/main.png" alt="">
            </div>
          </div>
          <div>
            <h2 onclick="window.location.href='index.php?next=true'">CONTINUAR</h2>
          </div>
        </div>
      <?php
    }

    /* WINNER SCREEN */
    if($_SESSION['game'] == 4){
      ?>
        <div class="wrapper">
            <div class="modal">
                <span class="emoji round">🏆</span>
                <h1>EL JUGADOR <?php echo $_SESSION['winner'];?> HA GANADO!</h1>
                <a href="./index.php?reset=true" class="modal-btn">VOLVER A JUGAR</a>
            </div>
            <div id="confetti-wrapper">
        </div>
      <?php
    }
    ?>
    
    <script>
      for(i=0; i<100; i++) {
        // Random rotation
        var randomRotation = Math.floor(Math.random() * 360);
            // Random Scale
        var randomScale = Math.random() * 1;
        // Random width & height between 0 and viewport
        var randomWidth = Math.floor(Math.random() * Math.max(document.documentElement.clientWidth, window.innerWidth || 0));
        var randomHeight =  Math.floor(Math.random() * Math.max(document.documentElement.clientHeight, window.innerHeight || 500));
        
        // Random animation-delay
        var randomAnimationDelay = Math.floor(Math.random() * 15);
        console.log(randomAnimationDelay);

        // Random colors
        var colors = ['#0CD977', '#FF1C1C', '#FF93DE', '#5767ED', '#FFC61C', '#8497B0']
        var randomColor = colors[Math.floor(Math.random() * colors.length)];

        // Create confetti piece
        var confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.top=randomHeight + 'px';
        confetti.style.right=randomWidth + 'px';
        confetti.style.backgroundColor=randomColor;
        // confetti.style.transform='scale(' + randomScale + ')';
        confetti.style.obacity=randomScale;
        confetti.style.transform='skew(15deg) rotate(' + randomRotation + 'deg)';
        confetti.style.animationDelay=randomAnimationDelay + 's';
        document.getElementById("confetti-wrapper").appendChild(confetti);
        }

        window.onload = frame();
    </script>
    
  </body>
</html>
