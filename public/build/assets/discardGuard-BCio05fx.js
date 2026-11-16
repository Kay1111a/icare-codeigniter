import{y as c,K as u}from"./index-CVPBUMsg.js";function o(a,i,s){const t=u("confirmDiscard",null);let n=null;return c(a,r=>{n=null,r&&setTimeout(()=>{n=JSON.stringify(i.value)},400)}),async function(){n!==null&&JSON.stringify(i.value)!==n&&t&&!await t()||s()}}export{o as u};
//# sourceMappingURL=discardGuard-BCio05fx.js.map
