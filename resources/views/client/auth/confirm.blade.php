<!DOCTYPE html>
<html lang="en">
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RBX.Limited</title>

        <!-- Vendors -->

        <!-- Animate CSS -->
        <link href="/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link href="/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- Site CSS -->
        <link href="/css/app-1.min.css" rel="stylesheet">

        <script>
            var config = {
                token: '{{ $token }}'
            }
        </script>
    </head>
    
    <body>
        <div class="login">

            <!-- Login -->
            <div class="login__block toggled" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-shield-check"></i>
                    Confirm your ROBLOX Account.

                </div>

                <div class="login__block__body">
                    <span>Put <span class="code" style="font-family:courier;">{{ $token }}</span> in the account status of<br> {{ $username }}</span><br>
                    <button class="btn btn--light btn--icon m-t-15" id="check"><i class="zmdi zmdi-long-arrow-right"></i></button>
                </div>
            </div>

            <!-- Register -->
        <!-- Older IE Warning -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="ie-warning__container">
                    <ul class="ie-warning__download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->


        <!-- Javascript Libraries -->

        <!-- jQuery -->
        <script src="/vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="/vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <!-- Site Functions & Actions -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="/js/app.min.js"></script>

        <script src="/js/pages/confirm.js"></script>

        @if (count($errors) > 0)
            <script type="text/javascript">
                @foreach ($errors->all() as $error)
                    $('body').notify({
                        message: '{{ $error }}',
                        type: 'danger'
                    });
                @endforeach
            </script>
        @endif

    </body>
</html>