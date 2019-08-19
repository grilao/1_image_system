<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Template;
use App\Http\Requests\Image\StoreFormRequest;

class ImageController extends Controller
{


    /**
     * Função para listar as imagens.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();
        $template = Template::all();
        return view('image.index', compact('image', 'template'));
    }



    /**
     * Retorna a view para upload da imagem.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }



    /**
     * Faz o upload da imagem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {

      if($request->hasfile('filename'))
      {

        foreach($request->file('filename') as $image)
        {
          $name=$image->getClientOriginalName();
          $image->move(public_path().'/images/', $name);
          $count_name = (is_array($image) && count($image));
          for ($i = 0; $i <= $count_name; $i++)
          {
            $data[$i] = $name;

            $upload= new Image();
            $upload->filename=$data[$i];
            $upload->brilho='0';
            $upload->contraste='0';
            $upload->saturacao='0';
            $upload->template='Nenhum template selecionado';
            $upload->save();
          }  
        }
      }
      return redirect('image')->with('success', 'Imagem editada com sucesso!');
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
        $image = Image::find($id);
        $template = Template::find($id);
        return view('image.edit', compact('image', 'template'));
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

      $image = Image::find($id);
      $image->brilho = $request->get('brilho');
      $image->contraste = $request->get('contraste');
      $image->saturacao = $request->get('saturacao');
      $image->template = $request->get('template');
      $image->save();

      return redirect('/image')->with('success', 'Imagem editada com sucesso!');
    }



    /**
     * Função para excluir uma imagem.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $image = Image::find($id);
      $image->delete();

      return redirect('/image')->with('success', 'Imagem excluída com sucesso!');
    }
}
