const { bgBlack } = require('colors');
const readlineSync = require('readline-sync');
require('colors');

const board = [
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0]
];

let player = 1;

/* Bucle de la parida */
const main = async() =>{
    printBoard(board);
    let e = await askMove();
    let a = false;
    let c = 0;
    for(let i = 5; i>0;i--){
        if(board[i][(e-1)] == 0){
            await move(i,e-1);
            i = 0;
        }
    }

    player = player == 1 ? 2 : 1;

    if(!checkWinner()){
        winner();
        return 0;
    }
    main();
}

/* Introduce la ficha en el array */
const move = async(i,e) => {

    for(let n = 0; n <= i; n++){
        board[n][e] = player
        printBoard(board);
        await timer(100);
        board[n][e] = 0;
    }
    board[i][e] = player

    
}


/* Pinta tablero */
const printBoard = (e) =>{
    console.clear();
    console.log(`                               `.bgWhite);
    console.log(' ┌───────────────────────────┐ '.bgWhite.black);
    if(player == 1){
        console.log(` │     ${`P L A Y E R   1   ●`.red}   ${'│'.black} `.bgWhite.black);
    }else{
        console.log(` │      ${`P L A Y E R   2   ●`.blue}  ${'│'.black} `.bgWhite.black);
    }
    console.log(' └───────────────────────────┘ '.bgWhite.black);
    e.forEach(n => {
        let t = ' │ '.bgWhite.black;
        let count = 0;
        n.forEach(g => {
            let s = count == 6? ' ' : ` `;
            if(g == 0){
                t += `  │${s}`.bgWhite.black;
            }else{
                if(g == 1){
                    t += `${`●`.red} ${`│${s}`.black}`.bgWhite.black;
                }else{
                    t += `${`●`.blue} ${`│${s}`.black}`.bgWhite.black;
                }
            }
            count++;
        });
        console.log(' ├───┼───┼───┼───┼───┼───┼───┤ '.bgWhite.black);
        console.log(t);
    });
    console.log(' └───┴───┴───┴───┴───┴───┴───┘ '.bgWhite.black);
    console.log(`                               `.bgWhite);
}


/* Pide posición y mira si es legal o no*/
const askMove = async() =>{
    let x = '';
    if(player == 1){
        x = readlineSync.question(`Turn ${`Player ${player}`.red} (1-7): `.white);

    }else{
        x =readlineSync.question(`Turn ${`Player ${player}`.blue} (1-7): `.white);
    }
    
    if(x >= 1 && x<=7){
        return x;
    }else{
        console.clear();
        console.log(`                                                   `.bgRed);
        readlineSync.question(` !! ILEGAL CHARACTER PRESS [ENTER] FOR CONTINUE !! 
                                                  `.bgRed.black);
        main();
    }
    
}


/* Mira si hay un ganador */
const checkWinner = () =>{

    /* Horizonta jugador 1 */
    for(let i = 0; i < 6;i++){
        let x = 0;
        for(let g = 0; g < 6;g++){
            if(board[i][g] == 1){
                x++;
                if(x == 4){
                    return false;
                }
            }else{
                x = 0;
            }
        }
    }

     /* Horizonta jugador 2 */
     for(let i = 0; i < 6;i++){
        let x = 0;
        for(let g = 0; g < 6;g++){
            if(board[i][g] == 2){
                x++;
                if(x == 4){
                    return false;
                }
            }else{
                x = 0;
            }
        }
    }

        /* Vertical jugador 1 */
        for(let i = 0; i < 7;i++){
        let x = 0;
        for(let g = 0; g < 6;g++){
            if(board[g][i] == 1){
                x++;
                if(x == 4){
                    return false;
                }
            }else{
                x = 0;
            }
        }
    }

    /* Vertical jugador 2 */
    for(let i = 0; i < 7;i++){
        let x = 0;
        for(let g = 0; g < 6;g++){
            if(board[g][i] == 2){
                x++;
                if(x == 4){
                    return false;
                }
            }else{
                x = 0;
            }
        }
    }

    // Diagonal (\) jugador 1
    for(i = -3; i < 3; i++){
        let x = 0;
        for(g=0;g < 7; g++){
            if((i+g)>=0 && (i+g)<6 && g>=0 &&g<7){
                if(board[i+g][g] == 1){
                    x++;
                    if(x >= 4) return false;
                }else{
                    x = 0;
                }
            }
        }
    }

     // Diagonal (\) jugador 2
     for(i = -3; i < 3; i++){
        let x = 0;
        for(g=0;g < 7; g++){
            if((i+g)>=0 && (i+g)<6 && g>=0 &&g<7){
                if(board[i+g][g] == 2){
                    x++;
                    if(x >= 4) return false;
                }else{
                    x = 0;
                }
            }
        }
    }

    // Diagonal (/) jugador 1
    for(i = 3; i < 8; i++){
        let x = 0;
        for(g=0;g < 7; g++){
            if((i-g)>=0 && (i-g)<6 && g>=0 &&g<7){
                if(board[i-g][g] == 1){
                    x++;
                    if(x >= 4) return false;
                }else{
                    x = 0;
                }
            }
        }
    }

    // Diagonal (/) jugador 2
    for(i = 3; i < 8; i++){
        let x = 0;
        for(g=0;g < 7; g++){
            if((i-g)>=0 && (i-g)<6 && g>=0 &&g<7){
                if(board[i-g][g] == 2){
                    x++;
                    if(x >= 4) return false;
                }else{
                    x = 0;
                }
            }
        }
    }
    return true;
}

const winner = () => {
    player = player == 1 ? 2 : 1, x = 0;
    printBoard(board);
    if(player == 1){
        x = readlineSync.question(`${`PLAYER 1`.red} ${'HAS WON PRESS'.white} ${'[ENTER]'.yellow} ${'FOR EXIT'.white} `.bgBlack.white);
    }else{
        x = readlineSync.question(`${`PLAYER 2`.blue} ${'HAS WON PRESS'.white} ${'[ENTER]'.yellow} ${'FOR EXIT'.white} `.bgBlack.white);
    };
}

/* Delay */
function timer(ms) { return new Promise(res => setTimeout(res, ms)); }

/* Arranque del juego */
main();
