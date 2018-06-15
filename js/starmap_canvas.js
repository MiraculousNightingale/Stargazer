// Contains all canvas in '#map-canvas' div block

var mapBlock = document.getElementById('starmap-canvas');
// Center the view
var mapWindow = document.getElementById('map-holder');
mapWindow.scrollBy(mapBlock.offsetWidth / 2 - mapWindow.offsetWidth / 2, mapBlock.offsetHeight / 2 - mapWindow.offsetHeight / 2);
var cnv = mapBlock.getContext('2d');

// Anti-Aliasing disable
cnv.imageSmoothingEnabled = false;

// Map Definitions
const end_x = 3000;
const end_y = 3000;
const half_x = end_x / 2;
const half_y = end_y / 2;
// Orbital radius for planets
const orbit_mercury = 250,
    orbit_venus = 350,
    orbit_earth = 550;
// Orbital radius for planetary satellites
const orbit_moon = 80;
// Speed modifiers
const mod_mercury = 3,
    mod_venus = 2,
    mod_earth = 1,
    mod_moon = 20;
// Actual cycle
window.requestAnimationFrame(drawMap);


//#
// Functions Block
//#

// Draw Single Line
function drawLine(from_x, from_y, to_x, to_y, width, colour) {
    cnv.beginPath();
    cnv.moveTo(from_x, from_y);
    cnv.lineTo(to_x, to_y);
    cnv.strokeStyle = colour;
    cnv.lineWidth = width;
    cnv.stroke();
    cnv.closePath();
}

// Draw Verticax Axis
function drawVerticalLiner(step, end_coord, colour) {
    for (var x = step; x < end_coord; x += step) {
        cnv.beginPath();
        cnv.moveTo(x, 0);
        cnv.lineTo(x, end_coord);
        cnv.strokeStyle = colour;
        cnv.lineWidth = 1;
        cnv.stroke();
        cnv.closePath();
    }
}

// Draw Horizontal Axis
function drawHorizontalLiner(step, end_coord, colour) {
    for (var y = step; y < end_coord; y += step) {
        cnv.beginPath();
        cnv.moveTo(0, y);
        cnv.lineTo(end_coord, y);
        cnv.strokeStyle = colour;
        cnv.lineWidth = 1;
        cnv.stroke();
        cnv.closePath();
    }
}

// Draw Planet
function drawPlanet(where_x, where_y, radius, colour, label) {
    cnv.beginPath();
    cnv.arc(where_x, where_y, radius, 0, 2 * Math.PI);
    cnv.fillStyle = colour;
    cnv.fill();
    cnv.font = '28px Arial';
    cnv.fillStyle = 'red';
    cnv.fillText(label, where_x - (radius / 2), where_y - radius - 20);
    cnv.closePath();
}

// Draw Orbit
function drawOrbit(radius, width, colour, where_x, where_y) {
    if (where_x === undefined && where_y === undefined) {
        where_x = half_x;
        where_y = half_y;
    }
    cnv.beginPath();
    cnv.arc(where_x, where_y, radius, 0, 2 * Math.PI);
    cnv.strokeStyle = colour;
    cnv.lineWidth = width;
    cnv.stroke();
    cnv.closePath();
}

// Global angle variable for functions to perform
var angle = 0;

function drawMap() {

    // Used for old incrementation of angle by 0.001;
    // if (angle > 359.998) angle = 0;

    // New angle definition, time now related to angle. The /10000 division regulates the speed to more applicable
    angle=new Date().getTime()/10000;

    // Clear the canvas map
    cnv.clearRect(0, 0, end_x, end_y);

    // Draw Map Squares and Coordinate Axises
    drawVerticalLiner(100, end_x, 'white');
    drawHorizontalLiner(100, end_y, 'white');
    drawLine(0, half_y, end_x, half_y, 4, 'white');
    drawLine(half_x, 0, half_x, end_y, 4, 'white');

    // Here Comes the Sun
    drawPlanet(half_x, half_y, 100, 'yellow', 'Sun');

    // Draw Orbits
    // # Planetary
    drawOrbit(orbit_mercury, 2, 'white');
    drawOrbit(orbit_venus, 2, 'white');
    drawOrbit(orbit_earth, 2, 'white');
    // # Satellitary
    drawOrbit(orbit_moon, 2, 'white', orbitPlanetX(orbit_earth, mod_earth), orbitPlanetY(orbit_earth, mod_earth));

    // Draw Planets ( Stars included )
    drawPlanet(orbitPlanetX(orbit_mercury, mod_mercury), orbitPlanetY(orbit_mercury, mod_mercury), 30, 'cyan', 'Mercury');
    drawPlanet(orbitPlanetX(orbit_venus, mod_venus), orbitPlanetY(orbit_venus, mod_venus), 40, 'orange', 'Venus');
    drawPlanet(orbitPlanetX(orbit_earth, mod_earth), orbitPlanetY(orbit_earth, mod_earth), 50, 'green', 'Earth');

    // Draw Satellites ( Planetary )
    drawPlanet(orbitSatelliteX(orbit_earth, orbit_moon, mod_moon, mod_earth), orbitSatelliteY(orbit_earth, orbit_moon, mod_moon, mod_earth), 10, 'grey', 'Moon');

    // Orbital Cycle
    // Find the coordinates of a spot on a circle border
    // x = center_x + radius * Cos ( angle )
    // y = center_y + radius * Sin ( angle )

    window.requestAnimationFrame(drawMap);

}

function orbitPlanetX(radius, modifier) {
    if (modifier === undefined) modifier = 1;
    return half_x + radius * Math.cos(angle * modifier);
}

function orbitPlanetY(radius, modifier) {
    if (modifier === undefined) modifier = 1;
    return half_y + radius * Math.sin(angle * modifier);
}

function orbitSatelliteX(planet_orbit_radius, radius, modifier, planet_modifier) {
    if (modifier === undefined) modifier = 1;
    if (planet_modifier === undefined) planet_modifier = 1;
    return orbitPlanetX(planet_orbit_radius, planet_modifier) + radius * Math.cos(angle * modifier);
}

function orbitSatelliteY(planet_orbit_radius, radius, modifier, planet_modifier) {
    if (modifier === undefined) modifier = 1;
    if (planet_modifier === undefined) planet_modifier = 1;
    return orbitPlanetY(planet_orbit_radius, planet_modifier) + radius * Math.sin(angle * modifier);
}