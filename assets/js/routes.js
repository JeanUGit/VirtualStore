function Fnc_Router(StrPage)
{
    const $divContainer = document.getElementById('MainContainer');
    let url = location.pathname.replace('index.php',StrPage);
    fetch(url)
    .then(response => response.text())
    .then(datos => $divContainer.innerHTML = datos)
    .catch(err => console.log(err));
}

document.addEventListener("DOMContentLoaded",()=>{
    if(location.hash) Fnc_Router(location.hash.substr(1));
});

window.addEventListener("hashchange", () =>{
    Fnc_Router(location.hash.substr(1));
});