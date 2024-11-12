<h1> استشارات المرضى </h1>





@if($Medical_Consultation->count() > 0)
    @foreach ($Medical_Consultation as $item)
    @if ($item->status==1)
        {{$item->patient->user->first_name}}<br>
        {{ $item->created_at }}<br>
        {{ $item->consultation_text }}<br>
        {{$item->doctor->user->first_name}}<br>
        {{$item->answer_text}}<br><br><br>
        @endif
    @endforeach
@else
    <p>لا توجد استشارات بعد</p>
@endif

