<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: #fff;
            color: #333;
            border-radius: 10px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(34, 123, 253, 0.5);
            border-color: #227bfd;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }

        .form-footer a {
            color: #6a11cb;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Generate QR Code</h1>
        </div>
        <form action="{{ route('generate.qrcode') }}" method="POST">
            @csrf

            <!-- Select User Type -->
            <div class="mb-3">
                <label for="type" class="form-label">Select Type</label>
                <select id="type" name="type" class="form-control" onchange="toggleSocialFields()">
                    <option value="">-- Select --</option>
                    <option value="user">User</option>
                    <option value="company">Company</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Enter your job title" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" id="location" name="location" class="form-control" placeholder="Enter your address (e.g., Street, City, State, Country)" required>
            </div>

            <!-- Social Fields (Shown only when "User" is selected) -->
            <div id="socialFields" style="display: none;">
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook Profile</label>
                    <input type="url" id="facebook" name="facebook" class="form-control" placeholder="Enter your Facebook profile URL">
                </div>
                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter Profile</label>
                    <input type="url" id="twitter" name="twitter" class="form-control" placeholder="Enter your Twitter profile URL">
                </div>
                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn Profile</label>
                    <input type="url" id="linkedin" name="linkedin" class="form-control" placeholder="Enter your LinkedIn profile URL">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Generate QR Code</button>
        </form>
        <div class="form-footer">
            <p>Need help? <a href="#">Contact us</a></p>
        </div>
    </div>

    <!-- Script to toggle social fields -->
    <script>
        function toggleSocialFields() {
            const selectedType = document.getElementById("type").value;
            const socialFields = document.getElementById("socialFields");

            if (selectedType === "user") {
                socialFields.style.display = "block";
            } else {
                socialFields.style.display = "none";
            }
        }
    </script>
</body>
</html>
