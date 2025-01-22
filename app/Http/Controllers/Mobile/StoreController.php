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
        
        $stores = [
            [
                "id" => 1,
                "name" => "Amazon",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/amazon.png"
            ],
            [
                "id" => 2,
                "name" => "eBay",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/eBay.png"
            ],
            [
                "id" => 3,
                "name" => "Walmart",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/walmart.png"
            ],
            [
                "id" => 4,
                "name" => "AliExpress",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/aliexpress.png"
            ]
        ];

        $stores = Store::select(['id', 'name', 'image', 'website_url'])->get();

        return $this->success($stores, 'Stores retrieved successfully.');
    }
}
