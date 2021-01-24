function checkemail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)

} 

function register () {
    let fullname = document.getElementById('fullname').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let password = document.getElementById('password').value;
}

if(_.isempty(fullname)) {
    document.getElementById('fullname-err').innerHTML = 'Vui lòng nhập họ và tên';
}else if (fullname.trim().length <=5) {
    fullname ='';
    document.getElementById('fullname-err').innerHTML = 'Không được nhỏ hơn 5 kí tự';
}else if (fullname.trim().length > 50) {
    fullname ='';
    document.getElementById('fullname-err').innerHTML = 'Không được lớn hơn 50 kí tự';
}else {
    document.getElementById('fullname-err').innerHTML = '';
}



if(_.isempty(email)) {
    document.getElementById('email-err').innerHTML = 'Vui lòng nhập Email';
}else if (!checkemail()) {
    email ='';
    document.getElementById('email-err').innerHTML = 'Eamil không dúngd định dạng';
}else {
    document.getElementById('email-err').innerHTML = '';
}


if(_.isempty(phone)) {
    document.getElementById('phone-err').innerHTML = 'Vui lòng nhập SĐT';
}else if (phone.trim().length > 10 ) {
    phone ='';
    document.getElementById('phone-err').innerHTML = 'SĐT không đúng';
}else {
    document.getElementById('phone-err').innerHTML = '';
}