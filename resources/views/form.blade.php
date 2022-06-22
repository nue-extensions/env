<div class="card-body bg-light pb-10" style="min-height:calc(100vh - 163px)">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="key">
            Key <span class="text-danger">*</span>
        </label>
        <div class="col-sm-9">
            {!! Form::text('key', null, ['class' => 'form-control form-style' . $errors->first('key', ' is-invalid')]) !!}
            {!! $errors->first('key', ' <span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="value">
            Value <span class="text-danger">*</span>
        </label>
        <div class="col-sm-9">
            {!! Form::textarea('value', null, ['class' => 'form-control form-style' . $errors->first('value', ' is-invalid'), 'rows' => 3]) !!}
            {!! $errors->first('value', ' <span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="mb-5">&nbsp;</div>
</div>
<div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
    <div class="card card-sm bg-dark border-dark mx-2">
        <div class="card-body">
            <div class="row justify-content-center justify-content-sm-between">
                <div class="col">
                    <a href="{{ route("$prefix.index") }}" class="btn btn-ghost-light">
                        <span class="iconify" data-icon="heroicons-solid:arrow-left"></span>
                        Back
                    </a>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-3">
                        <button type="reset" class="btn btn-ghost-light">Reset</button>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>