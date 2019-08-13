<div class="menu-div">
    
    <div class="menu-div-center">
        
        <div class="menu-div-div-img">
        
            <a href="{{ route('image.create') }}"><img class="menu-div-div-img-embrapa" src="{{ asset('images_sistema/Embrapablack.png') }}"></a>
        
        </div>
        
    </div>
    <div class="menu-div-div-links">
        
        <ul class="menu-div-div-links-menu">
            <li><a href="{{ route('image.create') }}">Início</a></li>
            <li><a>Templates</a>
                <ul>
                    <li><a href="{{ route('template.create') }}">Novo template</a></li>
                    <li><a href="{{ route('template.index') }}">Lista de templates</a></li>
                </ul>
            </li>
            <li><a>Imagens</a>
                <ul>
                    <li><a href="{{ route('image.create') }}">Fazer upload</a></li>
                    <li><a href="{{ route('image.index') }}">Lista de imagens</a></li>
                </ul>
            </li>
            <li style="margin-top: 200px;"><a href="">Ajuda</a></li>
            <li><a href="">Login</a></li>
            <li><a href="https://www.embrapa.br/uva-e-vinho">Portal Embrapa</a></li>
            <li><a href="https://www.embrapa.br/login?p_p_id=58&p_p_lifecycle=0&_58_redirect=%2Fgroup%2Fintranet%2Fuva-e-vinho">Intranet Embrapa</a></li>

        </ul>
        
    </div>
        
</div>