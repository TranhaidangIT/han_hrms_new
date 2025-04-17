<form action="{{ route('admin.scientific_works.update', ['scientific_work' => $scientificWork->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-input value="{{ $scientificWork->scientific_works_name }}" label="Tên công trình khoa học"
        name="scientific_works_name" required />
    <x-input value="{{ $scientificWork->year }}" label="Năm" name="year" required />
    <x-input value="{{ $scientificWork->magazine_name }}" label="Tên tạp chí" name="magazine_name" />

    <div class="mb-3">
        <input type="submit" class="btn btn-success" value="Cập nhật" />
    </div>
</form>
