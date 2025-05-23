@props(['id', 'type', 'label'])
<?php
if ($attributes['value'] == '') {
    $attributes['value'] = old($id);
}
?>

<div class="row mb-3">
    <label for="{{ $id }}" class="col-md-4 col-form-label text-md-end">{{ __("$label") }}</label>


    <div class="col-md-6">
        <select id="{{ $id }}" class="form-control @error($id) is-invalid @enderror" name="{{ $id }}" {{ $attributes }}>
            {{ $slot }}
        </select>

        @error($id)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>