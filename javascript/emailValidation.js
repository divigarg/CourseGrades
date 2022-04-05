function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
    
    signupProcess(inputText.value);

}
else
{
    inputText.setCustomValidity("Enter a valid Email address");
    inputText.reportValidity();
}
}