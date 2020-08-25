let scene, camera, renderer;

let LINE_COUNT = 300;
let geom = new THREE.BufferGeometry();
geom.setAttribute("position", new THREE.BufferAttribute(new Float32Array(6 * LINE_COUNT), 3));
geom.setAttribute("velocity", new THREE.BufferAttribute(new Float32Array(2 * LINE_COUNT), 1));

let pos = geom.getAttribute("position");
let pa = pos.array;
let vel = geom.getAttribute("velocity");
let va = vel.array;


function init(){
//SCENE AND CAMERA



    scene = new THREE.Scene();
    renderer = new THREE.WebGLRenderer( { alpha: true, antialias: true });
    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight,1, 1000);



    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild( renderer.domElement );


    camera.rotation.x = 1;
    camera.position.set(0,-275,100);


//LINES

for (let line_index = 0; line_index < LINE_COUNT; line_index++) {

  var x = Math.random() * 600 - 300;
  var y = Math.random() * 600- 300;
  var z = Math.random() * 200 - 100;

  var xx = x;
  var yy = y;
  var zz = z;

//LINE START

pa[6 * line_index] = x ;
pa[6 * line_index + 1 ] = y ;
pa[6 * line_index + 2 ] = z ;

//LINE END
pa[6 * line_index + 3] = xx;
pa[6 * line_index + 4] = yy;
pa[6 * line_index + 5] = zz;


va[2 * line_index] = va[2 * line_index + 1] = 0 ;

}

//DEBUGGER

let mat = new THREE.LineBasicMaterial({color: 0xf99056});
let lines = new THREE.LineSegments(geom, mat);

scene.add(lines);
lines.rotation.set(190,0,0);
animate();

function animate(){
  for (let line_index = 0 ; line_index < LINE_COUNT; line_index++) {
    va[2 * line_index] += 0.03;
    va[2 * line_index + 1] += 0.025;

    pa[6 * line_index + 2 ] += va[2 * line_index];
    pa[6 * line_index + 5 ] += va[2 * line_index + 1];


    if(pa[6 * line_index + 5]  > 200) {
        var z = Math.random() * 200 - 100;
        pa[6 * line_index + 2 ] = z ;
        pa[6 * line_index + 5] = z ;
        va[2 * line_index] = 0;
        va[2 * line_index + 1] = 0;


    }

  }
  pos.needsUpdate = true;
  renderer.render(scene,camera);
  requestAnimationFrame(animate);


}
//SCROLLING


//WINDOW RESIZE

window.addEventListener( 'resize', onWindowResize, false );


function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}


//LIGHT

light = new THREE.DirectionalLight( 0xffffff );
light.position.set( -50, -35, 20).normalize();
scene.add(light);


//SPHERE EARTH
geometry = new THREE.SphereGeometry(60, 75, 55);
material = new THREE.MeshPhongMaterial({

  map: new THREE.TextureLoader().load('https://2.bp.blogspot.com/-Jfw4jY6vBWM/UkbwZhdKxuI/AAAAAAAAK94/QTmtnuDFlC8/s640/2_no_clouds_4k.jpg'),

  bumpMap: new THREE.TextureLoader().load('https://2.bp.blogspot.com/-oeguWUXEM8o/UkbyhLmUg-I/AAAAAAAAK-E/kSm3sH_f9fk/s640/elev_bump_4k.jpg'),

  bumpScale: 2,
//  specularMap: new THREE.TextureLoader().load('https://1.bp.blogspot.com/-596lbFumbyA/Ukb1cHw21_I/AAAAAAAAK-U/KArMZAjbvyU/s640/water_4k.png'),
  //specular: new THREE.Color('lightblue'),

});


earth = new THREE.Mesh( geometry, material );
earth.position.set(0,100,10);

scene.add( earth );


//CLOUDS
geometry =  new THREE.SphereGeometry(61, 75, 100),
material =  new THREE.MeshPhongMaterial({
    map: new THREE.TextureLoader().load('http://learningthreejs.com/data/2013-09-16-how-to-make-the-earth-in-webgl/demo/bower_components/threex.planets/images/earthcloudmap.jpg'),
    transparent: true,

    depthWrite: false,

    opacity:0.5
  });
clouds= new THREE.Mesh(geometry,material);
clouds.position.set(0,100,10);

scene.add( clouds);


//SPHERE MOON
geometry = new THREE.SphereGeometry(10, 20, 20);
material = new THREE.MeshPhongMaterial( {
  map: new THREE.TextureLoader().load('https://s3-us-west-2.amazonaws.com/s.cdpn.io/17271/lroc_color_poles_1k.jpg'),
  displacementMap: new THREE.TextureLoader().load('https://s3-us-west-2.amazonaws.com/s.cdpn.io/17271/ldem_3_8bit.jpg'),
  displacementScale: 2,
  bumpMap: new THREE.TextureLoader().load('https://s3-us-west-2.amazonaws.com/s.cdpn.io/17271/ldem_3_8bit.jpg'),
  bumpScale: 1
} );
moon = new THREE.Mesh( geometry, material );
moon.position.set(0,30,40);

scene.add( moon );






//ANIMATE EARTH

function earth_animate() {

      requestAnimationFrame(earth_animate);


      earth.rotateY( 0.002); // rotate mesh around its local Y-axis
      clouds.rotateY(0.001);
      renderer.render(scene,camera);

//ANIMATE MOON
}
function moon_animate2() {

      requestAnimationFrame(moon_animate2);


     renderer.render(scene,camera);


    }


//MOON ORBIT
    var r = 150;
    var theta = 0;
    var dTheta =  1.2 * Math.PI / 1000;


var moonOrbit = function() {
  //Increment theta, and update moon x and y
  //position based off new theta value
  theta += dTheta;
  moon.position.x = r * Math.cos(theta);
  moon.position.y = r * Math.sin(theta);
  moon.position.z = 30 * Math.cos(theta);


  renderer.render(scene, camera);
  requestAnimationFrame(moonOrbit);
};
moonOrbit();




    scene.add( moon );

    scene.add( earth );

    earth.rotation.set( 190, 0, 0 );
    moon.rotation.set( 190, 0, 0 );
    clouds.rotation.set( 190, 0, 0 ); // tilt

    earth_animate();
    moon_animate2();

}
init();


const signUpButton= document.getElementById('signUp');
const signInButton= document.getElementById('signIn');
const container= document.getElementById('container');


signUpButton.addEventListener('click', () => container.classList.add('right-panel-active'));

signInButton.addEventListener('click', () => container.classList.remove('right-panel-active'));
