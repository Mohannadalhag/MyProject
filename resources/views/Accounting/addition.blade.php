@extends('Layouts.Accounting_master')

@section('sub_title')
  تسجيل العملية المالية
@endsection

@section('content')
  <form action="/action_page.php">
    <label for="type">اختار نوع العملية</label>
      <select id="type" name="type">
        <option value="1">أضافة عملية</option>
      </select>
    <br>
    
    <label for="amount">المبلغ</label>
      <input type="text" id="amount" name="amount" placeholder="ادخل المبلغ"><br>
        <label for="subject">الملاحظات</label><br>
        <textarea id="subject" name="subject" placeholder="اكتب ملاحظاتك"></textarea><br>
      <input type="submit" value="ارسال">
  </form>
@endsection
