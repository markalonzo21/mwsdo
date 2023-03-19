<style>
     #message{
                position: fixed;
                top: 20px;
                right: 40px;
                width: 300px;
                padding-top: 25px;
                padding-bottom: 25px;
                background-color: dodgerblue;
                box-shadow: 1px 1px 6px dimgray;
                transition: 0.7s;
                transform:translateY(-100px);
                color: white;
                font-size: 0.8em;
                text-align: center;
                z-index: 999999;
                font-size: 1.2em;
                text-shadow: 2xp 2px 4px black;
    }
</style>
 <div id="message"></div>
<script>
    
    function message_mod(c,m,col){
        window.setTimeout(()=>{ 
            message.style.backgroundColor=col;
            message.innerHTML=m;
            message.style.transform="translateY(0px)";
            window.setTimeout(()=>{
                message.style.transform="translateY(-100px)"; 

             },2000);
        },2000);
        
    }

</script>