$(document).ready((function(){function e(e){let t=0,s=document.querySelectorAll(".required > input");for(let e=0;e<s.length;e++){const r=s[e];i(r),""===r.value?($(r).next().text("Это поле обяательно для заполнения."),n(r),t++):r.classList.contains("js-input-email")?/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(r.value)||(n(r),t++):"name"===r.getAttribute("name")?a(r)||($(r).next().text("Некорректно введено Имя"),n(r),t++):"checkbox"===r.getAttribute("type")&&!1===r.checked?(n(r),t++):"tel"===r.getAttribute("type")&&""!=r.value&&(o(r)||($(r).next().text("Некорректный формат номера."),n(r),t++))}return t;function n(e){e.parentElement.classList.add("error"),e.classList.add("error")}function i(e){e.parentElement.classList.remove("error"),e.classList.remove("error")}function o(e){return/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(e.value)}function a(e){return/^[a-zA-Zа-яА-ЯёЁ'][a-zA-Z-а-яА-ЯёЁ' ]+[a-zA-Zа-яА-ЯёЁ']?$/.test(e.value)}}$(".customOptions").selectric({optionsItemBuilder:function(e,t,s){return t.val().length?'<span class="ico ico-'+e.value+'"></span>'+e.text:e.text},labelBuilder:function(e){return e.value.length?'<span class="ico ico-'+e.value+'"></span>'+e.text:e.text},onOpen:function(){var e=this.closest(".selectric-wrapper").getElementsByClassName("selectric-items")[0];e.style.display="none",e.offsetHeight,e.style.display="block"},onClose:function(){this.closest(".selectric-wrapper").getElementsByClassName("selectric-items")[0].style.display="none"}}),$("select").selectric({nativeOnMobile:!1,onOpen:function(){var e=this.closest(".selectric-wrapper").getElementsByClassName("selectric-items")[0];e.style.display="none",e.offsetHeight,e.style.display="block"},onClose:function(){this.closest(".selectric-wrapper").getElementsByClassName("selectric-items")[0].style.display="none"}}),$(".js-sign-radio").click((function(){const e=$(this).find('.wpcf7-list-item input[type="radio"]:checked').parent().parent();e.siblings().removeClass("active"),e.addClass("active")})),$(".js-checkbox").click((function(){const e=$(this),t=e.closest(".checkbox");e.is(":checked")?t.addClass("active"):t.removeClass("active")})),$(".js-review-form").on("submit",(function(t){t.preventDefault();const s=$(this);if(0===e()){let e={};$.each(s.serializeArray(),(function(t){let s=this.name,n=this.value;e[`${s}`]=n})),$.ajax({url:WPJS.siteUrl+"/backend/review.php",type:"POST",data:`newReviewData=${JSON.stringify(e)}`,beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},success:function(e){s.fadeOut(),$(".js-review-form-success").fadeIn()},error:function(){console.log("ERROR")}})}})),$(".js-textarea-counter").on("keyup paste change",(function(){const e=$(this),t=e.closest("div.inp").find(".textarea-symbol-counter span"),s=e.val().length;t.text(s)})),$(".js-subscribe-form").on("submit",(function(t){t.preventDefault();const s=$(this);if(0===e()){let e={};$.each(s.serializeArray(),(function(t){let s=this.name,n=this.value;e[`${s}`]=n})),$.ajax({url:WPJS.siteUrl+"/backend/subscribe.php",type:"POST",data:`subscribeEmail=${JSON.stringify(e)}`,beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},success:function(e){e?(s.remove(),$(".subscribe__subtitle").html("Вы успешно подписались на наши обновления.</br> Спасибо, что следите за нами")):(s.remove(),$(".subscribe__subtitle").text("Введенный Email уже подписан на наши обновления!"))},error:function(){console.log("ERROR")}})}})),$(".js-unsign-form").on("submit",(function(t){t.preventDefault();const s=$(this);if(0===e()){let e={};$.each(s.serializeArray(),(function(){let t=this.name,s=this.value;e[`${t}`]=s})),$.ajax({url:WPJS.siteUrl+"/backend/unsign.php",type:"GET",data:`allSigns=${JSON.stringify(e)}`,beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},success:function(e){let t=JSON.parse(e);const s=$(".js-unsign-table"),n=$(".js-unsign-warning");if(t.length>0){const e=s.find("table");e.find("tr:not(:first)").remove(),i=e,t.forEach((e=>{let t;t=e.time%1!=0?e.time%1*60:"00",i.find("tr:last").after(`<tr>\n                <td>${e.id}</td>\n                <td>${e.name}</td>\n                <td>${e.phone}</td>\n                <td>${e.date}, ${Math.trunc(e.time)}:${t}</td>\n                <td> \n                  <a class="js-delete-sign" href="/" data-id="${e.id}">Удалить\n                    <img src="${WPJS.siteUrl}/build/img/close.svg" alt="" width="14" height="14">\n                  </a>\n                </td>\n              </tr>`)})),s.fadeIn(),n.fadeOut()}else s.fadeOut(),n.fadeIn();var i},error:function(e){console.log("ERROR:"+e)}})}})),$(document).on("click",".js-delete-sign",(function(e){e.preventDefault();const t=$(this).data("id");$.confirm({title:"Вы уверены, что хотите отменить запись?",content:"После удаления записи ее восстановить будет нельзя!",backgroundDismiss:!0,draggable:!1,buttons:{"Удалить":function(){$form=$(".js-unsign-form");let e={};$.each($form.serializeArray(),(function(){let t=this.name,s=this.value;e[`${t}`]=s})),$.ajax({url:WPJS.siteUrl+"/backend/unsign.php",type:"GET",data:`unsign=${t}&unsignData=${JSON.stringify(e)}`,beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},success:function(e){$form.trigger("submit")},error:function(e){console.log("er:"+e)}})},"Отмена":()=>{}}})})),$(".js-reviews-rating").each((function(){const e=$(this),t=e.data("rating"),s=e.find(".reviews__rating");for(let e=0;e<=t;e++)s.find(`li:nth-child(${e})`).addClass("active")})),$.datepicker.setDefaults($.datepicker.regional.ru)})),$(window).on("load mousewheel scroll",(function(){const e=$(this),t=$(".header");e.scrollTop()>=400?(t.addClass("fixed"),$(".js-go-top-btn").addClass("active")):(t.removeClass("fixed"),$(".js-go-top-btn").removeClass("active"))})),$((()=>{$(".js-go-top-btn").click((function(e){window.setTimeout((function(){$(window).scrollTop(0)}),0)}))})),$((function(){const e=$(".js-menu-toggler"),t=$(".js-menu"),s=$("body"),n=t.find(".has-dropdown"),i=$(".js-back-btn");e.on("click",(function(e){e.preventDefault(),s.toggleClass("menu-is-opened")})),n.on("mouseenter",(function(){$(this).addClass("is-hovered"),$(this).siblings().removeClass("is-hovered")})),n.on("mouseleave",(function(){$(this).removeClass("is-hovered")})),i.on("mouseenter",(function(e){e.preventDefault(),e.stopPropagation(),$(this).closest(".has-dropdown").removeClass("is-hovered")}))})),$(document).on("click.scroll-to",".js-scroll-to",(function(e){e.preventDefault();const t=$(this),s=$(t.attr("href")),n=t.data("speed")||100;if("#!"==s||"#"==s)return;let i=$(s).offset().top;$("html, body").animate({scrollTop:i-150},n,"linear")})),$((function(){let e=$(".js-navigation"),t=$(".footer").innerHeight()+$(".payment").innerHeight()+800,s=$(document).innerHeight();$(".payment").innerHeight(),$(".footer").innerHeight();$(window).on("scroll load resize",(function(){$(window).scrollTop()>s-t?e.removeClass("fixed"):e.addClass("fixed")}))}));var controller=new ScrollMagic.Controller({globalSceneOptions:{duration:200}});function formValidate(e){let t=0,s=document.querySelectorAll(".required input"),n=!1;for(let e=0;e<s.length;e++){const r=s[e];o(r),""===r.value?($(r).closest("p").find(".form__error").text("Это поле обяательно для заполнения."),i(r),t++):"checkbox"===r.getAttribute("type")&&!1===r.checked?(i(r),t++):"tel"===r.getAttribute("type")?/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(r.value)||($(r).closest("p").find(".form__error").text("Некорректный формат номера."),i(r),t++):"name"===r.getAttribute("name")?a(r)||($(r).closest("p").find(".form__error").text("Некорректно введено Имя"),i(r),t++):"radio"===r.getAttribute("type")&&!1===r.checked?(i(r),t++):"radio"===r.getAttribute("type")&&!0===r.checked&&(n=!0)}if(n){let e=document.querySelectorAll(".required input[type=radio]");for(let t=0;t<e.length;t++)o(e[t]);return t-e.length+1}return t;function i(e){e.closest(".inp.required").classList.add("error"),e.parentElement.classList.add("error"),e.classList.add("error")}function o(e){e.closest(".inp.required").classList.remove("error"),e.parentElement.classList.remove("error"),e.classList.remove("error")}function a(e){return/^[a-zA-Zа-яА-ЯёЁ'][a-zA-Z-а-яА-ЯёЁ' ]+[a-zA-Zа-яА-ЯёЁ']?$/.test(e.value)}}new ScrollMagic.Scene({triggerElement:"#manicure"}).setClassToggle("#nav1","active").offset(150).addTo(controller),new ScrollMagic.Scene({triggerElement:"#pedicure"}).setClassToggle("#nav2","active").offset(150).addTo(controller),new ScrollMagic.Scene({triggerElement:"#sugaring"}).setClassToggle("#nav3","active").offset(150).addTo(controller),new ScrollMagic.Scene({triggerElement:"#brows"}).setClassToggle("#nav4","active").offset(150).addTo(controller),new ScrollMagic.Scene({triggerElement:"#lashes"}).setClassToggle("#nav5","active").offset(150).addTo(controller),$((()=>{$(".js-inview").each((function(){$(this).bind("inview",((e,t,s,n)=>{($(this).hasClass("js-inview-top")&&t||(!$(window).width()>480?"center"===n||"bottom"===n:t))&&($(this).addClass("inview").unbind("inview"),$(this).trigger("inviewTriggered")),$(window).trigger("inviewTriggered")}))}))})),$(".wpcf7-form").on("submit",(function(e){let t={},s=formValidate($(this));console.log("Ошибок формы:",s),0==s?($.each($(this).serializeArray(),(function(e){let s=this.name,n=this.value;t[`${s}`]=n})),$.ajax({url:WPJS.siteUrl+"/backend/sign.php",type:"GET",beforeSend:function(){$("body").addClass("loading")},data:`databaseData=${JSON.stringify(t)}&serviceName=${$(".js-type-select").val()}`,success:function(e){"ok"===JSON.parse(e).status?alert("Запись принята!"):(alert("Ошибка записи! Обновите страницу и попробуйте записаться снова!"),location.reload())},error:function(){alert("Ошибка записи! Обновите страницу и попробуйте записаться снова!"),location.reload(),console.log("ERROR SIGN sign.js")}}),$.ajax({redirect:"follow",url:"https://script.google.com/macros/s/AKfycbz_KUQFXWWd5EkC9yEOBPcwPcBaKuVekSnvqQpeDOz7eSbAX7aqUGboFjfEpNotLinn/exec",type:"POST",data:t,success:function(e){},error:function(e){console.log(e,"sheets error")}})):(e.preventDefault(),e.stopPropagation())})),$(".js-services-select").on("selectric-change",(function(e,t,s){const n=$(this).val(),i=$(".js-type-select"),o=$(".js-masters-select");$(".js-time-block").addClass("--hidden"),i.empty(),o.empty(),$.ajax({url:WPJS.siteUrl+"/backend/sign.php",type:"GET",beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},data:`optionVal=${n}`,success:function(e){let t=JSON.parse(e);for(let e=0;e<t.length;e++)i.append($("<option>",{value:`${t[e].services_name}`,text:`${t[e].services_name}`}));i.selectric("refresh")},error:function(){console.log("ererere")}}),$.ajax({url:WPJS.siteUrl+"/backend/signMasterInfo.php",type:"GET",beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},data:`service=${n}`,success:function(e){let t=JSON.parse(e);for(let e=0;e<t.length;e++)o.append($("<option>",{value:`${t[e].last_name}`,text:`${t[e].first_name} ${t[e].last_name[0]}. ${t[e].mid_name[0]}.`}));const s=$(".js-sign-master");s.find(".sign__master-name").text(`Мастер ${t[0].last_name} ${t[0].first_name}`),s.find(".sign__master-img").attr("src",WPJS.siteUrl+`${t[0].img}`),s.find(".sign__master-btn").attr("href",WPJS.siteUrl+`/reviews?master=${t[0].last_name}`),s.fadeIn(),o.selectric("refresh")},error:function(){console.log("ERROR")}})})),$(".js-masters-select").on("selectric-change",(function(e,t,s){const n=$(this),i=$(".js-services-select").val(),o=$(".js-type-select"),a=n;$(".js-time-block").addClass("--hidden"),o.empty(),$.ajax({url:WPJS.siteUrl+"/backend/sign.php",type:"GET",beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},data:`serv=${i}&master=${a.val()}`,success:function(e){let t=JSON.parse(e);for(let e=0;e<t.length;e++)o.append($("<option>",{value:`${t[e].services_name}`,text:`${t[e].services_name}`}));o.selectric("refresh")},error:function(){console.log("ererere")}}),$.ajax({url:WPJS.siteUrl+"/backend/signMasterInfo.php",type:"GET",beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},data:`service=${i}&masterLastName=${a.val()}`,success:function(e){let t=JSON.parse(e);const s=$(".js-sign-master");s.find(".sign__master-name").text(`Мастер ${t[0].last_name} ${t[0].first_name}`),s.find(".sign__master-img").attr("src",WPJS.siteUrl+`${t[0].img}`),s.find(".sign__master-btn").attr("href",WPJS.siteUrl+`/reviews?master=${t[0].last_name}`),s.fadeIn()},error:function(){console.log("ERROR")}})})),$(".js-type-select").on("selectric-change",(()=>{$(".js-time-block").addClass("--hidden")})),$((()=>{const e=$(".sign-form__date-input");$("#sign-form__date").datepicker({minDate:0,maxDate:"2023-06-30",dateFormat:"yy-mm-dd",onSelect:function(t,s){e.val(t),$.ajax({url:WPJS.siteUrl+"/backend/timeForSign.php",type:"GET",beforeSend:function(){$("body").addClass("loading")},complete:function(){setTimeout((()=>{$("body").removeClass("loading")}),250)},data:`date=${e.val()}&master=${$(".js-masters-select").val()}&serviceName=${$(".js-type-select").val()}`,success:function(e){var t=JSON.parse(e);$(".wpcf7-list-item").first().find("input").prop("checked",!1).removeAttr("checked");var s=$(".wpcf7-list-item").first().clone();if($(".js-sign-radio").empty(),$(".js-sign-radio").append(s),t.length){$(".js-time-block").removeClass("--hidden").removeClass("show--hint");for(let e=0;e<t.length;e++){let n=(s=s.clone()).find("input");s.find(".wpcf7-list-item-label").text(t[e]),n.val(t[e]).prop("checked",!1).removeAttr("checked"),s.removeClass("first").removeClass("last"),0==e&&s.addClass("first"),e==t.length-1&&s.addClass("last"),$(".js-sign-radio").append(s)}}else $(".js-time-block").removeClass("--hidden").addClass("show--hint")},error:function(){console.log("ERROR")}})}})})),$(".js-fade-slider").each((function(){const e=$(this),t=e.next().find(".js-fade-slider-counter");e.on("init reInit beforeChange",(function(e,s,n,i){const o=(i||0)+1;t.html(`<span>${o}</span> / ${s.slideCount}`)})),e.slick({arrows:!0,dots:!1,focusOnSelect:!0,infinite:!1,speed:500,slidesToShow:1,slidesToScroll:1,touchThreshold:100,prevArrow:e.next().find(".js-fade-slider-prev"),nextArrow:e.next().find(".js-fade-slider-next"),fade:!0,cssEase:"ease",lazyLoad:"progressive",responsive:[{breakpoint:701,settings:{dots:!0,arrows:!1,autoplay:!0,autoplaySpeed:2e3,speed:1e3}}]})})),$(".js-slideshow").each((function(){$(this).slick({slidesToShow:3,slidesToScroll:1,speed:500,touchThreshold:100,infinite:!1,lazyLoad:"ondemand",dots:!1,arrows:!0,responsive:[{breakpoint:1025,settings:{slidesToShow:2}},{breakpoint:701,settings:{slidesToShow:1,arrows:!1,dots:!0,adaptiveHeight:!0}}]})})),$(".js-sorting a").click((function(e){e.preventDefault();const t=$(this),s=$(".js-sorting-content > *"),n=t.data("sort");t.addClass("active"),t.siblings().removeClass("active"),s.each((function(){"all"==n?$(this).fadeIn():$(this).data("sort")!=n?$(this).fadeOut():$(this).fadeIn()}))})),$((function(){if(!document.querySelector(".js-review-sort"))return;let e,t=document.querySelector(".js-review-sort");for(let i=0;i<t.children.length;i++)for(let o=i;o<t.children.length;o++)+t.children[i].getAttribute("data-id")<+t.children[o].getAttribute("data-id")&&(e=t.replaceChild(t.children[o],t.children[i]),s=e,(n=t.children[i]).parentNode.insertBefore(s,n.nextSibling));var s,n})),$((function(){$(".js-sorting-select").selectric().on("change",(function(e){const t=$(this).val();$(".js-sorting-content a").each((function(){"all"==t?$(this).fadeIn():$(this).data("sort")!=t?$(this).fadeOut():$(this).fadeIn()}))}))})),$("ul.js-rating-stars li").on("mouseenter",(function(e){var t=$(this);t.prevUntil().addClass("active"),t.addClass("active")})),$("ul.js-rating-stars li").on("mouseleave",(function(e){var t=$(this);t.prevUntil().removeClass("active"),t.removeClass("active")})),$("ul.js-rating-stars li").on("click",(function(e){e.preventDefault(),$this=$(this),$this.siblings().removeClass("active-fixed"),$this.removeClass("active-fixed"),$this.prevUntil().addClass("active-fixed"),$this.addClass("active-fixed"),$this.parent().next().val($this.index()+1)})),$(".js-spoiler").find(".js-spoiler-toggler").on("click",(function(){const e=$(this),t=$(this).parent().find(".js-spoiler-body");e.parent().toggleClass("is-expanded"),t.toggleClass("is-expanded"),e.toggleClass("is-expanded")})),$(".js-mobile-spoiler").find(".js-spoiler-toggler").on("click",(function(){const e=$(this),t=$(this).parent().find(".js-spoiler-body");$(window).width()<=480&&(e.parent().toggleClass("is-expanded"),t.toggleClass("is-expanded"),e.toggleClass("is-expanded"))})),tippy(".hint",{content:e=>$(e).find(".hint-text").length?$(e).find(".hint-text").clone().html():$(e).find(".hint-content").clone().html(),trigger:"click",placement:"right",allowHTML:!0,arrow:!0,allowHTML:!0,interactive:!0,touch:!1,onTrigger(e,t){t.stopPropagation()},onUntrigger(e,t){t.stopPropagation()},popperOptions:{strategy:"fixed",modifiers:[{name:"flip",options:{fallbackPlacements:"right"}}]}});