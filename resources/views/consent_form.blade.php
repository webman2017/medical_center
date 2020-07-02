<!DOCTYPE html>
<html>
<head>
   <title>ลงทะเบียนผู้ป่วย</title>
   <link rel="stylesheet" href="http://localhost/blog/public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="http://localhost/blog/public/stylesheet.css">

   <style>
      @font-face{
       font-family:  'THSarabunNew';
       font-style: normal;
       font-weight: normal;
       src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
    }
    @font-face{
      font-family:  'THSarabunNew_b';
      font-style: normal;
      font-weight: bold;
      src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
   }
   @font-face{
    font-family:  'THSarabunNew';
    font-style: italic;
    font-weight: normal;
    src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
 }
 @font-face{
    font-family:  'THSarabunNew';
    font-style: italic;
    font-weight: bold;
    src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
 }
 body{
    font-family: "THSarabunNew";
    font-size: 16px;

 }


 .txt-h{
   font-family: THSarabunNew;
   font-size: 22px;
   font-weight: bold;
}
.txt-xm{
   font-family: THSarabunNew;
   font-size: 17px;
}


@page {
   size: A4;
   padding: 15px;
}
@media print {
   html, body {
     width: 210mm;
     height: 297mm;
     /*font-size : 16px;*/
  }
}
</style>

<div class="container">
   <div class="txt-h">
    ใบยินยอมเข้ารับการรักษา
 </div>
 <div class="row">
   <div style="float: left;">
      fsdssds
   </div>
   <div style="float: left;">
      วันเดือน ปี
   </div>
</div>

<div class="txt-xm">
   ข้าพเจ้า ( ) นาย/นาง/นางสาว {{$users[0]['firstname']}}
</div>
<div>
</div>
<div class="txt-xm">
   ยินยอมให้แพทย์และเจ้าหน้าที่ทีมสุขภาพท่าการรักษาพยาบาล โดยข้าพเจ้ายอมรับผลที่จะเกิดขึ้นจากการรักษานั้น ทั้งนี้ข้าพเจ้า
   ได้รับข้อมูลและการอธิบายให้ทราบถึง
</div>

<div class="txt-xm">
   ทั้งนี้ข้าพเจ้า เข้าใจถึงความจ่าเป็นอันเป็นเหตุให้ต้องรับการตรวจวินิจฉัย รักษาหรือผ่าตัดในโรงพยาบาลบ้านหลวง ข้าพเจ้า
   ยินยอมให้แพทย์และผู้ได้รับการมอบหมายสามารถกระท่าการดังกล่าวข้างต้น โดยค่านึงถึงมาตรฐานวิชาชีพ ในกรณีที่มีการเปลี่ยนแปลงของ
   การตรวจวินิจฉัยหรือแผนการรักษา ข้าพเจ้ามีสิทธิ์ที่จะได้รับค่าอธิบายเพิ่มเติมและข้าพเจ้ามีสิทธิ์ที่จะถอนตัวจากการรักษาพยาบาลโดยไม่
   ส่งผลกระทบต่อสิทธิ์ในการขอรับการตรวจรักษาในครั้งต่อไปของข้าพเจ้า จึงลงลายมือหรือพิมพ์ลายนิ้วมือไว้เป็นหลักฐาน
</div>
<!-- <button class="btn btn-primary">พิมพ์</button> -->
</div>
<div>
</div>