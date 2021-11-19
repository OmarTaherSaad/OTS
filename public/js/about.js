/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@tweenjs/tween.js/src/Tween.js":
/*!*****************************************************!*\
  !*** ./node_modules/@tweenjs/tween.js/src/Tween.js ***!
  \*****************************************************/
/***/ (function(module, exports, __webpack_require__) {

/* provided dependency */ var process = __webpack_require__(/*! process/browser.js */ "./node_modules/process/browser.js");
var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/**
 * Tween.js - Licensed under the MIT license
 * https://github.com/tweenjs/tween.js
 * ----------------------------------------------
 *
 * See https://github.com/tweenjs/tween.js/graphs/contributors for the full list of contributors.
 * Thank you all, you're awesome!
 */


var _Group = function () {
	this._tweens = {};
	this._tweensAddedDuringUpdate = {};
};

_Group.prototype = {
	getAll: function () {

		return Object.keys(this._tweens).map(function (tweenId) {
			return this._tweens[tweenId];
		}.bind(this));

	},

	removeAll: function () {

		this._tweens = {};

	},

	add: function (tween) {

		this._tweens[tween.getId()] = tween;
		this._tweensAddedDuringUpdate[tween.getId()] = tween;

	},

	remove: function (tween) {

		delete this._tweens[tween.getId()];
		delete this._tweensAddedDuringUpdate[tween.getId()];

	},

	update: function (time, preserve) {

		var tweenIds = Object.keys(this._tweens);

		if (tweenIds.length === 0) {
			return false;
		}

		time = time !== undefined ? time : TWEEN.now();

		// Tweens are updated in "batches". If you add a new tween during an update, then the
		// new tween will be updated in the next batch.
		// If you remove a tween during an update, it may or may not be updated. However,
		// if the removed tween was added during the current batch, then it will not be updated.
		while (tweenIds.length > 0) {
			this._tweensAddedDuringUpdate = {};

			for (var i = 0; i < tweenIds.length; i++) {

				var tween = this._tweens[tweenIds[i]];

				if (tween && tween.update(time) === false) {
					tween._isPlaying = false;

					if (!preserve) {
						delete this._tweens[tweenIds[i]];
					}
				}
			}

			tweenIds = Object.keys(this._tweensAddedDuringUpdate);
		}

		return true;

	}
};

var TWEEN = new _Group();

TWEEN.Group = _Group;
TWEEN._nextId = 0;
TWEEN.nextId = function () {
	return TWEEN._nextId++;
};


// Include a performance.now polyfill.
// In node.js, use process.hrtime.
if (typeof (self) === 'undefined' && typeof (process) !== 'undefined' && process.hrtime) {
	TWEEN.now = function () {
		var time = process.hrtime();

		// Convert [seconds, nanoseconds] to milliseconds.
		return time[0] * 1000 + time[1] / 1000000;
	};
}
// In a browser, use self.performance.now if it is available.
else if (typeof (self) !== 'undefined' &&
         self.performance !== undefined &&
		 self.performance.now !== undefined) {
	// This must be bound, because directly assigning this function
	// leads to an invocation exception in Chrome.
	TWEEN.now = self.performance.now.bind(self.performance);
}
// Use Date.now if it is available.
else if (Date.now !== undefined) {
	TWEEN.now = Date.now;
}
// Otherwise, use 'new Date().getTime()'.
else {
	TWEEN.now = function () {
		return new Date().getTime();
	};
}


TWEEN.Tween = function (object, group) {
	this._object = object;
	this._valuesStart = {};
	this._valuesEnd = {};
	this._valuesStartRepeat = {};
	this._duration = 1000;
	this._repeat = 0;
	this._repeatDelayTime = undefined;
	this._yoyo = false;
	this._isPlaying = false;
	this._reversed = false;
	this._delayTime = 0;
	this._startTime = null;
	this._easingFunction = TWEEN.Easing.Linear.None;
	this._interpolationFunction = TWEEN.Interpolation.Linear;
	this._chainedTweens = [];
	this._onStartCallback = null;
	this._onStartCallbackFired = false;
	this._onUpdateCallback = null;
	this._onRepeatCallback = null;
	this._onCompleteCallback = null;
	this._onStopCallback = null;
	this._group = group || TWEEN;
	this._id = TWEEN.nextId();

};

TWEEN.Tween.prototype = {
	getId: function () {
		return this._id;
	},

	isPlaying: function () {
		return this._isPlaying;
	},

	to: function (properties, duration) {

		this._valuesEnd = properties;

		if (duration !== undefined) {
			this._duration = duration;
		}

		return this;

	},

	duration: function duration(d) {
		this._duration = d;
		return this;
	},

	start: function (time) {

		this._group.add(this);

		this._isPlaying = true;

		this._onStartCallbackFired = false;

		this._startTime = time !== undefined ? typeof time === 'string' ? TWEEN.now() + parseFloat(time) : time : TWEEN.now();
		this._startTime += this._delayTime;

		for (var property in this._valuesEnd) {

			// Check if an Array was provided as property value
			if (this._valuesEnd[property] instanceof Array) {

				if (this._valuesEnd[property].length === 0) {
					continue;
				}

				// Create a local copy of the Array with the start value at the front
				this._valuesEnd[property] = [this._object[property]].concat(this._valuesEnd[property]);

			}

			// If `to()` specifies a property that doesn't exist in the source object,
			// we should not set that property in the object
			if (this._object[property] === undefined) {
				continue;
			}

			// Save the starting value.
			this._valuesStart[property] = this._object[property];

			if ((this._valuesStart[property] instanceof Array) === false) {
				this._valuesStart[property] *= 1.0; // Ensures we're using numbers, not strings
			}

			this._valuesStartRepeat[property] = this._valuesStart[property] || 0;

		}

		return this;

	},

	stop: function () {

		if (!this._isPlaying) {
			return this;
		}

		this._group.remove(this);
		this._isPlaying = false;

		if (this._onStopCallback !== null) {
			this._onStopCallback(this._object);
		}

		this.stopChainedTweens();
		return this;

	},

	end: function () {

		this.update(Infinity);
		return this;

	},

	stopChainedTweens: function () {

		for (var i = 0, numChainedTweens = this._chainedTweens.length; i < numChainedTweens; i++) {
			this._chainedTweens[i].stop();
		}

	},

	group: function (group) {
		this._group = group;
		return this;
	},

	delay: function (amount) {

		this._delayTime = amount;
		return this;

	},

	repeat: function (times) {

		this._repeat = times;
		return this;

	},

	repeatDelay: function (amount) {

		this._repeatDelayTime = amount;
		return this;

	},

	yoyo: function (yoyo) {

		this._yoyo = yoyo;
		return this;

	},

	easing: function (easingFunction) {

		this._easingFunction = easingFunction;
		return this;

	},

	interpolation: function (interpolationFunction) {

		this._interpolationFunction = interpolationFunction;
		return this;

	},

	chain: function () {

		this._chainedTweens = arguments;
		return this;

	},

	onStart: function (callback) {

		this._onStartCallback = callback;
		return this;

	},

	onUpdate: function (callback) {

		this._onUpdateCallback = callback;
		return this;

	},

	onRepeat: function onRepeat(callback) {

		this._onRepeatCallback = callback;
		return this;

	},

	onComplete: function (callback) {

		this._onCompleteCallback = callback;
		return this;

	},

	onStop: function (callback) {

		this._onStopCallback = callback;
		return this;

	},

	update: function (time) {

		var property;
		var elapsed;
		var value;

		if (time < this._startTime) {
			return true;
		}

		if (this._onStartCallbackFired === false) {

			if (this._onStartCallback !== null) {
				this._onStartCallback(this._object);
			}

			this._onStartCallbackFired = true;
		}

		elapsed = (time - this._startTime) / this._duration;
		elapsed = (this._duration === 0 || elapsed > 1) ? 1 : elapsed;

		value = this._easingFunction(elapsed);

		for (property in this._valuesEnd) {

			// Don't update properties that do not exist in the source object
			if (this._valuesStart[property] === undefined) {
				continue;
			}

			var start = this._valuesStart[property] || 0;
			var end = this._valuesEnd[property];

			if (end instanceof Array) {

				this._object[property] = this._interpolationFunction(end, value);

			} else {

				// Parses relative end values with start as base (e.g.: +10, -3)
				if (typeof (end) === 'string') {

					if (end.charAt(0) === '+' || end.charAt(0) === '-') {
						end = start + parseFloat(end);
					} else {
						end = parseFloat(end);
					}
				}

				// Protect against non numeric properties.
				if (typeof (end) === 'number') {
					this._object[property] = start + (end - start) * value;
				}

			}

		}

		if (this._onUpdateCallback !== null) {
			this._onUpdateCallback(this._object, elapsed);
		}

		if (elapsed === 1) {

			if (this._repeat > 0) {

				if (isFinite(this._repeat)) {
					this._repeat--;
				}

				// Reassign starting values, restart by making startTime = now
				for (property in this._valuesStartRepeat) {

					if (typeof (this._valuesEnd[property]) === 'string') {
						this._valuesStartRepeat[property] = this._valuesStartRepeat[property] + parseFloat(this._valuesEnd[property]);
					}

					if (this._yoyo) {
						var tmp = this._valuesStartRepeat[property];

						this._valuesStartRepeat[property] = this._valuesEnd[property];
						this._valuesEnd[property] = tmp;
					}

					this._valuesStart[property] = this._valuesStartRepeat[property];

				}

				if (this._yoyo) {
					this._reversed = !this._reversed;
				}

				if (this._repeatDelayTime !== undefined) {
					this._startTime = time + this._repeatDelayTime;
				} else {
					this._startTime = time + this._delayTime;
				}

				if (this._onRepeatCallback !== null) {
					this._onRepeatCallback(this._object);
				}

				return true;

			} else {

				if (this._onCompleteCallback !== null) {

					this._onCompleteCallback(this._object);
				}

				for (var i = 0, numChainedTweens = this._chainedTweens.length; i < numChainedTweens; i++) {
					// Make the chained tweens start exactly at the time they should,
					// even if the `update()` method was called way past the duration of the tween
					this._chainedTweens[i].start(this._startTime + this._duration);
				}

				return false;

			}

		}

		return true;

	}
};


TWEEN.Easing = {

	Linear: {

		None: function (k) {

			return k;

		}

	},

	Quadratic: {

		In: function (k) {

			return k * k;

		},

		Out: function (k) {

			return k * (2 - k);

		},

		InOut: function (k) {

			if ((k *= 2) < 1) {
				return 0.5 * k * k;
			}

			return - 0.5 * (--k * (k - 2) - 1);

		}

	},

	Cubic: {

		In: function (k) {

			return k * k * k;

		},

		Out: function (k) {

			return --k * k * k + 1;

		},

		InOut: function (k) {

			if ((k *= 2) < 1) {
				return 0.5 * k * k * k;
			}

			return 0.5 * ((k -= 2) * k * k + 2);

		}

	},

	Quartic: {

		In: function (k) {

			return k * k * k * k;

		},

		Out: function (k) {

			return 1 - (--k * k * k * k);

		},

		InOut: function (k) {

			if ((k *= 2) < 1) {
				return 0.5 * k * k * k * k;
			}

			return - 0.5 * ((k -= 2) * k * k * k - 2);

		}

	},

	Quintic: {

		In: function (k) {

			return k * k * k * k * k;

		},

		Out: function (k) {

			return --k * k * k * k * k + 1;

		},

		InOut: function (k) {

			if ((k *= 2) < 1) {
				return 0.5 * k * k * k * k * k;
			}

			return 0.5 * ((k -= 2) * k * k * k * k + 2);

		}

	},

	Sinusoidal: {

		In: function (k) {

			return 1 - Math.cos(k * Math.PI / 2);

		},

		Out: function (k) {

			return Math.sin(k * Math.PI / 2);

		},

		InOut: function (k) {

			return 0.5 * (1 - Math.cos(Math.PI * k));

		}

	},

	Exponential: {

		In: function (k) {

			return k === 0 ? 0 : Math.pow(1024, k - 1);

		},

		Out: function (k) {

			return k === 1 ? 1 : 1 - Math.pow(2, - 10 * k);

		},

		InOut: function (k) {

			if (k === 0) {
				return 0;
			}

			if (k === 1) {
				return 1;
			}

			if ((k *= 2) < 1) {
				return 0.5 * Math.pow(1024, k - 1);
			}

			return 0.5 * (- Math.pow(2, - 10 * (k - 1)) + 2);

		}

	},

	Circular: {

		In: function (k) {

			return 1 - Math.sqrt(1 - k * k);

		},

		Out: function (k) {

			return Math.sqrt(1 - (--k * k));

		},

		InOut: function (k) {

			if ((k *= 2) < 1) {
				return - 0.5 * (Math.sqrt(1 - k * k) - 1);
			}

			return 0.5 * (Math.sqrt(1 - (k -= 2) * k) + 1);

		}

	},

	Elastic: {

		In: function (k) {

			if (k === 0) {
				return 0;
			}

			if (k === 1) {
				return 1;
			}

			return -Math.pow(2, 10 * (k - 1)) * Math.sin((k - 1.1) * 5 * Math.PI);

		},

		Out: function (k) {

			if (k === 0) {
				return 0;
			}

			if (k === 1) {
				return 1;
			}

			return Math.pow(2, -10 * k) * Math.sin((k - 0.1) * 5 * Math.PI) + 1;

		},

		InOut: function (k) {

			if (k === 0) {
				return 0;
			}

			if (k === 1) {
				return 1;
			}

			k *= 2;

			if (k < 1) {
				return -0.5 * Math.pow(2, 10 * (k - 1)) * Math.sin((k - 1.1) * 5 * Math.PI);
			}

			return 0.5 * Math.pow(2, -10 * (k - 1)) * Math.sin((k - 1.1) * 5 * Math.PI) + 1;

		}

	},

	Back: {

		In: function (k) {

			var s = 1.70158;

			return k * k * ((s + 1) * k - s);

		},

		Out: function (k) {

			var s = 1.70158;

			return --k * k * ((s + 1) * k + s) + 1;

		},

		InOut: function (k) {

			var s = 1.70158 * 1.525;

			if ((k *= 2) < 1) {
				return 0.5 * (k * k * ((s + 1) * k - s));
			}

			return 0.5 * ((k -= 2) * k * ((s + 1) * k + s) + 2);

		}

	},

	Bounce: {

		In: function (k) {

			return 1 - TWEEN.Easing.Bounce.Out(1 - k);

		},

		Out: function (k) {

			if (k < (1 / 2.75)) {
				return 7.5625 * k * k;
			} else if (k < (2 / 2.75)) {
				return 7.5625 * (k -= (1.5 / 2.75)) * k + 0.75;
			} else if (k < (2.5 / 2.75)) {
				return 7.5625 * (k -= (2.25 / 2.75)) * k + 0.9375;
			} else {
				return 7.5625 * (k -= (2.625 / 2.75)) * k + 0.984375;
			}

		},

		InOut: function (k) {

			if (k < 0.5) {
				return TWEEN.Easing.Bounce.In(k * 2) * 0.5;
			}

			return TWEEN.Easing.Bounce.Out(k * 2 - 1) * 0.5 + 0.5;

		}

	}

};

TWEEN.Interpolation = {

	Linear: function (v, k) {

		var m = v.length - 1;
		var f = m * k;
		var i = Math.floor(f);
		var fn = TWEEN.Interpolation.Utils.Linear;

		if (k < 0) {
			return fn(v[0], v[1], f);
		}

		if (k > 1) {
			return fn(v[m], v[m - 1], m - f);
		}

		return fn(v[i], v[i + 1 > m ? m : i + 1], f - i);

	},

	Bezier: function (v, k) {

		var b = 0;
		var n = v.length - 1;
		var pw = Math.pow;
		var bn = TWEEN.Interpolation.Utils.Bernstein;

		for (var i = 0; i <= n; i++) {
			b += pw(1 - k, n - i) * pw(k, i) * v[i] * bn(n, i);
		}

		return b;

	},

	CatmullRom: function (v, k) {

		var m = v.length - 1;
		var f = m * k;
		var i = Math.floor(f);
		var fn = TWEEN.Interpolation.Utils.CatmullRom;

		if (v[0] === v[m]) {

			if (k < 0) {
				i = Math.floor(f = m * (1 + k));
			}

			return fn(v[(i - 1 + m) % m], v[i], v[(i + 1) % m], v[(i + 2) % m], f - i);

		} else {

			if (k < 0) {
				return v[0] - (fn(v[0], v[0], v[1], v[1], -f) - v[0]);
			}

			if (k > 1) {
				return v[m] - (fn(v[m], v[m], v[m - 1], v[m - 1], f - m) - v[m]);
			}

			return fn(v[i ? i - 1 : 0], v[i], v[m < i + 1 ? m : i + 1], v[m < i + 2 ? m : i + 2], f - i);

		}

	},

	Utils: {

		Linear: function (p0, p1, t) {

			return (p1 - p0) * t + p0;

		},

		Bernstein: function (n, i) {

			var fc = TWEEN.Interpolation.Utils.Factorial;

			return fc(n) / fc(i) / fc(n - i);

		},

		Factorial: (function () {

			var a = [1];

			return function (n) {

				var s = 1;

				if (a[n]) {
					return a[n];
				}

				for (var i = n; i > 1; i--) {
					s *= i;
				}

				a[n] = s;
				return s;

			};

		})(),

		CatmullRom: function (p0, p1, p2, p3, t) {

			var v0 = (p2 - p0) * 0.5;
			var v1 = (p3 - p1) * 0.5;
			var t2 = t * t;
			var t3 = t * t2;

			return (2 * p1 - 2 * p2 + v0 + v1) * t3 + (- 3 * p1 + 3 * p2 - 2 * v0 - v1) * t2 + v0 * t + p1;

		}

	}

};

// UMD (Universal Module Definition)
(function (root) {

	if (true) {

		// AMD
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return TWEEN;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

	} else {}

})(this);


/***/ }),

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/***/ ((module) => {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),

/***/ "./node_modules/vue-check-view/index.js":
/*!**********************************************!*\
  !*** ./node_modules/vue-check-view/index.js ***!
  \**********************************************/
/***/ ((module) => {

"use strict";


function getPlugin () {
  var ClassNames = {
      Full: 'view-in--full',
      In: 'view-in',
      GtHalf: 'view-in--gt-half',
      GtThird: 'view-in--gt-third',
      Out: 'view-out',
      Above: 'view-out--above',
      Below: 'view-out--below'
    },
    EventTypes = {
      Enter: 'enter',
      Exit: 'exit',
      Progress: 'progress'
    }

  function throttle (handler, timeout) {
    timeout = typeof timeout !== 'undefined' ? timeout : 0
    if (!handler || typeof handler !== 'function') throw new Error('Throttle handler argument is not incorrect. Must be a function.')
    var timeoutTime = 0
    return function (e) {
      if (timeoutTime) return
      timeoutTime = setTimeout(function () {
        timeoutTime = 0
        handler(e)
      }, timeout)
    }
  }

  function roundPercent (v) {
    return (v * 1000 | 0) / 1000
  }

  function objectAssign (obj, src) {
    for (var key in src) {
      if (src.hasOwnProperty(key)) obj[key] = src[key]
    }
    return obj
  }

  function createInstance (Vue, options) {
    options = objectAssign({throttleInterval: 16}, options) // 60fps
    var items = {},
      scrollThrottledHandler = throttle(scrollHandler, options.throttleInterval)
    var scrollValue = window.pageYOffset,
      itemIndex = 0

    window.addEventListener('scroll', scrollThrottledHandler)
    window.addEventListener('resize', scrollThrottledHandler)

    function scrollHandler (e) {
      var viewportTop = window.pageYOffset,
        viewportBottom = window.pageYOffset + window.document.documentElement.clientHeight,
        viewportHeight = window.document.documentElement.clientHeight,
        documentHeight = window.document.documentElement.scrollHeight,
        scrollPercent = roundPercent(window.pageYOffset / (documentHeight - viewportHeight))

      scrollValue = viewportTop - scrollValue

      function getInType (i) {
        var rect = i.element.getBoundingClientRect(),
          elementTop = rect.top + viewportTop,
          elementBottom = elementTop + rect.height,
          topIn = elementTop > viewportTop && elementTop < viewportBottom,
          bottomIn = elementBottom > viewportTop && elementBottom < viewportBottom,
          percentInView = topIn || bottomIn ? ((bottomIn ? elementBottom : viewportBottom) - (topIn ? elementTop : viewportTop)) / rect.height : 0,
          centerPercent = (elementTop - viewportTop + rect.height / 2) / viewportHeight,
          zeroPoint = viewportTop - rect.height,
          topPercent = (elementTop - zeroPoint) / (viewportBottom - zeroPoint),
          isAbove = percentInView === 0 && elementTop < viewportTop,
          isBelow = percentInView === 0 && elementTop > viewportTop

        return [(topIn ? 1 : 0) | (bottomIn ? 2 : 0) | (isAbove ? 4 : 0) | (isBelow ? 8 : 0), roundPercent(percentInView), roundPercent(centerPercent), roundPercent(topPercent), rect]
      }

      for (var id in items) {
        var i = items[id],
          inType = getInType(i)

        var type = inType[0],
          percentInView = inType[1],
          percentCenter = inType[2],
          percentTop = inType[3],
          rect = inType[4],
          classes = i.classes,
          classList = i.element.classList,
          inViewChange = i.percent <= 0 && percentInView,
          outViewChange = i.percent && percentInView === 0

        if (percentInView === 0 && i.percent === 0) continue
        i.rect = rect

        var eventType = (inViewChange && EventTypes.Enter) || (outViewChange && EventTypes.Exit) || EventTypes.Progress

        Object.keys(classes).forEach(function (v) {
          classes[v] = false
        })

        if (percentInView >= 0.5) {
          classes[ClassNames.GtHalf] = true
        }
        else if (percentInView >= 0.3) {
          classes[ClassNames.GtThird] = true
        }

        if (type === 8) {
          classes[ClassNames.Below] = true
          classes[ClassNames.Out] = true
        }
        else if (type === 4) {
          classes[ClassNames.Above] = true
          classes[ClassNames.Out] = true
        }
        else if (type === 3) {
          classes[ClassNames.Full] = true
          classes[ClassNames.In] = true
        }
        else if (type === 1) {
          classes[ClassNames.In] = true
        }
        else if (type === 2) {
          classes[ClassNames.In] = true
        }

        Object.keys(classes).forEach(function (n) {
          classList.toggle(n, classes[n])
          if (!classes[n]) delete classes[n]
        })

        if (typeof i.handler === 'function') {
          i.handler({
            type: eventType,
            percentInView: percentInView,
            percentTop: percentTop,
            percentCenter: percentCenter,
            scrollPercent: scrollPercent,
            scrollValue: scrollValue,
            target: i
          })
        }

        if (typeof i.onceenter === 'function' && eventType === EventTypes.Enter) {
          i.onceenter({
            type: eventType,
            percentInView: percentInView,
            percentTop: percentTop,
            percentCenter: percentCenter,
            scrollPercent: scrollPercent,
            scrollValue: scrollValue,
            target: i
          })
          delete i.onceenter
          if (!i.persist) delete items[id]
        }

        i.percent = percentInView
      }

      scrollValue = viewportTop
    }

    Vue.directive('view', {
      unbind: function (element, bind) {
        delete items[element.$scrollId]
      },
      inserted: function (element, bind) {
        var id = element.$scrollId || ('scrollId-' + itemIndex++),
          item = items[id] || {element: element, classes: {}, percent: -1, rect: {}}

        if (bind.modifiers && bind.modifiers.once) {
          item.onceenter = bind.value || function () {
          }
        }
        else {
          item.persist = true
          item.handler = bind.value
        }

        element.$scrollId = id
        items[id] = item
        scrollThrottledHandler()
      }
    })
  }

  return {
    install: function (Vue, options) {
      Vue.directive('view', Vue.prototype.$isServer ? {} : createInstance(Vue, options))
    }
  }
}

if (true) {
  module.exports = getPlugin()
}
else {}


/***/ }),

/***/ "./node_modules/vue2-scrollspy/src/animate.js":
/*!****************************************************!*\
  !*** ./node_modules/vue2-scrollspy/src/animate.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Easing": () => (/* binding */ Easing),
