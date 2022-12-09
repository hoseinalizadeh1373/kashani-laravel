@extends("vtiger-forms.layout")
@section("content")

<div class="main">
      <div align="center" class="d1">
<!--
        <form id="__vtigerWebForm" name="ثبت نام مراقب" action="https://my-saminnurses.ir/modules/Webforms/capture.php" autocomplete="off" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <form id="__vtigerWebForm" name="ثبت نام مراقب" action="https://www.google.com" autocomplete="off" method="get" accept-charset="utf-8" enctype="multipart/form-data">
-->
           <form id="__vtigerWebForm" name="ثبت نام مراقب" action="/register" autocomplete="off" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div style="position:relative;z-index:999999999;display:block;min-width:100%;background-color:white">
            <img src="./img/1.png" class="mimg">

            <div class="container">
              <div class="text" style="">
                <p style="font-size: 20px;margin-bottom:0;"> فرم استخدام مراقب </p>
                <p style="font-size:16px;margin-bottom:2px;">فرم به دقت تکمیل گردد</p>
                <p style="font-size: 16px;font-weight:bold;">زمان مورد نیاز 10 دقیقه</p>
              </div>
              <!-- text-align:left;margin-right:5%; -->
              <div class="ttt">
                <p style="">
                  <a href="Tel: 02179215">Tel: 02179215</a>
                </p>
                <p style="">
                  <a href="https://saminplus.com">saminplus.com</a>
                </p>
              </div>
            </div>
          </div>
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
                  <input type="text" per='per' name="firstname" data-label="" value="" required class="i1" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,20}" maxlength="20" size="20">
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
                  <label>نام پدر</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon" style="padding:13px 11px;">&#xf064</span>
                  </span>
                  <input type="text" name="cf_1036" data-label="" value="" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,20}" maxlength="20" minlength="2" per='per' required="">
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>شماره موبایل</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon" style="padding:13px 16px;">&#xe86f</span>
                  </span>
                  <input type="text" name="mobile"  data-label="" value="" spin="none" inputmode="numeric" required="" maxlength="11" size="11" pattern="09([0-9]{9})" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return checkcode(event);">
                  <label for="mobile" class="hide"> لطفا شماره موبایل خود را وارد کنید مثال: 09191234567 </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>تلفن</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon fas">&#xe811</span>
                  </span>
                  <input type="tel" name="otherphone"  data-label="" value="" spin="none" maxlength="10" inputmode="numeric" pattern="[0-9]{5,10}" required onkeydown="return checkcode(event);">
                  <span class="iii"></span>
                </td>
              </tr>
              <!--
      <tr><td><select name="cf_931" data-label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8" required="" hidden="" required><option value="">انتخاب مقدار</option><option value="مشترک">مشترک</option><option value="مددجو">مددجو</option><option value="مراقب" selected="">مراقب</option><option value="مشترک سازمانی">مشترک سازمانی</option><option value="پرستار">پرستار</option><option value="کارشناس مرکز">کارشناس مرکز</option><option value="رقیب">رقیب</option><option value="بازاریاب">بازاریاب</option><option value="فروشنده">فروشنده</option><option value="سرمایه گذار">سرمایه گذار</option><option value="همکار">همکار</option><option value="مطبوعات">مطبوعات</option><option value="توزیع کننده">توزیع کننده</option><option value="تولید کننده">تولید کننده</option><option value="سایر">سایر</option><option value="کمک بهیار">کمک بهیار</option><option value="فوریت پزشکی">فوریت پزشکی</option><option value="کارمند اداری">کارمند اداری</option><option value="کارجو">کارجو</option><option value="تامین کننده">تامین کننده</option><option value="وارد کننده">وارد کننده</option><option value="پزشک عمومی">پزشک عمومی</option><option value="پزشک متخصص">پزشک متخصص</option><option value="کارشناس بیهوشی">کارشناس بیهوشی</option><option value="وکیل">وکیل</option><option value="کاردرمان">کاردرمان</option><option value="گفتار درمان">گفتار درمان</option><option value="فیزیوتراپ">فیزیوتراپ</option><option value="کارشناس زخم">کارشناس زخم</option><option value="ماساژور">ماساژور</option><option value="رادیولوژیست">رادیولوژیست</option><option value="نمونه گیر آزمایشگاه">نمونه گیر آزمایشگاه</option><option value="ماما">ماما</option><option value="روانشناس">روانشناس</option></select></td></tr>
-->
              <tr>
                <td>
                  <label>تاریخ تولد</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe85b</span>
                  </span>
                  <input type="text" name="birthday" data-label="" value="" id="dat" required pattern="(131[6-9]|13[2-7][0-9]|138[0-3])[\/\-]([1-9]|1[0-2])[\/\-]([1-9]|[12][0-9]|3[01])\b" placeholder="
