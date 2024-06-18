<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Account;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        $categories = Category::all();
        $transactions = Transaction::all();
        
        return view('category', [
            'categories' => $categories,
            'transactions' => $transactions,
        ]);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        return view('createCategory');
    }

    public function store(StoreCategoryRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        $validated = $request->validated();
        $userId = Auth::id();

        $account = Account::where('user_id', $userId)->first();

        Category::create([
            'account_id' => $account->id,
            'type' => $validated['type'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}
