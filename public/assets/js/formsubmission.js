    const url=document.getElementById('form').action;
    // console.log(url.split('/'));


    async function formsubmit(e) {
         e.preventDefault();
        let error=document.querySelectorAll('.error');
        error.forEach(function(el){
            el.innerText=''
        })
        // error.innerText=''
       
        const form = document.getElementById('form');
        const formdata = new FormData(form);
        // console.log(formdata);

        const response = await fetch(url, {
            method:"POST",
            body: formdata
        })
        const result = await response.json();
        if(response.status===422){
            Object.keys(result).forEach((field)=>{
                var adderror=document.getElementById(`error-${field}`);
                adderror.innerText=result[field];
            })
        }
        if(response.status==400){
            // console.log(result.email);
            var erroremail=document.getElementById(`error-email`);
            erroremail.innerText=result.email;
        }
        // console.log(response)
        if(result.success=='user found'){
            window.location.assign('/')
            return;
            // hiii
        }
        if(result.success=='user inserted successfully'){
            window.location.assign('/login')
            return;}
        
        // console.log(result);
    }