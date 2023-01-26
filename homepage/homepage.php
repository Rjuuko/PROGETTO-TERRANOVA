<!DOCTYPE html>
<html>

<head>       
    <title>FIVEHOUSE | Homepage</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#menuButton").click(function(){
      $("#menu").slideToggle();
    }); 
  });

</script>
</head>

<body class="body">
<input type="checkbox" id="hamburger"/>
<label class="menuicon" for="hamburger">
  <span></span>
</label>

<div id="bar"> 
	</div> <!--/fine logo-->   
</div><!--/fine bar--> 
	
<nav class="menu-visibility">
    <ul>
        <li><a class="submenu" href="#">menu</a>
						<ul>
                    		<li><a href="#">scelta 1</a></li>
					 		<li><a href="#">scelta 2</a></li>		
							<li><a href="#">scelta 3</a></li>
							<li><a href="#">scelta 4</a></li>
						</ul> 
                     </li>
              	</ul>
</nav>
    <div class="conteudo">
        <div class="lista__cards">
            <button class="lista__cards__btn btn btn-esquerda">
                <div class="icone">
                    <svg>
                        <use xlink:href="#flexa-esquerda"></use>
                    </svg>
                </div>
            </button>

            <div class="conteudo__cards">
                <div class="card card--corrente">
                    <div class="imagem--card">
                        <img src="./images/ic-messi-bg.jpg" />
                    </div>
                </div>

                <div class="card card--proximo">
                    <div class="imagem--card">
                        <img src="./images/ic-neymar-bg.jpg" />
                    </div>
                </div>

                <div class="card card--anterior">
                    <div class="imagem--card">
                        <img src="./images/ic-mbappe-bg.jpg" />
                    </div>
                </div>
            </div>

            <button class="lista__cards__btn btn btn--direita">
                <div class="icone">
                    <svg>
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </div>
            </button>
        </div>

        <div class="listagem__informacoes">
            <div class="conteudo__informacoes">
                <div class="info informacoes__corrente">
                    <h1 class="texto nome">nome 1</h1>
                    <h4 class="texto localizacao">immagine1</h4>
                    <p class="texto descricao">descrizione</p>
                </div>

                <div class="info informacoes__seguinte">
                    <h1 class="texto nome">immagine2</h1>
                    <h4 class="texto localizacao">desc 2</h4>
                    <p class="texto descricao">desc2.1</p>
                </div>

                <div class="info informacoes__anterior">
                    <h1 class="texto nome">immagine3</h1>
                    <h4 class="texto localizacao">desc1</h4>
                    <p class="texto descricao">desc1.1</p>
                </div>
            </div>
        </div>


        <div class="conteudo__background">
            <div class="conteudo__backgorund__imagem imagem--corrente">
                <img src="./images/ic-team-argentina.jpg" alt="" />
            </div>
            <div class="conteudo__backgorund__imagem imagem--proxima">
                <img src="./images/ic-team-brazil.jpg" alt="" />
            </div>
            <div class="conteudo__backgorund__imagem imagem--anterior">
                <img src="./images/ic-team-france.jpg" alt="" />
            </div>
        </div>
    </div>

    <div class="conteudo__carregamento">
        <div class="carregamento"></div>
    </div>


    <svg class="icones" style="display: none;">
        <symbol id="flexa-esquerda" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
            <polyline points='328 112 184 256 328 400'
                style='fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
        </symbol>
        <symbol id="arrow-right" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
            <polyline points='184 112 328 256 184 400'
                style='fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
        </symbol>
    </svg>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.3/gsap.min.js"></script>
    <script src="./script/script.js"></script>
</body>

</html>