/* ----- print board ----- */
const print = () => {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    var urlencoded = new URLSearchParams();

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
    };

    fetch("/game", requestOptions)
    .then(response => response.text())
    .then(res =>{
        const {game, turn} = JSON.parse(res);
        t = ``;
        game.forEach((n,r) => {
            n.forEach((g,c) => {
                t += `<div class="pice pice${g} col-${c} row-${r}"></div>`
            })
        });
        t += `
        <div class='screenToRemove hiddeWinner'>
            <div class='box'>
                <p>¡¡ EL JUGADOR 2 HA GANADO FELICIDADES !!</p>
                <a href='#' onclick="restart()" class='restart'>RESTART</a>
            </div>
        </div>
        `;
        document.querySelector('.game').innerHTML = t;
        document.querySelector('.turn').classList.remove('turn2','turn1');
        document.querySelector('.turn').classList.add('turn'+turn);
        document.querySelector('.turn').innerText = "JUGADOR "+turn;

    }
        
    )
    .catch(error => console.log('error', error));
}
print();

/* ----- restart game -----*/
const restart = () => {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    var urlencoded = new URLSearchParams();

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
    };

    fetch("/restart", requestOptions)
    .then(response => response.text())
    .then(res =>{
        print();
    })
    .catch(error => console.log('error', error));
    print();
}
/* ----- pice animation ----- */
const moveAnimation = async(col,row,t) =>{
    t = t == 1 ? 2 : 1;
    document.querySelector('.turn').classList.remove('turn2','turn1');
    document.querySelector('.turn').classList.add('turn'+t);
    document.querySelector('.turn').innerText = "JUGADOR "+t;
    t = t == 1 ? 2 : 1;
    for (let i = 0; i <= row; i++) {
        document.querySelector(`.col-${col}.row-${i}`).classList.add('pice'+t);
        await timer(100);     
        if(i != row){
            document.querySelector(`.col-${col}.row-${i}`).classList.remove('pice'+t);
        }
    }

}

/* ----- send position ----- */
const position = (e) => {
    document.querySelector('.menu').classList.add('hiddeWinner');
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    var urlencoded = new URLSearchParams();
    urlencoded.append("position", e);

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
    };

    fetch("/move", requestOptions)
    .then(response => response.text())
    .then(res =>{
        res = JSON.parse(res);
        if(res.ok === true){
            moveAnimation(res.col, res.row, res.turn);
        }else if(res.ok === false){
            document.querySelector('.menu').classList.remove('hiddeWinner');
            document.querySelector('.menu p').innerText = res.error;

        }else{
            moveAnimation(res.col, res.row, res.turn);
            document.querySelector('.screenToRemove p').innerText = `¡¡ EL JUGADOR ${res.turn} HA GANADO FELICIDADES !!`
            document.querySelector('.screenToRemove').classList.remove('hiddeWinner');
        }
    }
        
    )
    .catch(error => console.log('error', error));
}

/* ----- Delay ----- */
function timer(ms) { return new Promise(res => setTimeout(res, ms)); }