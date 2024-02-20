<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Make sure to import Str

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implement your logic for displaying a listing
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Implement your logic for showing the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        try {
            $imageName = Str::random(32) . "." . $request->image->getClientOriginalExtension();


            Post::create([
                'name' => $request->name,
                'image'=> $imageName,
                'description' => $request->description
            ]);

            // save image in storage folder

            Storage::disk('public')->put($imageName, file_get_contents($request->image));

            //  Return json response
            return response()->json([
                'message' => 'Post successfully created'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went really wrong',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement your logic for displaying a specific resource
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implement your logic for showing the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, string $id)
    {
        // Implement your logic for updating the resource
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement your logic for deleting the resource
    }
}
