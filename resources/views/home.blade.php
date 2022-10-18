@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="welcome-search-container">
                <h1 class="text-center mb-3 header-label">Welcome!</h1>
                <form action="/faculty-list" method="get" class="row">
                    <div class="col-md-8">
                        <select name="department" id="department" class="form-select bg-white">
                            <option value="" selected>Select Department</option>
                            <option value="department 1">department 1</option>
                            <option value="department 2">department 2</option>
                            <option value="department 3">department 3</option>
                            <option value="department 4">department 4</option>
                            <option value="department 5">department 5</option>
                        </select>
                    </div>
                    <div class="col-md-3 m-auto">
                        <button type="submit" class="btn btn-md btn-primary px-5"><strong>Search</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
