<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreShortLinksRequest;
use App\Models\V1\ShortLink;
use App\Repositories\V1\Interfaces\ShortLinksRepositoryInterface;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\URL;

class ShortLinksController extends Controller
{

    public function __construct(public ShortLinksRepositoryInterface $shortLinksRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('mani');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortLinksRequest $request)
    {
        $this->shortLinksRepository->create($request->only('user_id', 'link'));

        return apiResponse()
        ->message(__('movie.messages.movie_updated'))
        ->data(new ShortLinkResource($movie))
        ->send();
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortLink $shortLink)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function shortLink(ShortLink $shortLink)
    {

        return apiResponse()
        ->message(__('movie.messages.movie_updated'))
        ->data(new MovieResource($movie))
        ->send();

        return $shortLink->link;
    }
}
