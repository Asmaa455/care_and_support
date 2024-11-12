<h1>The consultations that I answered</h1>


@if($Medical_Consultation->count() > 0)
    @foreach ($Medical_Consultation as $item)
        {{$item->patient->user->first_name}}<br>
        {{ $item->created_at }}<br>
        {{ $item->consultation_text }}<br>
        {{$item->doctor->user->first_name}}<br>
        {{ $item->updated_at }}<br>
        {{$item->answer_text}}<br><br><br>
    @endforeach
@else
    <p>لم تجيب تجيب على أي استشارة بعد</p>
@endif
