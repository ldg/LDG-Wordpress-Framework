//custom js for the lost framework
/**
*
* defer below the fold css until the whole page is loaded
*
* inline above the fold css first, then load critical css with script
*
**/
// var cb = function() {
//     var l = document.createElement('link'); l.rel = 'stylesheet';
//     l.href = 'main.css';
//     var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
//   };
//   var raf = requestAnimationFrame || mozRequestAnimationFrame ||
//       webkitRequestAnimationFrame || msRequestAnimationFrame;
//   if (raf) {
//   		raf(cb);
//   } else {
//   	window.addEventListener('load', cb);
//   }