<h1>Create new Medical Consultation</h1>







<form action="{{ route('Medical_Consultation.store_Medical_Consultation',$id) }}" method="POST">
    @csrf
    <input type="text" name="consultation_text" placeholder="enter consultation_text"><br><br>
    <button type="submit">submit</button>
</form>