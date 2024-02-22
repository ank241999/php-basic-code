pipeline {
    agent any

    stages {
        stage('Deployed PHP CODE') {
            steps {
                // Copying files to XAMPP's htdocs directory
                bat "xcopy * E:\\xampp-portable-windows-x64-7.2.34-2-VC15\\xampp\\htdocs\\dashboard /Y"
                // Checking Newman version to ensure it's accessible
                bat "\"C:\\Users\\Ankush Jindal\\AppData\\Roaming\\npm\\newman\" -v"
            }
        }
        stage('Run postman collection') {
            steps {
                script {
                    // Running Newman with the full path and specifying the collection JSON file
                   // bat "\"C:\\Users\\Ankush Jindal\\AppData\\Roaming\\npm\\newman\" run E:\\phpapi.postman_collection.json"
                   bat "curl -X GET http://localhost/dashboard/index.php/users -H "Authorization: Bearer kally" "

                }
            }
        }
    }
}
