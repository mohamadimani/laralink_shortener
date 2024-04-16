<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShortLinksCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\V1\ShortLink;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $userLinks = ShortLink::where('user_id', $user->id)->orderBy('click_count', 'desc')->paginate(config('settings.global.link_list_per_page'));

        return apiResponse()
            ->message(__('crew.messages.crews_list'))
            ->data(new ShortLinksCollection($userLinks))
            ->send();
    }
}
