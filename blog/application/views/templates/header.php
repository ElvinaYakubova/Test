<!DOCTYPE html>
<html>
<head>
    <title>
        My blog
    </title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name = "keywords" content = "blog, travel, cooking, beauty" />
    <meta name = "description" content = "Test site" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link href="/myblog/css/admin.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/css/style.css" rel = "stylesheet" type="text/css" />
	<link href="/myblog/css/sprite.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/css/previewStyle.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/css/contact.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/img/icon.ico" rel="shortcut icon" type="image/x-icon" >
    <script src="/myblog/js/jquery-2.1.4.min.js"></script>
    <link href="/myblog/css/thumbelina.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/myblog/js/thumbelina.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#slider1').Thumbelina({
                $bwdBut:$('#slider1 .left'),    // Selector to left button.
                $fwdBut:$('#slider1 .right')    // Selector to right button.
            });
            $('#slider2').Thumbelina({
                $bwdBut:$('#slider2 .left'),    // Selector to left button.
                $fwdBut:$('#slider2 .right')    // Selector to right button.
            });
        })
    </script>  
    <script type="text/javascript">
        $(document).ready(function(){
            $("#formSend").submit(function(event) { 
                event.preventDefault();
                $.ajax({
                    url: "contact.php", 
                    type: "post", 
                    data: $("#formSend").serialize(),
                    success: function(answer) {
                        $("#answer").html(answer);
                        document.getElementById('formSend').reset();
                    }
                });
            });
        });    
    </script>
    <!-- <link rel="stylesheet" type="text/css" href="css/demo.css" /> -->
    <link href="/myblog/css/imagegrid.css" rel="stylesheet" type="text/css" />
    <script src="/myblog/js/modernizr.custom.26633.js" type="text/javascript"></script>
    <script src="/myblog/js/jquery.gridrotator.js" type="text/javascript"></script>
    <noscript>
        <link href="/myblog/css/fallback.css" rel="stylesheet" type="text/css" />
    </noscript>    
    <script type="text/javascript"> 
        $(function() {
            $( '#ri-grid' ).gridrotator( {
                rows        : 2,
                columns     : 10,
                animType    : 'fadeInOut',
                animSpeed   : 600,
                interval    : 1500,
                step        : 1,
                w320        : {
                    rows    : 2,
                    columns : 3
                },
                w240        : {
                    rows    : 2,
                    columns : 3
                }
            } );
         });
    </script>


</head>
<body>
    <header>
         <a href = "/myblog/main"><h1>MY BLOG</h1></a>
    </header>