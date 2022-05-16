<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Sales;
use Illuminate\Support\Facades\Http;
 
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$sales = Sales::all()->toArray();
        return new JsonResponse($sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$price = $request->input('price');
		$currency = $request->input('currency');
		$productName = $request->input('productname');

		$response = Http::post('https://preprod.paymeservice.com/api/generate-sale', [
    		'seller_payme_id' => 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N',
    		'sale_price' => $price,
			'currency' => $currency,
			'product_name' => $productName,
			'installments' => '1',
			'language' => 'en',
		])->json();

		if ($response['status_code'] === 0) {
			try {
				Sales::create([
    				'product_name' => $productName,
    				'price' => $price,
    				'currency' => $currency,
    				'payme_sale_code' => $response['payme_sale_code'],
    				'sale_url' => $response['sale_url']
				]);
			} catch (Exception $e) {
				return new JsonResponse([
					'status_code' => 1, 
					'status_error_details' => 'Error updating sale'
				]);
			}

			return new JsonResponse(['status_code' => 0]);
		};

		return new JsonResponse([
			'status_code' => 1, 
			'status_error_details' => $response['status_error_details']
		]);
    }
}
