@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>

                <div class="card-body">
                    <center> <img src="/imagens/logo.png" width="70px" height="70px"><br></center>
                    <center><h5>Email: relacionamento@dfbordados.com.br</h5></center>
                    <center><h5>Telefone: (67) 99122-4547 - WhatsApp</h5></center>
                    <center><h6 style="color: red">Por favor, leia os termos antes do registro e pagamento!<a href="#" data-toggle="modal" data-target="#modalTermos"> CLIQUE AQUI</a></h6></center>
                    <center><h6>Após o registro, informe à DF Brindes Personalizados sobre seu acesso!</h6></center>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Este será seu login de acesso" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme a senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <center><div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="checkTermos">
                              <label class="form-check-label" for="checkTermos">
                                Li e aceitei os termos!
                              </label>
                        </div></center>
                        <center><div class="form-group row" id="autoUpdate" class="autoUpdate">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- Large modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalTermos" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Termos de utilização da Calculadora de Bordados Eletrônicos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="justify-content-lg-between">
                        ACESSO:<br>
- O acesso ao sistema será concedido através de contato telefônico com o desenvolvedor via aplicativos de mensagens ou ligação.<br>
- O usuário deverá fazer a transferência ou depósito bancário em conta corrente informada pelo desenvolvedor.<br>
- Após o envio do comprovante de pagamento ao desenvolvedor, o usuário realizará o registro no sistema conforme orientação.<br>
- O email e senha cadastrados é pessoal e intransferível, dando direito de acesso somente a 1 (um) usuário.<br>
- O usuário terá acesso à Calculadora de Bordados Eletrônicos durante 6 (seis) meses contados a partir do dia de pagamento. Após este prazo, o mesmo deverá solicitar a renovação de seu acesso via contato telefônico (ligação ou aplicativos de mensagens) com o desenvolvedor e realizar um novo pagamento com desconto de 30% do primeiro pagamento para mais 6 meses de acesso e o mesmo para os semestres subsequentes.
<br><br>
AVISOS:<br>
- A DF Bordados e seus desenvolvedores darão suporte total (sobre o sistema) via contato telefônico (ligação ou aplicativos de mensagens) sobre a utilização e acesso ao Sistema nos horários abaixo informados:<br>
    &nbsp&nbsp&nbsp&nbsp- de segunda a quinta-feira das 8h às 18h e<br>
    &nbsp&nbsp&nbsp&nbsp- sexta-feira e sábado das 8h às 13h.<br>
- NÃO ofereceremos suporte quanto ao Sistemas aos Domingos e feriados.<br>
- O desenvolvedor NÃO se responsabiliza e nem dará suporte sobre instalação ou manutenção de outros sistemas ou softwares que não seja exclusivamente a CALCULADORA DE BORDADOS ELETRÔNICOS desenvolvida pela DF Bordados.<br>
- Por se tratar de uma plataforma WEB, a Calculadora está disponível para utilização 24h salvo algum problema em seu funcionamento. <br><br>

INFORMAÇÂO:<br>
- O objetivo de tal sistema é facilitar a precificação de trabalhos relacionados a bordados. Nosso sistema é desenvolvido em plataforma Web, ou seja, não necessita instalação e nem configuração de nenhum dispositivo do usuário. Tal sistema é hospedado em servidores virtuais que necessitam de pagamento mensal para ser mantido e manutenido assim como o registro de domínio.<br> 
- A DF BORDADOS junto com seus desenvolvedores são pessoas físicas que não dispõem de recursos para manter o sistema em pleno funcionamento durante um longo período de tempo, portanto o valor cobrado pelo acesso é uma forma de mantermos a Calculadora em operação pelo período mínimo de 6 meses. <br>
- Qualquer instabilidade, interrupção ou erro apresentado no sistema, ao ser diagnosticado, a DF Bordados ou seu desenvolvedor entrará em contato via telefone ou aplicativos de mensagens informando tal problema e se possível, o tempo para resolução.<br>
- Solicitamos aos usuário que nos envie suas críticas, sugestões ou elogios aos nosso email "relacionamento@dfbordados.com.br" para que a Calculadora seja sempre atualizada e informe seus resultados com mais precisão.<br><br>

DECLARAÇÕES:<br>
- Declaro que li e estou de acordo com todos os itens deste termo antes de efetuar qualquer pagamento e o registro na Calculadora de Bordados Eletrônicos. 

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            
        </div>
    </div>
</div>
</div>
@endsection

@section('page-arquivos')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
@stop

@section('page-scripts')
<script>
   $(document).ready(function () {

    $('#autoUpdate').fadeOut('slow');

    $('#checkTermos').change(function () {
        if (!this.checked) 
        //  ^
           $('#autoUpdate').fadeOut('slow');
        else 
            $('#autoUpdate').fadeIn('slow');
    });
});
</script>
@stop