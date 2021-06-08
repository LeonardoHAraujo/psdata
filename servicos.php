<?php include "topo.php" ?>

    <?php include "menu.php" ?>
	
	<style>
		
		body {
			background-image: url("img/bg_servicos.jpg");
			background-color: #0d202d;
			background-size: cover;
			-moz-background-size: cover;
			-webkit-background-size: cover;
			background-attachment: fixed;
			background-repeat: no-repeat;
			/* fix bug in layout */
			height: 100vh;
		}
		
	</style>
		
	<div class="container meio">

		<div class="row">
            <div class="col-md-7">
            	<div class="caixaInterna">
            		<h3>Nossos Serviços</h3>
            		
            		<div class="conteudoServicos">
            			<table class="table table-bordered table-striped">
            				<tr><td><i class="fa fa-check-square-o"></i> Projeto, instalação e manutenção de pequenas, médias e grandes empresas.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Serviço de infraestrutura e reparos em cabeamento estruturado.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Consultoria em informática e especificação de servidores.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Instalação de novos recursos na rede.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Otimização de desempenho de servidores e redes.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Atendimento ao usuário via acesso remoto quase em tempo real.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Manutenção preventiva e corretiva em microcomputadores e impressoras.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Interligação de empresa matriz e filial.</td></tr>
							<tr><td><i class="fa fa-check-square-o"></i> Help Desk</td></tr>
						</table>
            		</div>
            	</div>
            </div>
           
            <!--<div class="col-md-5" align="center">
            	<div class="sideServicos">
 					SOLICITE AGORA MESMO UM ORÇAMENTO!
 					<p><button type="button" class="btn btn-lg btn-danger botao-info"><i class="fa fa-exclamation-circle"></i> Solicitar Orçamento</button></p>
 				</div>
 			</div>-->
 			
        </div>
        
    </div>
    
    <script>
    	
    	$( document ).ready(function() {
		    $("#menuServico").addClass( "active" ); //PREENCHE MENU CONTATO
		});
    	
    </script>

<?php include "rodapeNS.php" ?>

