// the core of the program; appends the paint interface to the
// DOM element given as an argument (parent)
function createPaint(parent) {
  var canvas = elt('canvas', {width: 500, height: 300});
  var cx = canvas.getContext('2d');
  var toolbar = elt('div', {class: 'toolbar'});

  // calls the every function in controls, passing in context,
  // then appending the returned results to the toolbar
  for (var name in controls)
    toolbar.appendChild(controls[name](cx));

  var panel = elt('div', {class: 'picturepanel'}, canvas);
  parent.appendChild(elt('div', null, panel, toolbar));
}


// creates an element with a name and object (attributes)
function elt(name, attributes) {
  var node = document.createElement(name);
  if (attributes) {
    for (var attr in attributes)
      if (attributes.hasOwnProperty(attr))
        node.setAttribute(attr, attributes[attr]);
  }
  for (var i = 2; i < arguments.length; i++) {
    var child = arguments[i];

    if (typeof child == 'string')
      child = document.createTextNode(child);
    node.appendChild(child);
  }
  return node;
}

// figures out canvas relative coordinates for accurate functionality
function relativePos(event, element) {
  var rect = element.getBoundingClientRect();
  return {x: Math.floor(event.clientX - rect.left),
          y: Math.floor(event.clientY - rect.top)};
}

// registers and unregisters listeners for tools
function trackDrag(onMove, onEnd) {
  function end(event) {
    removeEventListener('mousemove', onMove);
    removeEventListener('mouseup', end);
    if (onEnd)
      onEnd(event);
  }
  addEventListener('mousemove', onMove);
  addEventListener('mouseup', end);
}

// holds static methods to initialize the various controls;
// Object.create() is used to create a truly empty object
var controls = Object.create(null);

controls.tool = function(cx) {
  var select = elt('select');

  // populate the tools
  for (var name in tools)
    select.appendChild(elt('option', null, name));

  // calls the particular method associated with the current tool
  cx.canvas.addEventListener('mousedown', function(event) {

    // is the left mouse button being pressed?
    if (event.which == 1) {

      // the event needs to be passed to the method to determine
      // what the mouse is doing and where it is
      tools[select.value](event, cx);
      // don't select when user is clicking and dragging
      event.preventDefault();
    }
  });

  return elt('span', null, 'Tool: ', select);
};

// color module
controls.color = function(cx) {
  var input = elt('input', {type: 'color'});

  // on change, set the new color style for fill and stroke
  input.addEventListener('change', function() {
    cx.fillStyle = input.value;
    cx.strokeStyle = input.value;
  });
  return elt('span', null, 'Color: ', input);
};

// brush size module
controls.brushSize = function(cx) {
  var select = elt('select');

  // various brush sizes
  var sizes = [1, 2, 3, 5, 8, 12, 25, 35, 50, 75, 100];

  // build up a select group of size options
  sizes.forEach(function(size) {
    select.appendChild(elt('option', {value: size}, size + ' pixels'));
  });

  // on change, set the new stroke thickness
  select.addEventListener('change', function() {
    cx.lineWidth = select.value;
  });
  return elt('span', null, 'Brush size: ', select);
};


// drawing tools
var tools = Object.create(null);

// line tool
// onEnd is for the erase function, which uses it to reset
	// the globalCompositeOperation to source-over
tools.Line = function(event, cx, onEnd) {
  cx.lineCap = 'round';

  // mouse position relative to the canvas
  var pos = relativePos(event, cx.canvas);
  trackDrag(function(event) {
    cx.beginPath();

    // move to current mouse position
    cx.moveTo(pos.x, pos.y);

    // update mouse position
    pos = relativePos(event, cx.canvas);

    // line to updated mouse position
    cx.lineTo(pos.x, pos.y);

    // stroke the line
    cx.stroke();
  }, onEnd);
};

// erase tool
tools.Erase = function(event, cx) {

  // globalCompositeOperation determines how drawing operations
  // on a canvas affect what's already there
  // 'destination-out' makes pixels transparent, 'erasing' them
  // NOTE: this has been deprecated
  cx.globalCompositeOperation = 'destination-out';
  tools.Line(event, cx, function() {
    cx.globalCompositeOperation = 'source-over';
  });
};


/**
 * allows the user to click and drag out a rectangle on the canvas
 *
 * @param {Object} event - mousedown event (specifically left button)
 * @param {Object} cx - the canvas 2d context object
 */
tools.Rectangle = function(event, cx) {
  var leftX, rightX, topY, bottomY
  var clientX = event.clientX,
      clientY = event.clientY;

  // placeholder rectangle
  var placeholder = elt('div', {class: 'placeholder'});

  // cache the relative position of mouse x and y on canvas
  var initialPos = relativePos(event, cx.canvas);

  // used for determining correct placeholder position
  var xOffset = clientX - initialPos.x,
      yOffset = clientY - initialPos.y;

  trackDrag(function(event) {
    document.body.appendChild(placeholder);

    var currentPos = relativePos(event, cx.canvas);
    var startX = initialPos.x,
        startY = initialPos.y;

    // assign leftX, rightX, topY and bottomY
    if (startX < currentPos.x) {
      leftX = startX;
      rightX = currentPos.x;
    } else {
      leftX = currentPos.x;
      rightX = startX;
    }

    if (startY < currentPos.y) {
      topY = startY;
      bottomY = currentPos.y;
    } else {
      topY = currentPos.y;
      bottomY = startY;
    }

  	// set the style to reflect current fill
    placeholder.style.background = cx.fillStyle;

  	// set div.style.left to leftX, width to rightX - leftX
    placeholder.style.left = leftX + xOffset + 'px';
    placeholder.style.top = topY + yOffset + 'px';
    placeholder.style.width = rightX - leftX + 'px';
    placeholder.style.height = bottomY - topY + 'px';
  }, function() {

    // add rectangle to canvas with leftX, rightX, topY and bottomY
    cx.fillRect(leftX, topY, rightX - leftX, bottomY - topY);

  	// destroy placeholder
    document.body.removeChild(placeholder);
  });
};


// initialize the app
var appDiv = document.querySelector('#paint-app');
createPaint(appDiv);
