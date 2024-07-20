<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPLASHSCREEN</title>
</head>

<style>
    body {
        margin: 12vh;
        text-align: center;
        font-size: calc(8vw + 8vh);
        background: #D24000;

        color: #fff;
        font-family: sans-serif;
        letter-spacing: -.3vw;
        overflow: hidden;
        font-family: "Lacquer", system-ui;
    }
    
    .rugrats {
        margin: 0 auto;
        text-align: center;
    }
    
    .rugrats span {
        display: inline-block;
        transition: color linear 0.5s forwards;
        -webkit-text-stroke-width: .32vw;
        -webkit-text-stroke-color: black;
        text-shadow: .4vw .5vw #000;
    }
    
    .rugrats span {
        text-transform: capitalize;
        text-transform: lowercase;
        /* 	animation:caseChange 5s ease infinite forwards;
}
@keyframes caseChange{
	from{
		text-transform:uppercase;
	}
	to{
		text-transform:lowercase;
	}
} */
    }
</style>

<body>
    <div class="rugrats">Algea</div>
    <div class="rugrats">Development</div>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lacquer&display=swap" rel="stylesheet">
</body>

<script>
    var divs = document.querySelectorAll(".rugrats");

    divs.forEach(function(div) {
        var text = div.textContent;
        div.innerHTML = "";

        for (var i = 0; i < text.length; i++) {
            var span = document.createElement("span");
            span.textContent = text[i];
            div.appendChild(span);
        }

        var spans = div.querySelectorAll('span');

        function shuffle(array) {
            for (var i = array.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = array[i];
                array[i] = array[j];
                array[j] = temp;
            }
            return array;
        }

        spans = shuffle(Array.from(spans));

        function getRandomValue() {
            return Math.random() * 0.4 - 0.24;
        }

        function applyRandomTransform() {
            spans.forEach(function(span) {
                var xOffset = getRandomValue() * 10;
                var yOffset = getRandomValue() * 15;
                var rotation = getRandomValue() * 6;

                span.style.transform = 'translate(' + xOffset + 'px, ' + yOffset + 'px) rotate(' + rotation + 'deg)';
                span.style.textIndent = xOffset + 'px';
            });
        }

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        var currentIndex = 0;

        function changeColorSequentially() {
            spans.forEach(function(span, index) {
                var colorIndex = (index + currentIndex) % spans.length;
                span.style.color = (colorIndex === 0) ? getRandomColor() : spans[colorIndex - 1].style.color;
            });

            currentIndex = (currentIndex + 1) % spans.length;
        }

        setInterval(changeColorSequentially, 250);
        setInterval(applyRandomTransform, 100);
    });

    setTimeout(function() {
            window.location.href = "./loading.php"; // Redirect to landing.php after 7 seconds
        }, 7000); // 7000 milliseconds = 7 seconds
</script>


</html>