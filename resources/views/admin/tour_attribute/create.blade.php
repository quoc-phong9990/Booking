@extends('admin.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Tour Attribute</h1>
                <div class="card">
                    <div class="card-header">Create Tour Attribute</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('tourAttributes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="attribute_id">Attribute:</label>
                                <select class="form-control" id="attribute_id" name="attribute_id" required>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->attribute }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tour_id">Tour:</label>
                                <select class="form-control" id="tour_id" name="tour_id" required>
                                    @foreach ($tours as $tour)
                                        <option value="{{ $tour->id }}">{{ $tour->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Tour Attribute</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
