<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('leave_date') }}
            {{ Form::text('leave_date', $leaveManagement->leave_date, ['class' => 'form-control' . ($errors->has('leave_date') ? ' is-invalid' : ''), 'placeholder' => 'Leave Date']) }}
            {!! $errors->first('leave_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>