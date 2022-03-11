@extends('layouts.app')

@section('content')

<!-- Page Name -->
<div class="bg-white">
    <div class="container">
        النشاطات/تعديل نشاط    
    </div>
</div> 
<!-- End Page Name -->
    
<div class="container my-3">

    <div class="d-flex justify-content-center row-cols-2">

        <div class="card rounded p-3">
            <div class="text-center">
                تعديل النشاط
            </div>

            <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <input type="text" class="form-control" value="{{ $activity->activity_name }}" placeholder="اسم النشاط" name="activity_name" required>
                </div>

                <div class="mt-2">
                    <button class="btn btn-primary">تعديل</button>
                </div>
            </form>
        </div>

    </div>

</div>

@endsection