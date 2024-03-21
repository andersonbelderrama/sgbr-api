<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlace;
use App\Http\Requests\UpdatePlace;
use App\Http\Resources\PlaceResource;
use App\Models\Place;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PlaceController extends Controller
{

    public function index(Request $request)
    {
        $places = QueryBuilder::for(Place::class)
            ->allowedFilters(['name'])
            ->paginate($request->per_page ?? 10);

        return PlaceResource::collection($places);
    }


    public function store(StorePlace $request)
    {
        $validate = $request->validated();

        $place = Place::create($validate);

        return new PlaceResource($place);
    }


    public function show(Place $place)
    {
        return new PlaceResource($place);
    }


    public function update(UpdatePlace $request, Place $place)
    {
        $validate = $request->validated();

        $place->update($validate);

        return new PlaceResource($place);
    }


    public function destroy(Place $place)
    {
        $place->delete();

        return response()->noContent();
    }
}
