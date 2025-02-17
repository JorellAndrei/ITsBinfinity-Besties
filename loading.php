<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <title>IT's Binfinity</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/CSS/splashscreen.css">
    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <canvas id="myCanvas" width="800" height="250"></canvas>

    <div class="splash">
        <img src="./assets/Images/logo.gif" alt="Logo" class="splash-logo">
    </div>

    <div class="imgContainer">
        <img class="wave" src="https://i.pinimg.com/originals/64/91/54/6491542a239217a7d44bfba368cd06c8.png" alt="" /><img class="bottle" src="https://i.pinimg.com/originals/67/19/71/6719713708a3a22081b18e9a520c85e8.png" alt="" /><img class="wave delay"
            src="https://i.pinimg.com/originals/64/91/54/6491542a239217a7d44bfba368cd06c8.png" alt="" /><img class="wave delay" src="https://i.pinimg.com/originals/64/91/54/6491542a239217a7d44bfba368cd06c8.png" alt="" />

    </div>

    <div class="progress">
        <div class="inner"></div>
    </div>

    <script>
        // Simulating loading progress
        var progress = 0;
        var interval = setInterval(function() {
            progress += 10;
            $('.inner').css('width', progress + '%');
            if (progress >= 100) {
                clearInterval(interval);
                // Delay before redirecting to home.html
                setTimeout(function() {
                    window.location.href = './login.php';
                }, 10000); // Adjust the delay time (in milliseconds) as needed
            }
        }, 200);

        window.requestAnimFrame = (function() {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();


        /*
         * FX will be our global object
         */
        var FX = {};

        /*
         * basic canvas variables
         */
        FX.canvas = document.getElementById('myCanvas');
        FX.ctx = FX.canvas.getContext('2d');
        FX.width = FX.canvas.width;
        FX.height = FX.canvas.height;

        //our particles will be stored in this array
        FX.particles = [];


        /*
         * constructor for new particle
         * @param Object  args  configuration object
         *        x : X-Position
         *        y : Y-Position
         *        z : Z-Index (defined depth)
         */
        var particle = function(args) {

            this.sincount = 0; //helper variable for sinus transform-transitions
            this.x = args.x;
            this.y = args.y;
            this.z = args.z;

            this.origin = {
                x: 0,
                y: 0
            };

            this.target = {
                x: 0,
                y: 0
            };

            this.color = FX.gradient.get();

            this.polys = [];

            //create random polygon with 3 points
            for (var i = 0; i < 3; i = i + 1) {
                this.polys.push([
                    (-5 + Math.random() * 20),
                    (-5 + Math.random() * 20)
                ]);
            }
        }

        particle.prototype.update = function() {

            //e is our entity
            var e = this;

            //if sincount is zero, save origin and determine new random target position
            if (e.sincount === 0) {
                e.origin.x = e.x;
                e.origin.y = e.y;
                e.target.x = (-30 + Math.random() * 60);
                e.target.y = -30 - Math.random() * 10;
            }
            //sincount gets increased by z-index, which means front particles move faster
            e.sincount += e.z;

            //calculate new x positions by origin + target
            e.x = e.origin.x + (e.target.x * Math.sin(FX.rad(e.sincount)));
            e.y = e.origin.y + (e.target.y * Math.sin(FX.rad(e.sincount)));

            //if sincount reaches 70, it is close to stopping (which happens at 90)
            //we don't want our particles to pause movement, so reset at 70
            if (e.sincount > 70) {
                e.sincount = 0;

                //make sure particles stay in visible range
                if (e.y < 0) e.y = FX.height - Math.random() * 10;
                if (e.x < 0) e.x = FX.width - Math.random() * 10;
                if (e.x > FX.width) e.x = Math.random() * 10;
            }
        };

        particle.prototype.draw = function() {

            //e is our entity
            var e = this;

            var c = this.color;

            //transparency depending on z-index
            FX.ctx.fillStyle = 'rgba(' + c.r + ',' + c.g + ',' + c.b + ', ' + e.z + ')';

            FX.ctx.beginPath();
            FX.ctx.moveTo(e.x + e.polys[0][0], e.y + e.polys[0][1]);
            for (var i = 1, k = e.polys.length; i < k; i = i + 1) {
                FX.ctx.lineTo(e.x + e.polys[i][0], e.y + e.polys[i][1]);
            }
            FX.ctx.lineTo(e.x + e.polys[0][0], e.y + e.polys[0][1]);

            //draw the defined paths
            FX.ctx.fill();
        };

        /*
         * FX.gradient provides methods to generate a color gradient in X Steps
         * @return Object public functions
         *      get: get the next gradient color
         */
        FX.gradient = (function() {

            var amount = 32, //how many steps
                start = [44, 76, 116], //startcolor, RGB
                end = [37, 107, 212], //endcolor, RGB
                steps = [], //a single gradient step
                colors = []; //array with all gradient steps


            /*
             * create single gradient out of start & end
             */
            var create = (function() {

                //calculate single step size by color channel
                steps = [
                    (start[0] - end[0]) / amount, //R
                    (start[1] - end[1]) / amount, //G
                    (start[2] - end[2]) / amount //B
                ];

                //save each gradient step in colors[]
                for (var i = 0; i <= amount; i = i + 1) {
                    colors[i] = [
                        Math.round(start[0] - steps[0] * i), //R
                        Math.round(start[1] - steps[1] * i), //G
                        Math.round(start[2] - steps[2] * i) //B
                    ];
                }
            })();

            /*
             * Get a random gradient color as rgb
             * @return  String  rgb()
             */
            var get = function() {
                var rand = Math.round(Math.random() * amount);
                return {
                    r: colors[rand][0],
                    g: colors[rand][1],
                    b: colors[rand][2]
                };
            };

            return {
                get: get
            };
        })();


        /*
         * Converts degrees to radients
         * @param Number  deg The degrees to be convertet
         * @return  Number  the radient value
         */
        FX.rad = function(deg) {
            return deg * Math.PI / 180;
        };

        /*
         * FX.loop is our main loop
         */
        FX.loop = function() {

            //clear the canvas
            FX.ctx.clearRect(0, 0, FX.width, FX.height);

            for (var i in FX.particles) {
                FX.particles[i].update();
                FX.particles[i].draw();
            }

            //request next loop
            requestAnimFrame(FX.loop);
        };

        /*
         * full screen canvas
         */
        FX.setFullscreen = function() {
            FX.width = FX.canvas.width = window.innerWidth;
            FX.height = FX.canvas.height = window.innerHeight;
        };

        //funny codepen timeout bugfix
        window.setTimeout(function() {
            FX.setFullscreen();
            /*
             * Create particles
             */
            for (var i = 0; i < 256; i++) {
                FX.particles.push(new particle({
                    x: Math.round(Math.random() * FX.width),
                    y: Math.round(Math.random() * FX.height),
                    z: Math.round(Math.random() * 10) / 10
                }));
            }

            FX.loop();
        }, 100);
    </script>

</body>

</html>