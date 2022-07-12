 
            function selects(){  
                var ele=document.getElementsById('checkbox');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  

            alert('Hello');