<?php

namespace App\Http\Controllers;

use App\Models\Attatchment;
use App\Models\Supplier;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function download(Attatchment $attatchment){
        
        $filePath = public_path($attatchment->path);

        $headers = ["Content-Type: $attatchment->mime_type"];
        $fileName = time();

        if (! file_exists($filePath)) {
            return redirect()->back()->with('error', 'file does not exist');
        }
        
        return response()->download($filePath, "$fileName.$attatchment->extension", $headers);
    }

    public function uploadFile(Request $request, Supplier $supplier){
        $this->validate($request, [
            'file' => ['mimes:pdf,docx,xlsx,txt,csv,jpeg,png', 'max:5048', 'required']
        ]);

        //fetching name
        $pathinfo = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

        $file = $request->file('file');
        $generated_name = hexdec(uniqid());
        $extention = strtolower($file->getClientOriginalExtension());
        $file_name = $generated_name.'.'.$extention;
        $upload_location = "storage/files/";
        $full_path = $upload_location.$file_name;

        $file->move($upload_location, $file_name);
        
        Attatchment::insert([
            'name' => $pathinfo.'_'.time(),
            'path' => $full_path,
            'supplier_id' => $supplier->id,
            'mime_type' => $file->getClientMimeType(),
            'extension' => $file->getClientOriginalExtension()
        ]);

        return redirect()->route('suppliers.edit', $supplier->id)
            ->with('message', 'تم رفع الملف بنجاح');
    }
}
