function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}
function CheckEmpty(){
	  
    if(document.getElementById('user').value === ''){
    document.getElementById('u').innerHTML = 'لطفا نام کاربری را وارد نمایید';
    return false;
    }else{
    document.getElementById('u').innerHTML = '';
    }

	if(document.getElementById('pass').value === ''){
    document.getElementById('p').innerHTML = 'لطفا کلمه عبور را وارد نمایید';
    return false;
    }else{
    document.getElementById('p').innerHTML = '';
    }
	
	if(document.getElementById('name').value === ''){
	    document.getElementById('n').innerHTML = 'لطفا نام و نام خانوادگی را وارد نمایید';
	    return false;
	    }else{
	    document.getElementById('n').innerHTML = '';
	 }
	if(document.getElementById('melicode').value === ''){
	    document.getElementById('mc').innerHTML = 'لطفا کد ملی خود را وارد نمایید';
	    return false;
	    }else{
	    document.getElementById('mc').innerHTML = '';
	 }
	if(document.getElementById('age').value === ''){
	    document.getElementById('a').innerHTML = ' سن وارد نمایید';
	    return false;
	    }else{
	    document.getElementById('a').innerHTML = '';
	 }
	if(document.getElementById('mobile').value === ''){
	    document.getElementById('m').innerHTML = 'لطفا شماره تماس خود را وارد نمایید';
	    return false;
	    }else{
	    document.getElementById('m').innerHTML = '';
	 }
	if(document.getElementById('capcha').value === ''){
	    document.getElementById('c').innerHTML = 'لطفا کد امنیتی را وارد نمایید';
	    return false;
	    }else{
	    document.getElementById('c').innerHTML = '';
	 }
}
function imposeMaxLength(Object, MaxLen)
{
  return (Object.value.length <= MaxLen);
}