<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/persianDatepicker-default.css" />
    <link rel="stylesheet" href="./css/formn.css" />
    <title>فرم استخدام مرکز پرستاری ثمین</title>
    <style></style>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="main">
      <div align="center" class="d1">

 <form id="__vtigerWebForm" name="ثبت نام مراقب" action="https://my-saminnurses.ir/modules/Webforms/capture.php" autocomplete="off" method="post" accept-charset="utf-8" enctype="multipart/form-data"> 


          <div style="position:relative;z-index:999999999;display:block;min-width:100%;background-color:white">
            <img src="./img/1.png" class="mimg" title="مرکز مشاور پزشکی ثمین">

            <div class="container">
              <div class="text" style="">
                <p style="font-size: 20px;margin-bottom:0;"> فرم عضویت پرستار </p>
                <p style="font-size:16px;margin-bottom:2px;">فرم به دقت تکمیل گردد</p>
                <p style="font-size: 16px;font-weight:bold;">زمان مورد نیاز 10 دقیقه</p>
              </div>
              <!-- text-align:left;margin-right:5%; -->
              <div class="ttt">
                <p style="">
                  <a href="Tel: 02179215">02179215</a>
                </p>
                <p style="">
                  <a href="https://saminplus.com">saminplus.com</a>
                </p>
              </div>
            </div>
          </div>
  <input type="hidden" name="__vtrftk" value="sid:e9b29706489aad76be5f30d299b46ed3b5e5e98e,1670076077">
  <input type="hidden" name="publicid" value="b12a38f4dc72e41b3a07b50a2abc30e8">
  <input type="hidden" name="urlencodeenable" value="1">
  <input type="hidden" name="name" value="استخدام پرستار">
  <table>
    <tbody>
      <tr>
        <td>
          <label>نام</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe826;</span>
                  </span>
                  <input type="text" per='per' title="نام" name="firstname" data-label="" value="" required class="i1" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,20}" maxlength="20" size="20">
                  <label for="firstname" class="hide"> لطفا نام خود را با حروف فارسی تایپ کنید. </label>
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>نام خانوادگی</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon" style="padding:13px 11px;">&#xf064</span>
                  </span>
                  <input type="text" per='per' name="lastname" data-label="" value="" required="" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,40}" maxlength="40">
                  <label for="lastname" class="hide"> لطفا نام خود را با حروف فارسی تایپ کنید. </label>
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>شماره موبایل</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon" style="padding:13px 16px;">&#xe86f;</span>
                  </span>
                  <input type="text" name="mobile"  data-label="" value="" spin="none" inputmode="numeric" required="" maxlength="11" size="11" pattern="09([0-9]{9})" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return checkcode(event);">
                  <label for="mobile" class="hide"> لطفا شماره موبایل خود را وارد کنید مثال: 09191234567 </label>
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>کد ملی</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon fixicon">&#xf2bc;</span>
                  </span>
                  <input id="meli" type="text" name="cf_pcf_irc_1122" data-label="" spin="none" value="" required maxlength="10" size="10" inputmode="numeric" pattern="[a-z]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);check();" onkeypress="return checkcode(event);">
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>تاریخ تولد</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe85b</span>
                  </span>
                  <input type="text" name="birthday" data-label="" value="" id="dat" required pattern="(131[6-9]|13[2-7][0-9]|138[0-3])[\/\-]([1-9]|1[0-2])[\/\-]([1-9]|[12][0-9]|3[01])\b"  placeholder="
روز / ماه / سال
 - حداقل سن 18 و حداکثر 85 سال
