@extends('layout.principal')
@section('conteudo')

    <body>
        <!-- NAV BAR -->
        @component('layout.nav')
        @endcomponent
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-child-width-expand@s" uk-grid>
                    @foreach ($dashboard as $key => $value) 
                    @if ($key == 3)
                    </div>
                    <div class="uk-child-width-expand@s" uk-grid>
                    @endif
                    
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover" uk-scrollspy="cls: uk-animation-slide-left; repeat: false; delay: 700">
                            <div class="uk-card-header uk-light background-blue-light uk-text-center">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand uk-dark">
                                        <STRONG class="uk-margin-remove-bottom">{{ $dashboard[$key]->getTitulo() }}</STRONG>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body uk-padding-small uk-text-center">
                                <div class="uk-margin-remove" uk-grid>
                                    <div class="uk-width-1-3 border-right uk-padding-remove">
                                        <p class="">Solicitadas</p>
                                        <h1>{{ $dashboard[$key]->getVagasSolicitada() }}</h1>
                                    </div>
                                    <div class="uk-width-1-3 uk-padding-remove">
                                        <p ><span>Preenchidas</span></p>
                                        <h1 class="">{{ $dashboard[$key]->getVagasPreenchida() }}</h1>
                                    </div>
                                    <div class="uk-width-1-3 border-left uk-padding-remove">
                                        <p><span>Saldo</span></p>
                                        <h1>{{ $dashboard[$key]->getSaldo() }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>  
    </body>
@endsection
