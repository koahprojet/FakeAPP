$("#contactForm").submit(function(event){
    console.log('merci micka');
    event.preventDefault();
    submitForm();
});

function submitForm(){
    var login = $("#login").val();
    var password = $("#password").val();
 
    console.log('login saisie : ; login);
    console.log('password saisie : ; password);
}