">
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
                  <td>
          <label>رشته فعالیت</label>
        </td>
        <td>
          <select name="cf_931" data-label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8" required="">
            <option value=""  selected="" disabled>انتخاب مقدار</option>
            <option value="پرستار">پرستار</option>
            <option value="ماما">ماما</option>
            <option value="فوریت پزشکی">فوریت پزشکی</option>
            <option value="کمک بهیار">کمک بهیار</option>
            <option value="کارشناس زخم">کارشناس زخم</option>
            <option value="نمونه گیر آزمایشگاه">نمونه گیر آزمایشگاه</option>
          </select>
                            <span class="iii"></span>
        </td>
      </tr>
      <tr>

        <td>
          <label id="jq">شماره نظام پرستاری</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon fas">&#xe867;</span>
                  </span>
                  <input type="text" name="cf_1201"  title="شماره نظام پرستاری" data-label="" value="" spin="none" inputmode="numeric" maxlength="20" size="20" placeholder=" " pattern="[0-9]{1,20}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return checkcode(event);">
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>محل و رشته تحصیلی</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon fas">&#xe80e;</span>
                  </span>
                  <input type="text" name="cf_1032"  data-label="" value="" spin="none" maxlength="35" minlength="5" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{5,35}" required="" opt per="per" pernum>
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>وضعیت خدمت سربازی</label>
        </td>
                <td>
                  <select class="v" name="cf_1064" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AE%D8%AF%D9%85%D8%AA+%D8%B3%D8%B1%D8%A8%D8%A7%D8%B2%DB%8C">
                    <option value="">انتخاب مقدار</option>
                    <option value="معاف">معاف</option>
                    <option value="پایان خدمت">پایان خدمت</option>
                    <option value="در حال تحصیل">در حال تحصیل</option>
                    <option value="غایب">غایب</option>
                    <option value="مشمول">مشمول</option>
                    <option value="در حال خدمت">در حال خدمت</option>
                  </select>
                </td>
      </tr>
              <tr>
                <td>
                  <label>وضعیت تاهل</label>
                </td>
                <td>
                  <select name="cf_1058" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84" required="" pattern="">
                    <option value="" selected disabled>انتخاب مقدار</option>
                    <option value="مجرد">مجرد</option>
                    <option value="متاهل">متاهل</option>
                    <option value="متارکه">متارکه</option>
                    <option value="فوت همسر">فوت همسر</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
      <tr>
        <td>
          <label>آدرس</label>
        </td>
                <td>
                 <div style="position:relative;">
                  <span class="itxt">&#xe80c;</span>
                  <textarea name="mailingstreet" per='per' pernum required="" minlength="10" maxlength="220" title="آدرس خود را وارد کنید" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,220}"></textarea>
                  <label for="mailingstreet" class="hide"> آدرس دقیق پستی خود را وارد کنید </label>
                  <span class="iii"></span>
                 </div>
                </td>
      </tr>


      <tr>
        <td>
          <label>مناطق فعالیت</label>
        </td>
        <td>  
          <select name="cf_1572[]" data-label="label:%D9%85%D9%86%D8%A7%D8%B7%D9%82+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA" required="" multiple="">
            <option value="شمال">شمال</option>
            <option value="جنوب">جنوب</option>
            <option value="شرق">شرق</option>
            <option value="غرب">غرب</option>
            <option value="مرکز">مرکز</option>
            <option value="حومه">حومه</option>
            <option value="تمام مناطق">تمام مناطق</option>
          </select>
                <span class="iii"></span>
        </td>
      </tr>
      <tr>
        <td>
          <label>ساعات فعالیت</label>
        </td>
        <td>
          <select name="cf_1574[]" data-label="label:%D8%B3%D8%A7%D8%B9%D8%A7%D8%AA+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA" required="" multiple="">
            <option value="صبح">صبح</option>
            <option value="ظهر">ظهر</option>
            <option value="عصر">عصر</option>
            <option value="شب">شب</option>
            <option value="نیمه شب">نیمه شب</option>
            <option value="24 ساعت">24 ساعت</option>
          </select>
                  <span class="iii"></span>
        </td>
      </tr>
      <tr>
        <td>
          <label>سوابق کاری</label>
        </td>
        <td>
                 <div style="position:relative;">
                  <span class="itxt">&#xf0f6;</span>
          <textarea name="cf_1066" required="" per='per' pernum  minlength="3" maxLength="420" autocomplete="off" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,420}" draggable="false"></textarea>
                  <span class="iii"></span>
       </div>
        </td>
      </tr>
      <tr>
        <td>
          <label>تجربه کاری</label>
        </td>
        <td>
          <select name="cf_1525" data-label="label:%D8%AA%D8%AC%D8%B1%D8%A8%D9%87+%DA%A9%D8%A7%D8%B1%DB%8C" required="">
            <option value="" selected disabled>انتخاب مقدار</option>
            <option value="خیلی با تجربه بالای 5 سال">خیلی با تجربه بالای 5 سال</option>
            <option value="تجربه بالا 3 تا 5 سال">تجربه بالا 3 تا 5 سال</option>
            <option value="تجربه متوسط 1 تا 3 سال">تجربه متوسط 1 تا 3 سال</option>
            <option value="کم تجربه زیر یکسال">کم تجربه زیر یکسال</option>
            <option value="بی تجربه">بی تجربه</option>
          </select>
                  <span class="iii"></span>
        </td>
      </tr>
              <tr>
                <td>
                  <label>شماره کارت بانکی</label>
                </td>
                <td>
                  <span class="i">
                    <span id="beforecard" class="icon fixicon">&#xe85d;</span>
                  </span>
                  <input dir="ltr" type="text" id="credit-card" name="cf_pcf_ccn_1127" data-label="" autocomplete="off" inputmode="numeric" maxlength="19" pattern="[a-z]" value="" placeholder="0000-0000-0000-0000" required="">
                  <span class="iii"></span>
                </td>
              </tr>
      <tr>
        <td>

          <label>زبان های خارجی دیگر که میدانید</label>
        </td>
        <td>
                  <span class="i">
                    <span id="beforecard" class="icon">&#xe870;</span>
                  </span>
          <input type="text" name="cf_1203" data-label="" value="" per='per' maxlength="20" placeholder=" ">
        </td>
      </tr>
      <tr>
        <td>
          <label>وسیله نقلیه</label>
        </td>
        <td>
          <select name="cf_1809[]" data-label="label:%D9%88%D8%B3%DB%8C%D9%84%D9%87+%D9%86%D9%82%D9%84%DB%8C%D9%87" required="" multiple="">
            <option value="بدون وسیله">بدون وسیله</option>
            <option value="موتور">موتور</option>
            <option value="ماشین">ماشین</option>
          </select>
                  <span class="iii"></span>
        </td>
      </tr>
      <tr>
        <td>
          <label>مشخصات معرف اول</label>
        </td>
                 <td>
                 <div style="position:relative">
                  <span class="itxt">&#xf2c0;</span>
                  <textarea name="cf_1249" per='per' pernum required="" minlength="10" maxlength="420" autocomplete="off" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}" draggable="false" placeholder="نام - شماره تماس - نسبت - آدرس"></textarea>
                  <label for="cf_1249" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                  <span class="iii"></span>
