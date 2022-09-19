<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke()
    {
        $this->authorize("view", auth()->user());

        $query = User::query();

        if(!auth()->user()->can("viewAny", User::class)) {
            $query->where("id", auth()->id());
        }

        // Ordinarily I would expect pagination here, but this is explicitly
        // excluded by the project scope.
        return UserResource::collection($query->get());

    }
}
