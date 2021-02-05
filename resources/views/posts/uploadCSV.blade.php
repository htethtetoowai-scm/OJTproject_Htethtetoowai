@extends('Layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload CSV file') }}</div>
                    <div class="card-body">
                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach 
                            <div class="form-group row">
                                <label for="fileInput" class="col-md-4 text-md-right">Input File From:</label>
                                <div class="col-md-6">
                                    <input type="file" name="file" accept=".csv">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button class="btn btn-primary">Import Posts</button>
                                    <a class="btn btn-danger" href="{{ route('posts.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection