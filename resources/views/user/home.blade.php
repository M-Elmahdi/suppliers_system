@extends('layouts.app')

@section('content')

<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        الرئيسية/    
    </div>
</div> 
<!-- End Page Name -->
    
<div class="container my-3">  

    <div class="card bg-white rounded border p-3">
        <form action="{{ route('users.home') }}" method="GET">
            <!-- Search Form -->
            <div class="row p-1 my-2">
                
                <div class="col">
                    <input type="text" name="supplier_name" class="form-control" placeholder="بحث باللإسم">
                </div>

                <div class="col-md-2">
                    <select class="form-select rounded" name="activity_id">
                        <option class="text-center" selected disabled>النشاط</option>
                        @foreach ($activities as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <div class="Activity Form">
                        <button class="btn btn-primary">البحث</button> 
                    </div>
                </div>
                
            </div>
            <!-- End Search Form -->
        </form>
        <!-- Content table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">الرقم</th>
                    <th scope="col">الإسم</th>
                    <th scope="col">التعامل</th>
                    <th scope="col">النشاطات</th>
                    <th scope="col">اخر تحديث</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <th scope="row">{{ $supplier->id }}</th>
                    <td>{{ $supplier->supplier_name }}</td>
                    <td>{{ $supplier->rating->rating_name }}</td>
                    <td>
                        @if ($supplier->supplier_activities->count() > 0)
                            @foreach($supplier->supplier_activities as $activity)
                                {{ $activity->activity_name }}/
                            @endforeach
                        @else
                            لا يوجد
                        @endif
                    </td>
                    <td>{{ $supplier->updated_at->toDateString() }}</td>
                    <td><a href="{{ route('suppliers.show', $supplier->id) }}" role="button" class="btn btn-primary">عرض</a></td>
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