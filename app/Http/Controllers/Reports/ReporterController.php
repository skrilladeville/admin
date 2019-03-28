<?php

namespace App\Http\Controllers\Reports;

use App\PatientActionStats;
use App\PatientStoreStats;
use App\ProductSalesReport;
use App\ProductInventory;
use App\SalesReport;
use App\StateCompliance;
use App\MarketingStatistics;
use App\Registers;
use App\Expenses;
use App\ShoppingCarts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $role, $pagename)
    {
        switch( $pagename ){
            case 'sales':
                $user = SalesReport::all();
                break;
            case 'products':
                $user = ProductSalesReport::all();
                break;
            case 'inventory':
                $user = ProductInventory::all();
                break;
            case 'patient-store-stats':
                $user = PatientStoreStats::all();
                break;
			case 'patient-action-stats':
                $user = PatientActionStats::all();
                break;
			case 'state-compliance':
                $user = StateCompliance::all();
                break;
            case 'marketing-statistics':
                $user = MarketingStatistics::all();
                break;
            case 'registers':
                $user = Registers::all();
                break;
            case 'expenses':
                $user = Expenses::all();
                break;
            case 'shopping-carts':
                $user = ShoppingCarts::all();
                break;
            default:
                return;
        }
        
        return $user;
    }
}
