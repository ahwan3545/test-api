<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    {
        $stores = Store::select(['id', 'name', 'image'])->get();

        return $this->success($stores, 'Stores retrieved successfully.');
    }
}
