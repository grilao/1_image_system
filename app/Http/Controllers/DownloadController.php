<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Imagem;
use App\Template;
use ZipArchive;
use Imagick;
use DB;

class DownloadController extends Controller
{

    /**
     * Função para aplicar o template nas imagens e zipá-las.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aplicarTemplate()
    {
        $imagem = Imagem::all();
        $template = Template::all();

        // Foreach para percorrer todas as imagens e todos os templates salvos no banco
        foreach($imagem as $imag){
            foreach($template as $temp){

                // If para verificar qual o nome do template correspondente a cada imagem
                if($imag->template == $temp->nome){

                    // Pega o nome, as alturas e as larguras de cada imagem
                    $name=$imag->filename;
                    $alturas = $temp->altura;
                    $larguras = $temp->largura;

                    // Explode para fazer o count
                    $altura = explode("/", $alturas);
                    $largura = explode("/", $larguras);

                    // Fazendo o count para realizar a estrutura de repetição "for"
                    $count_altura = count($altura);
                    $count_largura = count($largura);

                    // Criando um arquivo .zip
                    $imagem_zip = new ZipArchive;
                    $imagem_zip->open('/xampp/htdocs/guilherme/1_image_system/public/compactados/' . $imag->template . '_' . $name . '.zip', ZipArchive::CREATE);

                    // Fazendo um for que aplica o template na imagem e salva ela dentro do .zip
                    for($i = 0; $i < $count_largura; $i++)
                    {
                        $upload_image = '/xampp/htdocs/guilherme/1_image_system/public/images/'.$name;
                        $image = new Imagick($upload_image);
                        $image->adaptiveResizeImage($altura[$i], $largura[$i]);
                        $image_download = file_put_contents ($altura[$i] . '_' . $largura[$i] . '_' . $name, $image);
                        
                        $imagem_zip->addFile($altura[$i] . '_' . $largura[$i] . '_' . $name);
                    }

                    // Fechando o .zip
                    $imagem_zip->close();
                }
            }
        }

        // Redirecionando o usuário para a função que faz o download e exclui os arquivos
        return redirect('downloadExcluir');
    }


    /**
     * Função para zipar todos os zips com imagens, excluir todos os arquivos .zip e imagens do sistema e fazer o download.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadExcluir()
    {

        // Criando as variáveis para formar o caminho definitivo dos arquivos
        $arquivo_nome  = 'imagens_compactadas.zip';
        $caminho      = public_path() . '/compactados/';
        $caminho_inteiro  = $caminho.'/'.$arquivo_nome;

        // Pega o nome dos arquivos;
        $arquivos = scandir($caminho);

        // Removendo os "." e ".." que estão no começo do array
        array_shift($arquivos);
        array_shift($arquivos);

        // Iniciando a compactação
        $zip = new \ZipArchive();

        // criando um ir para ver se ocorreu algum erro e criando o arquivo zip
        if( $zip->open($caminho_inteiro, \ZipArchive::CREATE) ){

            // adiciona todos os arquivos que estão na pasta
            foreach($arquivos as $arq){
                $zip->addFile($caminho.'/'.$arq, $arq);
            }
            // fecha o zip
            $zip->close();
        }
            
        // Primeiro nos certificamos de que o arquivo zip foi criado.
        if(file_exists($caminho_inteiro)){
            // Forçamos o donwload do arquivo.
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.$arquivo_nome.'"');
            readfile($caminho_inteiro);
            
            //removemos o arquivo zip após download
            unlink($caminho_inteiro);
        }

        // Exclui todos os arquivos .zip
        $pasta_zips = '/xampp/htdocs/guilherme/1_image_system/public/compactados/';
        $arquivos_zip = glob("$pasta_zips{*.zip, *.ZIP}", GLOB_BRACE);
        foreach($arquivos_zip as $arq_zip)
        {
            unlink($arq_zip);
        }
            
        // Exclui as imagens da pasta images
        $pasta_images = '/xampp/htdocs/guilherme/1_image_system/public/images/';
        $arquivos_images = glob("$pasta_images{*.jpg,*.JPG,*.png,*.PNG,*.jpeg,*.JPEG}", GLOB_BRACE);
        foreach($arquivos_images as $arq_images)
        {
            unlink($arq_images);
        }

        // Exclui as imagens do banco
        DB::table('imagem')->delete();

        // Exclui as imagens da pasta public
        $pasta_public = '/xampp/htdocs/guilherme/1_image_system/public/';
        $arquivos_images = glob("$pasta_public{*.jpg,*.JPG,*.png,*.PNG,*.jpeg,*.JPEG}", GLOB_BRACE);
        foreach($arquivos_images as $arq_images)
        {
            unlink($arq_images);
        }
    }
}