<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('bay_id') }}
            {{ Form::text('bay_id', $bayTimeslot->bay_id, ['class' => 'form-control' . ($errors->has('bay_id') ? ' is-invalid' : ''), 'placeholder' => 'Bay Id']) }}
            {!! $errors->first('bay_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_time') }}
            {{ Form::text('start_time', $bayTimeslot->start_time, ['class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : ''), 'placeholder' => 'Start Time']) }}
            {!! $errors->first('start_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end_time') }}
            {{ Form::text('end_time', $bayTimeslot->end_time, ['class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : ''), 'placeholder' => 'End Time']) }}
            {!! $errors->first('end_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>