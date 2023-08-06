@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('edit property')}}</h1>
                <a href="{{ route('admin.properties.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="agent">{{ __('agent') }}</label>
                    <select name="agent_id" class="form-control" id="agent">
                        @foreach($agents as $agent)
                        <option {{$agent->id === $property->agent->id ? 'selected' : null}} value="{{$agent->id}}">{{$agent->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">{{ __('title') }}</label>
                    <input type="text" class="form-control" id="title" placeholder="{{ __('title') }}" name="title" value="{{ old('title', $property->title) }}" />
                </div>
                <div class="form-group">
                    <label for="location">{{ __('location') }}</label>
                    <input type="text" class="form-control" id="location" placeholder="{{ __('location') }}" name="location" value="{{ old('location', $property->location) }}" />
                </div>
                <div class="form-group">
                    <label for="bed">{{ _('bed') }}</label>
                    <input type="number" class="form-control" id="bed" placeholder="{{ __('bed') }}" name="bed" value="{{ old('bed', $property->bed) }}" />
                </div>
                <div class="form-group">
                    <label for="bath">{{ _('bath') }}</label>
                    <input type="number" class="form-control" id="bath" placeholder="{{ __('bath') }}" name="bath" value="{{ old('bath', $property->bath) }}" />
                </div>
                <div class="form-group">
                    <label for="banner">{{ __('Name') }}</label>
                    <input type="file" class="form-control" id="banner" placeholder="{{ __('banner') }}" name="banner" value="{{ old('banner', $property->banner) }}" />
                </div>

                <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
            </form>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-header">
        <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-striped table-hover datatable datatable-role" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>No</th>
                            <th>{{ __('Photo') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($property->galleries as $gallery)
                        <tr data-entry-id="{{ $gallery->id }}">
                            <td>

                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ Storage::url($gallery->photo); }}" width="200" alt="banner">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.properties.galleries.edit', [$property,$gallery]) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure ? ')" class="d-inline" action="{{ route('admin.properties.galleries.destroy', [$property. $gallery]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.properties.galleries.store', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">{{ _('photo') }}</label>
                    <input type="file" class="form-control" id="photo" placeholder="{{ __('photo') }}" name="photo" value="{{ old('photo', $property->photo) }}" />
                </div>
                <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
            </form>
        </div>
    </div>


    <!-- Content Row -->

</div>
@endsection


@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.select-multiple').select2();
</script>
@endpush