//function to select any element
function select(name,all=false){
    if(all){
        return document.querySelectorAll(name)
    }
    return document.querySelector(name);
}

//function to hide any element
function hide(el,all=false){
   if(!all)el.style.display="none";
   else{
       el.forEach(el=>{
           el.style.display="none";
       })
   }

}
const unhide=function (el,all=false){
   if(!all)el.style.display="initial";
   else{
       el.forEach(el=>{
           el.style.display="initial";
       })
   }

}
/*function loadEditUsers(){
    const passwords=select('.hide_password',true);
    hide(passwords,true);


}*/
function generatepasswordInputs(){
    const markup1=` <div class="input-group">
    <div class="input-group-addon">
        <i class="fa fa-asterisk"></i>
    </div>
    <input type="password"  id="password" name="password" placeholder="Password" class="form-control">
</div>
<span class="text-secondary small w-100 mx-5">password should be at least 8 character with uppercase,numbers and symbols</span>`
const markup2=` <div class="input-group">
<div class="input-group-addon">
    <i class="fa fa-asterisk"></i>
</div>
<input type="password" id="password" name="password_confirmation" placeholder=" Confirm Password" class="form-control">
</div>`
document.querySelector('.hide_password-1').insertAdjacentHTML('afterbegin',markup1);
document.querySelector('.hide_password-2').insertAdjacentHTML('afterbegin',markup2);
}
function removePasswordInputs(){
    document.querySelector('.hide_password-1').innerHTML="";
    document.querySelector('.hide_password-2').innerHTML="";
}


//change password btn
if(document.querySelector('.edit_user')){
const changePassBtn=select('.change_password_btn');
//toggle password change
changePassBtn.addEventListener('click',()=>{
    if(select('.hide_password-1 .input-group')){
        removePasswordInputs();
        changePassBtn.innerText="change password";
    }
    else{
        generatepasswordInputs();
        changePassBtn.innerText="don't change passwords";
    }
    
    
});
}