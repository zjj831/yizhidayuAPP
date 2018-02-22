"use strict";

var doc = document;

function handleLuckyCard(a) {
  var wt = doc.body.offsetWidth;
  var w = parseInt(a.w);
  var h = parseInt(a.h);
  var bl = w / h;
  var $ggk = doc.getElementById("ggk");
  var $scratch = doc.getElementById("scratch");
  // $ggk.style.width = `${wt}px`;
  $scratch.style.height = wt / bl + "px";

  if (typeof a.init == "function") {
    a.init();
  }

  doc.querySelector(".card-content__box").style.display = "block";

  var ht = wt / bl;
  doc.getElementById("card").style.height = ht + "px";
  doc.getElementById("card").style.lineHeight = ht + "px";
  doc.getElementById("cover").height = ht;
}

function handleClick() {
  var __element = doc.getElementsByClassName("ggk-mask")[0];
  var _parentElement = __element.parentNode;
  _parentElement.removeChild(__element);
}

// 打开规则弹窗

function handleOpenMessage(e, id) {
  doc.getElementById(id).style.display = "block";
}

// 关闭弹窗
function handleCloseMessage(e) {
  var $message = e.closest("#ih-message");
  $message.style.display = "none";
}

// 中奖说明
function handleAddActive(e, nclass) {
  if (e.hasAttribute("class")) {
    var selfClass = e.getAttribute("class");
    selfClass = selfClass.replace(/(^\s*)|(\s*$)/g, "");

    var reg = new RegExp("\\s?" + nclass, "g");

    if (reg.test(selfClass)) {
      selfClass = selfClass.replace(reg, "");
      e.setAttribute("class", selfClass);
    } else {
      e.setAttribute("class", selfClass + " " + nclass);
    }
  }
}

function messageWinning(a) {
  doc.querySelector(".js-guaguaka-img").setAttribute("src", a.url);
  doc.querySelector(".ih-guagua__over__box").style.display = "block";
  var $btn = doc.getElementById("js-btn");
  $btn.removeEventListener("touchend", btnFunction);
  $btn.addEventListener("touchend", btnFunction);

  function btnFunction() {
    if (typeof a.callback == "function") {
      a.callback();
    }
  }

  var $close = doc.querySelector(".close");

  $close.removeEventListener("touchend", closeFunction);
  $close.addEventListener("touchend", closeFunction);

  function closeFunction() {
    doc.querySelector(".ih-guagua__over__box").style.display = "none";
  }
}