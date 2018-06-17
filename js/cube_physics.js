// Everything for cube_test.php to perform

var canvasBlock = document.getElementById('canvas-map');

var cnv = canvasBlock.getContext('2d');

// Canvas extensions
const cnv_h = canvasBlock.offsetHeight,
    cnv_w = canvasBlock.offsetWidth;

// Global Array of objects on canvas
var GlobalObjectArray = new Array();

// Begin cyclic frame draw
window.requestAnimationFrame(drawFrame);


// Old code used when there was only 1 object, no classes.

//
//
// Fixed position drag and move
//
// var ppos_x = 100, ppos_y = 100;
//
// canvasBlock.onmousedown = function (e) {
//     if ((e.clientX >= cpos_x - cube_w && e.clientX <= cpos_x + cube_w)
//         && (e.clientY >= cpos_y - cube_h && e.clientY <= cpos_y + cube_h)) {
//         var initialX = e.clientX,
//             initialY = e.clientY;
//         canvasBlock.onmousemove = function (evt) {
//             ppos_x=ppos_x-(initialX-evt.clientX);
//             ppos_y=ppos_y-(initialY-evt.clientY);
//             // var diffX = Math.abs(initialX - evt.clientX),
//             //     diffY = Math.abs(initialY - evt.clientY);
//             // if (initialX < evt.clientX)
//             //     ppos_x += diffX;
//             // else
//             // if (initialX > evt.clientX)
//             //     ppos_x -= diffX;
//             // if (initialY < evt.clientY)
//             //     ppos_y += diffY;
//             // else
//             // if (initialY > evt.clientY)
//             //     ppos_y -= diffY;
//
//             //     ppos_x = cpos_x + Math.abs(cpos_x - e.clientX);
//             // if (e.clientX < initialX)
//             //     ppos_x = cpos_x - Math.abs(cpos_x - e.clientX);
//             // if (e.clientY > initialY)
//             //     ppos_y = cpos_y + Math.abs(cpos_y - e.clientY);
//             // if (e.clientY < initialY)
//             //     ppos_y = cpos_y - Math.abs(cpos_y - e.clientY);
//
//         }
//     }
// };
// canvasBlock.onmouseup = function (e) {
//     canvasBlock.onmousemove = null;
// };
//
// Drag and move realization
//
// var ppos_x = 100, ppos_y = 100;
//
// canvasBlock.onmousedown = function (e) {
//     if ((e.clientX >= cpos_x - cube_w / 2 && e.clientX <= cpos_x + cube_w / 2)
//         && (e.clientY >= cpos_y - cube_h / 2 && e.clientY <= cpos_y + cube_h / 2)) {
//         ignorePhysX = true;
//         ppos_x = e.clientX;
//         ppos_y = e.clientY;
//
//         canvasBlock.onmousemove = function (e) {
//             ignorePhysX = true;
//             ppos_x = e.clientX;
//             ppos_y = e.clientY;
//         }
//     }
// };
// canvasBlock.onmouseup = function (e) {
//     canvasBlock.onmousemove = null;
//     ignorePhysX = false;
// };
//
// Cursor attraction realization
//
// var ppos_x = 0, ppos_y = 0;
//
// canvasBlock.onmousedown = function (e) {
//     ppos_x = e.clientX;
//     ppos_y = e.clientY;
//     canvasBlock.onmousemove = function (e) {
//         ppos_x = e.clientX;
//         ppos_y = e.clientY;
//     }
// };
// canvasBlock.onmouseup = function (e) {
//     canvasBlock.onmousemove = null;
// };
//
// ### Second way of implementing mousedown&mousemove event listener
//
// canvasBlock.addEventListener("mousedown", function (e) {
//     ppos_x = e.clientX;
//     ppos_y = e.clientY;
//     canvasBlock.onmousemove = function (e) {
//         ppos_x = e.clientX;
//         ppos_y = e.clientY;
//     }
// });
//
// canvasBlock.addEventListener("mouseup", function (e) {
//     canvasBlock.onmousemove = null
// });


// ###
// Classes
// ###

// --- Rectangle Class
// --- BEGIN

