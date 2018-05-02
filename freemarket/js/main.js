function addToCart(itemId)
{
    console.log("js - addToCart");
    $.ajax({
        type: 'POST',
        url: "/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function (data) {
            if(data['success']){ 
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_'+ itemId).hide();
                $('#removeCart_'+ itemId).show();
            } 
        },
        error: function (request, status, error) {
        alert(request.responseText);
        }
    })
}

function removeFromCart(itemId)
{
    console.log("js - removeFromCart("+ itemId +")");
    $.ajax({
        type: 'POST',
        url: "/cart/removefromcart/"+ itemId +'/',
        dataType : 'json',
        success: function (data) {
            if(data['success']){ 
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_'+ itemId).hide();
                $('#removeCart_'+ itemId).show();
            } 
        },
        error: function (request, status, error) {
        alert(request.responseText);
        }
    })
}

function conversionPrice(itemId)
{
    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}

function getData(obj_form)
{
    var hData = {};
    $('input, textarea, select', obj_form).each(function(){
        if (this.name && this.name!='') {
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }

    });
    return hData;
};

function registerNewUser()
{
    var postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        url: "/user/register/",
        data: postData,
        dataType : 'json',
        success: function (data) {
            if(data['success']){
                alert ('Registration complete');

                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();

            } else {
                alert(data['message']);
            }

        }
    });
}

function logoutNANI()
{
    console.log('Logout');
    $.ajax({
        type: 'POST',
        url: '/user/logout/',
        success: function() {
            console.log('user logged out');
            $('#registerBox').show();
            $('#userBox').hide();
        }
    });
}

function login()
{
    var name = $('#loginName').val();
    var pass = $('#loginPass').val();

    var postData = "name="+ name + "&pass=" + pass;

    $.ajax({
        type: 'POST',
        url: "/user/login/",
        data: postData,
        dataType : 'json',
        success: function (data) {
            if(data['success']){
        
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();

            } else {
                alert(data['message']);
            }

        }
    });
}

function showRegisterBox()
{
    $("#registerBoxHidden").toggle(); { 
    } 
}

function updateUserData()
{
    console.log("updateUserData")
    var phone = $('#newPhone').val();
    var adress = $('#newAdress').val();
    var pass1 = $('#newPass1').val();
    var pass2 = $('#newPass2').val();
    var curPass = $('#curPass').val();
    var name = $('#newName').val();
    var bio = $('#newBio').val();

    var postData = {phone: phone,
                    adress: adress,
                    pass1: pass1,
                    pass2: pass2,
                    curPass: curPass,
                    name: name,
                    bio: bio};

    $.ajax({
        type: 'POST',
        async: true,
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#userLink').html(data['userName']);
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    });
}
