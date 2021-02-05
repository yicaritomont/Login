<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name')); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                z-index: 999;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #particles-js {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
            <div class="flex-center position-ref full-height">
                <?php if(Route::has('login')): ?>
                    <div class="top-right links">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(url('/home')); ?>">Dashboard</a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/login')); ?>"><?php echo app('translator')->getFromJson('header.Login'); ?></a>                            
                        <?php endif; ?>
                        <a href="<?php echo e(route('change_lang', ['lang' => 'es'])); ?>">ES</a>
                        <a href="<?php echo e(route('change_lang', ['lang' => 'en'])); ?>">EN</a>
                    </div>
                <?php endif; ?>
                <div class="content">
                    <div class="title m-b-md">
                        <?php echo e(config('app.name')); ?> <br> 
                        
                    </div>
                </div>
            </div>

            <div id="particles-js"></div>


            <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
            <script>
                /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
                particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
                    console.log('callback - particles.js config loaded');
                });
            </script>
    </body>
</html>
