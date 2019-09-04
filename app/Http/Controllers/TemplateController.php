<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Http\Requests\Template\StoreFormRequest;

class TemplateController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }


    /**
     * Função para listar os templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::all();

        return view('template.index', compact('templates'));
    }



    /**
     * Retorna a view para criação de template.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.create');
    }



    /**
     * Cria um novo template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {

      $template = new Template([
        'nome' => $request->get('nome'),
        'descricao' => $request->get('descricao'),
        'altura'=> $request->get('altura'),
        'largura'=> $request->get('largura')
      ]);
      
      $template->save();
      return redirect('/template')->with('success', 'Template cadastrado com sucesso!');
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
     * Função para exibir os dados de um template a ser alterado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = Template::find($id);

        return view('template.edit', compact('template'));
    }



    /**
     * Função para alterar um template.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormRequest $request, $id)
    {

      $template = Template::find($id);
      $template->nome = $request->get('nome');
      $template->descricao = $request->get('descricao');
      $template->altura = $request->get('altura');
      $template->largura = $request->get('largura');
      $template->save();

      return redirect('/template')->with('success', 'Template alterado com sucesso!');
    }



    /**
     * Função para excluir um template.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = Template::find($id);
        $template->delete();

      return redirect('/template')->with('success', 'Template excluído com sucesso!');
    }
}
