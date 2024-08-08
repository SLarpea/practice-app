<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request()->all();
        $authors = Author::when(isset($filter['search']), function ($query) use ($filter) {
            $query->where('first_name', 'like', '%' . $filter['search'] . '%')
            ->OrWhere('last_name', 'like', '%' . $filter['search'] . '%')
            ->OrWhere('email', 'like', '%' . $filter['search'] . '%');
        })
        ->latest()
        ->paginate(empty($filter['per_page']) ? 10 : $filter['per_page']);

        return Inertia::render('Admin/Examples/Authors', [
            'authors' => $authors
        ]);
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
