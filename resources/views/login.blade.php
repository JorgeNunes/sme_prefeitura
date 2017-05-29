@extends('layout.principal')
@section('conteudo')

    <body class="uk-dark uk-background-default uk-padding uk-panel">
        <div class="uk-text-center uk-section uk-background-cover uk-margin-remove">
            <div class="uk-container lowercase"> 
                @if (session('mensagem'))
                    <div class="uk-alert-danger" data-alert uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>{{ session('mensagem') }}</p>
                    </div> 
                @endif
                <img src="/images/logo.png" alt="Logo View" width="300" height="100"/>
                <form action="/autenticacao" method="post">
                    
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="uk-align-center uk-margin-top">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input uk-width-medium" type="text" placeholder="Usuário" name="nm_funcionario" required>
                        </div>
                    </div>
                
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input class="uk-input uk-width-medium" type="password" placeholder="Senha" name="cd_funcionario" required>
                        </div>
                    </div>
                    
                    <button class="uk-button uk-button-primary uk-width-medium">ENTRAR</button>
                </form>
            </div>
            
        </div>
         
         <div class="uk-section-xsmall uk-section-defalt uk-dark">
            <div class="uk-container">
                <p class="uk-text-center"> © 2017, Prefeitura Municipal de Peruíbe<br>Desenvolvido pelo Departamento de Tecnologia </p>
            </div>
        </div> 
    </body>
    
@endsection