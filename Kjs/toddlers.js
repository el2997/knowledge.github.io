//////////////settings/////////

let scene, camera, renderer, starGeo, stars;

function init(){
//SCENE AND CAMERA
    scene = new THREE.Scene();
    renderer = new THREE.WebGLRenderer( { alpha: true });
    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight,1, 1000);



    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild( renderer.domElement );
    camera.rotation.x = 1;
      camera.position.set(0,0,50);

//WINDOW resize

    window.addEventListener( 'resize', onWindowResize, false );


function onWindowResize() {

  	camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );

  	}

//STAR

    starGeo= new THREE.Geometry();

//STAR POSITIONS

    for(let i = 0; i < 8000; i++){
      star = new THREE.Vector3(
      Math.random() * 600 - 300,
      Math.random() * 600 - 300,
      Math.random() * 600 - 300
   );
//STAR SPEED

        star.velocity = 0;
        star.acceleration = 0.0001;
        starGeo.vertices.push(star);
    }

//STAR IMAGE, TEXTURE, AND SIZE
    let sprite = new THREE.TextureLoader().load('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTtY8Oo96ovN06O2gVMbfFS17m8TLl2m_AxnLVqFyVfZJItpfmg&usqp=CAU');
    let starMaterial = new THREE.PointsMaterial({
      color: 0xaaaaaa,
      size: 0.7,
      map: sprite
    });

    stars = new THREE.Points(starGeo, starMaterial);
    scene.add(stars);
    animate();
  }

//ANIMATES STARS AND RE-POSITIONS THEM

function animate(){

    starGeo.vertices.forEach(p=>{
      p.velocity += p.acceleration;
      p.y -= p.velocity;

        if (p.y < -280) {
          p.y = 200;
          p.velocity = 0;
      }

    });
    starGeo.verticesNeedUpdate = true;
    stars.rotation.y += 0.0001;
    renderer.render(scene,camera);
    requestAnimationFrame(animate);
}

init();
