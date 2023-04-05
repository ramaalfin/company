@csrf
<div class="row mb-3">
    <label for="nip" class="col-md-3 col-form-label text-md-end">NIP</label>
    <div class="col-md-4">
        <input type="text" id="nip" class="form-control @error('nip')
            is-invalid
        @enderror"
            name="nip" value="{{ old('nip') ?? ($employe->nip ?? '') }}">

        @error('nip')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="fullname" class="col-md-3 col-form-label text-md-end">Nama Employe</label>
    <div class="col-md-4">
        <input type="text" id="fullname"
            class="form-control @error('fullname')
            is-invalid
        @enderror" name="fullname"
            value="{{ old('fullname') ?? ($employe->fullname ?? '') }}">

        @error('fullname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="row mb-3">
    <label for="email" class="col-md-3 col-form-label text-md-end">Email</label>
    <div class="col-md-4">
        <input type="email" id="email"
            class="form-control @error('email')
            is-invalid
        @enderror" name="email"
            value="{{ old('email') ?? ($employe->email ?? '') }}">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="gender" class="col-md-3 col-form-label text-md-end">Jenis Kelamin</label>
    <div class="col-md-4">
        <div class="flex items-center gap-x-1">
            <input id="laki-laki" name="gender" value="male" {{ $employe->gender === 'male' ? 'checked' : '' }}
                type="radio"
                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600
                @error('gender')
                    is-invalid
                @enderror">
            <label for="laki-laki" class="block text-sm font-medium leading-6 text-gray-900">Laki-laki</label>
        </div>
        <div class="flex items-center gap-x-1">
            <input id="perempuan" name="gender" value="female" {{ $employe->gender === 'female' ? 'checked' : '' }}
                type="radio"
                class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600
                @error('gender')
                    is-invalid
                @enderror">
            <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Perempuan</label>
        </div>

        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="address" class="col-md-3 col-form-label text-md-end">Alamat</label>
    <div class="col-md-4">
        <input type="text" id="address"
            class="form-control @error('address')
            is-invalid
        @enderror" name="address"
            value="{{ old('address') ?? ($employe->address ?? '') }}">

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="phone_number" class="col-md-3 col-form-label text-md-end">Nomor Handphone</label>
    <input type="text" name="phone_number" value="{{ old('phone_number') ?? ($employe->phone_number ?? ' ') }}"
        class=" form-control
    @error('address')
        is-invalid
    @enderror">
</div>

<div class="row mb-3">
    <label for="department_id" class="col-md-3 col-form-label text-md-end">Pilih department</label>
    <div class="col-md-4">
        <select type="text" id="department_id" class="form-select @error('department_id') is-invalid @enderror"
            name="department_id">
            @foreach ($departments as $department)
                @if ($department->id == (old('department_id') ?? ($employe->department_id ?? '')))
                    <option value="{{ $department->id }}" selected>
                        {{ $department->name }}
                    </option>
                @else
                    <option value="{{ $department->id }}">
                        {{ $department->name }}
                    </option>
                @endif
            @endforeach
        </select>

        @error('department_id')
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
