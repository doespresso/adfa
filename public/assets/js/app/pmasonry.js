!function(a){var b=null,c=null,d=null;a.extend(a.Isotope.prototype,{isFirstRun:!0,_perfectMasonryReset:function(){this.options.perfectMasonry=this.options.perfectMasonry||{};var e="horizontal"!=this.options.perfectMasonry.layout,f=1==this.options.perfectMasonry.liquid;this.isFirstRun&&(this.isFirstRun=!1,b=this,c=a(this.element.context),d=c.parent(),this.options.perfectMasonry.minCols=this.options.perfectMasonry.minCols||1,this.options.perfectMasonry.minRows=this.options.perfectMasonry.minRows||1,this.options.perfectMasonry.maxCols=this.options.perfectMasonry.maxCols||9999,this.options.perfectMasonry.maxRows=this.options.perfectMasonry.maxRows||9999),f&&a.data(window,"events")&&a._data(window,"events").smartresize&&(a(window).off("smartresize.isotope"),a(window).on("resize.isotope.perfectmasonry",function(){c.hasClass("isotope")&&c.isotope("reLayout")}));var g=this.perfectMasonry={};if(this._getSegments(),this._getSegments(!0),this._perfectMasonryGetSegments(),f){var h=d.width(),i=d.height();this.options.perfectMasonry.columnWidth=this.options.perfectMasonry.columnWidth||g.columnWidth,this.options.perfectMasonry.rowHeight=this.options.perfectMasonry.rowHeight||g.rowHeight,g.cols=this.options.perfectMasonry.cols||Math.floor(h/this.options.perfectMasonry.columnWidth),g.rows=this.options.perfectMasonry.rows||Math.floor(i/this.options.perfectMasonry.rowHeight),g.cols=Math.min(Math.max(g.cols,this.options.perfectMasonry.minCols),this.options.perfectMasonry.maxCols),g.rows=Math.min(Math.max(g.rows,this.options.perfectMasonry.minRows),this.options.perfectMasonry.maxRows);var j=e?g.columnWidth/(h/g.cols):g.rowHeight/(i/g.rows);g.columnWidth=Math.floor(g.columnWidth/j),g.rowHeight=Math.floor(g.rowHeight/j)}g.grid=new Array(this.perfectMasonry.cols),g.containerHeight=0,g.containerWidth=0},_perfectMasonryLayout:function(b){var c=this,d=this.perfectMasonry,e="horizontal"!=c.options.perfectMasonry.layout,f=1==c.options.perfectMasonry.liquid;if(d.grid=new Array(d[e?"cols":"rows"]),d.grid&&d.grid.length){b.each(function(){var b=a(this),g=f?b.data("colSpan"):Math.ceil(b.outerWidth()/(d.columnWidth+1)),h=f?b.data("rowSpan"):Math.ceil(b.outerHeight()/(d.rowHeight+1));g||(g=Math.ceil(b.outerWidth(!0)/(d.columnWidth+1)),h=Math.ceil(b.outerHeight(!0)/(d.rowHeight+1)),b.data("colSpan",g),b.data("rowSpan",h));for(var i=e?g:h,j=e?h:g,k=Math.max((e?d.cols-g:d.rows-h)+1,1),l=-1,m=0,n=0;++l<1e4;){d.grid[l]=d.grid[l]||[];for(var o=0;k>o;o++){var p=d.grid[l][o];if(!p){var q=!0;if(g>1||h>1)for(var r=0;i>r;r++){for(var s=0;j>s;s++)if(d.grid[l+s]=d.grid[l+s]||[],d.grid[l+s][o+r]){q=!1;break}if(!q)break}if(q){for(var r=0;i>r;r++)for(var s=0;j>s;s++)d.grid[l+s][o+r]=!0;var m=l,n=o;if(e)var m=o,n=l;return d.containerWidth=Math.max(d.containerWidth,(m+i)*d.columnWidth),d.containerHeight=Math.max(d.containerHeight,(n+j)*d.rowHeight),1==c.options.perfectMasonry.liquid&&b.css({width:d.columnWidth*g,height:d.rowHeight*h}),void c._pushPosition(b,m*d.columnWidth,n*d.rowHeight)}}}}c._pushPosition(b,-9999,-9999)});var g=e?d.grid.length:d.grid[0]&&d.grid[0].length,h=e?d.grid[0]&&d.grid[0].length:d.grid.length;a(this.element.context).attr("data-isotope-rows",g).attr("data-isotope-cols",h)}},_perfectMasonryGetContainerSize:function(){return{width:this.perfectMasonry.containerWidth,height:this.perfectMasonry.containerHeight}},_perfectMasonryResizeChanged:function(){var a=this.perfectMasonry,b=a.cols,c=a.rows;return this._perfectMasonryGetSegments(),"horizontal"==this.options.perfectMasonry.layout&&c!==a.rows?!0:b!==a.cols?!0:!1},_perfectMasonryGetSegments:function(){var a=this.perfectMasonry,b=this.options.perfectMasonry.parent||this.element.parent(),c=b.width();a.cols=Math.floor(c/a.columnWidth)||1;var d=b.height();a.rows=Math.floor(d/a.rowHeight)||1}})}(jQuery);