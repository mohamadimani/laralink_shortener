<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreShortLinksRequest;
use App\Http\Resources\ShortLinksCollection;
use App\Http\Resources\ShortLinksResource;
use App\Models\V1\ShortLink;
use App\Repositories\V1\Interfaces\ShortLinksRepositoryInterface;
use Illuminate\Http\Request;

class ShortLinksController extends Controller
{

    public function __construct(public ShortLinksRepositoryInterface $shortLinksRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shortLinkResponce = $this->shortLinksRepository->paginate(
            perPage: config('settings.global.link_list_per_page'),
            orderBy: ['click_count', 'desc'],
            orWhere: value(function () use ($request) {
                $conditation = [];
                if ($request->q) {
                    $conditation['link'] = ['LIKE', '%' . $request->q . '%'];
                }
                return $conditation;
            })
        );

        return apiResponse()
            ->message(__('crew.messages.crews_list'))
            ->data(new ShortLinksCollection($shortLinkResponce))
            ->send();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortLinksRequest $request)
    {
        $shortLinkResponce = $this->shortLinksRepository->create($request->only('user_id', 'link'));

        return apiResponse()
            ->message(__('movie.messages.movie_updated'))
            ->data(new ShortLinksResource($shortLinkResponce))
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
        $clickCount = $shortLink->click_count + 1;
        $shortLinkResponce = $this->shortLinksRepository->update(['click_count' => $clickCount], $shortLink->id);

        return apiResponse()
            ->message(__('movie.messages.movie_updated'))
            ->data(new ShortLinksResource($shortLinkResponce))
            ->send();
    }
}
