@props(['id', 'type'])
<?php
if ($attributes['value'] == '') {
    $attributes['value'] = old($id);
}
?>

<div class="row mb-3">
    <label for="{{ $id }}" class="col-md-4 col-form-label text-md-end">{{ __("$slot") }}</label>


    <div class="col-md-6">
        <input id="{{ $id }}" type="{{ $type }}" class="form-control @error($id) is-invalid @enderror" name="{{ $id }}" autocomplete="{{ $type }}" {{ $attributes }}>

        @error($id)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>