</div>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات معرف دوم</label>
                </td>
                <td>
                 <div style="position:relative">
                  <span class="itxt">&#xf2c0;</span>
                  <textarea name="cf_1251" per='per' pernum required="" minLength="10" maxLength="420" autocomplete="off" placeholder="نام - شماره تماس - نسبت - آدرس" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}"></textarea>
                  <label for="cf_1251" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                  <span class="iii"></span>
</div>
                </td>
      </tr>
                  <tr>
                <td><select name="cf_1279" data-label="label:%D9%81%D8%B1%D9%85+%D8%A2%D9%86%D9%84%D8%A7%DB%8C%D9%86+%D8%A7%D8%B2+%D8%B3%D8%A7%DB%8C%D8%AA%D8%9F" hidden=""><option value="">انتخاب مقدار</option><option value="بلی" selected="">بلی</option><option value="خیر">خیر</option></select></td>
            </tr>
        <tr>
        <td>
          <label>تصویر کارت ملی</label>
        </td>
        <td>
                  <span class="i">
                    <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
                  </span>
          <input type="file" name="file_8_1" class="file" required="" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
                  <span class="iii"></span>
                  <p class="ftxt" style="line-height:20px;font-size:11px;padding:3px 20px 2px 0;color:black;">
حجم مجاز 150 کیلو بایت | فایل های مجاز 
(.jpg .gif .png) | 
 
<a href="https://b2n.ir/pic-comp" target="_blank" style="color:red;">برای کم کردن حجم عکس کلیک کنید</a>
</p>
        </td>
      </tr>    
            <tr>
        <td>
          <label>تصویر مدرک تحصیلی</label>
        </td>
        <td>
                  <span class="i">
                    <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
                  </span>
          <input type="file" name="file_8_2" required="" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
                  <span class="iii"></span>
                  <p class="ftxt" style="line-height:20px;font-size:11px;padding:3px 20px 2px 0;color:black;">
حجم مجاز 150 کیلو بایت | فایل های مجاز 
(.jpg .gif .png) | 
 
<a href="https://b2n.ir/pic-comp" target="_blank" style="color:red;">برای کم کردن حجم عکس کلیک کنید</a>
</p>
        </td>
      </tr>
              <tr>
                <td>
                 <!--  <label></label> -->
                </td>
                <td>
                  <div class="chk">
                  <input type="checkbox" name="" data-label="" value="0" required="">
                  <span>صحت کلیه اطلاعات را تایید می نمایم.</span>
