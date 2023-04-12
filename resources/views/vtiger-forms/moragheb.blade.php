@extends("layouts.vtiger")
@section("content")

    <div class="main">
      <div align="center" class="d1">
          <form id="__vtigerWebForm" name="ثبت نام مراقب" autocomplete="off" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div style="position:relative;z-index:999;display:block;min-width:100%;background-color:white">
            <img src="/img/1.png" class="mimg">
            
            <div class="container">
              <div class="text" style="">
                <p style="font-size: 20px;margin-bottom:0;"> فرم استخدام مراقب </p>
                <p style="font-size:16px;margin-bottom:2px;">فرم به دقت تکمیل گردد</p>
                <p style="font-size: 16px;font-weight:bold;">زمان مورد نیاز 10 دقیقه</p>
              </div>
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
          <input type="hidden" name="__vtrftk" value="sid:38c59aab5a26b35b9fddf2b8ce0fa142aa7d1687,1651876358">
          <input type="hidden" name="publicid" value="0aafdfb29022103bd606aae21811360e">
          <input type="hidden" name="urlencodeenable" value="1">
          <input type="hidden" name="name" value="ثبت نام مراقب">
      
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
                  <input type="text" per='per' name="firstname" data-label="" value="{{ old("firstname",$contact->firstname) }}" required class="i1" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,20}" maxlength="20" size="20">
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
                    <span class="icon" style="padding:13px 11px;">&#xf064;</span>
                  </span>
                  <input type="text" per='per' name="lastname" data-label="" value="{{ old("lastname",$contact->lastname) }}" required="" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,40}" maxlength="40">
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
                    <span class="icon" style="padding:13px 11px;">&#xf064;</span>
                  </span>
                  <input type="text" name="cf_1036" data-label=""  value="{{ old("cf_1036",$contact->cf_1036) }}" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,20}" maxlength="20" minlength="2" per='per' required="">
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
                  <input type="text" name="mobile"  data-label="" value="{{ old("mobile",$contact->mobile) }}" spin="none" inputmode="numeric" required="" maxlength="11" size="11" pattern="09([0-9]{9})" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeydown="return checkcode(event);"  oninvalid="setCustomValidity(' لطفا شماره موبایل را صحیح وارد کنید')"  @disabled(true)>
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
                    <span class="icon fas">&#xe811;</span>
                  </span>
                  <input type="tel" name="otherphone"  data-label="" value="{{ old("otherphone",$contact->otherphone) }}" spin="none" maxlength="10" inputmode="numeric" placeholder=" " onkeydown="return checkcode(event);">
                </td>
              </tr>
      
             <tr>
                <td>
                   <select name="cf_931" data-label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8" hidden="" required="">
                        <option value="مراقب" selected="">مراقب</option>
                    </select>
                  </td>
            </tr>

              <tr>
                <td>
                  <label>تاریخ تولد</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe85b;</span>
                  </span>
                  <input type="text" name="birthday" data-label="" value="{{ old("bjalali",$contact->bjalali) }}" id="dat" required="" pattern="(131[6-9]|13[2-7][0-9]|138[0-3])[\/\-]([1-9]|1[0-2])[\/\-]([1-9]|[12][0-9]|3[01])\b" placeholder="
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
                    <span class="icon fixicon">&#xe80d;</span>
                  </span>
                  <input type="text" per='per' name="cf_1042" data-label="" value="{{ old("cf_1042",$contact->cf_1042) }}" required pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,40}" maxlength="40">
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
                  <label>شماره شناسنامه</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xf0db;</span>
                  </span>
                  <input type="tel" name="cf_1038"  data-label="" value="{{ old("cf_1038",$contact->cf_1038) }}" spin="none" inputmode="numeric" minlength="1" maxlength="10" pattern="[0-9]{1,10}" required>
                  <span class="iii"></span>
                </td>
              </tr>
        <tr style="margin-top:0 !important;">
                <td>
                  <select name="cf_1279" data-label="label:%D9%81%D8%B1%D9%85+%D8%A2%D9%86%D9%84%D8%A7%DB%8C%D9%86+%D8%A7%D8%B2+%D8%B3%D8%A7%DB%8C%D8%AA%D8%9F" hidden="">
                    <option value="">انتخاب مقدار</option><option value="بلی" selected="">بلی</option><option value="خیر">خیر</option>
                  </select>
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
                  <label>وضعیت تاهل</label>
                </td>
                <td>
                 
                  @php 
                  $options = [
                    'مجرد',
                    'متاهل',
                    'متارکه',
                    'فوت همسر',
                    ];
                  @endphp
                  <x-select
                    name="cf_1058"
                    label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84"
                    :options="$options"
                    :value="$contact->cf_1058"
                    attribute="required='required'  pattern='' " 
                  />
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>تعداد فرزندان</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe801;</span>
                  </span>
                  <input type="number"  name="cf_1062" data-label="" value="{{ old("cf_1062",$contact->cf_1062) }}" min="0" max="20" inputmode="numeric" pattern="[0-9]{0,20}" required="required">
                  <label for="cf_1062" class="hide"> عدد مجاز بین 0 الی 20 می باشد. </label>
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
                    'در حال خدمت'
                    ];
                  @endphp
                  <x-select
                    name="cf_1064"
                    label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AE%D8%AF%D9%85%D8%AA+%D8%B3%D8%B1%D8%A8%D8%A7%D8%B2%DB%8C"
                    :options="$options"
                    :value="$contact->cf_1064"
                    attribute=" " 
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label>وزن مراقب</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe876;</span>
                  </span>
                  <input type="number" name="cf_1225"  data-label="" value="{{ old("cf_1225",$contact->cf_1225) }}" pattern="[0-9]"  required="" min="50" max="120" inputmode="numeric">
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
                    <span class="icon">&#xe875;</span>
                  </span>
                  <input type="number" name="cf_1221" data-label="" pattern="[0-9]{1,3}" value="{{ old("cf_1221",$contact->cf_1221) }}" required="" min="130" max="210">
                  <label for="cf_1225" class="hide"> قد بین 130 الی 210 سانتی متر </label>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>آخرین مدرک تحصیلی</label>
                </td>
                <td>
                 
                  @php 
                  $options = [
                    'بیسواد',
                    'ابتدایی',
                    'سیکل',
                    'دیپلم',
                    'کاردانی',
                    'کارشناسی',
                    'کارشناس ارشد',
                    'دکترا'
                    ];
                  @endphp
                  <x-select
                    name="cf_1030"
                    label="label:%D8%A2%D8%AE%D8%B1%DB%8C%D9%86+%D9%85%D8%AF%D8%B1%DA%A9+%D8%AA%D8%AD%D8%B5%DB%8C%D9%84%DB%8C"
                    :options="$options"
                    :value="$contact->cf_1030"
                    attribute="required" 
                  />

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
                    <option value="دارم"  {{ $contact->cf_1205 =='دارم' ? 'selected' : '' }}>دارم</option>
                    <option value="ندارم" {{$contact->cf_1205 =='ندارم' ? 'selected' : '' }}>ندارم</option>
                  </select>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>محدوده فعالیت</label>
                </td>
                <td>
                 
                  @php 
                  $options = ;
                  @endphp
                  <x-select
                    name="cf_1193[]"
                    label="label:%D9%85%D8%AD%D8%AF%D9%88%D8%AF%D9%87+%D9%81%D8%B9%D8%A7%D9%84%DB%8C%D8%AA"
                    :options="$options"
                    :value="$contact->cf_1193"
                    attribute="multiple=''  required"
                  />
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>زندگی با</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon">&#xe86c;</span>
                  </span>
                  <input type="text" per='per' name="cf_1247" data-label="" value="{{ old("cf_1247",$contact->cf_1247) }}" maxlength="40" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,40}" required>
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
                    <span class="icon">&#xe807;</span>
                  </span>
                  <input type="text" name="cf_1048" per='per' data-label="" value="{{ old("cf_1048",$contact->cf_1048) }}" maxlength="20" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,20}" required>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>زبان و گویش</label>
                </td>
                <td>
                 
                  @php 
                  $options = ;
                  @endphp
                  <x-select
                    name="cf_1529[]"
                    label="label:%D8%B2%D8%A8%D8%A7%D9%86+%D9%88+%DA%AF%D9%88%DB%8C%D8%B4"
                    :options="$options"
                    :value="$contact->cf_1529"
                    attribute="multiple=''  required"
                  />
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
                      <img src="/img/iconm.png" class="ic">
                    </span>
                  </span>
                  <input type="text" name="cf_1050" data-label="" per='per' value="{{ old("cf_1050",$contact->cf_1050) }}" maxlength="20" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,20}" required>
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
                      <img src="/img/prayer.png" class="ic" style="width:31px;height:33px;margin-top:-5px;margin-right:-2px;">
                    </span>
                  </span>
                  <input type="text" name="cf_1052" data-label="" per='per' maxlength="20" minlength="3" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{3,20}" value="{{ old("cf_1052",$contact->cf_1052) }}"  required>
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>شیفت خدمات</label>
                </td>
                <td>
                 
                  @php 
                  $options = [
                    'روزانه',
                    'شبانه',
                    'شبانه روزی',
                    'مقطعی',
                    'بیمارستان',
                    'منزل',
                    'موردی'
                    ];
                  @endphp

                  <x-select
                    name="cf_1195[]"
                    label="label:%D8%B4%DB%8C%D9%81%D8%AA+%D8%AE%D8%AF%D9%85%D8%A7%D8%AA"
                    :options="$options"
                    :value="$contact->cf_1195"
                    attribute="multiple=''  required"
                  />
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>خدمات مراقبت</label>
                </td>
                <td>
                 
                  @php 
                  $options = [
                    'سالمند لگنی',
                    'سالمند پوشکی',
                    'آلزایمر',
                    'سالمند سالم',
                    'کودک',
                    'بهیار',
                    'کمک بهیار',
                    'کودک دوقولو',
                    'امور منزل',
                    'تمامی موارد',
                    'پرستار',
                    'پرستار ویژه'
                    ];
                  @endphp
                  
                  <x-select
                    name="cf_1197[]"
                    label="label:%D8%AE%D8%AF%D9%85%D8%A7%D8%AA+%D9%85%D8%B1%D8%A7%D9%82%D8%A8%D8%AA"
                    :options="$options"
                    :value="$contact->cf_1197"
                    attribute="multiple=''  required"
                  />
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>استعمال دخانیت</label>
                </td>
                <td>
                  @php 
                  $options = [
                    'سیگار می کشم',
                    'سیگار نمی کشم',
                    'ترک کردم',
                    'تفریحی'
                    ];
                  @endphp
                  
                  <x-select
                    name="cf_1255"
                    label="label:%D8%A7%D8%B3%D8%AA%D8%B9%D9%85%D8%A7%D9%84+%D8%AF%D8%AE%D8%A7%D9%86%DB%8C%D8%AA"
                    :options="$options"
                    :value="$contact->cf_1255"
                    attribute=" required"
                  />
                  <span class="iii"></span>
                </td>
              </tr>
              <tr>
                <td>
                  <label>کار با مددجوی مرد</label>
                </td>
                <td>
                  
                  <input type="hidden" name="cf_1480" data-label="" value="0" >
                  <input type="checkbox" name="cf_1480" data-label="" value="1" {{ $contact->cf_1480=='1' ? 'checked' : ''}} >
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
                    'ماشین'
                    ];
                  @endphp
                  
                  <x-select
                    name="cf_1809[]"
                    label="label:%D9%88%D8%B3%DB%8C%D9%84%D9%87+%D9%86%D9%82%D9%84%DB%8C%D9%87"
                    :options="$options"
                    :value="$contact->cf_1809"
                    attribute=" multiple=''  required"
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label>گزینه های بیشتر</label>
                </td>
                <td>
                  @php 
                  $options = [
                    'گواهینامه',
                    'پاسپورت',
                    'ماشین',
                    'موتور',
                    'امکان سفر داخلی',
                    'امکان سفر خارجی'
                    ];
                  @endphp
                  
                  <x-select
                    name="cf_1515[]"
                    label="label:%DA%AF%D8%B2%DB%8C%D9%86%D9%87+%D9%87%D8%A7%DB%8C+%D8%A8%DB%8C%D8%B4%D8%AA%D8%B1+%D9%86%DB%8C%D8%B1%D9%88"
                    :options="$options"
                    :value="$contact->cf_1515"
                    attribute=" multiple='' "
                  />
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات معرف اول</label>
                </td>
                <td>
                  <div style="position:relative">
                    <span class="itxt">&#xf2c0;</span>
                    <textarea name="cf_1249" per='per' pernum required minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}" draggable="false">{{ old("cf_1249",$contact->cf_1249) }}</textarea>
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
                    <textarea name="cf_1251" per='per' pernum required minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}">{{ old("cf_1251",$contact->cf_1251) }}</textarea>
                    <label for="cf_1251" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                    <span class="iii"></span>
                 </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات معرف سوم</label>
                </td>
                <td>
                 <div style="position:relative">
                    <span class="itxt">&#xf2c0;</span>
                    <textarea name="cf_1253" per='per' pernum required minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}">{{ old("cf_1253",$contact->cf_1253) }}</textarea>
                    <label for="cf_1253" class="hide"> نام - شماره تماس - نسبت - آدرس </label>
                    <span class="iii"></span>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات همسر</label>
                </td>
                <td>
                 <div style="position:relative;">
                    <span class="itxt">&#xe84e;</span>
                    <textarea name="cf_1880" per='per' pernum minLength="10" maxlength="420" autocomplete="off" 
                         pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}"   placeholder="نام - نام خانوادگی - شماره تماس - آدرس محل کار">{{ old("cf_1880",$contact->cf_1880) }}</textarea>
                  <label for="cf_1880" class="hide"> نام و نام خانوادگی - شماره تماس - آدرس محل کار </label>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label>مشخصات کارفرمای قبلی</label>
                </td>
                <td>
                 <div style="position:relative;">
                    <span class="itxt">&#xe826;</span>
                  <textarea value="" name="cf_1882" per='per' pernum minlength="10" maxlength="420" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,420}" placeholder="نام  شماره تماس  علت ترک کار  مدت همکاری">{{ old("cf_1882",$contact->cf_1882) }}</textarea>
                  <label for="cf_1882" class="hide"> نام - شماره تماس - علت ترک کار - مدت همکاری </label>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label>آدرس</label>
                </td>
                <td>
                 <div style="position:relative;">
                    <span class="itxt">&#xe80c;</span>
                    <textarea name="mailingstreet" per='per' pernum required minlength="10" maxlength="220" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,220}">{{ old("mailingstreet",$contact->mailingstreet) }}</textarea>
                    <span class="iii"></span>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label>کد  پستی</label>
                </td>
                <td>
                  <span class="i">
                    <span class="icon" style="font-family: 'fontello2';">&#xe800;</span>
                  </span>
                   <input type="number" name="cf_pcf_irp_1076" data-label=""  maxlength="20" size="20" placeholder=" " spin="none" value="{{ old("cf_pcf_irp_1076",$contact->cf_pcf_irp_1076) }}" inputmode="numeric">
                </td>
               </tr>
              <tr>
                <td>
                  <label>مشکلات جسمانی</label>
                </td>
                <td>
                  
                  @php 
                  $options = [
                    'عینکی',
                    'کم شنوایی',
                    'دودید',
                    'نیستاگموس',
                    'کم دید',
                    'مشکل کمر',
                    'مشکل گردن',
                    'مشکل دست',
                    'مشکل زانو',
                    'ضعف جسمانی',
                    'پای پرانتزی',
                    'لنگی پا',
                    'قطع انگشتان دست',
                    'لکنت زبان'
                    ];
                  @endphp
                  
                  <x-select
                    name="cf_1521[]"
                    label="label:%D9%85%D8%B4%DA%A9%D9%84%D8%A7%D8%AA+%D8%AC%D8%B3%D9%85%D8%A7%D9%86%DB%8C"
                    :options="$options"
                    :value="$contact->cf_1521"
                    attribute=" multiple='' "
                  />

                </td>
              </tr>
          
              
              
              <tr>
                <td>
                 <!--  <label></label> -->
                </td>
                <td >
                  <div class="chk">
                  <input type="checkbox" name="" data-label="" value="0" required="">
                  <span>صحت کلیه اطلاعات را تایید می نمایم.</span>
                  </div>
                  <input type="submit" class="btn-green" value="تایید اطلاعات">
                </td>
             
              </tr>
              <tr>
                <input type="hidden" id="captchaUrl" value="https://my-saminnurses.ir/modules/Settings/Webforms/actions/CheckCaptcha.php">
                <input type="hidden" id="recaptcha_validation_value">
                <td>
               
                </td>
               
              </tr>
            </tbody>

          <script type="text/javascript">
            var RecaptchaOptions = {
              theme: "clean"
            };
          </script>
          <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Lchg-wSAAAAAIkV51_LSksz6fFdD2vgy59jwa38"></script>
          <noscript>
            <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Lchg-wSAAAAAIkV51_LSksz6fFdD2vgy59jwa38" height="300" width="500" frameborder="0"></iframe>
            <br>
            <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
            <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
          </noscript>
      </form>
    </table>

    <table class="tab-content">
      <tbody class="tabs__tab" id="tab_2" data-tab-info>
        @include('vtiger-forms._partials._documentMoragheb')
      </tbody>
    </table>
    
    <div id="snackbar"></div>
    @include('vtiger-forms._partials._modal')
    </div>
        <script type="text/javascript" src="/scripts/persianDatepicker.js"></script>
    <script type="text/javascript" src="/scripts/jquery.farsiInput.js"></script>
    <script type="text/javascript" src="/scripts/b.js"></script>
    <script type="text/javascript" src="/scripts/a.js"></script>
    
