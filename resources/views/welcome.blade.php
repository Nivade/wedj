<? //https://github.com/alaouy/Youtube ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>

                <script src="https://connect.soundcloud.com/sdk/sdk-3.0.0.js"></script>

                <script>
                    SC.initialize({
                      client_id: '1bd84fe4d5ee13de2c6e15fb31287eca'
                    });

                    var page_size = 1;
                    var query = 'Randy Klasen Wobble Shuffle Siz Mix';

                    SC.get('/tracks', { limit: 1, q: query }).then(function(tracks) {
                        var url = tracks[0].permalink_url;
                        
                        SC.get('/oembed', { format: 'json', url: tracks[0].permalink_url }).then( function(embed) {
                            document.write(embed.html);
                        });
                    });
                </script>

            </div>
        </div>
    </body>
</html>
