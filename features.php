<?php 
session_start();
include('includes/header.php') ?>


<style>   
/* body {      /* first cube
    display: flex;      
    justify-content: center;      
    align-items: center;      
    height: 100vh;     
    margin: 0;      
    background-color: #333;     
    perspective: 1000px;    
}     */

/* for 2nd cube container */
.container {
    perspective: 1000px;
    display: block;    
    /* justify-content: center;       */
    align-items: center;       
}


.cube {      
    /* position: relative;   */
    /* padding: 50px 250px;      */
    display: flex;
    width: 200px;      
    height: 200px;      
    transform-style: preserve-3d;      
    /* animation: rotate 10s infinite linear;   /* first cube   */
    transform: rotateY(0deg); /* for 2nd cube */
    transition: transform 0.5s; /* for 2nd cube */
}    
.cube-face {      
    position: absolute;      
    width: 200px;      
    height: 200px;      
    background-color: rgba(255, 255, 255, 0.8);      
    border: 2px solid #000;      
    display: flex;      
    justify-content: center;      
    align-items: center;      
    font-size: 24px;      
    color: #000;      
    font-weight: bold;    
}   
/* /* Define the positions of each face --------------- First cube
.front  { transform: rotateY(0deg) translateZ(100px); background-color: #FF6666; }    
.back   { transform: rotateY(180deg) translateZ(100px); background-color: #66FF66; }    
.left   { transform: rotateY(-90deg) translateZ(100px); background-color: #6666FF; }   
.right  { transform: rotateY(90deg) translateZ(100px); background-color: #FFFF66; }    
@keyframes rotate {     
    from { transform: rotateX(0deg) rotateY(0deg); } 
    to { transform: rotateX(360deg) rotateY(360deg); }    
}   */

   /* for Second cube */

   /* Define the positions of each face */
.front  { transform: rotateY(0deg) translateZ(100px); background-color: #FF6666; }
.back   { transform: rotateY(180deg) translateZ(100px); background-color: #66FF66; }
.left   { transform: rotateY(-90deg) translateZ(100px); background-color: #6666FF; }
.right  { transform: rotateY(90deg) translateZ(100px); background-color: #FFFF66; }
.top    { transform: rotateX(90deg) translateZ(100px); background-color: #FF66FF; }
.bottom { transform: rotateX(-90deg) translateZ(100px); background-color: #66FFFF; }

.controls {
    padding-top: 40vh; 
    text-align: center;
}

button {
    margin: 0 10px;
    padding: 10px 20px;
    font-size: 16px;
}
</style>
 <!-- first cube html -->
<!--\ <div class="cube">    
<div class="cube-face front">Front</div>   
<div class="cube-face back">Back</div>    
<div class="cube-face left">Left</div>    
<div class="cube-face right">Right</div>  
</div> -->

<!-- second cube -->

<!--<div class="container">
    <div class="cube">
        <div class="cube-face front">Front</div>
        <div class="cube-face back">Back</div>
        <div class="cube-face left">Left</div>
        <div class="cube-face right">Right</div>
    </div>
    <div class="controls">
        <button id="left"><--</button>
        <button id="right">-->

        <!--</button>
     <button id="stop">Stop</button>
    </div>
</div> -->

<div class="container">
    <div class="cube">
        <div class="cube-face front">Front</div>
        <div class="cube-face back">Back</div>
        <div class="cube-face left">Left</div>
        <div class="cube-face right">Right</div>
        <div class="cube-face top">Top</div>
        <div class="cube-face bottom">Bottom</div>
    </div>
    <div class="controls">
        <button id="top">↑</button>
        <button id="bottom">↓</button>
        <button id="left"><--</button>
        <button id="right">--></button>
        <button id="stop">Stop</button>
    </div>
</div>
    <!-- <link rel="stylesheet" href="assets/css/feature.css"> 
      <h1>3D Building Layout</h1> 
    <div class="building">-->
        <?php
            // $floors = 3;
            // $rooms = 4;


            // // loop through each floor
            // for ($f = $floors; $f >= 1; $f--) {
            //     echo "<div class='floor' style='--floor-number: $f;'>";
            //         echo "<h2>Floor $f</h2>";

            //         for ($r=1; $r <= $rooms; $r++) { 
            //             # code...
            //             echo "<div class='room'>Room $r</div>";
            //         }
            //         echo "</div>";
            // }
        ?>
    <!--</div> 
     <button class="btn btn-primary">TESTING</button> -->







     <!-- For second cube  script -->

     <script>
let rotationY = 0;
let rotationX = 0;

document.getElementById('left').addEventListener('click', () => {
    rotationY -= 90;
    document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});

document.getElementById('right').addEventListener('click', () => {
    rotationY += 90;
    document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});

document.getElementById('top').addEventListener('click', () => {
    rotationX += 90;
    document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});

document.getElementById('bottom').addEventListener('click', () => {
    rotationX -= 90;
    document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});

document.getElementById('stop').addEventListener('click', () => {
    // You can add logic here if you want to stop or reset the cube
    rotationY = 0;
    rotationX = 0;
    document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg) rotateX(${rotationX}deg)`;
});
// let rotationY = 0;

// document.getElementById('left').addEventListener('click', () => {
//     rotationY -= 90;
//     document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg)`;
// });

// document.getElementById('right').addEventListener('click', () => {
//     rotationY += 90;
//     document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg)`;
// });

// document.getElementById('stop').addEventListener('click', () => {
//     rotationY = 0; // Stop the rotation
//     document.querySelector('.cube').style.transform = `rotateY(${rotationY}deg)`;
// });
     </script>
<?php include('includes/footer.php') ?>