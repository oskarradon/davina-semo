!function(t){var e={};function n(i){if(e[i])return e[i].exports;var a=e[i]={i:i,l:!1,exports:{}};return t[i].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)n.d(i,a,function(e){return t[e]}.bind(null,a));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=2)}([function(t,e,n){},function(t,e,n){"use strict";var i=n(0);n.n(i).a},function(t,e,n){"use strict";n.r(e);var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("k-field",t._b({staticClass:"k-link-field"},"k-field",t.$props,!1),[t.hasSettings?n("k-button",{attrs:{slot:"options",icon:t.isMainScreen?"cog":"cancel"},on:{click:t.switchScreen},slot:"options"},[t._v(" "+t._s(t.isMainScreen?t.$t("label.settings"):t.$t("label.close"))+" ")]):t._e(),t.isMainScreen?n("LinkSelect",{attrs:{width:t.width,options:t.options,endpoints:t.endpoints},on:{input:t.emitInput},model:{value:t.link,callback:function(e){t.link=e},expression:"link"}}):n("LinkSettings",{attrs:{types:t.settings},on:{input:t.emitInput},model:{value:t.settingsData,callback:function(e){t.settingsData=e},expression:"settingsData"}})],1)};i._withStripped=!0;var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("k-grid",[t.showSelect?n("k-column",{attrs:{width:t.uiWidth.select}},[n("k-select-field",{attrs:{type:"select",options:t.types,empty:!1},on:{input:t.inputType},model:{value:t.data.type,callback:function(e){t.$set(t.data,"type",e)},expression:"data.type"}})],1):t._e(),n("k-column",{attrs:{width:t.uiWidth.field}},["url"===t.data.type?n("k-url-field",{attrs:{placeholder:"https://example.com/"},model:{value:t.data.value,callback:function(e){t.$set(t.data,"value",e)},expression:"data.value"}}):"page"===t.data.type?n("k-pages-field",{attrs:{search:!0,endpoints:{field:this.endpoints.field+"/link-pages"}},model:{value:t.data.value,callback:function(e){t.$set(t.data,"value",e)},expression:"data.value"}}):"file"===t.data.type?n("k-files-field",{attrs:{search:!0,endpoints:{field:this.endpoints.field+"/link-files"}},model:{value:t.data.value,callback:function(e){t.$set(t.data,"value",e)},expression:"data.value"}}):"email"===t.data.type?n("k-email-field",{model:{value:t.data.value,callback:function(e){t.$set(t.data,"value",e)},expression:"data.value"}}):"tel"===t.data.type?n("k-tel-field",{model:{value:t.data.value,callback:function(e){t.$set(t.data,"value",e)},expression:"data.value"}}):n("k-box",{attrs:{theme:"negative",text:t.$t("error.type",{type:t.data.type})}})],1)],1)};a._withStripped=!0;var l={props:{value:Object,options:Array,endpoints:Object,width:String},data:function(){return{data:this.value,updating:!1}},computed:{showSelect:function(){return this.types.length>1},widthPercent:function(){var t=this.width.split("/");return(t[0]||1)/(t[1]||1)*100},uiWidth:function(){var t=this.widthPercent>=50;return{select:t?"1/4":"1/1",field:this.showSelect?t?"3/4":"1/1":null}},types:function(){return this.options.map(function(t){return{value:t,text:this.$t(t)}}.bind(this))}},methods:{inputType:function(){this.data.value=void 0}},watch:{data:{deep:!0,handler:function(t){this.updating||this.$emit("input",t)}},value:function(t){this.updating=!0,Object.assign(this.data,t),this.$nextTick(function(){this.updating=!1}.bind(this))}}};n(1);function s(t,e,n,i,a,l,s,r){var o,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=n,u._compiled=!0),i&&(u.functional=!0),l&&(u._scopeId="data-v-"+l),s?(o=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),a&&a.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},u._ssrRegister=o):a&&(o=r?function(){a.call(this,this.$root.$options.shadowRoot)}:a),o)if(u.functional){u._injectStyles=o;var p=u.render;u.render=function(t,e){return o.call(e),p(t,e)}}else{var c=u.beforeCreate;u.beforeCreate=c?[].concat(c,o):[o]}return{exports:t,options:u}}var r=s(l,a,[],!1,null,"1199651c",null);r.options.__file="app/LinkSelect.vue";var o=r.exports,u=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",{staticClass:"k-structure-form"},[n("k-form",{staticClass:"k-structure-form-fields",attrs:{fields:t.fields},on:{input:function(e){return t.$emit("input",t.data)}},model:{value:t.data,callback:function(e){t.data=e},expression:"data"}})],1)};u._withStripped=!0;var p=s({props:{value:Object,types:Object},data:function(){return{data:this.value}},computed:{fields:function(){var t={},e={text:{width:"1/2",type:"text",label:this.$t("label.text")},popup:{width:"1/4",type:"toggle",label:this.$t("label.popup")},hash:{width:"1/4",type:"text",label:this.$t("label.fragment"),placeholder:this.$t("placeholder.elementid")}};for(var n in this.types)e[n]&&this.types[n]&&(t[n]=Object.assign(e[n],this.types[n]));for(var n in e)t[n]||!1===this.types[n]||(t[n]=e[n]);return t}},watch:{value:function(t){Object.assign(this.data,t)}}},u,[],!1,null,null,null);p.options.__file="app/LinkSettings.vue";var c=s({components:{LinkSelect:o,LinkSettings:p.exports},props:{value:{type:Object,default:function(){return{type:"url",value:void 0}}},endpoints:Object,width:String,label:String,help:String,disabled:Boolean,required:Boolean,options:Array,settings:Object},data:function(){return{data:this.value,screen:"link"}},computed:{link:{get:function(){return{type:this.data.type,value:this.data.value}},set:function(t){Object.assign(this.data,t)}},settingsData:{get:function(){return{text:this.data.text,popup:this.data.popup,hash:this.data.hash}},set:function(t){Object.assign(this.data,t)}},isMainScreen:function(){return"link"===this.screen},hasSettings:function(){return!1!==this.settings}},methods:{emitInput:function(){this.$emit("input",this.data)},switchScreen:function(){this.screen=this.isMainScreen?"options":"link"}},watch:{value:function(t){this.data=Object.assign({},t)}}},i,[],!1,null,null,null);c.options.__file="app/App.vue";var d=c.exports,f=function(){var t=this,e=t.$createElement,n=t._self._c||e;return t.linkValue?n("div",[t.isArray(t.linkValue)?["page"===t.linkType?n("k-pages-field-preview",t._b({attrs:{value:t.linkValue}},"k-pages-field-preview",t.$props,!1)):"file"===t.linkType?n("k-files-field-preview",t._b({attrs:{value:t.linkValue}},"k-files-field-preview",t.$props,!1)):t._e()]:n("p",{staticClass:"k-structure-table-text k-url-field-preview"},["url"===t.linkType?n("a",{staticClass:"k-link",attrs:{href:t.linkValue,target:"_blank"},on:{click:t.handleClick}},[t._v(" "+t._s(t.value.text||t.linkValue)+" ")]):[t.value.text?[n("strong",[t._v(t._s(t.value.text))]),t._v(" "+t._s(t.linkValue)+" ")]:[t._v(" "+t._s(t.linkValue)+" ")]]],2)],2):t._e()};f._withStripped=!0;var h=s({props:{value:Object,field:Object},computed:{linkType:function(){return this.value&&this.value.type},linkValue:function(){return this.value&&this.value.value}},methods:{isArray:Array.isArray,handleClick:function(t){t.stopImmediatePropagation()}}},f,[],!1,null,null,null);h.options.__file="app/Preview.vue";var v=h.exports;panel.plugin("oblik/link-field",{fields:{link:d},components:{"k-link-field-preview":v}})}]);