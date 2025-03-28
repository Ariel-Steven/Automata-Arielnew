<!DOCTYPE html>
<html>
<head>
    <title>Scientific Number Identification</title>
    <style>
        body {
            background-color: #000;
            font-family: 'Poppins', serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.5;
            background-image: url('milky2.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .glass-box {
            position: relative;
            z-index: 1;
            backdrop-filter: blur(5px);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
           
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 8px 32px 0 rgba(255, 236, 139, 0.88);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        /* Shadow saat input benar */
        .glass-box.correct {
            box-shadow: 0 0 50px rgba(144, 238, 144, 0.8); /* pastel green */
            transition: box-shadow 0.4s ease;
        }

        /* Shadow saat input salah */
        .glass-box.incorrect {
            box-shadow: 0 0 50px rgba(255, 99, 71, 0.8); /* soft red */
            transition: box-shadow 0.4s ease;
        }

        h1 {
            color: #fff;
            font-size: 2em;
            margin-bottom: 5px;
            white-space: nowrap;
        }

        h2 {
            color: #ccc;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        label {
            color: #ccc;
            font-size: 1em;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 12px;
            border: none;
            font-size: 1em;
            margin-top: 10px;
            width: 80%;
            max-width: 300px;
            outline: none;
        }

        .output {
            margin-top: 30px;
            padding: 10px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .output p {
            margin: 0;
            font-size: 1.1em;
            color: #fff;
        }

        .output p.success {
            color: #4CAF50; /* soft green */
            font-weight: bold;
        }

        .output p.error {
            color: #F44336; /* soft red */
            font-weight: bold;
        }

        button {
            background-color: rgba(255, 222, 113, 0.73);
            color: #000;
            font-weight: bold;
            border: none;
            padding: 10px 25px;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: rgb(255, 241, 86);
            transform: scale(1.03);
        }
    </style>
</head>
<body>

    <!-- Background -->
    <div class="background-pattern"></div>

    <!-- Kotak Blur -->
    <div class="glass-box">
        <h1>Scientific Number Identification</h1>
        <h2>Ariel Gantare (231011060016) </h2>
        <form id="numberForm">
            <input type="text" id="angka" name="angka" placeholder="Enter a number...">
            <br>
            <button type="submit">Check 🔍</button>
        </form>
        <div class="output" id="outputDiv"></div>
    </div>

    <!-- JavaScript -->
    <script>

    const form = document.getElementById('numberForm');
    const outputDiv = document.getElementById('outputDiv');
    const glassBox = document.querySelector('.glass-box');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const inputValue = document.getElementById('angka').value.trim();

        // Regex untuk format angka biasa & scientific number
        const numberPattern = /^[+-]?(\d+(\.\d*)?|\.\d+)([eE][+-]?\d+)?$/;

        let message = document.createElement('p');

        // Reset class shadow
        glassBox.classList.remove('correct', 'incorrect');

        if (numberPattern.test(inputValue)) {
            message.textContent = `Yes, it is a number`;
            message.classList.add('success');
            glassBox.classList.add('correct');
        } else {
            message.textContent = `No, it is not a number`;
            message.classList.add('error');
            glassBox.classList.add('incorrect');
        }

        outputDiv.innerHTML = '';
        outputDiv.appendChild(message);
    });
</script>


</body>
</html>
