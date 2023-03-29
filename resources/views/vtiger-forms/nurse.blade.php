@extends("layouts.vtiger")
@section("content")
    <div class="main">
      <div align="center" class="d1">

 <form id="__vtigerWebForm" name="ثبت نام پرستار"  autocomplete="off" method="post" accept-charset="utf-8" enctype="multipart/form-data"> 
          <div style="position:relative;z-index:999999999;display:block;min-width:100%;background-color:white">
            <img src="/img/1.png" class="mimg" title="مرکز مشاور پزشکی ثمین">
           
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
  <div class="tabs">
    <span data-tab-value="#tab_1" id="tab_payeh">اطلاعات پایه</span>
    <span data-tab-value="#tab_2" id="tab_sanad">بارگذاری اسناد</span>
  </div>
  <table class="tab-content">
    <tbody class="tabs__tab active" id="tab_1" data-tab-info>
      <tr>
        <td>
          <label>عکس پرسنلی</label>
        </td>
        
        <td>
         <img src="/img/profile_image/{{$contact->id}}.jpg" width="50px" height="50px" class="image_mobile" >
        </td>
        
      </tr>
      <tr>
        <td>
          <label>نام</label>
        </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe826;</span>
                  </span>
                  <input type="text" per='per' title="نام" name="firstname" data-label="" value="{{ old("firstname",$contact->firstname) }}" required class="i1" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,20}" maxlength="20" size="20">
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
                  <input type="text" per='per' name="lastname" data-label="" value="{{ old("lastname",$contact->lastname) }}" required="" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,40}" maxlength="40">
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
                  <input type="text" name="mobile"  data-label="" value="{{ old("mobile",$contact->mobile) }}" spin="none" inputmode="numeric" required="" maxlength="11" size="11" pattern="09([0-9]{9})" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return checkcode(event);">
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
                  <input id="meli" type="text" readonly name="cf_pcf_irc_1122" data-label="" spin="none" value="{{ old("national_code",$contact->national_code) }}" required maxlength="10" size="10"  inputmode="numeric" pattern="[a-z]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);check();" onkeypress="return checkcode(event);"  oninvalid="setCustomValidity(' لطفا کد ملی را صحیح وارد کنید')>
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
                  <input type="text" name="birthday" data-label="" value="{{ old("bjalali",$contact->bjalali) }}" id="dat" required pattern="(131[6-9]|13[2-7][0-9]|138[0-3])[\/\-]([1-9]|1[0-2])[\/\-]([1-9]|[12][0-9]|3[01])\b"  placeholder="
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
          @php 
          $options =[
            'پرستار',
            'ماما',
            'فوریت پزشکی',
            'کمک بهیار',
            'کارشناس زخم',
            'نمونه گیر آزمایشگاه'
        ];
          @endphp

          <x-select
          name="cf_931"
          label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8"
          :options="$options"
          :value="$contact->cf_931"
          attribute="required"
          />
          {{-- <select name="cf_931" data-label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8" required="">
            <option value=""  selected="" disabled>انتخاب مقدار</option>
            <option value="پرستار">پرستار</option>
            <option value="ماما">ماما</option>
            <option value="فوریت پزشکی">فوریت پزشکی</option>
            <option value="کمک بهیار">کمک بهیار</option>
            <option value="کارشناس زخم">کارشناس زخم</option>
            <option value="نمونه گیر آزمایشگاه">نمونه گیر آزمایشگاه</option>
          </select> --}}
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
                  <input type="text" name="cf_1201"  title="شماره نظام پرستاری" data-label="" value="{{ old("cf_1201",$contact->cf_1201) }}" spin="none" inputmode="numeric" maxlength="20" size="20" placeholder=" " pattern="[0-9]{1,20}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return checkcode(event);">
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
                  <input type="text" name="cf_1032"  data-label="" value="{{ old("cf_1032",$contact->cf_1032) }}" spin="none" maxlength="35" minlength="5" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{5,35}" required="" opt per="per" pernum>
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>وضعیت خدمت سربازی</label>
        </td>
                <td>
                  @php
                  $options = [
                    'معاف',
                    'پایان خدمت',
                    'در حال تحصیل',
                    'غایب',
                    'مشمول',
                    'در حال خدمت',
                  ]
                  @endphp

                  <x-select
                  name="cf_1064"
                  label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AE%D8%AF%D9%85%D8%AA+%D8%B3%D8%B1%D8%A8%D8%A7%D8%B2%DB%8C"
                  :options="$options"
                  :value="$contact->cf_1064"
                  attribute=""
                  />
                  {{-- <select class="v" name="cf_1064" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AE%D8%AF%D9%85%D8%AA+%D8%B3%D8%B1%D8%A8%D8%A7%D8%B2%DB%8C">
                    <option value="">انتخاب مقدار</option>
                    <option value="معاف">معاف</option>
                    <option value="پایان خدمت">پایان خدمت</option>
                    <option value="در حال تحصیل">در حال تحصیل</option>
                    <option value="غایب">غایب</option>
                    <option value="مشمول">مشمول</option>
                    <option value="در حال خدمت">در حال خدمت</option>
                  </select> --}}
                </td>
      </tr>
              <tr>
                <td>
                  <label>وضعیت تاهل</label>
                </td>
                <td>

                  @php
                  $options = [
                    'مجرد',
                    'متاهل',
                    'متارکه',
                    'فوت همسر',
                  ]
                  @endphp
                  <x-select
                  name="cf_1058"
                  label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84"
                  :options="$options"
                  :value="$contact->cf_1058"
                  attribute="required='required'  pattern=''"
                  />

                  {{-- <select name="cf_1058" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84" required="" pattern="">
                    <option value="" selected disabled>انتخاب مقدار</option>
                    <option value="مجرد">مجرد</option>
                    <option value="متاهل">متاهل</option>
                    <option value="متارکه">متارکه</option>
                    <option value="فوت همسر">فوت همسر</option>
                  </select> --}}
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
                  <textarea name="mailingstreet" per='per' pernum required="" minlength="10" maxlength="220" title="آدرس خود را وارد کنید" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,220}">{{ old("cf_1249",$contact->mailingstreet) }}</textarea>
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

          @php
          $options = [
            'شمال',
            'جنوب',
            'شرق',
            'غرب',
            'مرکز',
            'حومه',
            'تمام مناطق',
          ]
          @endphp

          <x-select
          name="cf_1572[]"
          label="label:%D9%85%D9%86%D8%A7%D8%B7%D9%82+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA"
          :options="$options"
          :value="$contact->cf_1572"
          attribute=" multiple=''  required"
          />
          {{-- <select name="cf_1572[]" data-label="label:%D9%85%D9%86%D8%A7%D8%B7%D9%82+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA" required="" multiple="">
            <option value="شمال">شمال</option>
            <option value="جنوب">جنوب</option>
            <option value="شرق">شرق</option>
            <option value="غرب">غرب</option>
            <option value="مرکز">مرکز</option>
            <option value="حومه">حومه</option>
            <option value="تمام مناطق">تمام مناطق</option>
          </select> --}}
                <span class="iii"></span>
        </td>
      </tr>
      <tr>
        <td>
          <label>ساعات فعالیت</label>
        </td>
        <td>
          @php
          $array = array('24',' ','ساعت');
          $saat =  implode($array);
          $options = [
            'صبح',
            'ظهر',
            'عصر',
            'شب',
            'نیمه شب',
           $saat,
            
          ]
          @endphp

          <x-select
          name="cf_1574[]"
          label="label:%D8%B3%D8%A7%D8%B9%D8%A7%D8%AA+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA"
          :options="$options"
          :value="$contact->cf_1574"
          attribute=" multiple=''  required"
          />
          {{-- <select name="cf_1574[]" data-label="label:%D8%B3%D8%A7%D8%B9%D8%A7%D8%AA+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA" required="" multiple="">
            <option value="صبح">صبح</option>
            <option value="ظهر">ظهر</option>
            <option value="عصر">عصر</option>
            <option value="شب">شب</option>
            <option value="نیمه شب">نیمه شب</option>
            <option value="24 ساعت">24 ساعت</option>
          </select> --}}
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
          <textarea name="cf_1066" required="" per='per' pernum  minlength="3" maxLength="420" autocomplete="off" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,420}" draggable="false">{{ old("cf_1066",$contact->cf_1066) }}</textarea>
                  <span class="iii"></span>
       </div>
        </td>
      </tr>
      <tr>
        <td>
          <label>تجربه کاری</label>
        </td>
        <td>
          @php
          $options = [
            'خیلی با تجربه بالای 5 سال',
            'تجربه بالا 3 تا 5 سال',
            'تجربه متوسط 1 تا 3 سال',
            'کم تجربه زیر یکسال',
            'بی تجربه',
          ]
          @endphp

          <x-select
          name="cf_1525"
          label="label:%D8%AA%D8%AC%D8%B1%D8%A8%D9%87+%DA%A9%D8%A7%D8%B1%DB%8C"
          :options="$options"
          :value="$contact->cf_1525"
          attribute="required"
          />

          {{-- <select name="cf_1525" data-label="label:%D8%AA%D8%AC%D8%B1%D8%A8%D9%87+%DA%A9%D8%A7%D8%B1%DB%8C" required="">
            <option value="" selected disabled>انتخاب مقدار</option>
            <option value="خیلی با تجربه بالای 5 سال">خیلی با تجربه بالای 5 سال</option>
            <option value="تجربه بالا 3 تا 5 سال">تجربه بالا 3 تا 5 سال</option>
            <option value="تجربه متوسط 1 تا 3 سال">تجربه متوسط 1 تا 3 سال</option>
            <option value="کم تجربه زیر یکسال">کم تجربه زیر یکسال</option>
            <option value="بی تجربه">بی تجربه</option>
          </select> --}}
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
          <input dir="ltr" type="text" id="credit-card" name="cf_pcf_ccn_1127" data-label="" autocomplete="off" inputmode="numeric" maxlength="19" pattern="[a-z]" value="{{ old("cf_pcf_ccn_1127",$contact->cf_pcf_ccn_1127) }}" placeholder="0000-0000-0000-0000" required="required" oninvalid="setCustomValidity(' لطفا شماره کارت را صحیح وارد کنید') ">
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
          <input type="text" name="cf_1203" data-label="" value="{{ old("cf_1203",$contact->cf_1203) }}" per='per' maxlength="20" placeholder=" ">
        </td>
      </tr>
      <tr>
        <td>
          <label>وسیله نقلیه</label>
        </td>
        <td>
          @php
          $options = [
            'بدون وسیله',
            'موتور',
            'ماشین',
          ]
          @endphp

          <x-select
          name="cf_1809[]"
          label="label:%D9%88%D8%B3%DB%8C%D9%84%D9%87+%D9%86%D9%82%D9%84%DB%8C%D9%87"
          :options="$options"
          :value="$contact->cf_1809"
          attribute="multiple=''  required"
          />
          {{-- <select name="cf_1809[]" data-label="label:%D9%88%D8%B3%DB%8C%D9%84%D9%87+%D9%86%D9%82%D9%84%DB%8C%D9%87" required="" multiple="">
            <option value="بدون وسیله">بدون وسیله</option>
            <option value="موتور">موتور</option>
            <option value="ماشین">ماشین</option>
          </select> --}}
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
                  <textarea name="cf_1249" per='per' pernum required="" minlength="10" maxlength="420" autocomplete="off" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}" draggable="false" placeholder="نام - شماره تماس - نسبت - آدرس">{{ old("cf_1249",$contact->cf_1249) }}</textarea>
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
                  <textarea name="cf_1251" per='per' pernum required="" minLength="10" maxLength="420" autocomplete="off" placeholder="نام - شماره تماس - نسبت - آدرس" pattern="[0-9\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}">{{ old("cf_1251",$contact->cf_1251) }}</textarea>
                  <label for="cf_1251" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                  <span class="iii"></span>
