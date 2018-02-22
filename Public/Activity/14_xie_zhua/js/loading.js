//获取浏览器页面可见高度和宽度
var _PageHeight = document.documentElement.clientHeight,
    _PageWidth = document.documentElement.clientWidth;
//计算loading框距离顶部和左部的距离（loading框的宽度为215px，高度为61px）
var _LoadingTop = _PageHeight > 61 ? (_PageHeight - 61) / 2 : 0,
    _LoadingLeft = _PageWidth > 215 ? (_PageWidth - 215) / 2 : 0;
//在页面未加载完毕之前显示的loading Html自定义内容
var _LoadingHtml = '<div id="loadingDiv" style="background:#F2F2F2;width:100%;height:100%;"><img style="width:2rem;height:3rem;position:absolute;top:3.5rem;left:50%;margin-left:-1rem;" src="https://yun.yizhidayu.com/common-loading_act.gif" alt=""></div>';
//呈现loading效果
document.write(_LoadingHtml);

window.onload = function () {
   var loadingMask = document.getElementById('loadingDiv');
   loadingMask.parentNode.removeChild(loadingMask);
};

//监听加载状态改变
document.onreadystatechange = completeLoading;

//加载状态为complete时移除loading效果
function completeLoading() {
    if (document.readyState == "complete") {
        var loadingMask = document.getElementById('loadingDiv');
        loadingMask.parentNode.removeChild(loadingMask);
    }
}