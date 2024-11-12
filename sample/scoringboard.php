<html>
    <head>
        <link rel="stylesheet" href="../assets/css/scoringboards.css">
    </head>
    <body>
        <div>
            <h1>Guest Score:</h1>
            <h2 id="score-guest-el">0</h2>
            <button id="increment-g-btn" onclick="incrementg1()">+ 1</button>
            <button id="increment-g-btn" onclick="incrementg2()">+ 2</button>
            <button id="increment-g-btn" onclick="incrementg3()">+ 3</button>
            <br>
            <button id="decrement-g-btn" onclick="decrementg1()">- 1</button>
            <button id="decrement-g-btn" onclick="decrementg2()">- 2</button>
            <button id="decrement-g-btn" onclick="decrementg3()">- 3</button>
            <br>
            <button id="zero-btn" onclick="backToZero()">Zero</button>
            <h2 id="count-save">Previous Increment: </h2>
        </div>
        <div>
            <h1>Home Score:</h1>
            <h2 id="score-home-el">0</h2>
            <button id="increment-h-btn" onclick="incrementh1()">+ 1</button>
            <button id="increment-h-btn" onclick="incrementh2()">+ 2</button>
            <button id="increment-h-btn" onclick="incrementh3()">+ 3</button>
            <br>
            <button id="decrement-h-btn" onclick="decrementh1()">- 1</button>
            <button id="decrement-h-btn" onclick="decrementh2()">- 2</button>
            <button id="decrement-h-btn" onclick="decrementh3()">- 3</button>
            <br>
            <button id="zero-btn" onclick="backToZeroh()">Zero</button>
            <h2 id="count-save">Previous Increment: </h2>
        </div>
        <script src="../assets/js/scoringboard.js"></script>
    </body>
</html>
