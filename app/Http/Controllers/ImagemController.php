<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Imagem;
use File;
use Imagick;
use ZipArchive;
use App\Template;
use App\Http\Requests\Imagem\StoreFormRequest;

class ImagemController extends Controller
{


    /**
     * Função para listar as imagens.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagem = Imagem::all();
        $template = Template::all();
        return view('imagem.index', compact('imagem', 'template'));
    }



    /**
     * Retorna a view para upload da imagem.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagem.create');
    }



    /**
     * Faz o upload da imagem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {

      $template = Template::all();

      if($request->hasfile('filename'))
      {

        foreach($request->file('filename') as $imagem)
        {
          $name=$imagem->getClientOriginalName();
          $imagem->move(public_path().'/images/', $name);
          $count_name = (is_array($imagem) && count($imagem));
          for ($i = 0; $i <= $count_name; $i++)
          {
            $data[$i] = $name;

            $upload= new Imagem();
            $upload->filename=$data[$i];
            $upload->brilho='0';
            $upload->contraste='0';
            $upload->saturacao='0';
            $upload->template='Nenhum template selecionado';
            $upload->save();
          }  
        }
      }
      return redirect('imagem')->with('success', 'Imagens enviadas com sucesso!');
    }



    /**
     * Retorna um valor pela id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Função para exibir a página de edição de imagem.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagem = Imagem::find($id);
        $template = Template::all();
        return view('imagem.edit', compact('imagem', 'template'));
    }



    /**
     * Função para editar uma imagem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $imagem = Imagem::find($id);
      $imagem->brilho = $request->get('brilho');
      $imagem->contraste = $request->get('contraste');
      $imagem->saturacao = $request->get('saturacao');
      $imagem->template = $request->get('template');
      $imagem->save();

      // Trabalhando com a edição da imagem pelo imagick

      $name=$imagem->filename;
      $upload_image = '/xampp/htdocs/guilherme/1_image_system/public/images/'.$name;
      $image = new Imagick($upload_image);

      $image->brightnessContrastImage($imagem->brilho-100, $imagem->contraste-100);

      $image_download = file_put_contents ($name, $image);

      $origem = $name;

      $destino = '/xampp/htdocs/guilherme/1_image_system/public/images/'.$name;
      
      if (copy($origem, $destino)){
        unlink($name);
        return redirect('/imagem')->with('success', 'Imagem editada com sucesso!');
      }
    }



    /**
     * Função para excluir uma imagem.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $imagem = Imagem::find($id);
      $imagem->delete();
      unlink(public_path('images/'.$imagem->filename));

      return redirect('/imagem')->with('success', 'Imagem excluída com sucesso!');
    }
}
