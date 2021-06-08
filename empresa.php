<?php include "topo.php" ?>

    <?php include "menu.php" ?>
	
	<style>
		
		body {
			/* old image url("img/bg_empresa.jpg") */
			background-image: url("img/bg_banner6.jpg");
			background-size: cover;
			-moz-background-size: cover;
			-webkit-background-size: cover;
			background-attachment: fixed;
			background-repeat: no-repeat;
		}
		
	</style>
		
	<div class="container meio">

		<div class="row">
        	
            <div class="col-md-7">
            	
            	<div class="caixaInterna">
            		<h3>Sobre a Empresa</h3>
            		
            		<div class="conteudoEmpresa">
            			<p>
							A PSDATA Tecnologia é uma empresa inovadora no mercado de informática em Minas Gerais. 
							Foi criada para suprir a demanda crescente dos serviços de infraestrutura de Rede de Dados e reparos em Microcomputadores, 
							Servidores, Notebooks e Ultrabooks. Nosso aporte técnico é dotado de profissionais qualificados e certificados no mercado. 
							Desta maneira, a PSDATA está capacitada a elaborar, projetar e executar quaisquer serviços de infraestrutura, 
							cabeamento estruturado manutenção em microcomputadores, além de total controle de gerenciamento de rede, 
							configurando Servidores eficientes e de alto desempenho para a segurança em internet e em rede de dados.
						</p>

						<div class="well">
							<p>
								<b>Missão</b>: Prestar consultoria em informática com eficiência para 
								pequenas medias e grandes empresas priorizando o atendimento a qualidade ,prazo e principalmente o custo.
							</p>
						</div>
						<div class="well">
							<p>
								<b>Visão</b>: Ser uma das maiores empresas de Ti de Minas Gerais quebrando o paradigma de que a informática é complicada. 
							</p>
						</div>
						<div class="well">
							<p>
								<b>Valores</b>: Atender aos clientes e colaboradores com ética, eficácia e dinamismo, 
								valorizando um ambiente de trabalho, tranquilo e confortável e assim proporcionar , 
								um melhor relacionamento interpessoal a ambos.
							</p>
						</div>
            		</div>
            		
            	</div>
            	
            </div>
			
			<!-- Just uncomfortable
            <div class="caixaSidebar">
	            <div class="col-md-5" align="center">
	 				<img src="img/suporte_empresa.png">
	 			</div>
 			</div>
			-->
        </div>
        
    </div>
    </div> <!-- /container -->
    
    <script>
    	
    	$( document ).ready(function() {
		    $("#menuEmpresa").addClass( "active" ); //PREENCHE MENU CONTATO
		});
    	
    </script>

<?php include "rodape.php" ?>

