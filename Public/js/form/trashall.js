function trashalldialog(baseurl){
			var objects = new Array();
			var checks = document.getElementsByName("checkitem");
			var t = 0;
			for (var i = 0; i < checks.length; i++) {
				if (checks[i].checked) {
					objects[t] = checks[i].value;
					t++;
				}
			}
			if (t > 0) {
				var ifdel = window.confirm("确认删除选中条目？");
				if (!ifdel) {
					return;
				}
				
				 $.ajaxSetup({  
    async : false  
});  
	for (var i = 0; i < checks.length; i++) {
					var url=baseurl+"/"+objects[i];
			$.get(url,function(data,status){
				
});
			}
			
				alert("删除成功！");
				location.reload();
			}
	


}
function checkall() {
			var checks = document.getElementsByName("checkitem");
			var check0 = document.getElementById("check0");
			var toggle = true;
			for (var i = 0; i < checks.length; i++) {
				if (checks[i].checked) {
					toggle = false;
					break;
				}
			}
			if (toggle) {
				check0.checked = true;
				for (var i = 0; i < checks.length; i++) {
					checks[i].checked = true;
				}
			} else {
				check0.checked = false;
				for (var i = 0; i < checks.length; i++) {
					checks[i].checked = false;
				}
			}
		}