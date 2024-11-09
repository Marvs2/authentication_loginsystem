// grab the count-el element, store it in a countEl variable
let countEl = document.getElementById("count-el")
// make the count 0 
let count = 0


function increment() {
    count += 1
    countEl.innerText = count
    // console.log(count) // it will present in the terminal
    // set countEl's innerText to the count
}


// 1. Create a function, save(), which logs out the count when it's called

let countSa = document.getElementById("count-save")

function save() {
    let countStr = count + " - "
    countSa.textContent += countStr
    countEl.textContent = 0
    count = 0
}