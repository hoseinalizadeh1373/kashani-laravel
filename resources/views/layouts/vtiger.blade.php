<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="/css/persianDatepicker-default.css" />
    <link rel="stylesheet" href="/css/formn.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <title>فرم استخدام مرکز پرستاری ثمین</title>
    <style>
      @import url("/css/formFix.css");
   </style>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.6.0.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
      <div class="container-fluid">
        <button class="navbar-toggler text-left px-1 py-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <a class="navbar-brand" href="#">ثمین</a> --}}
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ms-0">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">صفحه اصلی</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
          </ul>
          
        
        </div>
      </div>
    </nav>

    
    @yield("content")
    <script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


      let docs_sended = {{Js::from(Auth::User()->docs_sended)}};
    
    
      
        let selecttag = document.getElementById('select_asnad');
        
        if(docs_sended !==null){
          document.getElementById("div").classList.remove('d-none');
          document.getElementById("div").classList.add('d-block');
          for (let index = 1; index <= selecttag.options.length; index++) {
            
            for (let j = 0; j < docs_sended.length; j++) {
              
              if(selecttag.options[index].value === docs_sended[j]){
                document.getElementById('select_asnad')[index].classList.add("selected_option");
                document.getElementById("div").innerHTML += "<br>"+document.getElementById('select_asnad')[index].text;
                break;
              }
              
            }
            
          }
        } 
    
    
        function checkfileds($filed){
          for (let j = 0; j < docs_sended.length; j++) {
              
              if($filed === docs_sended[j]){
    
                snack("این سند قبلا بارگذاری شده ، در صورت تمایل می توانید مجدد ارسال کنید","orange");
                break;
              }
            }
        }

        document.getElementById("select_asnad").addEventListener('change',function (e){
      if(e.target.value!="personal_image")
      checkfileds(e.target.value)
    })
      </script>
    <script>
      function snack(message,color) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  x.innerHTML = message;
  x.style.backgroundColor = color;
  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3500);
  }
  document.getElementById("tab_payeh").classList.add("selected_tab");


const tabs = document.querySelectorAll('[data-tab-value]')
        const tabInfos = document.querySelectorAll('[data-tab-info]')
        
        tabs.forEach(tab => {
        
            tab.addEventListener('click', () => {
                const target = document
                    .querySelector(tab.dataset.tabValue);
                  
                tabInfos.forEach(tabInfo => {
                    tabInfo.classList.remove('active')
                    console.log(tab)
                    tabs[0].classList.remove("selected_tab");
                    tabs[1].classList.remove("selected_tab");
                    tab.classList.add("selected_tab")
                  
                })
                target.classList.add('active');
           
            })
        })
      </script>
  </body>
</html>