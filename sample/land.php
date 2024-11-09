<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Simple Land Viewer</title>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: #87CEEB; /* Sky blue background */
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
    <script>
        // Scene, Camera, and Renderer setup
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Create a simple land (flat plane)
        const landGeometry = new THREE.PlaneGeometry(100, 100); // Size of the land
        const landMaterial = new THREE.MeshBasicMaterial({ color: 0x228B22 }); // Green color for grass
        const land = new THREE.Mesh(landGeometry, landMaterial);
        land.rotation.x = -Math.PI / 2; // Rotate to make it horizontal
        land.position.y = -2;
        scene.add(land);

        // Generate random mountains
        function createMountain(x, z) {
            const mountainGeometry = new THREE.ConeGeometry(5 + Math.random() * 5, 20, 4);
            const mountainMaterial = new THREE.MeshLambertMaterial({ color: 0x8B4513 }); // Brown color for mountains
            const mountain = new THREE.Mesh(mountainGeometry, mountainMaterial);
            mountain.position.set(x, 8, z);
            mountain.castShadow = true;
            scene.add(mountain);
        }

        // Add some mountains
        for (let i = 0; i < 5; i++) {
            createMountain(Math.random() * 40 - 20, Math.random() * 40 - 20);
        }

        // Generate random trees
        function createTree(x, z) {
            const trunkGeometry = new THREE.CylinderGeometry(0.5, 0.5, 3);
            const trunkMaterial = new THREE.MeshLambertMaterial({ color: 0x8B4513 }); // Brown trunk
            const trunk = new THREE.Mesh(trunkGeometry, trunkMaterial);
            trunk.position.set(x, 1.5, z);

            const leavesGeometry = new THREE.ConeGeometry(2, 5, 8);
            const leavesMaterial = new THREE.MeshLambertMaterial({ color: 0x228B22 }); // Green leaves
            const leaves = new THREE.Mesh(leavesGeometry, leavesMaterial);
            leaves.position.set(x, 5, z);

            scene.add(trunk);
            scene.add(leaves);
        }

        // Add some trees
        for (let i = 0; i < 10; i++) {
            createTree(Math.random() * 40 - 20, Math.random() * 40 - 20);
        }


        // Position the camera
        camera.position.set(0, 20, 50);
        camera.lookAt(0, 0, 0);

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040); // Soft light
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5); // Sunlight
        directionalLight.position.set(-50, 100, 50);
        directionalLight.castShadow = true;
        scene.add(directionalLight);

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // Handle window resize
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>