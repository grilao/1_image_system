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
     * Função para aplicar o template nas imagens.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aplicarTemplate()
    {
        $imagem = Imagem::all();
        $template = Template::all();

        foreach($imagem as $imag){
            foreach($template as $temp){
                if($imag->template == $temp->nome){

                    $name=$imag->filename;
                    $altura = $temp->alturas;
                    $largura = $temp->largura;
                    $upload_image = '/xampp/htdocs/guilherme/1_image_system/public/images/'.$name;
                    $image = new Imagick($upload_image);
                    $image->adaptiveResizeImage($altura, $largura);
                    $image_download = file_put_contents ($name, $image);

                    $origem = $upload_image . '_resized';

                    $destino = $upload_image . '_resized';
                }
            }
        }
        return redirect('zipar');

    }


    /**
     * Função para zipar todas as imagens.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function zipar()
    {

        $imagem = Imagem::all();

        // Criando um contador para fazer o loop
        $pasta = '/xampp/htdocs/guilherme/1_image_system/public/images/';
        $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.jpeg}", GLOB_BRACE);
        $i = 0;
        $images = array();
        foreach($arquivos as $img){
            $images[] = '<img src=\"xampp/htdocs/guilherme/1_image_system/public/images/".$img."\">';
            $i++;
        }
        // Fazendo o loop de compactação em todas as imagens

        foreach($imagem as $imag)
        {
            for($a = 0; $a <= $i; $a++){

                $name[$a]=$imag->filename;
                $imagem_zip = new ZipArchive;
                $imagem_zip->open('/xampp/htdocs/guilherme/1_image_system/public/compactados/' . $imag->template . '_' . $name[$a] . '.zip', ZipArchive::CREATE);
                $imagem_zip->addFile('/xampp/htdocs/guilherme/1_image_system/public/images/' . $name[$a], $imag->template . '_' . $name[$a]);
                $imagem_zip->close();

            }
            $imag->delete();
            $caminho = public_path().'/images/';
            unlink($caminho . $imag->filename);
            $caminho2 = public_path().'/';
            unlink($caminho2 . $imag->filename);
        }

        return redirect('/imagem')->with('success', 'Imagens compactadas e baixadas com sucesso!');
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
        $pasta = '/xampp/htdocs/guilherme/1_image_system/public/compactados/';
        $arquivos = glob("$pasta{*.zip}", GLOB_BRACE);
        $i = 0;
        $compactados = array();
        foreach($arquivos as $zip){
            $compactados[] = $zip;
            $i++;
            for($a = 0; $a <= $i; $a++)
            {
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename='. $compactados[$a] .'');
            }
        }
        return redirect('/imagem')->with('success', 'Imagens compactadas e baixadas com sucesso');
    }
}
