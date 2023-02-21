<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of authors
     * @return Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Create a new author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    
    /**
     * Show details of an author
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {

    }

        /**
     * Updates an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {

    }

        /**
     * Delete an author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {

    }
}
