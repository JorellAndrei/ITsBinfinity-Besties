<?php  
  session_start();  
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT's Binfinity - Sample Game</title>
    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
    <!--styles-->
    <link rel="stylesheet" href="./assets/CSS/styles.css">
    <link rel="stylesheet" href="./assets/CSS/simulation.css">

    <link href="assets/CSS/bootstrap.min.css">
    <link href="assets/CSS/all.min.css">
    <link href="assets/CSS/animate.compat.css">

    <!--scripts-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("image", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var fetchData = ev.dataTransfer.getData("image");
        ev.target.appendChild(document.getElementById(fetchData));
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Get all nav buttons
        const navButtons = document.querySelectorAll('.nav-button');

        // Add click event listener to each nav button
        navButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the URL from the data-url attribute of the button
                const url = this.dataset.url;

                // Navigate to the URL
                window.location.href = url;
            });
        });
    });

    $(document).on('click', 'a[href^="#"]', function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });

    var rectangle = $("#person");
    var speechBubble = $("#SpeechBubble");

    rectangle.hover(
        function() {
            simulation.css({
                "animation-name": "expand-bounce",
                "animation-duration": "0.25s"
            });
        },
        function() {
            simulation.css({
                "animation-name": "shrink",
                "animation-duration": "0.1s"
            });
        }
    );

    myAudio = document.getElementById("audio1");

    function setHalfVolume() {
        var myAudio = document.getElementById("audio1");
        myAudio.volume = 0.01; //Changed this to 0.5 or 50% volume since the function is called Set Half Volume ;)
    }
</script>
</head>

<style>
     #dragData8 {
       display: block;
       align-items: center;
       justify-items: center;
       justify-content: center;
       position: absolute;
       transform: translateY(560px) translateX(129px);
       width: 6%;
       z-index: 900;
   }

   #dragData9 {
       display: block;
       align-items: center;
       justify-items: center;
       justify-content: center;
       position: absolute;
       transform: translateY(300px) translateX(309px);
       width: 9%;
       z-index: 900;
   }

   #dragData10 {
       display: block;
       align-items: center;
       justify-items: center;
       justify-content: center;
       position: absolute;
       transform: translateY(400px) translateX(729px);
       width: 13%;
       z-index: 900;
   }

   #dragData11 {
       display: block;
       align-items: center;
       justify-items: center;
       justify-content: center;
       position: absolute;
       transform: translateY(660px) translateX(529px);
       width: 10%;
       z-index: 900;
   }

   #dragData12 {
       display: block;
       align-items: center;
       justify-items: center;
       justify-content: center;
       position: absolute;
       transform: translateY(120px) translateX(999px);
       width: 7%;
       z-index: 900;
   }

   #dragData13 {
       display: block;
       align-items: center;
       justify-items: center;
       justify-content: center;
       position: absolute;
       transform: translateY(660px) translateX(229px);
       width: 12%;
       z-index: 900;
   }
</style>

<body style="background-color: white;" class="preload">
    <!------------------- NAVBAR  -------------------------->
    <?php include './assets/PHP/Include/header.inc.php'; ?>

    <!------------------- END NAVBAR  -------------------------->

    <audio id="audio1" nocontrol autoplay onloadeddata="setHalfVolume()">
        <source src="./assets/Images/bgmusic.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>

    <div class="container">

        <div class="floor">
            <div class="soil">
                <img id="dragData1" src="https://cdn.pixabay.com/photo/2013/07/12/12/48/garbage-146279_960_720.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData2" src="./assets/Images/elements/10.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData3" src="./assets/Images/elements/7.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData4" src="./assets/Images/elements/8.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData5" src="./assets/Images/elements/9.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData6" src="./assets/Images/elements/11.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData7" src="./assets/Images/elements/6.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData8" src="./assets/Images/new/102.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData9" src="./assets/Images/new/104.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData10" src="./assets/Images/new/107.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData11" src="./assets/Images/new/108.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData12" src="./assets/Images/new/111.png" draggable="true" ondragstart="drag(event)" width="100">

                <img id="dragData13" src="./assets/Images/new/114.png" draggable="true" ondragstart="drag(event)" width="100">


                <center>
                    <img id="getData" ondrop="drop(event)" ondragover="allowDrop(event)" src="./assets/Images/elements/51.png">
                </center>


            </div>

        </div>
        <div class="pattern"></div>

        <div class="leftTree">
            <div></div>
            <div></div>
        </div>
        <div class="centerTree">
            <div></div>
        </div>
        <div class="rightTree"></div>
        <div class="Balloons">
            <div class="BalloonLeft"></div>
            <div class="Ballooncenter"></div>
            <div class="BalloonRight"></div>
            <div class="BalloonBase"></div>
            <div class="BalloonBaseShadow"></div>
        </div>
        <div class="booth">
            <div class="ticket"><span>&#9733</span> TICKET <span>&#9733</span></div>
        </div>
        <div class="boothShadow"></div>
        <div class="ferris_wheel">
            <div class="wheel_wrap">
                <div class="wheel">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="buckets">
                <div><span></span></div>
                <div><span></span></div>
                <div><span></span></div>
                <div><span></span></div>
                <div><span></span></div>
                <div><span></span></div>
                <div><span></span></div>
                <div><span></span></div>
            </div>
            <div class="stand">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="sun"></div>
        <div class="cloudLeft"></div>
        <div class="cloudRight"></div>

    </div>


</body>

</html>