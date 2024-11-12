<h1>  استشارات مرضى غير مردود عليهم</h1>





@if($Medical_Consultation->count() > 0)
    @foreach ($Medical_Consultation as $item)
    @if ($item->status==0)
        {{$item->patient->user->first_name}}<br>
        {{ $item->created_at }}<br>
        {{ $item->consultation_text }}<br>
        <a href="{{ route('Medical_Consultation.create_answer',[$id,$item->id]) }}" > رد </a>
        @endif
    @endforeach
@else
    <p>لا توجد استشارات بعد</p>
@endif

