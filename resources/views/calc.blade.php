<div class="col">
    <form action="" method="get" name="calc" id="calc">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label><strong>Número de pontos da matriz:</strong></label>
                    <input class="form-control" type="text" name="pontos" id="pontos" placeholder="em milhares">
                    <a href="#" id="pt">Não sei o número de pontos!</a>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label><strong> Número de cores:</strong></label>
                    <input class="form-control" type="number" name="cores" id="cores">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label><strong> Valor do tecido:</strong></label>
                    <input class="form-control" type="text" name="tecido" id="tecido" placeholder="NÃO colocar vírgula">
                </div>
            </div>
        </div>

        <!--DIV DE IMAGENS SEM PONTOS-->
        <div id="pts">
            <hr>
            <div class="row ">
        <div class="col">
            <center><strong>Marque o tipo de bordado que será realizado</strong></center><br>
            <div class="row">
                  <div class="col-sm-4">
                    <div class="card">
                        <img src="/imagens/nome.png" class="card-img-top" alt="nome">
                      <div class="card-body">
                        <h5 class="card-title">Letras em ponto cheio</h5>
                        <p class="card-text">Opção para bordado de letras com densidade comum para este fim.</p>
                        <div class="row">
                            <div class="col">
                                <div class="radio">
                                    <center><label for="tipo">Letras</label><br>
                                        <input type="radio" id="tipo" name="tipo" value="l"> </center>
                                </div>
                            </div>
                            <div class="col">
                               <label for="nivel_l">Nível</label>
                                <input type="range" class="custom-range" min="0" max="5" step="1" id="nivel_l"> 
                            </div>
                        </div>
                            
                        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                        <img src="/imagens/bord1.jpg" class="card-img-top" alt="nome">
                      <div class="card-body">
                        <h5 class="card-title">Baixa Densidade</h5>
                        <p class="card-text">Opção para bordado de desenhos com pouca densidade de preenchimento.</p>
                            <div class="row">
                            <div class="col">
                                <div class="radio">
                                    <center><label for="tipo">Pontos médios</label><br>
                                        <input type="radio" id="tipo" name="tipo" value="m"> </center>
                                </div>
                            </div>
                            <div class="col">
                               <label for="nivel_m">Nível</label>
                                <input type="range" class="custom-range" min="0" max="5" step="1" id="nivel_m"> 
                            </div>
                        </div>
                        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                        <img src="/imagens/bord2.png" class="card-img-top" alt="nome">
                      <div class="card-body">
                        <h5 class="card-title">Alta Densidade</h5>
                        <p class="card-text">Opção para bordado de desenhos com grande densidade de preenchimento.</p>
                            <div class="row">
                            <div class="col">
                                <div class="radio">
                                    <center><label for="tipo">Preenchimento</label><br>
                                        <input type="radio" id="tipo" name="tipo" value="c"> </center>
                                </div>
                            </div>
                            <div class="col">
                               <label for="nivel_c">Nível</label>
                                <input type="range" class="custom-range" min="0" max="5" step="1" id="nivel_c"> 
                            </div>
                        </div>
                        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                      </div>
                    </div>
                  </div>
            </div>
            <!--<center><p><a href="#" class="btn btn-dark" data-toggle="modal" data-target="#videoModal" data-theVideo="http://www.youtube.com/embed/loFtozxZG0s" >VÍDEO EXPLICATIVO</a></p></center>-->
        </div>
    </div>
    <hr>
    <div class="col-6 mx-auto">
        <center><strong>Informe o tamanho do bordado</strong></center><br>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
             <div class="row">
                    <div class="col">
                        <input class="form-control" type="text" name="b1" id="b1" placeholder="cm">    
                    </div>
                    X
                    <div class="col">
                        <input class="form-control" type="text" name="b2" id="b2" placeholder="cm">    
                    </div> 
                </div>  
        </div>
    </div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" id="outro">Enviar</button>
</div>
</div>
<!--FECHA DIV DE IMAGENS-->

        <hr>
                <div class="row">

                <div class="col-">
                    <label><strong> Cobrar Desenvolvimento da matriz:</strong></label>
                    <div class="radio">
                        <label>
                            <input type="radio" id="desenv" name="desenvolvimento" value="S"> Sim    
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" id="desenv" name="desenvolvimento" value="N"> Não
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" id="desenv2" name="desenvolvimento2" value="D"> Só desenvolver
                        </label>
                    </div>
                </div>
                 <div class="col-4 mx-auto">
                <label><strong>Selecione as opções de base:</strong></label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="entretela" id="entret" value="e"> Entretela
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tnt" id="tn" value="t"> TNT   
                    </label>
                </div>
            </div>
            <div class="col-4">
                <label><strong> Tamanho do bastidor:</strong></label>
                <p></p>
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="text" name="t1" id="t1" placeholder="cm">    
                    </div>
                    X
                    <div class="col">
                        <input class="form-control" type="text" name="t2" id="t2" placeholder="cm">    
                    </div> 
                </div>                                               
            </div>
        </div>
        <hr>
        <div class="row">   
            <div class="col">
                <div class="form-group">
                    <label><strong>Quantidade de itens para o mesmo trabalho:</strong></label>
                    <input class="form-control" type="text" name="qtn" id="qtn">
                </div>
            </div>
            <div class="col">
                 <div class="form-group">
                    <label><strong> Desconto:</strong></label>
                    <input class="form-control" type="number" name="desconto" id="desconto" placeholder="Valor em porcentagem.">
                </div>
            </div>
        </div> 

        <div class="row mx-md-n6">
          <div class="col px-md-6"><button type="button" id="calcula" class="btn btn-success">Calcular</button></div>
          <div class="col px-md-6"><button type="reset" class="btn btn-danger">Limpar</button></div>
        </div>

                     
    </form>
    <div class="row" id="pagamento">
        <div class="col-12 mx-auto align-items-center">
            <center><h1><span id="total"></span></h1></center>
            <center><h6 style="color: red"><span id="texto"></span></h6></center>
        </div>
    </div>



</div>
