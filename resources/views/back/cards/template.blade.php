@extends('back.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            @if (session('card-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('card-ok') !!}
                @endcomponent
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    @yield('form-open')
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label for="name">@lang('Number Card')</label>
                            <input type="text" class="form-control" id="number" name="number" value="@if(isset($card)) {{ old('number', $card->number) }} @elseif(old('number')) {{ old('number') }} @endif" placeholder="777 777 777 777" required> 
                            {!! $errors->first('number', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label for="type">@lang('Type Card')</label>
                            <select class="form-control" name="type_id" id="type_id">
                                @foreach ($types as $key => $type)
                                   <option value="{{ $type->id }}" 
                                    @if(!isset($card)) 
                                       @if(old('type_id') == $type->id) {{ 'selected' }} @endif
                                    @elseif(isset($card) && !old('type_id'))
                                       @if($card->type_id == $type->id) {{ 'selected' }} @endif
                                    @elseif(isset($card) && old('type_id'))
                                       @if(old('type_id') == $type->id) {{ 'selected' }} @endif
                                    @endif
                                   >@lang( $type->type)</option>
                                @endforeach                       
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user">@lang('User')</label>
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach ($users as $user)
                                   <option value="{{ $user->id }}"
                                    @if(!isset($card)) 
                                       @if(old('user_id') == $user->id) {{ 'selected' }} @endif
                                    @elseif(isset($card) && !old('user_id'))
                                       @if($card->user_id == $user->id) {{ 'selected' }} @endif
                                    @elseif(isset($card) && old('user_id'))
                                       @if(old('user_id') == $user->id) {{ 'selected' }} @endif
                                    @endif
                                   >@lang( $user->name)</option>
                                @endforeach                 
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="card-edit" value="@if(isset($card)){{1}}@else{{0}}@endif" />
                                <input type="checkbox" name="active" 
                                @if(isset($card) && !old('card-edit'))      
                                   @if($card->active) {{ 'checked' }} @endif
                                @else
                                   @if(old('active')) {{ 'checked' }} @endif
                                @endif   
                                >@lang('Active')
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
@endsection

