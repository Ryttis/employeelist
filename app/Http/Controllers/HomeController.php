<?php

namespace App\Http\Controllers;

use App\Article;
use App\Models\Employee;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')
            ->LeftJoin('companies', 'companies.id', '=', 'employees.company_id')
            ->select('employees.name', 'employees.email', 'employees.phone', 'companies.title', 'employees.id')
            ->paginate(10);

        return view('home', compact('employees'));
    }
}
