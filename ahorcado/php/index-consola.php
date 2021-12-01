<?php
    system('clear');

    /* Palabra jugadores */
    $palabra1 = ["","","","",""];
    $palabra2 = ["","","","",""];

    /* Palabra descubierta  */
    $pdesc1 = ["_","_","_","_","_"];
    $pdesc2 = ["_","_","_","_","_"];

    /* Vidas jugadores */
    $vidas1 = 0;
    $vidas2 = 0;

    /* Turno */
    $jugador = 1;

    /* Estado partida */
    $state = 0;

    /* TABLERO */
    $taulell = [
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⚫️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⚫️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⚫️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","➖","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⚫️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","➖","⬛️","➖","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⚫️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","➖","⬛️","➖","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","🔧","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ],
        [
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","🟫","🟫","🟫","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","🟧","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⚫️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","➖","⬛️","➖","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬛️","⬜️","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","🔧","⬜️","🦴","⬜️"],
            ["⬜️","⬜️","🟫","⬜️","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","🟫","🟫","🟫","⬜️","⬜️","⬜️","⬜️"],
            ["⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️","⬜️",]
        ]
    ];

    /* BUCLE PARTIDA */

    while(no_hi_ha_guanyador($jugador ,$palabra1, $palabra2, $pdesc1, $pdesc2, $vidas1, $vidas2)){
        if($state == 0){
            /* Empieza la partida Selección de palabras*/
            seleccionarPalabra($jugador, $palabra1, $palabra2);
            $state = 1;
        }elseif($state == 1){
            /* Partida en curso */
            pintar_taulell($taulell,$jugador ,$palabra1, $palabra2, $pdesc1, $pdesc2, $vidas1, $vidas2);
            $jugador==1?$jugador=2:$jugador=1;

            
        }
    }

    $jugador==1?$jugador=2:$jugador=1;
    winnerScreen($jugador, $palabra1, $palabra2 ,$pdesc1, $pdesc2, $vidas1, $vidas2);

    /* Detecta si hay un ganador */
    function no_hi_ha_guanyador(&$jugador ,&$palabra1, &$palabra2, &$pdesc1, &$pdesc2, &$vidas1, &$vidas2){
        if($jugador == 2){
            $x = 0;
            for($i = 0; $i < 5; $i++){
                if($pdesc1[$i] == $palabra2[$i]){
                    $x++;
                };
            };

            if($x == 5){
                system('clear');
                return false;
            }
        }elseif($jugador == 1){
            $x = 0;
            for($i = 0; $i < 5; $i++){
                if($pdesc2[$i] == $palabra1[$i]){
                    $x++;
                };
            };

            if($x == 5){
                system('clear');
                return false;
            }

            
        }

        if($vidas1 == 10){
            system('clear');
            return false;
        }if($vidas2 == 10){
            system('clear');
            return false;
        }
        return true;
    }


    /* IMPRIME TABLERO */

    function pintar_taulell(&$taulell,$jugador ,&$palabra1, &$palabra2, &$pdesc1, &$pdesc2, &$vidas1, &$vidas2){
        system('clear');
        if($jugador == 1){
            /* Turno jugador 1 */
            echo "┌─────────────┐ \n";
            echo "│   PLAYER 1  │ \n";
            echo "└─────────────┘ \n";
            /* Imprime tablero */
            for ($t=0; $t < 10; $t++) { 
                for($tt = 0; $tt <8; $tt++){
                    echo $taulell[$vidas1][$t][$tt];
                }
                echo "\n";
            }

            echo "Vidas: ".(10-$vidas1)."\n";
            echo "Letras descrubiertas: ";
            for($i = 0; $i < 5; $i++){
                echo $pdesc1[$i]." ";
            }
            echo  "\n";
            $l = readline("\nEscribe una letra: ");
            
            $vvl = validarLetra($l, $jugador, $palabra1, $palabra2 ,$pdesc1, $pdesc2);
            if($vvl == false){
                pintar_taulell($taulell,$jugador ,$palabra1, $palabra2, $pdesc1, $pdesc2, $vidas1, $vidas2);
            }

            $vse = ponerLetra($l,$jugador ,$palabra1, $palabra2, $pdesc1, $pdesc2, $vidas1, $vidas2);

            system('clear');
            echo "┌─────────────┐ \n";
            echo "│   PLAYER 1  │ \n";
            echo "└─────────────┘ \n";
            /* Imprime tablero */
            for ($t=0; $t < 10; $t++) { 
                for($tt = 0; $tt <8; $tt++){
                    echo $taulell[$vidas1][$t][$tt];
                }
                echo "\n";
            }

            echo "Vidas: ".(10-$vidas1)."\n";
            echo "Letras descrubiertas: ";
            for($i = 0; $i < 5; $i++){
                echo $pdesc1[$i];
            };
            echo "\n";
            readline("Pulsa [enter] para continuar");

        }else if($jugador == 2){
            /* Turno jugador 2 */
             /* Turno jugador 1 */
             echo "┌─────────────┐ \n";
             echo "│   PLAYER 2  │ \n";
             echo "└─────────────┘ \n";
             /* Imprime tablero */
             for ($t=0; $t < 10; $t++) { 
                 for($tt = 0; $tt <8; $tt++){
                     echo $taulell[$vidas2][$t][$tt];
                 }
                 echo "\n";
             }
 
             echo "Vidas: ".(10-$vidas2)."\n";
             echo "Letras descrubiertas: ";
             for($i = 0; $i < 5; $i++){
                 echo $pdesc2[$i]." ";
             }
             echo  "\n";
             $l = readline("\nEscribe una letra: ");
             
             $vvl = validarLetra($l, $jugador, $palabra1, $palabra2 ,$pdesc1, $pdesc2);
             if($vvl == false){
                 pintar_taulell($taulell,$jugador ,$palabra1, $palabra2, $pdesc1, $pdesc2, $vidas1, $vidas2);
             }
 
             $vse = ponerLetra($l,$jugador ,$palabra1, $palabra2, $pdesc1, $pdesc2, $vidas1, $vidas2);
 
             system('clear');
             echo "┌─────────────┐ \n";
             echo "│   PLAYER 2  │ \n";
             echo "└─────────────┘ \n";
             /* Imprime tablero */
             for ($t=0; $t < 10; $t++) { 
                 for($tt = 0; $tt <8; $tt++){
                     echo $taulell[$vidas2][$t][$tt];
                 }
                 echo "\n";
             }
 
             echo "Vidas: ".(10-$vidas2)."\n";
             echo "Letras encontradas: ";
             for($i = 0; $i < 5; $i++){
                 echo $pdesc2[$i];
             };
             echo "\n";
             readline("Pulsa [enter] para continuar");
 
        }

       
        
    };

    /* Validar que ha escito un aletra */
    function validarLetra($l, &$jugador, &$palabra1, &$palabra2 ,&$pdesc1, &$pdesc2){
        if($jugador == 1){
            /* Validar que sea una letra */
            $vl = strlen($l);
            if($vl > 1){
                system('clear');
                readline("Error, tienes que escribir solo una letra, pulsa [enter] para continuar");
                return false;
            }
        }else{
            /* Validar que sea una letra */
            $vl = strlen($l);
            if($vl > 1){
                system('clear');
                readline("Error, tienes que escribir solo una letra, pulsa [enter] para continuar");
                return false;
            }
        }

        return true;
    }

    /* Poner letra */
    function ponerLetra($l, &$jugador, &$palabra1, &$palabra2 ,&$pdesc1, &$pdesc2, &$vidas1, &$vidas2){
        if($jugador == 1){
            $dp = false;
            for($i = 0; $i < 5; $i++){
                if($palabra2[$i] == $l){
                    $pdesc1[$i] = $l;
                    $dp = true;
                }
            };

            if($dp == false){
                $vidas1++;
                return  "no";
            }else{
                return "si";
            }
            
        }else{
            $dp = false;
            for($i = 0; $i < 5; $i++){
                if($palabra1[$i] == $l){
                    $pdesc2[$i] = $l;
                    $dp = true;
                }
            };

            if($dp == false){
                $vidas2++;
                return  "no";
            }else{
                return "si";
            }
        }
    }


    /* LO DE ABAJO FUNCIONA */

    /* Selección de palabras */
    function seleccionarPalabra(&$jugador, &$palabra1, &$palabra2){
             if($jugador == 1){
                system('clear');
                $p1 = readline("Jugador 1: Escribe tu palabra de 5 letras: ");
                $pp1 = processar_palabra($p1);
                
                if($pp1 == false){
                    seleccionarPalabra($jugador, $palabra1, $palabra2);
                }else{
                    $jugador = 2;
                    for($i = 0; $i < 5; $i++){
                        $palabra1[$i] = $p1[$i];
                    }
                    seleccionarPalabra($jugador, $palabra1, $palabra2);
                }
            }elseif($jugador == 2){
                system('clear');
                $p1 = readline("Jugador 2: Escribe tu palabra de 5 letras: ");
                $pp1 = processar_palabra($p1);
                
                if($pp1 == false){
                    seleccionarPalabra($jugador, $palabra1, $palabra2);
                }else{
                    $jugador = 3;
                    for($i = 0; $i < 5; $i++){
                        $palabra2[$i] = $p1[$i];
                    }
                }
            }
            $jugador = 1;
    }

    /* Mira si la palabra es valida o no */
    function processar_palabra($e){
        $x =  str_word_count($e);
        if($x > 1){
            readline("Error, solo puedes escribir una palabra de 5 letras pulsa [enter] para continuar");
            return false;
        }

        $x = strlen($e);
        if($x > 5 || $x < 5){
            readline("Error, tu palabra tiene que contener 5 letras pulsa [enter] para continuar");
            return false;
        }
        return true;
    }

    function winnerScreen(&$jugador, &$palabra1, &$palabra2 ,&$pdesc1, &$pdesc2, &$vidas1, &$vidas2){
        if($jugador == 1){
            echo "\n _____ _____ _____ _____ ____  _____ _____    ___   ";
            echo "\n|   __|  _  |   | |  _  |    \|     | __  |  |_  |  ";
            echo "\n|  |  |     | | | |     |  |  |  |  |    -|   _| |_ ";
            echo "\n|_____|__|__|_|___|__|__|____/|_____|__|__|  |_____|\n \n";
        }else{
            echo "\n _____ _____ _____ _____ ____  _____ _____    ___ ";
            echo "\n|   __|  _  |   | |  _  |    \|     | __  |  |_  |";
            echo "\n|  |  |     | | | |     |  |  |  |  |    -|  |  _|";
            echo "\n|_____|__|__|_|___|__|__|____/|_____|__|__|  |___|\n \n";
        }

        echo "Palabra jugador 1: ";
        for($i = 0; $i < 5; $i++){
            echo $palabra1[$i];
        }
        echo "\nletras descubiertas por jugador 2: ";
        for($i = 0; $i < 5; $i++){
            echo $pdesc2[$i];
        }
        echo "\nVidas jugador 2: ".(10-$vidas2);

        echo "\n\nPalabra jugador 2: ";
        for($i = 0; $i < 5; $i++){
            echo $palabra2[$i];
        }
        echo "\nletras descubiertas por jugador 1: ";
        for($i = 0; $i < 5; $i++){
            echo $pdesc1[$i];
        }
        echo "\nVidas jugador 1: ".(10-$vidas1);
        echo "\n";
    }
?>
