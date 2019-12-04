<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            #rss02{border-radius:8px;padding:10px;background-color:white;border:2px solid #d4eefd;margin-bottom:1em;margin:6px 0 12px 0;font-size:0.8em;line-height:18px;}
        </style>
        <script type="text/javascript">
            google.load('feeds', '1');
            function OnLoad() {
                var feedControl = new google.feeds.FeedControl();
                feedControl.setNumEntries(3);
                feedControl.addFeed("https://kotaku.com/rss", "kotaku");
                feedControl.addFeed("https://www.3djuegos.com/universo/rss/rss.php", "3DJuegos");
                feedControl.draw(document.getElementById("rss02"));
            }
            google.setOnLoadCallback(OnLoad);
        </script>   
    </head>
    <body>
        <div id="rss02">

        </div>
    </body>
</html>
