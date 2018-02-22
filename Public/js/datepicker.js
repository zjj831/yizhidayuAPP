/**
* @author: Mr,guoen
*/
//日期选择控件
function datePicker(element,option){         
    //基础架构
    //解析值
    if($(element).val()!==''){
        var nowDate=strToDate($(element).val(),option);
    }else{
        var nowDate=new Date();               
    }; 
    var curYear=nowDate.getFullYear(),
        curMonth=nowDate.getMonth(),
        curDay=nowDate.getDate(),
        curHour=nowDate.getHours(),
        curMin=nowDate.getMinutes(),
        curSec=nowDate.getSeconds(),
        enterYear=nowDate.getFullYear(),
        enterMonth=nowDate.getMonth(),
        dayCount=getDate(curYear, curMonth),
        startYear=curYear-9,    
        month=monthShow(curMonth,option.monthNames),
        setHead="<div class='ui-date-header clear'>"+
                    "<div class='ui-date-prev'></div>"+
                    "<div class='ui-date-list'>"+
                        "<div class='ui-date-year' show='0'>"+
                            "<div class='ui-date-year-active'></div>"+
                            "<div class='ui-date-year-cate'></div>"+
                        "</div>"+
                        "<div class='ui-date-year-list scrollBar'></div>"+                                                             
                    "</div>"+
                    "<div class='ui-date-block'>年</div>"+
                    "<div class='ui-date-list'>"+
                        "<div class='ui-date-month' show='0'>"+
                            "<div class='ui-date-month-active'></div>"+
                            "<div class='ui-date-month-cate'></div>"+
                        "</div>"+
                        "<div class='ui-date-month-list scrollBar'>"+

                        "</div>"+
                    "</div>"+
                    "<div class='ui-date-next'></div>"+
                "</div>",        
        setBody="<div class='ui-date-week clear'>"+                                                                            
                "</div>"+
                "<div class='ui-date-day clear'></div>",                    
        setTime="<div class='ui-date-time'>"+
                    "<div class='ui-date-time-instr'>时间</div>"+
                    "<div class='ui-date-curtime'>"+
                        "<div class='ui-date-curtim-mm ui-date-hour'></div>"+
                        "<div class='ui-date-curtim-mm'>:</div>"+
                        "<div class='ui-date-curtim-mm ui-date-min'></div>"+
                        "<div class='ui-date-curtim-mm'>:</div>"+
                        "<div class='ui-date-curtim-mm ui-date-sec'></div>"+
                    "</div>"+
                "</div>"+
                "<div class='ui-date-time'>"+
                    "<div class='ui-date-time-instr'>时</div>"+                                                    
                    "<div class='ui-date-hour-bar'>"+
                         "<div class='ui-date-hour-in'>"+
                             "<div class='ui-date-hour-inbtn'></div>"+
                         "</div>"+
                     "</div>"+
                 "</div>"+    
                 "<div class='ui-date-time'>"+
                    "<div class='ui-date-time-instr'>分</div>"+                                                    
                    "<div class='ui-date-min-bar'>"+
                        "<div class='ui-date-min-in'>"+
                            "<div class='ui-date-min-inbtn'></div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
                "<div class='ui-date-time'>"+
                    "<div class='ui-date-time-instr'>秒</div>"+                                                    
                    "<div class='ui-date-sec-bar'>"+
                        "<div class='ui-date-sec-in'>"+
                            "<div class='ui-date-sec-inbtn'></div>"+
                        "</div>"+
                    "</div>"+
                "</div>",
        setFoot="<div class='ui-date-bottom'>"+
                    "<div class='ui-date-now'><div class='ui-date-now-icon'></div>现在</div>"+
                    "<div class='ui-date-enter'>确认</div>"+
                "</div>";          

    function strToDate(str,option) {        
        if(option.showTime===true){
            var tempStrs = str.split(" ");
            var dateStrs = tempStrs[0].split("-");
            var year = parseInt(dateStrs[0], 10);
            var month = parseInt(dateStrs[1], 10) - 1;
            var day = parseInt(dateStrs[2], 10);
            var timeStrs = tempStrs[1].split(":");
            var hour = parseInt(timeStrs [0], 10);
            var minute = parseInt(timeStrs[1], 10);
            var second = parseInt(timeStrs[2], 10);
            var date = new Date(year, month, day, hour, minute, second);
        }else{
            var dateStrs =str.split("-");
            var year = parseInt(dateStrs[0], 10);
            var month = parseInt(dateStrs[1], 10) - 1;
            var day = parseInt(dateStrs[2], 10);  
            var date = new Date(year, month, day, 00, 00, 00);
        }              
        return date;
    }                

    function mainPart(){
        dayCount=getDate(curYear, curMonth);      
        dayList(dayCount,curYear,curMonth,curDay,enterYear,enterMonth);
        month=monthShow(curMonth,option.monthNames);
        $("#ui-datepicker .ui-date-year-active").html(curYear);    
        $("#ui-datepicker .ui-date-month-active").html(month);                          
        $("#ui-datepicker .ui-date-day-mm").click(function(){
            $("#ui-datepicker .ui-date-year-list,#ui-datepicker .ui-date-month-list").hide(0);
            $("#ui-datepicker .ui-date-year,#ui-datepicker .ui-date-month").attr('show','0');
            $(this).addClass('active').siblings().removeClass('active');            
            curDay=parseInt($(this).text()); 
            enterYear=curYear;
            enterMonth=curMonth;
        });
    };        
    function dayList(dayCount,curYear,curMonth,curDay,enterYear,enterMonth){
        var dayDay=new Date(curYear,curMonth,1).getDay();
        $("#ui-datepicker .ui-date-day").html("");
        for(var l=0;l<dayDay;l++){
            $("#ui-datepicker .ui-date-day").append("<div class='ui-date-day-md'></div>");
        }       
        for(var d=1;d<=dayCount;d++){                        
            $("#ui-datepicker .ui-date-day").append("<div class='ui-date-day-mm ui-date-day-md'>"+d+"</div>");
            if(d===curDay&&enterYear===curYear&&enterMonth===curMonth){
                $("#ui-datepicker .ui-date-day-mm:eq("+(d-1)+")").addClass('active');
            }
        }       
    };   
    function monthShow(month,monthNames){
        switch(month){        
            case 0:return monthNames[0];                            
            case 1:return monthNames[1]; 
            case 2:return monthNames[2];
            case 3:return monthNames[3];
            case 4:return monthNames[4]; 
            case 5:return monthNames[5];
            case 6:return monthNames[6]; 
            case 7:return monthNames[7];
            case 8:return monthNames[8];
            case 9:return monthNames[9];
            case 10:return monthNames[10];
            case 11:return monthNames[11];
        }
    };            
    function getDate(year, month){
        month=parseInt(month)+1;
        return new Date(year, month, 0).getDate(); 
    };  
    //时间拖拽函数
    function timeMove(element,appear,comp,mtype){
        $(element).mousedown(function(e){
            var curPageX=e.pageX,
                curWidth=$(element).parent().width()-$(element).children().width(),
                curComp=curWidth/comp,
                curLeft=parseFloat($(element).css('left'));
            $(this).children().addClass("cur");
            $(this).parent().parent().css('cursor','pointer');
            $("body").css({"-moz-user-select":"none","-webkit-user-select":"none","-ms-user-select":"none","-khtml-user-select":"none","user-select":"none"});
            $(document).mousemove(function(ev){
                var mPageX=curLeft+ev.pageX-curPageX;
                if(mPageX>curWidth){ mPageX=curWidth }
                else if(mPageX<0){ mPageX=0 }else{
                    mPageX=Math.round(mPageX/curComp)*curComp;
                };                        
                var mHour=Math.round(mPageX/curComp);
                if(mtype==='hour'){
                    curHour=mHour;
                }else if(mtype==='min'){
                    curMin=mHour;
                }else{
                    curSec=mHour;
                }
                if(mHour<10){mHour="0"+mHour};
                $(appear).text(mHour);
                $(element).css("left",mPageX);                  
                $(document).mouseup(function(){
                    $(document).unbind('mousemove');
                    $(element).children().removeClass("cur");
                    $(element).parent().parent().css('cursor','default');
                });
            });
        });
    }             
    //读取当前时间按钮位置
    function btnOffset(element,comp,curMath){
        var curWidth=$(element).parent().width()-$(element).children().width(),
        curLeft=parseFloat(curWidth/comp*curMath);
        $(element).css('left',curLeft);                        
    };

    //读取基本配置       
    (option.showTime!==true) ? option.showTime=false:option.showTime=true;          
    //载入布局                            
    $("#ui-datepicker").append(setHead+setBody+setTime+setFoot);
    //初始化当前时间  
    function loadTime(option){
        var outMonth=curMonth+1,outDay=curDay,outHour=curHour,outMin=curMin,outSec=curSec;
        (outMonth<10)?outMonth='0'+outMonth:true;
        (outDay<10)?outDay='0'+outDay:true;
        (outHour<10)?outHour='0'+outHour:true;
        (outMin<10)?outMin='0'+outMin:true;
        (outSec<10)?outSec='0'+outSec:true;        
        $("#ui-datepicker .ui-date-hour").html(outHour); 
        $("#ui-datepicker .ui-date-min").html(outMin); 
        $("#ui-datepicker .ui-date-sec").html(outSec);
        btnOffset("#ui-datepicker .ui-date-hour-in",23,curHour);
        btnOffset("#ui-datepicker .ui-date-min-in",59,curMin);
        btnOffset("#ui-datepicker .ui-date-sec-in",59,curSec);
        if(option.showTime===true){
            $(element).val(curYear+"-"+outMonth+"-"+outDay+" "+outHour+":"+outMin+":"+outSec); 
        }else{
            $(element).val(curYear+"-"+outMonth+"-"+outDay); 
        }
    }        
    //载入配置
    loadTime(option);
    mainPart();     
    timeMove("#ui-datepicker .ui-date-hour-in","#ui-datepicker .ui-date-hour",23,'hour');
    timeMove("#ui-datepicker .ui-date-min-in","#ui-datepicker .ui-date-min",59,'min');
    timeMove("#ui-datepicker .ui-date-sec-in","#ui-datepicker .ui-date-sec",59,'sec');        

    if(option.showTime===false){
        $("#ui-datepicker .ui-date-time").hide(0);
    }
    for(var w=0;w<option.daysOfWeek.length;w++){
        $("#ui-datepicker .ui-date-week").append(
            "<div class='ui-date-week-md'>"+option.daysOfWeek[w]+"</div>"
        );
    };
    for(var m=0;m<option.monthNames.length;m++){
        $("#ui-datepicker .ui-date-month-list").append(
            "<div class='ui-date-month-md' data="+m+">"+option.monthNames[m]+"</div>"
        );
    };        
    $("#ui-datepicker .ui-date-year-active").html(curYear);    
    $("#ui-datepicker .ui-date-month-active").html(month);    
    for(var d=startYear;d<curYear+11;d++){
        $("#ui-datepicker .ui-date-year-list").append(
            "<div class='ui-date-year-md'>"+d+"</div>"    
        );
    };            

    //事件绑定        
    $("#ui-datepicker").click(function(e){
        e.stopPropagation();
    }); 
    $("#ui-datepicker .ui-date-year").click(function(e){  
        if($(this).attr('show')==='0'){
            $("#ui-datepicker .ui-date-year-list").slideDown(200);
            $("#ui-datepicker .ui-date-month-list").hide(0);
            $(this).attr('show','1');
        }else{
            $("#ui-datepicker .ui-date-year-list").slideUp(200);
            $("#ui-datepicker .ui-date-month-list").hide(0);
            $(this).attr('show','0');
        }                        
        e.stopPropagation();
    });        
    $("#ui-datepicker .ui-date-prev").click(function(e){
        if(curMonth>0){
            curMonth=curMonth-1;
        }else{
            curYear=curYear-1;
            curMonth=11;
        }
        mainPart();
        e.stopPropagation();
    });   
    $("#ui-datepicker .ui-date-next").click(function(e){
        if(curMonth<11){
            curMonth=curMonth+1;
        }else{
            curYear=curYear+1;
            curMonth=0;
        }
        mainPart();
        e.stopPropagation();
    });   

    $("#ui-datepicker .ui-date-year-md").click(function(e){
        curYear=parseInt($(this).text());
        $("#ui-datepicker .ui-date-year-active").html($(this).text());
        $("#ui-datepicker .ui-date-year-list").slideUp(200);
        $("#ui-datepicker .ui-date-year").attr('show','0');
        mainPart();
        e.stopPropagation();
    });        
    $("#ui-datepicker .ui-date-month").click(function(e){
        if($(this).attr('show')==='0'){
            $("#ui-datepicker .ui-date-month-list").slideDown(200);
            $("#ui-datepicker .ui-date-year-list").hide(0);
            $(this).attr('show','1');
        }else{
            $("#ui-datepicker .ui-date-month-list").slideUp(200);
            $("#ui-datepicker .ui-date-year-list").hide(0);
            $(this).attr('show','0');
        }                      
        e.stopPropagation();
    });  
    $("#ui-datepicker .ui-date-month-md").click(function(e){
        curMonth=parseInt($(this).attr('data'));
        $("#ui-datepicker .ui-date-month-active").html($(this).text());
        $("#ui-datepicker .ui-date-month-list").slideUp(200);   
        $("#ui-datepicker .ui-date-month").attr('show','0');
        mainPart();
        e.stopPropagation();
    });                       
    $(document).click(function(){
        $("#ui-datepicker").hide(0);
    });                      
    $("#ui-datepicker .ui-date-enter").click(function(){        
        loadTime(option);
        $("#ui-datepicker").hide(0);
    });   
    $("#ui-datepicker .ui-date-now").click(function(e){
        $(element).val('').click();
        e.stopPropagation();
    }); 
}; 