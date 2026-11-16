function a(t,c="download"){const n=new Blob([t],{type:"application/octet-stream"}),o=URL.createObjectURL(n),e=document.createElement("a");e.href=o,e.download=c,document.body.appendChild(e),e.click(),e.remove(),setTimeout(()=>URL.revokeObjectURL(o),1e3)}export{a as s};
//# sourceMappingURL=download-D5WwU8d0.js.map
