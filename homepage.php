<!DOCTYPE html>
<html>

<head>       
    <title>FIVEHOUSE | Homepage</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("navbar").style.top = "0px";
            } else {
                document.getElementById("navbar").style.top = "-50";
            }
        }
    </script>
    <style>
        p{
            margin:0;
        }
        #navbar {
            text-align:center;
            background-color: rgba(10,10,10,0.200);
            padding:20px;
            position: fixed;
            padding:20px;
            width: 100%;
            transition: top 0.3s;
            /* box-shadow: 0 0 30px rgba(255, 255, 255, 0.200); */
        }
        #navbar a {
            padding: 20px;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            font-size: 110%;
        }
        #navbar a:hover {
            background-color: rgba(0,0,0);
            color: #ffffff;
        }

        #ul li ul li {
            top:20px;
            background-color: rgba(10,10,10,0.400); 
            display: block; 
        }
        </style>
</head>
<body>
    <div id='navbar'>
        <ul>
            <dd><li><a href="#">Contract List</a>
                <ul>
                    <li><a href="#">contratto 1</a></li>
                    <li><a href="#">Contratto 2</a></li>
                    <li><a href="#">Contratto 3</a></li>
                </ul>
            </li> 
                <a href="#prodotti"; style=top:0px>Add Contract</a><a href="#news">My Account</a><a href="login.php">Log Out</a></dd>
            </dd>
        </ul>
    </div>
    <div class="contenitore">
        <div class="contratti">
        </div>
    </div>
    <div class="conteudo__background">
        <div class="conteudo__backgorund__imagem imagem--corrente">
            <img src="./images/wpTerra_scurita.jpg" alt="" />
        </div>
    </div>
</body>

</html>