<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    {
        $stores = Advertisement::select(['id', 'title', 'image'])->get();

        return $this->success($stores, 'Advertisements retrieved successfully.');
    }
}
