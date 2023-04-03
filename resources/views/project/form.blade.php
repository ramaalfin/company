@csrf
<div class="row mb-3">
    <label for="name" class="col-md-3 col-form-label text-md-end">Nama Project</label>
    <div class="col-md-4">
        <input type="text" id="name" class="form-control @error('name')
            is-invalid
        @enderror" name="name" value="{{ old('name') ?? $project->name ?? '' }}">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="description" class="col-md-3 col-form-label text-md-end">Deskripsi Project</label>
    <div class="col-md-4">
        <input type="text" id="description" class="form-control @error('description')
            is-invalid
        @enderror" name="description" value="{{ old('description') ?? $project->description ?? '' }}">

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="start_date" class="col-md-3 col-form-label text-md-end">Start Date</label>
    <div class="col-md-4">
        <input type="date" id="start_date" class="form-control @error('start_date')
            is-invalid
        @enderror" name="start_date" value="{{ old('start_date') ?? $project->start_date ?? '' }}">

        @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="finish_date" class="col-md-3 col-form-label text-md-end">finish Date</label>
    <div class="col-md-4">
        <input type="date" id="finish_date" class="form-control @error('finish_date')
            is-invalid
        @enderror" name="finish_date" value="{{ old('finish_date') ?? $project->finish_date ?? '' }}">

        @error('finish_date')
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