روز / ماه / سال
 - حداقل سن 18 و حداکثر 85 سال
" onfocus="return datechange()">
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>محل تولد</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon fixicon">&#xe80d</span>
                  </span>
                  <input type="text" per='per' name="cf_1042" data-label="" value="" required pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,40}" maxlength="40">
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>کد ملی</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon fixicon">&#xf2bc</span>
                  </span>
                  <input id="meli" type="text" name="cf_pcf_irc_1122" data-label="" spin="none" value="" required maxlength="10" size="10" inputmode="numeric" pattern="[a-z]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);check();" onkeypress="return checkcode(event);">
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>شماره شناسنامه</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xf0db</span>
                  </span>
                  <input type="tel" name="cf_1038"  data-label="" value="" spin="none" inputmode="numeric" minlength="1" maxlength="10" pattern="[0-9]{1,10}" required>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>شماره کارت بانکی</label>
                </td>
                <td>
                  <span class="i">
                    <span id="beforecard" class="icon fixicon">&#xe85d</span>
                  </span>
                  <input dir="ltr" type="text" id="credit-card" name="cf_pcf_ccn_1127" data-label="" autocomplete="off" inputmode="numeric" maxlength="19" pattern="[a-z]" value="" placeholder="0000-0000-0000-0000" required="required">
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>وضعیت تاهل</label>
                </td>
                <td>
                  <select name="cf_1058" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84" required="required" pattern="">
                    <option value="">انتخاب مقدار</option>
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
                  <label>تعداد فرزندان</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe801</span>
                  </span>
                  <input type="number"  name="cf_1062" data-label="" value="" min="0" max="20" inputmode="numeric" pattern="[0-9]{0,20}" required="required">
                  <label for="cf_1062" class="hide"> عدد مجاز بین 0 الی 20 می باشد. </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>وضعیت خدمت سربازی</label>
                </td>
                <td>
                  <select name="cf_1064" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AE%D8%AF%D9%85%D8%AA+%D8%B3%D8%B1%D8%A8%D8%A7%D8%B2%DB%8C">
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
                  <label>وزن مراقب</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe876</span>
                  </span>
                  <input type="number" name="cf_1225"  data-label="" value="" pattern="[0-9]" required="" min="50" max="120" inputmode="numeric">
                  <label for="cf_1225" class="hide"> وزن بین 50 الی 120 </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>قد مراقب</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe875</span>
                  </span>
                  <input type="number" name="cf_1221" data-label="" pattern="[0-9]{1,3}" value="" required="" min="130" max="210">
                  <label for="cf_1225" class="hide"> قد بین 130 الی 210 سانتی متر </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>آخرین مدرک تحصیلی</label>
                </td>
                <td>
                  <select name="cf_1030"  data-label="label:%D8%A2%D8%AE%D8%B1%DB%8C%D9%86+%D9%85%D8%AF%D8%B1%DA%A9+%D8%AA%D8%AD%D8%B5%DB%8C%D9%84%DB%8C" required="">
                    <option value="">انتخاب مقدار</option>
                    <option value="بیسواد">بیسواد</option>
                    <option value="ابتدایی">ابتدایی</option>
                    <option value="سیکل">سیکل</option>
                    <option value="دیپلم">دیپلم</option>
                    <option value="کاردانی">کاردانی</option>
                    <option value="کارشناسی">کارشناسی</option>
                    <option value="کارشناس ارشد">کارشناس ارشد</option>
                    <option value="دکترا">دکترا</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>سابقه محکومیت کیفری</label>
                </td>
                <td>
                  <select name="cf_1205" data-label="label:%D8%B3%D8%A7%D8%A8%D9%82%D9%87+%D9%85%D8%AD%DA%A9%D9%88%D9%85%DB%8C%D8%AA+%DA%A9%DB%8C%D9%81%D8%B1%DB%8C" required="required">
                    <option value="">انتخاب مقدار</option>
                    <option value="دارم">دارم</option>
                    <option value="ندارم">ندارم</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>محدوده فعالیت</label>
                </td>
                <td>
                  <select name="cf_1193[]" data-label="label:%D9%85%D8%AD%D8%AF%D9%88%D8%AF%D9%87+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA" multiple="" required>
                    <option value="شمال">شمال</option>
                    <option value="جنوب">جنوب</option>
                    <option value="مرکز">مرکز</option>
                    <option value="شرق">شرق</option>
                    <option value="غرب">غرب</option>
                    <option value="حومه">حومه</option>
                    <option value="تمامی مناطق">تمامی مناطق</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>زندگی با</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe86c</span>
                  </span>
                  <input type="text" per='per' name="cf_1247" data-label="" value="" maxlength="40" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,40}" required>
                  <label for="cf_1247" class="hide"> تنها - با همسر - خانواده </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>ملیت</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe807</span>
                  </span>
                  <input type="text" name="cf_1048" per='per' data-label="" value="" maxlength="20" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,20}" required>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>زبان و گویش</label>
                </td>
                <td>
                  <select name="cf_1529[]" data-label="label:%D8%B2%D8%A8%D8%A7%D9%86+%D9%88+%DA%AF%D9%88%DB%8C%D8%B4" multiple="" required>
                    <option value="پارسی">پارسی</option>
                    <option value="ترکی">ترکی</option>
                    <option value="کردی">کردی</option>
                    <option value="گیلکی">گیلکی</option>
                    <option value="مازنی">مازنی</option>
                    <option value="لری">لری</option>
                    <option value="لکی">لکی</option>
                    <option value="عربی">عربی</option>
                    <option value="بلوچی">بلوچی</option>
                    <option value="ترکمن">ترکمن</option>
                    <option value="دری">دری</option>
                    <option value="پشتو">پشتو</option>
                    <option value="ارمنی">ارمنی</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>دین</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon im">
                      <img src="./img/iconm.png" class="ic">
                    </span>
                  </span>
                  <input type="text" name="cf_1050" data-label="" per='per' value="" maxlength="20" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,20}" required>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مذهب</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon im">
                      <img src="./img/prayer.png" class="ic" style="width:31px;height:33px;margin-top:-5px;margin-right:-2px;">
                    </span>
                  </span>
                  <input type="text" name="cf_1052" data-label="" per='per' maxlength="20" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,20}" value="" required>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>شیفت خدمات</label>
                </td>
                <td>
                  <select name="cf_1195[]" data-label="label:%D8%B4%DB%8C%D9%81%D8%AA+%D8%AE%D8%AF%D9%85%D8%A7%D8%AA" multiple="" required>
                    <option value="روزانه">روزانه</option>
                    <option value="شبانه">شبانه</option>
                    <option value="شبانه روزی">شبانه روزی</option>
                    <option value="مقطعی">مقطعی</option>
                    <option value="بیمارستان">بیمارستان</option>
                    <option value="منزل">منزل</option>
                    <option value="موردی">موردی</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>خدمات مراقبت</label>
                </td>
                <td>
                  <select name="cf_1197[]" data-label="label:%D8%AE%D8%AF%D9%85%D8%A7%D8%AA+%D9%85%D8%B1%D8%A7%D9%82%D8%A8%D8%AA" multiple="" required>
                    <option value="سالمند لگنی">سالمند لگنی</option>
                    <option value="سالمند پوشکی">سالمند پوشکی</option>
                    <option value="آلزایمر">آلزایمر</option>
                    <option value="سالمند سالم">سالمند سالم</option>
                    <option value="کودک">کودک</option>
                    <option value="بهیار">بهیار</option>
                    <option value="کمک بهیار">کمک بهیار</option>
                    <option value="کودک دوقولو">کودک دوقولو</option>
                    <option value="امور منزل">امور منزل</option>
                    <option value="تمامی موارد">تمامی موارد</option>
                    <option value="پرستار">پرستار</option>
                    <option value="پرستار ویژه">پرستار ویژه</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>استعمال دخانیت</label>
                </td>
                <td>
                  <select name="cf_1255" data-label="label:%D8%A7%D8%B3%D8%AA%D8%B9%D9%85%D8%A7%D9%84+%D8%AF%D8%AE%D8%A7%D9%86%DB%8C%D8%AA" required>
                    <option value="">انتخاب مقدار</option>
                    <option value="سیگار می کشم">سیگار می کشم</option>
                    <option value="سیگار نمی کشم">سیگار نمی کشم</option>
                    <option value="ترک کردم">ترک کردم</option>
                    <option value="تفریحی">تفریحی</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>کار با مددجوی مرد</label>
                </td>
                <td>
                  <input type="hidden" name="cf_1480" data-label="" value="0">
                  <input type="checkbox" name="cf_1480" data-label="" value="1">
                </td>
              </tr>
              <tr>
                <td>
                  <label>وسیله نقلیه</label>
                </td>
                <td>
                  <select name="cf_1809[]" data-label="label:%D9%88%D8%B3%DB%8C%D9%84%D9%87+%D9%86%D9%82%D9%84%DB%8C%D9%87" multiple="" required="">
                    <option value="بدون وسیله">بدون وسیله</option>
                    <option value="موتور">موتور</option>
                    <option value="ماشین">ماشین</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label>گزینه های بیشتر</label>
                </td>
                <td>
                  <select name="cf_1515[]" data-label="label:%DA%AF%D8%B2%DB%8C%D9%86%D9%87+%D9%87%D8%A7%DB%8C+%D8%A8%DB%8C%D8%B4%D8%AA%D8%B1+%D9%86%DB%8C%D8%B1%D9%88" multiple="">
                    <option value="گواهینامه">گواهینامه</option>
                    <option value="پاسپورت">پاسپورت</option>
                    <option value="ماشین">ماشین</option>
                    <option value="موتور">موتور</option>
                    <option value="امکان سفر داخلی">امکان سفر داخلی</option>
                    <option value="امکان سفر خارجی">امکان سفر خارجی</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات معرف اول</label>
                </td>
                <td>
                  <textarea name="cf_1249" per='per' pernum required minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}" draggable="false"></textarea>
                  <label for="cf_1249" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات معرف دوم</label>
                </td>
                <td>
                  <textarea name="cf_1251" per='per' pernum required minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}"></textarea>
                  <label for="cf_1251" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات معرف سوم</label>
                </td>
                <td>
                  <textarea name="cf_1253" per='per' pernum required minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}"></textarea>
                  <label for="cf_1253" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات همسر</label>
                </td>
                <td>
                  <textarea name="cf_1880" per='per' pernum minLength="10" maxlength="420" autocomplete="off" 
                         pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}"   placeholder="نام - نام خانوادگی - شماره تماس - آدرس محل کار"></textarea>
                  <label for="cf_1880" class="hide"> نام و نام خانوادگی - شماره تماس - آدرس محل کار </label>
