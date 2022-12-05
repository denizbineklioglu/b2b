var url = "http://localhost:8081/b2b";

function registerbutton(){
   document.getElementById('registerbuton').disabled = true;

    var data = $('#bayikayitform').serialize();
    $.ajax({

        type    : "POST",
        url     : url + "/inc/register.php",                 
        data    : data, 
        success : function(result){
            if($.trim(result) == "empty"){

                alert("Lütfen boş alan bırakmayınız.");
                document.getElementById('registerbuton').disabled = false;

            }else if($.trim(result) == "format"){

                alert("E Posta formatı hatalı.");
                document.getElementById('registerbuton').disabled = false;

            }else if($.trim(result) == "match"){

                alert("Şifreler Uyuşmadı.");
                document.getElementById('registerbuton').disabled = false;

            }else if($.trim(result) == "already"){

                alert("Bu e-posta adına ait bir bayi zaten kayıtlı.");
                document.getElementById('registerbuton').disabled = false;

            }else if($.trim(result) == "error"){

                alert("Bir hata oluştu.");
                document.getElementById('registerbuton').disabled = false;

            }else if($.trim(result) == "ok"){
                alert("Üyeliğiniz başarıyla oluşturuldu. Yönetici onayından sonra aktifleştirilecektir.");
                window.location.href = url;
            }
        }
    })
}

function loginbutton(){
    document.getElementById('registerbuton').disabled = true;
    var data = $('#bayigirisform').serialize();

    $.ajax({
        type    : "POST",
        url     : url + "/inc/giris.php",
        data    : data,
        success : function(result){
            if($.trim(result) == "empty"){
                alert("Lütfen boş alan bırakmayınız.");
                document.getElementById('registerbuton').disabled = false;
            }else if($.trim(result) == "none"){
                alert("Bu e postaya veya bayi koduna ait bir kullanıcı yok.");
                document.getElementById('registerbuton').disabled = false;
            }else if($.trim(result) == "passive"){
                alert("Üyeliğiniz pasif durumdadır.");
                document.getElementById('registerbuton').disabled = false;    
            }else if($.trim(result) == "false"){
                alert("Email veya şifre hatalı.");
                document.getElementById('registerbuton').disabled = false;
            }else if($.trim(result) == "ok"){
                alert("Giriş Yapıldı.");
                window.location.href = url;
            }
        }

    })
}


function profileupdate(){
    document.getElementById('profilebutton').disabled = true;
 
     var data = $('#profileform').serialize();
     $.ajax({
 
         type    : "POST",
         url     : url + "/inc/profileUpdate.php",                 
         data    : data, 
         success : function(result){
             if($.trim(result) == "empty"){
 
                 alert("Lütfen boş alan bırakmayınız.");
                 document.getElementById('profilebutton').disabled = false;
 
             }else if($.trim(result) == "format"){
 
                 alert("E Posta formatı hatalı.");
                 document.getElementById('profilebutton').disabled = false;
             }else if($.trim(result) == "already"){
 
                 alert("Bu e-posta adına ait bir bayi zaten kayıtlı.");
                 document.getElementById('profilebutton').disabled = false;
 
             }else if($.trim(result) == "error"){
 
                 alert("Bir hata oluştu.");
                 document.getElementById('profilebutton').disabled = false;
 
             }else if($.trim(result) == "ok"){
                 alert("Profiliniz Başarıyla Güncellendi");
                 window.location.reload();
             }
         }
     })
 }

function passwordupdate(){
    document.getElementById('passwordbutton').disabled = true;
 
     var data = $('#passwordform').serialize();
     $.ajax({
 
         type    : "POST",
         url     : url + "/inc/passwordUpdate.php",                 
         data    : data, 
         success : function(result){
             if($.trim(result) == "empty"){
 
                 alert("Lütfen boş alan bırakmayınız.");
                 document.getElementById('passwordbutton').disabled = false;

             }else if($.trim(result) == "match"){
 
                 alert("Şifreler Uyuşmadı.");
                 document.getElementById('passwordbutton').disabled = false;

             }else if($.trim(result) == "error"){
 
                 alert("Bir hata oluştu.");
                 document.getElementById('passwordbutton').disabled = false;
 
             }else if($.trim(result) == "ok"){
                 alert("Şifreniz Başarıyla Güncellendi");
                 window.location.href = url + "/profile.php?process=profile";
             }
         }
     })
 }