<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
{{--<link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">--}}
<!-- Material Design Bootstrap -->
{{--<link href="{!! asset('css/mdb.min.css') !!}" rel="stylesheet">--}}
<!-- Your custom styles (optional) -->
    {{--<link href="{!! asset('css/style.css') !!}" rel="stylesheet">--}}
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
                    <button class="btn btn-sm btn-block btn-outline-dark"
                            id="{!! ($i*10+$j) !!}">{!! $i*10+$j !!}</button>
                </div>
            @endfor
        </div>
        @if($i<9)
            <br>
        @endif
    @endfor
    <div class="row">

        <div class="col-md-2" id="times">

        </div>
    </div>

</div>


{{--<script src="{!! asset('js/app.js') !!}" charset="utf-8"></script>--}}
<script src="{!! asset('https://js.pusher.com/4.1/pusher.min.js') !!}"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript">

    Pusher.logToConsole = true;
    var pusher = new Pusher('05b2568be5bd3bc5a6b0', {
        cluster: 'ap2',
        encrypted: true
    });
    var channel = pusher.subscribe('buttonPressChannel');
//    alert('asdasd');


    var buttonIDs = [];


    channel.bind('App\\Events\\ButtonPressEvent', function (data) {
        buttonIDs.push(data.button.button_id);
//        alert(buttonIDs.toString());
        var buttons = getIDs(buttonIDs);
        //add(data.button.button_id);
        //        var tt = timer();
//        var newButton = '<button id="btn'+data.button.button_id+'">'+data.button.button_id+' '+timer()+'</button>';
//        $('#times').append(newButton);
//            var ids = data.button.button_id;
        $('.glow').addClass('btn-outline-dark').removeClass('glow');
        $(buttons).removeClass('btn-outline-dark').addClass('glow');

    });

    $('button').click(function () {

        var index = buttonIDs.indexOf($(this).attr('id'));
        if (index > -1) {
            buttonIDs.splice(index);
        }
        $(this).addClass('btn-outline-dark').removeClass('glow');

    });

    function getIDs(buttons) {

        var glow = '#' + buttons.toString();
        var find = ',';
        var re = new RegExp(find, 'g');

        str = glow.replace(re, ', #');
        return str;
    }


</script>
</body>
</html>