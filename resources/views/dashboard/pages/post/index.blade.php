@extends('dashboard.layout.default')

@section('title', 'Post')

@section('content')

@if (@session('success_message'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fa fa-check"></i> Alert!</h5>
  {{ @session('success_message') }}
</div>
@endif

<div class="box">
  <div class="box-header">
    <div class=" col-sm-12 col-md-2">
    <a href="{{ URL('/admin/post/create') }}">
        <button type="button" class="btn btn-block btn-primary">Add New Post</button>
      </a>
    </div>
  </div>
  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th></th>
      </tr>
      </thead>
      <tbody>

      @foreach ($collection as $item)
      <tr>
        <td>{{ $item->title }}</td>
        <td>{!! $item->description !!}</td>
        <td>
          @if($item->image)
            <img class="image-link" src="\{{ env('PATH_POST') }}\{{ $item->image }}"
              href="\{{ env('PATH_POST') }}\{{ $item->image }}" width="100">
          @endif
        </td>
        <td>
            <a href="{{ URL('/admin/post/update/'. $item->id) }}">
              <button class="btn btn-warning"><i class="fa fa-edit"></i> update </button>
            </a>
            <a onclick="deleteRow('/admin/post', {{ $item->id }})">
              <button class="btn btn-danger"><i class="fa fa-trash"></i> delete </button>
            </a>
        </td>
      </tr>
      @endforeach

      </tbody>
    </table>
  </div>
</div>

@endsection