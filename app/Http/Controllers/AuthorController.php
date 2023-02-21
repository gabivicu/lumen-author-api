<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;

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
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Create a new author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
         ];

         $this->validate($request, $rules);

         $author = Author::create($request->all());

         return $this->successResponse($author, Response::HTTP_CREATED);

    }
    
    /**
     * Show details of an author
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {
        $author = Author::findOrFails($author);

        return $this->successResponse($author);

    }

        /**
     * Updates an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($author);

        $author->fill($request->all());

        if ($author->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);
    }

        /**
     * Delete an author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {
        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);
    }
}