</div>
                </td>
              </tr>
    </tbody>
  </table>
          <input type="submit" value="تایید اطلاعات">
      </div>
      </form>
    </div>
        <script type="text/javascript" src="./scripts/persianDatepicker.js"></script>
    <script type="text/javascript" src="./scripts/jquery.farsiInput.js"></script>
    <script type="text/javascript" src="./scripts/b.js"></script>
    <script type="text/javascript" src="./scripts/a.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("button").on("click",function(e){
var prevUp = document.getElementById("ftxt");
if(prevUp){prevUp.removeAttribute("id");}
var td = $(this).closest('td');
var upInput = td.find($(":file"));
var pfile = td.find($("p"));
pfile.attr("id","ftxt");
upInput.focus();
upInput.click();
return false;
})


$("input[type=file]").change(function(e){
      var inputElems = this;
      var totalFileSize = 0;
        if (inputElems.type.toLowerCase() === "file") {
          var file = inputElems.files[0];
          if (typeof file !== "undefined") {
          var totalFileSize = totalFileSize + file.size;
        }
      }
 //    209920 if (totalFileSize > 52428800) {
 //       if (totalFileSize > 155648) { 
       if (totalFileSize > 155648) {         
        this.value = "";
        var Ftxt = document.getElementById("ftxt");
//        var Ftext = Ftxt.innerHTML;
var Ftext = decodeS("%D8%AD%D8%AC%D9%85%20%D9%85%D8%AC%D8%A7%D8%B2%20150%20%DA%A9%DB%8C%D9%84%D9%88%20%D8%A8%D8%A7%DB%8C%D8%AA%20%7C%20%D9%81%D8%A7%DB%8C%D9%84%20%D9%87%D8%A7%DB%8C%20%D9%85%D8%AC%D8%A7%D8%B2%20(.jpg%20.gif%20.png)%20%7C%20%3Ca%20href%3D%22https%3A%2F%2Fb2n.ir%2Fpic-comp%22%20target%3D%22_blank%22%20style%3D%22color%3Ared%3B%22%3E%D8%A8%D8%B1%D8%A7%DB%8C%20%DA%A9%D9%85%20%DA%A9%D8%B1%D8%AF%D9%86%20%D8%AD%D8%AC%D9%85%20%D8%B9%DA%A9%D8%B3%20%DA%A9%D9%84%DB%8C%DA%A9%20%DA%A9%D9%86%DB%8C%D8%AF%3C%2Fa%3E");
$("#ftxt").stop(true,true);
var current_height = $('#ftxt').height();
// $("#ftxt").show(100);

$("#ftxt").fadeOut(400, function() {
    $(this).css("color","red");
$(this).html("حجم فایل بیش از حد مجاز 150 کیلوبایت می باشد").fadeIn(300).css("min-height", current_height);

})


setTimeout(function(){

if(Ftext !== Ftxt.innerHTML){
$("#ftxt").stop(true,true).delay(1000);
$("#ftxt").delay(1000).fadeOut(800, function() {
    $(this).css("color","black");
    $(this).html(Ftext).fadeIn(800);
});
}

},450)

// document.getElementById("ftxt").removeAttribute("id"); 
        return false;
      }
 })





/* */
 var hi = $("[name='cf_1201']").parent(0).parent();
hi.hide();

  $("[name='cf_931']").change(function(e){


$("[name='cf_1201']").val("");
var fieldVisible = ($("[name='cf_1201']").is(":visible"));
if((e.target[1].selected || e.target[2].selected) && !fieldVisible ){
$("[name='cf_1201']").attr("required","");
$("[name='cf_1201']").parent().hide().fadeIn( 500 );
$("#jq").hide().fadeIn( 300 );
$("#jq").first().hide().fadeIn( 500 );
$("[name='cf_1201']").hide().slideDown( 700 );
$(hi).hide(1000).fadeIn( 900 ).show(1000);
}else if((!e.target[1].selected && !e.target[2].selected) && fieldVisible){
$("[name='cf_1201']").parent().show().fadeOut( 500 );
$("#jq").show().fadeOut( 500 );
$("[name='cf_1201']").show().slideUp( 900 );
$(hi).hide(2000);$("[name='cf_1201']").removeAttr("required");}else{}
})


})


function decodeS(S){

return(decodeURIComponent(S));

}



</script>
  </body>
</html>