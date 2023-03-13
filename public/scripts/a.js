$( document ).ready(function() {
  
var mylen = $( "[required]" ).length;
for(var aa=0;aa<=mylen;aa++){
var ava = $( "[required]" )[aa];
// var  c = ava[0].closest("tr").find("label")[0];
// var b= $( "input[required]" ).closest("tr").siblings("td").siblings("label");
var c = jQuery(ava).closest("tr").find("label")[0];
jQuery(c).attr("class","req").html();
}
let oldvalue  = document.getElementById('credit-card').value;
if(oldvalue !=null || oldvalue !=""){
 
  fromDataBase(oldvalue);
}

    }
    
    );   

  $( "textarea" ).bind('input keyup keydown paste', function() {

        var elem=this;
        elem.style.height = "1px";
        elem.style.height = (elem.scrollHeight + 6)+"px";

});



$(function () {
   $("input[type=number]").change(function() {
  
   var max = parseInt($(this).attr('max'));
   var min = parseInt($(this).attr('min'));
   if ($(this).val() > max)
   {
      $(this).val(max);
   }
   else if ($(this).val() < min)
   {
      $(this).val(min);
   }       
 }); 
});




   $("[per=per]").on('input keyup keydown paste', function() {
        var el = this;
if($(this).attr( "pernum" )!=undefined){
setTimeout(function() {
// return /[0-9a-z]/i.test(event.key);
// var s = el.value.search(/[^\u0600\u06FF\s]/ig);
el.value=el.value.replace(/[A-Za-z]/g, '');
var ss=el.value.length;
var ss2=el.value;
var ss3=ss2.length;
var t=(/[^\u0600-\u06FF\s]/g).test(el.value[ss-1]);
var n=(/[^0-9]/g).test(el.value[ss-1]);
if(t==true&&n==true){
var newval=ss2.substr(0, ss3-1);
el.value = el.value.innerHTML= newval;

return false};
//  el.value=el.value().replace(/[^A-Z0-9]/gi, '');
        }, 0);
}else{
        setTimeout(function() {
            el.value = el.value.replace(/[^\u0600-\u06FF\s]/g, '');
            el.value = el.value.replace(/[ـ]/g, '');

        }, 0);
}
    });






   $("input[inputmode=numeric]").bind('input paste', function() {
        var el = this;
        setTimeout(function() {
            el.value = el.value.replace(/\D/g, '');
        }, 0);
    });


$("input[type=text]").prop("autocomplete","new-password");


// $("#dat").keypress
// return false;
// });

$( "#dat" ).on('focus paste input', function() {
var ff = document.getElementById("dat");
var vae = ff.value;
ff.onkeyup = function() {myFunction(this)};
function myFunction(e){
if(e){
ff.value = ff.value.replace(ff.value,vae);
return false;
}
}
});

$("#dat").persianDatepicker();
        $(function () {
       $("[per='per']").farsiInput();
        });

check();
function check()
{
  var ppp=document.getElementById("meli");
  var c=ppp.value;
  if( checkCodeMeli(c)){
$("#meli").prop("pattern","[0-9]{10}");
var d = document.getElementById("meli");

return true;}
  else{
$("#meli").prop("pattern","[a-z]");
    return false;}
}    

function checkCodeMeli(code)
{
  for (var i = 0; i < 10; i++)
   {
   var text = i.toString().repeat(10);
   if(code==text){return false;}
   }
  var L=code.length;
  if(L<10){return;}
  if(L<8 || parseInt(code,10)==0) return false;
  code=('0000'+code).substr(L+4-10);
  if(parseInt(code.substr(3,6),10)==0) return false;
  var c=parseInt(code.substr(9,1),10);
  var s=0;
  for(var i=0;i<9;i++)
    s+=parseInt(code.substr(i,1),10)*(10-i);
  s=s%11;
  return (s<2 && c==s) || (s>=2 && c==(11-s));
return true;
}




function checkcode(xv) {
console.log(xv);
var xv = xv || window.event;
var vr=xv.key;
var gh=xv ? xv.which:xv.keyCode;
var intRegex = /^[\u0600-\u06FF\s]+$/.test(vr);
if (isNaN(vr)&&vr.toString()!="Backspace"||vr==" "){return false;}
}
  
// start

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
      if (totalFileSize > 52428800) {
        alert("Maximum allowed file size including all files is 50MB.");
        return false;
      }
    };
  }

// end








