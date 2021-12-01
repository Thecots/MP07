<?php
    /* print rules */
    function rules(){
        system("clear");
        echo "\e[1;35;43m                                                     \e[0m\n";
        echo "\e[1;30;43m \e[0m\e[0m\e[1;34;43mNORMAS:\e[0m\e[0;30;43m                                             \e[0m\n";
        echo "\e[1;30;43m EL PRIMER JUGADOR EN GANAR DOS RONDAS GANA          \e[0m\n";
        echo "\e[1;31;43m 1 - TIJERAS\e[0m\e[0;30;43m corta a \e[0m\e[1;34;43mPAPEL\e[0m\e[0;30;43m y decapita a \e[0m\e[1;32;43mLAGARTO      \e[0m\n";
        echo "\e[1;34;43m 2 - PAPEL\e[0m\e[0;30;43m tapa a tapa a \e[0m\e[1;30;43mPIEDRA\e[0m\e[0;30;43m y desautoriza a \e[0m\e[1;35;43mSPOK \e[0m\n";
        echo "\e[1;30;43m 3 - PIEDRA\e[0m\e[0;30;43m aplasta a \e[0m\e[1;32;43mLAGARTO\e[0m\e[0;30;43m y aplasta a \e[0m\e[1;31;43mTIJERAS    \e[0m\n";
        echo "\e[1;32;43m 4 - LAGARTO\e[0m\e[0;30;43m envenena a \e[0m\e[1;35;43mSPOK\e[0m\e[0;30;43m y devora a \e[0m\e[1;34;43mPAPEL        \e[0m\n";
        echo "\e[1;35;43m 5 - SPOK\e[0m\e[0;30;43m rompe a \e[0m\e[1;31;43mTIJERAS\e[0m\e[0;30;43m y vaporiza a \e[0m\e[1;30;43mPIEDRA        \e[0m\n";
        echo "\e[1;30;43m                                                     \e[0m\n";
    }
    /* error */
    function error(){
        system("clear");
        echo "\e[1;37;41m                                                  \e[0m\n";
        echo "\e[1;37;41m               CARACTER INVALIDO !!               \e[0m\n";
        echo "\e[1;37;41m                                                  \e[0m\n";
        echo "\e[1;37;41m             PULSA ENTER PARA CONTINUAR           \e[0m\n";
        echo "\e[1;37;41m                                                  \e[0m\n";
        readline("");
    }
    /* PIDE OPCIÓN */
    function playerpick($player, $p1, $p2, $round){
        echo "\e[0;30;43m(RONDA $round) PLAYER $player - SELECCIÓNA UNA OPCIÓN (1-5):    \e[0m\n";
        return readline("");
    }

    /* VARIABLES */
    $player = 1;
    $p1 = 0;
    $p2 = 0;
    $p1Lives = 0;
    $p2Lives = 0;
    $round = 1;

    /* CHECK WINNER */
    function winnerGame($p1, $p2, $round){
        global $p1Lives;
        global $p2Lives;

        system("clear");
        if($p1Lives == 2){
            echo "\e[1;35;43m                                                     \e[0m\n";
            echo "\e[1;35;43m       EL JUGADOR 1 HA GANADO LA PARTIDA             \e[0m\n";
            echo "\e[1;35;43m                                                     \e[0m\n";

            
            return false;
        }
        if($p2Lives == 2){
            echo "\e[1;35;43m                                                     \e[0m\n";
            echo "\e[1;35;43m       EL JUGADOR 2 HA GANADO LA PARTIDA             \e[0m\n";
            echo "\e[1;35;43m                                                     \e[0m\n";
            return false;
        }
        return true;
    }

    /* CHECK PLAYER PICK */
    function checkPick($e, $p1, $p2, $player, $round){
        if($e == 1 || $e == 2 || $e == 3 || $e == 4 || $e == 5){
            if($player == 1){
                $p1 = $e;
                $player = 2;
                main($player, $p1, $p2, $round);
            }else{
                $p2 = $e;
                $player = 3;
                main($player, $p1, $p2, $round);
            }
        }else{
            error();
            main($player, $p1, $p2, $round);
        }
    }
    /* MAIN FUNCTION */
    function main($player, $p1, $p2, $round){
        system("clear");
        if($player == 1){
            rules();
            checkPick(playerpick($player, $p1, $p2, $round),$p1, $p2, $player, $round);
        }else if($player == 2){
            echo "\e[0;30;43m PULSA ENTER PARA PASAR DE TURNO                     \e[0m\n";
            readline("");
            rules();
            checkPick(playerpick($player, $p1, $p2, $round),$p1, $p2, $player, $round);
        }else if($player == 3){
            system("clear");
            roundCheck($player, $p1, $p2, $round);
        }else{
            $player = 1;
            if(winnerGame($player, $p1, $p2, $round)){
                $round ++;
                main($player, $p1, $p2, $round);
            };
        }
    }
  

    /* ROUND WINNER */
    function roundCheck($player, $p1, $p2, $round){
        $pp1 = '';
        $pp2 = '';
        if($p1 == 1){
            $pp1 = "\e[1;31;43mTIJERAS\e[0m\e[0;30;43m                                \e[0m\n";
        }
        if($p2 == 1){
            $pp2 = "\e[1;31;43mTIJERAS\e[0m\e[0;30;43m                                \e[0m\n";
        }
        if($p1 == 2){
            $pp1 = "\e[1;34;43mPAPEL\e[0m\e[0;30;43m                                  \e[0m\n";
        }
        if($p2 == 2){
            $pp2 = "\e[1;34;43mPAPEL\e[0m\e[0;30;43m                                  \e[0m\n";
        }
        if($p1 == 3){
            $pp1 = "\e[1;30;43mPIEDRA\e[0m\e[0;30;43m                                 \e[0m\n";
        }
        if($p2 == 3){
            $pp2 = "\e[1;30;43mPIEDRA\e[0m\e[0;30;43m                                 \e[0m\n";
        }
        if($p1 == 4){
            $pp1 = "\e[1;32;43mLAGARTO\e[0m\e[0;30;43m                                \e[0m\n";
        }
        if($p2 == 4){
            $pp2 = "\e[1;32;43mLAGARTO\e[0m\e[0;30;43m                                \e[0m\n";
        }
        if($p1 == 5){
            $pp1 = "\e[1;35;43mSPOK\e[0m\e[0;30;43m                                   \e[0m\n";
        }
        if($p2 == 5){
            $pp2 = "\e[1;35;43mSPOK\e[0m\e[0;30;43m                                   \e[0m\n";
        }
        global $p1Lives;
        global $p2Lives;

        echo "\e[0;30;43m                                                   \e[0m\n";
        echo "\e[0;30;43m PLAYER 1 = \e[0m$pp1";
        echo "\e[0;30;43m PLAYER 2 = \e[0m$pp2";

        if($p1 == $p2){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EMAPTE!                                           \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            return true;
        };
        /* TIJERAS */

        if($p1 == 1 and $p2 == 2 || $p2 == 4){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;31;43m TIJERAS\e[0m\e[0;30;43m corta a \e[0m\e[1;34;43mPAPEL\e[0m\e[0;30;43m y decapita a \e[0m\e[1;32;43mLAGARTO        \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 1 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p1Lives;
            $p1Lives++;
        };
        if($p2 == 1 and $p1 == 2 || $p1 == 4){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;31;43m TIJERAS\e[0m\e[0;30;43m corta a \e[0m\e[1;34;43mPAPEL\e[0m\e[0;30;43m y decapita a \e[0m\e[1;32;43mLAGARTO        \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 2 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p2Lives;
            $p2Lives++;
        }
         /* PAPEL */
         if($p1 == 2 and $p2 == 3 || $p2 == 5){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;34;43m PAPEL\e[0m\e[0;30;43m tapa a tapa a \e[0m\e[1;30;43mPIEDRA\e[0m\e[0;30;43m y desautoriza a \e[0m\e[1;35;43mSPOK   \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 1 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p1Lives;
            $p1Lives++;
        };
        if($p2 == 2 and $p1 == 3 || $p1 == 5){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;34;43m PAPEL\e[0m\e[0;30;43m tapa a tapa a \e[0m\e[1;30;43mPIEDRA\e[0m\e[0;30;43m y desautoriza a \e[0m\e[1;35;43mSPOK   \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 2 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p2Lives;
            $p2Lives++;
        }
        /* PIEDRA */
        if($p1 == 3 and $p2 == 4 || $p2 == 1){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;30;43m PIEDRA\e[0m\e[0;30;43m aplasta a \e[0m\e[1;32;43mLAGARTO\e[0m\e[0;30;43m y aplasta a \e[0m\e[1;31;43mTIJERAS      \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 1 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p1Lives;
            $p1Lives++;
        };
        if($p2 == 3 and $p1 == 4 || $p1 == 1){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;30;43m PIEDRA\e[0m\e[0;30;43m aplasta a \e[0m\e[1;32;43mLAGARTO\e[0m\e[0;30;43m y aplasta a \e[0m\e[1;31;43mTIJERAS      \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 2 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p2Lives;
            $p2Lives++;
        }
         /* LAGARTO */
         if($p1 == 4 and $p2 == 5 || $p2 == 2){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;32;43m LAGARTO\e[0m\e[0;30;43m envenena a \e[0m\e[1;35;43mSPOK\e[0m\e[0;30;43m y devora a \e[0m\e[1;34;43mPAPEL          \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 1 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p1Lives;
            $p1Lives++;
        };
        if($p2 == 4 and $p1 == 5 || $p1 == 2){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;32;43m LAGARTO\e[0m\e[0;30;43m envenena a \e[0m\e[1;35;43mSPOK\e[0m\e[0;30;43m y devora a \e[0m\e[1;34;43mPAPEL          \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 2 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p2Lives;
            $p2Lives++;
        }
        /* SPOK */
        if($p1 == 5 and $p2 == 1 || $p2 == 3){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;35;43m SPOK\e[0m\e[0;30;43m rompe a \e[0m\e[1;31;43mTIJERAS\e[0m\e[0;30;43m y vaporiza a \e[0m\e[1;30;43mPIEDRA          \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 1 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p1Lives;
            $p1Lives++;
        };
        if($p2 == 5 and $p1 == 1 || $p1 == 3){
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[1;35;43m SPOK\e[0m\e[0;30;43m rompe a \e[0m\e[1;31;43mTIJERAS\e[0m\e[0;30;43m y vaporiza a \e[0m\e[1;30;43mPIEDRA          \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            echo "\e[0;30;43m EL JUGADOR 2 HA GANADO LA RONDA $round                 \e[0m\n";
            echo "\e[0;30;43m                                                   \e[0m\n";
            global $p2Lives;
            $p2Lives++;
        }
        echo "\e[0;30;43m PLAYER 1 ($p1Lives)   -   PLAYER 2 ($p2Lives)                   \e[0m\n";
        echo "\e[0;30;43m                                                   \e[0m\n";
        echo "\e[0;30;43m PULSA ENTER PARA CONTINUAR                        \e[0m\n";
        readline("");
        $player = 4;
        main($player, $p1, $p2, $round);
    };

    /* WINNER SCREEN */
    function winnerScreen($p1, $p2, $round){
       echo "";
    }

    main($player, $p1, $p2, $round);
?>

