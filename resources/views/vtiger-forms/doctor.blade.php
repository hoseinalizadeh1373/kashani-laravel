@extends("layouts.vtiger")
@section("content")
    <div class="main">
      <div align="center" class="d1">
<form id="__vtigerWebForm" name="عضویت پزشک" action="https://my-saminnurses.ir/modules/Webforms/capture.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div style="position:relative;z-index:999;display:block;min-width:100%;background-color:white">
            <img src="/img/1.png" class="mimg">

            <div class="container">
              <div class="text" style="">
                <p style="font-size: 20px;margin-bottom:0;"> فرم پذیرش پزشک </p>
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
  <input type="hidden" name="__vtrftk" value="sid:dbc290a429f2bb3956cc0bfa38f38244de788171,1670505552">
  <input type="hidden" name="publicid" value="16fa4f8646862922ef90eb31c4e4ebc1">
  <input type="hidden" name="urlencodeenable" value="1">
  <input type="hidden" name="name" value="عضویت پزشک">
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
          <label>رشته فعالیت</label>
        </td>
        <td>
          @php 
          $options =[
            'پزشک عمومی',
            'پزشک متخصص',
            'کادر درمان',
            'گفتار درمان',
            'فیزیوتراپ',
            'رادیولوژیست'
        ];
          @endphp

          <x-select
          name="cf_931"
          label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8"
          :options="$options"
          :value="$contact->cf_931"
          attribute="required='required'  pattern=''"
          />
          {{-- <select name="cf_931" data-label="label:%D9%86%D9%88%D8%B9+%D9%85%D8%AE%D8%A7%D8%B7%D8%A8" required="" pattern="">
            <option value=""  selected="" disabled>انتخاب مقدار</option>
            <option value="پزشک عمومی">پزشک عمومی</option>
            <option value="پزشک متخصص">پزشک متخصص</option>
            <option value="کاردرمان">کاردرمان</option>
            <option value="گفتار درمان">گفتار درمان</option>
            <option value="فیزیوتراپ">فیزیوتراپ</option>
            <option value="رادیولوژیست">رادیولوژیست</option>
            <option value="روانشناس">روانشناس</option>
          </select> --}}
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
                  <input id="meli" type="text" name="cf_pcf_irc_1122" data-label="" spin="none"  value="{{ old("national_code",$contact->national_code) }}" required maxlength="10" size="10" inputmode="numeric" pattern="[a-z]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);check();" onkeypress="return checkcode(event);">
                  <span class="iii"></span>
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
                  <input type="text" name="birthday" data-label="" value="{{ old("bjalali",$contact->bjalali) }}" id="dat" required pattern="(131[6-9]|13[2-7][0-9]|138[0-3])[\/\-]([1-9]|1[0-2])[\/\-]([1-9]|[12][0-9]|3[01])\b" placeholder="
روز / ماه / سال
 - حداقل سن 18 و حداکثر 85 سال