var Rectangle = function (pos_x, pos_y, width, height, ignorePhysX) {

    this.width = (width === undefined ? 0 : width);
    this.height = (height === undefined ? 0 : height);
    this.x = (pos_x === undefined ? 0 : pos_x);
    this.y = (pos_y === undefined ? 0 : pos_y);
    this.ignorePhysX = (ignorePhysX === undefined ? false : ignorePhysX);

    // Automatically add an Object Instance to global array.
    GlobalObjectArray.push(this);
};

Rectangle.prototype.relativeWidth = function () {
    return this.x + this.width;
};

Rectangle.prototype.relativeHeight = function () {
    return this.y + this.height;
};

Rectangle.prototype.SetPos = function (at_x, at_y) {
    this.x = at_x;
    this.y = at_y;
}

Rectangle.prototype.Move = function (by_x, by_y) {
    this.x += by_x;
    this.y += by_y;
};

Rectangle.prototype.Draw = function (canvas) {
    canvas.beginPath();
    canvas.rect(this.x, this.y, this.width, this.height);
    canvas.fillStyle = 'orange';
    canvas.fill();
    canvas.strokeStyle = 'red';
    canvas.lineWidth = 3;
    canvas.stroke();
};

// Old function to draw Cubes
// function drawCube(canvas, where_x, where_y, width, height) {
//
//     canvas.beginPath();
//     canvas.rect(where_x, where_y, width, height);
//     canvas.fillStyle = 'orange';
//     canvas.fill();
//     canvas.strokeStyle = 'red';
//     canvas.lineWidth = 3;
//     canvas.stroke();
//
// }

// --- Rectangle Class
// --- END

// ###
// Mouse interaction event handlers
// ###

canvasBlock.onmousedown = function (e) {

    var actualClientX = e.clientX + window.scrollX,
        actualClientY = e.clientY + window.scrollY;
    var selectedObject = undefined;
    GlobalObjectArray.forEach(function (item) {
        if (objectSelected(item, actualClientX, actualClientY)) {
            selectedObject = item;
        }
    });

    if (selectedObject !== undefined) {

        selectedObject.ignorePhysX = true;
        var marginX = actualClientX - selectedObject.x,
            marginY = actualClientY - selectedObject.y;
        var relativeX = actualClientX - marginX,
            relativeY = actualClientY - marginY;
        selectedObject.SetPos(relativeX, relativeY);

        canvasBlock.onmousemove = function (e) {
            actualClientX = e.clientX + window.scrollX;
            actualClientY = e.clientY + window.scrollY;
            relativeX = actualClientX - marginX;
            relativeY = actualClientY - marginY;
            selectedObject.SetPos(relativeX, relativeY);
        };

        canvasBlock.onmouseup = function () {
            canvasBlock.onmousemove = null;
            selectedObject.ignorePhysX = false;
        };
    }
};

function objectSelected(obj, pposX, pposY) {
    if ((pposX >= obj.x && pposX <= obj.relativeWidth()) &&
        (pposY >= obj.y && pposY <= obj.relativeHeight())) {
        return true;
    } else return false;
}

// ###
// Physical Objects Declaration
// ###

var cube1 = new Rectangle(100, 100, 100, 100),
    cube2 = new Rectangle(250, 250, 100, 100),
    cube3 = new Rectangle(350, 350, 100, 100),
    cube4 = new Rectangle(450, 450, 100, 100),
    cube5 = new Rectangle(550, 550, 100, 100),
    cube6 = new Rectangle(650, 550, 100, 100),
    cube7 = new Rectangle(750, 550, 100, 100);
    cube8 = new Rectangle(750, 550, 400, 100);

// ###
// Functions
// ###


// General physics appliance
function applyPhysX(objectsArray, object, object_id) {
    if (!(object.ignorePhysX) && !(bottomBorderCollision(object)) && !objectPreCollision(objectsArray, object, object_id)) {
        object.Move(0, 100);
    }
    if (objectCollision(objectsArray, object, object_id)) {
        //    This function returns true/false and compensates position accordingly.
    }
}


// Apparently below are Collision declarations
function bottomBorderCollision(object) {
    if (object.relativeHeight() >= cnv_h) {
        return true;
    } else return false;
}

