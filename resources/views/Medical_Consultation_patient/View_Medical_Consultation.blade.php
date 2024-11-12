<h1>My Consulting</h1>


@if($medical_consultation->count() > 0)
    @foreach ($medical_consultation as $item)
        {{$item->patient->user->first_name}}<br>
        {{ $item->created_at }}<br>
        {{ $item->consultation_text }}<br>
        @if ($item->status==0)
        <pre> لم تتم الإجابة بعد </pre>
        @else
            {{$item->doctor->user->first_name}}<br>
            {{$item->answer_text}}<br><br><br>
        @endif
    @endforeach
@else
    <p>لا توجد استشارات بعد</p>
@endif


<a href="{{route('Medical_Consultation.create_Medical_Consultation',$id)}}">إنشاء استشارة</a>