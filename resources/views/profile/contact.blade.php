@extends('profile.layout')

@section('profile')

    <div class="spacer"></div>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/contact') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Phone number</label>

            <div class="col-md-6">
                <input id="phone" type="number" class="form-control" name="phone" value="{{ Auth::user()->contact->getOriginal('phone') }}" autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Address</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->contact->address }}">

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <label for="city" class="col-md-4 control-label">City</label>

            <div class="col-md-6">
                <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->contact->city }}">

                @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
            <label for="state" class="col-md-4 control-label">State</label>

            <div class="col-md-6">
                <select id="state" type="text" class="form-control" name="state">
                    @foreach(UsStates() as $state)
                        <option
                            {{ Auth::user()->contact->state == $state ? 'selected="true"' : '' }}
                            >{{ $state }}</option>
                    @endforeach
                </select>

                @if ($errors->has('state'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
            <label for="zip" class="col-md-4 control-label">Zip</label>

            <div class="col-md-6">
                <input id="zip" type="number" class="form-control" name="zip" value="{{ Auth::user()->contact->zip }}">

                @if ($errors->has('zip'))
                    <span class="help-block">
                        <strong>{{ $errors->first('zip') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
            <label for="fax" class="col-md-4 control-label">Fax</label>

            <div class="col-md-6">
                <input id="fax" type="number" class="form-control" name="fax" value="{{ Auth::user()->contact->fax }}">

                @if ($errors->has('fax'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fax') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-save"></i>
                    Save
                </button>
            </div>
        </div>

    </form>

@stop