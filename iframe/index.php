<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFrame Test</title>

    <style>

    </style>
</head>

<body oncontextmenu="return false">
    <div id="con">
        <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/942565786%3Fsecret_token%3Ds-Oj8mbnD9de7&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=false&show_reposts=false&show_teaser=false&visual=false&liking=false&sharing=false" id="hehe" frameborder="0" style="width: 80vw; height: 80vh; padding: 0; margin: 0;" onload="injectJS()"></iframe>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    function injectJS() {
        console.log( window.frames[ 'hehe' ].document )
        let frameHead = window.frames[ 'hehe' ].document.getElementsByTagName( 'head' )[0]
        let el = document.createElement( 'script' )
        el.type = 'text/javascript'
        el.src = 'https://code.jquery.com/jquery-3.5.1.min.js'
        frameHead.appendChild( el )
    }
</script>