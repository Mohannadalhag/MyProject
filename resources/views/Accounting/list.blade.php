@extends('Layouts.Accounting_master')

@section('sub_title')
عرض القوائم المالية
@endsection

@section('content')
<button class="button">عرض قائمة الدخل</button><br>
<button class="button">عرض قائمة المركز المالي</button><br>
<button class="button" onclick="alert('عرض قائمة التدفقات النقدية')">عرض قائمة التدفقات النقدية</button>
@endsection