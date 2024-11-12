<h1>رد على استشارة</h1>



<form action="{{ route('Medical_Consultation.store_answer',[$id,$idc]) }}" method="POST">
    @csrf

    <input type="text" name="answer_text" placeholder="enter answer_text"><br><br>
    <button type="submit">submit</button>
</form>