/* harmony export */   "scrollWithAnimation": () => (/* binding */ scrollWithAnimation)
/* harmony export */ });
/* harmony import */ var _tweenjs_tween_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @tweenjs/tween.js */ "./node_modules/@tweenjs/tween.js/src/Tween.js");
/* harmony import */ var _tweenjs_tween_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_tweenjs_tween_js__WEBPACK_IMPORTED_MODULE_0__);


const requestAnimationFrame = (function () {
  return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    window.msRequestAnimationFrame ||
    function (callback) {
      window.setTimeout(callback, 1000 / 60)
    }
})()

function animate () {
  if (_tweenjs_tween_js__WEBPACK_IMPORTED_MODULE_0___default().update()) {
    requestAnimationFrame(animate)
  }
}

requestAnimationFrame(animate)

const Easing = (_tweenjs_tween_js__WEBPACK_IMPORTED_MODULE_0___default().Easing)

function scrollWithAnimation (scrollEl, current, target, time, easing) {
  new (_tweenjs_tween_js__WEBPACK_IMPORTED_MODULE_0___default().Tween)({ postion: current })
    .to({ postion: target }, time)
    .easing(easing)
    .onUpdate(function (val) {
      scrollEl.scrollTop = val.postion
    })
    .start()

  animate()
}


