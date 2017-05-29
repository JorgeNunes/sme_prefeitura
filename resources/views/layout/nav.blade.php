<div class="uk-background-primary" uk-sticky="media: 960" >
    <nav class="uk-navbar-container background-blue-light text-color-white" uk-navbar>
        <div class="uk-navbar-left uk-hidden@m">
            <a href="#offcanvas-slide" target="_top" title="Menu" uk-tooltip class="uk-navbar-toggle" uk-icon="icon: menu; ratio: 2" uk-toggle></a>
        </div>
    
        <div class="uk-navbar-left uk-visible@m">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="/dashboard"><span class="uk-margin-small-right scroll-trigger" uk-icon="icon: world" uk-scroll></span>Dashboard</a>
                </li>
                <li>
                    <a href="/cadastro"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span>cadastrar vaga</a>
                </li>
                <li>
                    <a href="/vaga"><span class="uk-margin-small-right scroll-trigger" uk-icon="icon: search" uk-scroll></span>pesquisar vaga</a>
                </li>
            </ul>
        </div>
        
        <div class="uk-navbar-right uk-visible@m">
            <ul class="uk-navbar-nav">
                <li><a href="">{{ Session::get('logado') }}</a></li>
                <li class="uk-active"><a href="/logout"><span uk-icon="icon: sign-out; ratio: 1.5"></span></a></li>
            </ul>
        </div>
    </nav>
</div>

<div id="offcanvas-slide" uk-offcanvas>
    <div class="uk-offcanvas-bar background-blue-light text-color-white">
        <ul class="uk-nav uk-nav-default">
            <li class="uk-parent ">Educação Vagas</li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent" title="VAGAS" uk-tooltip>VAGAS</li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent"><a href="/dashboard"><span class="uk-margin-small-right" uk-icon="icon: world"></span>Dashboard</a></li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent"><a href="/cadastro"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span>Cadastrar Vaga</a></li>
            <li class="uk-parent"><a href="/vaga"><span class="uk-margin-small-right" uk-icon="icon: search"></span>Pesquisar Vaga</a></li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent"><a href="/logout"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>SAIR</a></li>
        </ul>
    </div>
</div>
