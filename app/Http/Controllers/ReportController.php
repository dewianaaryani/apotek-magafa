<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Transaction;
use PDF;

class ReportController extends Controller
{
    public function stocks(){
        $stocks = Stock::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        $data = [
            'stocks' => $stocks,
        ];
        $pdf = PDF::loadView('printStock', $data);
     
        return $pdf->download('report.pdf');
    }
    public function dashboard(){
        $customer = User::where('role','customer')->count();
        $cashier = User::where('role','cashier')->count();
        $product = Product::count();
        $stocks = Stock::get();
        $transactions = Transaction::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        $selling = Transaction::sum('total');
        return view('reports.dashboard', compact('transactions', 'customer', 'cashier', 'product', 'selling','stocks'));
    }
    public function report(){
        $transactions = Transaction::select('*')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        $data = [
            'transactions' => $transactions,
        ];
        $pdf = PDF::loadView('printReport', $data);
     
        return $pdf->download('report.pdf');
    }
}
