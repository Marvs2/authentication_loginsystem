// javascript
let guestScore = document.getElementById("score-guest-el")
let homeScore = document.getElementById("score-home-el")
// let count = 0

function updateScore (element, value) {
    let currentScore = parseInt(element.textContent)
    element.textContent = currentScore + value
}

function incrementg1() {updateScore(guestScore, 1);}
function incrementg2() {updateScore(guestScore, 2);}
function incrementg3() {updateScore(guestScore, 3);}

function decrementg1() {updateScore(guestScore, -1);}
function decrementg2() {updateScore(guestScore, -2);}
function decrementg3() {updateScore(guestScore, -3);}

function incrementh1() {updateScore(homeScore, 1);}
function incrementh2() {updateScore(homeScore, 2);}
function incrementh3() {updateScore(homeScore, 3);}

function decrementh1() {updateScore(homeScore, -1);}
function decrementh2() {updateScore(homeScore, -2);}
function decrementh3() {updateScore(homeScore, -3);}


function backToZero() {guestScore.textContent = 0;}
function backToZeroh() {homeScore.textContent = 0;}

































//Zero = guest
// function backToZero(){
//     guestScore.textContent = 0
//     count = 0
// }

// function increment1() {
//     if(incrementg1 == incrementg1){
//         guestScore.textContent = count + 1
//     }
//     elif(incrementh1 == incrementh1)
//     {
//         homeScore.textContent = count + 1
//     }
// }


// function incrementh1() {
//     count += 1
//     homeScore.textContent = count
// }
//Zeroh = home
// function backToZeroh(){
//     homeScore.textContent = 0
//     count = 0
// }