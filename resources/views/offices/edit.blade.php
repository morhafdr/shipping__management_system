
@extends('layouts.master')

@section('pageTitle')
    تعديل مكتب
@endsection

@section('scripts')
    <style>
        /* Existing CSS */
        #governorateSelect {
            width: 200px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-size: 14px;
        }

        #governorateSelect option {
            padding: 5px;
            font-size: 12px;
        }

        /* New styles for validation */
        .form-control.error {
            border: 1px solid red;
        }
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 2px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2>تعديل مكتب</h2>
        <!-- Display Validation Errors -->

        <form action="{{ route('offices.update', $office->id) }}" method="put" class="mb-3 mx-4 bg-white p-3 border-radius-2xl" autocomplete="off">
            @csrf
            @method('PUT') <!-- Correct method for updating -->
            <div class="form-group mt-3">
                <label for="governorate_id" class="h4">المحافظة</label>
                <select class="form-control @error('governorate_id') error @enderror h6 mr-3 bg-gradient-light w-50 p-2" id="governorate_id" name="governorate_id">
                    @foreach(\App\Models\Governorate::all() as $governorate)
                        <option value="{{ $governorate->id }}" {{ (old('governorate_id', $office->governorate_id) == $governorate->id) ? 'selected' : '' }}>
                            {{ $governorate->name }}
                        </option>
                    @endforeach
                </select>
                @error('governorate_id')
                <div class="error-message">هذا الحقل مطلوب</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="city" class="h4">المدينة</label>
                <input type="text" class="form-control @error('city') error @enderror h6 mr-3 bg-gradient-light w-50 p-2" id="city" name="city" value="{{ old('city', $office->city) }}">
                @error('city')
                <div class="error-message">هذا الحقل مطلوب</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="address" class="h4">العنوان</label>
                <input type="text" class="form-control @error('address') error @enderror h6 mr-3 bg-gradient-light w-50 p-2" id="address" name="address"  value="{{ old('address', $office->address) }}">
                @error('address')
                <div class="error-message">هذا الحقل مطلوب</div>
                @enderror
            </div>
            <div class="form-group mt-5">
                <label for="phone" class="h4">الجوال</label>
                <input type="tel" class="form-control @error('phone') error @enderror text-end h6 mr-3 bg-gradient-light w-50 p-2" id="phone" name="phone"  value="{{ old('phone', $office->phone) }}">
                @error('phone')
                <div class="error-message">هذا الحقل مطلوب</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('offices.index') }}" class="btn btn-primary">العودة إلى القائمة</a>
        </form>
    </div>
@endsection
```

###
