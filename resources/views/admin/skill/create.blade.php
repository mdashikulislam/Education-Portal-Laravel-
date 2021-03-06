@extends('admin.app')
@section('main-content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Add New Skill</h2>
            <a href="{{route('admin.skill.index')}}" class="btn btn-outline-primary btn-sm text-uppercase">
                <i class="fa fa-list"></i> Skill List
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('admin.skill.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="title">Skill Title :</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" name="title"  rows="3">{{\Illuminate\Support\Facades\Input::old('title')}}</textarea>
                    @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                </div>
                <div class="form-group">
                    <label for="category">Select Category :</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">Select a Category</option>
                        <option value="soft skill" @if(old('category') === 'soft skill')selected @endif>{{ucfirst('soft skill')}}</option>
                        <option value="academic skill" @if(old('category') === 'academic skill')selected @endif>{{ucfirst('academic skill')}}</option>
                        <option value="professional skill" @if(old('category') === 'professional skill')selected @endif>{{ucfirst('professional skill')}}</option>
                    </select>
                    @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image :</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                    @error('image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Content :</label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror">{{old('description')}}</textarea>
                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    <label for="category">Select Status :</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"> <i class="fa fa-save fa-fw"></i>Save</button>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            height:800
        });
    </script>
@endsection
