<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Supplier;
use App\Models\SupplierActivity;
use Illuminate\Http\Request;

class ActivityAssignController extends Controller
{
    public function assign(Request $request, $id){

        $this->validate($request, [
            'activity_id' => ['required' ,'exists:activities,id']
        ]);

        $supplier_activities = SupplierActivity::where('supplier_id', $id)->where('activity_id', $request->activity_id);

        if ($supplier_activities->count() > 0) {
            return redirect()->route('suppliers.edit', $id)->with('failed', 'هذا النشاط مسجل بالفعل');
        }

        SupplierActivity::create([
            'activity_id' => $request->activity_id,
            'supplier_id' => $id
        ]);

        return redirect()->route('suppliers.edit', $id)
            ->with('message', 'تم اضافة النشاط بنجاح');
    }

    public function deleteActivity(Request $request, Supplier $supplier, Activity $activity){
        SupplierActivity::where('supplier_id', $supplier->id)
            ->Where('activity_id', $activity->id)
            ->delete();

        return redirect()->route('suppliers.edit', $supplier->id)
            ->with('message', 'تم حذف النشاط بنجاح');
    }
}
