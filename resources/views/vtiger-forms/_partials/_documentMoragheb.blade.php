{{-- <tr>
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
          <label>عکس پرسنلی</label>
        </td>
        <td>
                  <span class="i">
                    <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
                  </span>
          <input type="file" name="imagename[]" class="file" required="" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
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
          <label>تصویر اجاره نامه یا سند</label>
        </td>
        <td>
                  <span class="i">
                    <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
                  </span>
          <input type="file" name="file_7_2" class="file" required="required" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
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
          <label>تصویر صفحه 1 و 2 شناسنامه</label>
        </td>
        <td>
                  <span class="i">
                    <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
                  </span>
          <input type="file" name="file_7_3" class="file" required="required" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
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
          <label>تصویر عدم سوء پیشینه</label>
        </td>
        <td>
                  <span class="i">
                    <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
                  </span>
          <input type="file" name="file_7_4" class="file" required="required" accept="image/gif, image/jpeg, image/png, application/pdf" title="انتخاب فایل"/>
                  <span class="iii"></span>
                  <p class="ftxt" style="line-height:20px;font-size:11px;padding:3px 20px 2px 0;color:black;">
حجم مجاز 150 کیلو بایت | فایل های مجاز 
(.jpg .gif .png .pdf) | 
 
<a href="https://b2n.ir/pic-comp" target="_blank" style="color:red;">برای کم کردن حجم عکس کلیک کنید</a>
</p>

        </td>
      </tr>  
     </tr>    --}}

     <form id="upload_moragheb_asnad" action="{{ url ('/createDocument')}}"  method="post" enctype="multipart/form-data">
      @csrf
      {{-- @method('POST') --}}
<tr>
  <td id="td"> 
     <select id="select_asnad" name="upload_file" data-label="label:%D9%88%D8%B6%D8%B9%DB%8C%D8%AA+%D8%AA%D8%A7%D9%87%D9%84" required="required" pattern="">
      <option value="">انتخاب نوع سند</option>
      <option value="national_image">تصویر کارت ملی</option>
      <option value="personal_image">عکس پرسنلی</option>
      <option value="Lease_image">تصویر اجاره نامه یا سند</option>
      <option value="certificate_image">تصویر صفحه 1 و 2 شناسنامه</option>
      <option value="bad_background_image">  تصویر عدم سوء پیشینه</option>
    </select>
  </td>
</tr>
    <td>
      <span class="i">
        <span class="icon fas" style="opacity:1;top:-15px;"><button class="upFile">انتخاب فایل</button></span>
      </span>
      <input type="file" id="file_upload" name="file_upload"  class="file" required="" accept="image/gif, image/jpeg, image/png" title="انتخاب فایل"/>
      <span class="iii"></span>
      <p class="ftxt" style="line-height:20px;font-size:11px;padding:3px 20px 2px 0;color:black;">
حجم مجاز 150 کیلو بایت | فایل های مجاز 
(.jpg .gif .png) | 

<a href="https://b2n.ir/pic-comp" target="_blank" style="color:red;">برای کم کردن حجم عکس کلیک کنید</a>
</p>
</td>
<tr>
  <td>
    <input type="submit" class="btn-green" value="بارگزاری">
  </td>
</tr>
</form>


