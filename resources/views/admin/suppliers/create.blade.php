@extends('layouts.app')

@section('content')

<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        المورد/إضافة مورد    
    </div>
</div> 
<!-- End Page Name -->
    
<div class="container my-3">

    <div class="row">

        <div class="card rounded p-3">
            <div class="text-center">
                <h3>إضافة مُورِد</h3>
                <hr>
            </div>

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf
                @method('POST')
                
                <!-- FORM START -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="supplier_name" class="form-label">اسم المُورِد<span class="text-danger">*</span></label>
                        <input type="text" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" id="supplier_name" placeholder="إدخال اسم المورد" required>
                        @error('supplier_name')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="phone_number" class="form-label">ارقام هواتف<span class="text-danger">*</span></label>
                        <textarea type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="إدخال رقم الهاتف" required></textarea>
                        @error('phone_number')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="address" class="form-label">عناوين<span class="text-danger"></span></label>
                        <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="إدخال الروابط الدالة"></textarea>
                        @error('address')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="website_uri" class="form-label">مواقع الكترونية وتواصل اجتماعي<span class="text-danger"></span></label>
                        <textarea type="text" name="website_uri" class="form-control @error('website_uri') is-invalid @enderror" id="website_uri" placeholder="إدخال الموقع الإلكتروني"></textarea>
                        @error('website_uri')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="supplier_employers" class="form-label">الموظفين لدى المُورِد<span class="text-danger"></span></label>
                        <textarea type="text" name="supplier_employers" class="form-control @error('supplier_employers') is-invalid @enderror" id="supplier_employers" placeholder="الموظفين العاملين لدى المُورِد"></textarea>
                        @error('supplier_employers')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="supplier_users" class="form-label">المتعاملين مع المُورِد<span class="text-danger"></span></label>
                        <textarea type="text" name="supplier_users" class="form-control @error('supplier_users') is-invalid @enderror" id="supplier_users" placeholder="إدخال المتعاملين مع المورد"></textarea>
                        @error('supplier_users')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="supplier_note" class="form-label">ملاحظات عن المُورِد<span class="text-danger"></span></label>
                        <textarea type="text" name="supplier_note" class="form-control @error('supplier_note') is-invalid @enderror" id="supplier_note" placeholder="الموظفين العاملين لدى المُورِد"></textarea>
                        @error('supplier_note')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="supplier_email" class="form-label">البريد الألكتروني<span class="text-danger"></span></label>
                        <textarea type="text" name="supplier_email" class="form-control @error('supplier_email') is-invalid @enderror" id="supplier_email" placeholder="إدخال البريد الألكتروني"></textarea>
                        @error('supplier_email')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="supplier_rating" class="form-label">تقييم المُورِد<span class="text-danger"></span></label>
                        <select class="form-select rounded @error('supplier_email') is-invalid @enderror" name="supplier_rating_id">
                            <option class="text-center" selected disabled>تقييم التعامل</option>
                            @foreach ($ratings as $rating)
                                <option value="{{ $rating->id }}">{{ $rating->rating_name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_rating_id')
                            <div class="text-danger p-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">

                    </div>
                </div>
                
                <!-- END FORM -->

                <div class="mt-2">
                    <button class="btn btn-primary">إضافة</button>
                </div>
            </form>
        </div>

    </div>

</div>

@endsection