<!--



-->

                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات کارفرمای قبلی</label>
                </td>
                <td>
                  <textarea value="" name="cf_1882" per='per' pernum minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}" placeholder="نام  شماره تماس  علت ترک کار  مدت همکاری"></textarea>
                  <label for="cf_1882" class="hide"> نام - شماره تماس - علت ترک کار - مدت همکاری </label>
                </td>
              </tr>
              <tr>
                <td>
                  <label>آدرس</label>
                </td>
                <td>
                  <textarea name="mailingstreet" per='per' pernum required minlength="10" maxlength="220" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,220}"></textarea>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>کد  پستی</label>
                </td>
                <td>
                   <input type="number" name="cf_pcf_irp_1076" data-label="" value="" maxlength="20">
                </td>
               </tr>
              <tr>
                <td>
                  <label>محل و رشته تحصیلی</label>
                </td>
                <td>
                  <input type="text" name="cf_1032" data-label="" value="" pattern="{0}" maxlength="35" minlength="0" per='per' opt>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشکلات جسمانی</label>
                </td>
                <td>
                  <select name="cf_1521[]" data-label="label:%D9%85%D8%B4%DA%A9%D9%84%D8%A7%D8%AA+%D8%AC%D8%B3%D9%85%D8%A7%D9%86%DB%8C" multiple="">
                    <option value="عینکی">عینکی</option>
                    <option value="کم شنوایی">کم شنوایی</option>
                    <option value="دودید">دودید</option>
                    <option value="نیستاگموس">نیستاگموس</option>
                    <option value="کم دید">کم دید</option>
                    <option value="مشکل کمر">مشکل کمر</option>
                    <option value="مشکل گردن">مشکل گردن</option>
                    <option value="مشکل دست">مشکل دست</option>
                    <option value="مشکل زانو">مشکل زانو</option>
                    <option value="ضعف جسمانی">ضعف جسمانی</option>
                    <option value="پای پرانتزی">پای پرانتزی</option>
                    <option value="لنگی پا">لنگی پا</option>
                    <option value="قطع انگشتان دست">قطع انگشتان دست</option>
                    <option value="لکنت زبان">لکنت زبان</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
          <script type="text/javascript">
            var RecaptchaOptions = {
              theme: "clean"
            };
          </script>
          {# <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Lchg-wSAAAAAIkV51_LSksz6fFdD2vgy59jwa38"></script>
          <noscript>
            <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Lchg-wSAAAAAIkV51_LSksz6fFdD2vgy59jwa38" height="300" width="500" frameborder="0"></iframe>
            <br>
            <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
            <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
          </noscript>
          <input type="hidden" id="captchaUrl" value="https://my-saminnurses.ir/modules/Settings/Webforms/actions/CheckCaptcha.php">
          <input type="hidden" id="recaptcha_validation_value"> #}
          <input type="submit" value="تایید اطلاعات">
      </div>
      </form>
    </div>


<script>
  $("document").ready(()=>{
    $("#__vtigerWebForm").submit((e)=>{
      let data = $("#__vtigerWebForm").serialize();
      $.post("/register",data).then(res => {
        if(res.success){
          alert("Yes");
        }
        else{
          alert("no")
        }
      });

      return false;
      
    })
  })
</script>
@endsection