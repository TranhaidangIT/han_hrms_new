<form action="{{ route('admin.scientific_research_topics.update', ['scientific_research_topic' => $scientificResearchTopic->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <x-input value="{{ $scientificResearchTopic->scientific_research_topic_name }}" label="Tên đề tài" name="scientific_research_topic_name" required />
    <x-input value="{{ $scientificResearchTopic->year_of_begin }}" label="Năm bắt đầu" name="year_of_begin" required />
    <x-input value="{{ $scientificResearchTopic->year_of_complete }}" label="Năm kết thúc" name="year_of_complete" />
    <x-input value="{{ $scientificResearchTopic->level_topic }}" label="Cấp đề tài" name="level_topic" />
    <x-input value="{{ $scientificResearchTopic->responsibility_in_the_topic }}" label="Vai trò trong đề tài" name="responsibility_in_the_topic" />

    <div class="mb-3">
        <input type="submit" class="btn btn-success" value="Cập nhật" />
    </div>
</form>