function setActiveTab(evt)
{
    var i, tablinks;
    
    tablinks = document.getElementsByClassName("tablinks");
    for(i = 0; i < tablinks.length; i++)
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    
    evt.currentTarget.className += " active";
}

function changeContent(name)
{
    if(name === "reg")
    {
        var removeContent = document.getElementById('sign');
        removeContent.style.display = 'none';
        
        var addContent = document.getElementById(name);
        addContent.style.display = 'flex';
    }
    else if(name === "sign")
    {
        var removeContent = document.getElementById('reg');
        removeContent.style.display = 'none';
        
        var addContent = document.getElementById(name);
        addContent.style.display = 'flex';
    }
}