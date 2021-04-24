function validateform() {
    var name = document.forms["myform"]["name"].value;
    if (name == null || name == "") {
        alert("name must be filled out");
        document.forms["myform"]["name"].focus()
        return false;
    }

    /* var email=document.forms["myform"]["email"].value;
     if (validateEmail(email)==false) {
         alert("please enter valid email");
         document.forms["myform"]["email"].focus();
         return false;
     } 
     var pwd = document.forms["myform"]["pwd"].value;
     if (pwd.length < 8) {
         alert("password should be at least 8 character in length");
         document.forms["myform"]["pwd"].focus();
         return false;
     }

     var gender=document.forms["myform"]["gender"];
     var genderchecked=false;

     for (var i = 0; i<gender.length; i++) {
         if(gender[i].checked){
             genderchecked=true;
         }

         }
         if(genderchecked==false){
             alert("please choose gender")
             return false;
         }
         var hobbies=document.forms["myform"]["hobbies"];
         var hobbieschecked=false;
         for(var j=0;j<hobbies.length;j++){
             if (hobbies[j].checked) {
                 hobbieschecked=true;
                 break;
             }
         }
         if(hobbieschecked == false){
             alert("please choose at least one hobby");
             return false;
         }

         var occupation= document.forms["myform"]["occupation"].value;
         if(occupation == "0"){
             alert("please select your occupation");
             return false;
         }
     
         function validateEmail(email){
             var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
     return re.test(email);
         } 
     }
     */
