<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Open Room Viewer</title>
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
    <script>
        // Scene and Camera setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x808080);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 5, 20);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Room geometry (cube with one side removed)
        const wallGeometry = new THREE.BoxGeometry(10, 10, 10);
        const materials = [
            new THREE.MeshStandardMaterial({ color: 0x8B0000 }), // Right wall (Dark Red)
            new THREE.MeshStandardMaterial({ color: 0x008000 }), // Left wall (Dark Green)
            new THREE.MeshStandardMaterial({ color: 0x00008B }), // Ceiling (Dark Blue)
            new THREE.MeshStandardMaterial({ color: 0xFFD700 }), // Floor (Gold)
            new THREE.MeshStandardMaterial({ visible: false }),  // Front wall (Invisible/Open)
            new THREE.MeshStandardMaterial({ color: 0x1E90FF })  // Back wall (Dodger Blue)
        ];
        const room = new THREE.Mesh(wallGeometry, materials);
        scene.add(room);

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 5);
        scene.add(directionalLight);

        // Basic Animation and Rotation (without controls)
        let rotationSpeed = 0.01;
        function animate() {
            requestAnimationFrame(animate);

            // Rotate the cube slowly
            room.rotation.y += rotationSpeed;
            
            renderer.render(scene, camera);
        }
        animate();

        // Zoom functionality with scroll
        window.addEventListener('wheel', (event) => {
            camera.position.z += event.deltaY * 0.01;
        });

        // Adjust rotation speed with arrow keys
        window.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowRight') {
                rotationSpeed += 0.005;
            } else if (event.key === 'ArrowLeft') {
                rotationSpeed -= 0.005;
            }
        });

        // Window resize handling
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>
-->

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Room Debugging</title>
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
        const scene = new THREE.Scene();
        
        // Set the background color to gray to help visualize the scene
        scene.background = new THREE.Color(0x808080);

        // Camera setup
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 2, 20); // Farther back to get a broader view

        // Renderer setup
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Controls for navigation
        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;

        // Room geometry and material setup
        const wallGeometry = new THREE.BoxGeometry(10, 10, 10);
        const materials = [
            new THREE.MeshStandardMaterial({ color: 0x8B0000 }), // Right wall (Dark Red)
            new THREE.MeshStandardMaterial({ color: 0x008000 }), // Left wall (Dark Green)
            new THREE.MeshStandardMaterial({ color: 0x00008B }), // Ceiling (Dark Blue)
            new THREE.MeshStandardMaterial({ color: 0xFFD700 }), // Floor (Gold)
            new THREE.MeshStandardMaterial({ color: 0xFF4500 }), // Front wall (Orange Red)
            new THREE.MeshStandardMaterial({ color: 0x1E90FF }), // Back wall (Dodger Blue)
        ];
        const room = new THREE.Mesh(wallGeometry, materials);
        scene.add(room);

        // Rotate the room to give a clear view of multiple walls
        room.rotation.y = Math.PI / 4;

        // Add ambient light and increase intensity
        const ambientLight = new THREE.AmbientLight(0x404040, 2); // Increased intensity
        scene.add(ambientLight);

        // Add a directional light and increase intensity
        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 7.5);
        scene.add(directionalLight);

        // Add a grid helper to visualize the ground
        const gridHelper = new THREE.GridHelper(20, 20);
        scene.add(gridHelper);

        // Add axes helper to visualize orientation
        const axesHelper = new THREE.AxesHelper(5);
        scene.add(axesHelper);

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        animate();

        // Adjust on window resize
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html> -->



