<?php include 'head.php'; ?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/custom.css">

<body>

<div class="" id="Home-white" >
<?php include 'header.php'; ?>


    <div class="container">
        <div class="tabbed-content">
            <div class="cus__tabaccordion">
                <nav class="tabs">
                    <ul>
                        <li><a href="#lock-liqudity" class="active">LOCK LIQUDITY</a></li>
                        <li><a href="#relock-liqudity">RELOCK LIQUIDITY</a></li>
                        <li><a href="#unlock-liquidity">UNLOCK LIQUIDITY</a></li>
                        <li><a href="#bonus">BONUS</a></li>
                    </ul>
                </nav>
            </div>
            <section id="lock-liqudity" class="item active" data-title="LOCK LIQUDITY">
                <div class="item-content">
                    <div class="detail-strip">
                        <span class="wallet-balance">Wallet Balance</span> <span class="wallet-amount">1000 USDT | 1000 LEAD</span>
                    </div>

                    <div class="filter-section">
                        <ul>
                            <li>
                                <input type="text" class="form-control" placeholder="Enter Lead amount" value="">
                                <span class="info-message">USTD Equivalent - 0</span>
                            </li>
                            <li>
                                <input type="text" class="form-control" placeholder="Enter day's to lock" value="">
                            </li>
                            <li><button type="button" class="btn-submit">Lock</button></li>
                        </ul>
                    </div>

                    <?php include ("table.php")?>
                </div>
            </section>
            <section id="relock-liqudity" class="item" data-title="RELOCK LIQUIDITY">
                <div class="item-content">
                    <div class="detail-strip">
                        <ul class="details-description">
                            <li class="details-description-item">LP Tokens - <span class="strong"> 1889UNI V2</span></li>
                            <li class="details-description-item">Liquidity - <span class="strong"> 100 LEAD | 100 USDT</span></li>
                        </ul>
                    </div>

                    <div class="filter-section">
                        <ul>

                            <li>
                                <input type="text" class="form-control" placeholder="Enter day's to lock" value="">
                            </li>
                            <li><button type="button" class="btn-submit">Relock</button></li>
                        </ul>
                    </div>
                    <?php include ("table.php")?>
                </div>
            </section>
            <section id="unlock-liquidity" class="item" data-title="UNLOCK LIQUIDITY">
                <div class="item-content">
                    <div class="detail-strip">
                        <ul class="details-description">
                            <li class="details-description-item">LP Tokens - <span class="strong"> 1889UNI V2</span></li>
                            <li class="details-description-item">Liquidity - <span class="strong"> 100 LEAD | 100 USDT</span></li>
                        </ul>
                    </div>

                    <div class="filter-section">
                        <ul>

                            <li>
                                <div class="range-slider-group">
                                    <div class="range-title-wrap">
                                        <span class="range-title-item">UNI V2 </span>
                                        <span class="range-title-item">1899UNI V2</span>
                                    </div>
                                    <div class="range-slider">
                                        <input class="range-slider__range" type="range" value="100" min="0" max="500">
                                        <div class="info-message">USTD Equivalent - <span class="range-slider__value"></span></div>
                                    </div>


                                </div>

                            </li>
                            <li><button type="button" class="btn-submit">Unlock</button></li>
                        </ul>
                    </div>

                    <?php include ("table.php")?>
                </div>
            </section>
            <section id="bonus" class="item" data-title="BONUS">
                <div class="item-content">
                    <div class="detail-strip">
                        <div class="bonus-filter">
                            <span class="bonus-title">Bonus LEAD</span>
                            <ul class="bonus-item-group">
                                <li class="bonus-item">Locked - <span class="strong">1000</span> </li>
                                <li class="bonus-item">Released - <span class="strong">100</span> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="filter-section">
                        <ul>
                            <li>
                                <div class="relase-period"> Release Period <div class="release-period-date">7 Days</div></div>
                            </li>

                            <li><button type="button" class="btn-submit">Lock</button></li>
                        </ul>
                    </div>

                    <div class="lead-wallet-table-wrap">

                        <div class="lead-wallet-table-action">
                            <div class="lead-wallet-table-action-item">
                                <a class="nav-link contract-btn" href="#">VIEW CONTRACT</a>
                                <img class="bt-emozi" src="images/icon.png">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


<?php include 'footer.php' ?>
	
    

<?php include 'script.php' ?>

    <script>
        tabControl();

        /*
        We also apply the switch when a viewport change is detected on the fly
        (e.g. when you resize the browser window or flip your device from
        portrait mode to landscape). We set a timer with a small delay to run
        it only once when the resizing ends. It's not perfect, but it's better
        than have it running constantly during the action of resizing.
        */
        var resizeTimer;
        $(window).on('resize', function(e) {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                tabControl();
            }, 250);
        });

        /*
        The function below is responsible for switching the tabs when clicked.
        It switches both the tabs and the accordion buttons even if
        only the one or the other can be visible on a screen. We prefer
        that in order to have a consistent selection in case the viewport
        changes (e.g. when you esize the browser window or flip your
        device from portrait mode to landscape).
        */
        function tabControl() {
            var tabs = $('.tabbed-content').find('.tabs');
            if(tabs.is(':visible')) {
                tabs.find('a').on('click', function(event) {
                    event.preventDefault();
                    var target = $(this).attr('href'),
                        tabs = $(this).parents('.tabs'),
                        buttons = tabs.find('a'),
                        item = tabs.parents('.tabbed-content').find('.item');
                    buttons.removeClass('active');
                    item.removeClass('active');
                    $(this).addClass('active');
                    $(target).addClass('active');
                });
            } else {
                $('.item').on('click', function() {
                    var container = $(this).parents('.tabbed-content'),
                        currId = $(this).attr('id'),
                        items = container.find('.item');
                    container.find('.tabs a').removeClass('active');
                    items.removeClass('active');
                    $(this).addClass('active');
                    container.find('.tabs a[href$="#'+ currId +'"]').addClass('active');
                });
            }
        }



        // range-slider
        // First let's set the colors of our sliders
        const settings={
            fill: '#f30b87',
            background: '#feebf5'
        }

        // First find all our sliders
        const sliders = document.querySelectorAll('.range-slider');

        // Iterate through that list of sliders
        // ... this call goes through our array of sliders [slider1,slider2,slider3] and inserts them one-by-one into the code block below with the variable name (slider). We can then access each of wthem by calling slider
        Array.prototype.forEach.call(sliders,(slider)=>{
            // Look inside our slider for our input add an event listener
//   ... the input inside addEventListener() is looking for the input action, we could change it to something like change
            slider.querySelector('input').addEventListener('input', (event)=>{
                // 1. apply our value to the span
                slider.querySelector('span').innerHTML = event.target.value;
                // 2. apply our fill to the input
                applyFill(event.target);
            });
            // Don't wait for the listener, apply it now!
            applyFill(slider.querySelector('input'));
        });

        // This function applies the fill to our sliders by using a linear gradient background
        function applyFill(slider) {
            // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
            const percentage = 100*(slider.value-slider.min)/(slider.max-slider.min);
            // now we'll create a linear gradient that separates at the above point
            // Our background color will change here
            const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage+0.1}%)`;
            slider.style.background = bg;
        }
    </script>


</body>

</html>
