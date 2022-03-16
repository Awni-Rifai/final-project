function adminPage(){
    const updateInputs=document.querySelectorAll(".update_field");

    if(updateInputs){

        updateInputs.forEach(updateInput => {

            updateInput.addEventListener('focus',()=>{

                    updateInput.style.width="fit-content";
                    updateInputs.forEach(input=>{
                        if(input!==updateInput){
                            input.style.width="100%";
                        }
                    })

            })



        });
    }

}
adminPage();

