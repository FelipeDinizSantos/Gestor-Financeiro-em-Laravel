<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        if(strtoupper($type) === 'RECEITAS'){
            $type = 'earning';
        }elseif(strtoupper($type) === 'GASTOS'){
            $type = 'expense';
        }elseif(strtoupper($type) === 'TODAS'){
            $transactionHistories = TransactionHistory::all();

            return response()->json($transactionHistories);
        }
        
        $transactionHistory = TransactionHistory::where('type', $type)->get();
        return response()->json($transactionHistory);
    }

    public function filterByMonth($month){
        if ($month) {
            $startDate = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
            $endDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth();

            $transactionHistories = TransactionHistory::whereBetween('created_at', [$startDate, $endDate])->get();

            return response()->json($transactionHistories);
        } else {
            return response()->json(['Selecione um mês válido!']);
        }
    }
}
