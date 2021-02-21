let animate;
let imgObj;

function moveTop(target){
    imgObj.style.top = parseInt(imgObj.style.top) - 10 + 'px';
    if(parseInt(imgObj.style.top) < target)
    {
        imgObj.style.top = target + 'px';
    }

    if(parseInt(imgObj.style.top) - 10 > target)
    {
        animate = setTimeout(function() {moveTop(target);},20);
    }
    else
    {
        //add the wait here, currently 5 seconds
        animate = setTimeout(function() {moveBack(400);},5000);
    }
}

function moveBack(target){
    imgObj.style.top = parseInt(imgObj.style.top) + 10 + 'px';
    if(parseInt(imgObj.style.top) > target)
    {
        imgObj.style.top = target + 'px';
    }

    if(parseInt(imgObj.style.top) + 10 < target)
    {
        animate = setTimeout(function() {moveBack(400);},20);
    }
}