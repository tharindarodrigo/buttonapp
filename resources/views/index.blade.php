<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <title>Document</title>
    <style type="text/css">
        @keyframes glowing {
            0% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: white;
            }
            50% {
                background-color: #FF0000;
                box-shadow: 0 0 40px #FF0000;
                color: white;
            }
            100% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: white;
            }
        }

        .glow {
            -webkit-animation: glowing 1500ms infinite;
            -moz-animation: glowing 1500ms infinite;
            -o-animation: glowing 1500ms infinite;
            animation: glowing 1500ms infinite;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Button Triggers</h1>
        </div>
    </div>
    <br>

    @for($i=0; $i<10; $i++)
        <div class="row">
            @for($j=1; $j<=10; $j++)
                <div class="col-md">
                    <div class="btn btn-lg btn-block {!! ($i*10+$j) % 3===5 ? 'btn-danger': 'btn-outline-dark' !!}"
                         id="{!! ($i*10+$j) !!}">{!! $i*10+$j !!}</div>
                </div>
            @endfor
        </div>
        @if($i<9)
            <br>
        @endif
    @endfor

    {{--((.row>.col-md*10>.btn.btn-outline-dark.btn-block{$})+br)*10--}}
</div>

<div id="app">
    Event Triggers
</div>

{{--<script src="{!! asset('js/app.js') !!}" charset="utf-8"></script>--}}
<script src="{!! asset('https://code.jquery.com/jquery-3.2.1.min.js') !!}"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="{!! asset('//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') !!}"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{!! asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js') !!}"
        integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
        crossorigin="anonymous"></script>
<script src="{!! asset('https://js.pusher.com/4.1/pusher.min.js') !!}"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('2f207b6d6270b9d99a3b', {
        cluster: 'ap2',
        encrypted: true
    });

    var channel = pusher.subscribe('buttonPressChannel');
    channel.bind('ButtonPressEvent', function(data) {
        var ids = data.id;
        $('.glow').addClass('btn-outline-dark').removeClass('glow');
        $('#'.ids).removeClass('btn-outline-dark').addClass('glow');

//        alert(data.id);
    });
</script>
<script type="text/javascript">
//    $(document).ready(function () {
//        setInterval('illuminateButtons()', 1000);
//    });
//
    function illuminateButtons() {
        $.get({
            url: 'http://' + window.location.host + '/triggered-buttons',
            success: function (data) {
                var ids = getIDs(data);
                    $('.glow').addClass('btn-outline-dark').removeClass('glow');


                $(ids).removeClass('btn-outline-dark');
                $(ids).addClass('glow');

            }
        });

    }
//
//    function getIDs(buttons) {
//
//        var glow = '#' + buttons.toString();
//        var find = ',';
//        var re = new RegExp(find, 'g');
//
//        str = glow.replace(re, ', #');
//        return str;
//    }
</script>
</body>
</html>