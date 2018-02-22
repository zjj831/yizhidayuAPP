//二次构造
function intercept(member_id,active_id){
    if (history.pushState){        
        if(!history.state){
            var thisLocation = location.href;
            history.replaceState({page:'intercept'},'','/test/index.php/Activity/Active/index/member_id/'+member_id+'/active_id/'+active_id+'');
            history.pushState({page:'current'},'',thisLocation);
            //已插入页面
            window.onpopstate = function(e) {            
                if(history.state && history.state.page === 'intercept') {
                    location.reload();
                }
            }
        }else{
            window.onpopstate = function(e) {
                //监听返回  非跨域
                if(history.state && history.state.page === 'current') {
                    location.reload();
                }else if(history.state && history.state.page === 'intercept'){
                    location.reload();
                }               
            }
        }        
    }  
}
      