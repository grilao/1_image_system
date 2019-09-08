<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjudaController extends Controller
{


    /**
     * Função para listar as imagens.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ajuda');
    }


}
