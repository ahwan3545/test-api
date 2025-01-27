<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    {
        $stores = Service::select(['id', 'name', 'image'])->get();

        return $this->success($stores, 'Services retrieved successfully.');
    }
}
