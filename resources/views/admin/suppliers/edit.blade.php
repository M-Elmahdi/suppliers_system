@extends('layouts.app')

@section('content')
    
<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        المُورِدين/تعديل مُورِد    
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
                            
                            <form action="{{ route('activities.assign', $supplier->id) }}" method="POST">
                                @csrf
                                <label for="supplier_rating" class="form-label">النشاطات<span class="text-danger"></span></label>
                                <select class="form-select rounded @error('supplier_email') is-invalid @enderror" name="activity_id">
                                    <option class="text-center" selected disabled>تسجيل نشاط</option>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                                    @endforeach
                                </select>
                                @error('activity_id')
                                    <div class="text-danger p-1">{{ $message }}</div>
                                @enderror

                                <button class="btn btn-primary mt-2">تسجيل نشاط</button>
                            </form>

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
                

                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- FORM START -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="supplier_name" class="form-label">اسم المُورِد<span class="text-danger">*</span></label>
                            <input type="text" value="{{old('supplier_name', $supplier->supplier_name)}}" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" id="supplier_name" placeholder="إدخال اسم المورد" required>
                            @error('supplier_name')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="phone_number" class="form-label">ارقام هواتف<span class="text-danger">*</span></label>
                            <textarea type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="إدخال رقم الهاتف" required>{{old('phone_number', $supplier->phone_number)}}</textarea>
                            @error('phone_number')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="address" class="form-label">عناوين<span class="text-danger"></span></label>
                            <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="إدخال الروابط الدالة">{{ old('address', $supplier->address) }}</textarea>
                            @error('address')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="website_uri" class="form-label">مواقع الكترونية وتواصل اجتماعي<span class="text-danger"></span></label>
                            <textarea type="text" name="website_uri" class="form-control @error('website_uri') is-invalid @enderror" id="website_uri" placeholder="إدخال الموقع الإلكتروني">{{ old('website_uri', $supplier->website_uri) }}</textarea>
                            @error('website_uri')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="supplier_employers" class="form-label">الموظفين لدى المُورِد<span class="text-danger"></span></label>
                            <textarea type="text" name="supplier_employers" class="form-control @error('supplier_employers') is-invalid @enderror" id="supplier_employers" placeholder="الموظفين العاملين لدى المُورِد">{{ old('supplier_employers', $supplier->supplier_employers) }}</textarea>
                            @error('supplier_employers')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="supplier_users" class="form-label">المتعاملين مع المُورِد<span class="text-danger"></span></label>
                            <textarea type="text" name="supplier_users" class="form-control @error('supplier_users') is-invalid @enderror" id="supplier_users" placeholder="إدخال المتعاملين مع المورد">{{ old('supplier_users', $supplier->supplier_users) }}</textarea>
                            @error('supplier_users')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="supplier_note" class="form-label">ملاحظات عن المُورِد<span class="text-danger"></span></label>
                            <textarea type="text" name="supplier_note" class="form-control @error('supplier_note') is-invalid @enderror" id="supplier_note" placeholder="الموظفين العاملين لدى المُورِد">{{ old('supplier_note', $supplier->supplier_note) }}</textarea>
                            @error('supplier_note')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="supplier_email" class="form-label">البريد الألكتروني<span class="text-danger"></span></label>
                            <textarea type="text" name="supplier_email" class="form-control @error('supplier_email') is-invalid @enderror" id="supplier_email" placeholder="إدخال البريد الألكتروني">{{ old('supplier_email', $supplier->supplier_email) }}</textarea>
                            @error('supplier_email')
                                <div class="text-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="supplier_rating" class="form-label">تقييم المُورِد<span class="text-danger"></span></label>
                            <select class="form-select rounded @error('supplier_email') is-invalid @enderror" name="supplier_rating_id">
                                @foreach ($ratings as $rating)
                                    <option value="{{ $rating->id }}"
                                        @if ($supplier->supplier_rating_id == $rating->id)
                                            selected
                                        @endif>{{ $rating->rating_name }}</option>
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

                    <button class="btn btn-primary mt-4">تحديث المعلومات</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection