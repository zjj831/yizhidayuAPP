// JavaScript Document/*!
/*!
 * =====================================================
 * 
 	地区信息
 *
 * =====================================================
 */
var CitiesData=[
	{name:"",sub:[{name:""}]},
	{name:"",sub:[{name:""}]},
	{name:"北京",sub:[	{name:""},{name:""},
						{name:"东城区"},{name:"西城区"},{name:"崇文区"},{name:"宣武区"},{name:"朝阳区"},{name:"海淀区"},{name:"丰台区"},
						{name:"石景山区"},{name:"房山区"},{name:"通州区"},{name:"顺义区"},{name:"昌平区"},{name:"大兴区"},{name:"怀柔区"},
						{name:"平谷区"},{name:"门头沟区"},{name:"密云县"},{name:"延庆县"},{name:"其他"},
						{name:""},{name:""}
					]},
	{name:"天津",sub:[	{name:""},{name:""},
						{name:"和平区"},{name:"河西区"},{name:"河北区"},{name:"河东区"},{name:"南开区"},{name:"红桥区"},
						{name:"东丽区"},{name:"西青区"},{name:"津南区"},{name:"北辰区"},{name:"武清县"},{name:"宝坻县"},
						{name:"蓟县"},{name:"静海县"},{name:"宁河县"},{name:"塘沽"},{name:"大港"},{name:"汉沽"},
						{name:""},{name:""}
					]},
	{name:"上海",sub:[	{name:""},{name:""},
						{name:"黄浦区"},{name:"徐汇区"},{name:"长宁区"},{name:"静安区"},{name:"普陀区"},{name:"闸北区"},
						{name:"虹口区"},{name:"杨浦区"},{name:"浦东新区"},{name:"奉贤区"},{name:"青浦区"},{name:"松江区"},
						{name:"嘉定区"},{name:"金山区"},{name:"闵行区"},{name:"宝山区"},
						{name:""},{name:""}
					]},
	{name:"重庆",sub:[	{name:""},{name:""},
						{name:"渝中区"},{name:"大渡口区"},{name:"江北区"},{name:"南岸区"},{name:"沙坪坝区"},{name:"九龙坡区"},
						{name:"北碚区"},{name:"万盛区"},{name:"双桥区"},{name:"渝北区"},{name:"巴南区"},{name:"万州区"},
						{name:"涪陵区"},{name:"黔江区"},{name:"长寿区"},{name:"江津区"},{name:"合川区"},{name:"永川区"},
						{name:"江津区"},{name:"江津区"},{name:"江津区"},{name:"江津区"},{name:"江津区"},{name:"江津区"},
						{name:"南川区"},{name:"綦江区"},{name:"大足区"},
						{name:""},{name:""}
					]},
	{name:"河北",sub:[	{name:""},{name:""},
						{name:"石家庄"},{name:"唐山"},{name:"邯郸"},{name:"保定"},{name:"沧州"},{name:"邢台"},
						{name:"廊坊"},{name:"承德"},{name:"张家口"},{name:"衡水"},{name:"秦皇岛"},
						{name:""},{name:""}
					]},
	{name:"河南",sub:[	{name:""},{name:""},
						{name:"郑州"},{name:"开封"},{name:"洛阳"},{name:"平顶"},{name:"安阳"},{name:"鹤壁"},
						{name:"新乡"},{name:"焦作"},{name:"濮阳"},{name:"许昌"},{name:"漯河"},{name:"三门峡"},
						{name:"南阳"},{name:"商丘"},{name:"信阳"},{name:"周口"},{name:"驻马"},{name:"济源"},
						{name:""},{name:""}
					]},
	{name:"云南",sub:[	{name:""},{name:""},
						{name:"昆明"},{name:"曲靖"},{name:"玉溪"},{name:"保山"},{name:"昭通"},{name:"丽江"},
						{name:"思茅"},{name:"临沧"},{name:"文山"},{name:"红河"},{name:"西双版纳"},{name:"楚雄"},
						{name:"大理"},{name:"德宏"},{name:"怒江"},{name:"迪庆"},
						{name:""},{name:""}
					]},
	{name:"辽宁",sub:[	{name:""},{name:""},
						{name:"沈阳"},{name:"大连"},{name:"鞍山"},{name:"抚顺"},{name:"本溪"},{name:"丹东"},
						{name:"锦州"},{name:"营口"},{name:"阜新"},{name:"辽阳"},{name:"盘锦"},{name:"铁岭"},
						{name:"朝阳"},{name:"葫芦岛"},
						{name:""},{name:""}
					]},
	{name:"黑龙江",sub:[	{name:""},{name:""},
						{name:"哈尔滨"},{name:"齐齐哈尔"},{name:"佳木斯"},{name:"鹤岗"},{name:"大庆"},{name:"鸡西"},
						{name:"双鸭山"},{name:"伊春"},{name:"牡丹江"},{name:"黑河"},{name:"七台河"},{name:"绥化"},
						{name:"大兴安岭"},
						{name:""},{name:""}
					]},
	{name:"湖南",sub:[	{name:""},{name:""},
						{name:"长沙"},{name:"株洲"},{name:"湘潭"},{name:"衡阳"},{name:"邵阳"},{name:"岳阳"},
						{name:"常德"},{name:"张家界"},{name:"益阳"},{name:"郴州"},{name:"永州"},{name:"怀化"},
						{name:"娄底"},
						{name:""},{name:""}
					]},
	{name:"安徽",sub:[	{name:""},{name:""},
						{name:"合肥"},{name:"阜阳"},{name:"亳州"},{name:"淮北"},{name:"宿州"},{name:"淮南"},
						{name:"蚌埠"},{name:"滁州"},{name:"六安"},{name:"安庆"},{name:"铜陵"},{name:"池州"},
						{name:"芜湖"},{name:"马鞍山"},{name:"宣城"},{name:"黄山"},
						{name:""},{name:""}
					]},
	{name:"山东",sub:[	{name:""},{name:""},
						{name:"枣庄"},{name:"东营"},{name:"烟台"},{name:"潍坊"},{name:"济宁"},{name:"泰安"},
						{name:"威海"},{name:"日照"},{name:"莱芜"},{name:"临沂"},{name:"德州"},{name:"聊城"},
						{name:"滨州"},{name:"菏泽"},
						{name:""},{name:""}
					]},
	{name:"新疆维吾尔",sub:[	{name:""},{name:""},
						{name:"乌鲁木齐"},{name:"克拉玛依"},{name:"吐鲁番"},{name:"哈密"},{name:"昌吉"},{name:"阜康"},
						{name:"米泉"},{name:"博乐"},{name:"库尔勒"},{name:"阿克苏"},{name:"阿图什"},{name:"喀什"},
						{name:"和田"},{name:"奎屯"},{name:"伊宁"},{name:"塔城"},{name:"乌苏"},{name:"阿勒泰"},
						{name:"石河子"},{name:"阿拉尔"},
						{name:""},{name:""}
					]},
	{name:"江苏",sub:[	{name:""},{name:""},
						{name:"南京"},{name:"镇江"},{name:"常州"},{name:"无锡"},{name:"苏州"},{name:"连云港"},
						{name:"盐城"},{name:"南通"},{name:"徐州"},{name:"宿迁"},{name:"淮安"},{name:"扬州"},
						{name:"泰州"},
						{name:""},{name:""}
					]},
	{name:"浙江",sub:[	{name:""},{name:""},
						{name:"杭州"},{name:"宁波"},{name:"温州"},{name:"绍兴"},{name:"湖州"},{name:"嘉兴"},
						{name:"金华"},{name:"衢州"},{name:"舟山"},{name:"台州"},{name:"丽水"},
						{name:""},{name:""}
					]},
	{name:"江西",sub:[	{name:""},{name:""},
						{name:"南昌"},{name:"景德镇"},{name:"九江"},{name:"萍乡"},{name:"新余"},{name:"鹰潭"},
						{name:"赣州"},{name:"宜春"},{name:"上饶"},{name:"吉安"},{name:"抚州"},
						{name:""},{name:""}
					]},
	{name:"湖北",sub:[	{name:""},{name:""},
						{name:"武汉"},{name:"黄石"},{name:"襄樊"},{name:"荆州"},{name:"宜昌"},{name:"十堰"},
						{name:"孝感"},{name:"荆门"},{name:"鄂州"},{name:"黄冈"},{name:"咸宁"},{name:"随州"},
						{name:"恩施"},{name:"潜江"},{name:"仙桃"},{name:"天门"},{name:"神农架"},
						{name:""},{name:""}
					]},
	{name:"广西壮族",sub:[	{name:""},{name:""},
						{name:"南宁"},{name:"柳州"},{name:"桂林"},{name:"梧州"},{name:"北海"},{name:"钦州"},
						{name:"玉林"},{name:"贺州"},{name:"河池"},{name:"来宾"},{name:"崇左"},{name:"防城港"},
						{name:"贵港"},{name:"百色"},
						{name:""},{name:""}
					]},
	{name:"甘肃",sub:[	{name:""},{name:""},
						{name:"兰州"},{name:"天水"},{name:"白银"},{name:"平凉"},{name:"庆阳"},{name:"陇南"},
						{name:"定西"},{name:"金昌"},{name:"武威"},{name:"张掖"},{name:"酒泉"},{name:"嘉峪关"},
						{name:"临夏回族"},{name:"甘南藏族"},
						{name:""},{name:""}
					]},
	{name:"山西",sub:[	{name:""},{name:""},
						{name:"太原"},{name:"大同"},{name:"朔州"},{name:"忻州"},{name:"吕梁"},{name:"阳泉"},
						{name:"榆次"},{name:"长治"},{name:"晋城"},{name:"临汾"},{name:"运城"},
						{name:""},{name:""}
					]},
	{name:"内蒙古",sub:[	{name:""},{name:""},
						{name:"呼和浩特"},{name:"包头"},{name:"乌海"},{name:"赤峰"},{name:"呼伦贝尔"},{name:"兴安"},
						{name:"哲里木"},{name:"锡林郭勒"},{name:"乌兰察布"},{name:"伊克昭"},{name:"巴彦淖尔"},{name:"阿拉善"},
						{name:""},{name:""}
					]},
	{name:"陕西",sub:[	{name:""},{name:""},
						{name:"西安"},{name:"铜川"},{name:"宝鸡"},{name:"咸阳"},{name:"渭南"},{name:"汉中"},
						{name:"安康"},{name:"商洛"},{name:"延安"},{name:"榆林"},{name:"兴平"},{name:"韩城"},
						{name:"华阴"},
						{name:""},{name:""}
					]},
	{name:"吉林",sub:[	{name:""},{name:""},
						{name:"长春"},{name:"吉林"},{name:"四平"},{name:"辽源"},{name:"通化"},{name:"白山"},
						{name:"松原"},{name:"白城"},{name:"延边朝鲜"},
						{name:""},{name:""}
					]},
	{name:"福建",sub:[	{name:""},{name:""},
						{name:"福州"},{name:"莆田"},{name:"厦门"},{name:"泉州"},{name:"漳州"},{name:"宁德"},
						{name:"三明"},{name:"龙岩"},{name:"南平"},
						{name:""},{name:""}
					]},
	{name:"贵州",sub:[	{name:""},{name:""},
						{name:"贵阳"},{name:"清镇"},{name:"六盘水"},{name:"遵义"},{name:"赤水"},{name:"仁怀"},
						{name:"安顺"},{name:"铜仁"},{name:"毕节"},{name:"兴义"},{name:"凯里"},{name:"都匀"},
						{name:"福泉"},
						{name:""},{name:""}
					]},
	{name:"广东",sub:[	{name:""},{name:""},
						{name:"广州"},{name:"深圳"},{name:"珠海"},{name:"汕头"},{name:"佛山"},{name:"韶关"},{name:"湛江"},
						{name:"肇庆"},{name:"江门"},{name:"茂名"},{name:"惠州"},{name:"梅州"},{name:"汕尾"},{name:"河源"},
						{name:"阳江"},{name:"清远"},{name:"东莞"},{name:"中山"},{name:"潮州"},{name:"揭阳"},{name:"云浮"},
						{name:""},{name:""}
					]},
	{name:"青海",sub:[	{name:""},{name:""},
						{name:"西宁"},{name:"格尔木"},{name:"德令哈"},
						{name:""},{name:""}
					]},
	{name:"西藏",sub:[	{name:""},{name:""},
						{name:"拉萨"},{name:"日喀则"},{name:"昌都"},{name:"林芝"},{name:"山南"},{name:"那曲"},{name:"阿里"},
						{name:""},{name:""}
					]},
	{name:"四川",sub:[	{name:""},{name:""},
						{name:"成都"},{name:"自贡"},{name:"攀枝花"},{name:"泸州"},{name:"德阳"},{name:"绵阳"},
						{name:"广元"},{name:"遂宁"},{name:"内江"},{name:"南充"},{name:"乐山"},{name:"眉山"},
						{name:"宜宾"},{name:"广安"},{name:"达州"},{name:"雅安"},{name:"巴中"},{name:"资阳"},
						{name:"阿坝藏族羌族自治州"},{name:"甘孜藏族自治州"},{name:"凉山彝族自治州"},
						{name:""},{name:""}
					]},
	{name:"宁夏回族",sub:[	{name:""},{name:""},
						{name:"银川"},{name:"石嘴山"},{name:"吴忠"},{name:"固原"},{name:"中卫"},
						{name:""},{name:""}
					]},
	{name:"海南",sub:[	{name:""},{name:""},
						{name:"海口"},{name:"三亚"},{name:"儋州"},{name:"五指山"},{name:"文昌"},{name:"琼海"},{name:"万宁"},
						{name:"东方"},
						{name:""},{name:""}
					]},
	{name:"台湾",sub:[	{name:""},{name:""},
						{name:"台北"},{name:"高雄"},{name:"台中"},{name:"花莲"},{name:"基隆"},{name:"嘉义"},{name:"金门"},
						{name:"连江"},{name:"苗栗"},{name:"南投"},{name:"澎湖"},{name:"屏东"},{name:"台东"},{name:"台南"},
						{name:"桃园"},{name:"新竹"},{name:"宜兰"},{name:"云林"},{name:"彰化"},
						{name:""},{name:""}
					]},
	{name:"香港",sub:[	{name:""},{name:""},
						{name:"香港岛"},{name:"九龙"},{name:"新界东"},{name:"新界西"},
						{name:""},{name:""}
					]},
	{name:"澳门",sub:[	{name:""},{name:""},
						{name:"花地玛堂区"},{name:"圣安多尼堂区"},{name:"大堂区"},{name:"望德堂区"},{name:"风顺堂区"},{name:"嘉模堂区"},
						{name:"圣方济各堂区"},
						{name:""},{name:""}
					]},
	{name:"",sub:[{name:""}]},
	{name:"",sub:[{name:""}]},
]		

	function ChooiceArea(ProveInput,CityInput){
		//定义全局变量
		var CityLi=0;
		var MainArea;
		//计算省份
		var addArea=0;
		var addCity;
		$(ProveInput).click(function(e) {
			addCity=0;
            $('.overlay_area').show(0);
			if(addArea==0){
				$('.overlay_area .swiper-container').html('<ul class="swiper-wrapper" style="-webkit-transition-duration: 0.3s; transform: translate3d(0px, -80px, 0px); -webkit-transform: translate3d(0px, -80px, 0px);"></ul>')
				for(var i=0;i<CitiesData.length;i++){
					$('.overlay_area .swiper-container .swiper-wrapper').append('<li class="swiper-slide">'+CitiesData[i].name+'</li>')
				}
				var swiper = new Swiper('.overlay_area>.swiper-container',{
					slidesPerView:5,
					paginationClickable: true,
					direction: 'vertical',
				})
				addArea=1;
			}else{
				
			}
        });
		$('.overlay_area .title .cal').click(function(e) {
            $('.overlay_area').hide(0);
        });

	  	$('.overlay_area .title .enter').click(function(e) {
			var str=$('.overlay_area .swiper-wrapper').css('transform').split(',')
			var result=Math.round(str[5].replace(')','')/-40)+2;
			var areaProv=$('.overlay_area .swiper-container ul li:eq('+result+')').html()
			MainArea=areaProv;
			$('.overlay_area').hide(0);
			CityLi=result;
      	});
		
		//计算城市
		$(CityInput).click(function(e) {
			if(CityLi!=0){
				$('.overlay_city').show(0);
				if(addCity==0){
					$('.overlay_city .swiper-container').html('<ul class="swiper-wrapper" style="-webkit-transition-duration: 0.3s; transform: translate3d(0px, -80px, 0px); -webkit-transform: translate3d(0px, -80px, 0px);"></ul>')
					for(var i=0;i<CitiesData[CityLi].sub.length;i++){
						$('.overlay_city .swiper-container .swiper-wrapper').append('<li class="swiper-slide">'+CitiesData[CityLi].sub[i].name+'</li>')
					}
					var swiper = new Swiper('.overlay_city>.swiper-container',{
						slidesPerView:5,
						paginationClickable: true,
						direction: 'vertical'
					})
					addCity=1;
				}
			}else{
			}
        });
		$('.overlay_city .title .cal').click(function(e) {
            $('.overlay_city').hide(0);
        });

	  	$('.overlay_city .title .enter').click(function(e) {
			var Str=$('.overlay_city .swiper-wrapper').css('transform').split(',')
			var Result=Math.round(Str[5].replace(')','')/-40)+2;
			var areaCity=$('.overlay_city .swiper-container ul li:eq('+Result+')').html()
			MainArea=MainArea+areaCity;
			$(ProveInput).val(MainArea)
			$('.overlay_city').hide(0);
      	})
	}
		


