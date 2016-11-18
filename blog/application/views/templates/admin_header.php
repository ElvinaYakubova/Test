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
    <link href="/myblog/css/style.css" rel = "stylesheet" type="text/css" />
	<link href="/myblog/css/sprite.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/css/admin.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/css/contact.css" rel = "stylesheet" type="text/css" />
    <link href="/myblog/img/icon.ico" rel="shortcut icon" type="image/x-icon" >
    <script src="/myblog/js/jquery-2.1.4.min.js"></script>
    <script src="/myblog/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $("#save").click(function() {
                var tags = $('#tags span').map(function () {
                  return $(this).text();
                });
                tags = Array.prototype.join.call(tags, ",");
                var form_text = CKEDITOR.instances['editor1'].getData();
                var editor = form_text.replace('/&nbsp;/g',' ');
                var formData = $('#formArticle').serialize() + '&name=' + save.name + '&editor=' + editor + '&tags=' + tags;
                alert(formData);
                event.preventDefault();
                $.ajax({
                    url: "?option=update_article", 
                    type: "post", 
                    data: formData,
                    success: function(answer) {
                        $("#answer").html(answer);
                        // document.getElementById('formArticle').reset();
                    }
                });
            });
            $("#publish").click(function() {
                var tags = $('#tags span').map(function () {
                  return $(this).text();
                });
                tags = Array.prototype.join.call(tags, ",");
                var form_text = CKEDITOR.instances['editor1'].getData();
                var editor = form_text.replace('/&nbsp;/g',' ');
                var formData = $('#formArticle').serialize() + '&name=' + publish.name + '&editor=' + editor + '&tags=' + tags;
                event.preventDefault();
                $.ajax({
                    url: "?option=update_article", 
                    type: "post", 
                    data: formData,
                    success: function(answer) {
                        $("#answer").html(answer);
                        // document.getElementById('formArticle').reset();
                    }
                });
            });
                    

            $("#tags input").on({
                focusout : function() {
                  var txt = this.value.replace(/[^a-z0-9]/,''); // allowed characters
                  if(txt) $("<span>", {text:txt.toLowerCase(), insertBefore:this});
                  // alert(this.value);
                  this.value = "";
                },
                keyup : function(ev) {
                  // if: comma|enter
                  if(/(188|13)/.test(ev.which)) $(this).focusout(); 
                }
            });
            $('#tags').on('click', 'span', function() {
                $(this).remove(); 
            });

            CKEDITOR.on('instanceReady', function(ev) {
              ev.editor.on('paste', function(evt) { 
                evt.data.dataValue = evt.data.dataValue.replace(/&nbsp;/g,' ');
                //evt.data.dataValue = evt.data.dataValue.replace(/<p><\/p>/g,' ');
                //console.log(evt.data.dataValue);
              }, null, null, 9);
            });

        });    
     </script> 
    
</head>
<body>
    <header>
         <a href = "/myblog/main"><h1>MY BLOG</h1></a>
    </header>