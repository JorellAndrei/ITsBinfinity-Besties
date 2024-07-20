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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT's Binfinity - About</title>

    <link rel="stylesheet" href="./assets/CSS/styles.css">
    <link href="assets/CSS/bootstrap.min.css">
    <link href="assets/CSS/all.min.css">
    <link href="assets/CSS/animate.compat.css">
    <link rel="stylesheet" href="./assets/CSS/about.css">
    <link rel="icon" type="image/x-icon" href="./assets/Images/elements/38.png">

    <?php include './assets/PHP/Include/config.inc.php'; ?>

    

</head>

<body>

    <!------------------- NAVBAR  -------------------------->


    <?php include './assets/PHP/Include/header.inc.php'; ?>
    <!------------------- END NAVBAR  -------------------------->



    <script src="./assets/JS/script.js"></script>
    <script>
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
    </script>
    <!------------------- ABOUT PAGE  -------------------------->

    <!-- Main Promo (image right) -->
    <section class="hero-banner bg-blue-g-2 c-white pt-2 text-s-black-50 md-pt-pb-4">
        <div class="container md-pt-pb-1">
            <!-- Post -->
            <article class="flex flex-d-col text-center md-text-left md-flex-d-row md-flex-wrap md-ai-center md-jc-between">
                <!-- Post Content -->
                <div class="post-content mb-2 md-mb-0 md-pr-1 md-w-60 lg-w-50">
                    <!-- Text -->
                    <div class="text-wrap">
                        <h2 class="mb-sm" style="margin-left: 5rem; text-align:left; font-size: 5rem; margin-bottom: 2rem;">ABOUT <span style="color: #6BAB78;"> IT'S BINFINITY </span> </h2>
                        <p class="h3 antialiased mr-ml-a mw-36em text-lg" style="margin-left: 5rem; text-align:left;">Introducing our latest innovation: a revolutionary and informative website with simple game that transforms waste sorting into an immersive adventure!</p>
                    </div>
                </div>
                <!-- Post Media -->
                <div class="post-media pr-pl-1 md-pr-0 md-pl-2 md-w-40 lg-w-50">
                    <!-- Image -->
                    <figure class="media-item mb-0 lazyload">
                        <picture>
                            <source srcset="assets\Images\elements\40.png" media="(min-width: 48em)" />
                            <source srcset="assets\Images\elements\40.png" />
                            <img srcset="assets\Images\elements\40.png" alt="in2Marketplace">
                            <noscript>
                    <img src="assets\Images\elements\40.png" alt="in2Marketplace">
                  </noscript>
                        </picture>
                    </figure>
                </div>
            </article>
        </div>
    </section>

    <!-- Features -->
    <div class="features">
        <section class="mod-block bg-blue-30 c-white pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col mb-2 md-text-left md-flex-d-row md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pr-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="title mb-sm" style="color:#6BAB78; font-size: 1.5em;">RESPONSIBLE CONSUMPTION & PRODUCTION</h2>
                            <h3 class="subtitle text-lg" style="color:#6BAB78; font-size: 1.3em;"><em>Sustainable Development Goals - 12</em></h3>
                            <p class="text-md" style="margin: 2rem;">Ensure sustainable consumption and production patterns</p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-0 md-pl-2 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/sdg 12.jpg" />
                                <img src="assets/Images/new/79.png" data-srcset="assets/Images/sdg 12.jpg " alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                            <img src="assets/Images/new/79.png"  alt="This alternative text should be used to describe what the user should be viewing." />
                          </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- Feature -->
        <section class="mod-block bg-blue-70 c-blue-30 pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col md-text-left md-flex-d-row-rev md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pl-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="title mb-sm" style="font-size: 1.5rem;">CLIMATE ACTION</h2>
                            <h3 class="subtitle text-lg" style="font-size: 1.3rem;"><em>Sustainable Development Goals - 13</em></h3>
                            <p class="text-md" style="color: white; margin: 2rem;">Take urgent action to combat climate change and its impacts.</p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-3 md-pl-0 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/sdg 13.jpg" media="(min-width: 50em)" />
                                <source data-srcset="assets/Images/sdg 13.jpg" />
                                <img src="assets/Images/new/89.png" data-srcset="assets/Images/sdg 13.jpg" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/89.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>
        </section>

        <!-- Feature -->
        <section class="mod-block bg-EEE c-blue-20 pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col mb-2 md-text-left md-flex-d-row md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pr-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h3 class="title mb-sm" style="font-size: 2.5rem;"><strong> Types of Trash Cans & Recycling Bins</strong></h3>
                            <p class="text-md">Choosing the right trash cans or recycling bins is crucial for maintaining a clean business and property, as they should match your specific needs and preferences.</p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-0 md-pl-2 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/83.png" />
                                <img src="assets/Images/new/83.png" data-srcset="assets/Images/elements/38.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/83.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>
        </section>

        <!-- Feature -->
        <section class="mod-block bg-grey-80 c-blue-30 pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col md-text-left md-flex-d-row-rev md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pl-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="title mb-sm" style="font-size: 2.0rem;"> General Waste Bin</h2>
                            <p class="text-md">General waste bins are used for disposing of non-recyclable and non-compostable waste in homes, offices, public spaces, and businesses, regularly emptying and sent to landfills or waste-to-energy facilities.</p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-3 md-pl-0 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/82.png" media="(min-width: 48em)" />
                                <source data-srcset="assets/Images/new/82.png" />
                                <img src="assets/Images/new/82.png" data-srcset="assets/Images/general.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/82.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>
        </section>

        <!-- Feature -->
        <section class="mod-block bg-grey-80 c-blue-30 pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col md-text-left md-flex-d-row-rev md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pl-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="title mb-sm"  style="font-size: 2.0rem;"> Recyclables Bin</h2>
                            <p class="text-md">Recyclables bins are essential for collecting recyclable materials like paper, cardboard, plastic, glass, and metal, diverting waste from landfills and conserving resources through recycling processes.</p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-3 md-pl-0 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/81.png" media="(min-width: 48em)" />
                                <source data-srcset="assets/Images/new/81.png" />
                                <img src="assets/Images/new/81.png" data-srcset="assets/Images/new/83.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/83.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>
        </section>

        <!-- Feature -->
        <section class="mod-block bg-grey-80 c-blue-30 pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col md-text-left md-flex-d-row-rev md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pl-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="title mb-sm"  style="font-size: 2.0rem;">Compostables Bin</h2>
                            <p class="text-md">Compostables bins collect organic waste materials like food scraps, yard waste, and biodegradable packaging, reducing landfill waste and producing nutrient-rich compost for gardening and agriculture in environmentally-conscious
                                facilities.
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-3 md-pl-0 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/84.png" media="(min-width: 48em)" />
                                <source data-srcset="assets/Images/new/84.png" />
                                <img src="aassets/Images/new/84.png" data-srcset="assets/Images/new/84.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/84.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>
        </section>


        <!-- Feature -->
        <section class="mod-block bg-grey-80 c-blue-30 pt-pb-2 md-pt-pb-4">
            <div class="container mw-65em">
                <!-- Post -->
                <article class="text-center flex flex-d-col md-text-left md-flex-d-row-rev md-flex-wrap md-ai-center md-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 md-mb-0 md-pl-1 md-w-70 lg-w-60">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="title mb-sm"  style="font-size: 2.0rem;">Hazardous Waste Bin</h2>
                            <p class="text-md">Hazardous waste bins are essential for safe disposal of hazardous materials like chemicals, batteries, electronics, and medical waste, preventing contamination and pollution in various settings.</p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 md-pr-3 md-pl-0 md-w-30 lg-w-40">
                        <!-- Image -->
                        <figure class="media-item mb-0 mw-25em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/91.png" media="(min-width: 48em)" />
                                <source data-srcset="assets/Images/new/91.png" />
                                <img src="assets/Images/new/91.png" style="width: 80%;" data-srcset="assets/Images/new/91.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                    <img src="assets/Images/new/91.png" alt="This alternative text should be used to describe what the user should be viewing." />
                </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>
        </section>

    </div>

    <hr>
    <br>
    <hr>

    <h1 class="h1 title mb-sm" style="text-align:center;margin: 3rem;"><strong>Learn About Your Trash!</strong></h1>
    <!-- Feature Grid Layout -->
    <div class="md-flex md-flex-wrap md-flex-d-row">

        <!-- Advanced Targeting - feature -->
        <section class="mod-block feat-target bg-blue-80 c-blue-30 pt-pb-2 md-flex md-ai-center lg-pt-pb-4 md-w-50">
            <div class="container">
                <!-- Post -->
                <article class="text-justify flex flex-d-col lg-text-left lg-flex-d-row-rev lg-flex-wrap lg-ai-center lg-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 lg-mb-0 lg-pl-1 lg-w-55 xl-w-65">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="h3 title mb-sm">Plastics</h2>
                            <p class="mr-ml-a w-85 md-w-100">
                            <strong>What They Are:</strong> Plastics are synthetic materials made from polymers, used in products like bottles, bags, packaging, and containers.</p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Risks of Their Trash:</strong> Plastics can take hundreds of years to decompose so they mostly harm marine life, and may leach harmful chemicals into soil and water. </p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Where to Trash It:</strong> Many communities have curbside recycling programs for plastics, or you can take them to designated recycling centers. 
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 w-100 lg-pr-3 lg-w-45 xl-w-35">
                        <!-- Image -->
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/96.png" />
                                <img src="assets/Images/new/96.png" data-srcset="assets/Images/new/96.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/96.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>

                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/9.png" />
                                <img src="assets/Images/new/9.png" data-srcset="assets/Images/new/9.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/9.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- Advanced Targeting - feature -->
        <section class="mod-block feat-target bg-blue-80 c-blue-30 pt-pb-2 md-flex md-ai-center lg-pt-pb-4 md-w-50">
            <div class="container">
                <!-- Post -->
                <article class="text-justify flex flex-d-col lg-text-left lg-flex-d-row-rev lg-flex-wrap lg-ai-center lg-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 lg-mb-0 lg-pl-1 lg-w-55 xl-w-65">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="h3 title mb-sm">Styrofoam</h2>
                            <p class="mr-ml-a w-85 md-w-100">
                            <strong>What They Are:</strong> Styrofoam is a type of polystyrene foam used for food containers. It's lightweight and insulating but not biodegradable.</p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Risks of Their Trash:</strong> Styrofoam can persist in the environment for hundreds of years and it break into small particles, but it causes microplastic pollution. </p>
                                <br>
                                
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Where to Trash It:</strong> Styrofoam is not always accepted in curbside recycling programs. Look for specialized recycling centers or programs that handle polystyrene.
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 w-150 lg-pr-3 lg-w-45 xl-w-35">
                        <!-- Image -->
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/99.png" />
                                <img src="assets/Images/new/99.png" 
                                data-srcset="assets/Images/new/99.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/99.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>

                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/100.png" />
                                <img src="assets/Images/new/100.png" data-srcset="assets/Images/new/100.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/100.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- Advanced Targeting - feature -->
        <section class="mod-block feat-target bg-blue-80 c-blue-30 pt-pb-2 md-flex md-ai-center lg-pt-pb-4 md-w-50">
            <div class="container">
                <!-- Post -->
                <article class="text-justify flex flex-d-col lg-text-left lg-flex-d-row-rev lg-flex-wrap lg-ai-center lg-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 lg-mb-0 lg-pl-1 lg-w-55 xl-w-65">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="h3 title mb-sm">Glass</h2>
                            <p class="mr-ml-a w-85 md-w-100">
                            <strong>What They Are:</strong> Glass is a material made from silica, soda ash, and limestone and It's fully recyclable and can be reused indefinitely without losing quality.</p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Risks of Their Trash:</strong> Broken glass can pose physical hazards, such as cuts or injuries. If not properly recycled, glass can cause waste and resource depletion. </p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Where to Trash It:</strong> Glass should be separated by color (clear, green, brown) and placed in recycling bins designated for glass.  
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 w-100 lg-pr-3 lg-w-45 xl-w-35">
                        <!-- Image -->
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/98.png" />
                                <img src="assets/Images/new/98.png" data-srcset="assets/Images/new/98.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/98.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>

                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/113.png" />
                                <img src="assets/Images/new/113.png" data-srcset="assets/Images/new/113.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/113.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- Advanced Targeting - feature -->
        <section class="mod-block feat-target bg-blue-80 c-blue-30 pt-pb-2 md-flex md-ai-center lg-pt-pb-4 md-w-50">
            <div class="container">
                <!-- Post -->
                <article class="text-justify flex flex-d-col lg-text-left lg-flex-d-row-rev lg-flex-wrap lg-ai-center lg-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 lg-mb-0 lg-pl-1 lg-w-55 xl-w-65">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="h3 title mb-sm">Electronics</h2>
                            <p class="mr-ml-a w-85 md-w-100">
                            <strong>What They Are:</strong> Electronics, or e-waste, like computers, phones, and batteries. They contain valuable materials but also hazardous substances.</p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Risks of Their Trash:</strong> Improper disposal can lead to soil and water contamination due to the release of toxic substances like lead, mercury, and cadmium. </p>
                                <br>
                                
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Where to Trash It:</strong> E-waste should be taken to certified e-waste recycling facilities or collection events. 
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 w-150 lg-pr-3 lg-w-45 xl-w-35">
                        <!-- Image -->
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/109.png" />
                                <img src="assets/Images/new/109.png" data-srcset="assets/Images/new/109.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/109.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/106.png" />
                                <img src="assets/Images/new/106.png" data-srcset="assets/Images/new/106.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/106.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- Advanced Targeting - feature -->
        <section class="mod-block feat-target bg-blue-80 c-blue-30 pt-pb-2 md-flex md-ai-center lg-pt-pb-4 md-w-50">
            <div class="container">
                <!-- Post -->
                <article class="text-justify flex flex-d-col lg-text-left lg-flex-d-row-rev lg-flex-wrap lg-ai-center lg-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 lg-mb-0 lg-pl-1 lg-w-55 xl-w-65">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="h3 title mb-sm">Food Waste</h2>
                            <p class="mr-ml-a w-85 md-w-100">
                            <strong>What They Are:</strong> Food waste includes uneaten or discarded food and organic matter like fruit and vegetable scraps.</p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Risks of Their Trash:</strong> It contributes to methane emissions in landfills, a potent greenhouse gas. It also represents a waste of resources, including water, energy, and labor used in food production. </p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Where to Trash It:</strong> Food waste can be composted if you have a composting system at home or use community composting programs. Some municipalities have curbside composting services.
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 w-100 lg-pr-3 lg-w-45 xl-w-35">
                        <!-- Image -->
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/103.png" />
                                <img src="assets/Images/new/103.png" data-srcset="assets/Images/new/103.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/103.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>

                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/105.png" />
                                <img src="assets/Images/new/105.png" data-srcset="assets/Images/new/105.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/105.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- Advanced Targeting - feature -->
        <section class="mod-block feat-target bg-blue-80 c-blue-30 pt-pb-2 md-flex md-ai-center lg-pt-pb-4 md-w-50">
            <div class="container">
                <!-- Post -->
                <article class="text-justify flex flex-d-col lg-text-left lg-flex-d-row-rev lg-flex-wrap lg-ai-center lg-jc-between">
                    <!-- Post Content -->
                    <div class="mb-2 lg-mb-0 lg-pl-1 lg-w-55 xl-w-65">
                        <!-- Text -->
                        <div class="text-wrap">
                            <h2 class="h3 title mb-sm">Hazardous Waste</h2>
                            <p class="mr-ml-a w-85 md-w-100">
                            <strong>What They Are:</strong> Hazardous waste includes items like batteries, paints, chemicals, and cleaning products that contain toxic substances.</p>
                                <br>
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Risks of Their Trash:</strong>  Improper disposal of hazardous waste can lead to severe environmental pollution and health risks, including poisoning and contamination of water supplies.</p>
                                <br>
                                
                                <p class="mr-ml-a w-85 md-w-100">
                                <strong>Where to Trash It:</strong> Hazardous waste should be taken to designated hazardous waste collection sites or events. Many communities offer special disposal days for these materials.
                            </p>
                        </div>

                    </div>
                    <!-- Post Media -->
                    <div class="pr-pl-1 w-150 lg-pr-3 lg-w-45 xl-w-35">
                        <!-- Image -->
                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/110.png" />
                                <img src="assets/Images/new/110.png" data-srcset="assets/Images/new/110.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/110.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>

                        <figure class="media-item text-center mb-0 mw-20em lazyload">
                            <picture>
                                <source data-srcset="assets/Images/new/115.png" />
                                <img src="assets/Images/new/115.png" data-srcset="assets/Images/new/115.png" alt="This alternative text should be used to describe what the user should be viewing." class="lazyload" />
                                <noscript>
                          <img src="assets/Images/new/115.png" alt="This alternative text should be used to describe what the user should be viewing." />
                      </noscript>
                            </picture>
                        </figure>
                    </div>
                </article>
            </div>

        </section>

        <!-- end / -->
    </div>


    <!-- Pricing Plans -->
    <section class="bg-blue-90 pb-2 hidden">
        <h2 id="pricing" class="all-caps bg-blue-80 c-blue-white text-center text-md mb-0 pt-pb-2 w-100">Pricing</h2>
        <div class="container">
            <!-- Plans -->
            <div class="pricing-plans">
                <!-- Pricing Tables -->
                <div class="pricing-tables c-blue-40">

                    <!-- "Basic" Features -->
                    <div class="pricing-plan flex flex-d-col">
                        <h2 class="card-title">Basic</h2>
                        <div class="plan-cost">
                            <p class="plan-price">$29</p>
                            <span>/</span>
                            <p class="plan-type">Monthly</p>
                        </div>
                        <ul class="plan-features list-reset flex-g-1 pt-2 pr-2 pb-1 pl-2">
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                        </ul>
                        <a class="btn all-caps bg-blue-40 c-white mr-ml-a w-50" href="">Select</a>
                    </div>

                    <!-- "Super" Plan -->
                    <div class="pricing-plan flex flex-d-col">
                        <h2 class="card-title">Super</h2>
                        <div class="plan-cost">
                            <p class="plan-price">$39</p>
                            <span>|</span>
                            <p class="plan-type">Monthly</p>
                        </div>
                        <ul class="plan-features list-reset flex-g-1 pt-2 pr-2 pb-1 pl-2">
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                        </ul>
                        <a class="btn all-caps bg-blue-40 c-white mr-ml-a w-50" href="#">Select</a>
                    </div>

                    <!-- "Premium" Plan -->
                    <div class="pricing-plan flex flex-d-col featured-plan">
                        <div class="featured-ribbon">Best Value</div>
                        <h2 class="card-title">Premium</h2>
                        <div class="plan-cost">
                            <p class="plan-price">$59</p>
                            <span>/</span>
                            <p class="plan-type">Monthly</p>
                        </div>
                        <ul class="plan-features list-reset flex-g-1 pt-2 pr-2 pb-1 pl-2">
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                        </ul>
                        <a class="btn all-caps bg-blue-40 c-white mr-ml-a w-50" href="#">Select</a>
                    </div>

                    <!-- "Ultmate" Plan -->
                    <div class="pricing-plan flex flex-d-col">
                        <h2 class="card-title">Ultimate</h2>
                        <div class="plan-cost">
                            <p class="plan-price">$89</p>
                            <span>/</span>
                            <p class="plan-type">Monthly</p>
                        </div>
                        <ul class="plan-features list-reset flex-g-1 pt-2 pr-2 pb-1 pl-2">
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                            <li>
                                <h3>Package Feature</h3>
                            </li>
                        </ul>
                        <a class="btn all-caps bg-blue-40 c-white mr-ml-a w-50" href="">Select</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- end / main-content -->
    </main>





    </div>
    </div>

    </div>

    <!-- Dependencies -->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/97621/script.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/97621/headroom.js"></script>
    </div>

    <!--------------------------------------------  FOOTER  ---------------------------------------------------------------------->

    <?php include "./assets/PHP/Include/footer.inc.php" ?>

    
    </body>
    </html>