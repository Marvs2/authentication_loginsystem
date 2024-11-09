<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Room with Separate Walls</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }
        #container {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="container"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="js/controls/OrbitControls.js"></script>
    <script>
        // Scene setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0xaaaaaa); // Light gray

        // Camera setup
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 10, 30); // Move camera farther back for better view

        // Renderer setup
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Orbit Controls
        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;

        // Wall dimensions
        const wallWidth = 20;
        const wallHeight = 10;
        const wallDepth = 0.5;

        // Wall materials
        const materialRed = new THREE.MeshStandardMaterial({ color: 0x8B0000 });
        const materialGreen = new THREE.MeshStandardMaterial({ color: 0x008000 });
        const materialBlue = new THREE.MeshStandardMaterial({ color: 0x00008B });
        const materialYellow = new THREE.MeshStandardMaterial({ color: 0xFFD700 });
        const materialOrange = new THREE.MeshStandardMaterial({ color: 0xFF4500 });
        const materialDodgerBlue = new THREE.MeshStandardMaterial({ color: 0x1E90FF });

        // Front Wall
        const frontWall = new THREE.Mesh(new THREE.BoxGeometry(wallWidth, wallHeight, wallDepth), materialOrange);
        frontWall.position.set(0, wallHeight / 2, -wallWidth / 2);
        scene.add(frontWall);

        // Back Wall
        const backWall = new THREE.Mesh(new THREE.BoxGeometry(wallWidth, wallHeight, wallDepth), materialDodgerBlue);
        backWall.position.set(0, wallHeight / 2, wallWidth / 2);
        scene.add(backWall);

        // Left Wall
        const leftWall = new THREE.Mesh(new THREE.BoxGeometry(wallDepth, wallHeight, wallWidth), materialGreen);
        leftWall.position.set(-wallWidth / 2, wallHeight / 2, 0);
        scene.add(leftWall);

        // Right Wall
        const rightWall = new THREE.Mesh(new THREE.BoxGeometry(wallDepth, wallHeight, wallWidth), materialRed);
        rightWall.position.set(wallWidth / 2, wallHeight / 2, 0);
        scene.add(rightWall);

        // Floor
        const floor = new THREE.Mesh(new THREE.BoxGeometry(wallWidth, wallDepth, wallWidth), materialYellow);
        floor.position.set(0, 0, 0);
        scene.add(floor);

        // Ceiling
        const ceiling = new THREE.Mesh(new THREE.BoxGeometry(wallWidth, wallDepth, wallWidth), materialBlue);
        ceiling.position.set(0, wallHeight, 0);
        scene.add(ceiling);

        // Lighting
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 3); // Increase intensity
        directionalLight.position.set(10, 15, 10); // Change position for better lighting
        scene.add(directionalLight);

        // Grid helper
        const gridHelper = new THREE.GridHelper(20, 20);
        scene.add(gridHelper);

        // Axes helper
        const axesHelper = new THREE.AxesHelper(5);
        scene.add(axesHelper);

        // Animation loop
        function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
        console.log("Rendering..."); // This should print continuously in the console if the loop is working
        }
        animate();


        // Window resize handler
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>
