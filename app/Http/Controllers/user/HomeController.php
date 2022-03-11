<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        
        if (!$request->activity_id && !$request->supplier_name) {
            $suppliers = Supplier::with("supplier_activities")
            ->orderByDesc('updated_at')
            ->paginate(10);
        } else {
            $suppliers = Supplier::whereHas("supplier_activities", function($query) use($request){
                $query->where("activity_id", 'like', "%$request->activity_id%" ?? "%");
            })
            ->orderByDesc('updated_at')
            ->where('supplier_name', 'like', "%$request->supplier_name%")
            ->paginate(10);
        }

        $activities = Activity::all();

        return view('user.home')
                ->with('suppliers', $suppliers)
                ->with('activities', $activities);
    }
}
