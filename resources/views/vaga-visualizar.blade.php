@extends('layout.principal')
@section('conteudo')
    <body>
        <!-- NAV BAR -->
        @component('layout.nav')
        @endcomponent 
        <div class="uk-section">
            <div class="uk-container">
                
                <h2 class="titulo  uk-text-center"><span>DADOS CADASTRAIS</span></h2>
     
                <form class="uk-grid-small" uk-grid>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Escola Solicitante:</span></h4>
                    
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Escola</label>
                        <input class="uk-input" type="text" name="id_escola" value="{{ $viewAluno->nm_escola }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Cadastrado em</label>
                        <input class="uk-input" type="text" name="dt_cadastrado" value="{{  date('d/m/Y H:i:s' , strtotime($viewAluno->created_at)) }}" readonly>
                    </div>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Dados do Aluno:</span></h4>
                    
                    <div class="uk-width-1-3@s">
                        <label class="uk-form-label" for="form-stacked-text">Nome Completo</label>
                        <input class="uk-input" type="text" name="nm_aluno" value="{{ $viewAluno->nm_aluno }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <label class="uk-form-label" for="form-stacked-text">Data de Nascimento</label>
                        <input class="uk-input" type="date" id="dt_nascimento_aluno" name="dt_nascimento_aluno" value="{{ $viewAluno->dt_nascimento_aluno }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <label class="uk-form-label" for="form-stacked-text">Fase Escolar</label>
                        <input class="uk-input" type="text" id="id_fase_escola" name="id_fase_escola" value="{{ $viewAluno->nm_fase_escola }}" readonly>
                    </div>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Filiação:</span></h4>
                    
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Nome Completo</label>
                        <input class="uk-input" type="text" name="nm_mae" value="{{ $viewAluno->nm_mae }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">CPF</label>
                        <input class="uk-input" type="text" name="cd_cpf_mae" value="{{ $viewAluno->cd_cpf_mae }}" readonly>
                    </div>
                    
                    <h4 class="uk-heading-divider uk-width-1-1"><span>Responsável:</span></h4>
                    
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label" for="form-stacked-text">Nome Completo</label>
                        <input class="uk-input" type="text" name="nm_responsavel" value="{{ $viewAluno->nm_responsavel }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-4@s">
                        <label class="uk-form-label" for="form-stacked-text">CPF</label>
                        <input class="uk-input" type="text"  name="cd_cpf_responsavel" value="{{ $viewAluno->cd_cpf_responsavel }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-4@s">
                        <label class="uk-form-label" for="form-stacked-text">Vínculo Familiar</label>
                        <input class="uk-input" type="text" name="nm_vinculo_responsavel" value="{{ $viewAluno->nm_vinculo_responsavel }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <label class="uk-form-label" for="form-stacked-text">Rua</label>
                        <input class="uk-input" type="text" name="nm_rua" value="{{ $viewAluno->nm_rua }}" readonly>
                    </div>
                    
                    <div class="uk-width-expand@m">
                        <label class="uk-form-label" for="form-stacked-text">Número</label>
                        <input class="uk-input" type="text" name="cd_numero_rua" value="{{ $viewAluno->cd_numero_rua }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-6@s">
                        <label class="uk-form-label" for="form-stacked-text">Bairro</label>
                        <input class="uk-input" type="text" name="nm_bairro" value="{{ $viewAluno->nm_bairro }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-6@s">
                        <label class="uk-form-label" for="form-stacked-text">Telefone</label>
                        <input class="uk-input" type="text"  name="cd_telefone_responsavel" data-mask="00 0000-0000" value="{{ $viewAluno->cd_telefone_responsavel }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-6@s">
                        <label class="uk-form-label" for="form-stacked-text">Celular</label>
                        <input class="uk-input" type="text" name="cd_celular_responsavel" data-mask="00 00000-0000" value="{{ $viewAluno->cd_celular_responsavel }}" readonly>
                    </div>
                    
                    <div class="uk-width-1-2@s uk-margin-large uk-align-center">
                        <a href="/vaga" class="uk-button uk-button-primary uk-width-1-1 background-blue-light">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
