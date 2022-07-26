function abrirMenu(){
    elemento = document.getElementById("btnInfo");
    elemento.classList.toggle("show");

    userDropdownBtn = document.getElementById("userDropdown");
    if(userDropdownBtn.getAttribute('aria-expanded') == 'false'){
        userDropdownBtn.setAttribute('aria-expanded', 'true');
    }else{
        userDropdownBtn.setAttribute('aria-expanded', 'false');
    }
    
    dropDownInfo = document.getElementById('dropDownInfo');
    dropDownInfo.classList.toggle("show");
}