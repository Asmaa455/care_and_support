@foreach ($Medical_Consultation as $item)
    {{$item->patient_id}}
    {{$item->consultation_text}}
    <a href="">{{"رد"}}</a>
@endforeach