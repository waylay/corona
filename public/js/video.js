/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(42);


/***/ }),

/***/ 42:
/***/ (function(module, exports) {

var tag = document.createElement('script');
tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var tv,
    playerDefaults = { autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3 };
var vid = [{ 'videoId': 'jwmvjJG_a34', 'startSeconds': 0, 'endSeconds': 15, 'suggestedQuality': 'hd720' }],
    randomVid = Math.floor(Math.random() * vid.length),
    currVid = randomVid;

function onYouTubePlayerAPIReady() {
    tv = new YT.Player('tv', { events: { 'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange }, playerVars: playerDefaults });
    console.log(tv);
}

function onPlayerReady() {
    tv.loadVideoById(vid[currVid]);
    tv.mute();
}

function onPlayerStateChange(e) {
    if (e.data === 1) {
        $('#tv').addClass('active');
        $('.hi em:nth-of-type(2)').html(currVid + 1);
    } else if (e.data === 2) {
        $('#tv').removeClass('active');
        if (currVid === vid.length - 1) {
            currVid = 0;
        } else {
            currVid++;
        }
        tv.loadVideoById(vid[currVid]);
        tv.seekTo(vid[currVid].startSeconds);
    }
}

function vidRescale() {

    var w = $(window).width() + 200,
        h = $(window).height() + 200;

    if (w / h > 16 / 9) {
        tv.setSize(w, w / 16 * 9);
        $('.tv .screen').css({ 'left': '0px' });
    } else {
        tv.setSize(h / 9 * 16, h);
        $('.tv .screen').css({ 'left': -($('.tv .screen').outerWidth() - w) / 2 });
    }
}

$(window).on('load resize', function () {
    vidRescale();
});

/***/ })

/******/ });