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
  var z = Math.random() * 400 - 200;

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
}

init();
