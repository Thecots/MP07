const express = require("express");
const path = require("path");
const app = express.Router();

let game = [
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
];

let turn = 1;

/* ----- game page -----*/
app.get("/", (req, res) => {
  res.render("index", {
    game,
    turn,
    cero: 0,
  });
});

/* ----- send board ----- */
app.post("/game", (req, res) => {
    res.send(JSON.stringify({game,turn}));
});

/* ----- restart game ----- */
app.post("/restart", (req, res) => {
    game = [
        [0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0],
      ];
    turn = 1;
    res.send(JSON.stringify({game,turn}));
});

/* ----- moviment ----- */
app.post("/move", (req, res) => {
  let mv = move(req.body.position);
  if(mv === false){
    res.send(JSON.stringify({ok:false, error: `Columna ${req.body.position} plena`}));
  }else{
      if(!checkWinner()){
        res.send(JSON.stringify({ok:true, turn, col: (parseInt(req.body.position)-1) ,row: mv}));
      }else{
        res.send(JSON.stringify({ok:'winner', turn, col: (parseInt(req.body.position)-1) ,row: mv}));
        console.log('winner');
      }
   
    turn = turn == 1 ? 2 : 1;
  }
  console.log();
});


/* ---- set piece ---- */
function move(e){
    e = e-1;
    if(game[0][e] != 0){
        /* columna llena */
        return false;

    }else{
        /* columna disponible */
        let f = 0;
        for (let i = 5; 0 <= i; i--) {
            if(game[i][e] == 0){
                f = i;
                i = -1;
            }
        }
        game[f][e] = turn
        return f;
    }
}

/* ---- checkea if are some winner ---- */
function checkWinner() {
  /* Horizonta jugador 1 */
  for (let i = 0; i < 6; i++) {
    let x = 0;
    for (let g = 0; g < 6; g++) {
      if (game[i][g] == 1) {
        x++;
        if (x == 4) {
          return true;
        }
      } else {
        x = 0;
      }
    }
  }
  /* Horizonta jugador 2 */
  for (let i = 0; i < 6; i++) {
    let x = 0;
    for (let g = 0; g < 6; g++) {
      if (game[i][g] == 2) {
        x++;
        if (x == 4) {
          return true;
        }
      } else {
        x = 0;
      }
    }
  }
  /* Vertical jugador 1 */
  for (let i = 0; i < 7; i++) {
    let x = 0;
    for (let g = 0; g < 6; g++) {
      if (game[g][i] == 1) {
        x++;
        if (x == 4) {
          return true;
        }
      } else {
        x = 0;
      }
    }
  }
  /* Vertical jugador 2 */
  for (let i = 0; i < 7; i++) {
    let x = 0;
    for (let g = 0; g < 6; g++) {
      if (game[g][i] == 2) {
        x++;
        if (x == 4) {
          return true;
        }
      } else {
        x = 0;
      }
    }
  }
  // Diagonal (\) jugador 1
  for (i = -3; i < 3; i++) {
    let x = 0;
    for (g = 0; g < 7; g++) {
      if (i + g >= 0 && i + g < 6 && g >= 0 && g < 7) {
        if (game[i + g][g] == 1) {
          x++;
          if (x >= 4) return true;
        } else {
          x = 0;
        }
      }
    }
  }
  // Diagonal (\) jugador 2
  for (i = -3; i < 3; i++) {
    let x = 0;
    for (g = 0; g < 7; g++) {
      if (i + g >= 0 && i + g < 6 && g >= 0 && g < 7) {
        if (game[i + g][g] == 2) {
          x++;
          if (x >= 4) return true;
        } else {
          x = 0;
        }
      }
    }
  }
  // Diagonal (/) jugador 1
  for (i = 3; i < 8; i++) {
    let x = 0;
    for (g = 0; g < 7; g++) {
      if (i - g >= 0 && i - g < 6 && g >= 0 && g < 7) {
        if (game[i - g][g] == 1) {
          x++;
          if (x >= 4) return true;
        } else {
          x = 0;
        }
      }
    }
  }
  // Diagonal (/) jugador 2
  for (i = 3; i < 8; i++) {
    let x = 0;
    for (g = 0; g < 7; g++) {
      if (i - g >= 0 && i - g < 6 && g >= 0 && g < 7) {
        if (game[i - g][g] == 2) {
          x++;
          if (x >= 4) return true;
        } else {
          x = 0;
        }
      }
    }
  }
  return false;
}

module.exports = app;
