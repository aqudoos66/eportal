<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 0.5rem;
        }
        .form-label {
            font-weight: 500;
        }
        .institute-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            text-align: center;
        }
        .institute-logo {
            max-height: 80px;
            margin-bottom: 15px;
        }
        .institute-name {
            font-size: 1.8rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .form-title {
            text-align: center;
            margin-top: 1rem;
            color: white;
        }
        .education-entry {
            border: 1px solid #dee2e6;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
            position: relative;
        }
        .remove-education {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <!-- Institute Header with Logo and Name -->
                    <div class="card-header bg-primary text-white">
                        <div class="institute-header">
                            <!-- Replace with your actual logo path -->
                            <img src="{{ asset('assets/img/logo-cok.webp') }}" alt="Institute Logo" class="institute-logo">
                            <div class="institute-name">CITY OF KNOWLEDGE</div>
                        </div>
                        <h3 class="form-title">Student Registration Form</h3>
                    </div>
                    
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            
                            <!-- STUDENT INFORMATION SECTION -->
                            <div class="form-section">
                                <div class="section-title">STUDENT INFORMATION</div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">FULL NAME</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">DATE OF BIRTH</label>
                                        <input type="date" class="form-control" id="dob" name="dob" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">GENDER</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">PHONE NUMBER</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">EMAIL</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="address" class="form-label">ADDRESS</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="registration_date" class="form-label">REGISTRATION DATE</label>
                                        <input type="date" class="form-control" id="registration_date" name="registration_date" value="{{ \Carbon\Carbon::today()->toDateString() }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const today = new Date().toISOString().split('T')[0];
                                    document.getElementById('registration_date').value = today;
                                });
                            </script>

                            
                            <!-- EDUCATION HISTORY SECTION -->
                            <div class="form-section">
                                <div class="section-title">EDUCATION HISTORY</div>
                                <div id="education-container">
                                    <!-- First education entry -->
                                    <div class="education-entry">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="degree[0]" class="form-label">DEGREE</label>
                                                <input type="text" class="form-control" id="degree[0]" name="degree[0]" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="institution[0]" class="form-label">INSTITUTION</label>
                                                <input type="text" class="form-control" id="institution[0]" name="institution[0]" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="field_of_study[0]" class="form-label">FIELD OF STUDY</label>
                                                <input type="text" class="form-control" id="field_of_study[0]" name="field_of_study[0]" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="grade[0]" class="form-label">GRADE</label>
                                                <input type="text" class="form-control" id="grade[0]" name="grade[0]" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="start_year[0]" class="form-label">START YEAR</label>
                                                <input type="number" class="form-control" id="start_year[0]" name="start_year[0]" min="1900" max="2099" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="end_year[0]" class="form-label">END YEAR</label>
                                                <input type="number" class="form-control" id="end_year[0]" name="end_year[0]" min="1900" max="2099" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="description[0]" class="form-label">DESCRIPTION</label>
                                                <textarea class="form-control" id="description[0]" name="description[0]" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn btn-secondary mt-3" id="add-education">Add Another Education Entry</button>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Registration</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let educationCounter = 1;
            
            // Add education entry
            document.getElementById('add-education').addEventListener('click', function() {
                const container = document.getElementById('education-container');
                const newEntry = document.createElement('div');
                newEntry.className = 'education-entry';
                
                newEntry.innerHTML = `
                    <button type="button" class="btn btn-danger btn-sm remove-education">×</button>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="degree[${educationCounter}]" class="form-label">DEGREE</label>
                            <input type="text" class="form-control" id="degree[${educationCounter}]" name="degree[${educationCounter}]" required>
                        </div>
                        <div class="col-md-6">
                            <label for="institution[${educationCounter}]" class="form-label">INSTITUTION</label>
                            <input type="text" class="form-control" id="institution[${educationCounter}]" name="institution[${educationCounter}]" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="field_of_study[${educationCounter}]" class="form-label">FIELD OF STUDY</label>
                            <input type="text" class="form-control" id="field_of_study[${educationCounter}]" name="field_of_study[${educationCounter}]" required>
                        </div>
                        <div class="col-md-6">
                            <label for="grade[${educationCounter}]" class="form-label">GRADE</label>
                            <input type="text" class="form-control" id="grade[${educationCounter}]" name="grade[${educationCounter}]" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_year[${educationCounter}]" class="form-label">START YEAR</label>
                            <input type="number" class="form-control" id="start_year[${educationCounter}]" name="start_year[${educationCounter}]" min="1900" max="2099" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_year[${educationCounter}]" class="form-label">END YEAR</label>
                            <input type="number" class="form-control" id="end_year[${educationCounter}]" name="end_year[${educationCounter}]" min="1900" max="2099" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description[${educationCounter}]" class="form-label">DESCRIPTION</label>
                            <textarea class="form-control" id="description[${educationCounter}]" name="description[${educationCounter}]" rows="3"></textarea>
                        </div>
                    </div>
                `;
                
                container.appendChild(newEntry);
                educationCounter++;
            });
            
            // Remove education entry
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-education')) {
                    e.target.closest('.education-entry').remove();
                }
            });
        });
    </script>
</body>
</html>