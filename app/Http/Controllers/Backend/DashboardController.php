<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home()
    {
        // Get today's sales and total amount
        $todaySales = $this->getSales(Carbon::today(), Carbon::tomorrow()->subSecond());
        $todayTotalAmount = $todaySales->sum('total');

        // Get yesterday's sales and total amount
        $yesterdaySales = $this->getSales(Carbon::yesterday(), Carbon::today());
        $yesterdayTotalAmount = $yesterdaySales->sum('total');

        // Get this month's sales and total amount
        $thisMonthSales = $this->getSales(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
        $thisMonthTotalAmount = $thisMonthSales->sum('total');

        // Get last month's sales and total amount
        $lastMonthSales = $this->getSales(Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth());
        $lastMonthTotalAmount = $lastMonthSales->sum('total');

        return view('backend.index', compact(
            'todayTotalAmount',
            'yesterdayTotalAmount',
            'thisMonthTotalAmount',
            'lastMonthTotalAmount'
        ));
    }

    private function getSales($startDate, $endDate)
    {
        return DB::table('transactions')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
    }
}
