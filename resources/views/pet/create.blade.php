@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Register a new pet</div>
                <div class="panel-body">

                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/pets') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                            <label for="picture" class="col-md-4 control-label">Picture</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="picture">

                                @if ($errors->has('picture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /picture --}}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /name --}}

                        <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }}">
                            <label for="species" class="col-md-4 control-label">Species</label>

                            <div class="col-md-6">
                            <select id="species" name="species" class="form-control" value="{{ old('species') }}" required>
                                    <option>Cat</option>
                                    <option>Dog</option>
                                </select>

                                @if ($errors->has('species'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('species') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /species --}}

                        <div class="form-group{{ $errors->has('breed') ? ' has-error' : '' }}">
                            <label for="breed" class="col-md-4 control-label">Breed</label>

                            <div class="col-md-6">
                                <input id="breed" type="text" class="form-control" name="breed" value="{{ old('breed') }}" required>

                                @if ($errors->has('breed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('breed') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /breed --}}


                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}">

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /color --}}

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select id="gender" name="gender" class="form-control" value="{{ old('gender') }}" required>
                                    <option>Female</option>
                                    <option>Male</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /gender --}}

                        {{-- If a user has vets attached to his/her account, connect the to pets when their being registered --}}

                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Notes</label>

                            <div class="col-md-6">
                                <textarea id="notes" class="form-control" name="notes" style="resize: vertical;" rows="4">{{ old('notes') }}</textarea>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> {{-- /notes --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i aria-hidden="true" class="fa fa-btn fa-paw"></i>
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div> {{-- Panel end --}}

        </div>
    </div>
</div>
@endsection
