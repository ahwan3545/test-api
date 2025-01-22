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
        // $stores = Store::select(['id', 'name', 'image', 'website_url])->get();

        $stores = [
            [
                "id" => 1,
                "name" => "Amazon",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/amazon.png",
                "website_url" => "https://www.amazon.com"
            ],
            [
                "id" => 2,
                "name" => "eBay", 
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/eBay.png",
                "website_url" => "https://www.ebay.com"
            ],
            [
                "id" => 3,
                "name" => "Walmart",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/walmart.png",
                "website_url" => "https://www.walmart.com"
            ],
            [
                "id" => 4,
                "name" => "AliExpress",
                "image" => "https://test-api-production-4d83.up.railway.app/assets/images/stores/aliexpress.png",
                "website_url" => "https://www.aliexpress.com"
            ]
         ];

        return $this->success($stores, 'Stores retrieved successfully.');
    }
}
