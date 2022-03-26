const url=window.location.href;
const page=url.substring(url.lastIndexOf('/')+1);
const parm=url.substring(url.lastIndexOf('?')+1);
function showDeleteMessage(){
    Snackbar.show({
        text: 'Deleted Successfully',
        pos: 'top-center',
        customClass:'snackbar-custom'
    });



}
//delete
if(parm.startsWith('deleted=true')) {

    setTimeout(showDeleteMessage, 100);
}
function submitForm(form) {
    var submitFormFunction = Object.getPrototypeOf(form).submit;
    submitFormFunction.call(form);
}
// screen animation
const searchInput=document.querySelector('.search_input');
const searchForm=document.querySelector('.search_form');
const errorSpan=document.querySelector('.error-span');
function checkInput(inputValue,searchForm){
    try{
        if(inputValue==="")throw new Error('input should not be empty');
        errorSpan.innerHTML="";
        return true;
    }
    catch(err){
        errorSpan.innerHTML=err.message
    }

}
if(searchForm){
  const btn=searchForm.querySelector('button');
  const filterSearch=searchForm.querySelector('.filter-search');
  filterSearch.addEventListener('change',e=>{
     searchInput.placeholder= e.target.value==='user'?'search for a user':'search for an exam';
  })
  btn.addEventListener('click',(e)=>{
      const check=checkInput(searchInput.value,searchForm);
      if(check)submitForm(searchForm);
  })

}
