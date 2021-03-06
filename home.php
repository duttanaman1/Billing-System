<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />

    <script src="js/main.js"></script>
    <script src="js/typewriter.js"></script>

    <script src="https://use.fontawesome.com/05113e75b1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('nav.main>.tab').each(function(index) {
            $(this).css({
                'transition-delay': ((index * 0.1) + 's')
            });
        });

        $('#grid_wrapper>card').each(function(index) {
            $(this).css({
                'transition-delay': ((index * 0.05) + 's')
            });
        });
        $('document').ready(function() {
            $('#grid_wrapper').removeClass('init');
        });
        //$('nav.main').removeClass('inactive');
        $('nav.main>.tab').click(function(e) {
            var $eq = $('nav.main>.tab').index($(this));
            var $ripple = $("<div/>");
            $ripple.addClass('ripple');
            $ripple.css({
                left: e.clientX - $(this).offset().left,
                top: e.clientY - $(this).offset().top
            });
            $(this).append($ripple);
            setTimeout(function() {
                $ripple.remove();
            }, 1000);
            var $megaRipple = $("<div/>");
            $megaRipple.addClass('ripple');
            $megaRipple.addClass('mega');
            $megaRipple.css({
                left: e.clientX,
                top: e.clientY,
                background: $(this).css('border-color')
            });
            $('#content_wrapper>div.content').append($megaRipple);
            setTimeout(function() {
                $megaRipple.animate({
                    opacity: 0
                }, 1000);
                setTimeout(function() {
                    $megaRipple.remove();
                }, 1000);
            }, 500);
            $('nav.main').find('.active').removeClass('active');
            $(this).addClass('active');
            $('#grid_wrapper>card>div').removeClass('active');
            var $card = $('#grid_wrapper>card').eq($eq).find('div');
            $('#content_wrapper>div.clone>span').html($card.find('span').html());
            $card.addClass('active');
            $('#content_wrapper>div.content>section').removeClass('active');
            $('#content_wrapper>div.content>section').eq($eq).addClass('active');
        });

        hLists = document.getElementsByClassName('hList');
        for (var i = 0; i < hLists.length; i++) {
            hLists[i].leftScrollTarget = 0;
            hLists[i].onmousewheel = function(event) {
                temp = this.leftScrollTarget - (event.wheelDelta * 10);
                if (temp <= 0)
                    this.leftScrollTarget = 0;
                else if (temp >= this.scrollWidth - this.clientWidth)
                    this.leftScrollTarget = this.scrollWidth - this.clientWidth;
                else
                    this.leftScrollTarget = temp;
                event.preventDefault();
            };
        }

        function render() {
            window.requestAnimationFrame(render);
            for (var i = 0; i < hLists.length; i++) {
                hLists[i].scrollLeft += (hLists[i].leftScrollTarget - hLists[i].scrollLeft) / 10;
            }
        }
        render();
        var sections = document.getElementById('home').getElementsByTagName('section');
        for (var i = 0; i < sections.length; i++) {
            sections[i].transY = 0;
        }
        window.onscroll = function(e) {
            for (var i = 0; i < sections.length; i++) {
                sections[i].transY = (i) * parseInt(window.scrollY)
                sections[i].style.transform = 'translateY(-' + sections[i].transY + 'px)';
            }
        }

        $('#grid_wrapper>card>div').click(function() {

            //Get index of active section
            var $eq = $('#grid_wrapper>card').index($(this).parent());

            //clone the tab and add to content_wrapper
            var $clone = $(this).clone();
            $clone.addClass('clone');
            $('#content_wrapper').append($clone);
            setTimeout(function() {
                $clone.addClass('deactivate');
            }, 250);

            //Make overlay visible and animate to full size
            $('#content_wrapper').removeClass('inactive');
            $('#content_wrapper>div.clone').css({
                top: $(this).offset().top - $(window).scrollTop() + ($(this).height() / 2),
                left: $(this).offset().left - $(window).scrollLeft() + ($(this).width() / 2),
                height: $(this).height(),
                width: $(this).width()
            }).show().animate({
                top: '50%',
                left: '50%',
                width: '100%',
                height: '100%'
            }, 500);

            //Add active class to clicked tab to make it disappear
            $('#grid_wrapper>card>div').removeClass('active');
            $(this).addClass('active');

            //500 ms after click  
            //overlay is fullSize
            setTimeout(function() {

                //Show menu
                $('nav').removeClass('inactive');

                //Activate tab on menu
                $('nav.main>.tab').removeClass('active');
                $('nav.main>.tab').eq($eq).addClass('active');
                document.querySelectorAll('nav.main>.tab.active')[0].scrollIntoView();

            }, 500);

            //700ms after click 
            //Menu is visible
            setTimeout(function() {

                //Animate corresponding section content to life
                $('#content_wrapper>div.content>section').removeClass('active');
                $('#content_wrapper>div.content>section').eq($eq).addClass('active');

            }, 700);

        });

        $('#content_wrapper>.close').click(function() {
            $('nav.main').addClass('inactive');
            $('#content_wrapper>div.content>section').removeClass('active');
            setTimeout(function() {
                $('#content_wrapper>div.clone').removeClass('deactivate');
            }, 750);
            setTimeout(function() {
                var $eq = $('nav.main>.tab').index($('nav.main>.active'));
                var $active = $('#grid_wrapper>card').eq($eq).find('div');
                $('#content_wrapper>div.clone').animate({
                    top: $active.offset().top - $(window).scrollTop() + $active.height() / 2,
                    left: $active.offset().left - $(window).scrollLeft() + $active.width() / 2,
                    height: $active.height(),
                    width: $active.width()
                }, 700, 'easeOutCubic', function() {
                    setTimeout(function() {
                        $('#content_wrapper>div.clone').remove();
                        $('#grid_wrapper>card>div').removeClass('active');
                    });
                });
                $('#content_wrapper').addClass('inactive');
            }, 500);
        });
    </script>
    <style>
        body {
            margin: 0;
            overflow-X: hidden;
            font-family: "Raleway", "Roboto", "Helvetica", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -ms-font-smoothing: antialiased;

            background: rgba(18, 18, 26, 1);
            background-image: url('http://artlantis-media.ru/static/img/0000/0002/7260/27260842.qvpm616fga.png');
            background-blend-mode: overlay;
            background-size: 15%;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        /*Grid Wrapper*/

        #home {
            color: #aaaaaf;
            width: 100%;
            height: 100%;
            position: relative;
            padding: 100px;
            display: block;
            transition: transform 0.5s ease-in-out;
        }

        #home>section {
            position: relative;
        }

        #home>.header>div {
            position: relative;
            display: inline-block;
            margin-right: 25px;
            vertical-align: middle;
            text-shadow: 0px 5px 10px rgba(0, 0, 0, 1);
        }

        #home>.pagetag {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 10px 15px;
            font-size: 0.8em;
            color: rgba(96, 78, 177, 1);
            background: rgba(0, 0, 0, 0.1);
        }

        /*Heading*/
        #home .logo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-image: url("http://twths.org/wp/wp-content/uploads/2015/12/coldplay-a-head-full-of-dreams-album-art-560x560.jpg");
            background-size: 100%;
            background-position: 50% 50%;
            box-shadow: 0px 0px 20px -10px rgba(0, 0, 0, 0.5);
        }

        #home h2 {
            font-weight: 300;
            letter-spacing: 0.07em;
            margin-left: -20px;
        }

        #home h5 {
            margin-top: -20px;
            font-weight: 400;
            letter-spacing: 1.9em;
        }

        #home h2>span:first-child {
            font-size: 3em;
        }

        #home h2>span:nth-child(2) {
            font-size: 2em;
            margin-left: -0.2em;
            font-weight: 400;
        }

        #grid_wrapper {
            width: 100%;
            display: inline-block;
            margin-top: 60px;
            box-sizing: border-box;
            padding: 0px 20px;
            margin-left: -100px;
            position: relative;
        }

        #grid_wrapper.init>card {
            transform: scale(0);
        }

        #grid_wrapper>card {
            display: block;
            width: 25%;
            height: 200px;
            float: left;
            transition: transform 0.3s cubic-bezier(0, 0, 0, 1);
            padding: 20px;
            box-sizing: border-box;
        }

        #grid_wrapper>card>div,
        #content_wrapper>.clone {
            color: #aaaaaf;
            cursor: pointer;
            width: 100%;
            height: 100%;
            position: relative;
            transition: box-shadow 0.3s;
            overflow: hidden;
            border: 1px solid rgba(66, 76, 119, 0.1);
            box-shadow: 0px 20px 50px 0px rgba(0, 0, 0, 0.2);
        }

        #grid_wrapper>card>div.active {
            opacity: 0;
        }

        #grid_wrapper>card>div:hover {
            box-shadow: 0px 30px 60px 0px rgba(0, 0, 0, 0.25);
        }

        #grid_wrapper>card>div:before,
        #content_wrapper>.clone:before {
            width: 100%;
            height: 100%;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            background-size: 100%;
            background-position: 50% 50%;
            background-blend-mode: overlay;
            background-image: url("https://emersonkeeling.files.wordpress.com/2015/12/ahfod.gif");
            background-color: rgba(43, 26, 119, 0.25);
            transition: all 0.2s;
            -webkit-filter: blur(3px);
            -moz-filter: blur(3px);
            filter: blur(3px);
            -ms-filter: blur(3px);
        }

        #grid_wrapper>card>div>span,
        #content_wrapper>.clone>span {
            width: 100%;
            height: 50px;
            margin-top: -25px;
            top: 50%;
            position: absolute;
            line-height: 50px;
            display: block;
            text-align: center;
            font-size: 1.5em;
            opacity: 1;
        }

        /*End of Section*/

        /*NavBar Style*/
        /*Comes up only when you're open in a section*/
        nav.main {
            overflow-X: auto;
            overflow-Y: visible;
            z-index: +25;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 55px;
            display: block;
            white-space: nowrap;
        }

        body::after,
        #footer::after,
        #footer::before {
            /* background: linear-gradient(90deg, rgba(190,78,114,1) 0%, rgba(254,117,98,1) 33.33%, rgba(86,72,105,1) 66.66%,  rgba(126,70,99,1) 100%) */

            background-image: linear-gradient(90deg, rgba(107, 208, 228, 1) 0%, rgba(96, 78, 177, 1) 33%, rgba(200, 142, 102, 1) 66%, rgba(201, 85, 169, 1) 100%);
            /* w3c */
            content: "";
            position: fixed;
            width: 100%;
            top: 0px;
            left: 0px;
            height: 5px;
            z-index: +30;
        }

        nav.main.inactive>.tab {
            transform: rotateX(90deg) translateY(-25px);
        }

        nav.main>.tab {
            transform-origin: 50% 0% 0px;
            background: #fff;
            box-sizing: border-box;
            /* border-top:5px solid; */
            font-weight: 600;
            font-size: 0.9em;
            color: #161725;
            display: inline-block;
            width: 15%;
            text-align: center;
            line-height: 45px;
            height: 100%;
            border-top: rgba(0, 0, 0, 0.5) 5px solid;
            position: relative;
            cursor: pointer;
            overflow: hidden;
            transition: transform 0.5s cubic-bezier(0, 0, 0, 1);
        }

        nav.main>.tab.active {
            z-index: +5000;
        }

        nav.main>.tab.active>span {
            background: #d5d5d5;
        }

        nav.main>.tab>span {
            width: 100%;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            height: 100%;
            display: block;
            transform: line-height 0.2s;
        }

        nav.main>.tab:not(.active)>span:hover {
            background: #dadada;
        }

        nav.main>.tab:after {
            content: "";
            top: 0;
            right: 0;
            position: absolute;
            border-top: 0px solid transparent;
            border-bottom: 50px solid transparent;
            border-right: 0px solid rgba(0, 0, 0, 0.05);
            transition: all 0.2s;
        }

        nav.main>.tab:hover:after {
            content: "";
            right: 0;
            position: absolute;
            border-top: 0px solid transparent;
            border-bottom: 55px solid transparent;
            border-right: 10px solid rgba(0, 0, 0, 0.1);
        }

        /*End of Section*/

        /*Ripple Styling*/
        .ripple {
            position: fixed;
            animation: ripple 1s 1 ease-out;
            background: rgba(0, 0, 0, 0.5);
            margin: -250px;
            width: 500px;
            height: 500px;
            transform: scale(10);
            position: absolute;
            border-radius: 50%;
            opacity: 0;
        }

        /*One for the BIIIIG ONE!*/

        .mega.ripple {
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            opacity: 1;
        }

        @keyframes ripple {
            0% {
                opacity: 1;
                transform: scale(0);
            }
        }

        /*End of Section*/

        /*This one Wraps content of the tabs*/
        #content_wrapper.inactive {
            pointer-events: none;
        }

        #content_wrapper {
            position: fixed;
            z-index: +20;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            display: block;
            perspective: 1000px;
        }

        #content_wrapper>div.content {
            z-index: +50;
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            left: 0;
            display: block;
            box-sizing: border-box;
            padding: 5%;
            padding-top: 100px;
        }

        #content_wrapper>div.clone.deactivate {
            background: linear-gradient(#14151a, #161725);
        }

        #content_wrapper>div.clone.deactivate>span {
            font-size: 50em;
            opacity: 0;
            animate: blow 0.5s 0s cubic-bezier(0, 0, 0, 1);
        }

        @keyframes blow {
            to {
                font-size: 50em;
                opacity: 0;
            }
        }

        #content_wrapper>div.clone.deactivate:before {
            animation: fadeOut 0.25s 0s 1 cubic-bezier;
            opacity: 0;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
        }

        #content_wrapper>div.clone {
            width: 100%;
            height: 100%;
            transform-origin: 50% 50%;
            position: absolute;
            transform-origin: 50% 50%;
            transform: translate(-50%, -50%) rotateY(180deg);
            animation: flipOpen 0.5s 0s 1 cubic-bezier(0, 0, 0, 1);
        }

        #content_wrapper.inactive>div.clone {
            animation: flipClose 0.7s 0s 1 cubic-bezier(0, 0, 0, 1);
            transform: translate(-50%, -50%);
            position: absolute;
        }

        @keyframes flipOpen {
            from {
                transform: translate(-50%, -50%);
            }
        }

        @keyframes flipClose {
            from {
                transform: translate(-50%, -50%) rotateY(180deg);
            }
        }

        #content_wrapper>div.content>section.active {
            opacity: 1;
            transform: none;
        }

        #content_wrapper>div.content>section {
            color: #aaa;
            position: absolute;
            top: 100px;
            left: 5%;
            opacity: 0;
            transition: all 0.5s;
            transform: translateY(-100px);
        }

        #content_wrapper.inactive>button {
            opacity: 0;
        }

        #content_wrapper>button {
            z-index: +100;
            transition: opacity 0.2s 1s;
            padding: 20px;
            font-family: "FontAwesome";
            color: white;
            font-size: 1.2em;
            background: none;
            outline: none;
            border: none;
            position: fixed;
            top: 60px;
            right: 0;
            cursor: pointer;
        }

        /*End of Section*/

        /*Footer Design*/
        #footer {
            font-size: 0.9em;
            position: relative;
            margin-top: 200px;
            width: 100%;
            height: 70px;
            text-align: center;
            color: rgba(255, 255, 255, 0.3);
            z-index: +15;
        }

        #footer:before {
            position: absolute;
            top: 0;
            height: 3px;
        }

        #footer:after {
            position: absolute;
            bottom: 1px;
            top: unset;
            height: 3px;
        }

        /*End of Section*/
    </style>
