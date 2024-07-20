<?php
// Start session
session_start();

// Ensure user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Retrieve username from session
$username = isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : '';
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">
    <title>IT's Binfinity - Home</title>

    <!--styles-->
    <link rel="stylesheet" href="./assets/CSS/styles.css">
    <link rel="stylesheet" href="./assets/CSS/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://get.mavo.io/stable/mavo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!--scripts-->
    <script src="./assets/JS/script.js"></script>
    <script src="./assets/JS/home.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-compat/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1229210/lottie.js"></script>
    <script src="https://get.mavo.io/stable/mavo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</head>
</head>

<style>
    body.preload * {
        animation-duration: 0s !important;
        -webkit-animation-duration: 0s !important;
        transition: background-color 0s, opacity 0s, color 0s, width 0s, height 0s, padding 0s, margin 0s !important;
    }
</style>

<body style="background-color: white;" class="preload">

    <?php include './assets/PHP/Include/header.inc.php'; ?>

    <!------------------- HEADER  -------------------------->

    <div class="header px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-2xl md:px-24 lg:px-8 lg:py-20">
        <div class="header px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-2xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="flex flex-col md:pr-8 xl:pr-0 lg:max-w-lg">
                    <div class="max-w-xl mb-6" style="padding-left: 10rem;">
                        <h2 style="font-size: 5.3rem; text-align: left; font-weight: 700; margin-top: -3.5rem;" class="appname max-w-lg mb-9 font-sans text-1xl font-bold tracking-tight sm:text-1xl sm:leading-none">
                            IT's<br class="hidden md:block" /> Binfinity
                            <span class="inline-block"></span>
                        </h2>
                        <p class="text-base md:text-lg" style="text-align: justify;">
                            IT's Binfinity addresses the public awareness gap by providing an interactive platform for users to gain real-time insights into the consequences of their waste disposal decisions.
                        </p>
                    </div>
                    <div style="padding-left: 10rem;">
                        <a href="./features.html" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                            <button class="cssbuttons-io-button">
                                Get started
                                <div class="icon">
                                  <svg
                                    height="24"
                                    width="24"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                      d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                      fill="currentColor"
                                    ></path>
                                  </svg>
                                </div>
                              </button>

                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-center -mx-4 lg:pl-1">
                    <!-- <div class="flex flex-col items-end px-3">
                    <img class="floatIphone mb-6 h-28 sm:h-48 xl:h-56 w-28 sm:w-48 xl:w-56" src="./assets/Images/3Diphone-8.png" alt="" />
                    <img class="object-cover w-20 h-20 rounded shadow-lg sm:h-32 xl:h-40 sm:w-32 xl:w-40" src="./assets/Images/3Diphone-8.png" alt="" />
                </div> -->
                    <div class="px-10">
                        <img class="floatIphone w-49" src="./assets/Images/elements/38.png" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <!------------------- END HEADER  -------------------------->


        <!------------------- 1ST HOME SECTION  -------------------------->

        <div style="background-color: white;" id="1stsec" class="relative flex flex-col-reverse px-4 py-16 mx-auto lg:block lg:flex-col lg:py-32 xl:py-48 md:px-8 sm:max-w-xl md:max-w-full">
            <div class=" z-0 flex justify-center h-full -mx-4 overflow-hidden lg:pt-24 lg:pb-16 lg:pr-8 xl:pr-0 lg:w-1/2 lg:absolute lg:justify-end lg:bottom-0 lg:left-0 lg:items-center">
                <img class="test" id="test" onscroll="Animation();" src="./assets/Images/laptop.png" style="width: 80rem; transform: translateX(-100rem);" alt="" />
            </div>
            <div class="relative flex justify-end max-w-xl mx-auto xl:pr-32 lg:max-w-screen-xl">
                <div class="mb-16 lg:pr-5 lg:max-w-lg lg:mb-0">
                    <div class="max-w-xl mb-6">
                        <div>
                            <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                                Introducing our Project
                            </p>
                        </div>
                        <h2 style="font-size: 2.9rem; line-height:0.9;" class="max-w-lg mb-10 font-sans text-6xl font-bold tracking-tight text-gray-800 sm:text-9xl sm:leading-none">
                            Eco-venture Towards<br class="hidden md:block" />
                            <span style="color: #6bab78; font-size: 3.5rem; z-index: 999;" class="inline-block text-deep-purple-accent-400"> Sustainable Living</span>
                        </h2>
                        <p style="margin-left: 2rem;" class="text-base text-gray-700 md:text-lg">
                            IT’s Binfinity is an informative with simple game and innovative website that redefines waste sorting as a captivating adventure
                        </p>
                    </div>

                </div>
            </div>
        </div>


        <!-- END -->

        <!--------------------- DIVIDER ------------------------------>

        <!--------------- 2ND SECTION ----------------------->

        <div style="background-color: white;">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                <div class="max-w-xl mb-9 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                    <div>
                        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                        Sorting Waste Matters
                        </p>
                    </div>
                    <h2 style="font-size: 4rem;" class="max-w-lg mb-5 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-6xl md:mx-auto">
                        <span class="relative inline-block">
              <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                <defs>
                  <pattern id="679d5905-e08c-4b91-a66c-84aefbb9d2f5" x="0" y="0" width=".135" height=".30">
                    <circle cx="1" cy="1" r=".7"></circle>
                  </pattern>
                </defs>
                <rect fill="url(#679d5905-e08c-4b91-a66c-84aefbb9d2f5)" width="52" height="24"></rect>
              </svg>
              <span style="color: #6bab78;" class="relative">Benefits</span>
                        </span>
                         for You and the Environment
                    </h2>
                    <p class="text-base text-gray-700 md:text-lg" style="margin-bottom: 4rem;">
                    Sorting waste isn’t just a household chore—it’s a vital practice for environmental conservation. Explore the benefits of waste sorting, including reduced landfill use, improved recycling efficiency, and resource conservation. 
                    </p>
                </div>
                <div class="mx-auto lg:max-w-2xl">
                    <div class="relative w-full">
                        <img class="test2" id="test2" onscroll="Animation();" src="./assets/Images/devices.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->

        <!--------------- 3rd SECTION ----------------------->

        <div style="background-color: #6bab7880; background-size:cover; margin-left:-1em;" class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xxl md:px-24 lg:px-8 lg:py-20">
            <div class="flex flex-col items-center justify-between w-full mb-10 lg:flex-row">
                <div style="margin-left: 10rem;" class="mb-16 lg:mb-0 lg:max-w-lg lg:pr-5">
                    <div class="max-w-xl mb-6">
                        <div>
                            <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">Features
                            </p>
                        </div>
                        <h2 class="max-w-lg mb-8 font-sans text-2xl font-bold tracking-tight text-gray-900 sm:text-1xl sm:leading-none" style="font-size: 4.25rem;">
                            Waste-Sorting<br class="hidden md:block" />
                            <span style="color: #245441;" class="inline-block text-deep-purple-accent-400">Becomes Adventure</span>
                        </h2>
                        <p class="text-base text-gray-700 md:text-lg">
                            Embark on an exciting journey of environmental responsibility and discovery with BINFINITY, the ultimate waste management web packed with innovative features designed to engage, educate, and inspire.
                        </p>
                    </div>
                </div>
                <div class="hvr-main flex items-right justify-center lg:w-1/2">
                    <div class="w-3/3">
                        <img class="backw object-cover" src="./assets/Images/new/planet-earth.png" alt=""/>
                    </div>
                    <div class="w-5/7 -ml-9 lg:-ml-100" style="transform:translateX(-90px);width: 25em;" >
                        <img class="forw object-cover" src="./assets/Images/new/plane.png" alt="" />
                    </div>
                </div>
            </div>
            <a href="./features.html" aria-label="Scroll down" class="flex items-center justify-center w-10 h-10 mx-auto text-gray-600 duration-300 transform border border-gray-400 rounded-full hover:text-deep-purple-accent-400 hover:border-deep-purple-accent-400 hover:shadow hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
            <path d="M10.293,3.293,6,7.586,1.707,3.293A1,1,0,0,0,.293,4.707l5,5a1,1,0,0,0,1.414,0l5-5a1,1,0,1,0-1.414-1.414Z"></path>
          </svg>
            </a>
        </div>

        <!-- END -->


        <!--------------- 4th SECTION ----------------------->

        <div class="relative flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0">
            <div class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0">
                <svg class="absolute left-0 hidden h-full text-white transform -translate-x-1/2 lg:block" viewBox="0 0 100 100" fill="currentColor" preserveAspectRatio="none slice">
            <path d="M50 0H100L50 100H0L50 0Z"></path>
          </svg>
                <img class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full" src="https://images.pexels.com/photos/957024/forest-trees-perspective-bright-957024.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" />
            </div>
            <div class="relative flex flex-col items-start w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:max-w-screen-xl">
                <div style="transform:translateX(5rem);" class="mb-16 lg:my-40 lg:max-w-lg lg:pr-5">
                    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                        About IT's Binfinity
                    </p>
                    <h2 class="mb-5 font-sans text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl sm:leading-none" style="font-size: 4.8rem;">
                        Learn Proper<br class="hidden md:block" /> <span style="color: #6bab78; font-size: 3.4rem;">Waste Management</span>

                    </h2>
                    <p class="pr-5 mb-5 text-base text-gray-700 md:text-lg">
                        Discover all there is to know about waste sorting with our comprehensive guide! Dive into a wealth of information covering every aspect of waste management and recycling.
                    </p>
                    <div class="flex items-center">
                        <a href="./about.php" style="color: #245441;" class="">
                            <button class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                  ></path>
                                </svg>
                                <span class="text">Get Started</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                                  ></path>
                                </svg>
                              </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- END -->

        <!--------------- CONTACT SECTION ----------------------->

        <div style="background-color: #6bab7880; background-size:cover;" class="flex flex-col items-center justify-center max-w-3xl px-4 pt-16 mx-auto sm:max-w-xl md:max-w-2xl lg:pt-32 md:px-38 lg:max-w-screen-2xl">
            <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                <div>
                    <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                        Share your Feedback
                    </p>
                </div>
                <h2 style="font-size: 4rem;" class="max-w-lg mb-6 font-sans text-6xl font-bold leading-none tracking-tight text-gray-900 sm:text-6xl md:mx-auto">
                    <span class="relative inline-block">
              <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                <defs>
                  <pattern id="9ef1ff62-feb2-41fe-8163-772b4c79de7b" x="0" y="0" width=".135" height=".30">
                    <circle cx="1" cy="1" r=".7"></circle>
                  </pattern>
                </defs>
                <rect fill="url(#9ef1ff62-feb2-41fe-8163-772b4c79de7b)" width="52" height="24"></rect>
              </svg>

                    Your Feedback Matters
                </h2>
                <p class="text-base text-gray-700 md:text-lg">
                    Your feedback drives our efforts to enhance our products helps us identify areas for improvement and implement changes transparently.
                    <br>Thank you for taking the time to share your thoughts with us. Together, we can create better experiences for everyone.
                </p>
            </div>
            <form method="POST" action="mailto:jorellandrei23@gmail.com" enctype="multipart/form-data" class="flex flex-col items-center w-full mb-4 md:flex-row md:px-16">
                <input placeholder="Send your Feedback" required="" type="text" class="flex-grow w-9 h-12 px-4 mb-3 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none md:mr-1 md:mb-0 focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                />
                <button type="submit" value="Submit" class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md md:w-auto bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none">
            Send
          </button>
            </form>
            <p class="max-w-md mb-10 text-xs text-gray-600 sm:text-sm md:text-center">
                Send us an email with your feedback directly to <a style="color: #245441; font-weight: 500;" href="mailto:jorellandrei23@gmail.com">its.binfinity@yahoo.com</a>.
            </p>
            <img src="./assets/Images/binfinity_crop.png" class="hover-element w-full mx-auto md:w-auto md:max-w-90 max-h-85 left" alt="" />
        </div>

        <!-- END -->

        <!--------------- 5th SECTION ----------------------->

        <div style="background-color: white;" class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-2xl md:px-24 lg:px-8 lg:py-20 ">
            <div class="grid max-w-screen-lg gap-8 row-gap-5 md:row-gap-8 sm:mx-auto lg:grid-cols-2">
                <div class="transition duration-300 transform bg-white rounded shadow-sm hover:-translate-y-1 hover:shadow md:text-center">
                    <div class="relative">
                        <img class="object-cover w-full h-64 rounded-t lg:h-80 xl:h-96" src="./assets/Images/elements/meetourteam.gif" alt="" />
                        <div class="absolute inset-0 bg-gray-800 bg-opacity-25"></div>
                    </div>
                    <div style="color: #245441;" class="px-6 py-8 border border-t-0 rounded-b sm:px-8">
                        <h5 class="mb-2 text-xl font-bold leading-none sm:text-2xl">
                            Meet Our Team
                        </h5>
                        <p class="mb-5 text-gray-700">
                            We have a diverse and talented team dedicated to delivering exceptional results. Get to know the individuals behind our Project
                        </p>
                        <a href="./team.php" class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white"
                            style="color: #245441;">
                            <button class="btnMEET">Read More
                            </button>
              </a>
                    </div>
                </div>
                <div class="transition duration-300 transform bg-white rounded shadow-sm hover:-translate-y-1 hover:shadow md:text-center">
                    <div class="relative">
                        <img class="object-cover w-full h-64 rounded-t lg:h-80 xl:h-96" src="./assets/Images/elements/knowusmore.gif" alt="" />
                        <div class="absolute inset-0 bg-gray-800 bg-opacity-25"></div>
                    </div>
                    <div class="px-6 py-8 border border-t-0 rounded-b sm:px-8">
                        <h5 style="color: #245441;" class="mb-2 text-xl font-bold leading-none sm:text-2xl">Know Us More</h5>
                        <p class="mb-5 text-gray-700">
                            Explore our qualifications, experiences, and skills by viewing our detailed resumes. Click the button below to access our resumes
                        </p>
                        <a href="./team.php#resumepart"  class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white"
                            style="color: #245441;">
                            <button class="btnKNOW">See More
                            </button>
              </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- END -->


        <!--------------------------------------------  FOOTER  ---------------------------------------------------------------------->

        <?php include "./assets/PHP/Include/footer.inc.php" ?>



        <!------------------------------ END ----------------------------------->

        <script src="./assets/JS/home.js"></script>
        <script src="./assets/JS/script.js"></script>

        <script>
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function () {
                null
            };

        window.onload = function() {
            // Retrieve username from local storage
            const username = localStorage.getItem('username');

            // Display username in profile card
            const profileCardName = document.querySelector('.profile-card__name');
            if (username) {
                profileCardName.textContent = username;
            } else {
                profileCardName.textContent = "Guest";
            }
        };
            feather.replace()

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

            var scene = document.getElementById('scene');
            var parallaxInstance = new Parallax(scene);

            // Prevent going back to login page
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };

        // Replace "login.html" and "signup.html" with the actual URLs of your login and signup pages
        if (window.location.href.includes("./login.html") || window.location.href.includes("./signup.html")) {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, "", window.location.href);
            };
        }
        </script>
        <script type="text/javascript">
            {
                window.addEventListener("scroll", Animation);

                function Animation() {
                    $("#test:visible").addClass("animated slide-right");
                    $("#test2:visible").addClass("slide-top");
                }

            }

            // Function to prevent navigation to the previous page
function preventBack() {
    window.history.pushState(null, "", window.location.href);
    window.addEventListener("popstate", function () {
        window.history.pushState(null, "", window.location.href);
    });
}

// Call the function to prevent navigation to the previous page
preventBack();
            
            // Prevent going back to login page
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };

        // Replace "login.html" and "signup.html" with the actual URLs of your login and signup pages
        if (window.location.href.includes("./login.html") || window.location.href.includes("./signup.html")) {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, "", window.location.href);
            };
        }
        </script>

</body>

</html>