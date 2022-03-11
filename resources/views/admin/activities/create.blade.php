@extends('layouts.app')

@section('content')

<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        النشاطات/    
    </div>
</div> 
<!-- End Page Name -->

<div class="container my-3">  
    <div class="card bg-white rounded border p-3">
        
        <!-- Activity Form -->
        <form action="{{ route('activities.store') }}" method="POST">
            @csrf
            <div class="row p-1 col-md-6 my-2">

                <h3 class="">إضافة نشاط</h3>

                <div class="col">
                    <input name="activity_name" type="text" class="form-control" placeholder="اسم النشاط" required>
                    @error('activity_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <div>
                        <button type="submit" class="btn btn-primary">اضافة</button> 
                    </div>
                </div>
            </div>
        </form>
        <!-- End Activity Form -->


        <!-- Content table -->
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">الرقم</th>
                <th scope="col">اسم النشاط</th>
                <th scope="col">اخر تحديث</th>
                <th scope="col">التحكم</th>
              </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                <tr>
                    <th scope="row">{{ $activity->id }}</th>
                    <td>{{ $activity->activity_name }}</td>
                    <td>{{ $activity->updated_at->toDateString() }}</td>
                    <td>
                        <a href="{{ route('activities.edit', $activity->id) }}" role="button" class="btn btn-primary">تعديل</a>   
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Content Table -->
    </div>
    {{ $activities->links() }}
</div>

@endsection