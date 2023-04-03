@csrf
<div class="row mb-3">
    <label for="name" class="col-md-3 col-form-label text-md-end">Nama Department</label>
    <div class="col-md-4">
        <input type="text" id="name" class="form-control @error('name')
            is-invalid
        @enderror" name="name" value="{{ old('name') ?? $department->name ?? '' }}">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="kepala_department" class="col-md-3 col-form-label text-md-end">Nama Kepala Department</label>
    <div class="col-md-4">
        <input type="text" id="kepala_department" class="form-control @error('kepala_department')
            is-invalid
        @enderror" name="kepala_department" value="{{ old('kepala_department') ?? $department->kepala_department ?? '' }}">

        @error('kepala_department')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>
