@extends('layout.principal')
@section('conteudo')

    <body>
        <!-- NAV BAR -->
        @component('layout.nav')
        @endcomponent            
        <div class="uk-section">
            <div class="uk-container">
                
                @if (session('mensagem'))
                    <div class="uk-alert-success" data-alert uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>{{ session('mensagem') }}</p>
                    </div>
                @endif
            
                
                <form id="teste" class="uk-grid-small" action="/vaga" method="POST" uk-grid>
                    
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    
                    <div class="uk-width-1-3@s">
                        <div class="uk-form-controls">
                            <select class="uk-select" id="form-horizontal-select" name="id_escola">
                                <option value="">Selecione a Escola</option>
                                @foreach ($listEscola as $value)
                                    <option value="{{ $value->id_escola }}">{{ $value->nm_escola }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input uk-form-width-large" type="text" name="nm_aluno" placeholder="Nome do Aluno">
                        </div>
                    </div>
                    
                    <div class="uk-width-1-3@s">
                        <div class="uk-form-controls">
                            <select class="uk-select" id="form-horizontal-select" name="id_fase_escola">
                                <option value="">Selecione a Fase Escolar</option>
                                @foreach ($listFaseEscola as $value)
                                    <option value="{{ $value->id_fase_escola }}">{{ $value->nm_fase_escola }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-margin-remove-bottom" uk-grid>
                        <div class="uk-form-controls">
                            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="ic_esperando_sim_nao" value="0" checked> Aguardando Vagas</label>
                            <label class="uk-margin-right"><input class="uk-radio" type="radio" name="ic_esperando_sim_nao" value="1"> Vagas Atendidas</label>
                            <label><input class="uk-radio" type="radio" name="ic_esperando_sim_nao" value="2"> Todos</label>
                        </div>
                    </div>
                    
                    <div class="uk-width-1-1 uk-margin-bottom">
                        <button class="uk-button  uk-button-primary uk-align-center background-blue-light">PESQUISAR</button>
                    </div>
                </form>
                
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-small uk-table-striped">
                        <thead>
                            <tr>
                                <th>Fila</th>
                                <th>Nome do Aluno</th>
                                <th>Escola Solicitante</th>
                                <th>Fase Escolar</th>
                                <th>Responsável</th>
                                <th></th>
                                @if(!empty($listAluno))
                                    @if ($listAluno[0]->ic_esperando_sim_nao == 0)
                                        <th></th>
                                    @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($listAluno as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->nm_aluno }}</td>
                                <td>{{ $value->nm_escola }}</td>
                                <td>{{ $value->nm_fase_escola }}</td>
                                <td>{{ $value->nm_responsavel }}</td>
                                <td><a href="/visualizar/{{ $value->id_aluno }}" class="uk-icon-button uk-margin-small-right" uk-icon="icon: search"></a></td>
                                @if ($value->ic_esperando_sim_nao == 0)
                                <td><a href="/atualizar/{{ $value->id_aluno }}" class="uk-icon-button uk-margin-small-right" uk-icon="icon: check" uk-toggle></a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>    
        </div>
    </body>
@endsection