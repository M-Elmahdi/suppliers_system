@extends('layouts.app')

@section('content')
    
<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        المُورِدين/عرض مُورِد    
    </div>
</div> 
<!-- End Page Name -->

<div class="container my-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 rounded">
                <div class="row">
                    <div class="col">
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div> 
                        @endif

                        @if (session('failed'))
                            <div class="alert alert-danger">{{ session('failed') }}</div> 
                        @endif

                        <!-- Content table -->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">نشاطات مسجلة</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier->supplier_activities as $activity)
                                <tr>
                                    <td>{{ $activity->activity_name }}</td>
                                    <td></td>      
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Content Table -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card p-3 rounded">
                
                @if (session('edit_message'))
                    <div class="alert alert-success">{{ session('edit_message') }}</div>
                @endif

                <h3 class="text-center">معلومات المُورِد</h3>
                <hr>
                <!-- FORM START -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="supplier_name" class="form-label">اسم المُورِد<span class="text-danger">*</span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->supplier_name }}</div>
                    </div>

                    <div class="col">
                        <label for="phone_number" class="form-label">ارقام هواتف<span class="text-danger">*</span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->phone_number }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="address" class="form-label">عناوين<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->address }}</div>
                    </div>

                    <div class="col">
                        <label for="website_uri" class="form-label">مواقع الكترونية وتواصل اجتماعي<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->website_uri }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="supplier_employers" class="form-label">الموظفين لدى المُورِد<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->supplier_employers }}</div>
                    </div>

                    <div class="col">
                        <label for="supplier_users" class="form-label">المتعاملين مع المُورِد<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->supplier_users }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="supplier_note" class="form-label">ملاحظات عن المُورِد<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->supplier_note }}</div>
                    </div>

                    <div class="col">
                        <label for="supplier_email" class="form-label">البريد الألكتروني<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2">{{ $supplier->supplier_email }}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="supplier_rating" class="form-label">تقييم المُورِد<span class="text-danger"></span></label>
                        <div class="border rounded bg-light p-2 text-center">{{ $supplier->rating->rating_name }}</div>
                    </div>

                    <div class="col">

                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>

@endsection