@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">发布问题</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('question') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">标题</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body">描述</label>
                                <input id="body" type="text" class="form-control" name="body" value="{{ old('body') }}">

                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    提交
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
