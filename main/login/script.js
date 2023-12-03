$(document).ready(function() {

     setTimeout(()=>{
          $('.body-bg').removeClass('loginBGFX regBGFX');
          $('.body-bg').css('transform', 'translateX(0)');
          
          $('.body-transition-cover').removeClass('loginFX regFX');
          $('.body-transition-cover').css('transform', 'translateX(100%)');

          $('.prompt-container-log').removeClass('loginTransitionFX');
          $('.prompt-container-reg').removeClass('loginTransitionFX');
          $('.prompt-container-log').css('transform', 'translateX(0)');
          $('.prompt-container-reg').css('transform', 'translateX(0)');
     }, 900);

     $('#login_prompt_btn').click(function(){
          $('.body-transition-cover').css('transform', 'translateX(-100%)');
          $('.body-transition-cover').addClass('loginToRegisterTransitionFX');

          $('.prompt-container-reg').addClass('regToLoginContainerFX');
          
          setTimeout(()=>{
               window.location.href = 'index.php';
          }, 500);
     });

     $('#reg_prompt_btn').click(function(){
          $('.body-transition-cover').addClass('loginToRegisterTransitionFX');
          $('.prompt-container-log').addClass('loginToRegisterContainerFX');
          
          setTimeout(()=>{
               window.location.href = 'register.php';
          }, 500);
     });

     $('#register_form').submit(function(e){
          e.preventDefault();

          let data = $(this).serialize();

          $.ajax({
               type: "POST",
               url: "verify/ver_reg.php",
               data: data,
               cache: "false",
               dataType: "json",
               success: function(r) {
                    if(r.type=="error") {
                         alert(r.msg);
                    }
                    else if(r.type=="success") {
                         window.location.href = r.url;
                    }
               }
          });
     });

     $('#login_form').submit(function(e){
          e.preventDefault();

          let data = $(this).serialize();

          $.ajax({
               type: "POST",
               url: "verify/ver_login.php",
               data: data,
               cache: "false",
               dataType: "json",
               success: function(r) {
                    if(r.type=="error") {
                         alert(r.msg);
                    }
                    else if(r.type=="success") {
                         window.location.href = r.url;
                    }
               }
          });
     });
});