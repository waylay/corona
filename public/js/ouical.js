!function(t){var o={};function e(n){if(o[n])return o[n].exports;var a=o[n]={i:n,l:!1,exports:{}};return t[n].call(a.exports,a,a.exports,e),a.l=!0,a.exports}e.m=t,e.c=o,e.d=function(t,o,n){e.o(t,o)||Object.defineProperty(t,o,{configurable:!1,enumerable:!0,get:n})},e.n=function(t){var o=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(o,"a",o),o},e.o=function(t,o){return Object.prototype.hasOwnProperty.call(t,o)},e.p="",e(e.s=5)}({5:function(t,o,e){t.exports=e("aTEA")},aTEA:function(t,o){!function(t){var o=function(t){return t.toISOString().replace(/-|:|\.\d+/g,"")},e=function(t){return t.end?o(t.end):o(new Date(t.start.getTime()+6e4*t.duration))},n={google:function(t){var n=o(t.start),a=e(t);return'<li><a class="icon-google" target="_blank" href="'+encodeURI(["https://www.google.com/calendar/render","?action=TEMPLATE","&text="+(t.title||""),"&dates="+(n||""),"/"+(a||""),"&details="+(t.description||""),"&location="+(t.address||""),"&sprop=&sprop=name:"].join(""))+'">Google Calendar</a></li>'},yahoo:function(t){var e=t.end?(t.end.getTime()-t.start.getTime())/6e4:t.duration,n=(e<600?"0"+Math.floor(e/60):Math.floor(e/60)+"")+(e%60<10?"0"+e%60:e%60+""),a=o(new Date(t.start-6e4*t.start.getTimezoneOffset()))||"";return'<li><a class="icon-yahoo" target="_blank" href="'+encodeURI(["http://calendar.yahoo.com/?v=60&view=d&type=20","&title="+(t.title||""),"&st="+a,"&dur="+(n||""),"&desc="+(t.description||""),"&in_loc="+(t.address||"")].join(""))+'">Yahoo! Calendar</a></li>'},ics:function(t,n,a){var r=o(t.start),i=e(t);return'<li><a class="'+n+'" target="_blank" href="'+encodeURI("data:text/calendar;charset=utf8,"+["BEGIN:VCALENDAR","VERSION:2.0","BEGIN:VEVENT","URL:"+document.URL,"DTSTART:"+(r||""),"DTEND:"+(i||""),"SUMMARY:"+(t.title||""),"DESCRIPTION:"+(t.description||""),"LOCATION:"+(t.address||""),"END:VEVENT","END:VCALENDAR"].join("\n"))+'">'+a+"</a></li>"},ical:function(t){return this.ics(t,"icon-ical","iCalendar")},outlook:function(t){return this.ics(t,"icon-outlook","Outlook")}};t.createCalendar=function(t){var o,e,a,r,i;{if(function(t){return void 0!==t.data&&void 0!==t.data.start&&(void 0!==t.data.end||void 0!==t.data.duration)}(t))return i=t.data,o={ical:n.ical(i),google:n.google(i),outlook:n.outlook(i),yahoo:n.yahoo(i)},e=function(t){if(t.options&&t.options.class)return t.options.class}(t),a=function(t){return t.options&&t.options.id?t.options.id:Math.floor(1e6*Math.random())}(t),(r=document.createElement("ul")).innerHTML='<li role="separator" class="divider"></li>',Object.keys(o).forEach(function(t){r.innerHTML+=o[t]}),r.className="dropdown-menu",void 0!==e&&(r.className+=" "+e),r.id=a,r;console.log("Event details missing.")}}}(this)}});