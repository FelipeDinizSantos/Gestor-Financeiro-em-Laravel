<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Account;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login.authForm');
        }

        return view('createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
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
}