</div>
                </td>
      </tr>
                  <tr>
                <td>
                  @php
                  $options = [
                    'بلی',
                    'خیر',
                  ]
                  @endphp
                     <x-select
                     name="cf_1279"
                     label="label:%D9%81%D8%B1%D9%85+%D8%A2%D9%86%D9%84%D8%A7%DB%8C%D9%86+%D8%A7%D8%B2+%D8%B3%D8%A7%DB%8C%D8%AA%D8%9F"
                     :options="$options"
                     :value="$contact->cf_1279"
                     attribute="hidden"
                     />
                  {{-- <select name="cf_1279" data-label="label:%D9%81%D8%B1%D9%85+%D8%A2%D9%86%D9%84%D8%A7%DB%8C%D9%86+%D8%A7%D8%B2+%D8%B3%D8%A7%DB%8C%D8%AA%D8%9F" hidden="">
                    <option value="">انتخاب مقدار</option>
                    <option value="بلی" selected="">بلی</option>
                    <option value="خیر">خیر</option>
                  </select> --}}
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
              <input type="submit" value="تایید اطلاعات">
              </td>
            </tr>
            <tr>
              <input type="hidden" id="captchaUrl" value="https://my-saminnurses.ir/modules/Settings/Webforms/actions/CheckCaptcha.php">
              <input type="hidden" id="recaptcha_validation_value">
              <td>
             
              </td>
             
            </tr>
  </tbody>