function objectPreCollision(objectsArray, object, object_id) {
    for (var i = 0; i < objectsArray.length; i++) {
        if (i !== object_id) {

            if (((object.x >= objectsArray[i].x && object.x <= objectsArray[i].relativeWidth()) ||
                    (object.relativeWidth() >= objectsArray[i].x && object.relativeWidth() <= objectsArray[i].relativeWidth())) &&

                ((object.y >= objectsArray[i].y && object.y <= objectsArray[i].relativeHeight()) ||
                    (object.relativeHeight() >= objectsArray[i].y && object.relativeHeight() <= objectsArray[i].relativeHeight()))) {

                return true;
            }
        }
    }
    return false;
}

function objectCollision(objectsArray, object, object_id) {
    for (var i = 0; i < objectsArray.length; i++) {
        if (i !== object_id) {


            if (((object.x >= objectsArray[i].x + 6 && object.x <= objectsArray[i].relativeWidth() - 6) ||
                    (object.relativeWidth() >= objectsArray[i].x + 6 && object.relativeWidth() <= objectsArray[i].relativeWidth() - 6)) &&

                ((object.y >= objectsArray[i].y + 6 && object.y <= objectsArray[i].relativeHeight() - 6) ||
                    (object.relativeHeight() >= objectsArray[i].y + 6 && object.relativeHeight() <= objectsArray[i].relativeHeight() - 6))) {

                // var differenceX = objectsArray[i].relativeWidth() - object.x,
                //     differenceY = objectsArray[i].relativeHeight() - object.y;

                if (!(object.ignorePhysX)) {
                    if (objectsArray[i].x > object.x) {
                        object.Move(-5, 0);
                    } else if (objectsArray[i].x < object.x) {
                        object.Move(5, 0);
                    }
                    if (objectsArray[i].y > object.y) {
                        object.Move(0, -5);
                    } else if (objectsArray[i].y < object.y) {
                        object.Move(0, 5);
                    }
                }
                return true;
            }
        }
    }
    return false;
}

// Draw a Line
function drawLine(canvas, from_x, from_y, to_x, to_y, width, colour) {
    canvas.beginPath();
    canvas.moveTo(from_x, from_y);
    canvas.lineTo(to_x, to_y);
    canvas.strokeStyle = colour;
    canvas.lineWidth = width;
    canvas.stroke();
    canvas.closePath();
}

// Draw Verticax Axis
function drawVerticalLiner(canvas, step, width, end_coord, colour) {
    for (var x = step; x < width; x += step) {
        canvas.beginPath();
        canvas.moveTo(x, 0);
        canvas.lineTo(x, end_coord);
        canvas.strokeStyle = colour;
        canvas.lineWidth = 1;
        canvas.stroke();
        canvas.closePath();
    }
}

// Draw Horizontal Axis
function drawHorizontalLiner(canvas, step, height, end_coord, colour) {
    for (var y = step; y < height; y += step) {
        canvas.beginPath();
        canvas.moveTo(0, y);
        canvas.lineTo(end_coord, y);
        canvas.strokeStyle = colour;
        canvas.lineWidth = 1;
        canvas.stroke();
        canvas.closePath();
    }
}

// What to be depicted in one individual frame. This function is looped by requestAnimationFrame.
function drawFrame() {

    // Clear canvas
    cnv.clearRect(0, 0, cnv_w, cnv_h);

    // Draw grid
    drawVerticalLiner(cnv, 100, cnv_w, cnv_h, 'black');
    drawHorizontalLiner(cnv, 100, cnv_h, cnv_w, 'black');
    drawLine(cnv, 0, cnv_h / 2, cnv_w, cnv_h / 2, 3, 'black');
    drawLine(cnv, cnv_w / 2, 0, cnv_w / 2, cnv_h, 3, 'black');

    // Physical affections to objects positions.
    GlobalObjectArray.forEach(function (item, index) {
        applyPhysX(GlobalObjectArray, item, index);
    });
    // Draw all objects we have.
    GlobalObjectArray.forEach(function (item) {
        item.Draw(cnv);
    });

    // The loop.
    window.requestAnimationFrame(drawFrame);
}