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
                alert("Bu e postaya ait bir kullanıcı yok.");
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