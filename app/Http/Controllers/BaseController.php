<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\AnimalesRepository;
use App\Repository\RutasRepository;


class BaseController extends Controller
{
    protected $rAnimales;
    protected $repoRutas;
    public function __construct(AnimalesRepository $rAnimales, RutasRepository $repoRutas)
    {
        $this->rAnimales = $rAnimales;
        $this->repoRutas = $repoRutas;
    }
    public function index() {
        $resultAnimales = $this->rAnimales->getAll();
        $resultRutas = $this->repoRutas->getAll();
        return view('welcome',['animales'=>$resultAnimales, 'rutas'=> $resultRutas]);
    }
}
