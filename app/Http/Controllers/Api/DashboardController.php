<?php

namespace App\Http\Controllers\Api;

use App\Enums\AddressType;
use App\Enums\CustomerStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\OrderResource;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function activeCustomers()
    {
        return Customer::where('status', CustomerStatus::Active->value)->count();
    }

    public function activeProducts()
    {
       // return Product::count();
       return Product::where('published', '=', 1)->count();
    }

    public function paidOrders()
    {
        $fromDate = $this->getFromDate();
        $query = Order::query()->where('status', OrderStatus::Paid->value);

        if($fromDate) {
            $query->where('created_at', '>', $fromDate);
        }

        return $query->count();
    }

    public function totalIncome()
    {
        $fromDate = $this->getFromDate();
        $query = Order::query()->where('status', OrderStatus::Paid->value);

        if($fromDate) {
           $query->where('created_at', '>', $fromDate);
        }
        return round($query->sum('total_price'));
    }

    private function getFromDate()
    {
        $request = \request();
        $paramDate = $request->get('d');
        $array = [
            '1d' => Carbon::now()->subDays(1),
            '1k' => Carbon::now()->subDays(7),
            '2k' => Carbon::now()->subDays(14),
            '1m' => Carbon::now()->subDays(30),
            '3m' => Carbon::now()->subDays(90),
            '6m' => Carbon::now()->subDays(180),
        ];

        return $array[$paramDate] ?? null;
    }
}