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

                    $destino = $upload_image . '_resized';;
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
        $caminho = '/xampp/htdocs/guilherme/1_image_system/public/images/';
        $diretório = dir($caminho);



        $name=$imagem->filename;
        $imagem_zip = new ZipArchive;
        $imagem_zip->open('/xampp/htdocs/guilherme/1_image_system/public/images/' . $imagem->template . '_' . $name . '.zip', ZipArchive::CREATE);
        $imagem_zip->addFile('/xampp/htdocs/guilherme/1_image_system/public/images/' . $name, $imagem->template . '_' . $name);
        $imagem_zip->close();
        unlink($name);

        return redirect('/imagem')->with('success', 'Imagens compactadas com sucesso!');
    }


    /**
     * Função para fazer o download das pastas de imagens compactadas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download()
    {

    }
}
