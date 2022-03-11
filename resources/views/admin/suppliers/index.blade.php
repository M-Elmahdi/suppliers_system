@extends('layouts.app')

@section('content')

<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        الموردين/    
    </div>
</div> 
<!-- End Page Name -->

<div class="container my-3">  
    <div class="card bg-white rounded border p-3">
        
        <div class="text-start">
            <a href="{{ route('suppliers.create') }}" role="button" class="btn btn-primary btn-lg">
            إضافة مورد
            </a>
        </div>

        <!-- Content table -->
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">الرقم</th>
                <th scope="col">اسم المورد</th>
                <th scope="col">تاريخ الإدخال</th>
                <th scope="col">التحكم</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                   <tr>
                        <th scope="row">{{ $supplier->id }}</th>
                        <td>{{ $supplier->supplier_name }}</td>
                        <td>{{ $supplier->updated_at->toDateString() }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    التحكم
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('suppliers.edit', $supplier->id) }}" role="button" class="btn btn-outline-primary rounded-0 form-control">تعديل</a></li>
                                    <li><a href="{{ route('suppliers.show', $supplier->id) }}" role="button" class="btn btn-outline-primary rounded-0 form-control">عرض</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
        <!-- End Content Table -->
    </div>

    <div class="mt-2">
        {{ $suppliers->links() }}
    </div>
</div>

@endsection