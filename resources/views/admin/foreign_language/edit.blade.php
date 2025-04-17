<form action="{{ route('admin.foreign_languages.update', ['foreign_language'=>$foreignLanguage->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-input :value="$foreignLanguage->foreign_language_name" label="Tên ngoại ngữ" name="foreign_language_name" required />
    <x-input :value="$foreignLanguage->level" label="Trình độ" name="level" required />

    <div class="mb-3">
        <input type="submit" class="btn btn-success" value="Cập nhật" />
    </div>
</form>