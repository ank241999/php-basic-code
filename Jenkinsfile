pipeline {
  agent any

  stages {
    stage('Deploy PHP CODE') {
      steps {
        // Copying files to XAMPP's htdocs directory
        bat "xcopy * E:\\xampp-portable-windows-x64-7.2.34-2-VC15\\xampp\\htdocs\\dashboard /Y"
        // Checking Newman version to ensure it's accessible
        bat "\"C:\\Users\\Ankush Jindal\\AppData\\Roaming\\npm\\newman\" -v"
      }
    }
    stage('Ask for Auth Token') {
      steps {
        script {
          // Prompt for the authorization token during the build
          env.AUTH_TOKEN = input(id: 'userInput', message: 'Please enter the authorization token', parameters: [string(name: 'AUTH_TOKEN')])
        }
      }
    }
    stage('Run postman collection') {
      steps {
        script {
          // If you want to run Newman, uncomment the following line and ensure the path and file name are correct
          // bat "\"C:\\Users\\Ankush Jindal\\AppData\\Roaming\\npm\\newman\" run E:\\phpapi.postman_collection.json"

          // Use the dynamically provided AUTH_TOKEN in the curl command
          bat "curl -X GET http://localhost:9002/dashboard/index.php/users -H \"Authorization: Bearer ${env.AUTH_TOKEN}\""
        }
      }
    }
  }
}
