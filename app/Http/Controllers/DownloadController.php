<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagem;
use App\Template;
use ZipArchive;
use Imagick;    

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
     * Função para zipar todos os zips com imagens e excluir todos os arquivos .zip e imagens do sistema.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadExcluir()
    {

        // Cria o zip de todos os arquivos compactados, faz o download e exclui o zip
        $pasta_zip = new ZipArchive;
        $pasta_zips = '/xampp/htdocs/guilherme/1_image_system/public/compactados/';
        $pasta_zip->open('compactados.zip', ZipArchive::CREATE);
        $arquivos_zip = glob("$pasta_zips{*.zip}", GLOB_BRACE);
        foreach($arquivos_zip as $arq_zip)
        {
            $pasta_zip->addFile($arq_zip);
        }
        $pasta_zip->close();
        
        // Exclui todos os arquivos .zip
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

        // Exclui as imagens da pasta public
        $pasta_public = '/xampp/htdocs/guilherme/1_image_system/public/';
        $arquivos_images = glob("$pasta_public{*.jpg,*.JPG,*.png,*.PNG,*.jpeg,*.JPEG}", GLOB_BRACE);
        foreach($arquivos_images as $arq_images)
        {
            unlink($arq_images);
        }

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="compactados.zip"');
        readfile('compactados.zip');

        unlink('/xampp/htdocs/guilherme/1_image_system/public/compactados.zip');

        return redirect('destroy');

    }

    public function destroy()
    {
        $imagem = Imagem::all();
        $imagem->delete();

        // Redireciona o usuário para a página inicial
        return redirect('/imagem')->with('success', 'Imagem excluída com sucesso!');
    }
















    /**
     * Função para fazer o download das pastas de imagens compactadas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $imagem = Imagem::all();

        // Criando um contador para fazer o loop
        $i = 0;
        if(isset($arquivos))
            foreach($arquivos as $zip){
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename='. $zip .'');
                readfile($zip);
            }
        return redirect('/imagem')->with('success', 'Imagens compactadas e baixadas com sucesso');
    }

        // $pasta = '/xampp/htdocs/guilherme/1_image_system/public/compactados/';
        // $arquivos = glob("$pasta{*.zip}", GLOB_BRACE);
        // foreach($arquivos as $arq)
        // {
        //     header('Content-Type: application/zip');
        //     header('Content-Disposition: attachment; filename='. $arq .'');
        //     readfile($arq);
        //     return redirect('downloadExcluir');
        // }

        // unlink('/xampp/htdocs/guilherme/1_image_system/public/compactados/' . $zip);
        // unlink('/xampp/htdocs/guilherme/1_image_system/public/images/' . $name);
        // $imag->delete();
        // for($i = 0; $i <= 3; $i++)
        // {                        
        //     unlink('/xampp/htdocs/guilherme/1_image_system/public/images/' . $altura[$i] . '_' . $largura[$i] . '_' . $name);    
        // }
        // unlink('/xampp/htdocs/guilherme/1_image_system/public/compactados/' . $zip);






        // $imagem = Imagem::all();

        
        // // Criando um contador para fazer o loop
        // $pasta = '/xampp/htdocs/guilherme/1_image_system/public/images/';
        // $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.jpeg}", GLOB_BRACE);
        // $i = 0;
        // $images = array();
        // foreach($arquivos as $img){
        //     $images[] = '<img src=\"xampp/htdocs/guilherme/1_image_system/public/images/".$img."\">';
        //     $i++;
        // }
        // // Fazendo o loop de compactação em todas as imagens

        // foreach($imagem as $imag)
        // {
        //     for($a = 0; $a <= $i; $a++)
        //     {

        //         $name[$a]=$imag->filename;
        //         $imagem_zip = new ZipArchive;
        //         $imagem_zip->open('/xampp/htdocs/guilherme/1_image_system/public/compactados/' . $imag->template . '_' . $name[$a] . '.zip', ZipArchive::CREATE);
        //         $imagem_zip->addFile('/xampp/htdocs/guilherme/1_image_system/public/images/' . $name[$a], $imag->template . '_' . $name[$a]);
        //         $imagem_zip->close();

        //     }
        //     $imag->delete();
        //     $caminho = public_path().'/images/';
        //     unlink($caminho . $imag->filename);
        //     $caminho2 = public_path().'/';
        //     unlink($caminho2 . $imag->filename);
        // }

}
