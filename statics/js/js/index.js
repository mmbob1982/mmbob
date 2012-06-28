//----------------------------------------------------
// Name: common.js
// Date Created:2011/06/01 [xian.zhang]
// Last Updated:2011/06/01 [xian.zhang]
//----------------
//   首页左侧菜单 
//----------------

/* meau */
$(function () {
    var imgStr = '#menu li img ,.category_main dd img';
    $(imgStr).each(function () {
        initRollOverImages(this);
    });
})

/* meau */
function initRollOverImages(imgItem) {
var image_cache = new Object();
$(imgItem).not("[src*='_hover.']").each(function(i) {
var imgsrc = this.src;
var dot = this.src.lastIndexOf('.');
var imgsrc_on = this.src.substr(0, dot) + '_hover' + this.src.substr(dot, 4);
image_cache[this.src] = new Image();
image_cache[this.src].src = imgsrc_on;
$(this).hover(
function() { this.src = imgsrc_on; },
function() { this.src = imgsrc; }
);
});
}



$(function () {

    $('#JS_category_l li').each(function () {
        $(this).hover(

        function () {
            $(this).addClass('select');
            var long = (-$(this).index() * 36) + 'px';
            $(this).find('.subcategory').css('top', long);
            $(this).find('.subcategory').css('display', 'block');
        }, function () {
            $(this).removeClass('select')
            $(this).find('.subcategory').css('display', 'none');
        })
    })
})

$(function () {

    $('.list_schools li').each(function () {
        $(this).hover(function () {
            $(this).find('.tiplayar').css('display', 'block');
        }, function () {
            $(this).find('.tiplayar').css('display', 'none');
        })
    })
})
/* 选项卡切换 */
$(function () {
    var tabStr = '.cateLawyer .hd li,.artLawyers .hd li,.newsLawyers .hd li';
    $(tabStr).each(function () {
        tabHover(this);
    });
})

function tabHover(tabItem) {

    $(tabItem).each(function () {
        $(this).hover(

        function () {
			
            var index = $(this).index();

            $(this).siblings().removeClass('on');
            $(this).addClass('on');            
            var p = $(this).parent().parent().parent();
            $(p).children('.bd').find('.pan').css('display', 'none');
            $(p).children('.bd').find('.pan').eq(index).css('display', 'block');
        }, function () {})
    });

}
/* 选项卡单击 */
$(function () {
    var tabStrClick ='.tabBoxcl .td li';
    $(tabStrClick).each(function () {
        tabClick(this);
		/*		
		var pItem=$(this).parent().parent().parent()
		var superStr=pItem.attr('class');	
		if(superStr.indexOf('tabBoxcl')!=-1){
		$(this).each(function(){
			$(this).click(function(){
	        $(this).parent().parent().parent().children('.box').css('display','none')
			})
		})
		}*/
    });
})

function tabClick(tabItem) {

    $(tabItem).each(function () {
        $(this).click(

        function () {
			
            var index = $(this).index(); 
			$(this).siblings().removeClass('on');
            if(index!=0){ 
           
            $(this).addClass('on');
			}
            var p = $(this).parent().parent().parent();
            $(p).children('.bd').css('display', 'none');
            $(p).children('.bd').eq(index).css('display', 'block');
        })
    });

}
/* 下拉菜单 */
$(function () {
	var slide_class = '.slide_class';
	//初始化
	$(slide_class).css('display', 'none');
	//效果
	$(slide_class).parent().each(function(){
		var _this = $(this);									  
		_this.hover(
			function(){
				$(slide_class, _this).css('display', 'block');
			},
			function(){
				$(slide_class, _this).css('display', 'none');
			}
		);
	});	
	
})


/* 下拉列表 */
function selectMeau(flip, meau, selected) {

$(meau).show();
$(meau + ' li a').click(function (i) {
if ($(selected).length > 0) $(selected).html($(this).html());
$(meau).hide();
});
}
//----------------
// Judge whether click mouse is on area out the meau;
//----------------
function mouOut(id, listID) {
    var oList = $(listID);
    var de = document.documentElement ? document.documentElement : document.body;
    de.onclick = function (e) {
        var e = e || window.event;
        var target = e.target || e.srcElement;
        var getTar = target.getAttribute("id");
        while (target) {
            if (target == oList) {
                return false;
            }
            target = target.parentNode;
        }
        if (getTar != id) {
            $(listID).hide()
        }
    }
}
//----------------
// JQ selcet
//----------------


function selExtend(flip, list, tonn) {
    list = '#' + list;
    flip = '#' + flip;
    tonn = '#' + tonn;
    $(list).show();
    $(list).mouseover(function () {
        $(this).show()
    })
    $(tonn).mouseout(function () {
        $(list).hide()
    })
    $(list).mouseout(function () {
        $(this).hide()
    })
    $(list).click(function () {
        $(flip).html($(this).find('option:selected').text());
        $(list).hide();
    })
}

/* 滚动效果 */
//$(function () {
//    var flippingStr = '.mastheaer .info .num ul';
//    $(flippingStr).each(function () {
//        flip(this);
//    });
//})
//
//function flip(flipItem) {
//    var flipItems = $(flipItem).children('li');
//    var i = 0;
//    var typeTime;
//
//    function moveFun() {
//
//        $(flipItem).animate({
//            marginTop: "-10px",
//			height:0,
//			display:"none"
//        }, 500, function () {
//            $(this).css({
//                marginTop: "0px",
//				height:'20px',
//            }).find("li:first").appendTo(this);
//        })
//
//    }
//    var typeTime = setInterval(moveFun,5000)
//}

/* 滚动效果 */
$(function () {
    var flippingStr = '#js_topNum';
    $(flippingStr).each(function () {
        flip(this);
    });
})

function flip(flipItem) {
	var scrtime;
 	$("#js_topNum").hover(function(){
		clearInterval(scrtime);
	
	},function(){
	
	scrtime = setInterval(function(){
		var $ul = $("#js_topNum ul");
		var liHeight = $ul.find("li:last").height();
		$ul.animate({marginTop : liHeight+40 +"px"},1000,function(){
		
		$ul.find("li:last").prependTo($ul)
		$ul.find("li:first").hide();
		$ul.css({marginTop:0});
		$ul.find("li:first").fadeIn(500);
		});	
	},4000);
	
	}).trigger("mouseleave");
	
}