input_credit_card = function(input)
{
    var format_and_pos = function(char, backspace)
    {
        var start = 0;
        var end = 0;
        var pos = 0;
        var separator = "-";
        var value = input.value;

        if (char !== false)
        {
            start = input.selectionStart;
            end = input.selectionEnd;

            if (backspace && start > 0) // handle backspace onkeydown
            {
                start--;

                if (value[start] == separator)
                { start--; }
            }
            // To be able to replace the selection if there is one
            value = value.substring(0, start) + char + value.substring(end);

            pos = start + char.length; // caret position
        }

        var d = 0; // digit count
        var dd = 0; // total
        var gi = 0; // group index
        var newV = "";
        var groups = /^\D*3[47]/.test(value) ? // check for American Express
        [4, 6, 5] : [4, 4, 4, 4];

        for (var i = 0; i < value.length; i++)
        {
            if (/\D/.test(value[i]))
            {
                if (start > i)
                { pos--; }
            }
            else
            {
                if (d === groups[gi])
                {
                    newV += separator;
                    d = 0;
                    gi++;

                    if (start >= i)
                    { pos++; }
                }
                newV += value[i];
                d++;
                dd++;
            }
            if (d === groups[gi] && groups.length === gi + 1) // max length
            { break; }
        }
        input.value = newV;

        if (char !== false)
        { input.setSelectionRange(pos, pos); }



var card=newV.replace(/[^0-9]/g,"");
if(card.length==16){
bank(card);
}else {
if($("#beforecard")){
$("#beforecard").replaceWith("<span id='beforecard' class='icon fixicon'>&#xe85d</span>");
}
}

    };

    input.addEventListener('keypress', function(e)
    {
        var code = e.charCode || e.keyCode || e.which;

        // Check for tab and arrow keys (needed in Firefox)
        if (code !== 9 && (code < 37 || code > 40) &&
        // and CTRL+C / CTRL+V
        !(e.ctrlKey && (code === 99 || code === 118)))
        {
            e.preventDefault();

            var char = String.fromCharCode(code);

            // if the character is non-digit
            // OR
            // if the value already contains 15/16 digits and there is no selection
            // -> return false (the character is not inserted)

            if (/\D/.test(char) || (this.selectionStart === this.selectionEnd &&
            this.value.replace(/\D/g, '').length >=
            (/^\D*3[47]/.test(this.value) ? 15 : 16))) // 15 digits if Amex
            {
                return false;
            }
            format_and_pos(char);
        }
    });
    
    // backspace doesn't fire the keypress event
    input.addEventListener('keydown', function(e)
    {
        if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
        {
            e.preventDefault();
            format_and_pos('', this.selectionStart === this.selectionEnd);
        }
    });
    
    input.addEventListener('paste', function()
    {
        // A timeout is needed to get the new value pasted
        setTimeout(function(){ format_and_pos(''); }, 50);
    });
    
    $("#credit-card").on('input',function(e){
      setTimeout(function(){format_and_pos('');},50);
    });
};



input_credit_card(document.getElementById('credit-card'));

function fromDataBase(cardData){
  document.getElementById('credit-card').value += cardData;
  $("#credit-card").trigger('input');
}

function checkCartDigit(code)
{
  
  var L=code.length;
  if(L<16 || parseInt(code.substr(1,10),10)==0 || parseInt(code.substr(10,6),10)==0){ return false;}
  var c=parseInt(code.substr(15,1),10);
  var s=0;
  var k,d;
  for(var i=0;i<16;i++)
  {
    k=(i%2==0) ? 2 :1;
    d=parseInt(code.substr(i,1),10)*k;
    s+=(d >9) ? d-9 :d;
  }  
  return ((s%10)==0);
}
var sbank;
function bank(ccv){


var ccvbank=ccv;
var i=8;

var t=ccvbank.substring(6,-16);


if(!vbank(t)){

if($("#beforecard")){
$("#beforecard").replaceWith("<span id='beforecard' class='icon fixicon'>&#xe85d</span>");
}
return false;

}
 
var sbank=0;
  if( checkCartDigit(ccvbank)){
    var number = ccvbank.substring(6,-16);
var b=bnk[number];
var a="./bank-iran/";
var adr= a+b+".png";
$("#beforecard").replaceWith("<span id='beforecard' class='icon im'><img class='ic' id='beforecardimg' style='width:32px;height:32px;margin-top:-7px;margin-right:-6px;' src=''></span>");
var imgToSwap = document.getElementById("beforecardimg");
imgToSwap.src=adr; // alert(ccvbank);
$("#credit-card").prop("pattern","[0-9]{4}-{0,1}[0-9]{4}-{0,1}[0-9]{4}-{0,1}[0-9]{4}");
  }else{
$("#credit-card").prop("pattern","[a-z]");
$("#beforecard").replaceWith("<span id='beforecard' class='icon fixicon'>&#xe85d</span>");

} 

}

function vbank(vb){

for(ob in bnk){

if(ob==vb){

return true;
}

}
}



// $("textarea").bind('input paste', function(){validateTextarea()});



$(document).on('keypress', 
 function (event) {
   if (event.which == '13' && event.target.tagName == 'TEXTAREA') {
       event.preventDefault();
    }
 });


$(document).ready(function () {
$("textarea,input:text").each(function(){
// $(this).attr('autocorrect', 'off').attr('autocapitalize', 'off').attr('spellcheck', 'false');
$(this).attr('spellcheck', 'false');

})

$("textarea,input:text").blur(function(){

if(this.value.trim()==""){this.value="";return};

})
$("select:hidden").parent().parent("tr").attr("style", "margin-top: 0 !important");
  });



$("[maxlength]").on('keypress input keyup keydown paste', function () {
if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);

});

