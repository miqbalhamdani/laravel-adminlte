@extends('dashboard.layout.default')

@section('title', 'Post')

@section('content')

@if (@$error_message)
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
  {{ @$error_message }}
</div>
@endif

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Update Post</h3>
  </div>
  <form action="{{ URL('admin/post/update/', $form['id']) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Title</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" placeholder="Title"
            value="{{ @$input['title'] ? @$input['title'] : $form['title'] }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>

        <div class="col-sm-10">
          <textarea id="editor1" name="description" rows="5" cols="80">
            {{ @$input['description'] ? @$input['description'] : $form['description'] }}
          </textarea>
        </div>
      </div> <br/>

      <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
          <input type="file" name="image">
          <code>Max 1mb | Format JPG, JPEG, atau PNG.</code>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <a href="{{ URL('/admin/post') }}"><button type="button" class="btn btn-default">Cancel</button></a>
      <button type="submit" class="btn btn-primary pull-right">Save</button>
    </div>
  </form>
</div>

@endsection