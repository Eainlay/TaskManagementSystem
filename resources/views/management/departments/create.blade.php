@extends('layouts.master')

@section('content')
<h2>Create New Department</h2>
<form action="{{route('departmentsStore')}}" method="POST">

@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label for="name">Department Name</label>
        <input type="text" name="name" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="director_id">Director</label>
            <select name="director_id" class="form-control">
                <option value="" selected>Select a person</option>
                <option value="1">IT Director</option>
                <option value="2">HR Director</option>

            </select>
        </div>
    </div>


        <div class="col-md-12 ">
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Save</button>
            </div>
    </div>
</div>
</form>
@endsection
