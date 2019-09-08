@extends ('layout.layout')

@section('title')

    Ajuda

@endsection

@section ('content')

    <div class="container-ajuda">
        <br clear="all">
        <h3 class="h3-main">Ajuda</h3>

        <div class="util">
            <div style="width: 60%; float: left;">
                <span><strong> Principais funções do sistema: </strong></span><br><br>
                <span><strong>1. </strong>Upload de imagens</span><br>
                <span><strong>2. </strong>Visualizar imagens enviadas</span><br>
                <span><strong>3. </strong>Edição de brilho, contraste e saturação</span><br>
                <span><strong>4. </strong>Criação de templates para redimensionamento</span><br>
                <span><strong>5. </strong>Visualização dos templates cadastrados</span><br>
                <span><strong>6. </strong>Aplicação dos templates nas imagens</span><br>
                <span><strong>7. </strong>Redimensionamento de imagens conforme os valores passados por cada template</span><br>
                <span><strong>8. </strong>Compactação e download das imagens com as alterações aplicadas</span><br>
            </div>
            <div>
                <span><strong> Contato: </strong></span><br><br>
                <span><strong>Desenvolvedor: </strong>Guilherme Girelli</span><br>
                <span><strong>Email: </strong>guigirelli09@gmail.com</span><br>
            </div>
        </div>

        <hr style="width: 100%; margin-left: -1.5%;">
        <h5>Perguntas Frequentes:</h5>
        <div class="templates">

            <!-- Templates -->
            <span><strong> Como fazer o cadastro de templates? </strong></span><br><br>
            <span><strong>1. </strong>Faça o login clicando em "Entrar"</span><br>
            <span><strong>2. </strong>Vá para página de cadastro de template clicando em "Template > Novo template"</span><br>
            <span><strong>3. </strong>Faça o preenchimento dos dados</span><br>
            <span><strong>Dica: </strong>Para adicionar mais de um altura ou largura em um template basta separar cada valor por "/". Ex: 240/640/1040. Não insira nenhum caratere que não seja número inteiro ou "/"</span><br>
            <span><strong>4. </strong>Clique em "Cadastrar"</span><br>

            <hr>

            <span><strong> Como excluir ou editar templates? </strong></span><br><br>
            <span><strong>1. </strong>Vá para página de listagem de templates clicando em "Tempaltes > Lista de templates"</span><br>
            <span><strong>2. </strong>Para excluir: escolha a imagem desejada e clique em "Excluir"</span><br>
            <span><strong>2. </strong>Para editar: clique em "Editar", preencha o formulário corretamente e clique em "Salvar"</span><br>
        </div>

        <div class="imagens">

            <!-- Imagens -->
            <span><strong> Como fazer upload de imagens? </strong></span><br><br>
            <span><strong>1. </strong>Vá para página de upload clicando em "Início" ou "Imagens > Fazer Upload" ou no ícone "Embrapa" (canto superior esquerdo)</span><br>
            <span><strong>2. </strong>Clique no botão "Escolher arquivos"</span><br>
            <span><strong>3. </strong>Escolha arquivos nos formatos .jpg, .png ou .jpeg e clique no botão "Enviar"</span><br>
            <hr>

            <span><strong> Como editar imagens? </strong></span><br><br>
            <span><strong>1. </strong>Vá para página de listagem de imagens clicando em "Imagens > Lista de imagens"</span><br>
            <span><strong>2. </strong>Escolha a imagem desejada e clique em "Editar"</span><br>
            <span><strong>3. </strong>Aplique as edições desejadas, podendo ser a escolha do template e alteração do brilho, contraste ou saturação</span><br>
            <span><strong>4. </strong>Clique em "Salvar"</span><br>
            <hr>

            <span><strong> Como realizar o download ou exclusão de imagens? </strong></span><br><br>
            <span><strong>1. </strong>Vá para página de listagem de imagens clicando em "Imagens > Lista de imagens"</span><br>
            <span><strong>2. </strong>Para excluir: escolha a imagem desejada e clique em "Excluir"</span><br>
            <span><strong>2. </strong>Para baixar: clique em "Download" e todas as imagens salvas serão baixadas</span><br>
        </div>
        <br clear="all">
    </div>
@endsection