<form id="upload_doctor_asnad" action="{{ url ('/createDocument')}}"  method="post" enctype="multipart/form-data">
    @csrf
    {{-- @method('POST') --}}
    
<tr id="tr">
<td>
<div id="div"class="alert alert-success fade show h6 small p-2' d-none" role='alert' >اسناد بارگذاری شده تاکنون: </div>
</td>
</tr>
<tr>

<td > 
   <select id="select_asnad" name="upload_file" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84" required="required" pattern="">
    <option value="">انتخاب نوع سند</option>
    {{-- <option value="national_image">تصویر کارت ملی</option> --}}
    <option value="personal_image">عکس پرسنلی</option>
    <option value="education_image">تصویر مدرک تحصیلی</option>
   
  </select>
</td>
</tr>
  <td>
    <span class="i">
      <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
    </span>
    <input type="file" id="file_upload" type="file" name="file_upload"  class="file" required="" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
    <span class="iii"></span>
    <p class="ftxt" style="line-height:20px;font-size:11px;padding:3px 20px 2px 0;color:black;">
حجم مجاز 150 کیلو بایت | فایل های مجاز 
(.jpg .gif .png) | 

<a href="https://b2n.ir/pic-comp" target="_blank" style="color:red;">برای کم کردن حجم عکس کلیک کنید</a>
</p>
</td>
<tr>
<td>
  <input type="submit" class="btn-green" value="بارگذاری">
</td>
</tr>
</form>
{{-- <tr>
    <td>
      <label>تصویر مدرک تحصیلی</label>
    </td>
    <td>
              <span class="i">
                <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
              </span>
      <input type="file" name="file_9_1" required="" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل">
              <span class="iii"></span>
              <p class="ftxt"    style="line-height:20px;font-size:11px;padding:3px 20px 2px 0;color:black;min-width:90%;width:1vw;">
حجم مجاز 150 کیلو بایت | فایل های مجاز 
(.jpg .gif .png) | 

<a href="https://b2n.ir/pic-comp" target="_blank" style="color:red;">برای کم کردن حجم عکس کلیک کنید</a>
</p>

    </td>
  </tr> --}}