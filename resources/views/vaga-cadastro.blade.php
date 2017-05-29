@extends('layout.principal')
@section('conteudo')
    <body>
        <!-- NAV BAR -->
        @component('layout.nav')
        @endcomponent        
        <div class="uk-section">
            <div class="uk-container">
                @if (isset($ic_cadastrado))
                    <div class="uk-alert-danger" data-alert uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>{{ $mensagem }}</p>
                    </div>
                @endif
                
                <h2 class="titulo  uk-text-center"><span>CADASTRAR VAGA</span></h2>
     
                <form class="uk-grid-small" action="/cadastrar" method="POST" uk-grid>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Escola Solicitante:</span></h4>
                    <input type="hidden" 
                        name="_token" value="{{{ csrf_token() }}}" />
                    <div class="uk-width-1-1">
                        <div class="uk-form-controls">
                            <input class="uk-input" placeholder="Selecionar Escola" name="id_escola" list="escola" pattern='^[ a-zA-Z\b]+$' required>
                            <datalist name="id_escola" id="escola" required>
                                @foreach ($listEscola as $value)
                                    <option value="{{ $value->nm_escola }}">
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Dados do Aluno:</span></h4>
                    
                    <div class="uk-width-1-3@s">
                        <input class="uk-input" type="text" placeholder="Nome Completo do Aluno" name="nm_aluno" id="nm_aluno" pattern='^[ a-zA-Z\b]+$' required>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <input class="uk-input" type="text" placeholder="Data de Nascimento" data-mask="00/00/0000" id="dt_nascimento_aluno" name="dt_nascimento_aluno" required>
                    </div>
                   
                    <div class="uk-width-1-3@s uk-form-controls">
                        <select class="uk-select" name="id_fase_escola" id="id_fase_escola" required>
                            <option value="">Selecione a Fase Escolar</option>
                            @foreach ($listFaseEscola as $value)
                                <option value="{{ $value->id_fase_escola }}">{{ $value->nm_fase_escola }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Filiação:</span></h4>
                    
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="text" placeholder="Nome da Mãe" name="nm_mae" id="nm_mae" pattern='^[ a-zA-Z\b]+$' required>
                    </div>
                    
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="text" placeholder="Cpf da Mãe" data-mask="00000000000" name="cd_cpf_mae" id="cd_cpf_mae" >
                    </div>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Responsável:</span></h4>
                    
                    <div class="uk-width-1-2@s">
                        <input class="uk-input" type="text" placeholder="Nome do Completo" name="nm_responsavel" id="nm_responsavel" pattern='^[ a-zA-Z\b]+$' required>
                    </div>
                    
                    <div class="uk-width-1-4@s">
                        <input class="uk-input" type="text" placeholder="Cpf do Responsável" data-mask="00000000000" id="cd_cpf_responsavel" name="cd_cpf_responsavel" required>
                        
                    </div>
                    
                    <div class="uk-width-1-4@s">
                        <div class="uk-form-controls">
                            <select class="uk-select" id="form-horizontal-select" name="nm_vinculo_responsavel" required>
                                <option value="">Vinculo Familiar</option>
                                <option value="PAI">PAI</option>
                                <option value="MAE">MAE</option>
                                <option value="RESPONSÁVEL LEGAL">RESPONSÁVEL LEGAL</option>
                                <option value="TIO(A)">TIO(A)</option>
                                <option value="PADRASTO">PADRASTO</option>
                                <option value="AVÔ">AVÔ</option>
                                <option value="AVÓ">AVÓ</option>        
                            </select>
                        </div>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <input class="uk-input" type="text" placeholder="Rua" name="nm_rua" id="nm_rua" pattern='^[ 0-9a-zA-Z\b]+$' required>
                    </div>
                    
                    <div class="uk-width-expand@m">
                        <input class="uk-input" type="number" placeholder="Numero" name="cd_numero_rua" required>
                    </div>
                    
                    <div class="uk-width-1-6@s">
                        <input class="uk-input" type="text" placeholder="Bairro" name="nm_bairro" pattern='^[ 0-9a-zA-Z\b]+$' required>
                    </div>
                    
                    <div class="uk-width-1-6@s">
                        <input class="uk-input" type="text" data-mask="(00) 0000-0000" placeholder="Telefone Fixo" name="cd_telefone_responsavel" pattern=".{12,}">
                    </div>
                    
                    <div class="uk-width-1-6@s">
                        <input class="uk-input" type="text" data-mask="(00) 00000-0000" placeholder="Celular" name="cd_celular_responsavel" pattern=".{13,}" required>
                    </div>
                    
                    <div class="uk-width-1-2@s uk-margin-large uk-align-center ">
                        <button class="uk-button uk-button-primary uk-width-1-1 background-blue-light">CADASTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection