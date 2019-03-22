<?php

namespace App\Http\Controllers\Reports;

use App\PatientActionStats;
use App\PatientStoreStats;
use App\ProductSalesReport;
use App\ProductInventory;
use App\SalesReport;
use App\StateCompliance;
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
            default:
                return;
        }
        
        return $user;
    }
}
