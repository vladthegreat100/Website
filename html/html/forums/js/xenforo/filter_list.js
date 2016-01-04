/*
 * XenForo filter_list.min.js
 * Copyright 2010-2014 XenForo Ltd.
 * Released under the XenForo License Agreement: http://xenforo.com/license-agreement
 */
(function(b,g){XenForo.FilterList=function(a){this.__construct(a)};XenForo.FilterList.prototype={__construct:function(a){this.$list=a;this.$form=this.$list.closest("form").bind("AutoValidationComplete",b.context(function(){this.$form.find("input.Toggler").each(function(){b(this).closest("h4").toggleClass("disabled",!this.checked)})},this));this.$listCounter=this.$form.find(".FilterListCount");this.lookUpUrl=XenForo.isPositive(this.$list.data("ajaxfilter"))?this.$form.attr("action"):!1;this.registerListItems();
this.handleLast();this.activateFilterControls()&&this.filter()},activateFilterControls:function(){return this.$form.length&&(this.$filter=b('input[name="filter"]',this.$form).keyup(b.context(this,"filterKeyUp")).on("paste",b.context(this,"filterPaste")).bind("search",b.context(this,"instantSearch")).keypress(b.context(this,"filterKeyPress")),this.$prefixMatch=b('input[name="prefixmatch"]',this.$form).change(b.context(this,"filter")),this.$clearFilter=b('input[name="clearfilter"]',this.$form).click(b.context(this,
"clearFilter")),console.info("XenForo.FilterList %o",this.$filter),this.$filter.length)?this.getCookie():!1},registerListItems:function(){this.FilterListItems=[];this.$listItems=this.$list.find(".listItem");this.$listItems.each(b.context(function(a){this.FilterListItems.push(new XenForo.FilterListItem(b(this.$listItems[a])))},this));this.$groups=this.$list.find("> li:not(.listItem)")},handleLast:function(){if(g.location.hash){var a=b(g.location.hash.replace(/[^\w_#-.]/g,"").replace(".","\\."));a.hasClass("listItem")&&
(console.log("Last: %o",a),a.addClass("Last"))}},filterKeyUp:function(a){a.keyCode==13?this.instantSearch():(clearTimeout(this.timeOut),this.timeOut=setTimeout(b.context(this,"filter"),250))},filterPaste:function(){clearTimeout(this.timeOut);this.timeOut=setTimeout(b.context(this,"filter"),250)},filterKeyPress:function(a){a.keyCode==13&&a.preventDefault()},instantSearch:function(){clearTimeout(this.timeOut);this.filter()},filter:function(){var a=this.$filter.data("XenForo.Prompt").val(),c=this.$prefixMatch.is(":checked");
this.$filter.hasClass("prompt")||a===""?(this.$groups.show(),this.$listItems.show(),this.applyFilter(this.FilterListItems),this.$listCounter.text(this.$listItems.length),this.lookUpUrl&&b(".PageNav").show(),this.removeAjaxResults(),this.showHideNoResults(!1),this.deleteCookie()):(console.log("Filtering on '%s'",a),this.setCookie(),this.lookUpUrl?XenForo.ajax(this.lookUpUrl,{_filter:{value:a,prefix:c?1:0}},b.context(this,"filterAjax"),{type:"GET"}):(a=this.applyFilter(this.FilterListItems),this.$listCounter.text(a),
this.$groups.each(function(a,c){var f=b(c);f.show();f.find("li.listItem:visible").length==0&&f.hide()}),this.removeAjaxResults(),this.showHideNoResults(a?!1:!0)))},removeAjaxResults:function(){this.$ajaxResults&&(this.$ajaxResults.remove(),delete this.$ajaxResults)},applyFilter:function(a){var b,d=0,e=RegExp((this.$prefixMatch.is(":checked")?"^":"")+"("+XenForo.regexQuote(this.$filter.data("XenForo.Prompt").val())+")","i");for(b=a.length-1;b>=0;b--)d+=a[b].filter(e);return d},showHideNoResults:function(a){var c=
b("#noResults");a?(c.length||(c=b('<li id="noResults" class="listNote" style="display:none" />').text(XenForo.phrases.no_items_matched_your_filter||"No items matched your filter."),this.$list.append(c)),c.xfFadeIn(XenForo.speed.normal)):c.xfHide()},filterAjax:function(a){if(!XenForo.hasResponseError(a)){a=b("<ul />").html(b.trim(a.templateHtml)).children();this.$groups.hide();this.$listItems.hide();this.lookUpUrl&&b(".PageNav").hide();this.removeAjaxResults();if(a.length){this.$ajaxResults=a;this.showHideNoResults(!1);
this.$list.append(a);a.xfActivate();var a=a.filter(".listItem").add(a.find(".listItem")),c=[];a.each(function(a,e){c[a]=new XenForo.FilterListItem(b(e))});this.applyFilter(c);this.$listCounter.text(a.length)}else this.$listCounter.text(0),this.showHideNoResults(!0);this.handleLast()}},getCookieName:function(){return"FilterList_"+encodeURIComponent(this.$form.attr("action")).replace(/[\.\+\/]|(%([0-9a-f]{2}|u\d+))/gi,"")},setCookie:function(){var a=(this.$prefixMatch.is(":checked")?1:0)+","+this.$filter.data("XenForo.Prompt").val();
this.$filter.data("XenForo.Prompt").isEmpty()?this.deleteCookie():b.setCookie(this.getCookieName(),a);return a},getCookie:function(){var a=b.getCookie(this.getCookieName());a&&(this.$prefixMatch.attr("checked",a.substring(0,1)=="1"?!0:!1),this.$filter.data("XenForo.Prompt").val(a.substring(2)));return a},deleteCookie:function(){b.deleteCookie(this.getCookieName(),"")},clearFilter:function(a){this.$filter.focus();this.$filter.data("XenForo.Prompt").val("",!0);this.filter(a);return!0}};XenForo.FilterListItem=
function(a){this.__construct(a)};XenForo.FilterListItem.prototype={__construct:function(a){this.$item=a;this.$textContainer=this.$item.find("h4 em");this.text=this.$textContainer.text();this.$item.find("input.Toggler").click(function(){b(this).closest("h4").toggleClass("disabled",!this.checked)})},filter:function(a){return this.text.match(a)?(this.$textContainer.html(this.text.replace(a,"<strong>$1</strong>")),this.$item.css("display","block"),1):(this.$item.css("display","none"),0)}};XenForo.RadioTablets=
function(a){a.children("label").each(function(){function c(c){c&&e.closest("form").submit();a.find('input:radio[name="'+e.attr("name")+'"]').each(function(){b(this).is(":checked")?b(this).closest(".radioTablet").addClass("checked"):b(this).closest(".radioTablet").removeClass("checked")})}var d=b(this),e=d.find("input:radio");d.addClass("radioTablet");e.hide().change(c);c()})};XenForo.Sortable=function(a){var c=a.data("connect-with"),d=a.closest(".FilterList"),e=d.data("sort-url");e?a.sortable({items:"li.listItem",
connectWith:c,forcePlaceholderSize:!0}).bind("sortupdate",function(){var a=[];d.find("[data-item-id]").each(function(c){var d=b(this),e=d.data("item-id"),d=d.parent().data("parent-id");a[c]=d!==void 0?[e,d]:e});d.find(c).each(function(a,c){var d=b(c);d.find("li.listItem").length==0?d.find("li.noResults").show():d.find("li.noResults").hide()});d.data("sort-timer")&&clearTimeout(d.data("sort-timer"));d.data("sort-timer",setTimeout(function(){XenForo.ajax(e,{order:a},function(){console.info("ajax request complete")})},
100))}):console.log("No FilterList or data-sort-url for sortable.")};XenForo.register(".FilterList","XenForo.FilterList");XenForo.register(".RadioTablets","XenForo.RadioTablets");XenForo.register(".Sortable","XenForo.Sortable")})(jQuery,this,document);
