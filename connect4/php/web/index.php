<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNTECT 4</title>
    <link rel="icon" href="https://img.icons8.com/color/48/000000/4.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>DCOTS · CONNECT 4</h1>
    </header>
    <main>
       <section class="game">
            <?php
               
                session_start();

                if(isset($_GET['restart']) || !isset($_SESSION['taulell']) || !isset($_SESSION['player'])){
                    $_SESSION['player'] = 1;
                    $_SESSION["taulell"] = [
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0],
                        [0,0,0,0,0,0,0]
                    ];
                }
                if(isset($_GET['pos'])){
                    if(checkWinner($_SESSION['taulell'])){
                        $error = checkMoviment($_SESSION['taulell'],($_GET['pos']));
                    
                        if(checkMoviment($_SESSION['taulell'],($_GET['pos']) == 1)){
                            saveMoviment($_GET['pos'], $_SESSION['player'], $error);
                        }
                        
                        printBoard($_SESSION["taulell"]);
                    }else{

                        printBoard($_SESSION["taulell"]);
                    }
                }else{
                    printBoard($_SESSION["taulell"]);
                }
                checkWinner($_SESSION['taulell']);

                /* Guarda el movimento */
                function saveMoviment($column, $player, $error){
                    $column--;
                    $c = 5;
                    while($_SESSION["taulell"][$c][$column] != 0){
                        $c--;
                    }
                    $_SESSION["taulell"][$c][$column] = $player;

                    if($error == 1  ){
                        if($_SESSION['player'] == 1){
                            $_SESSION['player'] = 2;
                        }else{
                            $_SESSION['player'] = 1;
                        };
                    }
                   
                }
                /* Mira si el movimento es correcto */
                function checkMoviment($board, $column){
                    if($column == "1" || $column == "2" ||$column == "3" ||$column == "4" ||$column == "5" ||$column == "6" ||$column == "7"){
                        $column = intval($column)-1;
                        if($board[0][$column] == 0){
                            return true;
                        }else{
                            
                           return "Columna ".($column+1)." plena";
                        }
                        return false;
                    }else{
                        return "no entenc la columna $column";
                    }
                    return false;
                }

                /* Pintar Tablero */
                function printBoard($board){
                    for($t = 0; $t < 6; $t++){
                        for($tt = 0; $tt < 7; $tt++){
                            if($board[$t][$tt] == 0){
                                echo "<div class='pice'>".$board[$t][$tt]."</div>";
                            }else if($board[$t][$tt] == 1){
                                echo "<div class='pice green'>".$board[$t][$tt]."</div>";
                            }else{
                                echo "<div class='pice red'>".$board[$t][$tt]."</div>";
                            }
                           
                        }
                        
                    }
                }

                /* Validar */
                function checkWinner($taulell){
                    for($t = 0; $t < 6; $t++){
                        $n_uns=0;
                        for($tt =0;$tt<7;$tt++){
                            if($taulell[$t][$tt]==1){
                                $n_uns++;
                                if($n_uns == 4){
                                    echo "<div class='screenToRemove'>
                                      <div class='box'>
                                        <p>¡¡ EL JUGADOR 1 HA GANADO FELICIDADES !!</p>
                                        <a href='index.php?restart=true' class='restart'>RESTART</a>
                                      </div>
                                    </div>";
                                    return false;
                                }
                            }else{
                                $n_uns=0;
                            }
                        }
                    };
                
                    for($t = 0; $t < 6; $t++){
                        $n_uns=0;
                        for($tt =0;$tt<7;$tt++){
                            if($taulell[$t][$tt]==2){
                                $n_uns++;
                                if($n_uns == 4){
                                    echo "<div class='screenToRemove'>
                                    <div class='box'>
                                      <p>¡¡ EL JUGADOR 2 HA GANADO FELICIDADES !!</p>
                                      <a href='index.php?restart=true' class='restart'>RESTART</a>
                                    </div>
                                  </div>";
                                    return false;
                                }
                            }else{
                                $n_uns=0;
                            }
                        }
                    };
                
                
                    for($t = 0; $t < 7; $t++){
                        $n_uns=0;
                        for($tt =0;$tt<6;$tt++){
                            if($taulell[$tt][$t]==1){
                                $n_uns++;
                                if($n_uns == 4){
                                    echo "<div class='screenToRemove'>
                                    <div class='box'>
                                      <p>¡¡ EL JUGADOR 1 HA GANADO FELICIDADES !!</p>
                                      <a href='index.php?restart=true' class='restart'>RESTART</a>
                                    </div>
                                  </div>";
                                    return false;
                                }
                            }else{
                                $n_uns=0;
                            }
                        }
                    };
                
                    for($t = 0; $t < 7; $t++){
                        $n_uns=0;
                        for($tt =0;$tt<6;$tt++){
                            if($taulell[$tt][$t]==2){
                                $n_uns++;
                                if($n_uns == 4){
                                    echo "<div class='screenToRemove'>
                                    <div class='box'>
                                      <p>¡¡ EL JUGADOR 2 HA GANADO FELICIDADES !!</p>
                                      <a href='index.php?restart=true' class='restart'>RESTART</a>
                                    </div>
                                  </div>";
                                    return false;
                                }
                            }else{
                                $n_uns=0;
                            }
                        }
                    };
                
                    // Diagonal \ 1
                    for($t = -3; $t < 3; $t++){
                        $n_uns = 0;
                        for($tt=0;$tt < 7; $tt++){
                            if(($t+$tt)>=0 && ($t+$tt)<6 && $tt>=0 &&$tt<7){
                                if($taulell[$t+$tt][$tt] == 1){
                                    $n_uns++;
                                    if($n_uns >= 4){
                                        echo "<div class='screenToRemove'>
                                        <div class='box'>
                                          <p>¡¡ EL JUGADOR 1 HA GANADO FELICIDADES !!</p>
                                          <a href='index.php?restart=true' class='restart'>RESTART</a>
                                        </div>
                                      </div>";
                                        return false;
                                    }
                                }else{
                                    $n_uns = 0;
                                }
                            }
                        }
                    }
                
                
                    
                    // Diagonal  / 1
                    for($t = 3; $t <= 8; $t++){
                        $n_uns = 0;
                        for($tt=0;$tt < 7; $tt++){
                            if(($t-$tt)>=0 && ($t-$tt)<6 && $tt>=0 &&$tt<7){
                                if($taulell[$t-$tt][$tt] == 1){
                                    $n_uns++;
                                    if($n_uns >= 4){
                                        echo "<div class='screenToRemove'>
                                        <div class='box'>
                                          <p>¡¡ EL JUGADOR 1 HA GANADO FELICIDADES !!</p>
                                          <a href='index.php?restart=true' class='restart'>RESTART</a>
                                        </div>
                                      </div>";
                                        return false;
                                    }    
                                }else{
                                    $n_uns = 0;
                                }
                            }
                        }
                    }
                
                        // Diagonal \ 1
                        for($t = -3; $t < 3; $t++){
                            $n_uns = 0;
                            for($tt=0;$tt < 7; $tt++){
                                if(($t+$tt)>=0 && ($t+$tt)<6 && $tt>=0 &&$tt<7){
                                    if($taulell[$t+$tt][$tt] == 2){
                                        $n_uns++;
                                        if($n_uns >= 4) {
                                            echo "<div class='screenToRemove'>
                                            <div class='box'>
                                              <p>¡¡ EL JUGADOR 2 HA GANADO FELICIDADES !!</p>
                                              <a href='index.php?restart=true' class='restart'>RESTART</a>
                                            </div>
                                          </div>";
                                            return false;
                                        };
                                    }else{
                                        $n_uns = 0;
                                    }
                                }
                            }
                        }
                    
                    
                        
                        // Diagonal  / 1
                        for($t = 3; $t <= 8; $t++){
                            $n_uns = 0;
                            for($tt=0;$tt < 7; $tt++){
                                if(($t-$tt)>=0 && ($t-$tt)<6 && $tt>=0 &&$tt<7){
                                    if($taulell[$t-$tt][$tt] == 2){
                                        $n_uns++;
                                        if($n_uns >= 4) {
                                            echo "<div class='screenToRemove'>
                                            <div class='box'>
                                              <p>¡¡ EL JUGADOR 2 HA GANADO FELICIDADES !!</p>
                                              <a href='index.php?restart=true' class='restart'>RESTART</a>
                                            </div>
                                          </div>";
                                            return false;
                                        };
                                    }else{
                                        $n_uns = 0;
                                    }
                                }
                            }
                        }
                
                    return true;
                    /* echo "<div class='screenToRemove'></div>"; */
                }

                
            ?>
       </section>
       <div class="buttons">
       <section class="btn">
            <a href="index.php?pos=1">1</a>
            <a href="index.php?pos=2">2</a>
            <a href="index.php?pos=3">3</a>
            <a href="index.php?pos=4">4</a>
            <a href="index.php?pos=5">5</a>
            <a href="index.php?pos=6">6</a>
            <a href="index.php?pos=7">7</a>
       </section>
       </div>
       <div class="info">

       <?php
            if($_SESSION['player'] == 1){ ?>
                 <div class="turn1">
                    <p>JUGADOR 1</p>
                </div>
                <?php
            }else{?>
                <div class="turn2">
                   <p>JUGADOR 2</p>
               </div>
               <?php
            }

        ?>
       
        <a href="index.php?restart=true" class="restart xdxd">RESTART</a>
       </div>

        <?php
            if($error != 1 && $error != ""){
                
                ?>
                    <div class="menu">
                        <?php
                            echo $error;
                        ?>
                    </div>
                <?php
            }
        ?>
    </main>
</body>
</html>            