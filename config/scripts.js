function elementToggle(a){
    topMenu=window.document.getElementById(a);
    style = window.getComputedStyle(topMenu,"");
    topMenu.style.display = (style.display === 'none')?'block':'none';
   /* if(topMenu.style.visibility==='hidden'||''){
        topMenu.style.visibility='visible';
    }
    else{
        topMenu.style.visibility='hidden';
    };*/
    }
function elementHide(a){
    topMenu=window.document.getElementById(a);

    topMenu.style.visibility='hidden';
}
    /*
    if(topMenu.style.marginTop=='-100em'){
       topMenu.style.marginTop='0em';}
   else{topMenu.style.marginTop='-100em';}
    if(topMenu.style.right=='0'){
        topMenu.style.right='-200';
    }else{
        topMenu.style.right='0';
    }*/
function mbFrameLoader(frameSrc){

   fid=window.top.frames[1];
   fid.contentWindow.location=`frameSrc`;

}
