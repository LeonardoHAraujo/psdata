	<div class="rodape">
        <div class="container">
            <div class="row align-footer">
                <div id="menuRodapeID" class="col-md-2">
                    <div class="titulo-rodape">Menu Rápido</div>
                    <div class="menu-rodape">
                        <ul>
                            <li><i class="fa fa-arrow-right"></i> <a href="index.php">Home</a></li>
                            <li><i class="fa fa-arrow-right"></i> <a href="empresa.php">Sobre a empresa</a></li>
                            <li><i class="fa fa-arrow-right"></i> <a href="servicos.php">Nossos serviços</a></li>
                            <!--<li><i class="fa fa-arrow-right"></i> <a href="#" data-toggle="modal" data-target="#modalSuporte">Suporte</a></li>-->
                            <li><i class="fa fa-arrow-right"></i> <a href="contato.php">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="titulo-rodape">Facebook</div>
                    <div class="fb-page" data-href="https://www.facebook.com/psdataoficial" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/psdataoficial"><a href="https://www.facebook.com/psdataoficial">Psdata</a></blockquote></div></div>
                </div>
                <!--<div id="caixaNewsletter" class="col-md-3">
                    <div class="titulo-rodape">Newsletter</div>
                    <div class="texto-rodape">
                        Receba novidades da PSDATA em seu e-mail. Cadastre-se abaixo.
                        <div class="formulario-rodape">
                            <input type="text" class="iptform iptfull" placeholder="Digite seu Nome">
                            <input type="text" class="iptform iptfull" placeholder="Digite seu E-mail">
                            <input type="button"  class="btn btn-default" value="Cadastrar">
                        </div>
                    </div>
                </div>-->
                <div class="col-md-3">
                    <div class="titulo-rodape">Atendimento</div>
                    <div class="texto-rodape">
                        <div class="texto-telefone"><i class="fa fa-phone-square"></i> (31) 98701-7428</div>
                        <div class="texto-email"><i class="fa fa-1x fa-envelope"></i> contato@psdata.com.br</div>
                        <b>HORÁRIO DE ATENDIMENTO:</b>
                        <p>De segunda a sexta das 8:30hs até as 18:00hs<br/>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- Modal -->
		<div class="modal bs-example-modal-sm fade" id="modalSuporte" tabindex="-1" role="dialog" aria-labelledby="lblModalSuporte">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Solicitar Suporte</h4>
		      </div>
		      <form id="form-support">
            <br>
            <div id="alert-form-modal" class="alert message-modal-alert hide" role="alert">
              <!-- Dynamic message here -->
						</div>
            
			      <div class="modal-body">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Cliente / Nome:</label>
					    <input type="text" class="form-control" id="iptCliente" placeholder="Nome">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Endereço de E-mail</label>
					    <input type="email" class="form-control" id="iptEmail" placeholder="Digite seu e-mail">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Título do Serviço</label>
					    <input type="text" class="form-control" id="iptTitulo" placeholder="Empresa">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Descrição do Serviço</label>
					    <textarea id="iptDescricao" class="form-control" placeholder="Sua mensagem aqui"></textarea>
					  </div>
					  <!--<div class="g-recaptcha" data-sitekey="6LeLTgkTAAAAALDDqQImQPSvUdl62IccMO7hSpge"></div
			      ></div>-->
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="button" id="btn-send-modal" class="btn btn-primary">Enviar Solicitação</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>

  </body>
</html>