/***/ }),

/***/ "./node_modules/vue2-scrollspy/src/index.js":
/*!**************************************************!*\
  !*** ./node_modules/vue2-scrollspy/src/index.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "Easing": () => (/* reexport safe */ _animate_js__WEBPACK_IMPORTED_MODULE_0__.Easing),
/* harmony export */   "install": () => (/* binding */ install)
/* harmony export */ });
/* harmony import */ var _animate_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./animate.js */ "./node_modules/vue2-scrollspy/src/animate.js");


const install = (Vue, options) => {
  if (install.installed) return

  const bodyScrollEl = {}

  // For ff, ie
  Object.defineProperty(bodyScrollEl, 'scrollTop', {
    get () {
      return document.body.scrollTop || document.documentElement.scrollTop
    },
    set (val) {
      document.body.scrollTop = val
      document.documentElement.scrollTop = val
    }
  })

  Object.defineProperty(bodyScrollEl, 'scrollHeight', {
    get () {
      return document.body.scrollHeight || document.documentElement.scrollHeight
    }
  })

  Object.defineProperty(bodyScrollEl, 'offsetHeight', {
    get () {
      return window.innerHeight
    }
  })

  const scrollSpyContext = '@@scrollSpyContext'
  const scrollSpyElements = {}
  const scrollSpySections = {}
  const activeElement = {}
  const activableElements = {}
  const currentIndex = {}

  options = Object.assign({
    allowNoActive: false,
    sectionSelector: null,
    data: null,
    offset: 0,
    time: 500,
    steps: 30,
    easing: null,
    active: {
      selector: null,
      class: 'active'
    },
    link: {
      selector: 'a'
    }
  }, options || {})

  function findElements (container, selector) {
    if (!selector) {
      return container.children
    }

    const id = scrollSpyId(container)

    const elements = []

    for (const el of container.querySelectorAll(selector)) {
      // Filter out elements that are owned by another directive
      if (scrollSpyIdFromAncestors(el) === id) {
        elements.push(el)
      }
    }

    return elements
  }

  function scrollSpyId (el) {
    return el.getAttribute('data-scroll-spy-id') || el.getAttribute('scroll-spy-id') || 'default'
  }

  function scrollSpyIdDefined (el) {
    return !!el.getAttribute('data-scroll-spy-id') || !!el.getAttribute('scroll-spy-id')
  }

  function scrollSpyIdFromAncestors (el) {
    do {
      if (scrollSpyIdDefined(el)) {
        return scrollSpyId(el)
      }
      el = el.parentElement
    } while (el)
    return 'default'
  }

  function initScrollSections (el, sectionSelector) {
    const id = scrollSpyId(el)
    const scrollSpyContextEl = el[scrollSpyContext]
    const idScrollSections = findElements(el, sectionSelector)
    scrollSpySections[id] = idScrollSections

    if (idScrollSections[0] && idScrollSections[0].offsetParent !== el) {
      scrollSpyContextEl.eventEl = window
      scrollSpyContextEl.scrollEl = bodyScrollEl
    }
  }

  function getOffsetTop (elem, untilParent) {
    let offsetTop = 0
    do {
      if (!isNaN(elem.offsetTop)) {
        offsetTop += elem.offsetTop
      }
      elem = elem.offsetParent
    } while (elem && elem !== untilParent)
    return offsetTop
  }

  function scrollTo (el, index) {
    const id = scrollSpyId(el)
    const idScrollSections = scrollSpySections[id]

    const { scrollEl, options } = el[scrollSpyContext]
    const current = scrollEl.scrollTop

    if (idScrollSections[index]) {
      const target = getOffsetTop(idScrollSections[index]) - options.offset
      if (options.easing) {
        (0,_animate_js__WEBPACK_IMPORTED_MODULE_0__.scrollWithAnimation)(scrollEl, current, target, options.time, options.easing)
        return
      }

      const time = options.time
      const steps = options.steps
      const timems = parseInt(time / steps)
      const gap = target - current
      for (let i = 0; i <= steps; i++) {
        const pos = current + (gap / steps) * i
        setTimeout(() => {
          scrollEl.scrollTop = pos
        }, timems * i)
      }
    }
  }

  Vue.directive('scroll-spy', {
    bind: function (el, binding, vnode) {
      function onScroll () {
        const id = scrollSpyId(el)
        const idScrollSections = scrollSpySections[id]

        const { scrollEl, options } = el[scrollSpyContext]

        let index

        if ((scrollEl.offsetHeight + scrollEl.scrollTop) >= scrollEl.scrollHeight - 10) {
          index = idScrollSections.length
        } else {
          for (index = 0; index < idScrollSections.length; index++) {
            if (getOffsetTop(idScrollSections[index], scrollEl) - options.offset > scrollEl.scrollTop) {
              break
            }
          }
        }

        index = index - 1

        if (index < 0) {
          index = options.allowNoActive ? null : 0
        } else if (options.allowNoActive && index >= idScrollSections.length - 1 &&
          getOffsetTop(idScrollSections[index]) + idScrollSections[index].offsetHeight < scrollEl.scrollTop) {
          index = null
        }

        if (index !== currentIndex[id]) {
          let idActiveElement = activeElement[id]
          if (idActiveElement) {
            idActiveElement.classList.remove(idActiveElement[scrollSpyContext].options.class)
            activeElement[id] = null
          }

          currentIndex[id] = index
          if (typeof currentIndex !== 'undefined' && Object.keys(activableElements).length > 0) {
            idActiveElement = activableElements[id][currentIndex[id]]
            activeElement[id] = idActiveElement

            if (idActiveElement) {
              idActiveElement.classList.add(idActiveElement[scrollSpyContext].options.class)
            }
          }

          if (options.data) {
            Vue.set(vnode.context, options.data, index)
          }
        }
      }

      vnode.context.$scrollTo = scrollTo.bind(null, el)

      const id = scrollSpyId(el)

      el[scrollSpyContext] = {
        onScroll,
        options: Object.assign({}, options, binding.value),
        id: scrollSpyId(el),
        eventEl: el,
        scrollEl: el
      }

      scrollSpyElements[id] = el
      delete currentIndex[id]
    },
    inserted: function (el) {
      const {
        options: { sectionSelector }
      } = el[scrollSpyContext]
      initScrollSections(el, sectionSelector)
      const { eventEl, onScroll } = el[scrollSpyContext]
      eventEl.addEventListener('scroll', onScroll)

      onScroll()
    },
    componentUpdated: function (el, binding) {
      el[scrollSpyContext].options = Object.assign({}, options, binding.value)
      const {
        onScroll, options: { sectionSelector }
      } = el[scrollSpyContext]

      initScrollSections(el, sectionSelector)
      onScroll()
    },
    unbind: function (el) {
      const { eventEl, onScroll } = el[scrollSpyContext]
      eventEl.removeEventListener('scroll', onScroll)
    }
  })

  function scrollSpyActive (el, binding) {
    const activeOptions = Object.assign({}, options.active, binding.value)
    initScrollActiveElement(el, activeOptions)
  }

  function initScrollActiveElement (el, activeOptions) {
    const id = scrollSpyId(el)
    activableElements[id] = findElements(el, activeOptions.selector)
    const arr = [...activableElements[id]]
    arr.map(el => {
      el[scrollSpyContext] = {
        options: activeOptions
      }
    })
  }

  Vue.directive('scroll-spy-active', {
    inserted: scrollSpyActive,
    componentUpdated: scrollSpyActive
  })

  function scrollLinkClickHandler (index, scrollSpyId, event) {
    scrollTo(scrollSpyElements[scrollSpyId], index)
  }

  function initScrollLink (el, selector) {
    const id = scrollSpyId(el)

    const linkElements = findElements(el, selector)

    for (let i = 0; i < linkElements.length; i++) {
      const linkElement = linkElements[i]

      const listener = scrollLinkClickHandler.bind(null, i, id)
      if (!linkElement[scrollSpyContext]) {
        linkElement[scrollSpyContext] = {}
      }

      if (!linkElement[scrollSpyContext].click) {
        linkElement.addEventListener('click', listener)
        linkElement[scrollSpyContext].click = listener
      }
    }
  }

  Vue.directive('scroll-spy-link', {
    inserted: function (el, binding) {
      const linkOptions = Object.assign({}, options.link, binding.value)
      initScrollLink(el, linkOptions.selector)
    },
    componentUpdated: function (el, binding) {
      const linkOptions = Object.assign({}, options.link, binding.value)
      initScrollLink(el, linkOptions.selector)
    },
    unbind (el) {
      const linkElements = findElements(el)

      for (let i = 0; i < linkElements.length; i++) {
        const linkElement = linkElements[i]
        const id = scrollSpyId(el)
        const listener = scrollLinkClickHandler.bind(null, i, id)
        if (!linkElement[scrollSpyContext]) {
          linkElement[scrollSpyContext] = {}
        }

        if (linkElement[scrollSpyContext].click) {
          linkElement.removeEventListener('click', listener)
          delete linkElement[scrollSpyContext]['click']
        }
      }
    }
  })
}