<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Room Viewer with Mouse Control</title>
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
    <script>
        // Scene, Camera, and Renderer setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x808080);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 5, 20);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Room geometry (cube with one side removed)
        const wallGeometry = new THREE.BoxGeometry(10, 10, 10);
        const materials = [
            new THREE.MeshStandardMaterial({ color: 0x8B0000 }), // Right wall (Dark Red)
            new THREE.MeshStandardMaterial({ color: 0x008000 }), // Left wall (Dark Green)
            new THREE.MeshStandardMaterial({ color: 0x00008B }), // Ceiling (Dark Blue)
            new THREE.MeshStandardMaterial({ color: 0xFFD700 }), // Floor (Gold)
            new THREE.MeshStandardMaterial({ visible: false }),  // Front wall (Invisible/Open)
            new THREE.MeshStandardMaterial({ color: 0x1E90FF })  // Back wall (Dodger Blue)
        ];
        const room = new THREE.Mesh(wallGeometry, materials);
        scene.add(room);

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 5);
        scene.add(directionalLight);

        // Mouse control variables
        let isDragging = false;
        let previousMousePosition = {
            x: 0,
            y: 0
        };

        // Rotation control on mouse drag
        function onMouseMove(event) {
            if (!isDragging) return;

            const deltaMove = {
                x: event.clientX - previousMousePosition.x,
                y: event.clientY - previousMousePosition.y
            };

            room.rotation.y += deltaMove.x * 0.005;
            room.rotation.x += deltaMove.y * 0.005;

            previousMousePosition = {
                x: event.clientX,
                y: event.clientY
            };
        }

        // Detect when mouse is pressed or released
        renderer.domElement.addEventListener('mousedown', (event) => {
            isDragging = true;
            previousMousePosition = {
                x: event.clientX,
                y: event.clientY
            };
        });

        renderer.domElement.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Mouse movement listener for rotation
        renderer.domElement.addEventListener('mousemove', onMouseMove);

        // Zoom functionality with scroll
        window.addEventListener('wheel', (event) => {
            camera.position.z += event.deltaY * 0.01;
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // Window resize handling
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Room Viewer with Mouse Control</title>
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
    <script>
        // Scene, Camera, and Renderer setup
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x808080);

        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 5, 20);

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('container').appendChild(renderer.domElement);

        // Room geometry (cube with one side modified to be transparent)
        const wallGeometry = new THREE.BoxGeometry(10, 10, 10);
        const materials = [
            new THREE.MeshStandardMaterial({ color: 0x8B0000 }), // Right wall (Dark Red)
            new THREE.MeshStandardMaterial({ color: 0x008000 }), // Left wall (Dark Green)
            new THREE.MeshStandardMaterial({ color: 0x00008B }), // Ceiling (Dark Blue)
            new THREE.MeshStandardMaterial({ color: 0xFFD700 }), // Floor (Gold)
            new THREE.MeshStandardMaterial({ color: 0xFFFFFF, opacity: 0.1, transparent: true }),  // Front wall (Transparent)
            new THREE.MeshStandardMaterial({ color: 0x1E90FF })  // Back wall (Dodger Blue)
        ];
        const room = new THREE.Mesh(wallGeometry, materials);
        scene.add(room);

        // Lighting setup
        const ambientLight = new THREE.AmbientLight(0x404040, 2);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 2);
        directionalLight.position.set(5, 10, 5);
        scene.add(directionalLight);

        // Mouse control variables
        let isDragging = false;
        let previousMousePosition = {
            x: 0,
            y: 0
        };

        // Rotation control on mouse drag
        function onMouseMove(event) {
            if (!isDragging) return;

            const deltaMove = {
                x: event.clientX - previousMousePosition.x,
                y: event.clientY - previousMousePosition.y
            };

            room.rotation.y += deltaMove.x * 0.005;
            room.rotation.x += deltaMove.y * 0.005;

            previousMousePosition = {
                x: event.clientX,
                y: event.clientY
            };
        }

        // Detect when mouse is pressed or released
        renderer.domElement.addEventListener('mousedown', (event) => {
            isDragging = true;
            previousMousePosition = {
                x: event.clientX,
                y: event.clientY
            };
        });

        renderer.domElement.addEventListener('mouseup', () => {
            isDragging = false;
        });

        // Mouse movement listener for rotation
        renderer.domElement.addEventListener('mousemove', onMouseMove);

        // Zoom functionality with scroll
        window.addEventListener('wheel', (event) => {
            camera.position.z += event.deltaY * 0.01;
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // Window resize handling
        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
        });
    </script>
</body>
</html>
