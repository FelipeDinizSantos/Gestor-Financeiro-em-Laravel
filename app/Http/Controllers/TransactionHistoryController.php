<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionHistory $transactionHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionHistory $transactionHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransactionHistory $transactionHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionHistory $transactionHistory)
    {
        //
    }
}