</head>

<body>
    <nav class='main hList inactive'>
        <div class="tab active"><span>About</span></div>
        <!--
  -->
        <div class="tab"><span>Work</span></div>
        <!--
  -->
        <div class="tab"><span>Profiles</span></div>
        <!--
  -->
        <div class="tab"><span>Store</span></div>
        <!--
  -->
        <div class="tab"><span>Tours</span></div>
        <!--
  -->
        <div class="tab"><span>Videos</span></div>
        <!--
  -->
        <div class="tab"><span>News</span></div>
        <!--
  -->
        <div class="tab"><span>Underground</span></div>
        <!--
  -->
        <div class="tab"><span>Connect</span></div>
    </nav>
    <page id="home">
        <span class="pagetag">#HOME</span>
        <section class="header">
            <div>
                <h2><span>W</span><span>ELCOME</span></h2>
                <h5>COLDPLAY</h5>
            </div>
            <div class='logo'><img src="img/logo.png" alt="LOGO" height="40em"></div>
        </section>
        <section id="grid_wrapper" class="init">
            <card>
                <div>
                    <span>ABOUT</span>
                </div>
            </card>
            <card>
                <div>
                    <span>WORK</span>
                </div>
            </card>
            <card>
                <div>
                    <span>PROFILES</span>
                </div>
            </card>
            <card>
                <div>
                    <span>STORE</span>
                </div>
            </card>
            <card>
                <div>
                    <span>TOURS</span>
                </div>
            </card>
            <card>
                <div>
                    <span>VIDEOS</span>
                </div>
            </card>
            <card>
                <div>
                    <span>NEWS</span>
                </div>
            </card>
            <card>
                <div>
                    <span>UNDERGROUND</span>
                </div>
            </card>
        </section>
    </page>
    <div id="content_wrapper" class='inactive'>
        <button class="close">&#xf00d;</button>
        <div class='content'>
            <section>
                <h2>#1</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#2</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#3</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#4</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#5</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#6</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#7</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
            <section>
                <h2>#8</h2>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
                <p>
                    Here's some random shit for this random tab on this random template.
                </p>
            </section>
        </div>
    </div>
    <div id="footer">
        <span style="display:block;font-size:0.9em;line-height:55px;"><span style="display:inline-block;">&copy; <span style="font-family:'Titillium Web';font-weight:900;letter-spacing:0.06em">CALVRIX</span> Design 2016</span></span>
        <span style="display:block;font-size:0.7em;line-height:30px;margin-top:-25px;color:rgba(255,255,255,0.15)">&lang; !--kidding obviously-- &rang;<span>
    </div>
</body>

</html>