if (typeof window !== 'undefined' && window.Vue) {
  install(window.Vue)
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (install);




/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*******************************!*\
  !*** ./resources/js/about.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue2_scrollspy__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue2-scrollspy */ "./node_modules/vue2-scrollspy/src/index.js");
/* harmony import */ var vue_check_view__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-check-view */ "./node_modules/vue-check-view/index.js");
/* harmony import */ var vue_check_view__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_check_view__WEBPACK_IMPORTED_MODULE_1__);


window.vuePlugins = Array(2);
window.vuePlugins[0] = (vue_check_view__WEBPACK_IMPORTED_MODULE_1___default());
window.vuePlugins[1] = vue2_scrollspy__WEBPACK_IMPORTED_MODULE_0__["default"];
window.vueMix = {
  data: {
    titleOnSide: false,
    skills: {
      web: [{
        title: "Laravel",
        img: "/storage/assets/images/logos/laravel.png"
      }, {
        title: "Vue.js",
        img: "/storage/assets/images/logos/vuejs.png"
      }, {
        title: "Bootstrap",
        img: "/storage/assets/images/logos/Bootstrap.png"
      }],
      csharp: [{
        title: ".NET Core",
        img: "/storage/assets/images/logos/csharp-netcore.png"
      }, {
        title: "<abbr title='Model-View-Controller'>MVC Design Pattern</abbr>",
        img: "/storage/assets/images/logos/csharp-mvc.png"
      }, {
        title: "<abbr title='Language Integrated Query'>LINQ</abbr>",
        img: "/storage/assets/images/logos/csharp-linq.png"
      }, {
        title: "Windows Applications",
        img: "/storage/assets/images/logos/csharp-windowsApps.png"
      }, {
        title: "SQLite Databases",
        img: "/storage/assets/images/logos/csharp-sqlite.png"
      }],
      videoEditing: [{
        titleEN: "Color Correction",
        titleAR: "تصحيح الألوان",
        descEN: "First, I do some pre-editing touches for color editing & filtration, to ensure that the footage is ready for montage.",
        descAR: "في البداية، بعمل تصحيح للألوان وتنقية بحيث تبقى الفيديوهات المُصورة جاهزة يتعملها مونتاج",
        img: "/storage/assets/images/skills/videoedit-colors.png"
      }, {
        titleEN: "Audio Editing",
        titleAR: "تحرير الصوت",
        descEN: "I apply noise cancellation & purify the sound of each video, of the recorded voice over.",
        descAR: "بعمل تنقية للأصوات وإزالة لأي أصوات جانبية في الفيديوهات، أو للتعليق الصوتي اللي هيتم تركيبه على الفيديو.",
        img: "/storage/assets/images/skills/videoedit-sound.png"
      }, {
        titleEN: "Montage",
        titleAR: "مونتاج",
        descEN: "I start montaging the videos & make it ready for publishing.",
        descAR: "بعمل مونتاج للفيديوهات وبخلصه بحيث تبقى جاهزة للإنتاج والناس تقدر تشوفها..",
        img: "/storage/assets/images/skills/videoedit-montage.png"
      }, {
        titleEN: "Graphics",
        titleAR: "الرسومات (جرافيكس)",
        descEN: "If you want, I add slight graphics & animations in the video to look more interacting.",
        descAR: "لو طلبت ده، فأقدر أضيف بعض التأثيرات الخفيفة والحركة على الفيديوهات عشان يبقى شكلها أكثر تفاعلًا.",
        img: "/storage/assets/images/skills/videoedit-vfx.png"
      }],
      cse: [{
        title: "C++ Programming Language",
        img: "/storage/assets/images/skills/cse-cplusplus.png"
      }, {
        title: "Data Structures & Algorithms",
        img: "/storage/assets/images/skills/cse-ds.png"
      }, {
        title: "C Programming Language",
        img: "/storage/assets/images/skills/cse-c.png"
      }, {
        title: "Logic Circuits",
        img: "/storage/assets/images/skills/cse-logic.png"
      }, {
        title: "Computer Organization",
        img: "/storage/assets/images/skills/cse-co.png"
      }]
    },
    work: {
      web: [{
        titleEN: "Egyptian Saudian Company for UPVC",
        titleAR: "الشركة المصرية السعودية لزجاج وأبواب الـUPVC",
        href: "https://windowspvc.com",
        img: "/storage/assets/images/projects/web-windowspvc.jpg"
      }, {
        titleEN: "Thanawya Helwa Team",
        titleAR: "فريق ثانوية حلوة",
        href: "https://thanawyahelwa.org",
        img: "/storage/assets/images/projects/web-thanawyahelwa.jpg"
      }, {
        titleEN: "Al Madinah Al Munawarah Development Authority",
        titleAR: "الهيئة العامة لتطوير المدينة المنورة",
        href: "https://madinah.agecs-eg.com",
        img: "/storage/assets/images/projects/web-madinah.jpg"
      }],
      csharp: [{
        title: "Memory Allocator",
        img: "/storage/assets/images/projects/csharp-memoryAllocator.jpg"
      }, {
        title: "CPU Scheduler",
        img: "/storage/assets/images/projects/csharp-cpuScheduler.jpg"
      }, {
        title: "Steel Sections Selector",
        img: "/storage/assets/images/projects/csharp-sectionLibrary.jpg"
      }]
    }
  },
  watch: {
    isTabletOrSmaller: function isTabletOrSmaller(val) {
      if (val) {
        this.titleOnSide = false;
      } else {
        this.titleOnSide = true;
      }
    }
  },
  methods: {
    titlesShown: function titlesShown(e) {
      if (e.percentInView < 0.2 && e.percentTop < 0.3) {
        //Titles out of view .. Create & show the sidebar if we are not on a tablet or smaller
        if (!this.isTabletOrSmaller) {
          this.titleOnSide = true;
        }
      } else {
        //Titles in view .. return to the normal list style
        this.titleOnSide = false;
      }
    },
    openLink: function openLink(link) {
      window.open(link, '_blank');
    }
  }
};
})();

/******/ })()
;