">
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
          <label>شماره نظام پزشکی</label>
        </td>
                <td>
                  <span class="i">
                     <span class="icon fixicon">&#xe867;</span>
                  </span>
                  <input type="text" name="cf_1553" data-label="" spin="none" value="{{ old("cf_1553",$contact->cf_1553) }}" required maxlength="10" size="20" inputmode="numeric" pattern="[0-9]{0,10}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);check();" onkeypress="return checkcode(event);">
                  <span class="iii"></span>
                </td>
      </tr>
      <tr>
        <td>
          <label>آدرس</label>
        </td>
                <td>
                 <div style="position:relative;margin-bottom:-10px;">
                  <span class="itxt">&#xe80c;</span>
                  <textarea name="mailingstreet" per='per' pernum required="" minlength="10" maxlength="220" title="آدرس خود را وارد کنید" autocomplete="off" pattern="[\sآابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{10,220}">{{ old("cf_1249",$contact->mailingstreet) }}</textarea>
                  <label for="mobile" class="hide"> آدرس دقیق پستی خود را وارد کنید </label>
                  <span class="iii"></span>
                 </div>
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
        <tr style="margin-top:0 !important;">
                <td>
             <select name="cf_1279" data-label="label:%D9%81%D8%B1%D9%85+%D8%A2%D9%86%D9%84%D8%A7%DB%8C%D9%86+%D8%A7%D8%B2+%D8%B3%D8%A7%DB%8C%D8%AA%D8%9F" hidden="">
              <option value="">انتخاب مقدار</option>
              <option value="بلی" selected="">بلی</option>
              <option value="خیر">خیر</option>
            </select>
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
    @include('vtiger-forms._partials._documentDoctor')
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
  window.onload = function() {
    var N = navigator.appName,
      ua = navigator.userAgent,
      tem;
    var M = ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    if (M && (tem = ua.match(/version\/([\.\d]+)/i)) != null) M[2] = tem[1];
    M = M ? [M[1], M[2]] : [N, navigator.appVersion, "-?"];
    var browserName = M[0];
    var form = document.getElementById("__vtigerWebForm"),
      inputs = form.elements;
    form.onsubmit = function() {
      var required = [],
        att, val;
      for (var i = 0; i < inputs.length; i++) {
        att = inputs[i].getAttribute("required");
        val = inputs[i].value;
        type = inputs[i].type;
        if (type == "email") {
          if (val != "") {
            var elemLabel = inputs[i].getAttribute("label");
            var emailFilter = /^[_/a-zA-Z0-9]+([!"#$%&()*+,./:;<=>?\^_`{|}~-]?[a-zA-Z0-9/_/-])*@[a-zA-Z0-9]+([\_\-\.]?[a-zA-Z0-9]+)*\.([\-\_]?[a-zA-Z0-9])+(\.?[a-zA-Z0-9]+)?$/;
            var illegalChars = /[\(\)\<\>\,\;\:\"\[\]]/;
            if (!emailFilter.test(val)) {
              alert("For " + elemLabel + " field please enter valid email address");
              return false;
            } else if (val.match(illegalChars)) {
              alert(elemLabel + " field contains illegal characters");
              return false;
            }
          }
        }
        if (att != null) {
          if (val.replace(/^\s+|\s+$/g, "") == "") {
            required.push(inputs[i].getAttribute("label"));
          }
        }
      }
      if (required.length > 0) {
        alert("The following fields are required: " + required.join());
        return false;
      }
      var numberTypeInputs = document.querySelectorAll("input[type=number]");
      for (var i = 0; i < numberTypeInputs.length; i++) {
        val = numberTypeInputs[i].value;
        var elemLabel = numberTypeInputs[i].getAttribute("label");
        var elemDataType = numberTypeInputs[i].getAttribute("datatype");
        if (val != "") {
          if (elemDataType == "double") {
            var numRegex = /^[+-]?\d+(\.\d+)?$/;
          } else {
            var numRegex = /^[+-]?\d+$/;
          }
          if (!numRegex.test(val)) {
            alert("For " + elemLabel + " field please enter valid number");
            return false;
          }
        }
      }
      var dateTypeInputs = document.querySelectorAll("input[type=date]");
      for (var i = 0; i < dateTypeInputs.length; i++) {
        dateVal = dateTypeInputs[i].value;
        var elemLabel = dateTypeInputs[i].getAttribute("label");
        if (dateVal != "") {
          var dateRegex = /^[1-9][0-9]{3}-(0[1-9]|1[0-2]|[1-9]{1})-(0[1-9]|[1-2][0-9]|3[0-1]|[1-9]{1})$/;
          if (!dateRegex.test(dateVal)) {
            alert("For " + elemLabel + " field please enter valid date in required format");
            return false;
          }
        }
      }
      var inputElems = document.getElementsByTagName("input");
      var totalFileSize = 0;
      for (var i = 0; i < inputElems.length; i++) {
        if (inputElems[i].type.toLowerCase() === "file") {
          var file = inputElems[i].files[0];
          if (typeof file !== "undefined") {
            var totalFileSize = totalFileSize + file.size;
          }
        }
      }
        if (totalFileSize > 209920) {
        alert("Maximum allowed file size including all files is 50MB.");
        return false;
      }
    };
  }


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
$(this).html("حجم فایل بیش از حد مجاز 150 کیلوبایت می باشد").fadeIn(800).css("height", current_height);

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

    $("#upload_doctor_asnad").submit((e)=>{
    $('#upload_doctor_asnad').prop("disabled",true);

      let fname = $('#file_upload')[0].files;

      var e = document.getElementById("select_asnad");
      var value = e.value;
    var textt = document.getElementById('select_asnad').selectedOptions[0].text;
      
     let func = value=="personal_image"? "/testuploadprofile" : "/createDocument";

     document.getElementById("upload_doctor_asnad").action = func;
     $('#myModal').css('display','block');
    
     $.ajax({
            url: func,
            method: 'POST',
            data: new FormData($("#upload_doctor_asnad")[0]),
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