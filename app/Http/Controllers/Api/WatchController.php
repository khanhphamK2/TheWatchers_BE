<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Watch;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Resources\WatchResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watchs = Watch::all();
        return response(['Watchs' => WatchResource::collection($watchs), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'string|required|max:255',
                'available_quantity' => 'required|integer',
                'isbn' => 'required|string|max:20',
                'language' => 'required|string|max:25',
                'total_pages' => 'required|integer',
                'price' => 'required|numeric',
                'Watch_image' => 'required|string',
                'published_date' => 'required|date',
                'publisher_id' => 'required|integer',
            ]);

            $data = $validator->validated();

            $genres = $data['genres'];
            // check genre in table genres
            foreach ($genres as $genre_id) {
                $genre = Genre::where('id', $genre_id)->first();
                if (!$genre) {
                    return response(['error' => 'Genre not found'], 404);
                }
            }

            $watch = Watch::create($data);
            // add genres to Watch
            $watch->genres()->attach($genres);

            DB::commit();
            return response(['Watch' => new WatchResource($watch), 'message' => 'Watch created successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Watch  $Watch
     * @return \Illuminate\Http\Response
     */
    public function show(Watch $watch)
    {
        return response(['Watch' => new WatchResource($watch), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Watch  $Watch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Watch $watch)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), ['name' => 'string|required|255']);

            $data = $validator->validated();

            $watch->update($data);

            DB::commit();
            return response(['Watch' => new WatchResource($watch), 'message' => 'Watch updated successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Watch  $Watch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watch $watch)
    {
        $watch->delete();

        return response(['message' => 'Watch deleted successfully']);
    }
}