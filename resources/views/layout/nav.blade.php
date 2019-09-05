<div class="menu-div">
    
    <div class="menu-div-center">

        <hr>
        
        <div class="menu-div-div-img">
        
            <a href="{{ route('imagem.create') }}"><img class="menu-div-div-img-embrapa" src="{{ asset('images_sistema/Embrapablack.png') }}"></a>
        
        </div>

        <hr>
        
    </div>
    <div class="menu-div-div-links">
        
        <ul class="menu-div-div-links-menu">
            <li><a style="width: 200px;" class="link-nav" href="{{ route('imagem.create') }}">Início</a></li>
            <li><a style="width: 200px;" class="link-nav">Templates</a>
                <ul>
                    <li><a style="width: 200px; margin-left: -40px;" class="link-nav" href="{{ route('template.create') }}">Novo template</a></li>
                    <li><a style="width: 200px; margin-left: -40px;" class="link-nav" href="{{ route('template.index') }}">Lista de templates</a></li>
                </ul>
            </li>
            <li><a style="width: 200px;" class="link-nav">Imagens</a>
                <ul>
                    <li><a style="width: 200px; margin-left: -40px;" class="link-nav" href="{{ route('imagem.create') }}">Fazer upload</a></li>
                    <li><a style="width: 200px; margin-left: -40px;" class="link-nav" href="{{ route('imagem.index') }}">Lista de imagens</a></li>
                </ul>
            </li>

            <hr>

            <li><a style="width: 200px;" class="link-nav" href="">Ajuda</a></li>
            <li><a style="width: 200px;" class="link-nav" href="https://www.embrapa.br/uva-e-vinho">Portal Embrapa</a></li>
            <li><a style="width: 200px;" class="link-nav" href="https://www.embrapa.br/login?p_p_id=58&p_p_lifecycle=0&_58_redirect=%2Fgroup%2Fintranet%2Fuva-e-vinho">Intranet Embrapa</a></li>
            
            <hr>

            @guest
                <li><a style="width: 200px;" class="link-nav" href="{{ route('login') }}">{{ __('Entrar') }}</a></li>
            @else
                <li><a style="width: 200px;" class="link-nav">{{ Auth::user()->name }}</a>
                    <ul>
                        <li><a style="width: 200px; margin-left: -40px;" class="link-nav" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sair') }}</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @if (Route::has('register'))
                    <li><a style="width: 200px;" class="link-nav" href="{{ route('register') }}">{{ __('Novo usuário') }}</a></li>
                @endif
            @endguest            

        </ul>
        
    </div>
        
</div>