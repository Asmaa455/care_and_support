<h1>My Consulting</h1>


@if($medical_consultation->count() > 0)
    @foreach ($medical_consultation as $item)
        {{ $item->consultation_text }}<br>
        {{ $item->status }}<br><br>   
    @endforeach
@else
    <p>لا توجد استشارات بعد</p>
@endif


<a href="{{route('Medical_Consultation.create_Medical_Consultation',$id)}}">إنشاء استشارة</a>