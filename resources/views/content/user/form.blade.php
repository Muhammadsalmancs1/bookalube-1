<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_admin') }}
            {{ Form::text('is_admin', $user->is_admin, ['class' => 'form-control' . ($errors->has('is_admin') ? ' is-invalid' : ''), 'placeholder' => 'Is Admin']) }}
            {!! $errors->first('is_admin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('referral') }}
            {{ Form::text('referral', $user->referral, ['class' => 'form-control' . ($errors->has('referral') ? ' is-invalid' : ''), 'placeholder' => 'Referral']) }}
            {!! $errors->first('referral', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_name') }}
            {{ Form::text('employee_name', $user->employee_name, ['class' => 'form-control' . ($errors->has('employee_name') ? ' is-invalid' : ''), 'placeholder' => 'Employee Name']) }}
            {!! $errors->first('employee_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_number') }}
            {{ Form::text('employee_number', $user->employee_number, ['class' => 'form-control' . ($errors->has('employee_number') ? ' is-invalid' : ''), 'placeholder' => 'Employee Number']) }}
            {!! $errors->first('employee_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>