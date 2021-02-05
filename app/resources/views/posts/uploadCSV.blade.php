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
                            <div class="form-group row">
                                <label for="fileInput" class="col-md-4 text-md-right">File Input:</label>
                                <div class="col-md-6">
                                    <input type="file" name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button class="btn btn-primary">Import Post</button>
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