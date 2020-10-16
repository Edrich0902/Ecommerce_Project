var toggled = false;
/**
 * Drops down the profile options menu beneath the user icon
 * @return {undefined}
 */
function profileOption()
{
    if(!toggled)
    {
        document.getElementById("profOpt").style.height = "125px";
        toggled = true;
    }
    else
    {
        document.getElementById("profOpt").style.height = "0px";
        toggled = false;
    }
}
/**
 * Navigates to the top of the page
 * @return {undefined}
 */
function toTop()
{
    document.documentElement.scrollTop = 0;
}
/**
 * Manages the navigation for the website
 * @param {type} destination
 * @return {undefined}
 */
function navigate(destination)
{
    switch(destination)
    {
        case 'home':
            window.location.href = "index.php";
            break;    
        case 'products':
            window.location.href = "products.php";
            break;    
        case 'about':
            window.location.href = "about.php";
            break;    
        case 'services':
            window.location.href = "services.php";
            break;    
        case 'registerSignIn':
            window.location.href = "registerSignIn.php";
            break;    
        case 'guide':
            window.location.href = "guide.php";
            break;    
        case 'cart':
            window.location.href = "cart.php";
            break;    
        case 'orders':
            window.location.href = "orders.php";
            break;    
    }
}

function logout()
{
    window.location.href = "session_destroyer.php";
}

var sideToggled = false;
function changeHam()
{
    document.getElementById("menu").classList.toggle("change");
    
    if(!sideToggled)
    {
        document.getElementById("side").style.height = "100%";
        document.getElementById("side").style.width = "175px";
        document.getElementById("main").style.marginLeft = "175px";
        sideToggled = true;
    }
    else
    {
        document.getElementById("side").style.height = "0px";
        document.getElementById("side").style.width = "0px";
        document.getElementById("main").style.marginLeft = "0px";
        sideToggled = false;
    }
}