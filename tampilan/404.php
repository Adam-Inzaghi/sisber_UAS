<?php

?>
<html>
    <head>
        <link rel="stylesheet" href="../css/custom/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
        <style>
            body, html {
                height: 100%;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #ffffff;
            }

            .az-content-dashboard {
                text-align: center;
            }

            .container {
                width: 100%;
                max-width: 600px;
            }

            #lottie-container {
                margin-bottom: 20px;
                width: 100%;
                height: 250px;
            }

            .btn {
                margin-top: 20px;
            }

            .error-text {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>

        <div class="az-content az-content-dashboard">
            <div class="container">
                <div class="az-content-body">

                    <div class="error-text">404 Not Found</div>

                    <div id="lottie-container"></div>
                    <script>
                        lottie.loadAnimation({
                            container: document.getElementById('lottie-container'),
                            renderer: 'svg',
                            loop: true,
                            autoplay: true,
                            path: '../assett/404.json'
                        });
                    </script>

                    <a href="../index.php" class="btn btn-purple"><i class="typcn typcn-document"></i>Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
        
    </body>
</html>
