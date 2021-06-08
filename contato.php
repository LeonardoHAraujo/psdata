<?php include "topo.php" ?>

    <?php include "menu.php" ?>
	
	<style>
		
		body {
			background-image: url("img/bg_contato.jpg");
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
            		<h3>Contato | Fale Conosco</h3>
            		
            		<div class="formulario">
            			<div class="row">
            				<div class="col-md-12">
            					Para dúvidas, críticas ou sugestões, utilize o formulário abaixo para entrar em contato com nossa equipe:	
            				</div>
            			</div>
            			<hr/>
						
						<div id="alert-form" class="alert hide" role="alert">
							<!-- Dynamic message here -->
						</div>

            			<div class="row">
            				<div class="col-md-12">
            					<div class="caixaFormulario">
									<form id="enviaContato" name="enviaContato" method="POST" enctype="multipart/form-data">
									  <div class="form-group">
									    <label for="exampleInputEmail1">Nome</label>
									    <input type="text" class="form-control" id="iptnome" placeholder="Nome">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputEmail1">Endereço de E-mail</label>
									    <input type="email" class="form-control" id="iptemail" placeholder="Digite seu e-mail">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputEmail1">Empresa</label>
									    <input type="text" class="form-control" id="iptempresa" placeholder="Empresa">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputEmail1">Assunto</label>
									    <input type="text" class="form-control" id="iptassunto" placeholder="Empresa">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputEmail1">Sua Mensagem</label>
									    <textarea id="iptmsg" class="form-control" placeholder="Sua mensagem aqui"></textarea>
									  </div>
									  <!--<div class="checkbox">
									    <label>
									      <input type="checkbox"> Desejo receber novidades da PSData.
									    </label>
									  </div>
									  <div class="g-recaptcha" data-sitekey="6LeLTgkTAAAAALDDqQImQPSvUdl62IccMO7hSpge"></div>-->
									  <br>
									  <button type="submit" id="btn-send" class="btn btn-default pull-right">Enviar dados</button>
									</form>
								</div>
            				</div>
            			</div>
            		</div>
            		
            	</div>
            	
            </div>
            
            <div class="col-md-5">
 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3753.3524953080096!2d-43.8995356!3d-19.825032699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa684e6eb64a863%3A0x6891330575e2feb3!2sR.+Serra+do+Cip%C3%B3%2C+59+-+Ribeiro+de+Abreu%2C+Belo+Horizonte+-+MG%2C+31872-280!5e0!3m2!1spt-BR!2sbr!4v1436090866062" width="100%" height="668" frameborder="0" style="border:0" allowfullscreen></iframe>
 			</div>           
            
        </div>
        
    </div>
    </div> <!-- /container -->
	
    <script>
    	
    	$( document ).ready(function() {
		    $("#menuContato").addClass( "active" ); //PREENCHE MENU CONTATO
		});
    	
    </script>

<?php include "rodape.php" ?>

