<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
    <style>
        html, body {
            background-color: #fff;
            color: #cedfe8;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
        }

        #container {
            display: flex;
            flex-flow: column nowrap;
            height: 100%;
            background-color: rgba(72, 72, 72, 0.97);
        }

        #console {
            display: flex;
            flex-flow: column nowrap;
            flex-direction: column-reverse;
            width: 100%;
            height: 100%;
            min-height: 10rem;
        }

        #line {
            width: 100%;
            border-top: #c0c0c0 solid 0.1px;
            display: none;
            padding-left: 2rem;
        }

        #command-line-box {
            width: 100%;
            position: relative;
        }

        #prompt {
            position: absolute;
            left: 0;
            top: 0;
            font-size: 2rem;
            padding-left: 0.5rem;
            color: #2063ff;
            font-weight: bold
        }

        #command-line {
            height: 3rem;
            font-size: 2.5rem;
            padding-left: 2rem;
            width: calc(100% - 2rem);
        }

    </style>


</head>
<body>

<div id="container">
    <div id="console"></div>
    <div id="line">
        <span class="text"></span>
    </div>
    <div id="command-line-box">
        <div id="prompt">
            &gt;
        </div>
        <input type="text" id="command-line">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(() => {
        $commandLine = $('#command-line');
        $commandLine.on('keydown', function (e) {
            if (e.keyCode == 13) {
                $.ajax({
                    url: './api/calculator',
                    type: 'get',
                    data: {
                        command_line: $commandLine.val()
                    }
                }).then(
                    data => {
                        console.log('s', data);
                        var $div = $('#line').clone();
                        if (data.isExit) {
                            $div.find('.text').text('bye');
                            $('#console').prepend($div);
                            $div.show();
                            $commandLine.remove();
                        } else {
                            $div.find('.text').text(data.val);
                            $('#console').prepend($div);
                            $div.show();
                            $commandLine.val('');
                        }
                    },
                    error => {
                        var $div = $('#line').clone();
                        $div.find('.text').text('error');
                        $('#console').prepend($div);
                        $div.show();
                        $commandLine.val('');
                    }
                );
            }
        })
    });
</script>

</body>
</html>
