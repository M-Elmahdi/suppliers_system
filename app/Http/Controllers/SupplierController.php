<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Supplier;
use App\Models\SupplierActivity;
use App\Models\SupplierRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderByDesc('created_at')->paginate(10);

        return view('admin.suppliers.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ratings = SupplierRating::all();

        return view('admin.suppliers.create')->with('ratings', $ratings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier_name' => ['required'],
            'phone_number' => ['required'],
            'supplier_rating_id' => ['required', 'exists:supplier_ratings,id']
        ]);

        Supplier::create([
            'supplier_name' => $request->supplier_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'supplier_email' => $request->supplier_email,
            'website_uri' => $request->website_uri,
            'supplier_employers' => $request->supplier_employers,
            'supplier_rating_id' => $request->supplier_rating_id,
            'supplier_users' => $request->supplier_users,
            'supplier_note' => $request->supplier_note,
        ]);

        return redirect()->route('suppliers.create')->with('message', 'تم اضافة المُورِد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::with('supplier_activities', 'rating')->find($id);

        return view('admin.suppliers.show')
                    ->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::with('supplier_activities')->find($id);
        $activities = Activity::all();
        $ratings = SupplierRating::all();

        return view('admin.suppliers.edit')
                    ->with('supplier', $supplier)
                    ->with('activities', $activities)
                    ->with('ratings', $ratings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        $this->validate($request, [
            'supplier_name' => ['required'],
            'phone_number' => ['required'],
            'supplier_rating_id' => ['required', 'exists:supplier_ratings,id']
        ]);

        $supplier->update([
            'supplier_name' => $request->supplier_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'supplier_email' => $request->supplier_email,
            'website_uri' => $request->website_uri,
            'supplier_employers' => $request->supplier_employers,
            'supplier_rating_id' => $request->supplier_rating_id,
            'supplier_users' => $request->supplier_users,
            'supplier_note' => $request->supplier_note,
        ]);

        return redirect()->route('suppliers.edit', $supplier->id)->with('edit_message', 'تم تعديل المُورِد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