</form>
</table>




<table class="tab-content">
  <tbody class="tabs__tab" id="tab_2" data-tab-info>
    @include('vtiger-forms._partials._documentNurse')
  </tbody>
</table>

<div id="snackbar"></div>
@include('vtiger-forms._partials._modal')
</div>   
    </div>
        <script type="text/javascript" src="/scripts/persianDatepicker.js"></script>
    <script type="text/javascript" src="/scripts/jquery.farsiInput.js"></script>
    <script type="text/javascript" src="/scripts/b.js"></script>
    <script type="text/javascript" src="/scripts/a.js"></script>
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
<script>
  $("document").ready(()=>{
    
   
    $("#__vtigerWebForm").submit((e)=>{
    
      $('#myModal').css('display','block');
      $('#__vtigerWebForm').prop("disabled",true);
      let data = $("#__vtigerWebForm").serialize();
      console.log(data);
      $.post("/client/update",data).then(res => {
         console.log(res);
        if(res.success){
           snack("! ویرایش با موفقیت  صورت گرفت" ,"darkgreen");
        }
        else{
          snack(" no متاسفانه خطایی رخ داد ، مجدد سعی کنید","tomato");
        }
      })
      .catch(error=>{
        console.log(error);
        snack("متاسفانه خطایی رخ داد ، مجدد سعی کنید","tomato");
      })
      .then(()=>{

        $('#myModal').css('display','none');
        $('#__vtigerWebForm').prop("disabled",false);
      });

      return false;
      
    })

    $("#upload_nurse_asnad").submit((e)=>{
    $('#upload_nurse_asnad').prop("disabled",true);

      let fname = $('#file_upload')[0].files;

      var e = document.getElementById("select_asnad");
      var value = e.value;
    var textt = document.getElementById('select_asnad').selectedOptions[0].text;
      
     let func = value=="personal_image"? "/testuploadprofile" : "/createDocument";

     document.getElementById("upload_nurse_asnad").action = func;
     $('#myModal').css('display','block');
    
     $.ajax({
            url: func,
            method: 'POST',
            data: new FormData($("#upload_nurse_asnad")[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
              $('#myModal').css('display','none');
              snack(textt +" با موفقیت بارگذاری شد   !" ,"seagreen");
              
            
              document.getElementById('select_asnad').selectedOptions[0].classList.add("selected_option");
              document.getElementById('select_asnad').selectedIndex = 0;
              
              document.getElementById("file_upload").value  ="";
              
              document.getElementById("div").classList.remove('d-none');
              document.getElementById("div").classList.add('d-block'); 
             
              if(!document.getElementById("div").textContent.includes(textt)){
                document.getElementById("div").classList.remove('d-none');
                document.getElementById("div").classList.add('d-block');
                document.getElementById("div").innerHTML += "<br>" + textt;
              }

            },
            error: function(response) {
              snack("متاسفانه در ارسال سند خطایی رخ داد، مجدد سعی کنید","tomato");
              // document.getElementById("div").innerHTML += " <div class='alert alert-success' role='alert'>  متاسفانه خطایی رخ داد ! </div>"
              $('#myModal').css('display','none');
            }
            
        });
        return false;    
        
    }); 
    
    return false; 


  })

  </script>
@endsection