<script>

$(document).ready(function(){

  if($(".ftxt").length !== 0){
    var stuff = {};
    $(".ftxt").each(function() {
       stuff[$(this).prevAll("input[type=file]").attr("name")] = $(this).html();
    });
  }

  $("button").on("click",function(e){
    var prevUp = document.getElementById("ftxt");
    if(prevUp){
      prevUp.removeAttribute("id");
   }
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

       if (totalFileSize > 155648) {         
        this.value = "";
        var Ftxt = document.getElementById("ftxt");
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
       if(typeof(stuff) === "object"){
         Ftext = stuff[e.target.name];
       }
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

})

function decodeS(S){

return(decodeURIComponent(S));

}
</script>



<script>
  
      
// var modal = document.getElementById("myModal");



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


   


    $("#upload_moragheb_asnad").submit((e)=>{
    $('#upload_moragheb_asnad').prop("disabled",true);

      let fname = $('#file_upload')[0].files;

      var e = document.getElementById("select_asnad");
      var value = e.value;
    var textt = document.getElementById('select_asnad').selectedOptions[0].text;
      
     let func = value=="personal_image"? "/testuploadprofile" : "/createDocument";

     document.getElementById("upload_moragheb_asnad").action = func;
     $('#myModal').css('display','block');
    
     $.ajax({
            url: func,
            method: 'POST',
            data: new FormData($("#upload_moragheb_asnad")[0]),
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

  

  function checkfileds($filed){
         
          for (let j = 0; j < docs_sended.length; j++) {
              
              if($filed === docs_sended[j]){
    
                snack("این سند بارگذاری شده ، می توانید مجدد نیز ارسال کنید","orange");
                break;
              }
            }
        }

        document.getElementById("select_asnad").addEventListener('change',function (e){
      if(e.target.value!="personal_image")
      checkfileds(e.target.value)
    })
  

       
</script>
@endsection