<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
    <title>LOGGING OUT</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/plugins/CSSPlugin.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/utils/Draggable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

</head>

<style>
    @font-face {
        font-family: "Aansa";
        src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/aansa.eot?") format("eot"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/aansa.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/aansa.ttf") format("truetype");
    }
    
    * {
        box-sizing: border-box;
        cursor: url("data:image/x-icon;base64,AAACAAEAICACAAIABAAwAQAAFgAAACgAAAAgAAAAQAAAAAEAAQAAAAAAgAAAAAAAAAAAAAAAAgAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAHAAAABwAAAA4AAAAOAAAAHAAAABwAAAQ4AAAGOAAAB3AAAAfwAAAH/4AAB/8AAAf+AAAH/AAAB/gAAAfwAAAH4AAAB8AAAAeAAAAHAAAABgAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/////////////////+P////B////wf///4P///+D///fB///zwf//8YP///CD///wB///8AAf//AAP//wAH//8AD///AB///wA///8Af///AP///wH///8D////B////w////8f////P////3/////////////////////////8="), auto !important;
    }
    
    body,
    html {
        overflow: hidden;
        font-family: "Aansa", monospace;
        background-color: #000;
    }
    
    .screen {
        height: 100vh;
        width: 100vw;
        background-color: teal;
        position: relative;
    }
    
    .screen__overlay {
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: white;
        z-index: 2;
        opacity: 0;
        pointer-events: none;
    }
    
    .start {
        background-color: #b6bbb7;
        height: 50px;
        width: 100%;
        position: fixed;
        bottom: 0;
        z-index: 1;
        box-shadow: 0px 0px 0px 2px #f7f9f6, 0px 0px 0px 4px #d5dad6;
        padding: 0 6px;
        display: flex;
        align-items: center;
    }
    
    .start__button {
        font-size: 34px;
        height: 34px;
        display: inline-block;
        line-height: 1.25em;
        padding: 4px;
        box-shadow: 1px 1px 0px 1px #808080, 2px 2px 0px 2px #000, -1px -1px 0px 1px #fff;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: default;
    }
    
    .start__button:active {
        box-shadow: 1px 1px 0px 1px #808080, 2px 2px 0px 2px #fff, -1px -1px 0px 1px #000;
    }
    
    .start__icon {
        transform: translateY(-20%);
    }
    
    .box {
        height: 25px;
        width: 25px;
        background-color: red;
        cursor: url("data:image/x-icon;base64,AAACAAEAICACAAIABAAwAQAAFgAAACgAAAAgAAAAQAAAAAEAAQAAAAAAgAAAAAAAAAAAAAAAAgAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAHAAAABwAAAA4AAAAOAAAAHAAAABwAAAQ4AAAGOAAAB3AAAAfwAAAH/4AAB/8AAAf+AAAH/AAAB/gAAAfwAAAH4AAAB8AAAAeAAAAHAAAABgAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/////////////////+P////B////wf///4P///+D///fB///zwf//8YP///CD///wB///8AAf//AAP//wAH//8AD///AB///wA///8Af///AP///wH///8D////B////w////8f////P////3/////////////////////////8="), auto !important;
    }
    
    .icon {
        height: 52px;
        width: 52px;
        background-size: cover, calc(100% - 4px);
        background-position: 50%, 2px 2px;
        position: relative;
        background-repeat: no-repeat;
    }
    
    .icon__text {
        position: absolute;
        bottom: -1em;
        padding: 0.2em;
        padding-top: 0.8em;
        line-height: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    
    .icon--left {
        top: 30%;
        left: 30%;
    }
    
    .icon--right {
        top: 40%;
        left: 70%;
    }
    
    .icon--highlight .icon__text {
        background-color: rgba(0, 0, 255, 0.2);
    }
    
    .icon--calendar {
        background-image: linear-gradient(to left, rgba(0, 0, 255, 0), rgba(0, 0, 255, 0)), url("./assets/Images/elements/7.png");
    }
    
    .icon--calendar .icon__text {
        left: 55%;
    }
    
    .icon--calendar.icon--highlight {
        background-image: linear-gradient(to left, rgba(0, 0, 255, 0.2), rgba(0, 0, 255, 0.2)), url("./assets/Images/elements/7.png");
    }
    
    .icon--trash--empty {
        background-image: linear-gradient(to left, rgba(0, 0, 255, 0), rgba(0, 0, 255, 0)), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/recycle-empty-48.png");
    }
    
    .icon--trash--empty.icon--highlight {
        background-image: linear-gradient(to left, rgba(0, 0, 255, 0.2), rgba(0, 0, 255, 0.2)), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/recycle-empty-48.png");
    }
    
    .icon--trash--full {
        background-image: linear-gradient(to left, rgba(0, 0, 255, 0), rgba(0, 0, 255, 0)), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/recycle-full-48.png");
    }
    
    .icon--trash--full.icon--highlight {
        background-image: linear-gradient(to left, rgba(0, 0, 255, 0.2), rgba(0, 0, 255, 0.2)), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/recycle-full-48.png");
    }
    
    .hide {
        pointer-events: none;
        opacity: 0;
    }
</style>

<body>
    <div class="screen">
        <div class="screen__overlay"></div>

        <div class="start">
            <div class="start__button">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/windows.png" alt="" class="start__icon" />
                <span class="start__text">Drag to Trash Bin</span>
            </div>
        </div>

        <div class="js-drag js-trash icon icon--right icon--trash icon--trash--empty">
            <span class="icon__text">Trash</span>
        </div>
        <div class="js-drag js-calendar icon icon--left icon--calendar">
            <span class="icon__text">Account</span>
        </div>
    </div>

    <div class="screen">
        <div class="screen__overlay"></div>

        <div class="start">
            <div class="start__button">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/windows.png" alt="" class="start__icon" />
                <span class="start__text">Drag Account to Trash</span>
            </div>
        </div>

        <div class="js-drag js-trash icon icon--right icon--trash icon--trash--empty">
            <span class="icon__text">Trash</span>
        </div>
        <div class="js-drag js-calendar icon icon--left icon--calendar">
            <span class="icon__text">Account</span>
        </div>
    </div>

    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/calendar-48.png" alt="" class="hide" />
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/recycle-empty-48.png" alt="" class="hide" />
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/62921/recycle-full-48.png" alt="" class="hide" />

    <script>
        const icon = document.getElementsByClassName('icon');

        let droppable = false;
        let rumbleTween;

        Draggable.create(".js-drag", {
            type: "x,y",
            edgeResistance: 0.65,
            bounds: ".screen",
            onPress: function() {
                $(this.target).addClass('icon--highlight');
            },
            onRelease: function() {
                if (droppable) {
                    killThisYearAlready();
                } else {
                    $(this.target).removeClass('icon--highlight');
                }
            },
            onDrag: dropTest
        });


        function dropTest(e) {
            console.log(e);
            console.log(this);
            if ($(e.target).hasClass('js-calendar')) {
                if (this.hitTest('.icon--trash', "50%")) {
                    canDrop(true);
                } else {
                    canDrop(false);
                }
            }
        }

        function canDrop(isOverTrash) {
            if (isOverTrash) {
                droppable = true;
                $('.icon--trash').addClass('icon--highlight');
            } else {
                droppable = false;
                $('.icon--trash').removeClass('icon--highlight');
            }
        }

        function killThisYearAlready() {
            $('.icon--calendar').css('display', 'none');
            $('.icon--trash').addClass('icon--trash--full');
            $('.icon--trash').removeClass('icon--highlight');
            $('.start__text').text('End');

            setTimeout(function() {
                let rumbleFactor = 3;
                rumbleTween = TweenMax.to('.screen', 0.1, {
                    y: `+=${rumbleFactor}`,
                    x: `+=${rumbleFactor}`,
                    onUpdate: function() {
                        rumbleFactor = 1 + Math.random() * 5;
                    },
                    ease: Expo.easeInOut,
                    repeat: -1
                });

            }, 500);

            setTimeout(function() {
                rumbleTween.pause();
                TweenMax.to('.screen', 0.4, {
                    scaleY: 0.01,
                    ease: Power4.easeIn
                });

                TweenMax.to('.screen', 0.1, {
                    scaleX: 0.01,
                    delay: 0.4,
                    ease: Linear.easeNone
                });

                TweenMax.to('.screen__overlay', 0.4, {
                    opacity: 1,
                    delay: 0.1,
                    ease: Power4.easeIn
                });

                TweenMax.to('.screen', 0.4, {
                    opacity: 0,
                    delay: 0.5,
                    ease: Power4.easeIn
                });

                 // Redirect after the animation is done
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 800); 
                
            }, 1500);
        }
        
        
    </script>

</body>

</html>