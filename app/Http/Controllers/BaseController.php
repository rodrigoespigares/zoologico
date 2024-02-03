<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\AnimalesRepository;
class BaseController extends Controller
{
    protected $repository;
    public function __construct(AnimalesRepository $repository)
    {
        $this->repository = $repository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->repository->getAll();
        return view('animales.lista', ['resultados' => $result]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
